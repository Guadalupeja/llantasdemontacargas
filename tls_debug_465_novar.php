<?php

$host = 'smtp.gmail.com';
$port = 465;

$context = stream_context_create([
    'ssl' => [
        'capture_peer_cert' => true,

        // SOLO PARA DEBUG: desactivar verificación para poder capturar el cert
        'verify_peer' => false,
        'verify_peer_name' => false,

        'SNI_enabled' => true,
        'peer_name' => $host,
    ],
]);

$fp = stream_socket_client(
    "ssl://{$host}:{$port}",
    $errno,
    $errstr,
    15,
    STREAM_CLIENT_CONNECT,
    $context
);

if (!$fp) {
    echo "NO CONECTA: $errno $errstr\n";
    exit;
}

echo "CONECTADO OK\n";

$params = stream_context_get_params($fp);

if (!empty($params['options']['ssl']['peer_certificate'])) {
    $cert = $params['options']['ssl']['peer_certificate'];
    $info = openssl_x509_parse($cert);

    echo "\n=== ISSUER ===\n";
    print_r($info['issuer'] ?? []);

    echo "\n=== SUBJECT ===\n";
    print_r($info['subject'] ?? []);

    echo "\n=== VALID FROM / TO ===\n";
    echo date('c', $info['validFrom_time_t'] ?? 0) . "\n";
    echo date('c', $info['validTo_time_t'] ?? 0) . "\n";
} else {
    echo "No pude capturar peer_certificate.\n";
}

fclose($fp);
