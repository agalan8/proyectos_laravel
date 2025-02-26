<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    private $saldo = null;

    /** @use HasFactory<\Database\Factories\CuentaFactory> */
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function movimientos()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function saldo()
    {
        if ($this->saldo === null) {
            $this->saldo = $this->movimientos()->sum('importe');
        }
        return $this->saldo;
    }

    public function refrescarSaldo()
    {
        $this->saldo = null;
        return $this->saldo();
    }
}
