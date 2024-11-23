<div>
    <!-- separamaos-->
      <div class="w-full h-screen bg-gradient-to-r from-cyan-50 to-yellow-100 py-10 px-4 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
          <!-- Grid -->
          <div class="grid md:grid-cols-2 gap-4 md:gap-8 xl:gap-20 md:items-center">
            <div>
              <h1 class="block text-3xl font-bold text-gray-800 sm:text-4xl lg:text-6xl lg:leading-tight dark:text-white">
                Empieza a comprar en 
                <span class="text-yellow-300" style="text-shadow: 1px 1px 0px black, -1px -1px 0px black, 1px -1px 0px black, -1px 1px 0px black;">RebornTech</span>
              </h1>
              <p class="mt-3 text-lg text-gray-800 dark:text-gray-400">Compra productos de hogar, oficina y gaming de alta calidad a precios accesibles.</p>
            </div>
            
      
            <div class="relative ms-4">
              <img 
                    class="w-300 rounded-md my-10 mx-auto relative top-[-20px] left-[20px]" src="{{asset('images/carritoP.png')}}"alt="Image Description">

            </div>
            
          </div>
          <!-- End Grid -->
        </div>
      </div>
     <!-- Comienza brand-->
    <section class="py-20">
        <div class="max-w-xl mx-auto">
          <div class="text-center ">
            <div class="relative flex flex-col items-center">
              <h1 class="text-5xl font-bold dark:text-gray-200"> Encuentra conocidas<span class="text-yellow-300" style="text-shadow: 1px 1px 0px black, -1px -1px 0px black, 1px -1px 0px black, -1px 1px 0px black;"> Marcas
                </span> </h1>
              <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                <div class="flex-1 h-2 bg-yellow-300">
                </div>
                <div class="flex-1 h-2 bg-yellow-400">
                </div>
                <div class="flex-1 h-2 bg-yellow-500">
                </div>
              </div>
            </div>
            <p class="mb-12 text-base text-center text-gray-500">
              
            </p>
          </div>
        </div>
        <div class="justify-center max-w-6xl px-4 py-4 mx-auto lg:py-0">
          <div class="grid grid-cols-1 gap-6 lg:grid-cols-4 md:grid-cols-2">
            @foreach($marcas as $marca)
             <div class="bg-white rounded-lg shadow-md dark:bg-gray-800" wire:key="{{$marca->id}}">
               <a href="/products?selected_marcas[0]={{$marca->id}}" class="">
                 <img src="{{url('storage', $marca->imagen)}}" alt="{{$marca->nombre}}" class="object-contain w-full h-64 rounded-t-lg bg-white">
               </a>
               <div class="p-5 text-center">
                 <a href="" class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-300">
                   {{$marca->nombre}}
                 </a>
               </div>
             </div>
            @endforeach
          </div>
        </div>
      </section>
    <!-- Termina brand-->
    <!-- Comienza categorias-->
    <div class="bg-orange-200 py-20">
        <div class="max-w-xl mx-auto">
          <div class="text-center ">
            <div class="relative flex flex-col items-center">
              <h1 class="text-5xl font-bold dark:text-gray-200"> Encuentra diferentes <span class="text-yellow-300" style="text-shadow: 1px 1px 0px black, -1px -1px 0px black, 1px -1px 0px black, -1px 1px 0px black;"> Categorías
                </span> </h1>
              <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                <div class="flex-1 h-2 bg-yellow-300">
                </div>
                <div class="flex-1 h-2 bg-yellow-400">
                </div>
                <div class="flex-1 h-2 bg-yellow-500">
                </div>
              </div>
            </div>
            <p class="mb-12 text-base text-center text-gray-500">
              
            </p>
          </div>
        </div>
      
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
          <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">

            @foreach($categorias as $categoria)
             <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-900 dark:border-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="/products?selected_categorias[0]={{$categoria->id}}" wire:key="{{$categoria->id}}">
               <div class="p-4 md:p-5">
                 <div class="flex justify-between items-center">
                   <div class="flex items-center">
                     <img class="h-[2.375rem] w-[2.375rem] rounded-full" src="{{url('storage',$categoria->imagen)}}" alt="{{$categoria->nombre}}">
                     <div class="ms-3">
                       <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-gray-400 dark:text-gray-200">
                         {{$categoria->nombre}}
                       </h3>
                     </div>
                   </div>
                   <div class="ps-3">
                     <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                       <path d="m9 18 6-6-6-6" />
                     </svg>
                   </div>
                 </div>
               </div>
             </a>
            @endforeach
          </div>
        </div>
      </div>
    <!--Termina categorias-->
    <!-- empieza clientes-->
    {{-- <section class="py-14 font-poppins dark:bg-gray-800">
        <div class="max-w-6xl px-4 py-6 mx-auto lg:py-4 md:px-6">
          <div class="max-w-xl mx-auto">
            <div class="text-center ">
              <div class="relative flex flex-col items-center">
                <h1 class="text-5xl font-bold dark:text-gray-200"> Diferentes clientes haciendo <span class="text-yellow-300" style="text-shadow: 1px 1px 0px black, -1px -1px 0px black, 1px -1px 0px black, -1px 1px 0px black;"> Reseñas
                  </span> </h1>
                <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
                  <div class="flex-1 h-2 bg-yellow-300">
                  </div>
                  <div class="flex-1 h-2 bg-yellow-400">
                  </div>
                  <div class="flex-1 h-2 bg-yellow-500">
                  </div>
                </div>
              </div>
              <p class="mb-12 text-base text-center text-gray-500">
                
              </p>
            </div>
          </div>
      
          <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 ">
            <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
              <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
                <div class="flex items-center px-6 mb-2 md:mb-0 ">
                  <div class="flex mr-2 rounded-full">
                    <img src="https://i.postimg.cc/rF6G0Dh9/pexels-emmy-e-2381069.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
                  </div>
                  <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                      Piero Rojas</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Web Developer</p>
                  </div>
                </div>
                <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Publicado el 12, NOV , 2024
                </p>
              </div>
              <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
                RebornTech es mi tienda de referencia para todo lo relacionado con electrónica. Los precios son competitivos y la selección de productos es impresionante. 
                ¡Compré un nuevo celular y llegó en perfectas condiciones y justo a tiempo!
              </p>
              <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
                <div class="flex px-6 mb-2 md:mb-0">
                  <ul class="flex items-center justify-start mr-4">
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                  </ul>
                  <h2 class="text-sm text-gray-500 dark:text-gray-400">Calificación:<span class="font-semibold text-gray-600 dark:text-gray-300">
                      4.0</span>
                  </h2>
                </div>
                <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                  <div class="flex items-center">
                    <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                          <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                          </path>
                        </svg>
                      </a>
                      <span>12</span>
                    </div>
                    <div class="flex text-sm text-gray-700 dark:text-gray-400">
                      <a href="#" class="inline-flex hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-chat" viewBox="0 0 16 16">
                          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                          </path>
                        </svg>Responder</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
              <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
                <div class="flex items-center px-6 mb-2 md:mb-0 ">
                  <div class="flex mr-2 rounded-full">
                    <img src="https://i.postimg.cc/q7pv50zT/pexels-edmond-dant-s-4342352.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
                  </div>
                  <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                      Brunela Coveñas</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Mananger</p>
                  </div>
                </div>
                <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Publicado el 07, NOV , 2024
                </p>
              </div>
              <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
                Compré un iphone en RebornTech y no podría estar más satisfecho. 
                El proceso de compra fue sencillo y la atención al cliente excepcional. Sin duda, volveré a comprar aquí.
              </p>
              <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
                <div class="flex px-6 mb-2 md:mb-0">
                  <ul class="flex items-center justify-start mr-4">
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                  </ul>
                  <h2 class="text-sm text-gray-500 dark:text-gray-400">Calificación:<span class="font-semibold text-gray-600 dark:text-gray-300">
                      4.0</span>
                  </h2>
                </div>
                <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                  <div class="flex items-center">
                    <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                          <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                          </path>
                        </svg></a>
                      <span>16</span>
                    </div>
                    <div class="flex text-sm text-gray-700 dark:text-gray-400">
                      <a href="#" class="inline-flex hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-chat" viewBox="0 0 16 16">
                          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                          </path>
                        </svg>Responder</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
              <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
                <div class="flex items-center px-6 mb-2 md:mb-0 ">
                  <div class="flex mr-2 rounded-full">
                    <img src="https://i.postimg.cc/JzmrHQmk/pexels-pixabay-220453.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
                  </div>
                  <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                      Paul Vergel</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Programador Web</p>
                  </div>
                </div>
                <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Publicado el 02, NOV , 2024
                </p>
              </div>
              <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
                RebornTech es mi tienda de confianza para todo tipo de productos electrónicos. 
                La variedad de productos es impresionante y la calidad es excelente. 
                Además, el servicio al cliente es excepcional. ¡Recomendado!
              </p>
              <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
                <div class="flex px-6 mb-2 md:mb-0">
                  <ul class="flex items-center justify-start mr-4">
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                  </ul>
                  <h2 class="text-sm text-gray-500 dark:text-gray-400">Calificación:<span class="font-semibold text-gray-600 dark:text-gray-300">
                      4.0</span>
                  </h2>
                </div>
                <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                  <div class="flex items-center">
                    <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                          <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                          </path>
                        </svg></a>
                      <span>10</span>
                    </div>
                    <div class="flex text-sm text-gray-700 dark:text-gray-400">
                      <a href="#" class="inline-flex hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-chat" viewBox="0 0 16 16">
                          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                          </path>
                        </svg>Responder</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="py-6 bg-white rounded-md shadow dark:bg-gray-900">
              <div class="flex flex-wrap items-center justify-between pb-4 mb-6 space-x-2 border-b dark:border-gray-700">
                <div class="flex items-center px-6 mb-2 md:mb-0 ">
                  <div class="flex mr-2 rounded-full">
                    <img src="https://i.postimg.cc/4NMZPYdh/pexels-dinielle-de-veyra-4195342.jpg" alt="" class="object-cover w-12 h-12 rounded-full">
                  </div>
                  <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-300">
                      Jaime Farfan</h2>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Especialista en Bases de Datos</p>
                  </div>
                </div>
                <p class="px-6 text-base font-medium text-gray-600 dark:text-gray-400"> Publicado el 19, NOV , 2024
                </p>
              </div>
              <p class="px-6 mb-6 text-base text-gray-500 dark:text-gray-400">
                He tenido una excelente experiencia comprando en RebornTech. La variedad de productos electrónicos es enorme y la calidad es insuperable. 
                Compré varios accesorios para mi celular y todos llegaron en perfecto estado.
              </p>
              <div class="flex flex-wrap justify-between pt-4 border-t dark:border-gray-700">
                <div class="flex px-6 mb-2 md:mb-0">
                  <ul class="flex items-center justify-start mr-4">
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 mr-1 text-yellow-500 dark:text-yellow-400 bi bi-star-fill" viewBox="0 0 16 16">
                          <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z">
                          </path>
                        </svg>
                      </a>
                    </li>
                  </ul>
                  <h2 class="text-sm text-gray-500 dark:text-gray-400">Calificación:<span class="font-semibold text-gray-600 dark:text-gray-300">
                      4.0</span>
                  </h2>
                </div>
                <div class="flex items-center px-6 space-x-1 text-sm font-medium text-gray-500 dark:text-gray-400">
                  <div class="flex items-center">
                    <div class="flex mr-3 text-sm text-gray-700 dark:text-gray-400">
                      <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                          <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z">
                          </path>
                        </svg></a>
                      <span>20</span>
                    </div>
                    <div class="flex text-sm text-gray-700 dark:text-gray-400">
                      <a href="#" class="inline-flex hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-yellow-400 bi bi-chat" viewBox="0 0 16 16">
                          <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z">
                          </path>
                        </svg>Responder</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}
    <!--Termina clientes-->
</div>
