<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Version;
use App\Models\Category;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class VersionController extends Controller
{

    public static function store($c, $f, $id)
    {

        $category = Category::find($c);

        $v = Version::where('category_id', $c)->latest()->first();
        if ($v === NULL) {

            $v = Version::create([
                'title' => 1,
                'file' => VersionController::merge([$category->description_file, $f], 1, $category),
                'category_id' => $c
            ]);

        } else {

            if (count($v->posts) >= $category->num_of_posts)
            {
                $v = Version::create([
                    'title' => ($v->title + 1),
                    'file' => VersionController::merge([$category->description_file, $f], $v->title + 1, $category),
                    'category_id' => $c
                ]);

            } else {

                $files = [$category->description_file];

                foreach($v->posts as $p)
                {
                    $files[] = $p->file;
                }

                $files[] = $f;

                if (file_exists($v->file)) {
                    unlink($v->file);
                }

                $v->update([ 'file' => VersionController::merge($files, $v->title, $category)]);

            }
        }
        $v->posts()->attach($id);

        return $v->title;
    }

    public static function merge($files, $number, Category $category)
    {
        $pdf = PDFMerger::init();

        $filename = 'uploads/versions/' . time() . '.pdf';

        $pdf->addPDF(VersionController::fill($category->cover_file, $number, $category->title, $filename));

        foreach ($files as $file)
        {
            $pdf->addPDF($file, 'all');
        }

        $pdf->merge();
        $pdf->save($filename);

        return $filename;

        VersionController::fill($category->cover_file, $number, $category->title, $filename);
    }

    public static function fill($cover, $no, $cat, $link)
    {
        $result = Builder::create()
        ->writer(new PngWriter())
        ->writerOptions([])
        ->data($link)
        ->encoding(new Encoding('UTF-8'))
        ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
        ->size(300)
        ->margin(10)
        ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
        ->validateResult(false)
        ->build();

        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('local')->path('output.pdf');

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($cover);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);
        $pdf->WriteText(30, 20, "No. " . $no);
        $pdf->WriteText(100, 120, $cat . " Category");
        $pdf->Image($result->getDataUri(), 30, 250, 30, 30, 'png');
        $pdf->Output($output, 'F');
        return $output;
    }

    public function index()
    {
        $versions = Version::with('category')->get();
        return view('dashboard.versions.index', compact('versions'));
    }

    // public function store(Request $r)
    // {
    //     $r->validate([
    //         'title' => 'required',
    //     ]);

    //     $data = $r->all();

    //     if ($r->hasFile('image')) {

    //         $r->validate([
    //             'image' => 'image'
    //         ]);

    //         try 
    //         {
    //             $target = 'uploads/versions/';
    //             $filename = $data['title'] . '.' . $data['image']->getClientOriginalExtension();
    //             $data['image']->move($target, $filename);
    //             $data['image'] = $target . $filename;
    //         } 
    //         catch (Exception $e) 
    //         {
    //             return back()->withErrors('');
    //         }

    //     }


    //     Version::firstOrCreate(
    //         ['title' => $data['title']],
    //         $data
    //     );

    //     return redirect()->back();
    // }

    // public function show(Version $version)
    // {
    //     $selected = [];
    //     $posts = Post::where('published_on', '!=', NULL)->get();
    //     foreach($version->posts as $p) {
    //         $selected[] = $p->id;
    //     }
    //     return view('dashboard.versions.posts', compact(['posts', 'selected', 'version']));
    // }

    // public function update(Request $r, Version $version)
    // {
    //     $detach = [];
    //     $attach = $r->posts;
    //     foreach ($version->posts as $p){

    //         if (array_search($p->id, $attach)) {
    //             $attach = array_diff($attach, [$p->id]);
    //         } else {
    //             $detach[] = $p->id;
    //         }

    //     }
    //     $version->posts()->detach($detach);
    //     $version->posts()->attach($attach);
    //     return redirect()->route('dashboard.versions.index');
    // }

    // public function updateData(Request $r)
    // {
    //     $r->validate([
    //         'id' => 'required',
    //         'title' => 'required'
    //     ]);

    //     $data = $r->all();

    //     if ($r->hasFile('image')) {

    //         $r->validate([
    //             'image' => 'image'
    //         ]);

    //         try 
    //         {
    //             $target = 'uploads/versions/';
    //             $filename = $data['title'] . '.' . $data['image']->getClientOriginalExtension();
    //             $data['image']->move($target, $filename);
    //             $data['image'] = $target . $filename;
    //         } 
    //         catch (Exception $e) 
    //         {
    //             return back()->withErrors('');
    //         }

    //     }

    //     $c = Version::find($data['id']);

    //     $c->update($data);

    //     return redirect()->back();
    // }

    // public function destroy(Version $version)
    // {
    //     $version->delete();
    //     return redirect()->back();
    // }
}
