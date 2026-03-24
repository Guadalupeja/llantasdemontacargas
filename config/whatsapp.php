<?php

return [
    'enabled' => true,

    'brand' => 'RUGUEX',

    'phone' => '528332395885', // sin + para URLs de WhatsApp
    'message' => '¡Hola RUGUEX! Tengo una pregunta.',

    'icon' => '/img/whatsapp_3938041.png',

    'privacy_url' => '/politica-de-privacidad',

    'schedule' => [
        'days' => [1, 2, 3, 4, 5], // 1 = lunes, 7 = domingo
        'start_hour' => 9,
        'end_hour' => 18, // se muestra mientras la hora sea < 18
    ],

    'texts' => [
        'header' => 'RUGUEX',
        'subheader' => 'Normalmente responde en cuestión de minutos.',
        'message_bubble' => '¿Qué tipo de llanta estás buscando?',
        'button' => 'Enviar WhatsApp',
        'bubble' => 'Cotiza por WhatsApp',
        'online' => 'En línea',
    ],

    'google_ads' => [
        'push_datalayer' => true,

        // Opcional: si además quieres disparar conversión directa con gtag
        'use_gtag_direct' => false,
        'send_to' => null, // ejemplo: 'AW-123456789/AbCdEfGhIjKlMnOpQr'
    ],
];