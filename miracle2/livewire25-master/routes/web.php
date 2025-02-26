<?php

use App\Livewire\Counter;
use App\Livewire\LibroIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::get('/counter', Counter::class);
Route::get('/libros', LibroIndex::class)->name('libros.index');
