<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    /** @use HasFactory<\Database\Factories\ReservaFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'asiento_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function asiento(){
        return $this->belongsTo(Asiento::class);
    }
}
