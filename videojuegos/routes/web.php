<?php

use App\Livewire\VideojuegoIndex;
use App\Livewire\VideojuegoPoseo;
use App\Livewire\VideojuegoShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/videojuegos', VideojuegoIndex::class)->middleware(['auth'])->name('videojuegos');
Route::get('videojuegos/poseo', VideojuegoPoseo::class)->middleware(['auth'])->name('videojuegos-poseo');
Route::get('/videojuegos/{videojuegoId}', VideojuegoShow::class)->middleware(['auth'])->name('videojuegos-show');
