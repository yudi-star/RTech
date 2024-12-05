<?php

namespace App\Livewire;

use App\Models\Orden;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;

#[Title('Exito - RebornTech')]
class PaginaExito extends Component
{
   
    public function render()
    {
        $ultima_orden = Orden::with('direccion')->where('user_id', auth()->user()->id)->latest()->first();
        
        return view('livewire.pagina-exito',[
            'orden'=>$ultima_orden,
        ]);
    }
}
