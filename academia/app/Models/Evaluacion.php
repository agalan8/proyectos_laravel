<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    /** @use HasFactory<\Database\Factories\EvaluacionFactory> */
    use HasFactory;

    protected $table = 'evaluaciones';

    function notas(){
        return $this->hasMany(Nota::class);
    }
}
