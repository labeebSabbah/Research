<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Settings;
use App\Models\RejectReason;

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
        return view('dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.posts.add', compact('categories'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'author_id' => 'required|numeric',
            'name' => 'required',
            'title' => 'required',
            'university' => 'required',
            'specialty' => 'required',
            'supervisor' => 'required',
            'pages' => 'required|numeric|integer',
            'category_id' => 'required',
            'keywords' => 'required',
            'file' => 'required|file'
        ]);
        
        $data = $r->all();

        if ($data['file']->getClientOriginalExtension() != 'pdf') {
            return back()->withErrors('');
        }

        try 
        {
          $target = "uploads/files/";
          $filename = time() . ".pdf";  
          $data['file']->move($target, $filename);
          $data['file'] = $target . $filename;

          Post::create($data);

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
        $reciever = User::where('admin', 1)->first()->id;
        $post->update(['paid' => 1]);
        $user = User::find($post->author_id);
        $user->update(['paid' => 1]);
        NotificationController::new($reciever, $message);
        return redirect()->back();
    }

    public function show()
    {
        $posts = Post::where('paid', 1)->where('status', 1)->get();
        $reasons = RejectReason::all();
        return view('dashboard.admin.posts', compact(['posts', 'reasons']));
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
            'university' => 'required',
            'specialty' => 'required',
            'supervisor' => 'required',
            'pages' => 'required|numeric|integer',
            'category_id' => 'required',
            'keywords' => 'required',
            'file' => 'nullable|file'
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
            $data['file'] = $target . $filename;
        }

        $post->update($data);

        return redirect()->route('dashboard.posts.index');
    }

    public function accept(Request $r)
    {
        $data = $r->all();
        $p = Post::find($data['id']);
        
        if ($data['accepted']) {
            $v = VersionController::store($p->category_id, $p, $p->id);
            $date = date('Y-m-d');
            $p->update([
                'status' => 2,
                'published_on' => $date
            ]);
            NotificationController::new($p->author_id, "Accepted post with title " . $p->title . " and shared in research NO. " . $v);
            return redirect()->route('dashboard.versions.index');
        } else {
            $p->update([
                'status' => 0
            ]);
            NotificationController::new($p->author_id, "Rejected post with title " . $p->title . " for " . $data['reason'], $data['desc']);
        }

        return redirect()->back();
    }

    public function policy()
    {
        $share = Settings::where('page', 4)->first();
        return view('dashboard.posts.share', compact('share'));
    }

    public function certificate(Post $p)
    {
        if ($p->status !== 2)
        {
            return redirect()->back();
        }

        $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data(url($p->file))
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
        $pdf->WriteText(30, 20, "Congrats " . auth()->user()->name);
        $pdf->WriteText(100, 120, $p->category->title . " Category");
        $pdf->Image($result->getDataUri(), 30, 250, 30, 30, 'png');
        $pdf->Output('certificate.pdf', 'D');
    }
    
    public function destroy(Post $p)
    {
        //
    }
}
