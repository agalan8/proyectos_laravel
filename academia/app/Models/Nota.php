<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    /** @use HasFactory<\Database\Factories\NotaFactory> */
    use HasFactory;

    function alumno(){
        return $this->belongsTo(Alumno::class);
    }

    function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }

    function evaluacion(){
        return $this->belongsTo(Evaluacion::class);
    }
}
