<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
        Confirmar pedido
    </h1>
    <form wire:submit.prevent="confirmarPedido">
        <div class="grid grid-cols-12 gap-4">
            <div class="md:col-span-12 lg:col-span-8 col-span-12">
                <!-- Card -->
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <!-- Shipping Address -->
                    <div class="mb-6">
                        <h2 class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                            Datos del cliente
                        </h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 dark:text-white mb-1" for="first_name">
                                    Nombre
                                </label>
                                <input
                                    wire:model="nombre" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('nombre') border-red-500 @enderror"
                                    id="first_name" type="text">
                                </input>
								@error('nombre')
									<span class="text-red-500 text-sm">{{ $message }}</span>
								@enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-white mb-1" for="last_name">
                                    Apellido
                                </label>
                                <input
                                    wire:model="apellido" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('apellido') border-red-500 @enderror"
                                    id="last_name" type="text">
                                </input>
								@error('apellido')
									<span class="text-red-500 text-sm">{{ $message }}</span>
								@enderror
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 dark:text-white mb-1" for="phone">
                                Telefono
                            </label>
                            <input
                                wire:model="telefono" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('telefono') border-red-500 @enderror"
                                id="phone" type="text">
                            </input>
							@error('telefono')
								<span class="text-red-500 text-sm">{{ $message }}</span>
							@enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 dark:text-white mb-1" for="address">
                                Direccion
                            </label>
                            <input
                                wire:model="direccion" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('direccion') border-red-500 @enderror"
                                id="address" type="text">
                            </input>
							@error('direccion')
								<span class="text-red-500 text-sm">{{ $message }}</span>
							@enderror
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 dark:text-white mb-1" for="city">
                                Ciudad
                            </label>
                            <input
                                wire:model="ciudad" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('ciudad') border-red-500 @enderror"
                                id="city" type="text">
                            </input>
							@error('ciudad')
								<span class="text-red-500 text-sm">{{ $message }}</span>
							@enderror
                        </div>
                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 dark:text-white mb-1" for="state">
                                    Distrito
                                </label>
                                <input
                                    wire:model="distrito" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('distrito') border-red-500 @enderror"
                                    id="state" type="text">
                                </input>
								@error('distrito')
									<span class="text-red-500 text-sm">{{ $message }}</span>
								@enderror
                            </div>
                            <div>
                                <label class="block text-gray-700 dark:text-white mb-1" for="zip">
                                    Codigo Postal
                                </label>
                                <input
                                    wire:model="codigo_postal" class="w-full rounded-lg border py-2 px-3 dark:bg-gray-700 dark:text-white dark:border-none @error('codigo_postal') border-red-500 @enderror"
                                    id="zip" type="text">
                                </input>
								@error('codigo_postal')
									<span class="text-red-500 text-sm">{{ $message }}</span>
								@enderror
                            </div>
                        </div>
                    </div>
                    <div class="text-lg font-semibold mb-4">
                        Seleccionar metodo de pago
                    </div>
                    <ul class="grid w-full gap-6 md:grid-cols-2">
                        <li>
                            <input class="hidden peer" id="hosting-small" required="" type="radio"
                                wire:model="metodo_pago" value="efectivo" />
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-small">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Pagar en efectivo cuando reciba el pedido
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                        </li>
                        <li>
                            <input class="hidden peer" id="hosting-big" type="radio"
                                wire:model="metodo_pago" value="tarjeta">
                            <label
                                class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                                for="hosting-big">
                                <div class="block">
                                    <div class="w-full text-lg font-semibold">
                                        Pagar con tarjeta de credito o debito
                                    </div>
                                </div>
                                <svg aria-hidden="true" class="w-5 h-5 ms-3 rtl:rotate-180" fill="none"
                                    viewbox="0 0 14 10" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 5h12m0 0L9 1m4 4L9 9" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2">
                                    </path>
                                </svg>
                            </label>
                            </input>
                        </li>
                    </ul>
					@error('metodo_pago')
						<span class="text-red-500 text-sm">{{ $message }}</span>
					@enderror
                </div>
                <!-- End Card -->
            </div>
            <div class="md:col-span-12 lg:col-span-4 col-span-12">
                <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                        Resumen de la orden
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Subtotal
                        </span>
                        <span>
                            {{ Number::currency($total, 'PEN') }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Impuestos
                        </span>
                        <span>
                            {{ Number::currency(0, 'PEN') }}
                        </span>
                    </div>
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Costo de envio
                        </span>
                        <span>
                            {{ Number::currency(0, 'PEN') }}
                        </span>
                    </div>
                    <hr class="bg-slate-400 my-4 h-1 rounded">
                    <div class="flex justify-between mb-2 font-bold">
                        <span>
                            Total
                        </span>
                        <span>
                            {{ Number::currency($total, 'PEN') }}
                        </span>
                    </div>
                    </hr>
                </div>
                <button type="submit" class="bg-yellow-400 mt-4 w-full p-3 rounded-lg text-lg text-white hover:bg-yellow-500">
                    Confirmar pedido
                </button>
                <div class="bg-white mt-4 rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                    <div class="text-xl font-bold underline text-gray-700 dark:text-white mb-2">
                        Resumen del carrito
                    </div>
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700" role="list">
                        @foreach ($items_carrito as $ci)
                            <li class="py-3 sm:py-4" wire:key="{{ $ci['producto_id'] }}">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img alt="{{ $ci['nombre'] }}" class="w-12 h-12 rounded-full"
                                            src="{{ url('storage', $ci['imagenes']) }}">
                                        </img>
                                    </div>
                                    <div class="flex-1 min-w-0 ms-4">
                                        <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                            {{ $ci['nombre'] }}
                                        </p>
                                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                            Cantidad: {{ $ci['cantidad'] }}
                                        </p>
                                    </div>
                                    <div
                                        class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                        {{ Number::currency($ci['precio_total'], 'PEN') }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </form>
</div>
