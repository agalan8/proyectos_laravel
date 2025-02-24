<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\NotaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('alumnos', AlumnoController::class);
Route::resource('asignaturas', AsignaturaController::class);
Route::resource('notas', NotaController::class);

Route::get('/finales/index', function(){

    return view('finales.index');

})->name('finales.index');
