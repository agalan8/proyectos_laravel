<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    /** @use HasFactory<\Database\Factories\EventoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'fecha_inicio', 'fecha_fin'];

    public function formatearFecha($fecha){
        return Carbon::parse($fecha)->setTimeZone('Europe/Madrid')->format('d/m/Y H:i:s');
    }

        public function eventoEstado()
    {
        // Obtener la fecha actual como un objeto DateTime
        $fechaActual = new DateTime();

        // Crear objetos DateTime a partir de las fechas de tipo datetime
        $fechaInicio = new DateTime($this->fecha_inicio);  // Esto asume que $this->fecha_inicio es una cadena en formato Y-m-d H:i:s
        $fechaFin = new DateTime($this->fecha_fin);        // Lo mismo para $this->fecha_fin

        // Comparar la fecha actual con la fecha de inicio y fin del evento
        if ($fechaActual < $fechaInicio) {
            return "Próximo evento";
        } elseif ($fechaActual > $fechaFin) {
            return "Evento pasado";
        } else {
            return "Evento en curso";
        }
    }


}
