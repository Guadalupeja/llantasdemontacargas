<?php

use App\Http\Controllers\RgxChatbotController;
use App\Http\Middleware\AuthenticateRgxCoreSite;
use Illuminate\Support\Facades\Route;

Route::post(
    '/rgx-assistant/v1/message',
    RgxChatbotController::class
)
    ->middleware([
        AuthenticateRgxCoreSite::class,
        'throttle:120,1',
    ])
    ->name('api.rgx-assistant.message');
