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

    'postmark' => [
        'key' => env('POSTMARK_API_KEY'),
    ],

    'resend' => [
        'key' => env('RESEND_API_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    'shopee_official_url' => env('SHOPEE_OFFICIAL_URL', 'https://shopee.co.id/ryokiofficialstore'),

    'shopee' => [
        'official_url' => env('SHOPEE_OFFICIAL_URL', 'https://shopee.co.id/ryokiofficialstore'),
    ],

    'whatsapp' => [
        'number' => env('WHATSAPP_NUMBER', '6282384991316'),
        'display' => env('WHATSAPP_DISPLAY', '+62 823-8499-1316'),
    ],

    'google' => [
        'verification' => env('GOOGLE_SITE_VERIFICATION', 'c783BEYFw5kEyIolNOR5GijMGIMMPadqV7ZkgWyCB00'),
    ],

];
