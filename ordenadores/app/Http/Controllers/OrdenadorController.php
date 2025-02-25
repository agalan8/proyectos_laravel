<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdenadorRequest;
use App\Http\Requests\UpdateOrdenadorRequest;
use App\Models\Aula;
use App\Models\Cambio;
use App\Models\Ordenador;

class OrdenadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ordenadores.index', [
            'ordenadores' => Ordenador::with('aula', 'cambios', 'dispositivos')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ordenadores.create',[
            'aulas' => Aula::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrdenadorRequest $request)
    {
        $ordenador = Ordenador::create($request->input());
        return redirect()->route('ordenadores.show',[
            'ordenador' => $ordenador,
        ]
    );
    }

    /**
     * Display the specified resource.
     */
    public function show(Ordenador $ordenador)
    {
        return view('ordenadores.show', [
            'ordenador' => $ordenador,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ordenador $ordenador)
    {
        return view('ordenadores.edit', [
            'ordenador' => $ordenador,
            'aulas' => Aula::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrdenadorRequest $request, Ordenador $ordenador)
    {

        $aulaOrigen = $ordenador->aula->id;
        $ordenador->fill($request->input());
        $ordenador->save();
        $ordenador->load('aula');
        $aulaDestino = $ordenador->aula->id;

        if($aulaOrigen !== $aulaDestino){
            Cambio::create([
                'ordenador_id' => $ordenador->id,
                'origen_id' => $aulaOrigen,
                'destino_id' => $aulaDestino,
            ]);
        }

        return redirect()->route('ordenadores.show', [
            'ordenador' => $ordenador,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ordenador $ordenador)
    {
        $ordenador->delete();
        return redirect()->route('ordenadores.index');

    }
}
