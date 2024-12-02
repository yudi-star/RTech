<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilamentAdminCheck
{
    public function handle(Request $request, Closure $next)
    {
        // Si el usuario no está autenticado, redirige a la página principal
        if (!Auth::check()) {
            return redirect('/');
        }

        // Si el usuario está autenticado pero no es admin, redirige a la página principal
        if (Auth::user()->email !== 'admin123@gmail.com') {
            return redirect('/');
        }

        return $next($request);
    }
}