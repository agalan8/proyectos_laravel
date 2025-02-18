<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('cuentas.index', [

            'cuentas' => Cuenta::with('movimientos')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cuentas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'numero' => 'required|max:2|unique:cuentas,numero',
            'cliente_id' => 'required|string|max:255', // Mirar luego
        ]);
        $cuenta = Cuenta::create($validated);
        session()->flash('exito', 'Cuenta creada correctamente.');
        return redirect()->route('cuentas.show', $cuenta);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuenta $cuenta)
    {
        return view('cuentas.show', [
            'cuenta' => $cuenta,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuenta $cuenta)
    {
        return view('cuentas.edit', [
            'cuenta' => $cuenta,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuenta $cuenta)
    {
        $validated = $request->validate([
            'numero' => [
                'required',
                'max:2',
                Rule::unique('cuentas')->ignore($cuenta),
            ],
        ]);
        $cuenta->fill($validated);
        $cuenta->save();
        session()->flash('exito', 'Cuenta modificada correctamente.');
        return redirect()->route('cuentas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuenta $cuenta)
    {
        $cuenta->delete();
        return redirect()->route('cuentas.index');
    }
}
