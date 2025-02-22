<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    /** @use HasFactory<\Database\Factories\VueloFactory> */
    use HasFactory;

    protected $fillable = ['codigo', 'aeropuerto_origen', 'aeropuerto_destino', 'compañia_aerea', 'plazas_totales', 'precio'];

    public function asientos(){
        return $this->hasMany(Asiento::class);
    }
}
