<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $username;
    public $token;
    public $frontLogo;
    public $siteSettings;
    public function __construct($username,$token, $frontLogo, $siteSettings)
    {
        $this->username = $username;
        $this->token = $token;
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
        $username = $this->username;
        $token = $this->token;
        $frontLogo = $this->frontLogo;
        $siteSettings = $this->siteSettings;
        return $this->view('mail_template.user_verification_mail', compact('username', 'token', 'frontLogo', 'siteSettings'));
    }
}
