<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('dashboard.admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('dashboard.admin.pages.add');
    }

    public function store(Request $r)
    {
        $r->validate([
            'name' => 'required'
        ]);

        $post = Page::firstOrCreate(['name' => $r->name], $r->all());
        return redirect()->route('dashboard.pages.index');
    }

    public function show(Page $page)
    {
        return view('page', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('dashboard.admin.pages.edit', compact('page'));
    }

    public function update(Request $r, Page $page)
    {
        $r->validate([
            'name' => 'required'
        ]);

        $page->update($r->all());
        return redirect()->back();
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->back();
    }
}
