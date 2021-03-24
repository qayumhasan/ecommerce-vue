<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'stripe' => [
        'model'  => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => 'http://localhost/git/durbarit_eco/user/login/google/callback',
    ],

    'facebook' => [
        'client_id' => env('facebook_CLIENT_ID'),
        'client_secret' => env('facebook_CLIENT_SECRET'),
        'redirect' => 'http://localhost/git/durbarit_eco/user/login/facebook/callback',
    ],
    
    'paypal' => [
    'client_id' => 'sb-eag3n942845_api1.business.example.com',
    'secret' => 'ATybAbSzaQt--f8p5PIWeZQ3OmdNAlsxPg7q2UH1V2u8PuybQpVLQGgC'
        ],

];
