<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RejectYourPost extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public function __construct($data)
    {
        $this->data = $data;

    }

    public function build()
    {
        return $this->view('emails.rejectPost')
            ->subject('للأسف لقد تم رفض نشر بحثك')
            ->with([
                'test_message' =>''
            ]);

    }
}
