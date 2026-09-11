<?php

namespace App\Http\Controllers;

use App\Services\RgxChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class RgxChatbotController extends Controller
{
    public function __invoke(
        Request $request,
        RgxChatbotService $chatbot
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

        $conversationId = $validated['conversation_id'];
        $selectionKey = "rgx_chatbot.selected_products.{$conversationId}";
        $quoteKey = "rgx_chatbot.quotations.{$conversationId}";
        $advisorKey = "rgx_chatbot.advisor.{$conversationId}";

        $existingQuoteContext = $request->session()->get($quoteKey);

        if (! is_array($existingQuoteContext)) {
            $existingQuoteContext = null;
        }

        $existingAdvisorContext =
            $request->session()->get($advisorKey);

        if (! is_array($existingAdvisorContext)) {
            $existingAdvisorContext = null;
        }

        $selectedProductId = (int) $request->session()->get(
            $selectionKey,
            0
        );

        if ($selectedProductId <= 0) {
            $selectedProductId = null;
        }

        try {
            $result = $chatbot->reply(
                $validated['message'],
                $validated['history'] ?? [],
                $selectedProductId,
                $existingQuoteContext,
                $existingAdvisorContext
            );
        } catch (Throwable $exception) {
            Log::error('RGX chatbot error', [
                'exception' => $exception::class,
            ]);

            return response()->json([
                'error' => 'El asistente no pudo responder en este momento.',
            ], 502);
        }

        $searchStatus = $result['product_search_status'] ?? null;

        if (
            $searchStatus === 'resolved'
            && is_array($result['product'] ?? null)
        ) {
            $productId = (int) ($result['product']['product_id'] ?? 0);

            if ($productId > 0) {
                $request->session()->put($selectionKey, $productId);
            } else {
                $request->session()->forget($selectionKey);
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
            $request->session()->forget($selectionKey);
        }

        if (array_key_exists('quote_context', $result)) {
            if (is_array($result['quote_context'])) {
                $request->session()->put(
                    $quoteKey,
                    $result['quote_context']
                );
            } else {
                $request->session()->forget($quoteKey);
            }
        }

        if (array_key_exists('advisor_context', $result)) {
            if (is_array($result['advisor_context'])) {
                $request->session()->put(
                    $advisorKey,
                    $result['advisor_context']
                );
            } else {
                $request->session()->forget($advisorKey);
            }
        }

        $product = null;

        if (is_array($result['product'] ?? null)) {
            $product = array_intersect_key(
                $result['product'],
                array_flip([
                    'product_id',
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
                $result['advisor_contact']
                    ['business_hours']
                ?? false
            );

            $callbackAvailable = (bool) (
                $result['advisor_contact']
                    ['callback_available']
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
                    $result['advisor_contact']
                        ['phone_display']
                    ?? ''
                ));

                $whatsappUrl = trim((string) (
                    $result['advisor_contact']
                        ['whatsapp_url']
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
}
