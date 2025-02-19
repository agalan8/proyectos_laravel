<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('peliculas.index', [
            'peliculas' => Pelicula::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'director' => 'nullable|string|max:255',
            'titulo' => 'required',
            'descripcion' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        $pelicula = Pelicula::create([
            'director' => $validated['director']]);

        $ficha = new Ficha([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
        ]);
        // $ficha = Ficha::create([
        //     'titulo' => $validated['titulo'],
        //     'descripcion' => $validated['descripcion'],
        // ]);
        $ficha->fichable()->associate($pelicula);
        $ficha->save();
        DB::commit();
        session()->flash('exito', 'Película creado correctamente.');
        return redirect()->route('peliculas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', [
            'pelicula' => $pelicula,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelicula $pelicula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelicula $pelicula)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelicula $pelicula)
    {
        //
    }
}
