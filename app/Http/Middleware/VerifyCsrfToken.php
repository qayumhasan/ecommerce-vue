<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/pay-via-ajax', '/success','/cancel','/fail','/ipn','payment/ssl_commercez/success','payment/ssl_commercez/fail','/response','payment/make_payment','/compare/surjopay/payment','/wallet/ssl/success','/wallet/ssl/cancle','/wallet/ssl/fail'
    ];
}
