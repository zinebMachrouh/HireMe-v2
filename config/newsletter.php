<?php

return [

    'apiKey' => env('MAILCHIMP_APIKEY'),

    'defaultListName' => 'subscribers',

    'lists' => [
        'subscribers' => env('MAILCHIMP_LIST_ID'),
    ],

];
