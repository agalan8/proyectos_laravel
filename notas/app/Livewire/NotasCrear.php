<?php

namespace App\Livewire;

use App\Models\Alumno;
use App\Models\Asignatura;
use Livewire\Component;

class NotasCrear extends Component
{
    public $asignaturas;

    public $search = '';

    public $trimestres;

    public $asignaturaId = '';


    public function updatedAsignaturaId($asignaturaId)
    {
        // Cuando se actualiza la categoría seleccionada, obtenemos los productos de esa categoría

        if(!$asignaturaId == ''){
            $asignatura = Asignatura::find($asignaturaId);
            $this->trimestres = $asignatura->numero_de_trimestres;
        }else {
            $this->trimestres = 0;
        }
    }

    public function render()
    {

        $alumnos = Alumno::query()->when($this->search, function($query){
            return $query->where('nombre', 'ILIKE', "%{$this->search}%");
        })->get();



        return view('livewire.notas-crear')->with([
            'asignaturas' => $this->asignaturas,
            'alumnos' => $alumnos,
            'trimestres' => $this->trimestres,
        ]);
    }
}
