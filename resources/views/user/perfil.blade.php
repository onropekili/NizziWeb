<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
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
        <div class="lg:ml-64 mt-8">
            <!--Contenido-->
            <div class="mx-4 sm:h-contenedor2 2xl:h-contenedor1">
                <div class="grid grid-cols-1">
                    <div
                        class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl sm:h-contenedor1 lg:h-contenedor2 2xl:h-contenedor1 shadow-md">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-3/4">
                                <div class="flex items-center ">
                                    <img src="{{ asset('img/back.png') }}" alt="" class="mr-2"
                                        style="width: 35px; height: 25px;">
                                    <h1 class=" text-black text-2xl font-dm-sans-bold tracking-tight">Recargar tarjeta
                                    </h1>
                                </div>
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
                        <div class="h-contenedor5 2xl:h-contenedor6 overflow-y-auto">
                            <div class="flex flex-col items-center">
                                <div class="flex w-full sm:pr-8 items-center text-left rounded-xl h-28 lg:h-36">
                                    <div class="sm:p-2">
                                        <img src="{{ asset('img/D&D.jpg') }}" alt=""
                                            class="w-28 lg:w-32 rounded-full">
                                    </div>
                                    <div class="grid grid-cols-2 w-full ml-6">
                                        <h1
                                            class="sm:mb-2 text-start text-base sm:text-2xl col-span-2 font-dm-sans-bold">
                                            {{$data->nombre}} {{$data->apellido_paterno}} {{$data->apellido_materno}}</h1>
                                        <h1 class="text-start text-sm sm:text-lg col-span-2 text-gray-600">Miembro desde
                                            22/01/2023</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="tabset flex flex-col sm:block">
                                <!-- Tab 1 -->
                                <input type="radio" name="tabset" id="tab1" aria-controls="marzen"
                                    class="hidden" checked>
                                <label for="tab1"
                                    class="text-base font-dm-sans-medium rounded-t-lg mb-2 sm:mb-0 flex justify-center">
                                    <span class="inline-flex items-center flex-row">
                                        <img src="{{ asset('img/Editar.png') }}" alt="" class="mr-2 h-6 w-6">
                                        <span class="mr-2">Información personal</span>
                                    </span>
                                </label>
                                <!-- Tab 2 -->
                                <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier"
                                    class="hidden">
                                <label for="tab2"
                                    class="text-base font-dm-sans-medium rounded-t-lg mb-2 sm:mb-0 flex justify-center">
                                    <span class="inline-flex items-center flex-row">
                                        <img src="{{ asset('img/Inicio.png') }}" alt="" class="mr-2 h-6 w-6">
                                        <span class="mr-2">Domicilio</span>
                                    </span>
                                </label>
                                <!-- Tab 3 -->
                                <input type="radio" name="tabset" id="tab3" aria-controls="dunkles"
                                    class="hidden">
                                <label for="tab3"
                                    class="text-base font-dm-sans-medium rounded-t-lg mb-2 sm:mb-0 flex justify-center">
                                    <span class="inline-flex items-center flex-row">
                                        <img src="{{ asset('img/Key.png') }}" alt="" class="mr-2 h-6 w-6">
                                        <span class="mr-2">Contraseña</span>
                                    </span>
                                </label>

                                <div class="tab-panels ">
                                    <section id="marzen" class="tab-panel p-0 ">
                                        <div class="flex-col md:grid md:grid-cols-3">
                                            <div class=" col-span-2 lg:h-85 overflow-y-auto">
                                                <form action="ActualizarPerfil" method="post" class="py-4 rounded"
                                                    id="formDatos">
                                                    {{ csrf_field() }}
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Nombre (s)</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="nombre" name="nombre" type="text"
                                                            value="{{ $data->nombre }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2  block text-base font-dm-sans-medium text-black "
                                                            for="email">Apellido Paterno</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="app" name="app" type="text"
                                                            value="{{ $data->apellido_paterno }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Apellido Materno</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="apm" name="apm" type="text"
                                                            value="{{ $data->apellido_materno }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Número telefónico</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700  border-2 rounded-xl"
                                                            id="telefono" name="telefono" type="tel"
                                                            value="{{ $data->telefono }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Correo electrónico</label>
                                                        <input
                                                            class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="email" name="email" type="email"
                                                            value="{{ $data->email }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Nombre de usuario</label>
                                                        <input
                                                            class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="username" name="username" type="text"
                                                            value="{{ $data->username }}" disabled />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-span-1 mb-20 lg:px-12 py-4">
                                                <div class="mb-6 text-center">
                                                    <button id="mostrar" onclick="mostrar()"
                                                        class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziBlue text-white rounded-xl bg-NiziBlue hover:bg-white hover:text-NiziBlue"
                                                        type="button">
                                                        Editar
                                                    </button>
                                                </div>
                                                <div id="contenido" class="hidden">
                                                    <div class="mb-6 text-center">
                                                        <button id="GuardarDatos" onclick="guardarDatos()"
                                                            class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziBlue3 text-white rounded-xl bg-NiziBlue3 hover:bg-white hover:text-NiziBlue3"
                                                            type="submit">
                                                            Guardar
                                                        </button>
                                                    </div>

                                                    <div class="mb-6 text-center">
                                                        <button id="ocultar" onclick="ocultar()"
                                                            class="w-full px-4 py-2 font-base font-dm-sans-medium text-red-700 rounded-xl border-red-700 border-2 hover:bg-red-600 hover:text-white focus:outline-none focus:shadow-outline"
                                                            type="button">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <section id="rauchbier" class="tab-panel p-0">
                                        <div class="flex-col md:grid md:grid-cols-3">
                                            <div class=" col-span-2 lg:h-85 overflow-y-auto">
                                                <form id="formDireccion" action="ActualizarDireccion" method="post"
                                                    class="py-4 rounded">
                                                    {{ csrf_field() }}
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Calle</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="calle" name="calle" type="text"
                                                            value="{{ $data->direccion[0]['calle'] }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2  block text-base font-dm-sans-medium text-black "
                                                            for="email">Número Exterior</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="nExt" name="numeroExterior" type="email"
                                                            value="{{ $data->direccion[0]['numeroExterior'] }}"
                                                            disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Número Interior</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="nInt" name="numeroInterior" type="email"
                                                            value="{{ $data->direccion[0]['numeroInterior'] }}"
                                                            disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Colonia</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700  border-2 rounded-xl"
                                                            id="colonia" name="colonia" type="email"
                                                            value="{{ $data->direccion[0]['colonia'] }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Municipio</label>
                                                        <input
                                                            class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="municipio" name="municipio" type="email"
                                                            value="{{ $data->direccion[0]['municipio'] }}" disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Código Postal</label>
                                                        <input
                                                            class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="cp" name="codigoPostal" type="email"
                                                            value="{{ $data->direccion[0]['codigoPostal'] }}"
                                                            disabled />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Estado</label>
                                                        <input
                                                            class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="estado" name="estado" type="email"
                                                            value="{{ $data->direccion[0]['estado'] }}" disabled />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-span-1 mb-20 lg:px-12 py-4">
                                                <div class="mb-6 text-center">
                                                    <button id="mostrar1" onclick="mostrar1()"
                                                        class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziBlue text-white rounded-xl bg-NiziBlue hover:bg-white hover:text-NiziBlue"
                                                        type="button">
                                                        Editar
                                                    </button>
                                                </div>
                                                <div id="contenido1" class="hidden">
                                                    <div class="mb-6 text-center">
                                                        <button id="botonDireccion" onclick="ActualizarDireccion()"
                                                            class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziBlue3 text-white rounded-xl bg-NiziBlue3 hover:bg-white hover:text-NiziBlue3"
                                                            type="button">
                                                            Guardar
                                                        </button>
                                                    </div>
                                                    <div class="mb-6 text-center">
                                                        <button id="ocultar1" onclick="ocultar1()"
                                                            class="w-full px-4 py-2 font-base font-dm-sans-medium text-red-700 rounded-xl border-red-700 border-2 hover:bg-red-600 hover:text-white focus:outline-none focus:shadow-outline"
                                                            type="button">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <section id="dunkles" class="tab-panel p-0">
                                        <div class="flex-col md:grid md:grid-cols-3">
                                            <div class=" col-span-2 lg:h-85 overflow-y-auto">
                                                <form id="formPassword" action="ActualizarPassword" method="POST"
                                                    class="py-4 rounded">
                                                    {{ csrf_field() }}
                                                    <div class="mb-6 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Contraseña actual</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="oldPassword" name="oldPassword" type="password"
                                                            placeholder="Ingresa tu contraseña actual" disabled
                                                            minlength="8" />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2  block text-base font-dm-sans-medium text-black "
                                                            for="email">Nueva contraseña</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="newPassword" type="password" name="newPassword"
                                                            placeholder="Ingresa tu nueva contraseña" disabled
                                                            minlength="8" />
                                                    </div>
                                                    <div class="mb-4 md:flex items-center">
                                                        <label
                                                            class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black "
                                                            for="email">Confirmar nueva contraseña</label>
                                                        <input
                                                            class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl"
                                                            id="againNewPassword" name="againNewPassword"
                                                            type="password" placeholder="Repite tu nueva contraseña"
                                                            disabled />
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-span-1 mb-20 lg:px-12 py-4">
                                                <div class="mb-6 text-center">
                                                    <button id="mostrar2" onclick="mostrar2()"
                                                        class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziBlue text-white rounded-xl bg-NiziBlue hover:bg-white hover:text-NiziBlue"
                                                        type="button">
                                                        Editar
                                                    </button>
                                                </div>
                                                <div id="contenido2" class="hidden">
                                                    <div class="mb-6 text-center">
                                                        <button onclick="actualizarPassword()"
                                                            class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziBlue3 text-white rounded-xl bg-NiziBlue3 hover:bg-white hover:text-NiziBlue3"
                                                            type="button">
                                                            Guardar
                                                        </button>
                                                    </div>
                                                    <div class="mb-6 text-center">
                                                        <button id="ocultar2" onclick="ocultar2()"
                                                            class="w-full px-4 py-2 font-base font-dm-sans-medium text-red-700 rounded-xl border-red-700 border-2 hover:bg-red-600 hover:text-white focus:outline-none focus:shadow-outline"
                                                            type="button">
                                                            Cancelar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
    @if (isset($mensajeError))
        <script>
            Swal.fire(
                '{{$mensajeError}}',
                '',
                'error'
            );
        </script>
    @elseif(isset($mensaje1))
        <script>
            Swal.fire(
                '{{$mensaje1}}',
                '',
                'success'
            );
        </script>
    @endif



    <script>
        function ocultar() {
            document.getElementById("contenido").classList.add("hidden");
            var nombre = document.querySelector('input[name="nombre"]');
            var app = document.querySelector('input[name="app"]');
            var apm = document.querySelector('input[name="apm"]');
            var email = document.querySelector('input[name="email"]');
            var telefono = document.querySelector('input[name="telefono"]');
            var username = document.querySelector('input[name="username"]');
            nombre.setAttribute('disabled', 'disabled');
            app.setAttribute('disabled', 'disabled');
            apm.setAttribute('disabled', 'disabled');
            email.setAttribute('disabled', 'disabled');
            telefono.setAttribute('disabled', 'disabled');
            username.setAttribute('disabled', 'disabled');
        }

        function mostrar() {
            document.getElementById("contenido").classList.remove("hidden");
            var nombre = document.querySelector('input[name="nombre"]');
            var app = document.querySelector('input[name="app"]');
            var apm = document.querySelector('input[name="apm"]');
            var email = document.querySelector('input[name="email"]');
            var telefono = document.querySelector('input[name="telefono"]');
            var username = document.querySelector('input[name="username"]');
            nombre.removeAttribute('disabled');
            app.removeAttribute('disabled');
            apm.removeAttribute('disabled');
            email.removeAttribute('disabled');
            telefono.removeAttribute('disabled');
            username.removeAttribute('disabled');

        }

        function ocultar1() {
            document.getElementById("contenido1").classList.add("hidden");
            var calle = document.querySelector('input[name="calle"]');
            var numeroExterior = document.querySelector('input[name="numeroExterior"]');
            var numeroInterior = document.querySelector('input[name="numeroInterior"]');
            var municipio = document.querySelector('input[name="municipio"]');
            var codigoPostal = document.querySelector('input[name="codigoPostal"]');
            var colonia = document.querySelector('input[name="colonia"]');
            var estado = document.querySelector('input[name="estado"]');
            calle.setAttribute('disabled', 'disabled');
            numeroExterior.setAttribute('disabled', 'disabled');
            numeroInterior.setAttribute('disabled', 'disabled');
            municipio.setAttribute('disabled', 'disabled');
            codigoPostal.setAttribute('disabled', 'disabled');
            colonia.setAttribute('disabled', 'disabled');
            estado.setAttribute('disabled', 'disabled');
        }

        function mostrar1() {
            document.getElementById("contenido1").classList.remove("hidden");
            var calle = document.querySelector('input[name="calle"]');
            var numeroExterior = document.querySelector('input[name="numeroExterior"]');
            var numeroInterior = document.querySelector('input[name="numeroInterior"]');
            var municipio = document.querySelector('input[name="municipio"]');
            var codigoPostal = document.querySelector('input[name="codigoPostal"]');
            var colonia = document.querySelector('input[name="colonia"]');
            var estado = document.querySelector('input[name="estado"]');
            calle.removeAttribute('disabled');
            numeroExterior.removeAttribute('disabled');
            numeroInterior.removeAttribute('disabled');
            municipio.removeAttribute('disabled');
            codigoPostal.removeAttribute('disabled');
            estado.removeAttribute('disabled');
            colonia.removeAttribute('disabled');

        }

        function ocultar2() {
            document.getElementById("contenido2").classList.add("hidden");
            var newPassword = document.querySelector('input[name="newPassword"]');
            var againNewPassword = document.querySelector('input[name="againNewPassword"]');
            var oldPassword = document.querySelector('input[name="oldPassword"]');
            newPassword.setAttribute('disabled', 'disabled');
            againNewPassword.setAttribute('disabled', 'disabled');
            oldPassword.setAttribute('disabled', 'disabled');
        }

        function mostrar2() {
            document.getElementById("contenido2").classList.remove("hidden");
            var newPassword = document.querySelector('input[name="newPassword"]');
            var againNewPassword = document.querySelector('input[name="againNewPassword"]');
            var oldPassword = document.querySelector('input[name="oldPassword"]');
            newPassword.removeAttribute('disabled');
            againNewPassword.removeAttribute('disabled');
            oldPassword.removeAttribute('disabled');
        }

        function guardarDatos() {
            var form = document.getElementById('formDatos');
            form.submit();
        }

        function ActualizarDireccion() {
            var form = document.getElementById('formDireccion')
            form.submit();
        }

        function actualizarPassword() {
            var form = document.getElementById('formPassword');
            var newPassword = document.getElementById('newPassword').value;
            var againNewPassword = document.getElementById('againNewPassword').value;
            if ((newPassword === againNewPassword)) {
                form.submit();

            } else {
                Swal.fire(
                    'Contraseñas distintas',
                    'Las contraseñas no coinciden',
                    'error'
                );
            }
        }
    </script>

</body>

</html>
