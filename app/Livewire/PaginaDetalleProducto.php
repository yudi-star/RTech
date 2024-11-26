<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Helpers\CarritoGestion;
use App\Livewire\Partials\Header;
use Jantinnerezo\LivewireAlert\LivewireAlert;
#[Title('Producto Detalle - Reborntech')]
class PaginaDetalleProducto extends Component
{
    use LivewireAlert;

    public $slug;
    public $cantidad = 1;

    public function mount($slug){
        $this->slug = $slug;
    }


    public function incrementarCantidad(){
        $this->cantidad++;
    }

    public function decrementarCantidad(){
        if($this->cantidad > 1){
            $this->cantidad--;
        }
    }

    public function añadirAlCarrito($producto_id){
        $cantidad_total = CarritoGestion::añadirProductoConCantidad($producto_id, $this->cantidad);
        $this->dispatch('actualizarCantidadCarrito', cantidad_total:$cantidad_total)->to(Header::class);

        $this->alert('success', 'Producto añadido al carrito', [
            'position' => 'bottom-end',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
    public function render()
    {
        return view('livewire.pagina-detalle-producto',[
            'producto'=> Producto::where('slug',$this->slug)->firstOrFail(),
        ]);
    }
}
