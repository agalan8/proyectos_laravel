<?php

use App\Http\Controllers\LibroController;
use App\Http\Controllers\ProfileController;
use App\Models\Ejemplar;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('libros', LibroController::class);

Route::get('/ejemplares/{ejemplar}',function(Ejemplar $ejemplar){

    if($prestamo = $ejemplar->prestamos()->where('fecha_hora_devolucion', null)->first()){

        $fecha = Carbon::create($prestamo->fecha_hora);

        if($fecha->diffInDays(now()) > 30){
            $estado = 'Vencido';
        } else {
            $estado = 'No vencido';
        }
    } else {
        $estado = 'No prestado';
    }

    return view('ejemplares.show', [
        'ejemplar' => $ejemplar,
        'estado' => $estado,
    ]);


})->name('ejemplares.show');

require __DIR__.'/auth.php';
