<?php

namespace App\Livewire;

use App\Models\Linea;
use App\Models\Producto;
use App\Models\Ticket;
use Livewire\Component;

class CompraCarrito extends Component
{

    public $codigo = null;

    public $productos = [];

    public $total = 0;

    public $comprando = true;

    public $tarjeta = null;

    public function render()
    {

        return view('livewire.compra-carrito', [

            'productos' => $this->productos,
            'total' => $this->total,
            'comprando' => $this->comprando,

        ])
        ->layout('layouts.app');
    }

    public function anyadirProducto(){

        $producto = Producto::where('codigo', $this->codigo)->first();

        $this->productos[] = $producto;

        $this->total += $producto->precio;

    }

    public function eliminarProducto($producto_id){

        foreach ($this->productos as $index => $producto) {
            if ($producto->id == $producto_id) {
                unset($this->productos[$index]);
                break;
            }
        }

        $this->productos = array_values($this->productos);

    }

    public function anularCompra(){

        $this->productos = [];

        $this->productos = array_values($this->productos);

        return redirect()->route('cajaAmiga');

    }

    public function finalizarCompra(){

        $this->comprando = false;
    }

    public function comprar(){

    }
}
