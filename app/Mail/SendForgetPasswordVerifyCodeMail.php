<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendForgetPasswordVerifyCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $Info;
    public $frontLogo;
    public $siteSettings;
    public function __construct($userInfo, $frontLogo, $siteSettings)
    {
        $this->Info = $userInfo;
        $this->frontLogo = $frontLogo;
        $this->siteSettings = $siteSettings;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $userInfo = $this->Info;
        $frontLogo = $this->frontLogo;
        $siteSettings = $this->siteSettings;
        return $this->view('mail_template.forget_password_mail_template', compact('userInfo', 'frontLogo','siteSettings'));
    }
}
