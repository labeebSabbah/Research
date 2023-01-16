<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{  
    public function index()
    {
        $posts = Post::where('author_id', auth()->user()->id)->get();
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
          $filename = $data['name'] . '_' . $data['title'] . ".pdf";  
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

    public function show()
    {
        $posts = Post::where('paid', 1)->where('status', 1)->get();
        return view('dashboard.admin.posts', compact('posts'));
    }

    public function edit(Post $p)
    {
        //
    }

    public function update(Request $r)
    {
        $data = $r->all();
        $p = Post::find($data['id']);
        
        if ($data['accepted']) {
            $date = date('Y-m-d');
            $p->update([
                'status' => 2,
                'published_on' => $date
            ]);
        } else {
            $p->update([
                'status' => 0
            ]);
        }

        return redirect()->back();
    }
    
    public function destroy(Post $p)
    {
        //
    }
}
