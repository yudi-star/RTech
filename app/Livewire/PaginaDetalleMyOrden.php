<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\OrdenItem;
use App\Models\Direccion;
use App\Models\Orden;
use App\Models\Producto;

#[Title('Detalle de tu orden')]	
class PaginaDetalleMyOrden extends Component {

    public $orden_id;

    public function mount($orden_id){
        $this->orden_id = $orden_id;
    } 

    public function render() {
        $orden_items = OrdenItem::with('producto')->where('orden_id', $this->orden_id)->get();
        $direccion = Direccion::where('orden_id', $this->orden_id)->first();
        $orden = Orden::where('id', $this->orden_id)->first();

        return view('livewire.pagina-detalle-my-orden', [
            'orden_items' => $orden_items,
            'direccion' => $direccion,
            'orden' => $orden
        ]);
    }
}
