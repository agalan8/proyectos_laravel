<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    /** @use HasFactory<\Database\Factories\EjemplarFactory> */
    use HasFactory;

    protected $table = 'ejemplares';

    function libro(){
        return $this->belongsTo(Libro::class);
    }

    function prestamos(){
        return $this->hasMany(Prestamo::class);
    }
}
