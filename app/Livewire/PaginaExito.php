<?php

namespace App\Livewire;

use App\Models\Orden;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Illuminate\Support\Facades\Auth;

#[Title('Exito - RebornTech')]
class PaginaExito extends Component
{
    #[Url]
    public $session_id;
    public function render(){
        $ultima_orden = Orden::with('direccion')->where('user_id', Auth::user()->id)->latest()->first();
        
        if ($this->session_id) {
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
            $session_info = Session::retrieve($this->session_id);
            
            if ($session_info->payment_status != 'paid') {
                $ultima_orden->estado_pago = 'fallido';
                $ultima_orden->save();
                return redirect()->route('cancel');
            } else if ($session_info->payment_status == 'paid') {
                $ultima_orden->estado_pago = 'pagado';
                $ultima_orden->save();
            }
        }
        
        return view('livewire.pagina-exito', [
            'orden' => $ultima_orden,
        ]);
    }
}