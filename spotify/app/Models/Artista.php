<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artista extends Model
{
    /** @use HasFactory<\Database\Factories\ArtistaFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nombre', 'imagen'];

    public function canciones(){
        return $this->belongsToMany(Cancion::class);
    }
}
