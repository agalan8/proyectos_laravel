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

    public function crear(){

        $videojuego = Videojuego::create(
            $this->pull()
        );

        Auth::user()->videojuegos()->attach($videojuego);
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
