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
                $selectedProductId
            );
        } catch (Throwable $exception) {
            Log::error('RGX chatbot error', [
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
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

        return response()->json([
            'answer' => $result['answer'],
            'product' => $product,
        ]);
    }
}
