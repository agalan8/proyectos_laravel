<?php

namespace App\Livewire;

use App\Http\Requests\StoreVideojuegoRequest;
use App\Models\Desarrolladora;
use App\Models\Distribuidora;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VideojuegoIndex extends Component
{
    public $titulo;
    public $anyo;
    public $desarrolladora_id = "";
    public $distribuidora_id = "";
    public $estaEditando = false;
    public $videojuegoId;
    public $sortField = 'titulo';
    public $sortDirection = 'asc';
    public $searchField = 'titulo';
    public $desarrolladorasFiltradas = [];

    public $videojuego_editar;

    public function crear(){

        $validated = $this->validate((new StoreVideojuegoRequest())->rules());

        Videojuego::create($validated);

        $this->reset();
    }

    public function editar($videojuegoId)
    {
        $this->videojuegoId = $videojuegoId;
        $this->videojuego_editar = Videojuego::findOrFail($videojuegoId);
        $this->titulo = $this->videojuego_editar->titulo;
        $this->anyo = $this->videojuego_editar->anyo;
        $this->desarrolladora_id = $this->videojuego_editar->desarrolladora_id;
        $this->distribuidora_id = $this->videojuego_editar->desarrolladora->distribuidora->id;
        $distribuidora = Distribuidora::find($this->distribuidora_id);
        $this->desarrolladorasFiltradas = $distribuidora->desarrolladoras;
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

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function updatedDistribuidoraId($distribuidora_id){

        if(!$distribuidora_id == ''){
            $distribuidora = Distribuidora::find($distribuidora_id);
            $this->desarrolladorasFiltradas = $distribuidora->desarrolladoras;
        } else{
            $this->desarrolladorasFiltradas = [];
        }
    }

    public function render()
    {
        $query = Auth::user()->videojuegos()->with(['desarrolladora.distribuidora']);

        $query->select('videojuegos.*', 'desarrolladoras.nombre', 'distribuidoras.nombre')
                ->join('desarrolladoras', 'desarrolladoras.id', '=', 'videojuegos.desarrolladora_id')
                ->join('distribuidoras', 'distribuidoras.id', '=', 'desarrolladoras.distribuidora_id')
                ->orderBy($this->sortField, $this->sortDirection);

        $videojuegos = $query->get();

        return view('livewire.videojuego-index', [
            'videojuego' => $this->videojuego_editar,
            'videojuegos' => $videojuegos,
            'distribuidoras' => Distribuidora::all(),
            'desarrolladoras' => $this->desarrolladorasFiltradas,
        ]
    )->layout('layouts.app');
    }
}
