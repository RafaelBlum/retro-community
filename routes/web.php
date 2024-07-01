<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebController::class, 'landing'])->name('app.landing');
Route::get('home', [WebController::class, 'home'])->name('app.home');
Route::get('/sobre', [WebController::class, 'about'])->name('app.about');

Route::fallback(function (){
    return redirect('home');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'post'])->name('posts.post');
Route::get('/category/{category}', [CategoryController::class, 'searchPostsForCategory'])->name('posts.category');

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');


Route::middleware('auth')->group(function (){
    Route::post('/logout', [WebController::class, 'logout'])->name('app.logout');
});
