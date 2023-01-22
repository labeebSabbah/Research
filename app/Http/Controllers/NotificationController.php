<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = Notification::orderBy('id', 'desc')->where('reciever_id', auth()->user()->id)->with('sender')->get();
        return view('dashboard.notifications', compact('notifications'));
    }

    public static function new($reciever, $message, $details = NULL)
    {
        Notification::create([
            'sender_id' => auth()->user()->id,
            'reciever_id' => $reciever,
            'message' => $message,
            'details' => $details
        ]);
    }

    public function seen()
    {
        $notifications = Notification::where('reciever_id', auth()->user()->id)->where('seen', 0)->get();
        foreach($notifications as $n)
        {
            $n->update(['seen' => 1]);
        }
    }

    public function read(Request $r)
    {
        Notification::find($r->id)->update(['read' => 1]);
    }
}
