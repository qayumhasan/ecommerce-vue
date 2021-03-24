<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

   /**
     * Create a new message instance.
     *
     * @return void
     */
    public $orderPlace;
    public $frontLogo;
    public $siteSettings;
    public $userAddress;
    public $shippingAddress;
    public function __construct($orderPlace, $frontLogo, $siteSettings, $userAddress, $shippingAddress)
    {
        $this->orderPlace = $orderPlace;
        $this->frontLogo = $frontLogo;
        $this->siteSettings = $siteSettings;
        $this->userAddress = $userAddress;
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

       $orderPlace = $this->orderPlace;
       $frontLogo = $this->frontLogo;
       $siteSettings = $this->siteSettings;
       $userAddress = $this->userAddress;
       $shippingAddress = $this->shippingAddress;

        return $this->view('mail_template.success_payment_mail', compact('orderPlace', 'frontLogo', 'siteSettings', 'userAddress', 'shippingAddress'));
    }
}
