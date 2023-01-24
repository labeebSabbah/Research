<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'certification_file' => 'required|file'
        ]);

        $data = $r->all();

        if ($r->hasFile('image') && $r->hasFile('cover_file') && $r->hasFile('description_file') && $r->hasFile('certification_file')) {

            $r->validate([
                'image' => 'image',
            ]);

            if ($data['cover_file']->getClientOriginalExtension() != 'pdf' || $data['description_file']->getClientOriginalExtension() != 'pdf' || $data['certification_file']->getClientOriginalExtension() != 'pdf') {
                return back()->withErrors('');
            }

                $target = 'uploads/categories/';
                $filename = time() . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move($target, $filename);
                $data['image'] = $target . $filename;

                $filename = time() . '_cover' . '.pdf';
                $data['cover_file']->move($target, $filename);
                $data['cover_file'] = $target . $filename;

                $filename = time() . '_description' . '.pdf';
                $data['description_file']->move($target, $filename);
                $data['description_file'] = $target . $filename;

                $filename = time() . '_certification' . '.pdf';
                $data['certification_file']->move($target, $filename);
                $data['certification_file'] = $target . $filename;

        }


        Category::firstOrCreate(
            ['title' => $data['title']],
            $data
        );

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
                $data['cover_file'] = $target . $filename;
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
                $data['description_file'] = $target . $filename;
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
                $data['certification_file'] = $target . $filename;
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        $c->update($data);

        return redirect()->back();
    }

    public function destroy(Category $c)
    {
        $c->delete();
        return redirect()->back();
    }
}
