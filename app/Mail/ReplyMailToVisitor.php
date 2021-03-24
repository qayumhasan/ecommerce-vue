<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMailToVisitor extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $subject;
    public $content;
    public $name;

    public function __construct($reply_subject, $reply_content, $reply_name)
    {
        $this->subject = $reply_subject;
        $this->content = $reply_content;
        $this->name = $reply_name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $reply_subject = $this->subject;
        $reply_content = $this->content;
        $reply_name = $this->name;
        return $this->view('admin.ecommerce.send_mail.mail_template.reply_mail_template', compact('reply_subject', 'reply_content', 'reply_name'));
    }
}
