<?php

namespace App\Livewire;

use App\Models\Desarrolladora;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideojuegoIndex extends Component
{
    public $titulo;
    public $anyo;
    public $desarrolladora_id = "";
    public $estaEditando = false;

    public $videojuegoId;

    public function crear(){

        $videojuego = Videojuego::create(
            $this->pull()
        );

        Auth::user()->videojuegos()->attach($videojuego);
    }

    public function editar($videojuegoId)
    {
        $this->videojuegoId = $videojuegoId;
        $videojuego = Videojuego::findOrFail($videojuegoId);
        $this->titulo = $videojuego->titulo;
        $this->anyo = $videojuego->anyo;
        $this->desarrolladora_id = $videojuego->desarrolladora_id;
        $this->estaEditando = true;
    }

    public function actualizar()
    {
        // Hace la actualización
        $videojuego = Videojuego::findOrFail($this->videojuegoId);
        $videojuego->fill(
            $this->pull()
        );
        $videojuego->save();
        $this->reset();
    }

    public function cancelar()
    {
        $this->reset();
        // $this->estaEditando = false;
    }

    public function eliminar($videojuegoId)
    {
        $videojuego = Videojuego::findOrFail($videojuegoId);
        $videojuego->delete();
    }

    public function render()
    {
        return view('livewire.videojuego-index', [
            'videojuegos' => Auth::user()->videojuegos,
            'desarrolladoras' => Desarrolladora::all(),
        ]
    )->layout('layouts.app');
    }
}
