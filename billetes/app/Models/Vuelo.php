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

    public function generarAsientos(){

        for($i = 1; $i <= $this->plazas_totales; $i++){

            Asiento::create([
                'vuelo_id' => $this->id,
                'numero' => $i,
            ]);

        }
    }

    public function plazasLibres(){

        $libre = false;

        foreach($this->asientos as $asiento){
            if($asiento->reserva){
                $libre = false;
            } else{
                $libre = true;
            }
        }
        return $libre;
    }
}
