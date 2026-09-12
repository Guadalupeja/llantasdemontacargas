<?php

namespace Tests\Unit;

use App\Services\MontacargasProductSearchService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RgxMinicargadoresProductSearchTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Cache::flush();

        config()->set(
            'services.ruguex.final_prices_endpoint',
            'https://shop.test/wp-json/ruguex/v1/final-prices'
        );
    }

    public function test_resuelve_un_producto_de_minicargador_desde_woo(): void
    {
        Http::fake([
            'https://shop.test/wp-json/wc/store/v1/products/categories*' => Http::response([
                [
                    'id' => 15,
                    'name' => 'Llantas Minicargadores',
                    'slug' => 'llantas-minicargadores',
                ],
            ]),

            'https://shop.test/wp-json/wc/store/v1/products*' => Http::response([
                [
                    'id' => 6375,
                    'name' => 'Llanta Neumática para Minicargador 10-16.5 Trabajo Medio',
                    'sku' => '.5001514750000_C.',
                    'permalink' => 'https://shop.test/producto/6375',
                    'is_in_stock' => true,
                    'images' => [
                        [
                            'src' => 'https://shop.test/image.jpg',
                        ],
                    ],
                    'attributes' => [
                        [
                            'taxonomy' => 'pa_marca',
                            'terms' => [[
                                'name' => 'Trelleborg Mitas®',
                                'slug' => 'trelleborg-mitas',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_medidas',
                            'terms' => [[
                                'name' => '10-16.5',
                                'slug' => '10-16-5',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_modelo',
                            'terms' => [[
                                'name' => 'SK-05',
                                'slug' => 'sk-05',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_tipo-de-llanta',
                            'terms' => [[
                                'name' => 'Neumática',
                                'slug' => 'neumatica',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_rodamiento',
                            'terms' => [[
                                'name' => 'Tracción',
                                'slug' => 'traccion',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_tipo-de-rin',
                            'terms' => [[
                                'name' => 'Estándar',
                                'slug' => 'estandar',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_turnos',
                            'terms' => [[
                                'name' => '3',
                                'slug' => '3',
                            ]],
                        ],
                        [
                            'taxonomy' => 'pa_funcion',
                            'terms' => [[
                                'name' => 'Estándar',
                                'slug' => 'estandar',
                            ]],
                        ],
                    ],
                ],
            ]),

            'https://shop.test/wp-json/ruguex/v1/final-prices*' => Http::response([
                'products' => [
                    [
                        'id' => 6375,
                        'sku' => '.5001514750000_C.',
                        'price_mxn_with_iva' => 7250.50,
                        'price_mxn_with_iva_formatted' => '$7,250.50 MXN',
                        'permalink' => 'https://shop.test/producto/6375',
                        'image' => 'https://shop.test/image.jpg',
                        'stock_status' => 'instock',
                        'is_in_stock' => true,
                    ],
                ],
            ]),
        ]);

        $result = app(
            MontacargasProductSearchService::class
        )->resolveForChatbot([
            'vertical' => 'minicargadores',
            'type' => 'neumática',
            'measure' => '10-16.5',
            'model' => 'SK-05',
        ]);

        $this->assertSame(
            'resolved',
            $result['status']
        );

        $this->assertSame(
            'minicargadores',
            $result['product']['vertical']
        );

        $this->assertSame(
            6375,
            $result['product']['product_id']
        );

        $this->assertSame(
            '10-16.5',
            $result['product']['measure']
        );

        $this->assertSame(
            'SK-05',
            $result['product']['model']
        );

        $this->assertSame(
            '.5001514750000_C.',
            $result['product']['sku']
        );

        $this->assertSame(
            7250.50,
            $result['product']['price_mxn']
        );
    }
}
