<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    /** @use HasFactory<\Database\Factories\AlbumFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'albumes';
    protected $fillable = ['nombre', 'imagen'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function canciones(){
        return $this->belongsToMany(Cancion::class, 'album_cancion');
    }

    public function calcularDuracion(){

        $totalSegundos = 0;

        foreach($this->canciones as $cancion){

            // Obtener la duración en formato "mm:ss"
            list($minutos, $segundos) = explode(':', $cancion->duracion);

            // Convertir la duración a segundos y sumar
            $totalSegundos += ($minutos * 60) + $segundos;

        }

        // Convertir el total de segundos a minutos y segundos
        $minutosTotales = floor($totalSegundos / 60);
        $segundosTotales = $totalSegundos % 60;

        // Formatear el resultado en "mm:ss"
        return sprintf('%02d:%02d', $minutosTotales, $segundosTotales);


    }
}
