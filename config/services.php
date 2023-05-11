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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'cognito' => [
        'credentials'       => [
            'key'    => env('NOVO_ACCESS_KEY_ID'),
            'secret' => env('NOVO_ACCESS_KEY_SECRET'),
            //'token' => null
        ],
        'app_client_id'     => env('NOVO_COGNITO_CLIENT_ID'),
        'app_client_secret' => env('NOVO_COGNITO_CLIENT_SECRET'),
        'user_pool_id'      => env('NOVO_COGNITO_USER_POOL_ID'),
        'region'            => env('NOVO_COGNITO_REGION', 'eu-west-1'),
        'version'           => env('NOVO_COGNITO_VERSION', 'latest'),
    ],

];
