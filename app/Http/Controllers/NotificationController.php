<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public static function new($reciever, $message)
    {
        Notification::create([
            'sender_id' => auth()->user()->id,
            'reciever_id' => $reciever,
            'message' => $message,
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
