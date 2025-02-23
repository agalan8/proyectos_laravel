<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistaRequest;
use App\Http\Requests\UpdateArtistaRequest;
use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ArtistaController extends Controller
{
    // use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $this->authorize('viewAny', Artista::class);

        if(!Gate::allows('soloAdmin')){
            abort(403);
        }

        return view('artistas.index', [
            'artistas' => Artista::with('canciones')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistaRequest $request)
    {

        $artista = new Artista();
        $artista->nombre = $request->input('nombre');
        $artista->save();
        $nombre = 'art_'. $artista->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $artista->imagen = asset("storage/imagenes/$nombre");
        }
        $artista->save();
        return redirect()->route('artistas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artista $artista)
    {
        return view('artistas.show', [
            'artista' => $artista,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artista $artista)
    {
        return view('artistas.edit', [
            'artista' => $artista,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistaRequest $request, Artista $artista)
    {
        $artista->nombre = $request->input('nombre');
        $nombre = 'art_' . $artista->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $artista->imagen = asset("storage/imagenes/$nombre");
        } else{
            $artista->imagen = asset("storage/imagenes/default.jpg");
        }
        $artista->save();

        return redirect()->route('artistas.show', [
            'artista' => $artista,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artista $artista)
    {
        $artista->delete();
        return redirect()->route('artistas.index');
    }
}
