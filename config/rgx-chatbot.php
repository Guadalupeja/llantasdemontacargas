<?php

return [
    'state_store' => env(
        'RGX_CHATBOT_STATE_STORE'
    ),

    'state_ttl_minutes' => (int) env(
        'RGX_CHATBOT_STATE_TTL_MINUTES',
        120
    ),

    'local_site' => [
        'id' => env(
            'RGX_CHATBOT_SITE_ID',
            'montacargas'
        ),

        'origin' => env(
            'RGX_CHATBOT_SITE_ORIGIN',
            'llantasdemontacargas.com'
        ),

        'default_vertical' => env(
            'RGX_CHATBOT_DEFAULT_VERTICAL',
            'montacargas'
        ),
    ],
];
