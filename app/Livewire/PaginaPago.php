<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CarritoGestion;

#[Title('Pago - Reborntech')]
class PaginaPago extends Component{

    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $ciudad;
    public $distrito;
    public $codigo_postal;
    public $metodo_pago;


    public function confirmarPedido(){
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'distrito' => 'required',
            'codigo_postal' => 'required',
            'metodo_pago' => 'required',
        ]);
    }

    public function messages(){
        return [
            'nombre.required' => 'Debes de ingresar tu nombre',
            'apellido.required' => 'Debes de ingresar tu apellido',
            'telefono.required' => 'Debes de ingresar tu telefono',
            'direccion.required' => 'Debes de ingresar tu direccion',
            'ciudad.required' => 'Debes de ingresar tu ciudad',
            'distrito.required' => 'Debes de ingresar tu distrito',
            'codigo_postal.required' => 'Debes de ingresar tu codigo postal',
            'metodo_pago.required' => 'Debes de seleccionar un metodo de pago',
        ];
    }

    public function render(){

        $items_carrito = CarritoGestion::obtenerTotalArticulosDeCookie();
        $total = CarritoGestion::obtenerPrecioTotalCarrito($items_carrito);

        return view('livewire.pagina-pago', [
            'items_carrito' => $items_carrito,
            'total' => $total
        ]);
    }
}
