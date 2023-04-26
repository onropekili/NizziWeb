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
                    <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl lg:h-contenedor2 2xl:h-contenedor1 overflow-y-auto shadow-md">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-3/4">
                                <div class="flex items-center ">
                                    <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                                    <h1 class=" text-black text-2xl font-dm-sans-bold tracking-tight">Mi tarjeta</h1>
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



                        @if ($data->tarjeta[0]['estadoTarjeta'] == 'Activada')
                            <div class="flex flex-col lg:flex-row items-center sm:mb-10">
                            <div class="w-full p-6 my-4 sm:mr-2 sm:w-tarjeta sm:h-tarjeta rounded-2xl bg-gradient-to-r from-NiziViolet via-NiziBlue to-customGreen1 shadow-md ">
                                <div class="flex items-center justify-between">
                                    <h1 class="text-2xl text-white font-dm-sans-bold tracking-wider ">Nizi Card</h1>
                                    <img src="{{ asset('img/contactless.png') }}" alt="" style="width: 25px; height: 25px;">
                                </div>
                                <div class="flex items-center justify-between mt-20 sm:mt-36">
                                    <h1 class="text-2xl text-white font-dm-sans-bold tracking-wider ">**** **** **** **{{$tarjeta}}</h1>
                                </div>
                            </div>
                            <div class="w-full px-2 mb-2  sm:p-0 sm:h-tarjeta sm:w-tarjeta rounded-2xl lg:pl-10">
                                <h1 class="text-left text-xl tracking-normal font-dm-sans-medium text-black">Nombre del propietario</h1>
                                <h1 class="text-left text-lg tracking-normal text-gray-500 font-dm-sans-regular mb-2 sm:mb-4 ">{{$data->nombre}} {{$data->apellido_paterno}}</h1>
                                <h1 class="text-left text-xl tracking-normal font-dm-sans-medium text-black">Número de tarjeta</h1>
                                <h1 class="text-left text-lg tracking-normal text-gray-500 font-dm-sans-regular mb-2 sm:mb-4 ">{{$numeroTarjeta}}</h1>
                                <h1 class="text-left text-xl tracking-normal font-dm-sans-medium text-black">Fecha de vencimiento</h1>
                                <h1 class="text-left text-lg tracking-normal text-gray-500 font-dm-sans-regular mb-2 sm:mb-4 ">18/04/2029</h1>
                                <h1 class="text-left text-xl tracking-normal font-dm-sans-medium text-black">CVV</h1>
                                <h1 class="text-left text-lg tracking-normal text-gray-500 font-dm-sans-regular mb-2 sm:mb-4 ">{{$data->tarjeta[0]['cvv']}}</h1>
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row items-center">
                            <div class="w-full sm:w-tarjeta sm:mr-2 bg-gradient-to-r rounded-2xl">
                                <div class="flex items-center justify-evenly">
                                    <form action="DesactivarTarjeta" method="post" class="w-full sm:w-1/4 px-6 py-4 mb-2 mr-2 sm:mb-0 xl:mx-5 bg-customGray rounded-2xl shadow-md">
                                    <button type="submit" id="desactivar" >
                                        <div class="flex items-center justify-start sm:block sm:text-center">
                                            <img src="{{ asset('img/Desactivar_tarjeta.png') }}" alt="" class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                            <h1 class="text-sm sm:text-base text-black font-dm-sans-medium tracking-tight mt-2">Desactivar tarjeta</h1>
                                        </div>
                                    </button>
                                </form>
                                    <button type="button" id="desactivar" class="w-full sm:w-1/4 px-6 py-4 mb-2 mr-2 sm:mb-0 xl:mx-5 bg-customGray rounded-2xl shadow-md">
                                        <div class="flex items-center justify-start sm:block sm:text-center">
                                            <img src="{{ asset('img/Eliminar _tarjeta.png') }}" alt="" class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                            <h1 class="text-sm sm:text-base text-black font-dm-sans-medium tracking-tight mt-2">Cancelar tarjeta</h1>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @elseif($data->tarjeta[0]['estadoTarjeta'] == 'Desactivada')
                        <div class="w-full p-6 my-4 sm:mr-2 sm:w-tarjeta sm:h-tarjeta rounded-2xl bg-gray-300 shadow-md ">
                            <div class="flex items-center justify-between">
                                <h1 class="text-2xl text-white font-dm-sans-bold tracking-wider ">Nizi Card</h1>
                                <img src="{{ asset('img/contactless.png') }}" alt="" style="width: 25px; height: 25px;">
                            </div>
                        </div>
                        <div class="flex flex-col lg:flex-row items-center">
                            <div class="w-full sm:w-tarjeta sm:mr-2 bg-gradient-to-r rounded-2xl">
                                <div class="flex items-center justify-evenly">
                                    <form action="ActivarTarjeta" method="post" class="w-full sm:w-1/4 px-6 py-4 mb-2 mr-2 sm:mb-0 xl:mx-5 bg-customGray rounded-2xl shadow-md">
                                    <button type="button" id="desactivar" >
                                        <div class="flex items-center justify-start sm:block sm:text-center">
                                            <img src="{{ asset('img/Desactivar_tarjeta.png') }}" alt="" class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                            <h1 class="text-sm sm:text-base text-black font-dm-sans-medium tracking-tight mt-2">Activar tarjeta</h1>
                                        </div>
                                    </button>
                                </form>
                                    <button type="button" id="desactivar" class="w-full sm:w-1/4 px-6 py-4 mb-2 mr-2 sm:mb-0 xl:mx-5 bg-customGray rounded-2xl shadow-md">
                                        <div class="flex items-center justify-start sm:block sm:text-center">
                                            <img src="{{ asset('img/Eliminar _tarjeta.png') }}" alt="" class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                            <h1 class="text-sm sm:text-base text-black font-dm-sans-medium tracking-tight mt-2">Cancelar tarjeta</h1>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endif
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>     
</body>
</html>