<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;


Route::get('/', function () {
    return view('welcome');
});
// Catch-all seguro: deja SIEMPRE esta ruta al final
Route::get('/{any}', [StaticPageController::class, 'show'])
    ->where('any', '.*')
    ->name('static.show');