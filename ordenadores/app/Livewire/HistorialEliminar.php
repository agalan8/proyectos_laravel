<?php

namespace App\Livewire;

use App\Models\Cambio;
use App\Models\Ordenador;
use Livewire\Component;
use Livewire\Volt\Compilers\Mount;

class HistorialEliminar extends Component
{
    public $ordenador;

    public function mount($ordenadorId){
        $this->ordenador = Ordenador::find($ordenadorId);
    }

    public function eliminarHistorial(){


        foreach($this->ordenador->cambios as $cambio){
            $cambio->delete();
        }

        $this->ordenador->load('cambios');

    }

    public function render()
    {
        return view('livewire.historial-eliminar', [
            'cambios' => $this->ordenador->cambios,
        ]);
    }
}
