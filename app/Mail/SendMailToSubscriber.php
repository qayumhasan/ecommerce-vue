<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailToSubscriber extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mail_subject;
    public $mail_text;
    public function __construct($subject, $mail_text)
    {
        $this->mail_subject = $subject;
        $this->mail_text = $mail_text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->mail_subject;
        $mail_text = $this->mail_text;
        return $this->view('admin.ecommerce.send_mail.mail_template.mail_template', compact('subject', 'mail_text'));
    }
}
