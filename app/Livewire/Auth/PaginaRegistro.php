<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
#[Title('Registro')]

class PaginaRegistro extends Component{

    public $name;
    public $email;
    public $password;

    public function guardar(){
        $this->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:8|max:255',
        ]);

        $usuario = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($usuario);

        return redirect()->intended('/');
    }

    public function messages(){
        return [
            'name.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'password.required' => 'La contraseña es requerida',
            'email.email' => 'El email no es valido',
            'email.unique' => 'El email ya esta en uso',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];
    }

    public function render()
    {
        return view('livewire.auth.pagina-registro');
    }
}
