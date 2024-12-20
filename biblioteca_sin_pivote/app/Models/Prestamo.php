<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    /** @use HasFactory<\Database\Factories\PrestamoFactory> */
    use HasFactory;

    function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    function ejemplar(){
        return $this->belongsTo(Ejemplar::class);
    }
}
