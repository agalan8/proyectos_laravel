<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /** @use HasFactory<\Database\Factories\TicketFactory> */
    use HasFactory;

    protected $fillable = ['tarjeta'];

    public function lineas(){
        return $this->hasMany(Linea::class);
    }

    public function getTotal(){

        $total = 0;

        foreach($this->lineas as $linea){

            $precio = $linea->producto->precio;

            $precio = $precio * $linea->cantidad;

            $total += $precio;
        }

        return $total;
    }
}
