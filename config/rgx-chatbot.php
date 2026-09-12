<?php

return [
    'state_store' => env(
        'RGX_CHATBOT_STATE_STORE'
    ),

    'state_ttl_minutes' => (int) env(
        'RGX_CHATBOT_STATE_TTL_MINUTES',
        120
    ),


    /*
     * Sitios externos autorizados para consumir
     * el RGX Assistant Core de servidor a servidor.
     *
     * Los tokens permanecen exclusivamente en
     * variables de entorno del Core y del adaptador.
     */
    'core_sites' => [
        'minicargadores' => [
            'token' => env(
                'RGX_CHATBOT_CORE_TOKEN_MINICARGADORES'
            ),

            'origin' =>
                'llantasparaminicargadores.com',

            'default_vertical' =>
                'minicargadores',
        ],

        'bobcat' => [
            'token' => env(
                'RGX_CHATBOT_CORE_TOKEN_BOBCAT'
            ),

            'origin' =>
                'llantasbobcat.com',

            'default_vertical' =>
                'minicargadores',
        ],
    ],

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
