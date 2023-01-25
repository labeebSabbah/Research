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

                $v->update([ 'file' => VersionController::merge($files, $v->title, $category, $f)]);

            }
        }
        $v->posts()->attach($id);

        return $v->title;
    }

    public static function merge($files, $number, Category $category, Post $f)
    {
        $pdf = PDFMerger::init();

        $filename = 'uploads/versions/' . time() . '.pdf';

        $pdf->addPDF(VersionController::fill($category->cover_file, $number, $category->title, $filename));

        $pdf->addPDF($category->description_file, 'all');

        $pdf->addPDF(VersionController::indexing($files), 'all');

        foreach ($files as $file)
        {
            $pdf->addPDF($file->file, 'all');
        }

        $pdf->merge();
        $pdf->save($filename);

        return $filename;
    }

    public static function fill($cover, $no, $cat, $link)
    {
        $qr = VersionController::qr($link);

        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('local')->path('cover.pdf');

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setSourceFile($cover);
        $pdf->useTemplate($pdf->importPage(1));
        $pdf->setFont("DejaVuSans", "", 20);
        $pdf->WriteText(30, 20, "No. " . $no);
        $pdf->WriteText(100, 120, $cat . " Category");
        $pdf->Image($qr->getDataUri(), 30, 250, 30, 30, 'png');
        $pdf->Output($output, 'F');
        return $output;
    }

    public static function indexing($files)
    {
        $pdf = new \Mpdf\Mpdf();

        $output = Storage::disk('local')->path('index.pdf');

        $data = "";

        $id = 1;

        $pdf->AddPage();
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->setFont("DejaVuSans", "", 20);
        $pdf->WriteText(105, 10, "المحتويات");
        foreach ($files as $f)
        {
            $qr = VersionController::qr(url($f->file));
            $image = "<img src='{$qr->getDataUri()}'>";
            // dd($image);
            $data .= '<tr>'
            . '<td>' . $id . '</td>'
            . '<td>' . $f->title . '</td>'
            . "<td>{$image}</td>"
            . '</tr>';
            $id = $id + 1;
        }
        $html = '<table autosize="1" style="text-align: center; font-size: 50px;">
		<tr>
		<th style="width: 10%"><strong>رقم البحث</strong></th>
		<th style="width: 70%"><strong>اسم البحث</strong></th>
		<th style="width: 20%"><strong>QR</strong></th>
		</tr>
		'.$data.'
		</table>';
        $css = "table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
          }";
        $pdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
        $pdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
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

    public function index()
    {
        $versions = Version::with('category')->get();
        return view('dashboard.versions.index', compact('versions'));
    }

}
