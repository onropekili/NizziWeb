@php
    
@endphp
<!DOCTYPE html>
<html lang="en">

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
        @extends('layouts.siderbar')
        {{-- end siderbar --}}
        <div class=" ml-14 md:ml-64 mt-8">
            <!--Contenido-->
            <div class=" mx-4 sm:h-contenedor2 2xl:h-contenedor1">
                <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-4 ">
                    <div
                        class="p-6 mb-2 bg-customGray1 rounded-2xl col-span-3 lg:h-contenedor2 2xl:h-contenedor1 overflow-y-auto">
                        <h1 class=" text-black text-text24 font-dm-sans-medium tracking-tight">Hola {{session()->get('nombre')}}</h1>
                        <p class=" text-base text-customGray2 text-text20 font-dm-sans-medium mt-1 mb-2">Buenos días</p>
                        <div class="flex flex-col sm:flex-row mb-1 items-center">
                            @if (isset($tarjeta))
                                <div
                                    class="w-full h-48 sm:h-52 sm:w-1/2 sm:mr-2 bg-gradient-to-r from-customViolet1 via-customBlue to-customGreen1 rounded-2xl p-5 my-4 ">
                                    <div class="flex items-center justify-between sm:overflow-y-auto">
                                        <h1 class=" text-white font-dm-sans-medium tracking-tight mb-5 font-bold"
                                            style="font-size: 22px">Nizi Card</h1>
                                        <img src="{{ asset('img/contactless.png') }}" alt="" class="mr-2 mb-5 "
                                            style="width: 24px; height: 25px;">
                                    </div>
                                    <div class="flex items-center justify-between mt-20 sm:mt-24">
                                        <h1 class=" text-white font-dm-sans-medium tracking-tight font-bold"
                                            style="font-size: 22px">**** **** **** **{{ $tarjeta }} </h1>
                                    </div>
                                </div>
                            @else
                                <a href=""
                                    class="w-full h-32 sm:h-52 sm:w-1/2 sm:ml-5 border-dotted border-customBlue2 border-4 rounded-2xl p-5 my-4">
                                    <h1
                                        class="text-center text-lg font-dm-sans-bold font-semibold items-center mt-8 sm:mt-16">
                                        Solicitar tarjeta</h1>
                                </a>
                            @endif


                        </div>
                        <h1 class=" text-black text-text22 font-dm-sans-bold tracking-tight mb-2 ">Servicios</h1>
                        <div class="flex flex-col sm:flex-row overflow-x-auto ">

                            @if (session('tarjeta') !== null)
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl  xl:mx-5 mr-2 mb-4 sm:mb-0">
                                    <div class="flex items-center justify-start sm:block sm:text-center">
                                        <img src="{{ asset('img/Dinero.png') }}" alt="" class="mr-2 sm:mx-auto"
                                            style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px">Recargar tarjeta</h1>
                                    </div>
                                </div>
                            @else
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl  xl:mx-5 mr-2 mb-4 sm:mb-0">
                                    <div class="flex items-center justify-start sm:block sm:text-center">
                                        <img src="{{ asset('img/Dinero.png') }}" alt="" class="mr-2 sm:mx-auto"
                                            style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px;opacity: 0.6; ">Recargar tarjeta</h1>
                                    </div>
                                </div>
                            @endif

                            @if (session('tarjeta') !== null)
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Movimientos.png') }}" alt=""
                                            class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px">Movimientos</h1>
                                    </div>
                                </div>
                            @else
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Movimientos.png') }}" alt=""
                                            class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px;opacity: 0.6;">Movimientos</h1>
                                    </div>
                                </div>
                            @endif


                            @if (session('tarjeta') !== null)
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Tarjeta (1).png') }}" alt=""
                                            class="mr-2 sm:mx-auto" style="width: 40px; height: 40px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px">Mi tarjeta</h1>
                                    </div>
                                </div>
                            @else
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Tarjeta (1).png') }}" alt=""
                                            class="mr-2 sm:mx-auto" style="width: 40px; height: 40px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px; opacity: 0.6;">Mi tarjeta</h1>
                                    </div>
                                </div>
                            @endif

                            @if (session('tarjeta') !== null)
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 sm:mx-auto"
                                            style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px">Menú digital</h1>
                                    </div>
                                </div>
                            @else
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 sm:mx-auto"
                                            style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px; opacity: 0.6;">Menú digital</h1>
                                    </div>
                                </div>
                            @endif

                            @if (session('tarjeta') !== null)
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Comercios.png') }}" alt=""
                                            class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px">Comercios</h1>
                                    </div>
                                </div>
                            @else
                                <div class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0">
                                    <div class="flex items-center justify-start  sm:block sm:text-center">
                                        <img src="{{ asset('img/Comercios.png') }}" alt=""
                                            class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2"
                                            style="font-size: 14px; opacity: 0.6">Comercios</h1>
                                    </div>
                                </div>
                            @endif



                        </div><br>
                        <h1 class=" text-black text-text22 font-dm-sans-bold tracking-tight mb-4 ">Anuncios</h1>
                        <div class="flex flex-col sm:flex-row ">
                            <div class="w-full sm:w-1/2 ml-0 mx-5 flex rounded-2xl h-28 mb-4 sm:mb-0 ">
                                <img src="{{ asset('img/anuncio2.jpg') }}" alt=""
                                    class="w-full h-full object-cover rounded-2xl">
                            </div>
                            <div class="w-full sm:w-1/2 ml-0 mx-5 flex rounded-2xl h-28 ">
                                <img src="{{ asset('img/anuncio2.jpg') }}" alt=""
                                    class="w-full h-full object-cover rounded-2xl">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:col-span-1 sm:h-contenedor2 2xl:h-contenedor1 w-full">
                        <div
                            class="px-5 py-4 bg-customGray1 rounded-lg mt-2 sm:mt-0 mb-2 sm:ml-2 h-contenedor3 2xl:h-contenedor4 ">
                            <div class="flex items-center justify-between">
                                <h1 class=" text-black text-text22 font-dm-sans-medium tracking-tight mb-5 font-bold">
                                    Notificaciones</h1>
                                <a href="">
                                    <h1
                                        class=" text-blue-600 hover:text-customBlue font-dm-sans-medium text-sm tracking-tight mb-5">
                                        Ver más</h1>
                                </a>
                            </div>
                            <div class="overflow-y-auto w-full h-56">
                                @if ($notificaciones)

                                    @foreach ($notificaciones as $item)
                                        @if ($item->titulo == 'Teléfono verificado')
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                                                <img src="{{ asset('img/complete_icon.png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-black text-text10 font-dm-sans-regular">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @elseif($item->titulo == 'Correo verificado')
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                                                <img src="{{ asset('img/complete_icon.png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-black text-text10 font-dm-sans-regular">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @elseif($item->titulo == 'Solicita una tarjeta')
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                                                <img src="{{ asset('img/Tarjeta (1).png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-black text-text10 font-dm-sans-regular">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @elseif($item->titulo == 'Bienvenido a Nizi')
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                                                <img src="{{ asset('img/Sonrisa.png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-black text-text10 font-dm-sans-regular">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @elseif($item->titulo == 'Solicitud recibida')
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                                                <img src="{{ asset('img/White_t_logo (1).png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-black text-text10 font-dm-sans-regular">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                                                <img src="{{ asset('img/White_t_logo (1).png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-black text-text10 font-dm-sans-regular">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div
                            class="px-5 py-4 bg-customGray1 rounded-lg mt-2 sm:mt-0 mb-2 sm:ml-2 h-contenedor3 2xl:h-contenedor4 ">
                            <div class="flex items-center justify-between">
                                <h1 class=" text-black text-text22 font-dm-sans-medium tracking-tight mb-5 font-bold">
                                    Movimientos</h1>
                                <a href="">
                                    <h1
                                        class=" text-blue-600 hover:text-customBlue font-dm-sans-medium text-sm tracking-tight mb-5">
                                        Ver más</h1>
                                </a>
                            </div>
                            <div class="overflow-y-auto w-full h-56">
                                @if (isset($movimientos))

                                    @foreach ($movimientos as $item)
                                        @if (isset($item['fecha']) && isset($item['hora']))
                                            <h1> {{ $item['monto'] }} </h1>


                                            <div
                                                class="flex w-full px-3 bg-customGray3 items-center rounded-xl h-16 mb-2 overflow-y-auto">
                                                <div>
                                                    <img src="{{ asset('img/Seguridad.png') }}" alt=""
                                                        class="bg-white rounded-md mr-4"
                                                        style="width: 25px; height: 25px;">
                                                </div>
                                                <div class="grid grid-cols-3 w-full">
                                                    @if ($item['tipoMovimiento'] == true)
                                                        <h1 class="text-start text-sm col-span-2 font-dm-sans-medium">
                                                            Recarga de Saldo</h1>
                                                        <h1
                                                            class="text-end text-sm font-dm-sans-medium  text-green-500 ">
                                                            + ${{ $item['monto'] }} </h1>
                                                    @else
                                                        <h1 class="text-start text-sm col-span-2 font-dm-sans-medium">
                                                            Compra</h1>
                                                        <h1
                                                            class="text-end text-sm font-dm-sans-medium  text-red-700 ">
                                                            - ${{ $item['monto'] }}</h1>
                                                    @endif



                                                    <h1 class="text-start text-xs col-span-2 text-gray-600">
                                                        {{ $item['fecha'] }} </h1>
                                                    <h1 class="text-end text-xs text-gray-600"> {{ $item['hora'] }}
                                                    </h1>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
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
