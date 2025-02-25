<?php

namespace App\Livewire;

use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideojuegoPoseo extends Component
{

    public $videojuego_id = "";
    public function lotengo(){

        if(!$this->videojuego_id == "" && !Auth::user()->videojuegos()->where('videojuego_id', $this->videojuego_id)->exists()){
            $videojuego = Videojuego::find($this->videojuego_id);
            Auth::user()->videojuegos()->attach($videojuego);
            return redirect()->route('videojuegos');
        }
    }

    public function nolotengo(){

        if(!$this->videojuego_id == "" && Auth::user()->videojuegos()->where('videojuego_id', $this->videojuego_id)->exists()){
            $videojuego = Videojuego::find($this->videojuego_id);
            Auth::user()->videojuegos()->detach($videojuego);
            return redirect()->route('videojuegos');
        }
    }


    public function render()
    {
        return view('livewire.videojuego-poseo', [
            'videojuegos' => Videojuego::all(),
        ])->layout('layouts.app');
    }
}
