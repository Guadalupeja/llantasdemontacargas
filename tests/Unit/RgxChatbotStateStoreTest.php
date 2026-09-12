<?php

namespace Tests\Unit;

use App\Services\RgxChatbotStateStore;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Tests\TestCase;

class RgxChatbotStateStoreTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        config()->set(
            'rgx-chatbot.state_store',
            'array'
        );

        Cache::store('array')->flush();
    }

    public function test_state_is_isolated_by_site_and_scope(): void
    {
        $store = app(
            RgxChatbotStateStore::class
        );

        $conversationId =
            (string) Str::uuid();

        $scope =
            (string) Str::uuid();

        $store->put(
            'montacargas',
            $conversationId,
            $scope,
            [
                'site_origin' => 'llantasdemontacargas.com',

                'default_vertical' => 'montacargas',

                'current_vertical' => 'montacargas',

                'selected_product' => [
                    'product_id' => 6074,
                    'vertical' => 'montacargas',
                ],

                'quote_context' => [
                    'marker' => 'quote',
                ],

                'advisor_context' => null,
            ]
        );

        $state = $store->load(
            'montacargas',
            $conversationId,
            $scope
        );

        $this->assertSame(
            6074,
            $state[
                'selected_product'
            ]['product_id']
        );

        $this->assertSame(
            'montacargas',
            $state[
                'selected_product'
            ]['vertical']
        );

        $otherSite = $store->load(
            'minicargadores',
            $conversationId,
            $scope
        );

        $this->assertNull(
            $otherSite[
                'selected_product'
            ]
        );

        $otherScope = $store->load(
            'montacargas',
            $conversationId,
            (string) Str::uuid()
        );

        $this->assertNull(
            $otherScope[
                'selected_product'
            ]
        );
    }

    public function test_invalid_state_is_not_authoritative(): void
    {
        $store = app(
            RgxChatbotStateStore::class
        );

        $conversationId =
            (string) Str::uuid();

        $scope =
            (string) Str::uuid();

        $store->put(
            'montacargas',
            $conversationId,
            $scope,
            [
                'default_vertical' => 'inventado',

                'current_vertical' => 'inventado',

                'selected_product' => [
                    'product_id' => -10,
                    'vertical' => 'inventado',
                ],

                'quote_context' => 'NO_ARRAY',

                'advisor_context' => 'NO_ARRAY',
            ]
        );

        $state = $store->load(
            'montacargas',
            $conversationId,
            $scope
        );

        $this->assertNull(
            $state[
                'default_vertical'
            ]
        );

        $this->assertNull(
            $state[
                'current_vertical'
            ]
        );

        $this->assertNull(
            $state[
                'selected_product'
            ]
        );

        $this->assertNull(
            $state[
                'quote_context'
            ]
        );

        $this->assertNull(
            $state[
                'advisor_context'
            ]
        );
    }
}
