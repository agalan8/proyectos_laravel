<?php

use App\Http\Controllers\FichaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('fichas', FichaController::class);
Route::resource('peliculas', PeliculaController::class);
Route::resource('videojuegos', VideojuegoController::class);
