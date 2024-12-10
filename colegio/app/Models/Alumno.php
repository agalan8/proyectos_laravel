<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $fillable = ['nombre'];

    function ccees(){
        return $this->belongsToMany(Ccee::class,'notas')
                    ->withPivot('nota');
    }
}
