<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    /** @use HasFactory<\Database\Factories\CuentaFactory> */
    use HasFactory;

    protected $fillable = ['numero', 'cliente_id'];

    function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    function movimientos(){
        return $this->hasMany(Movimiento::class);
    }
}
