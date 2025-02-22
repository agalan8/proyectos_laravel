<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vuelo;

class VuelosTable extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'codigo';
    public $sortDirection = 'asc';

    public $searchField = 'codigo';

    protected $queryString = ['search'];

    public function render()
    {

        $vuelos = Vuelo::query()
        ->when($this->search, function ($query) {

                return $query->where($this->searchField, 'ILIKE', "%{$this->search}%");
            }
        )
        ->orderBy($this->sortField, $this->sortDirection)
        ->paginate(2);


        return view('livewire.vuelos-table', [
            'vuelos' => $vuelos,
        ]);

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
}
