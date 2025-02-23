<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCancionRequest;
use App\Http\Requests\UpdateCancionRequest;
use App\Models\Cancion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CancionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Gate::allows('soloAdmin')){
            abort(403);
        }

        return view('canciones.index', [
            'canciones' => Cancion::with('artistas', 'albumes')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCancionRequest $request)
    {
        $cancion = new Cancion();
        $cancion->nombre = $request->input('nombre');
        $cancion->duracion = $request->input('duracion');
        $cancion->save();
        $nombre = 'song_'. $cancion->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $cancion->imagen = asset("storage/imagenes/$nombre");
        }
        $cancion->save();
        return redirect()->route('canciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cancion $cancion)
    {
        return view('canciones.show', [
            'cancion' => $cancion,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cancion $cancion)
    {
        return view('canciones.edit', [
            'cancion' => $cancion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCancionRequest $request, Cancion $cancion)
    {
        $cancion->nombre = $request->input('nombre');
        $cancion->duracion = $request->input('duracion');
        $nombre = 'song_' . $cancion->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $cancion->imagen = asset("storage/imagenes/$nombre");
        } else{
            $cancion->imagen = asset("storage/imagenes/default.jpg");
        }
        $cancion->save();

        return redirect()->route('canciones.show', [
            'cancion' => $cancion,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cancion $cancion)
    {
        $cancion->delete();
        return redirect()->route('canciones.index');
    }
}
