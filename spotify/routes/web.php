<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('albumes', AlbumController::class)->parameters([
    'albumes' => 'album',
]);
Route::resource('canciones', CancionController::class)->parameters([
    'canciones' => 'cancion',
]);
Route::resource('artistas', ArtistaController::class);
