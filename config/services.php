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

    'google' => [
        'app_name'          => 'Squash Time Management',
        'client_id'         => '818925611138-t8egvk0hu1q0iu6bn4vfri2sg7md0cmp.apps.googleusercontent.com',
        'client_secret'     => 'QuqK7EDvLzziXEFuQgdn3LxT',
        'api_key'           => 'AIzaSyB0pkrrKnMh4051dqFe0T2T5Uul2r7C6ZE',
        'redirect'          => 'http://squash.borostomi.eu/auth/google/callback'
    ]

];
