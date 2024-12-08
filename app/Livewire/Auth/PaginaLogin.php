<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

#[Title('Iniciar sesión')]
class PaginaLogin extends Component
{
    public $email;
    public $password;

    public function mount()
    {
        // Si ya está autenticado, redirige según el tipo de usuario
        if (Auth::check()) {
            if (Auth::user()->email === 'admin123@gmail.com') {
                redirect()->intended('/admin');
            } else {
                redirect()->intended('/');
            }
        }
    }

    public function guardar()
    {
        $this->validate([
            'email' => 'required|email|max:255|exists:users,email',
            'password' => 'required|min:8|max:255',
        ]);

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('error', 'Credenciales incorrectas');
            return;
        }

        // Si es el admin, redirige al panel de administración
        if ($this->email === 'admin123@gmail.com') {
            return redirect()->intended('/admin');
        }

        // Si no es admin, redirige a la página principal
        return redirect()->intended('/');
    }

    public function messages()
    {
        return [
            'email.required' => 'El email es requerido',
            'password.required' => 'La contraseña es requerida',
            'email.email' => 'El email no es valido',
            'email.exists' => 'El email no está registrado',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
        ];
    }

    public function render()
    {
        return view('livewire.auth.pagina-login');
    }
}