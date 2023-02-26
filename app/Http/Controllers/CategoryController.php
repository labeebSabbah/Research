<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.admin.categories', compact('categories'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'title' => 'required',
            'num_of_posts' => 'required|numeric',
            'cover_file' => 'required|file',
            'description_file' => 'required|file',
            'certification_file' => 'required|file',
            'template_file' => 'required|file',
            'template_file_en' => 'required|file',
            'index_file' => 'required|file'
        ]);

        $data = $r->all();

        if ($r->hasFile('image'))
        {
            $r->validate([
                'image' => 'image',
            ]);

            try {
                $target = 'uploads/categories/';
                $filename = time() . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move($target, $filename);
                $data['image'] = $target . $filename;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        if ($r->hasFile('cover_file') && $r->hasFile('description_file') && $r->hasFile('certification_file') && $r->hasFile('template_file') && $r->hasFile('index_file')) {



            if ($data['cover_file']->getClientOriginalExtension() != 'pdf' || $data['description_file']->getClientOriginalExtension() != 'pdf' || $data['certification_file']->getClientOriginalExtension() != 'pdf' || $data['index_file']->getClientOriginalExtension() != 'pdf' || ($data['template_file']->getClientOriginalExtension() != 'doc' && $data['template_file']->getClientOriginalExtension() != 'docx')) {
                return back()->withErrors('');
            }

                try {

                    $target = 'uploads/categories/';

                    $filename = time() . '_cover.pdf';
                    $data['cover_file']->move($target, $filename);
                    //$data['cover_file'] = $target . $filename;
                    $data['cover_file'] = VersionController::check($target . $filename);

                    $filename = time() . '_description.pdf';
                    $data['description_file']->move($target, $filename);
                    //$data['description_file'] = $target . $filename;
                    $data['description_file'] = VersionController::check($target . $filename);

                    $filename = time() . '_certification.pdf';
                    $data['certification_file']->move($target, $filename);
                    //$data['certification_file'] = $target . $filename;
                    $data['certification_file'] = VersionController::check($target . $filename);

                    $filename = time() . '_index.pdf';
                    $data['index_file']->move($target, $filename);
                    //$data['index_file'] = $target . $filename;
                    $data['index_file'] = VersionController::check($target . $filename);

                    $filename = time() . '_template.' . $data['template_file']->getClientOriginalExtension();
                    $data['template_file']->move($target, $filename);
                    $data['template_file'] = $target . $filename;

                    $filename = time() . '_template_en.' . $data['template_file_en']->getClientOriginalExtension();
                    $data['template_file_en']->move($target, $filename);
                    $data['template_file_en'] = $target . $filename;

                } catch (\Throwable $th) {
                    //throw $th;
                }

        }

        Category::firstOrCreate(
            ['title' => $data['title']],
            $data
        );

        DB::table('categories')->update(array('certification_file' => $data['certification_file']));

        return redirect()->back();
    }

    public function update(Request $r)
    {
        $r->validate([
            'id' => 'required',
            'title' => 'required',
            'num_of_posts' => 'required|numeric'
        ]);

        $data = $r->all();

        $c = Category::find($data['id']);

        if ($r->hasFile('image')) {

            $r->validate([
                'image' => 'image'
            ]);

            try {
                if (file_exists($c->image)) {
                    unlink($c->image);
                }
            } catch (\Throwable $th) {

            }

            try
            {
                $target = 'uploads/categories/';
                $filename = time() . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move($target, $filename);
                $data['image'] = $target . $filename;
            }
            catch (Exception $e)
            {
                return back()->withErrors('');
            }

        }

        if ($r->hasFile('cover_file'))
        {
            $r->validate([
                'cover_file' => 'file'
            ]);

            try {
                if (file_exists($c->cover_file)) {
                    unlink($c->cover_file);
                }
            } catch (\Throwable $th) {
            }

            try {
                $target = 'uploads/categories/';
                $filename = time() . '_cover' . '.pdf';
                $data['cover_file']->move($target, $filename);
                //$data['cover_file'] = $target . $filename;
                $data['cover_file'] = VersionController::check($target . $filename);
            } catch (\Throwable $th) {
                //throw $th;
            }

            DB::table('posts')->where('category_id', $data['id'])->update(['new_cover' => '1']);

        }
		
		if ($r->hasFile('index_file'))
        {
            $r->validate([
                'index_file' => 'file'
            ]);

            try {
                if (file_exists($c->index_file)) {
                    unlink($c->index_file);
                }
            } catch (\Throwable $th) {
            }

            try {
                $target = 'uploads/categories/';
                $filename = time() . '_index' . '.pdf';
                $data['index_file']->move($target, $filename);
                //$data['index_file'] = $target . $filename;
                $data['index_file'] = VersionController::check($target . $filename);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        if ($r->hasFile('description_file'))
        {
            $r->validate([
                'description_file' => 'file'
            ]);

            try {
                if (file_exists($c->description_file))
                {
                    unlink($c->description_file);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }  try {
                $target = 'uploads/categories/';
                $filename = time() . '_description' . '.pdf';
                $data['description_file']->move($target, $filename);
                //$data['description_file'] = $target . $filename;
                $data['description_file'] = VersionController::check($target . $filename);
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        if ($r->hasFile('certification_file'))
        {
            $r->validate([
                'certification_file' => 'file'
            ]);

            try {
                if (file_exists($c->certification_file))
                {
                    unlink($c->certification_file);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }  try {
                $target = 'uploads/categories/';
                $filename = time() . '_certification' . '.pdf';
                $data['certification_file']->move($target, $filename);
                //$data['certification_file'] = $target . $filename;
                $data['certification_file'] = VersionController::check($target . $filename);
            } catch (\Throwable $th) {
                //throw $th;
            }

            DB::table('categories')->update(array('certification_file' => $data['certification_file']));
        }

        if ($r->hasFile('template_file'))
        {
            $r->validate([
                'template_file' => 'file'
            ]);

            try {
                if (file_exists($c->template_file))
                {
                    unlink($c->template_file);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }  try {
            $target = 'uploads/categories/';
            $filename = time() . '_template_file' . $data['template_file']->getClientOriginalExtension();
            $data['template_file']->move($target, $filename);
            $data['template_file'] = $target . $filename;
        } catch (\Throwable $th) {
            //throw $th;
        }
        }

        if ($r->hasFile('template_file_en'))
        {
            $r->validate([
                'template_file_en' => 'file'
            ]);

            try {
                if (file_exists($c->template_file_en))
                {
                    unlink($c->template_file_en);
                }
            } catch (\Throwable $th) {
                //throw $th;
            }  try {
            $target = 'uploads/categories/';
            $filename = time() . 'template_file_en' . $data['template_file_en']->getClientOriginalExtension();
            $data['template_file_en']->move($target, $filename);
            $data['template_file_en'] = $target . $filename;
        } catch (\Throwable $th) {
            //throw $th;
        }
        }

        $c->update($data);

        return redirect()->back();
    }

    public function templates()
    {
        $file = 'templates.zip';

        if (file_exists($file))
        {
            unlink($file);
        }

        $zip = new \ZipArchive();
        $zip->open($file, \ZipArchive::CREATE);

        $categories = Category::where('template_file', '!=', NULL)->get();

        foreach ($categories as $c) {
            $filename = $c->title . '.' . pathinfo($c->template_file, PATHINFO_EXTENSION);
            $zip->addFile($c->template_file, $filename);
        }

        $zip->close();

        return response()->download($file);
    }

    public function destroy(Category $c)
    {
        $c->delete();
        return redirect()->back();
    }
}
