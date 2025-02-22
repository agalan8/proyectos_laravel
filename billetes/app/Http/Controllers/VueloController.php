<?php

namespace App\Http\Controllers;

use App\Models\Vuelo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('vuelos.index', [
            'vuelos' => Vuelo::with('asientos')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vuelos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'codigo' => 'required|string|regex:/^[A-Z]{2}\d{4}$/|unique:vuelos,codigo',
            'aeropuerto_origen' => 'required|string|regex:/^[A-Z]{3}$/',
            'aeropuerto_destino' => 'required|string|regex:/^[A-Z]{3}$/',
            'compañia_aerea' => 'required|string',
            'plazas_totales' => 'required|integer',
            'precio' => 'required|decimal:2',
        ]);


        $vuelo = Vuelo::create($validated);
        $vuelo->generarAsientos();
        session()->flash('exito', 'Vuelo creado correctamente.');
        return redirect()->route('vuelos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vuelo $vuelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vuelo $vuelo)
    {
        return view('vuelos.edit', [
            'vuelo' => $vuelo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vuelo $vuelo)
    {
        $validated = $request->validate([
            'codigo' => [
                'required',
                'string',
                'regex:/^[A-Z]{2}\d{4}$/',
                Rule::unique('vuelos')->ignore($vuelo),

            ],
            'aeropuerto_origen' => 'required|string|regex:/^[A-Z]{3}$/',
            'aeropuerto_destino' => 'required|string|regex:/^[A-Z]{3}$/',
            'compañia_aerea' => 'required|string',
            'plazas_totales' => 'required|integer',
            'precio' => 'required|decimal:2|',
        ]);

        $vuelo->fill($validated);
        $vuelo->save();
        return redirect()->route('vuelos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vuelo $vuelo)
    {
        $vuelo->asientos()->delete();
        $vuelo->delete();
        return redirect()->route('vuelos.index');
    }
}
