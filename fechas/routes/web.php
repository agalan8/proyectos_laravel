<?php

use App\Http\Controllers\EventoController;
use App\Mail\enviarCorreo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('eventos', EventoController::class);

Route::get('/correo', function(){
    Mail::to('alejandro@inbox.mailtrap.io')->send(new enviarCorreo);
    return redirect()->route('eventos.index');
});

require __DIR__.'/auth.php';
