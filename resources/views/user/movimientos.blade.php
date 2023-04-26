<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite ("resources/css/app.css")
</head>
<body class="lg:overflow-hidden">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-customWhite overflow-y-auto">
        {{-- Sidebar --}}
        @extends('user.layouts.siderbar')
        @section('name')
        <p class="text-black text-sm font-dm-sans-medium" >{{session()->get('nombre')}}</p>
        <p class="text-gray-400 text-text10 font-dm-sans-regular">{{session()->get('correo')}}</p>
        @endsection
        {{-- end siderbar --}}
        <div class="lg:ml-64 mt-8">
            <!--Contenido-->
            <div class="mx-4 sm:h-contenedor2 2xl:h-contenedor1">
                <div class="grid grid-cols-1">
                    <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl sm:h-contenedor1 lg:h-contenedor2 2xl:h-contenedor1 shadow-md">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-3/4">
                                <div class="flex items-center ">
                                    <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                                    <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Movimientos</h1>
                                </div>
                            </div>
                            <div class="flex" >
                                <div class="flex items-center">
                                    <button id="toggleSidebarMobileSearch" type="button" class="z-20 lg:hidden bg-NiziBlue  text-white hover:text-gray-900 hover:bg-NiziGreen p-2 rounded-lg shadow-lg">
                                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="h-contenedor5 2xl:h-contenedor6 overflow-y-auto">
                            <div class="flex flex-col items-center xl:w-2/3">
                               
                               
                               
                               
                                @if (isset($movimientos))
                                @foreach ($movimientos as $item)
                                
                                @if ($item['tipoMovimiento'] == true)
                                <div class="flex w-full px-3 sm:pr-8 bg-customGray3 items-center text-left rounded-xl h-20 sm:h-24 mb-3 shadow-md ">
                                    <div class="bg-white rounded-md mr-4 p-1 sm:p-2">
                                        <img src="{{ asset('img/Dinero.png') }}" alt="" class="h-8 w-8 sm:h-12 sm:w-12">
                                    </div>
                                    <div class="grid grid-cols-3 w-full">
                                        <h1 class="sm:mb-2 text-start text-base sm:text-xl col-span-2 font-dm-sans-medium">Recarga de Saldo</h1>
                                        <h1 class="text-end text-base sm:text-xl font-dm-sans-medium  text-green-500 ">+${{$item['monto']}}</h1>
                                        <h1 class="text-start text-sm sm:text-base col-span-2 text-gray-600">{{$item['fecha']}}</h1>
                                        <h1 class="text-end text-sm sm:text-base text-gray-600"> {{$item['hora']}} </h1>
                                    </div>
                                </div>
                                @else
                                <div class="flex w-full px-3 sm:pr-8 bg-customGray3 items-center text-left rounded-xl h-20 sm:h-24 mb-3 shadow-md ">
                                    <div class="bg-white rounded-md mr-4 p-1 sm:p-2">
                                        <img src="{{ asset('img/Compra.png') }}" alt="" class="h-8 w-8 sm:h-12 sm:w-12">
                                    </div>
                                    <div class="grid grid-cols-3 w-full">
                                        <h1 class="sm:mb-2 text-start text-base sm:text-xl col-span-2 font-dm-sans-medium">Cobro de pedido</h1>
                                        <h1 class="text-end text-base sm:text-xl font-dm-sans-medium   text-red-700 ">-${{$item['monto']}}</h1>
                                        <h1 class="text-start text-sm sm:text-base col-span-2 text-gray-600">{{$item['fecha']}}</h1>
                                        <h1 class="text-end text-sm sm:text-base text-gray-600">{{$item['hora']}}</h1>
                                    </div>
                                </div>
                                @endif
                                
                                @endforeach
                                    @else

                                    <h1>Parece que no has hecho ningun movimiento</h1>
                                @endif
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>   
</body>
</html>