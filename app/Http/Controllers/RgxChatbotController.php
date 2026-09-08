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

        try {
            $result = $chatbot->reply(
                $validated['message'],
                $validated['history'] ?? []
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

        return response()->json([
            'answer' => $result['answer'],
        ]);
    }
}