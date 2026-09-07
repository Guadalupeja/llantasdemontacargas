<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use RuntimeException;

class AnthropicClient
{
    public function messages(array $payload): array
    {
        $apiKey = (string) config('services.anthropic.api_key', '');

        if ($apiKey === '') {
            throw new RuntimeException(
                'La clave de Anthropic no está configurada.'
            );
        }

        $model = (string) config(
            'services.anthropic.model',
            'claude-haiku-4-5'
        );

        $version = (string) config(
            'services.anthropic.version',
            '2023-06-01'
        );

        $baseUrl = rtrim(
            (string) config(
                'services.anthropic.base_url',
                'https://api.anthropic.com'
            ),
            '/'
        );

        $timeout = (int) config(
            'services.anthropic.timeout',
            35
        );

        $payload['model'] ??= $model;

        $response = Http::baseUrl($baseUrl)
            ->acceptJson()
            ->withHeaders([
                'x-api-key' => $apiKey,
                'anthropic-version' => $version,
            ])
            ->connectTimeout(10)
            ->timeout($timeout)
            ->post('/v1/messages', $payload);

        if (! $response->successful()) {
            throw new RuntimeException(
                'Anthropic respondió con HTTP ' . $response->status() . '.'
            );
        }

        $data = $response->json();

        if (! is_array($data)) {
            throw new RuntimeException(
                'Anthropic devolvió una respuesta inválida.'
            );
        }

        return $data;
    }
}