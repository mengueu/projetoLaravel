<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('categorias', CategoriaController::class); 
    // Essa rota serve para caso eu tente acessar 'categorias' sem estar logado, ele redireciona para a página de login e pede o login
    // Se eu tirar essa rota de dentro do 'middleware', ele permite o acesso mesmo sem login

    Route::resource('post', PostController::class);
});

require __DIR__.'/auth.php';
