<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Version;

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

    public function category(Category $category)
    {
        $version = Version::where('category_id', $category->id)->latest()->first();
        return view('category', compact('category', 'version'));
    }

    public function templates()
    {
        $categories = Category::all();
        return view('templates', compact('categories' ));
    }

    public function search()
    {
        return view('search');
    }
}
