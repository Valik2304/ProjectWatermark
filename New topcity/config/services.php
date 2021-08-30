<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'braintree' => [
        'environment' => env('BT_ENVIRONMENT', 'sandbox'),
        'merchantId' => env('BT_MERCHANT_ID'),
        'publicKey' => env('BT_PUBLIC_KEY'),
        'privateKey' => env('BT_PRIVATE_KEY'),
    ],
    'google' => [
        'client_id' => env ('GOOGLE_CLIENT_ID','725247205261-irjpl0nf74po0ck2r0egr8ubgdk0e2p6.apps.googleusercontent.com'),
        'client_secret' => env ('GOOGLE_CLIENT_SECRET','KVXC-SwWMGlW0Lk4xzLTUPM3'),
        'redirect' => env ('GOOGLE_REDIRECT','http://topcity.dev.devloop.pro/callback/google'),
    ],
    'facebook' => [
        'client_id' => env ('FACEBOOK_APP_ID','421926721736909'),
        'client_secret' => env ('FACEBOOK_APP_SECRET','41774a42e92a6e3e6c3bfbb595458d87'),
        'redirect' => env ('FACEBOOK_REDIRECT','https://topcity.dev.devloop.pro/callback/facebook'),
    ],
];
