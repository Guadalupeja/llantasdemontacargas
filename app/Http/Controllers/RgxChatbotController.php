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

        $existingQuoteContext = $request->session()->get($quoteKey);

        if (! is_array($existingQuoteContext)) {
            $existingQuoteContext = null;
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
                $existingQuoteContext
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

        return response()->json([
            'answer' => $result['answer'],
            'product' => $product,
            'quote' => $quote,
        ]);
    }
}
