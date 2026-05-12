<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Solicitud de ayuda - Chatbot montacargas</title>
</head>
<body style="font-family: Arial, Helvetica, sans-serif; color: #111827; line-height: 1.6;">
    <h2 style="margin-bottom: 16px;">Nueva solicitud desde el chatbot de montacargas</h2>

    <p><strong>Nombre:</strong> {{ $data['name'] }}</p>
    <p><strong>Empresa:</strong> {{ $data['company'] ?: 'No indicada' }}</p>
    <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
    <p><strong>Correo:</strong> {{ $data['email'] }}</p>
    <p><strong>Tipo de llanta:</strong> {{ $data['type'] ?? 'No indicado' }}</p>
    <p><strong>Medida:</strong> {{ $data['measure'] ?? 'No indicada' }}</p>

    <hr style="margin: 20px 0;">

    <p><strong>Mensaje:</strong></p>
    <p style="white-space: pre-line;">{{ $data['message'] }}</p>
</body>
</html>