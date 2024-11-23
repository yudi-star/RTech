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
Route::get('/categories', PaginaCategorias::class);
Route::get('/products', PaginaProductos::class);
Route::get('/cart', PaginaCarrito::class);
Route::get('/products/{slug}', PaginaDetalleProducto::class);



Route::middleware('guest')->group(function(){
    Route::get('/login', PaginaLogin::class);
    Route::get('/register', PaginaRegistro::class);
    Route::get('/forgot', PaginaOlvideContraseña::class);
    Route::get('/reset', PaginaReestablecerContraseña::class);
});



Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){
        Auth::logout();
        return redirect('/');
    });

    Route::get('/chekout', PaginaPago::class);
    Route::get('/my-orders', PaginaMyOrden::class);
    Route::get('/my-orders/{order}', PaginaDetalleMyOrden::class);

    Route::get('/success', PaginaExito::class);
    Route::get('/cancel', PaginaCancelar::class);
});
