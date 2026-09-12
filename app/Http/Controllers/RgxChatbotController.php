<?php

namespace App\Http\Controllers;

use App\Services\RgxChatbotService;
use App\Services\RgxChatbotStateStore;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Throwable;

class RgxChatbotController extends Controller
{
    public function __invoke(
        Request $request,
        RgxChatbotService $chatbot,
        RgxChatbotStateStore $stateStore
    ): JsonResponse {
        $validated = $request->validate([
            'message' => [
                'required',
                'string',
                'max:1200',
            ],
            'conversation_id' => [
                'required',
                'uuid',
            ],
            'history' => [
                'sometimes',
                'array',
                'max:8',
            ],
            'history.*.role' => [
                'required_with:history',
                'string',
                'in:user,assistant',
            ],
            'history.*.text' => [
                'required_with:history',
                'string',
                'max:1200',
            ],
        ]);

        $conversationId =
            $validated['conversation_id'];

        $site = $this->localSiteContext($request);

        $scope = $this->conversationScope(
            $request
        );

        $state = $stateStore->load(
            $site['site_id'],
            $conversationId,
            $scope
        );

        $selectedProductState =
            is_array(
                $state[
                    'selected_product'
                ] ?? null
            )
                ? $state[
                    'selected_product'
                ]
                : null;

        $selectedProductId = (int) (
            $selectedProductState[
                'product_id'
            ]
            ?? 0
        );

        if ($selectedProductId <= 0) {
            $selectedProductId = null;
        }

        $existingQuoteContext =
            is_array(
                $state[
                    'quote_context'
                ] ?? null
            )
                ? $state[
                    'quote_context'
                ]
                : null;

        $existingAdvisorContext =
            is_array(
                $state[
                    'advisor_context'
                ] ?? null
            )
                ? $state[
                    'advisor_context'
                ]
                : null;

        $currentVertical =
            is_string(
                $state[
                    'current_vertical'
                ] ?? null
            )
            && in_array(
                $state[
                    'current_vertical'
                ],
                [
                    'montacargas',
                    'minicargadores',
                ],
                true
            )
                ? $state[
                    'current_vertical'
                ]
                : $site[
                    'default_vertical'
                ];

        try {
            $result = $chatbot->reply(
                $validated['message'],
                $validated['history'] ?? [],
                $selectedProductId,
                $existingQuoteContext,
                $existingAdvisorContext,
                [
                    'site_origin' => $site['site_origin'],

                    /*
                     * Si la conversación ya cambió
                     * de vertical explícitamente,
                     * conserva ese contexto.
                     */
                    'default_vertical' => $currentVertical,
                ]
            );
        } catch (Throwable $exception) {
            Log::error('RGX chatbot error', [
                'exception' => $exception::class,
            ]);

            return response()->json([
                'error' => 'El asistente no pudo responder en este momento.',
            ], 502);
        }

        $searchStatus =
            $result[
                'product_search_status'
            ]
            ?? null;

        $selectedProduct =
            $selectedProductState;

        if (
            $searchStatus === 'resolved'
            && is_array(
                $result['product']
                    ?? null
            )
        ) {
            $productId = (int) (
                $result['product']['product_id']
                ?? 0
            );

            $productVertical =
                strtolower(
                    trim(
                        (string) (
                            $result[
                                'product'
                            ]['vertical']
                            ?? ''
                        )
                    )
                );

            if (! in_array(
                $productVertical,
                [
                    'montacargas',
                    'minicargadores',
                ],
                true
            )) {
                $productVertical =
                    $currentVertical;
            }

            if ($productId > 0) {
                $selectedProduct = [
                    'product_id' => $productId,

                    'vertical' => $productVertical,
                ];

                $currentVertical =
                    $productVertical;
            } else {
                $selectedProduct = null;
            }
        } elseif (in_array(
            $searchStatus,
            [
                'needs_clarification',
                'not_found',
                'unavailable',
            ],
            true
        )) {
            $selectedProduct = null;
        }

        $quoteContext =
            array_key_exists(
                'quote_context',
                $result
            )
            && is_array(
                $result['quote_context']
            )
                ? $result[
                    'quote_context'
                ]
                : (
                    array_key_exists(
                        'quote_context',
                        $result
                    )
                        ? null
                        : $existingQuoteContext
                );

        $advisorContext =
            array_key_exists(
                'advisor_context',
                $result
            )
            && is_array(
                $result[
                    'advisor_context'
                ]
            )
                ? $result[
                    'advisor_context'
                ]
                : (
                    array_key_exists(
                        'advisor_context',
                        $result
                    )
                        ? null
                        : $existingAdvisorContext
                );

        $stateStore->put(
            $site['site_id'],
            $conversationId,
            $scope,
            [
                'site_origin' => $site['site_origin'],

                'default_vertical' => $site[
                        'default_vertical'
                    ],

                'current_vertical' => $currentVertical,

                'selected_product' => $selectedProduct,

                'quote_context' => $quoteContext,

                'advisor_context' => $advisorContext,
            ]
        );

        /*
         * Limpieza defensiva de las claves
         * antiguas: la sesión conserva sólo
         * el scope opaco.
         */
        if ($request->hasSession()) {
            $request->session()->forget([
                "rgx_chatbot.selected_products.{$conversationId}",
                "rgx_chatbot.quotations.{$conversationId}",
                "rgx_chatbot.advisor.{$conversationId}",
            ]);
        }

        $product = null;

        if (is_array($result['product'] ?? null)) {
            $product = array_intersect_key(
                $result['product'],
                array_flip([
                    'product_id',
                    'vertical',
                    'sku',
                    'title',
                    'measure',
                    'model',
                    'brand',
                    'price_label',
                    'url',
                    'image',
                    'stock_status',
                    'is_in_stock',
                ])
            );
        }

        $quote = null;

        if (is_array($result['quote'] ?? null)) {
            $folio = trim((string) (
                $result['quote']['folio'] ?? ''
            ));

            $total = $result['quote']['total'] ?? null;

            $pdfUrl = trim((string) (
                $result['quote']['pdf_url'] ?? ''
            ));

            if ($pdfUrl !== '') {
                $scheme = strtolower((string) parse_url(
                    $pdfUrl,
                    PHP_URL_SCHEME
                ));

                if (
                    ! filter_var($pdfUrl, FILTER_VALIDATE_URL)
                    || ! in_array($scheme, ['http', 'https'], true)
                ) {
                    $pdfUrl = '';
                }
            }

            if ($folio !== '') {
                $quote = [
                    'folio' => $folio,
                    'total' => is_numeric($total)
                        ? (float) $total
                        : null,
                    'total_label' => is_numeric($total)
                        ? '$'.number_format((float) $total, 2).' MXN'
                        : null,
                    'pdf_url' => $pdfUrl !== ''
                        ? $pdfUrl
                        : null,
                ];
            }
        }

        $advisorContact = null;

        if (is_array($result['advisor_contact'] ?? null)) {
            $businessHours = (bool) (
                $result['advisor_contact']['business_hours']
                ?? false
            );

            $callbackAvailable = (bool) (
                $result['advisor_contact']['callback_available']
                ?? false
            );

            $advisorContact = [
                'business_hours' => $businessHours,
                'callback_available' => $callbackAvailable,
                'phone' => null,
                'phone_display' => null,
                'tel_url' => null,
                'whatsapp_url' => null,
            ];

            if ($businessHours) {
                $phone = trim((string) (
                    $result['advisor_contact']['phone']
                    ?? ''
                ));

                $phoneDisplay = trim((string) (
                    $result['advisor_contact']['phone_display']
                    ?? ''
                ));

                $whatsappUrl = trim((string) (
                    $result['advisor_contact']['whatsapp_url']
                    ?? ''
                ));

                $scheme = strtolower(
                    (string) parse_url(
                        $whatsappUrl,
                        PHP_URL_SCHEME
                    )
                );

                $host = strtolower(
                    (string) parse_url(
                        $whatsappUrl,
                        PHP_URL_HOST
                    )
                );

                if (
                    preg_match(
                        '/^\+\d{8,15}$/',
                        $phone
                    ) === 1
                    && filter_var(
                        $whatsappUrl,
                        FILTER_VALIDATE_URL
                    )
                    && $scheme === 'https'
                    && $host === 'wa.me'
                ) {
                    $advisorContact['phone'] =
                        $phone;

                    $advisorContact['phone_display'] =
                        $phoneDisplay !== ''
                            ? $phoneDisplay
                            : $phone;

                    $advisorContact['tel_url'] =
                        'tel:'.$phone;

                    $advisorContact['whatsapp_url'] =
                        $whatsappUrl;
                }
            }
        }

        $advisorRequest = null;

        if (is_array($result['advisor_request'] ?? null)) {
            $status = trim((string) (
                $result['advisor_request']['status']
                ?? ''
            ));

            if (in_array(
                $status,
                [
                    'submitted',
                    'already_submitted',
                ],
                true
            )) {
                $advisorRequest = [
                    'status' => $status,
                ];
            }
        }

        return response()->json([
            'answer' => $result['answer'],
            'product' => $product,
            'quote' => $quote,
            'advisor_contact' => $advisorContact,
            'advisor_request' => $advisorRequest,
        ]);
    }

