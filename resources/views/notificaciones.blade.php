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
    @extends('layouts.siderbar')
    {{-- end siderbar --}}
    <div class=" ml-14 md:ml-64 mt-8">
        <!--Contenido--> 
        <div class="mx-4 sm:h-contenedor2 2xl:h-contenedor1">
            <div class="grid grid-cols-1">
                <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl h-contenedor1 lg:h-contenedor2 2xl:h-contenedor1 overflow-y-auto">
                    <div class="flex items-center mb-3">
                        <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                        <h1 class=" text-black text-2xl font-dm-sans-bold font-bold tracking-tight">Notificaciones</h1>
                    </div>
                    <div class="flex flex-col items-center xl:w-2/3">
                        <div class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                            <img src="{{ asset('img/Seguridad.png') }}" alt="" style="width: 25px; height: 25px;">
                            <div class=" sm:block ml-4 sm:ml-2">
                                <p class="text-black text-text13 font-dm-sans-bold font-semibold" >Revisión de seguridad</p>
                                <p class="text-black text-text10 font-dm-sans-regular">Te recomendamos revisar con frecuencia los datos de tu cuenta</p>
                                <p class="text-gray-400 text-text10 font-dm-sans-regular">Hace 5 minutos</p>
                            </div>
                        </div>
                        <div class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                            <img src="{{ asset('img/Seguridad.png') }}" alt="" style="width: 25px; height: 25px;">
                            <div class=" sm:block ml-4 sm:ml-2">
                                <p class="text-black text-text13 font-dm-sans-bold font-semibold" >Revisión de seguridad</p>
                                <p class="text-black text-text10 font-dm-sans-regular">Te recomendamos revisar con frecuencia los datos de tu cuenta</p>
                                <p class="text-gray-400 text-text10 font-dm-sans-regular">Hace 5 minutos</p>
                            </div>
                        </div>
                        <div class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                            <img src="{{ asset('img/Seguridad.png') }}" alt="" style="width: 25px; height: 25px;">
                            <div class=" sm:block ml-4 sm:ml-2">
                                <p class="text-black text-text13 font-dm-sans-bold font-semibold" >Revisión de seguridad</p>
                                <p class="text-black text-text10 font-dm-sans-regular">Te recomendamos revisar con frecuencia los datos de tu cuenta</p>
                                <p class="text-gray-400 text-text10 font-dm-sans-regular">Hace 5 minutos</p>
                            </div>
                        </div>
                        <div class="flex sm:w-full p-2 border-2 border-customGray2 items-center rounded-xl h-20 mb-2">
                            <img src="{{ asset('img/Seguridad.png') }}" alt="" style="width: 25px; height: 25px;">
                            <div class=" sm:block ml-4 sm:ml-2">
                                <p class="text-black text-text13 font-dm-sans-bold font-semibold" >Revisión de seguridad</p>
                                <p class="text-black text-text10 font-dm-sans-regular">Te recomendamos revisar con frecuencia los datos de tu cuenta</p>
                                <p class="text-gray-400 text-text10 font-dm-sans-regular">Hace 5 minutos</p>
                            </div>
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