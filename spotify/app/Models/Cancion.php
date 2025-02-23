<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    /** @use HasFactory<\Database\Factories\CancionFactory> */
    use HasFactory;

    protected $table = 'canciones';
    protected $fillable = ['nombre', 'imagen', 'duracion'];

    public function artistas(){
        return $this->belongsToMany(Artista::class, 'artista_cancion');
    }

    public function albumes(){
        return $this->belongsToMany(Album::class, 'album_cancion');
    }

}
