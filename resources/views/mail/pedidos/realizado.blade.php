<x-mail::message>
# Tu pedido ha sido realizado correctamente!

Gracias por tu compra. Tu numero de orden es: {{ $orden->id }}

<x-mail::button :url="$url">
Ver tu pedido
</x-mail::button>

Gracias,<br>
{{ config('app.name') }}
</x-mail::message>
    