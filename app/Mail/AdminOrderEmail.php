<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminOrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailSubject;
    public $mailContent;
    
    public function __construct($mailSubject, $mailContent)
    {
        $this->mailSubject = $mailSubject;
        $this->mailContent = $mailContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'mail_content' => $this->mailContent
        ];
        return $this->view('emails.order', $data)->subject($this->mailSubject);
    }
}
