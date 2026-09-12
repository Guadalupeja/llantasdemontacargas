<?php

namespace App\Services;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Facades\Cache;
use InvalidArgumentException;
use RuntimeException;

class RgxChatbotStateStore
{
    public function load(
        string $siteId,
        string $conversationId,
        string $scope
    ): array {
        $key = $this->key(
            $siteId,
            $conversationId,
            $scope
        );

        $state = $this->cache()->get(
            $key
        );

        if (! is_array($state)) {
            return $this->emptyState();
        }

        $state = $this->normalizeState(
            $state
        );

        $this->cache()->put(
            $key,
            $state,
            $this->expiresAt()
        );

        return $state;
    }

    public function put(
        string $siteId,
        string $conversationId,
        string $scope,
        array $state
    ): void {
        $this->cache()->put(
            $this->key(
                $siteId,
                $conversationId,
                $scope
            ),
            $this->normalizeState(
                $state
            ),
            $this->expiresAt()
        );
    }

    public function forget(
        string $siteId,
        string $conversationId,
        string $scope
    ): void {
        $this->cache()->forget(
            $this->key(
                $siteId,
                $conversationId,
                $scope
            )
        );
    }

    private function emptyState(): array
    {
        return [
            'site_origin' => null,
            'default_vertical' => null,
            'current_vertical' => null,
            'selected_product' => null,
            'quote_context' => null,
            'advisor_context' => null,
        ];
    }

    private function normalizeState(
        array $state
    ): array {
        $selectedProduct = null;

        if (
            is_array(
                $state['selected_product']
                    ?? null
            )
        ) {
            $productId = (int) (
                $state['selected_product']['product_id']
                ?? 0
            );

            if ($productId > 0) {
                $selectedProduct = [
                    'product_id' => $productId,

                    'vertical' => $this->normalizeVertical(
                        $state[
                            'selected_product'
                        ]['vertical']
                            ?? null
                    ),
                ];
            }
        }

        $siteOrigin = trim(
            (string) (
                $state['site_origin']
                ?? ''
            )
        );

        return [
            'site_origin' => $siteOrigin !== ''
                    ? $siteOrigin
                    : null,

            'default_vertical' => $this->normalizeVertical(
                $state[
                    'default_vertical'
                ]
                ?? null
            ),

            'current_vertical' => $this->normalizeVertical(
                $state[
                    'current_vertical'
                ]
                ?? null
            ),

            'selected_product' => $selectedProduct,

            'quote_context' => is_array(
                $state[
                    'quote_context'
                ]
                ?? null
            )
                    ? $state[
                        'quote_context'
                    ]
                    : null,

            'advisor_context' => is_array(
                $state[
                    'advisor_context'
                ]
                ?? null
            )
                    ? $state[
                        'advisor_context'
                    ]
                    : null,
        ];
    }

    private function normalizeVertical(
        mixed $value
    ): ?string {
        $vertical = strtolower(
            trim((string) $value)
        );

        return in_array(
            $vertical,
            [
                'montacargas',
                'minicargadores',
            ],
            true
        )
            ? $vertical
            : null;
    }

    private function key(
        string $siteId,
        string $conversationId,
        string $scope
    ): string {
        $siteId = trim($siteId);

        $conversationId = trim(
            $conversationId
        );

        $scope = trim($scope);

        if (
            $siteId === ''
            || $conversationId === ''
            || $scope === ''
        ) {
            throw new InvalidArgumentException(
                'El contexto de estado RGX es inválido.'
            );
        }

        $secret = trim(
            (string) config(
                'app.key',
                ''
            )
        );

        if ($secret === '') {
            throw new RuntimeException(
                'APP_KEY no está configurada.'
            );
        }

        if (
            str_starts_with(
                $secret,
                'base64:'
            )
        ) {
            $decoded = base64_decode(
                substr($secret, 7),
                true
            );

            if (
                is_string($decoded)
                && $decoded !== ''
            ) {
                $secret = $decoded;
            }
        }

        $digest = hash_hmac(
            'sha256',
            implode('|', [
                $siteId,
                $scope,
                $conversationId,
            ]),
            $secret
        );

        return 'rgx_chatbot_state_v1_'
            .$digest;
    }

    private function expiresAt(): \DateTimeInterface
    {
        $minutes = (int) config(
            'rgx-chatbot.state_ttl_minutes',
            120
        );

        $minutes = max(
            5,
            min(1440, $minutes)
        );

        return now()->addMinutes(
            $minutes
        );
    }

    private function cache(): Repository
    {
        $store = trim(
            (string) config(
                'rgx-chatbot.state_store',
                ''
            )
        );

        return Cache::store(
            $store !== ''
                ? $store
                : null
        );
    }
}
