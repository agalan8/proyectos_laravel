<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    /** @use HasFactory<\Database\Factories\AulaFactory> */
    use HasFactory;

    protected $fillable = ['nombre'];

    public function ordenadores(){
        return $this->hasMany(Ordenador::class);
    }

    public function dispositivos(){
        return $this->morphMany(Dispositivo::class, 'colocable');
    }

    public function cambios(){
        return $this->hasMany(Cambio::class);
    }
}
