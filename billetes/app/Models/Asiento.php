<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asiento extends Model
{
    /** @use HasFactory<\Database\Factories\AsientoFactory> */
    use HasFactory;

    protected $fillable = ['numero', 'vuelo_id'];

    public function vuelo(){
        return $this->belongsTo(Vuelo::class);
    }

    public function reserva(){
        return $this->hasOne(Reserva::class);
    }
}
