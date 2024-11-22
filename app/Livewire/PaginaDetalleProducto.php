<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Producto Detalle - Reborntech')]
class PaginaDetalleProducto extends Component
{
    public $slug;
    public function mount($slug){
        $this->slug = $slug;
    }
    public function render()
    {
        return view('livewire.pagina-detalle-producto',[
            'producto'=> Producto::where('slug',$this->slug)->firstOrFail(),
        ]);
    }
}
