<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public function cuentas()
    {
        return $this->hasMany(Cuenta::class);
    }
}
