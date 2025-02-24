<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotaRequest;
use App\Http\Requests\UpdateNotaRequest;
use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Nota;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('notas.index', [
            'notas' => Nota::with('alumno', 'asignatura')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('notas.create',[
            'asignaturas' => Asignatura::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotaRequest $request)
    {
        $alumno = Alumno::findOrFail($request->input('alumno_id'));
        $asignatura = Asignatura::findOrFail($request->input('asignatura_id'));
        $trimestre = $request->input('trimestre');
        $nota_numero = $request->input('nota');
        $nota = Nota::create([
            'alumno_id' => $alumno->id,
            'asignatura_id' => $asignatura->id,
            'trimestre' => $trimestre,
            'nota' => intval($nota_numero),
        ]);

        session()->flash('exito', 'Nota creada correctamente.');
        return redirect()->route('notas.show', $nota);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        return view('notas.show', [
            'nota' => $nota,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        return view('notas.edit', [
            'nota' => $nota,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotaRequest $request, Nota $nota)
    {
        $trimestre = $request->input('trimestre');
        $nota_numero = $request->input('nota');
        $nota->fill([
            'trimestre' => $trimestre,
            'nota' => intval($nota_numero),
        ]);
        $nota->save();
        session()->flash('exito', 'Nota creada correctamente.');
        return redirect()->route('notas.show', $nota);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
        $nota->delete();
        return redirect()->route('notas.index');

    }
}
