<?php

namespace App\Http\Controllers;

use App\Mail\RejectYourPost;
use App\Mail\AcceptYourPost;
use App\Mail\Template;
use App\Models\Version;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Settings;
use App\Models\RejectReason;

use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->where('author_id', auth()->user()->id)->get();
        $categories = Category::all();
        return view('dashboard.posts.index', compact('posts','categories'));


    }

    public function create()
    {
        $categories = Category::all();
        $share = Settings::where('page', 4)->first();
        return view('dashboard.posts.add', compact('categories','share'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'author_id' => 'required|numeric',
            'name' => 'required',
            'title' => 'required',
            //'university' => 'required',
            //'specialty' => 'required',
            'category_id' => 'required',
            //'keywords' => 'required',
            'research_major' => 'required',
            'exact_specialty_research' => 'required',
            'search_language' => 'required',
            'file' => 'required|file|max:5120'
        ]);


        $data = $r->all();
        $data['invoice_id'] = rand(1000,1000000);

        if ($data['file']->getClientOriginalExtension() != 'pdf') {
            return back()->withErrors('');
        }

        try
        {
          $target = "uploads/files/";
          $filename = time() . ".pdf";
          $data['file']->move($target, $filename);
          //$data['file'] = $target . $filename;
          $data['file'] = VersionController::check($target . $filename);

          $post  = Post::create($data);
          $admin = User::where('admin', 1)->first();



          VersionController::setMetaData($post->file, $post->title . ' ' . $post->category->title, $post->user->name);

            $data_email = [
                'title'=>'اضافة بحث جديد ',
                'description'=>
                    'اسم البحث : '. $post->title .'<br>' .
                    'اسم المؤلف  :' .auth()->user()->name .'<br>'.
                    'التخصص الرئيسي للبحث  :' .$post->research_major .'<br>'.
                    'التخصص الدقيق للبحث  :' .$post->exact_specialty_research .'<br>'.
                    'اسم المجلة :' . $post->category->title .'<br>'.
                    'ملف البحث :' . '<a target="_blank" href="'.url($post->file).'">عرض الملف</a>'
            ];
            Mail::to($admin->email)->send(new Template($data_email));

        }
        catch (Exception $e)
        {
           return back()->withErrors('');
        }

        return redirect()->route('dashboard.posts.index');
    }

    public function pay(Request $r, Post $post)
    {
        $message = 'added a new post.';
        $post->update(['paid' => 1]);
        $user = User::find($post->author_id);
        $user->update(['paid' => 1]);
        NotificationController::new($reciever, $message);
        return redirect()->back();
    }

    public function show()
    {
        //$posts = Post::where('paid', 1)->where('status', 1)->get();
        $posts = Post::with('category')->get();
        $reasons = RejectReason::all();
        return view('dashboard.admin.posts', compact(['posts', 'reasons']));
    }

    public function users_pay()
    {
        $posts = Post::where('paid', 1)->get();
        return view('dashboard.admin.usersPay', compact(['posts']));
    }

    public function users_not_pay()
    {
        $posts = Post::where('paid', 0)->get();
        return view('dashboard.admin.usersNotPay', compact(['posts']));
    }

    public function users_request()
    {
        $reasons = RejectReason::all();
        $posts = Post::where(['paid'=> 1,'status'=>1])->with('category')->get();
        return view('dashboard.admin.usersRequest', compact(['posts','reasons']));
    }

    public function post_rejects()
    {
        $posts = Post::where(['paid'=> 1,'status'=>0])->with('category')->get();
        return view('dashboard.admin.postRejects', compact(['posts']));
    }

    public function edit(Post $post)
    {
        if ($post->status == 2 || auth()->user()->id != $post->author_id) {return redirect()->route('dashboard.posts.index');}

        $categories = Category::all();
        return view('dashboard.posts.edit', compact(['post', 'categories']));
    }

    public function update(Request $r, Post $post)
    {
        $r->validate([
            'author_id' => 'required|numeric',
            'name' => 'required',
            'title' => 'required',
            //'university' => 'required',
            //'specialty' => 'required',
            //'pages' => 'required|numeric|integer',
            'category_id' => 'required',
            //'keywords' => 'required',
            'file' => 'nullable|file|max:5120',
            'research_major' => 'required',
            'exact_specialty_research' => 'required',
            'search_language' => 'required',

        ]);

        $data = $r->all();

        if ($r->hasFile('file'))
        {
            if (file_exists($post->file)) {
                unlink($post->file);
            }

            if ($data['file']->getClientOriginalExtension() != 'pdf') {
                return back()->withErrors('');
            }

            $target = "uploads/files/";
            $filename = time() . ".pdf";
            $data['file']->move($target, $filename);
            //$data['file'] = $target . $filename;
            $data['file'] = VersionController::check($target . $filename);
        }

        $post->update($data);

        if ($r->hasFile('file'))
            VersionController::setMetaData($data['file'], $post->title . ' ' . $post->category->title, $post->user->name);

        return redirect()->route('dashboard.posts.index');
    }

    public function accept(Request $r)
    {

        $data = $r->all();
        $p = Post::find($data['id']);
        $p->update(["title" => $data['title']]);
        $user = User::where('id', $p->author_id)->first();
        if ($data['accepted']) {
            $date = date('Y-m-d');
            $p->update([
                'status' => 2,
                'published_on' => $date
            ]);

            $v = VersionController::store($p->category_id, $p, $p->id);
            NotificationController::new($p->author_id, "Accepted post with title " . $p->title . " and shared in research NO. " . $v);
            $certificate = PostController::certificate($p,$v);


            $data_email = [
                'name'=>$user->name,
                'title'=>$p->title,
                'file'=>$v->file,
                'category'=>$p->category->title,
                'version'=>$v->title,
                'version_file'=>$v->file,
                'certificate'=>$certificate,
            ];
            Mail::to($user->email)->send(new AcceptYourPost($data_email));

            return redirect()->route('dashboard.versions.index');
        } else {

            $p->update([
                'status' => 0
            ]);
            $data_email = [
                'name'=>$user->name,
                'title'=>$p->title,
                'file'=>$p->file,
                'reason'=>$data['reason'],
                'desc'=>$data['desc']
            ];
            Mail::to($user->email)->send(new RejectYourPost($data_email));
            NotificationController::new($p->author_id, "Rejected post with title " . $p->title . " for " . $data['reason'], $data['desc']);
        }

        return redirect()->back();
    }

    public function payFromSystem(Request $r){
        $data = $r->all();
        $p = Post::find($data['id']);
        $data['paid'] = 1;
        $data['pay_amount'] = 0;
        $data['paid_at'] = now() ;
        $p->update($data);
        return redirect()->back();
    }

    public function delete(Request $r)
    {
        $data = $r->all();
        $p = Post::find($data['id']);
        $p->delete();

        return redirect()->back();
    }

    public function policy()
    {
        $share = Settings::where('page', 4)->first();
        return view('dashboard.posts.share', compact('share'));
    }

    public static function certificate(Post $p,Version $v)
    {
        if ($p->status != 2)
        {
            return redirect()->back();
        }

        $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data(url($v->file))
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->validateResult(false)
        ->build();

        $pdf = new \Mpdf\Mpdf();

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($p->category->certification_file);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);

        $html = '<div style="text-align: center; position: fixed; top: 325px;direction: rtl; width: 100%;">
        <p  style="font-size: 20px;">' . $p->user->name . '</p>

        <p  style="font-size: 18px; margin-top: 70px; font-weight: bold;direction: rtl"> <label >'. $p->title .' </label><br> في مجلة '. $p->category->title .' المجلد '. $v->title .' العدد الأول بتاريخ '. date('Y-m-d') .'</p>
        </div>';

        $output = 'certifications/' . time() .  '.pdf';
        $pdf->WriteHTML($html ,\Mpdf\HTMLParserMode::HTML_BODY);
        $pdf->Image($result->getDataUri(), 150, 235, 30, 30, 'png');
        $pdf->Output($output, 'F');
        $p->update(['certificate_file' => $output]);
        return $output;
    }

    public function destroy(Post $p)
    {
        //
    }
}
