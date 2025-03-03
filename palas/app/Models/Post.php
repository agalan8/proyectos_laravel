<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'user_id', 'imagen'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comentarios(){
        return $this->morphMany(Comentario::class, 'comentable');
    }
}
