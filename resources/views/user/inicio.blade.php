<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Document</title>
    @vite ("resources/css/app.css")
</head>

<body class="lg:overflow-hidden">
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-customWhite overflow-y-auto">
        {{-- Sidebar --}}
        @extends('user.layouts.siderbar')
        @section('name')
            <p class="text-black text-sm font-dm-sans-medium">{{ session()->get('nombre') }}</p>
            <p class="text-gray-400 text-text10 font-dm-sans-regular">{{ session()->get('correo') }}</p>
        @endsection
        {{-- end siderbar --}}
        <div class=" lg:ml-64 mt-8">
            <!--Contenido-->
            <div class=" mx-2 sm:h-contenedor2 2xl:h-contenedor1">
                <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-4 ">
                    <div
                        class="p-6 mb-2 bg-customGray1 rounded-2xl col-span-3 lg:h-contenedor2 2xl:h-contenedor1 overflow-y-auto shadow-md">
                        <div class="flex items-center justify-between">
                            <div class="w-1/2">
                                <h1 class=" text-black text-2xl font-dm-sans-medium tracking-tight">Hola
                                    {{ session()->get('nombre') }}</h1>
                            </div>
                            <div class="flex">
                                <div class="flex items-center">
                                    <button id="toggleSidebarMobileSearch" type="button"
                                        class="z-20 lg:hidden bg-NiziBlue  text-white hover:text-gray-900 hover:bg-NiziGreen p-2 rounded-lg shadow-lg">
                                        <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <p class=" text-base text-customGray2 sm:text-xl font-dm-sans-medium mt-1 mb-2">Buenos días</p>
                        <div class="flex flex-col sm:flex-row mb-1 items-center">

                                   
                            @if (isset($tarjeta))
                                <div
                                    class="w-full h-48 sm:h-52 sm:w-1/2 sm:mr-2 bg-gradient-to-r from-NiziViolet via-NiziBlue2 to-NiziGreen rounded-2xl p-5 my-4 shadow-md ">
                                    <div class="flex items-center justify-between sm:overflow-y-auto">
                                        <h1 class=" text-white text-text22 font-dm-sans-bold tracking-tight mb-5 ">Nizi
                                            Card</h1>
                                        <img src="{{ asset('img/contactless.png') }}" alt="" class="mr-2 mb-5 "
                                            style="width: 24px; height: 25px;">
                                    </div>
                                    <div class="flex items-center justify-between mt-20 sm:mt-24">
                                        <h1 class=" text-white text-text22 font-dm-sans-bold tracking-tight">**** ****
                                            **** **{{ $tarjeta }}</h1>
                                    </div>
                                </div>
                            @elseif($solicitud == true)
                                <div
                                    class="w-full h-40 sm:h-40 sm:w-1/2 sm:mr-2 bg-orange-600 bg-opacity-10 rounded-2xl p-5 my-4 shadow-sm ">
                                    <div class="flex items-center justify-between">
                                        <div class="flex flex-col">
                                            <h1 class=" text-black text-lg font-dm-sans-bold tracking-tight">Solicitud
                                            </h1>
                                            <h1 class=" text-NiziGray text-base font-dm-sans-medium tracking-tight">{{$solicitudExists->fechaFormateada}}</h1>
                                        </div>
                                        <div class="flex flex-col">
                                            <h1 class=" text-orange-500 text-lg font-dm-sans-bold tracking-tight">{{$solicitudExists->estado}}</h1>
                                            <h1 class=" text-NiziGray text-base font-dm-sans-medium tracking-tight">{{$solicitudExists->horaFormateada}}</h1>
                                        </div>
                                    </div>
                                    <div class="flex items-center mt-4 sm:mt-4 justify-start">
                                        <div>
                                            <h1 class=" text-black text-lg font-dm-sans-bold tracking-tight text-start">
                                                Solicitante</h1>
                                            <h1 class=" text-NiziGray text-base font-dm-sans-medium tracking-tight">
                                                {{$data->nombre}} {{$data->apellido_paterno}} {{$data->apellido_materno}} </h1>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <a href="#" id="myButtonN"
                                    class="w-full h-32 sm:h-52 sm:w-1/2 sm:ml-5 border-dotted border-customBlue2 border-4 rounded-2xl p-5 my-4 hover:bg-NiziGray1 hover:border-NiziGray shadow-md">
                                    <h1 class="text-center text-lg font-dm-sans-bold items-center mt-8 sm:mt-16">
                                        Solicitar tarjeta</h1>
                                </a>
                            @endif





                        </div>
                        <h1 class=" text-black text-xl font-dm-sans-medium tracking-tight mb-2 ">Servicios</h1>
                        <div class="flex flex-col sm:flex-row overflow-x-auto ">
                            <a href="/recargar"
                                class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl  xl:mx-5 mr-2 mb-4 sm:mb-0 hover:shadow-md">
                                <div class="flex items-center justify-start sm:block sm:text-center">
                                    <img src="{{ asset('img/Dinero.png') }}" alt="" class="mr-2 sm:mx-auto"
                                        style="width: 38px; height: 38px;">
                                    <h1 class="text-sm text-black font-dm-sans-medium tracking-tight mt-2">Recargar
                                        tarjeta</h1>
                                </div>
                            </a>
                            <a href="/movimientos"
                                class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0 hover:shadow-md">
                                <div class="flex items-center justify-start  sm:block sm:text-center">
                                    <img src="{{ asset('img/Movimientos.png') }}" alt="" class="mr-2 sm:mx-auto"
                                        style="width: 38px; height: 38px;">
                                    <h1 class="text-sm text-black font-dm-sans-medium tracking-tight mt-2">Movimientos
                                    </h1>
                                </div>
                            </a>
                            <a href="/tarjeta"
                                class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0 hover:shadow-md">
                                <div class="flex items-center justify-start  sm:block sm:text-center">
                                    <img src="{{ asset('img/Tarjeta (1).png') }}" alt="" class="mr-2 sm:mx-auto"
                                        style="width: 40px; height: 40px;">
                                    <h1 class="text-sm text-black font-dm-sans-medium tracking-tight mt-2">Mi tarjeta
                                    </h1>
                                </div>
                            </a>
                            <a href="/menu"
                                class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0 hover:shadow-md">
                                <div class="flex items-center justify-start  sm:block sm:text-center">
                                    <img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 sm:mx-auto"
                                        style="width: 38px; height: 38px;">
                                    <h1 class="text-sm text-black font-dm-sans-medium tracking-tight mt-2">Menú digital
                                    </h1>
                                </div>
                            </a>
                            <a href="/comercios"
                                class="w-full sm:w-1/5 bg-customGray p-4 rounded-2xl xl:mx-5 mr-2 mb-5 sm:mb-0 hover:shadow-md">
                                <div class="flex items-center justify-start  sm:block sm:text-center">
                                    <img src="{{ asset('img/Comercios.png') }}" alt=""
                                        class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                    <h1 class="text-sm text-black font-dm-sans-medium tracking-tight mt-2">Comercios
                                    </h1>
                                </div>
                            </a>
                        </div><br>
                        <h1 class=" text-black text-xl font-dm-sans-medium tracking-tight mb-4 ">Anuncios</h1>
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
                            class="px-5 py-4 bg-customGray1 rounded-lg mt-2 sm:mt-0 mb-2 sm:ml-2 h-contenedor3 2xl:h-contenedor4 shadow-md">
                            <div class="flex items-center justify-between">
                                <h1 class=" text-black text-xl font-dm-sans-medium tracking-tight mb-5 ">Notificaciones
                                </h1>
                                <a href="/notificaciones">
                                    <h1
                                        class=" text-NiziBlue3 hover:text-NiziViolet font-dm-sans-medium text-sm tracking-tight mb-5">
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
                                                    <p class="text-black text-sm font-dm-sans-medium ">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-NiziGray text-text10 font-dm-sans-medium">
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
                                                    <p class="text-black text-sm font-dm-sans-medium ">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-NiziGray text-text10 font-dm-sans-medium">
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
                                                    <p class="text-black text-sm font-dm-sans-medium ">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-NiziGray text-text10 font-dm-sans-medium">
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
                                                    <p class="text-black text-sm font-dm-sans-medium ">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-NiziGray text-text10 font-dm-sans-medium">
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
                                                <div class=" sm:block ml- sm:ml-2">
                                                    <p class="text-black text-sm font-dm-sans-medium ">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-NiziGray text-text10 font-dm-sans-medium">
                                                        {{ $item->contenido }} </p>
                                                    <p class="text-gray-400 text-text10 font-dm-sans-regular">
                                                        {{ $item->mensaje }}</p>
                                                </div>
                                            </div>
                                        @else
                                            <div
                                                class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-25 mb-2">
                                                <img src="{{ asset('img/White_t_logo (1).png') }}" alt=""
                                                    style="width: 25px; height: 25px;">
                                                <div class=" sm:block ml-4 sm:ml-2">
                                                    <p class="text-black text-sm font-dm-sans-medium ">
                                                        {{ $item->titulo }} </p>
                                                    <p class="text-NiziGray text-text10 font-dm-sans-medium">
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
                            class="px-5 py-4 bg-customGray1 rounded-lg mt-2 sm:mt-0 mb-40 sm:mb-0 sm:ml-2 h-contenedor3 2xl:h-contenedor4 shadow-md ">
                            <div class="flex items-center justify-between">
                                <h1 class=" text-black text-xl font-dm-sans-medium tracking-tight mb-5">Movimientos
                                </h1>
                                <a href="">
                                    <h1
                                        class=" text-NiziBlue3 hover:text-NiziViolet font-dm-sans-medium text-sm tracking-tight mb-5">
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
                                                        <h1
                                                            class="text-start text-text13 col-span-2 font-dm-sans-medium">
                                                            Recarga de Saldo</h1>
                                                        <h1
                                                            class="text-end text-text13 font-dm-sans-medium  text-green-500 ">
                                                            + ${{ $item['monto'] }} </h1>
                                                    @else
                                                        <h1
                                                            class="text-start text-text10 col-span-2 font-dm-sans-medium">
                                                            Compra</h1>
                                                        <h1
                                                            class="text-end text-text10 font-dm-sans-medium  text-red-700 ">
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>

    <script>
        document.getElementById("myButtonN").addEventListener("click", function() {
            var data = {};
            swal.fire({
                title: '<h1 class=" text-black text-3xl font-dm-sans-bold tracking-tight">Solicitud de tarjeta</h1>',
                html: '<h1 class="mb-2 text-black text-start text-lg font-dm-sans-medium tracking-tight">Datos personales</h1>' +
                    '<p class="mb-2 text-black text-start text-base font-dm-sans-regular tracking-tight">Verifica y completa la información solicitada.</p>' +
                    '<div class="items-center justify-start mb-4">' +
                    '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Nombre completo</label>' +
                    '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" required id="nombre" type="text" placeholder="Nombre(s)" value="{{ $data->nombre }}"/> ' +
                    '</div>' +
                    '<div class="items-center justify-start mb-4">' +
                    '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Apellido paterno</label>' +
                    '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" required id="app" type="text" placeholder="Apellido paterno" value="{{ $data->apellido_paterno }}"/> ' +
                    '</div>' +
                    '<div class="items-center justify-start mb-4">' +
                    '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Apellido materno</label>' +
                    '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" required id="apm" type="text" placeholder="Apellido materno" value="{{ $data->apellido_materno }}"/> ' +
                    '</div>' +
                    '<div class="items-center justify-start mb-4">' +
                    '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Correo electrónico</label>' +
                    '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" required id="email" type="email" placeholder="tucorreo@tucorreo.com" value="{{ $data->email }}"/>' +
                    '</div>' +
                    '<div class="items-center justify-start mb-4">' +
                    '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Número Telefónico</label>' +
                    '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" required id="telefono" type="tel" placeholder="Ingresa tu número de teléfono" value="{{ $data->telefono }}"/>' +
                    '</div>',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Siguiente",
            }).then((result) => {
                if (result.isConfirmed) {
                    var nombre = document.getElementById('nombre').value;
                    var app = document.getElementById('app').value;
                    var apm = document.getElementById('apm').value;
                    var email = document.getElementById('email').value;
                    var telefono = document.getElementById('telefono').value;

                    data.nombre = nombre;
                    data.apellido_paterno = app;
                    data.apellido_materno = apm;
                    data.email = email;
                    data.telefono = telefono;


                    console.log(data);

                    swal.fire({
                        title: '<h1 class=" text-black text-3xl font-dm-sans-bold tracking-tight">Solicitud de tarjeta</h1>',
                        html: '<h1 class="mb-2 text-black text-start text-lg font-dm-sans-medium tracking-tight">Domicilio</h1>' +
                            '<p class="mb-2 text-black text-start text-base font-dm-sans-regular tracking-tight">Ingresa los datos de tu domicilio. Es ahí donde enviaremos tu tarjeta.</p>' +
                            '<div class="items-center justify-start ">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Calle</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="calle" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" value="{{ $data->direccion[0]['calle'] }}"/>' +
                            '</div>' +
                            '<div class="flex">' +
                            '<div class="items-center justify-start mr-5  w-1/2">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Número Exterior</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="ne" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" value="{{ $data->direccion[0]['numeroExterior'] }}"/>' +
                            '</div>' +
                            '<div class="items-center justify-start  w-1/2">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Número Interior (opcional)</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="ni" type="email" placeholder="" value="{{ $data->direccion[0]['numeroInterior'] }}"/>' +
                            '</div>' +
                            '</div>' +
                            '<div class="items-center justify-start ">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Colonia o Fraccionamiento</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="colonia" type="tel" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" value="{{ $data->direccion[0]['colonia'] }}"/>' +
                            '</div>' +
                            '<div class="items-center justify-start ">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Ciudad o Municipio</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="municipio" type="tel" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" value="{{ $data->direccion[0]['municipio'] }}"/>' +
                            '</div>' +
                            '<div class="items-center justify-start ">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Estado</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="estado" type="tel" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" value="{{ $data->direccion[0]['estado'] }}"/>' +
                            '</div>' +
                            '<div class="flex">' +
                            '<div class="items-center justify-start mr-5 w-1/2">' +
                            '<label class="w-full py-2 block text-base font-dm-sans-medium text-black text-start " for="email">Código Postal</label>' +
                            '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="cp" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" value="{{ $data->direccion[0]['codigoPostal'] }}"/>' +
                            '<input type="hidden" id="csrf-token" value="' + window.csrfToken +
                            '">' +
                            '</div>' +
                            '</div>',
                        showCancelButton: true,
                        confirmButtonText: "Siguiente",
                        cancelButtonText: "Cancelar",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            var calle = document.getElementById('calle').value;
                            var numeroExterior = document.getElementById('ne').value;
                            var numeroInterior = document.getElementById('ni').value;
                            var colonia = document.getElementById('colonia').value;
                            var municipio = document.getElementById('municipio').value;
                            var codigoPostal = document.getElementById('cp').value;
                            var estado = document.getElementById('estado').value;

                            data.calle = calle;
                            data.numeroExterior = numeroExterior;
                            data.numeroInterior = numeroInterior;
                            data.codigoPostal = codigoPostal;
                            data.colonia = colonia;
                            data.municipio = municipio;
                            data.estado = estado


                            Swal.fire({
                                title: '<h1 class=" text-black text-3xl font-dm-sans-regular tracking-tight">Términos y Condiciones</h1>',
                                html: '<p class="text-base font-dm-sans-medium mb-4">Desliza hacia abajo para visualizar todo el contenido.</p>\n\n ' +
                                    '<div style="height: 300px; overflow-y: auto; white-space: pre-wrap; text-align: justify;" class="mb-6">' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3"> 1. Tarjeta de Pago</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">La tarjeta de pago es una forma de pago que te permite realizar compras en establecimientos de comida y otros comercios participantes que acepten pagos a través de nuestra aplicación. La tarjeta es emitida por nuestro proveedor de servicios de pago y está sujeta a los términos y condiciones del proveedor.</p>\n' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">2. Registro</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Para solicitar y utilizar una tarjeta de pago, debes registrarte en nuestra aplicación y proporcionar la información requerida, incluyendo tus datos personales y financieros. La información que proporcionas debe ser precisa y completa. Al registrarte, aceptas recibir comunicaciones de nuestra parte, incluyendo correos electrónicos y notificaciones push</p>.\n' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">3. Uso de la Tarjeta</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Al utilizar la tarjeta de pago, aceptas pagar el monto total de la transacción a través de nuestra aplicación. Debes asegurarte de tener suficientes fondos en tu cuenta de la aplicación para cubrir el monto de la transacción. La tarjeta no se puede utilizar para fines ilegales o fraudulentos.</p>\n' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">4. Responsabilidad</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Eres responsable de cualquier uso no autorizado de tu tarjeta de pago. Debes notificarnos inmediatamente si sospechas que alguien ha utilizado tu tarjeta de forma fraudulenta o sin autorización. No seremos responsables por ningún daño que surja como resultado del uso no autorizado de tu tarjeta.</p>\n' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">5. Cancelación</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Podemos cancelar tu tarjeta de pago en cualquier momento y por cualquier motivo, incluyendo si sospechamos que la tarjeta se ha utilizado de forma fraudulenta o para fines ilegales. También puedes solicitar la cancelación de tu tarjeta en cualquier momento.</p>\n' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">6. Modificaciones</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Podemos modificar estos términos y condiciones en cualquier momento y sin previo aviso. Cualquier modificación será efectiva inmediatamente después de su publicación en nuestra aplicación. Si continúas utilizando la tarjeta de pago después de la modificación de los términos y condiciones, se considerará que aceptas los términos modificados.</p>\n' +
                                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">7. Ley Aplicable</h3>' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Estos términos y condiciones se regirán e interpretarán de acuerdo con las leyes del lugar en el que se emitió tu tarjeta de pago.\n' +
                                    '<p class="text-base font-dm-sans-regular mb-4">Al solicitar y utilizar una tarjeta de pago en nuestra aplicación, aceptas estos términos y condiciones en su totalidad. En caso de que alguno de nuestros términos y condiciones no sean de tu agrado, te sugerimos no utilizar nuestra aplicación y evitar solicitar una tarjeta de pago. Queremos que tu experiencia con nosotros sea satisfactoria, por lo que te recomendamos revisar nuestros términos y condiciones con detenimiento antes de decidir utilizar nuestros servicios.' +
                                    '</div>' +
                                    '<div class="flex items-center justify-start">' +
                                    '<input id="remember" type="checkbox" value="" class="w-5 h-5 mr-2 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-customBlue dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required>' +
                                    '<label for="remember" class="text-base font-dm-sans-medium text-black ">He leído y acepto los Términos y Condiciones.</label>' +
                                    '</div>',
                                footer: '<p class="text-left text-xs  font-dm-sans-regular text-black ">{{ now()->year }}   Nizi   Todos los derechos reservados</p>',
                                showCancelButton: true,
                                confirmButtonText: "Enviar",
                                cancelButtonText: "Cancelar",
                            }).then((result) => {
                                if (result.isConfirmed) {

                                    var laravelToken = document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content');


                                    axios.post("/Solicitud", data)
                                        .then((response) => {
                                            console.log(response);
                                            Swal.fire(
                                                'Solicitud enviada',
                                                '',
                                                'success'
                                            ).then((result) => {
                                                if (result) {



                                                    const inputNombre = document
                                                        .createElement('input');
                                                    inputNombre.type = 'hidden';
                                                    inputNombre.name = 'nombre';
                                                    inputNombre.value =
                                                        'loquesea';

                                                    const tokenInput = document
                                                        .createElement('input');
                                                    tokenInput.type = 'hidden';
                                                    tokenInput.name = '_token';
                                                    tokenInput.value = document
                                                        .querySelector(
                                                            'meta[name="csrf-token"]'
                                                            ).getAttribute(
                                                            'content');



                                                    const form = document
                                                        .createElement('form');
                                                    form.method = 'POST';
                                                    form.action =
                                                        'Notificaciones';


                                                    form.appendChild(
                                                        inputNombre);
                                                    form.appendChild(
                                                        tokenInput
                                                    );


                                                    document.body.appendChild(
                                                        form);


                                                    form.submit();

                                                }
                                            })
                                        })
                                        .catch((error) => {
                                            console.log(error)
                                        });
                                }
                            });
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>
