<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Version;
use App\Models\Category;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class VersionController extends Controller
{
    public static function store($c, $f, $id)
    {
        $v = Version::where('category_id', $c)->latest()->first();
        if ($v === NULL) {

            $v = Version::create([
                'title' => 1,
                'file' => VersionController::merge([$f]),
                'category_id' => $c
            ]);

        } else {

            if (count($v->posts) == 5)
            {
                $v = Version::create([
                    'title' => ($v->title + 1),
                    'file' => VersionController::merge([$f]),
                    'category_id' => $c
                ]);
            } else {

                $files = [];

                foreach($v->posts as $p)
                {
                    $files[] = $p->file;
                }

                $files[] = $f;

                unlink(public_path() . '/' . $v->file);

                $v->update([ 'file' => VersionController::merge($files)]);

            }
        }
        $v->posts()->attach($id);
    }

    public static function merge($files)
    {
        $pdf = PDFMerger::init();

        foreach ($files as $file)
        {
            $pdf->addPDF($file, 'all');
        }

        $filename = 'uploads/versions/' . time() . '.pdf';
        $pdf->merge();
        $pdf->save($filename);

        return $filename;
    }

    // public function index()
    // {
    //     $versions = Version::all();
    //     return view('dashboard.versions.index', compact('versions'));
    // }

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
