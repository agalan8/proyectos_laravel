<?php

namespace App\Livewire;

use App\Models\Libro;
use Livewire\Component;

class LibroIndex extends Component
{
    public $codigo;
    public $titulo;
    public $numpags;
    public $libroid;
    public $estaEditando = false;

    public function crear()
    {
        // Libro::create([
        //     'codigo' => $this->codigo,
        //     'titulo' => $this->titulo,
        //     'numpags' => $this->numpags,
        // ]);
        Libro::create(
            $this->pull()
        );
    }

    public function editar($libroid)
    {
        $this->libroid = $libroid;
        $libro = Libro::findOrFail($libroid);
        $this->codigo = $libro->codigo;
        $this->titulo = $libro->titulo;
        $this->numpags = $libro->numpags;
        $this->estaEditando = true;
    }

    public function actualizar()
    {
        // Hace la actualización
        $libro = Libro::findOrFail($this->libroid);
        $libro->fill(
            $this->pull()
        );
        $libro->save();
        $this->reset();
    }

    public function cancelar()
    {
        $this->reset();
        // $this->estaEditando = false;
    }

    public function eliminar($libroid)
    {
        $libro = Libro::findOrFail($libroid);
        $libro->delete();
    }

    public function render()
    {
        return view('livewire.libro-index')->with([
            'libros' => Libro::all(),
        ]);
    }
}
