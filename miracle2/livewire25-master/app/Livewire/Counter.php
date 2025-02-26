<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;

class Counter extends Component
{
    public $nombre;
    public $email;
    public $password;
    public $mensaje;

    public function crear()
    {
        $cifrada = Hash::make($this->password);
        User::create([
            'name' => $this->nombre,
            'email' => $this->email,
            'password' => $cifrada,
        ]);
        $this->mensaje = 'Usuario creado.';
        $this->nombre = '';
        $this->email = '';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.counter')
            ->title("Pepito")
            ->with([
                'usuarios' => User::all(),
            ]);
    }
}
