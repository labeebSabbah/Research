<?php

namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function contact(Request $r)
    {
        $data = array(
            'name' => 'Website',
            'sent' => $r->message,
            'phone' => $r->phone,
        );

        Mail::send('mail', $data, function($message) use ($r) {
            $message->to("lablob.sabbah@gmail.com", "TDC Assassin")->subject($r->subject);
            $message->from($r->email, $r->name);
        });

        return redirect()->back();
    }
}
