<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\BlogController;

// LISTADO DEL BLOG
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

// DETALLE DEL POST (usamos route model binding por slug)
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// GUARDAR COMENTARIOS
Route::post('/blog/{post:slug}/comentarios', [BlogController::class, 'storeComment'])
    ->name('blog.comments.store');



Route::get('/', function () {
    return view('welcome');
});
// Catch-all seguro: deja SIEMPRE esta ruta al final
Route::get('/{any}', [StaticPageController::class, 'show'])
    ->where('any', '.*')
    ->name('static.show');