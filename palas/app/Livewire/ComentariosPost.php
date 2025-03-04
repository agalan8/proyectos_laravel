<?php

namespace App\Livewire;

use App\Models\Comentario;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ComentariosPost extends Component
{
    public $post_id;
    public $contenido = null;

    public $comentarios = [];
    public function render()
    {

        $post = Post::find($this->post_id)->first();

        $this->comentarios = $post->comentarios;

        return view('livewire.comentarios-post', [
            'post' => $post,
            'comentarios' => $this->comentarios,
        ]);
    }

    public function comentarPost(){

        $post = Post::find($this->post_id)->first();

            $comentario = new Comentario([
        'contenido' => $this->contenido,
        'user_id' => Auth::user()->id,
        ]);

        $comentario->comentable()->associate($post);

        $comentario->save();

        return redirect()->route('posts.show', $post);
    }
}
