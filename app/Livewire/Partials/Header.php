<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Helpers\CarritoGestion;
use Livewire\Attributes\On;

class Header extends Component{

    public $cantidad_total = 0;

    public function aumentarCantidadCarrito(){
        $this->cantidad_total = count(CarritoGestion::obtenerTotalArticulosDeCookie());
    }

    #[On('actualizarCantidadCarrito')]
    public function actualizarCantidadCarrito($cantidad_total){
        $this->cantidad_total = $cantidad_total;
    }

    public function render()
    {
        return view('livewire.partials.header');
    }
}
