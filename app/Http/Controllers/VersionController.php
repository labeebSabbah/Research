<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Version;
use App\Models\Category;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

use File;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class VersionController extends Controller
{

    public static function store($c, Post $f, $id)
    {

        $category = Category::find($c);

        $v = Version::where('category_id', $c)->latest()->first();
        if ($v === NULL) {
            $v = Version::create([
                'title' => 1,
                'file' => VersionController::merge([$f], 1, $category, $f),
                'category_id' => $c
            ]);
        } else {

            if (count($v->posts) >= $category->num_of_posts)
            {
                $v = Version::create([
                    'title' => ($v->title + 1),
                    'file' => VersionController::merge([$f], $v->title + 1, $category, $f),
                    'category_id' => $c
                ]);

            } else {

                foreach($v->posts as $p)
                {
                    $files[] = $p;
                }

                $files[] = $f;

                if (file_exists($v->file)) {
                    unlink($v->file);
                }

                $v->update([ 'file' => VersionController::merge($files, $v->title, $category, $f, $v->file)]);

            }
        }
        $v->posts()->attach($id);

        return $v;
    }

    public function rebuild(Version $v)
    {
        $files = [];
        foreach($v->posts as $p)
        {
            $files[] = $p;
        }
        if (file_exists($v->file))
        {
            unlink($v->file);
        }
        $v->update([ 'file' => VersionController::merge($files, $v->title, $v->category, new Post(), $v->file)]);
        return redirect()->back()->with('success', 'تم إعادة انشاء المجلد بنجاح');
    }

    public static function merge($files, $number, Category $category, Post $f, $name = NULL)
    {
        $pdf = PDFMerger::init();

        $filename = 'uploads/versions/' . time() . '.pdf';

        if($name != NULL)
        {
            $filename = $name;
        }
        
        $pdf->addPDF(VersionController::fill($category->cover_file, $number, $category->title, $filename));

        $pdf->addPDF($category->description_file, 'all');

        $pdf->addPDF(VersionController::indexing($files, $category->index_file), 'all');

        foreach ($files as $file)
        {
            $pdf->addPDF(VersionController::cover($file, $category->cover_file, $number), 'all');
            $pdf->addPDF($file->file, 'all');
        }

        $pdf->merge();
        $pdf->save($filename);

        $f = self::writeAll($filename,$number);

        $title = $category->title . ' المجلد رقم ' . $number . ' العدد رقم 1';

        return VersionController::setMetaData($filename, $title, 'مجلة أبحاث المعرفة الانسانية الجديدة');
    }



    public static function fill($cover, $no, $cat, $link)
    {
        $qr = VersionController::qr(url($link));

        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('local')->path('cover.pdf');

        if(file_exists($output))
        {
            unlink($output);
        }

        $text = 'المجلد رقم : '.$no . ' العدد رقم 1 ';
        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($cover);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);
        $pdf->WriteText(65, 200, $text);
        $pdf->Image($qr->getDataUri(), 15, 237, 30, 30, 'png');
        $pdf->Output($output, 'F');
        return $output;
    }

    public static function indexing($files, $index)
    {
        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('local')->path('index.pdf');

        if(file_exists($output))
        {
            unlink($output);
        }

        $data = "";

        $id = 1;

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($index);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);
        foreach ($files as $f)
        {
            $qr = VersionController::qr(url($f->file));
            $image = "<img src='{$qr->getDataUri()}'>";
            $data .= '<tr>'
            . '<td>' . $id . '</td>'
            . '<td>' . $f->title . '<br>' . $f->user->name .'<br>'.date_format($f->published_on, 'Y-m-d'). '</td>'
            . "<td>{$image}</td>"
            . '</tr>';
            $id = $id + 1;
        }
        $html = '
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <table autosize="1" style="text-align: center; font-size: 50px;">
		<tr>
		<th style="width: 10%"><strong>تسلسل</strong></th>
		<th style="width: 70%"><strong>اسم البحث</strong></th>
		<th style="width: 20%"><strong>QR</strong></th>
		</tr>
		'.$data.'
		</table>';
        $css = "table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
          }
          ";
        $pdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $pdf->Output($output, 'F');
        return $output;
    }

    public static function cover($post, $cover, $no)
    {
        $qr = VersionController::qr(url($post->file));
        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('local')->path(rand(1, 1000000) . '.pdf');

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($cover);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);
        //$pdf->WriteText(15, 15, "No. " . $no);
        $date = date_format($post->created_at, 'Y-m-d');
        $html = "<div style='text-align: center; position: fixed; top: 60%; width: 100%; font-size: 35px;'>
        <p style='font-size: 20px;'>1 العدد رقم ". $no . " : المجلد رقم</p>
        <p>{$post->title}</p>
        <p>{$post->user->name}</p>
        <p>{$date} : تاريخ النشر</p>
    </div>";
        $pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $pdf->Image($qr->getDataUri(), 15, 237, 30, 30, 'png');
        $pdf->Output($output, 'F');
        return $output;
    }

    public static function qr($link)
    {
        $qr = Builder::create()
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

        return $qr;
    }

    public static function setMetaData($file, $title, $author, $subject = 'مجلة أبحاث المعرفة الانسانية الجديدة')
    {
        $pdf = new \Mpdf\Mpdf();
        $pagecount = $pdf->SetSourceFile(public_path($file));
        for ($i=1; $i<=$pagecount; $i++) {
            $import_page = $pdf->ImportPage($i);
            $pdf->UseTemplate($import_page);

            if ($i < $pagecount)
                $pdf->AddPage();
        }

        if ($author == 'مجلة أبحاث المعرفة الانسانية الجديدة')
            $output = Storage::disk('public')->path(basename($file));
        else
            $output = Storage::disk('public')->path('posts/' . basename($file));

        $pdf->SetTitle($title);

        $pdf->SetAuthor($author);

        $pdf->SetSubject($subject);

        $pdf->Output($output, 'F');

        if ($author == 'مجلة أبحاث المعرفة الانسانية الجديدة') {
            $filename = 'versions/' . basename($output);
            Version::where('file', $file)->update(['file' => $filename]);
        }
        else {
            $filename = 'versions/posts/' . basename($output);
            Post::where('file', $file)->update(['file' => $filename]);
        }

        return $filename;
    }

    public function index()
    {
         $versions = Version::with(['category','posts'])->orderBy('category_id', 'asc')->get();
        return view('dashboard.versions.index', compact('versions'));
    }

    public static function writeAll($filename,$number){
        $pdf = PDFMerger::init();
        $pdf->addPDF(self::writeSerialNumberForAllFile($filename,$number));
        $pdf->merge();
        $pdf->save($filename);
        return $filename;
    }
    public static function writeSerialNumberForAllFile($file_name,$no){
        $output = Storage::disk('local')->path('post.pdf');
        if(file_exists($output))
        {
            unlink($output);
        }
        $pdf = new \Mpdf\Mpdf();
        $count = $pdf->setSourceFile(public_path($file_name));
        $text = 'المجلد رقم : '.$no . ' العدد رقم 1 ';
        for ($i=1; $i<=$count; $i++){
            $pdf->AddPage();
            $pdf->autoScriptToLang = true;
            $pdf->autoLangToFont = true;
            $pdf->useTemplate($pdf->importPage($i));
            $pdf->setFont("DejaVuSans", "", 10);
            $pdf->WriteText(15, 5, $text);
        }
        $pdf->Output($output, 'F');
        return $output;
    }

}
