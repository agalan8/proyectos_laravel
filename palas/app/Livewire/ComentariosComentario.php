<?php

namespace App\Livewire;

use App\Models\Comentario;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ComentariosComentario extends Component
{
    public $comentario_id;

    public $comentarios = [];

    public $contenido;
    public function render()
    {
        $comentario = Comentario::find($this->comentario_id);

        if($comentario != null){
            $this->comentarios = $comentario->comentarios;
        }

        return view('livewire.comentarios-comentario', [
            'comentario' => $comentario,
            'comentarios' => $this->comentarios,
        ]);
    }

    public function comentarComentario(Comentario $comentario){


        $comentarioNuevo = new Comentario([
            'contenido' => $this->contenido,
            'user_id' => Auth::user()->id,
        ]);

        $comentarioNuevo->comentable()->associate($comentario);

        $comentarioNuevo->save();

        $comentario->load('comentarios');

        $this->comentarios = $comentario->comentarios;

        $this->contenido = '';
    }


    public function eliminarComentario(Comentario $comentario){

        $this->authorize('delete', $comentario);


        $comentario->comentarios()->delete();
        $comentario->delete();
    }
}
