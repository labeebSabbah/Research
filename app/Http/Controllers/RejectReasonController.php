<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RejectReason;

class RejectReasonController extends Controller
{
    public function index()
    {
        $reject = RejectReason::all();
        return view('dashboard.admin.settings.reject', compact('reject'));
    }

    public function store(Request $r)
    {
        RejectReason::firstOrCreate(['name' => $r->name], ['description' => $r->description]);
        return redirect()->back();
    }

    public function update(Request $r)
    {
        $reason = RejectReason::where('name', $r->oldname)->first();
        $reason->update($r->all());
        return redirect()->back();
    }

    public function destroy(RejectReason $reason)
    {
        $reason->delete();
        return redirect()->back();
    }
}
