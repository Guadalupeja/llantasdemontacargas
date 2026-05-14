<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\PostAdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatbotSpecialistRequestController;

// BLOG PÚBLICO
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');
Route::post('/blog/{post:slug}/comentarios', [BlogController::class, 'storeComment'])
    ->name('blog.comments.store');

// ADMIN (PROTEGIDO CON LOGIN)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/posts', [PostAdminController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostAdminController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostAdminController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostAdminController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostAdminController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostAdminController::class, 'destroy'])->name('posts.destroy');
});

// DASHBOARD
Route::get('/dashboard', function () {
    return redirect()->route('admin.posts.index');
})->middleware(['auth'])->name('dashboard');

// PERFIL
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS DE AUTH BREEZE
require __DIR__.'/auth.php';

// HOME
Route::get('/', function () {
    return view('welcome');
});

// CHATBOT
Route::post('/chatbot/specialist-request', [ChatbotSpecialistRequestController::class, 'store'])
    ->name('chatbot.specialist-request');

// Catch-all SIEMPRE al final
Route::get('/{any}', [StaticPageController::class, 'show'])
    ->where('any', '.*')
    ->name('static.show');