<?php

return [
    'property_id' => env('GOOGLE_ANALYTICS_PROPERTY_ID', 'G-6HV0L5NBCE'),

    'service_account_credentials_json' => storage_path('app/analytics/dasa-wisma-kabupaten-jepara-0c8d21fa3504.json'),

    'cache' => [
        'enabled' => true,
        'store' => 'file',
        'ttl' => 3600, // Time to live in seconds
    ],
];
