<aside id="sidebar" class="fixed hidden z-30 h-full top-0 left-0 pt-16 lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
       <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
          <div class="flex-1 px-3 bg-white divide-y space-y-1">
             <ul class="space-y-2 pb-2">
                {{-- <li>
                   <form action="#" method="GET" class="lg:hidden">
                      <label for="mobile-search" class="sr-only">Search</label>
                      <div class="relative">
                         <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                               <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                         </div>
                         <input type="text" name="email" id="mobile-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-cyan-600  block w-full pl-10 p-2.5" placeholder="Search">
                      </div>
                   </form>
                </li> --}}
                <li>
                  <div class="bg-NiziGray1  h-14 mx-auto mb-4 p-2 flex items-center rounded-xl">
                      <img src="{{ asset('img/coffee_win.jpg') }}" alt="" class="h-8 w-8 rounded-full  sm:h-10 sm:w-10" >
                      <div class=" sm:block ml-4 sm:ml-2">
                          <p class="text-black text-sm font-dm-sans-medium" >Coffee Win</p>
                          <p class="text-gray-400 text-text10 font-dm-sans-regular">Coffe_Win@gmail.com</p>
                      </div>
                  </div>
              </li>
              <li>
                <form action="InicioAdmin" method="get">
                <button  class="relative flex flex-row items-center h-10 border-r-NiziBlue3  border-r-4 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent " style="width: 100%">
                  <span class="inline-flex justify-start items-center">
                      <img src="{{ asset('img/Inicio.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                    </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Inicio</span>
                </button>
              </form>
              </li>
              <li>
                <a href="/ganancias" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Dinero.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                  </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate" >Ganancias</span>
                </a>
              </li>
              {{-- <li>
                <a href="/comercio" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Comercios.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Mi comercio</span>
                </a>
              </li> --}}
              {{-- <li>
                <a href="/reportes" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Movimientos.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                  </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Reportes</span>
                </a>
              </li> --}}
              <li>
                <form action="SolicitudAdmin" method="get">
                <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray hover:text-white-800 border-l-4 border-transparent" style="width: 100%">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Tarjeta (1).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Solicitudes</span>
                </button>
              </form>
              </li>
              <li>
                <a href="/menudigital" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent ">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Menú digital</span>
                </a>
              </li>
              <li>
                <a href="/pedidos" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent ">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Notificaciones (2).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </span>
                  <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Pedidos</span>
                </a>
              </li>
              
              <li>
                <a href="#" onclick="mostrarAlerta()" class="relative flex flex-row items-center h-10 mt-20 sm:mt-36 focus:outline-none hover:bg-customGray border-l-4 border-transparent">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/support_icon.png')}}" alt="" class="mr-2 " style="width: 35px; height: 30px;">
                  </span>
                  <span class="ml-2 text-black text-lg font-dm-sans-medium tracking-wide truncate">Atención clientes</span>
                </a>
              </li>
              <li>
                <a href="/login" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray  border-l-4 border-transparent">
                  <span class="inline-flex justify-center items-center">
                    <img src="{{ asset('img/Door.png')}}" alt="" class=" mr-2 " style="width: 35px; height: 30px;">
                  </span>
                  <span class="ml-2 text-red-600 text-lg  font-dm-sans-medium tracking-wide truncate">Cerrar sesión</span>
                </a>
              </li>
             </ul>
          </div>
       </div>
    </div>
 </aside>

 <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>