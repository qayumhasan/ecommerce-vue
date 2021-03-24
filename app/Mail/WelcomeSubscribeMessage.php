<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeSubscribeMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $siteSettings;
     public $frontLogo;
    public function __construct($siteSettings, $frontLogo)
    {
        $this->siteSettings = $siteSettings;
        $this->frontLogo = $frontLogo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $siteSettings = $this->siteSettings; 
        $frontLogo = $this->frontLogo;
        return $this->view('mail_template.subscriber_welcome_mail', compact('siteSettings', 'frontLogo'));
    }
}
