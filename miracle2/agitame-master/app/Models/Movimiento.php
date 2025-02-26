<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    public function cuenta()
    {
        return $this->belongsTo(Cuenta::class);
    }
}
