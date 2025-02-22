<?php

use App\Http\Controllers\ReservaController;
use App\Http\Controllers\VueloController;
use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('vuelos', VueloController::class);
Route::resource('reservas', ReservaController::class);


Route::get('/vuelos/reserva/{vuelo}', function(Vuelo $vuelo){

    return view('vuelos.reserva', [
        'vuelo' => $vuelo,
    ]);
})->name('vuelos.reserva');

// Route::post('vuelos/reserva/', function(Vuelo $vuelo){



// })->name('vuelos.reserva');
