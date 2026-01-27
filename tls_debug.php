<?php

$host = 'smtp.gmail.com';
$port = 465;

$context = stream_context_create([
    'ssl' => [
        'capture_peer_cert' => true,
        'verify_peer' => true,
        'verify_peer_name' => true,
        'allow_self_signed' => false,
        'cafile' => 'D:/cacert.pem',
        'peer_name' => $host,
        'SNI_enabled' => true,
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

$params = stream_context_get_params($fp);

echo "CONECTADO OK\n";

if (!empty($params['options']['ssl']['peer_certificate'])) {
    $cert = $params['options']['ssl']['peer_certificate'];
    $info = openssl_x509_parse($cert);

    echo "\n=== ISSUER ===\n";
    print_r($info['issuer'] ?? []);

    echo "\n=== SUBJECT ===\n";
    print_r($info['subject'] ?? []);
} else {
    echo "No pude capturar peer_certificate.\n";
}

fclose($fp);
