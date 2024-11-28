<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Password;

#[Title('Olvide mi contraseña')]
class PaginaOlvideContraseña extends Component{

    public $email;

    public function guardar(){
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
        ]);

        $status = Password::sendResetLink(['email' => $this->email]);

        if($status === Password::RESET_LINK_SENT){
            session()->flash('mensaje', 'Se ha enviado un correo para restablecer tu contraseña!');
            $this->email = '';

        }
    }

    public function messages(){
        return [
            'email.required' => 'Debes ingresar tu email',
            'email.email' => 'El email no es valido',
            'email.exists' => 'El email no esta registrado',
        ];
    }

    public function render()
    {
        return view('livewire.auth.pagina-olvide-contraseña');
    }
}
