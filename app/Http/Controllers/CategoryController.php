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
        ]);

        $data = $r->all();

        if ($r->hasFile('image')) {

            $r->validate([
                'image' => 'image'
            ]);

            try 
            {
                $target = 'uploads/categories/';
                $filename = $data['title'] . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move($target, $filename);
                $data['image'] = $target . $filename;
            } 
            catch (Exception $e) 
            {
                return back()->withErrors('');
            }

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
            'title' => 'required'
        ]);

        $data = $r->all();

        if ($r->hasFile('image')) {

            $r->validate([
                'image' => 'image'
            ]);

            try 
            {
                $target = 'uploads/categories/';
                $filename = $data['title'] . '.' . $data['image']->getClientOriginalExtension();
                $data['image']->move($target, $filename);
                $data['image'] = $target . $filename;
            } 
            catch (Exception $e) 
            {
                return back()->withErrors('');
            }

        }

        $c = Category::find($data['id']);

        $c->update($data);

        return redirect()->back();
    }

    public function destroy(Category $c)
    {
        $c->delete();
        return redirect()->back();
    }
}
