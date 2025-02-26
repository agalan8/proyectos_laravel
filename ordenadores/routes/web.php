<?php

use App\Http\Controllers\OrdenadorController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('ordenadores', OrdenadorController::class)->parameters([
    'ordenadores' => 'ordenador',
])->middleware('can:soloAdmin');

// ->middleware('can:viewAny, App\Models\Ordenador::class');
