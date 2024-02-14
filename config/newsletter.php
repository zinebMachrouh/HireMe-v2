<?php

return [

    'driver' => env('NEWSLETTER_DRIVER', Spatie\Newsletter\Drivers\MailChimpDriver::class),
    'driver_arguments' => [
        'api_key' => env('MAILCHIMP_APIKEY'),

        'endpoint' => env('MAILCHIMP_ENDPOINT'),
    ],


    'lists' => [

        'subscribers' => [
            'id' => env('MAILCHIMP_LIST_ID'),
        ],
    ],
];
