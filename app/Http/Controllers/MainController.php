<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Version;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $versions = Version::with('category')->get();
        return view('welcome', compact(['categories', 'versions']));
    }

    public function search()
    {
        return view('search');
    }
}
