<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\CancionController;
use App\Http\Controllers\ProfileController;
use App\Mail\enviarCorreo;
use App\Mail\superarCanciones;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/portada', function () {
    return view('portada', [
        'albumes' => Album::paginate(9),
    ]);
})->name('portada');

Route::get('/', function (Request $request) {
    $searchTerm = $request->input('buscar');

    $albumes = Album::where('nombre', 'like', "%{$searchTerm}%")->get();
    $canciones = Cancion::where('titulo', 'like', "%{$searchTerm}%")->get();
    $artistas = Artista::where('nombre', 'like', "%{$searchTerm}%")->get();

    return view('index', compact('albumes', 'canciones', 'artistas'));
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('albumes', AlbumController::class)->parameters([
    'albumes' => 'album'
]);

Route::resource('canciones', CancionController::class)->parameters([
    'canciones' => 'cancion'
]);

Route::resource('artistas', ArtistaController::class);

Route::get('/correo', function () {
    Mail::to('manuel@inbox.mailtrap.io')->send(new enviarCorreo);
    return redirect()->route('index');
})->name('correo');

Route::get('/enviar-correo-canciones/{album}', [AlbumController::class, 'enviarCorreoSiSuperaCanciones']);

require __DIR__.'/auth.php';
