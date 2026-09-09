<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;
use Throwable;

class RuguexFormalQuoteService
{
    public function generate(int $productId, array $customer): array
    {
        if ($productId <= 0) {
            throw new RuntimeException(
                'No hay un producto RUGUEX válido para cotizar.'
            );
        }

        $endpoint = trim(
            (string) config('services.ruguex.formal_quote_endpoint')
        );

        $token = trim(
            (string) config('services.ruguex.formal_quote_token')
        );

        $timeout = max(
            1,
            (int) config('services.ruguex.formal_quote_timeout', 45)
        );

        if ($endpoint === '' || $token === '') {
            throw new RuntimeException(
                'La conexión privada de cotizaciones RUGUEX no está configurada.'
            );
        }

        $payload = [
            'producto_id' => $productId,
            'cliente' => trim((string) ($customer['cliente'] ?? '')),
            'contacto' => trim((string) ($customer['contacto'] ?? '')),
            'correo' => trim((string) ($customer['correo'] ?? '')),
            'telefono' => trim((string) ($customer['telefono'] ?? '')),
            'ubicacion' => trim((string) ($customer['ubicacion'] ?? '')),
            'cantidad' => max(
                1,
                (int) ($customer['cantidad'] ?? 1)
            ),
            'comentarios' => trim(
                (string) ($customer['comentarios'] ?? '')
            ),
        ];

        try {
            $response = Http::acceptJson()
                ->asJson()
                ->withHeaders([
                    'x-ruguex-chatbot-token' => $token,
                ])
                ->timeout($timeout)
                ->post($endpoint, $payload);
        } catch (Throwable $exception) {
            throw new RuntimeException(
                'No fue posible conectar con el sistema de cotizaciones RUGUEX.',
                0,
                $exception
            );
        }

        $data = $response->json();

        if (! is_array($data)) {
            throw new RuntimeException(
                'El sistema de cotizaciones devolvió una respuesta inválida.'
            );
        }

        if (! $response->successful() || empty($data['success'])) {
            $message = trim((string) ($data['message'] ?? ''));

            throw new RuntimeException(
                $message !== ''
                    ? $message
                    : 'No fue posible generar la cotización RUGUEX.'
            );
        }

        $result = is_array($data['data'] ?? null)
            ? $data['data']
            : [];

        return [
            'message' => trim(
                (string) (
                    $result['message']
                    ?? $data['message']
                    ?? 'Cotización generada correctamente.'
                )
            ),
            'folio' => trim((string) ($result['folio'] ?? '')),
            'pdf_url' => trim((string) ($result['pdf_url'] ?? '')),
            'total' => $result['total'] ?? null,
        ];
    }
}