<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\VideojuegoController;
use App\Models\Comentario;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
Route::resource('comentarios', ComentarioController::class);

Route::post('/comentario/crear/{pelicula}', function (Request $request, Pelicula $pelicula) {
    $validated = $request->validate([
        'texto' => 'nullable|string|max:255',
    ]);

    DB::beginTransaction();
    $user_id = Auth::user()->id;

    $comentario = new Comentario([
        'texto' => $validated['texto'],
        'user_id' => $user_id
    ]);
    $ficha = $pelicula->ficha;
    $comentario->comentable()->associate($ficha);
    $comentario->save();
    DB::commit();
    return redirect()->route('peliculas.show', [
        'pelicula' => $pelicula,
    ]);
})->name('comentario.crear');
