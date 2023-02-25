<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Version;
use App\Models\Post;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function contact()
    {
        return view('contact');
    }

    public function notActiveAccount(){
        return view('notActiveAccount');
    }

    public function category(Category $category)
    {
        $version = Version::where('category_id', $category->id)->latest()->first();
        return view('category', compact('category', 'version'));
    }

    public function version(Version $version)
    {
        $category = Category::find($version->category_id);
        return view('category', compact(['category' ,'version']));
    }

    public function templates()
    {
        $categories = Category::all();
        return view('templates', compact('categories' ));
    }

    public function search(Request $r)
    {
        if ($r->search == NULL)
            $posts = [];
        else
        $posts = Post::where('title', 'LIKE', '%' . $r->search . '%')->where('published_on', '!=', NULL)->paginate(15);
        return view('search', compact('posts'));
    }
}
