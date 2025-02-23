<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('albumes.index', [
            'albumes' => Album::with('canciones', 'user')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('albumes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        $album = new Album();
        $album->nombre = $request->input('nombre');
        $album->save();
        $nombre = 'album_'. $album->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $album->imagen = asset("storage/imagenes/$nombre");
        }
        $album->save();
        return redirect()->route('albumes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('albumes.show', [
            'album' => $album,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        return view('albumes.edit', [
            'album' => $album,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        $album->nombre = $request->input('nombre');
        $nombre = 'album_' . $album->id . '.jpg';
        if($request->hasFile('imagen')){
            $archivo = $request->file('imagen');
            $archivo->storeAs('imagenes', $nombre, 'public');
            $album->imagen = asset("storage/imagenes/$nombre");
        } else{
            $album->imagen = asset("storage/imagenes/default.jpg");
        }
        $album->save();

        return redirect()->route('albumes.show', [
            'album' => $album,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albumes.index');
    }
}
