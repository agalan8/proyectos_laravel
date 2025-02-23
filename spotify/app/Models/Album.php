<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    /** @use HasFactory<\Database\Factories\AlbumFactory> */
    use HasFactory;

    protected $table = 'albumes';
    protected $fillable = ['nombre', 'imagen'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function canciones(){
        return $this->belongsToMany(Cancion::class, 'album_cancion');
    }
}
