<?php

use App\Livewire\Auth\PaginaLogin;
use App\Livewire\Auth\PaginaOlvideContraseña;
use App\Livewire\Auth\PaginaReestablecerContraseña;
use App\Livewire\Auth\PaginaRegistro;
use App\Livewire\PaginaCancelar;
use App\Livewire\PaginaCategorias;
use App\Livewire\PaginaInicio;
use App\Livewire\PaginaProductos;
use App\Livewire\PaginaCarrito;
use App\Livewire\PaginaDetalleMyOrden;
use App\Livewire\PaginaDetalleProducto;
use App\Livewire\PaginaExito;
use App\Livewire\PaginaMyOrden;
use App\Livewire\PaginaPago;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', PaginaInicio::class);
Route::get('/categorias', PaginaCategorias::class);
Route::get('/productos', PaginaProductos::class);
Route::get('/carrito', PaginaCarrito::class);
Route::get('/productos/{slug}', PaginaDetalleProducto::class);



Route::middleware('guest')->group(function(){
    Route::get('/login', PaginaLogin::class)->name('login');
    Route::get('/register', PaginaRegistro::class);
    Route::get('/olvide-contraseña', PaginaOlvideContraseña::class)->name('password.request');
    Route::get('/reset/{token}', PaginaReestablecerContraseña::class)->name('password.reset');
});



Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    });

    Route::get('/pagina-pago', PaginaPago::class);
    Route::get('/my-orders', PaginaMyOrden::class);
    Route::get('/my-orders/{order}', PaginaDetalleMyOrden::class)->name('my-orders.show');

    Route::get('/pago-exitoso', PaginaExito::class)->name('pago.exitoso');
    Route::get('/pago-cancelado', PaginaCancelar::class)->name('pago.cancelado');
});
