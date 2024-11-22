<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
      <h1 class="text-2xl font-semibold mb-4">Carrito de Compras</h1>
      <div class="flex flex-col md:flex-row gap-4">
        <div class="md:w-3/4">
          <div class="bg-white overflow-x-auto rounded-lg shadow-md p-6 mb-4">
            <table class="w-full">
              <thead>
                <tr>
                  <th class="text-left font-semibold">Producto</th>
                  <th class="text-left font-semibold">Precio</th>
                  <th class="text-left font-semibold">Cantidad</th>
                  <th class="text-left font-semibold">Total</th>
                  <th class="text-left font-semibold">Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-4">
                    <div class="flex items-center">
                      <img class="h-16 w-24 mr-4" src="{{asset('images/Asus tuf gaming f15.png')}}" alt="Product image">
                      <span class="font-semibold">Asus Tuf Gaming F15</span>
                    </div>
                  </td>
                  <td class="py-4">S/. 3999.00</td>
                  <td class="py-4">
                    <div class="flex items-center">
                      <button class="border rounded-md py-2 px-4 mr-2">-</button>
                      <span class="text-center w-8">1</span>
                      <button class="border rounded-md py-2 px-4 ml-2">+</button>
                    </div>
                  </td>
                  <td class="py-4">S/. 3999.00</td>
                  <td><button class="bg-slate-300 border-2 border-slate-400 rounded-lg px-3 py-1 hover:bg-red-500 hover:text-white hover:border-red-700">Eliminar</button></td>
                </tr>
                <!-- More product rows -->
              </tbody>
            </table>
          </div>
        </div>
        <div class="md:w-1/4">
          <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Resumen</h2>
            <div class="flex justify-between mb-2">
              <span>Subtotal</span>
              <span>S/. 3999.00</span>
            </div>
            <div class="flex justify-between mb-2">
              <span>Impuestos</span>
              <span>S/. 1.99</span>
            </div>
            <div class="flex justify-between mb-2">
              <span>Envío</span>
              <span>S/. 0.00</span>
            </div>
            <hr class="my-2">
            <div class="flex justify-between mb-2">
              <span class="font-semibold">Total</span>
              <span class="font-semibold">S/. 4000.99</span>
            </div>
            <button class="bg-yellow-400 text-white py-2 px-4 rounded-lg mt-4 w-full">Finalizar Compra</button>
          </div>
        </div>
      </div>
    </div>
  </div>