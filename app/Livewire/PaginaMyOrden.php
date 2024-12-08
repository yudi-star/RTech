<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
#[Title('Mis Ordenes')]
class PaginaMyOrden extends Component
{
    use WithPagination;

    public function render(){
        $my_orders = Orden::where('user_id', Auth::user()->id)->latest()->paginate(5);
        return view('livewire.pagina-my-orden', [
            'orders' => $my_orders
        ]);
    }
}
