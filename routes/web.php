<?php

use App\Http\Controllers\CampaingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// 1. PÁGINAS PÚBLICAS ESTÁTICAS
Route::get('/', [WebController::class, 'landing'])->name('app.landing');
Route::get('/home', [WebController::class, 'home'])->name('app.home');
Route::get('/sobre', [WebController::class, 'about'])->name('app.about');
Route::get('/politicas', [WebController::class, 'policy'])->name('app.policy');
Route::get('/suporte', [WebController::class, 'support'])->name('app.support');
Route::get('/campanhas', [CampaingController::class, 'index'])->name('app.campaings');
Route::get('/canais', [ChannelController::class, 'channels'])->name('app.channels');
Route::get('/teste', [WebController::class, 'templateTest'])->name('app.test');

// 2. POSTS E CATEGORIAS
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class, 'post'])->name('posts.post');
Route::get('/category/{slug}', [CategoryController::class, 'postsForCategory'])->name('posts.category');


// 3. AUTENTICAÇÃO (BREEZE)
// Isso define as rotas: login, register, logout, password.request, etc.
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

    // 1. A TELA DE AVISO (View que diz "Verifique seu email")
    Route::get('verify-email', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    // 2. A AÇÃO DE VERIFICAR (O link do email aponta aqui)
    Route::get('verify-email/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        // Depois de clicar no link, para onde ele vai?
        // Aqui você manda para a home logada ou pede login novamente
        return redirect()->route('app.home')->with('status', 'E-mail verificado!');
    })->middleware(['signed', 'throttle:6,1'])->name('verification.verify');

    // 3. REENVIAR E-MAIL (Botão "Reenviar" na tela de aviso)
    Route::post('email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    })->middleware('throttle:6,1')->name('verification.send');
});


// 4. DASHBOARD DO CANAL (LOGADO)
Route::get('/canal/{slug}/dashboard', [ChannelController::class, 'dashboard'])->name('my.channel.dashboard');

// 5. ROTA DINÂMICA DE CANAIS (CATCH-ALL SLUG)
// Deve vir depois das rotas estáticas e de auth para não dar conflito.
Route::get('/{slug}', [ChannelController::class, 'index'])->name('my.channel');

// 5. FALLBACK (A ÚLTIMA LINHA SEMPRE!)
Route::fallback(function () {
    return redirect()->route('app.home');
});
