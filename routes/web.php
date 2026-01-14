<?php

use App\Http\Controllers\CampaingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

// 1. PÁGINAS PÚBLICAS ESTÁTICAS
Route::get('/', [WebController::class, 'landing'])->name('app.landing');
Route::get('/home', [WebController::class, 'home'])->name('app.home');
Route::get('/sobre', [WebController::class, 'about'])->name('app.about');
Route::get('/politicas', [WebController::class, 'policy'])->name('app.policy');
Route::get('/suporte', [WebController::class, 'support'])->name('app.support');
Route::get('/campanhas', [CampaingController::class, 'index'])->name('app.campaings');
Route::get('/Canais', [ChannelController::class, 'channels'])->name('app.channels');
Route::get('/teste', [WebController::class, 'templateTest'])->name('app.test');

// 2. POSTS E CATEGORIAS
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'post'])->name('posts.post');
Route::get('/category/{slug}', [CategoryController::class, 'postsForCategory'])->name('posts.category');

// 3. AUTENTICAÇÃO (BREEZE)
// Isso define as rotas: login, register, logout, password.request, etc.
require __DIR__.'/auth.php';

// 4. ROTA DINÂMICA DE CANAIS (CATCH-ALL SLUG)
// Deve vir depois das rotas estáticas e de auth para não dar conflito.
Route::get('/{slug}', [ChannelController::class, 'index'])->name('my.channel');

// 5. FALLBACK (A ÚLTIMA LINHA SEMPRE!)
Route::fallback(function (){
    return redirect()->route('app.home');
});
