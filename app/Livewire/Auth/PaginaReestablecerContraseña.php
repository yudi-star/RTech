<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\PasswordReset;

#[Title('Restablecer contraseña')]
class PaginaReestablecerContraseña extends Component{

    public $token;

    #[Url]
    public $email;
    public $password;
    public $password_confirmation;

    public function mount($token){
        $this->token = $token;
    }

    public function guardar(){
        $this->validate([
            'email' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset([
            'token' => $this->token,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,

        ], function(User $user, string $password){
            $password = $this->password;
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $user->save();
            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET?redirect('/login'):session()->flash('mensaje', 'Algo salio mal');
    }

    public function messages(){
        return [
            'password.required' => 'Debes ingresar tu contraseña',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'Las contraseñas no coinciden',

        ];
    }

    public function render()
    {
        return view('livewire.auth.pagina-reestablecer-contraseña');
    }
}
