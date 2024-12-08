<x-mail::message>
# Pedido Realizado con exito

Gracias por tu pedido. Tu numero de pedido es: {{$orden->id}}.

<x-mail::button :url="$url">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
