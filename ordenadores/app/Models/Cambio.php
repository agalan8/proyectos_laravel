<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cambio extends Model
{
    /** @use HasFactory<\Database\Factories\CambioFactory> */
    use HasFactory;

    protected $fillable = ['ordenador_id', 'origen_id', 'destino_id'];

    public function ordenador(){
        return $this->belongsTo(Ordenador::class, 'ordenador_id');
    }

    public function aulaOrigen(){
        return $this->belongsTo(Aula::class, 'origen_id');
    }

    public function aulaDestino(){
        return $this->belongsTo(Aula::class, 'destino_id');
    }
}
