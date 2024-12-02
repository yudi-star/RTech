<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Helpers\CarritoGestion;
use App\Models\Orden;
use App\Models\Direccion;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as CheckoutSession;
use Stripe\Stripe;
use Stripe\Session;
use App\Models\OrdenItem;

#[Title('Pago - Reborntech')]
class PaginaPago extends Component
{
    public $nombre;
    public $apellido;
    public $telefono;
    public $direccion;
    public $ciudad;
    public $distrito;
    public $codigo_postal;
    public $metodo_pago;


    public function mount(){
        $items_carrito = CarritoGestion::obtenerTotalArticulosDeCookie();
        if(count($items_carrito) == 0){
            return redirect('/productos');
        }
    }

    public function confirmarPedido()
    {
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

        $items_carrito = CarritoGestion::obtenerTotalArticulosDeCookie();

        // Crear array para los items del pedido
        $items_pedido = [];
        foreach($items_carrito as $item){
            $items_pedido[] = [
                'producto_id' => $item['producto_id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio_unitario'],
                'precio_total' => $item['precio_total']
            ];
        }

        // Crear array para los items de Stripe
        $stripe_items = [];
        foreach($items_carrito as $item){
            $stripe_items[] = [
                'price_data' => [
                    'currency' => 'PEN',
                    'product_data' => [
                        'name' => $item['nombre'],
                    ],
                    'unit_amount' => $item['precio_unitario'] * 100,
                ],
                'quantity' => $item['cantidad'],
            ];
        }

        // Crear la orden
        $orden = new Orden();
        $orden->user_id = Auth::user()->id;
        $orden->total = CarritoGestion::obtenerPrecioTotalCarrito($items_carrito);
        $orden->metodo_pago = $this->metodo_pago;
        $orden->estado_pago = 'pendiente';
        $orden->estado = 'pendiente';
        $orden->tipo_moneda = 'PEN';
        $orden->cantidad_compra = count($items_carrito);
        $orden->metodo_compra = 'none';
        $orden->notas = 'Orden generada por el usuario '.Auth::user()->name;

        // Crear la dirección
        $direccion = new Direccion();
        $direccion->nombre = $this->nombre;
        $direccion->apellido = $this->apellido;
        $direccion->telefono = $this->telefono;
        $direccion->direccion = $this->direccion;
        $direccion->ciudad = $this->ciudad;
        $direccion->distrito = $this->distrito;
        $direccion->codigo_postal = $this->codigo_postal;

        $redirect_url = '';

        // Procesar el pago con Stripe si es necesario
        if ($this->metodo_pago == 'tarjeta'){
            Stripe::setApiKey(env('STRIPE_SECRET_KEY'));    
            $sessionPago = CheckoutSession::create([
                'payment_method_types' => ['card'],
                'customer_email' => Auth::user()->email,
                'line_items' => $stripe_items,
                'mode' => 'payment',
                'success_url' => route('pago.exitoso').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('pago.cancelado'),
            ]); 

            $redirect_url = $sessionPago->url;
        } else {
            $redirect_url = route('pago.exitoso');
        }

        // Guardar la orden y sus relaciones
        $orden->save();
        $direccion->orden_id = $orden->id;
        $direccion->save();

        // Guardar los items del pedido
        $orden->ordenItems()->createMany($items_pedido);

        // Limpiar el carrito
        CarritoGestion::vaciarArticulosDeCookie();

        return redirect($redirect_url);
    }

    public function messages()
    {
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

    public function render()
    {
        $items_carrito = CarritoGestion::obtenerTotalArticulosDeCookie();
        $total = CarritoGestion::obtenerPrecioTotalCarrito($items_carrito);

        return view('livewire.pagina-pago', [
            'items_carrito' => $items_carrito,
            'total' => $total
        ]);
    }
}