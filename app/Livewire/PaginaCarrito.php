<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CarritoGestion;
use App\Livewire\Partials\Header;


#[Title('Carrito - RebornTech')]
class PaginaCarrito extends Component{

    public $items_carrito = [];
    public $total;

    public function mount(){
        $this->items_carrito = CarritoGestion::obtenerTotalArticulosDeCookie();
        $this->total = CarritoGestion::obtenerPrecioTotalCarrito($this->items_carrito);
    }

    public function eliminar_item_carrito($producto_id){
        $this->items_carrito = CarritoGestion::eliminarProducto($producto_id);
        $this->total = CarritoGestion::obtenerPrecioTotalCarrito($this->items_carrito);
        $this->dispatch('actualizarCantidadCarrito', cantidad_total: count($this->items_carrito))->to(Header::class);
    }

    public function incrementar_cantidad($producto_id){
        $this->items_carrito = CarritoGestion::aumentarCantidadProducto($producto_id);
        $this->total = CarritoGestion::obtenerPrecioTotalCarrito($this->items_carrito);
    }


    public function disminuir_cantidad($producto_id){
        $this->items_carrito = CarritoGestion::disminuirCantidadProducto($producto_id);
        $this->total = CarritoGestion::obtenerPrecioTotalCarrito($this->items_carrito);
    }

    public function render()
    {
        return view('livewire.pagina-carrito');
    }
}
