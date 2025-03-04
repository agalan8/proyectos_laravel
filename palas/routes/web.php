<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReservaController;
use App\Livewire\ReservasIndex;
use App\Models\Comentario;
use App\Models\Pista;
use App\Models\Post;
use App\Models\Reserva;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::resource('posts', PostController::class);
Route::resource('comentarios', ComentarioController::class);
// Route::resource('reservas', ReservaController::class);

Route::post('/comentar/post/{post}', function(Post $post, Request $request){

    $comentario = new Comentario([
        'contenido' => $request->input('contenido'),
        'user_id' => Auth::user()->id,
    ]);

    $comentario->comentable()->associate($post);

    $comentario->save();

    return redirect()->route('posts.show', $post);

})->name('comentarPost')->middleware('auth');

Route::post('/comentar/comentario/{comentario}', function(Comentario $comentario, Request $request){

    $comentarioNuevo = new Comentario([
        'contenido' => $request->input('contenido'),
        'user_id' => Auth::user()->id,
    ]);

    $comentarioNuevo->comentable()->associate($comentario);

    $comentarioNuevo->save();

    return back();

})->name('comentarComentario')->middleware('auth');

Route::get('reservas', ReservasIndex::class)->name('reservasIndex');
