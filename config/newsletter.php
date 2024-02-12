<?php

return [

    'apiKey' => env('MAILCHIMP_APIKEY'),

    'defaultListName' => 'zinebMac',

    'lists' => [
        'zinebMac' => env('MAILCHIMP_LIST_ID'),
    ],

];
