<?php

return [
    'clock' => [
        'app' => [
            'date_time' => env('FORMAT_CLOCK_MOBILE_DATETIME', 'Y-m-d H:i'),
            'date' => env('FORMAT_CLOCK_MOBILE', 'Y-m-d'),
            'time' => env('FORMAT_CLOCK_MOBILE_TIME', 'H:i'),
        ],
        'website' => [
            'date_time' => env('FORMAT_CLOCK_WEBSITE_DATETIME', 'Y-m-d H:i'),
            'date' => env('FORMAT_CLOCK_WEBSITE', 'Y-m-d'),
            'time' => env('FORMAT_CLOCK_WEBSITE_TIME', 'H:i'),
        ]
    ]
];
