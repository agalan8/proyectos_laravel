<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Models\Asignatura;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('asignaturas.index', [
            'asignaturas' => Asignatura::with('notas')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asignaturas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAsignaturaRequest $request)
    {
        $asignatura = Asignatura::create($request->input());
        session()->flash('exito', 'Asignatura creado correctamente.');
        return redirect()->route('asignaturas.show', $asignatura);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignatura)
    {
        return view('asignaturas.show', [
            'asignatura' => $asignatura,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas.edit', [
            'asignatura' => $asignatura,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAsignaturaRequest $request, Asignatura $asignatura)
    {
        $asignatura->fill($request->all());
        $asignatura->save();
        session()->flash('exito', 'Asignatura modificada correctamente.');
        return redirect()->route('asignaturas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();
        return redirect()->route('asignaturas.index');
    }
}
