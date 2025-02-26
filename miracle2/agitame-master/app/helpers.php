<?php

use Illuminate\Support\Carbon;

if (!function_exists('dinero')){
    function dinero($s)
    {
        return number_format($s, 2, ',', ' ') . ' €';
    }
}

if (!function_exists('fecha')){
    function fecha($s)
    {
        return (new Carbon($s))->settings([
            'locale' => 'es_ES',
        ])->setTimeZone('Europe/Madrid')->isoFormat('LLL');
    }
}
