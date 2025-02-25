<?php

namespace App\Livewire;

use App\Models\Videojuego;
use Livewire\Component;
use Livewire\Volt\Compilers\Mount;

class VideojuegoShow extends Component
{

    public $videojuegoId;
    public $videojuego;

    public function mount($videojuegoId){

        $this->videojuego  = Videojuego::find($videojuegoId);
    }


    public function render()
    {
        return view('livewire.videojuego-show', [
            'videojuego' => $this->videojuego,
        ])->layout('layouts.app');
    }
}
