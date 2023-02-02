<?php

namespace App\Http\Controllers;

use Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function contact(Request $r)
    {
        $data = array(
            'name' => $r->name,
            'sent' => $r->message,
            'phone' => $r->phone,
        );

        Mail::send('mail', $data, function($message) use ($r) {
            $message->to("info@globaljournal.web.jo", "TDC Assassin")->subject($r->subject);
            $message->from($r->email, $r->name);
        });

        return redirect(route('contact'))->with('success','تمت عملية الارسال بنجاح');
    }
}
