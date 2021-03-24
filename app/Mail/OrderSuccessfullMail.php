<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessfullMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $frontLogo;
    public $siteSettings;
    public function __construct($order, $frontLogo, $siteSettings)
    {
        $this->order = $order;
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
        $order = $this->order;
        $frontLogo = $this->frontLogo;
        $siteSettings = $this->siteSettings;
        
        return $this->view('mail_template.success_order_mail', compact('order', 'frontLogo', 'siteSettings'));
    }
}
