<?php

namespace App\Http\Controllers;

use App\Mail\ChatbotSpecialistRequestMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ChatbotSpecialistRequestController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'company' => ['nullable', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:120'],
            'message' => ['required', 'string', 'max:2000'],
            'type' => ['nullable', 'string', 'max:80'],
            'measure' => ['nullable', 'string', 'max:80'],
        ]);

        Mail::to('bshgroupcrm@gmail.com')->send(new ChatbotSpecialistRequestMail($data));

        return response()->json([
            'ok' => true,
            'message' => 'Tu solicitud fue enviada correctamente.',
        ]);
    }
}