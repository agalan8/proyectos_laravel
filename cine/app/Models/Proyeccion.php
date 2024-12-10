<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyeccion extends Model
{
    /** @use HasFactory<\Database\Factories\ProyeccionFactory> */
    use HasFactory;

    protected $table = 'proyecciones';

    function pelicula(){
        return $this->belongsTo(Pelicula::class);
    }

    function sala(){
        return $this->belongsTo(Sala::class);
    }

    function entradas(){
        return $this->hasMany(Entrada::class);
    }

}
