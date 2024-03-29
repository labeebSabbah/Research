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

    public static function store($c, Post $f, $id)
    {

        $category = Category::find($c);

        $v = Version::where('category_id', $c)->latest()->first();
        if ($v === NULL) {
            self::cover($f, $category->cover_file, 1);
            $v = Version::create([
                'title' => 1,
                'file' => VersionController::merge([$f], 1, $category, $f),
                'category_id' => $c
            ]);
        } else {

            if (count($v->posts) >= $category->num_of_posts)
            {
                self::cover($f, $category->cover_file, $v->title + 1);
                $v = Version::create([
                    'title' => ($v->title + 1),
                    'file' => VersionController::merge([$f], $v->title + 1, $category, $f),
                    'category_id' => $c
                ]);

            } else {

                self::cover($f, $category->cover_file, $v->title);

                $files = [];

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
        self::setMetaData($f->file, $f->title . ' ' . $f->category->title, $f->user->name);

        $v->posts()->attach($id);

        return $v;
    }

    public function rebuild(Version $v)
    {
        $files = [];
        foreach($v->posts as $p)
        {
            self::cover($p, $p->category->cover_file, $v->title);
            $files[] = $p;
            $certificate = PostController::certificate($p,$v);
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
            $pdf->addPDF($file->file, 'all');
        }

        $pdf->merge();
        $pdf->save($filename);

        $f = self::writeAll($filename,$number);

        $title = $category->title . ' المجلد رقم ' . $number . ' العدد رقم 1';
        return VersionController::setMetaData($filename, $title, 'مجلة أبحاث المعرفة الانسانية الجديدة');;
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

        //$html = '<img style="width: 150px;height: 150px;margin-top:900px;" src= "'.$qr->getDataUri().'" >';

        $text = 'المجلد رقم  '.$no . ' العدد رقم 1 ';
        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($cover);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);

        $pdf->Image($qr->getDataUri(), 15, 251, 30, 30, 'png');
        $pdf->WriteText(65, 200, $text);
        //$pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
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
            $image = "<img width='150' src='{$qr->getDataUri()}'>";
            $data .= '<tr style="font-size: 33px">'
            . '<td style="font-size: 33px" >' . $id . '</td>'
            . '<td style="font-size: 33px">' . $f->title . '<br>' . $f->user->name .'<br>'.date_format($f->published_on, 'Y-m-d'). '</td>'
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

        if ($post->new_cover == false)
        {
            return 0;
        }

        $post->new_cover = false;

        $post->save();

        $qr = VersionController::qr(url($post->file));
        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('public')->path('posts/' . basename($post->file));

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($cover);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);
        $date = date_format($post->published_on, 'Y-m-d');
        $html = "<div style='text-align: center; position: fixed; top: 60%; width: 100%;font-size: 24px;'>
       <p style='direction: rtl'>المجلد رقم ". $no . "  العدد رقم 1 </p>
        <p>{$post->title}</p>
        <p>{$post->user->name}</p>
        <p>{$date} : تاريخ النشر</p>
    </div>";
        $pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $pdf->Image($qr->getDataUri(), 15, 251, 30, 30, 'png');

        $pdf->AddPage();
        $pagecount = $pdf->SetSourceFile(public_path($post->file));
        for ($i=1; $i<=$pagecount; $i++) {
            $import_page = $pdf->ImportPage($i);
            $pdf->UseTemplate($import_page);

            if ($i < $pagecount)
                $pdf->AddPage();
        }

        $pdf->Output($output, 'F');

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
        //$text = 'المجلد رقم : '.$no . ' العدد رقم 1 ';
        $text = 'Volume '.$no .' Issue 01, New Humanitarian Knowledge Research, ISSN:2708-7239 Print ISSN:2710-5059 Online';
        for ($i=1; $i<=$count; $i++){
            $pdf->AddPage();
            $pdf->autoScriptToLang = true;
            $pdf->autoLangToFont = true;
            $pdf->useTemplate($pdf->importPage($i));
            $pdf->setFont("DejaVuSans", "", 9);
            $pdf->WriteText(12, 5, $text);
        }
        $pdf->Output($output, 'F');
        return $output;
    }

    public static function check($file)
    {
        $filepdf = fopen(public_path($file),"r");
        if ($filepdf) {
            $line_first = fgets($filepdf);
            fclose($filepdf);
        } else{
            dd('error opening the file.');
        }
        // extract number such as 1.4 ,1.5 from first read line of pdf file
        preg_match_all('!\d+!', $line_first, $matches);
        // save that number in a variable
        $pdfversion = implode('.', $matches[0]);


        if ($pdfversion > "1.4")
        {
            $new = pathinfo($file, PATHINFO_DIRNAME) . '/' . pathinfo($file, PATHINFO_FILENAME) . '1.pdf';

            shell_exec('gswin64 -dBATCH -dNOPAUSE -q -sDEVICE=pdfwrite -sOutputFile="'.public_path($new).'" "' . public_path($file) . '"');
            unlink($file);
            return $new;
        }

        return $file;
    }

}
