<?php
namespace App\Livewire;

use App\Models\Evento;
use Carbon\Carbon;
use Livewire\Component;

class EventoTabla extends Component
{
    public $fechaInicio;
    public $fechaFin;
    public $eventos = [];

    public $sortField = 'nombre';
    public $sortDirection = 'asc';

    public function sortBy($campo)
    {
        if ($this->sortField === $campo) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $campo;
            $this->sortDirection = 'asc';
        }

        $this->filtrar();
    }

    public function updated($propertyName)
    {
        if ($propertyName === 'fechaInicio' || $propertyName === 'fechaFin') {
            $this->filtrar();
        }
    }

    public function filtrar()
    {
        $query = Evento::query();

        if ($this->fechaInicio) {
            $query->whereDate('fecha_inicio', '>=', Carbon::createFromFormat('Y-m-d', $this->fechaInicio));
        }

        if ($this->fechaFin) {
            $query->whereDate('fecha_fin', '<=', Carbon::createFromFormat('Y-m-d', $this->fechaFin));
        }

        $query->orderBy($this->sortField, $this->sortDirection);

        $this->eventos = $query->get();
    }

    public function mount()
    {
        $this->eventos = Evento::all();
    }

    public function render()
    {
        return view('livewire.evento-tabla', [
            'eventos' => $this->eventos,
        ]);
    }
}
