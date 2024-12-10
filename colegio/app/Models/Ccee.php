<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ccee extends Model
{
    /** @use HasFactory<\Database\Factories\CceeFactory> */
    use HasFactory;

    function alumnos(){
        return $this->belongsToMany(Alumno::class, 'notas')
                    ->withPivot('nota');
    }
}
