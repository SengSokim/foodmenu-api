<?php

return [
    'request' => [
        'timeout' => env('ONESIGNAL_REQUEST_TIMEOUT', 400), // timeout in seconds
        'base_url' => env('ONESIGNAL_REQUEST_BASE_URL', 'https://onesignal.com/api/v1'),
        'notification' => env('ONESIGNAL_REQUEST_NOTIFICATION', 'notifications'),
        'player' => env('ONESIGNAL_REQUEST_PLAYER', 'players'),
    ],
    'user' => [
        'app_id'    => env('ONESIGNAL_USER_APP_ID'),
        'app_key'   => env('ONESIGNAL_USER_APP_KEY')
    ],
    'client_user' => [
        'app_id'    => env('ONESIGNAL_CLIENT_USER_APP_ID'),
        'app_key'   => env('ONESIGNAL_CLIENT_USER_APP_KEY')
    ],
    'employee' => [
        'app_id'    => env('ONESIGNAL_EMPLOYEE_APP_ID', '9706fee2-66c1-45e8-b853-628f9fb608a0'),
        'app_key'   => env('ONESIGNAL_EMPLOYEE_APP_KEY', 'MGE0OTA0YzYtYmQ5Yy00MGNjLWE3MGYtM2Y1Zjk0MmU2ODVh')
    ]
];