    private function localSiteContext(
        Request $request
    ): array {
        $trustedSite =
            $request->attributes->get(
                'rgx_site'
            );

        $trustedSite =
            is_array($trustedSite)
                ? $trustedSite
                : [];

        $siteId = strtolower(
            trim(
                (string) (
                    $trustedSite['site_id']
                    ?? config(
                        'rgx-chatbot.local_site.id',
                        'montacargas'
                    )
                )
            )
        );

        if (
            preg_match(
                '/^[a-z0-9_-]{1,40}$/',
                $siteId
            ) !== 1
        ) {
            $siteId = 'montacargas';
        }

        $siteOrigin = trim(
            (string) (
                $trustedSite['site_origin']
                ?? config(
                    'rgx-chatbot.local_site.origin',
                    'llantasdemontacargas.com'
                )
            )
        );

        if ($siteOrigin === '') {
            $siteOrigin =
                'llantasdemontacargas.com';
        }

        $defaultVertical =
            strtolower(
                trim(
                    (string) (
                        $trustedSite['default_vertical']
                        ?? config(
                            'rgx-chatbot.local_site.default_vertical',
                            'montacargas'
                        )
                    )
                )
            );

        if (! in_array(
            $defaultVertical,
            [
                'montacargas',
                'minicargadores',
            ],
            true
        )) {
            $defaultVertical =
                'montacargas';
        }

        return [
            'site_id' => $siteId,

            'site_origin' => $siteOrigin,

            'default_vertical' => $defaultVertical,
        ];
    }

    private function conversationScope(
        Request $request
    ): string {
        $trustedScope =
            $request->attributes->get(
                'rgx_scope'
            );

        if (
            is_string($trustedScope)
            && Str::isUuid($trustedScope)
        ) {
            return $trustedScope;
        }

        if (! $request->hasSession()) {
            throw new \RuntimeException(
                'No existe un scope confiable para el chatbot RGX.'
            );
        }

        $scope = $request
            ->session()
            ->get(
                'rgx_chatbot.scope'
            );

        if (
            ! is_string($scope)
            || ! Str::isUuid($scope)
        ) {
            $scope =
                (string) Str::uuid();

            $request
                ->session()
                ->put(
                    'rgx_chatbot.scope',
                    $scope
                );
        }

        return $scope;
    }
}
