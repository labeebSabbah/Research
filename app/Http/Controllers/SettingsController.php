<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function social()
    {
        $socials = Settings::where('page', 1)->get();
        return view('dashboard.admin.settings.social', compact('socials'));
    }

    public function contact()
    {
        $contact = Settings::where('page', 2)->get();
        return view('dashboard.admin.settings.contact', compact('contact'));
    }

    public function about()
    {
        $about = Settings::where('page', 3)->get();
        return view('dashboard.admin.settings.about', compact('about'));
    }

    public function reject()
    {
        $reject = Settings::where('page', 4)->get();
        return view('dashboard.admin.settings.reject', compact('reject'));
    }

    public function share()
    {
        $share = Settings::where('page', 5)->first();
        return view('dashboard.admin.settings.share', compact('share'));
    }

    public function add(Request $r)
    {
        $data = $r->all();
        if ($data['name'] === NULL) {
            return redirect()->back();
        }
        Settings::firstOrCreate(
            ['name' => $data['name']],
            [
                'value' => $data['value'] ?? '',
                'page' => $data['page']
            ]
        );
        return redirect()->back();
    }

    public function update(Request $r)
    {
        $data = $r->all();
        $s = Settings::where('name', $data['oldname'])->first();
        $s->update($data);
        return redirect()->back();
    }

    public function destroy(Settings $s)
    {
        $s->delete();
        return redirect()->back();
    }
}
