<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Ficha;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pelicula $pelicula)
    {
        $validated = $request->validate([
            'texto' => 'nullable|string|max:255',
        ]);

        $user_id = Auth::user()->id;

        $comentario = new Comentario([
            'texto' => $validated['texto'],
            'user_id' => $user_id
        ]);
        dd($pelicula);
        $ficha_id = $pelicula->ficha->id;
        $ficha = Ficha::findOrFail($ficha_id);
        $comentario->comentable()->associate($ficha);
        $comentario->save();
        session()->flash('exito', 'Comentario creado correctamente.');
        return redirect()->route('peliculas.show', [
            'pelicula' => $pelicula,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
