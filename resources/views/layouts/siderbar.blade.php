<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Principal</title>
    @vite ("resources/css/app.css")
</head>
<body>
    <!-- Sidebar -->
    <div class="fixed flex flex-col top-8 left-2 bottom-8 rounded-2xl w-14 hover:w-64 md:w-64 bg-customGray1 text-white transition-all duration-300 border-none z-10 sidebar">
        <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
          <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block mb-4">
              <div class="flex flex-row items-center h-8">
                <img src="{{ asset('img/logoEdit.png') }}" alt="" class="h-8 w-8 mr-2 ">
                <div class="text-2xl tracking-wide text-black font-semibold font-dm-sans-bold">Nizi</div>
              </div>
            </li>
            <li>
                <div class="bg-customGray2 bg-opacity-10 h-14 mx-2 mb-4 p-2 flex items-center rounded-xl">
                    <img src="{{ asset('img/D&D.jpg') }}" alt="" class="h-6 w-6 rounded-full  sm:h-10 sm:w-10" >
                    <div class=" sm:block ml-4 sm:ml-2">
                        <p class="text-black text-text13 font-dm-sans-bold" >Anthony Martinez A.</p>
                        <p class="text-gray-400 text-text10 font-dm-sans-regular" >Anthony_Ar2003@hotmail.com</p>
                    </div>
                </div>
            </li>
            <li>
              <a href="/principal" class="relative flex flex-row items-center h-10 border-r-blue-600 border-r-4 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent  pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Inicio.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                    </svg>
                  </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Inicio</span>
                {{-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> --}}
              </a>
            </li>
            <li>
              <a href="#" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Dinero.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate" >Recargar tarjeta</span>
              </a>
            </li>
            <li>
              <a href="/movimientos" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Movimientos.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Movimientos</span>
              </a>
            </li>
            <li>
              <a href="/tarjeta" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Tarjeta (1).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Mi tarjeta</span>
              </a>
            </li>
            <li>
              <a href="#" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Menú digital</span>
              </a>
            </li>
            <li>
              <a href="/notificaciones" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Notificaciones (2).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Notificaciones</span>
              </a>
            </li>
            <li>
              <a href="comercios" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Comercios.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Comercios</span>
              </a>
            </li>
            <li>
              <a href="#" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Perfil.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2  text-black text-text18 font-dm-sans-medium tracking-wide truncate">Perfil</span>
              </a>
            </li>
            <li>
              <a href="#" class="mt-32 md:mt-20 2xl:mt-56 relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray  border-l-4 border-transparent pr-6">
                <span class="inline-flex justify-center items-center ml-4 sm:-ml-2">
                  <svg class="w-5 h-5" viewBox="0 0 24 24"><img src="{{ asset('img/Door.png')}}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                  </svg>
                </span>
                <span class="ml-2 text-red-600 text-text18 font-dm-sans-medium tracking-wide truncate">Cerrar sesión</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- ./Sidebar -->
</body>
</html>