<?php

return [
    'server' => [
        'admin' => [
            'status' => env('SYSTEM_SERVER_ADMIN_STATUS', 'operational')
        ],
        'operator' => [
            'status' => env('SYSTEM_SERVER_OPERATOR_STATUS', 'operational')
        ],
        'driver' => [
            'status' => env('SYSTEM_SERVER_DRIVER_STATUS', 'operational')
        ],
        'customer' => [
            'status' => env('SYSTEM_SERVER_CUSTOMER_STATUS', 'operational')
        ],
        'dgs' => [
            'status' => env('SYSTEM_SERVER_DGS_STATUS', 'operational')
        ]
    ],
    'icon_url' => env('SYSTEM_ICON_URL', ''),
];
