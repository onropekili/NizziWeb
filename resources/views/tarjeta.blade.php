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
                <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl lg:h-contenedor2 2xl:h-contenedor1 overflow-y-auto">
                    <div class="flex items-center mb-3">
                        <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                        <h1 class=" text-black text-2xl font-dm-sans-bold font-bold tracking-tight">Mi tarjeta</h1>
                    </div>
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="w-full p-6 my-4 sm:mr-2 sm:w-tarjeta sm:h-tarjeta rounded-2xl bg-gradient-to-r from-customViolet1 via-customBlue to-customGreen1 ">
                            <div class="flex items-center justify-between">
                                <h1 class="text-xl text-white font-dm-sans-bold tracking-wider font-bold">Nizi Card</h1>
                                <img src="{{ asset('img/contactless.png') }}" alt="" style="width: 25px; height: 25px;">
                            </div>
                            <div class="flex items-center justify-between mt-20 sm:mt-36">
                                <h1 class="text-xl text-white font-dm-sans-bold tracking-wider font-bold">**** **** **** **89</h1>
                            </div>
                        </div>
                        <div class="w-full px-2 mb-2  sm:p-0 sm:h-tarjeta sm:w-tarjeta rounded-2xl lg:pl-10">
                            <h1 class="text-left text-xl tracking-normal font-dm-sans-medium font-medium  text-black">Nombre del propietario</h1>
                            <h1 class="text-left text-base tracking-normal text-gray-500 font-dm-sans-medium mb-2 sm:mb-4 ">Anthony Martinez Arellano</h1>
                            <h1 class="text-left text-xl tracking-normal font-dm-sans-medium font-medium text-black">Número de tarjeta</h1>
                            <h1 class="text-left text-base tracking-normal text-gray-500 font-dm-sans-medium mb-2 sm:mb-4 ">9980 7765 1125 7089</h1>
                            <h1 class="text-left text-xl tracking-normal font-dm-sans-medium font-medium text-black">Fecha de vencimiento</h1>
                            <h1 class="text-left text-base tracking-normal text-gray-500 font-dm-sans-medium mb-2 sm:mb-4 ">28/10/2029</h1>
                            <h1 class="text-left text-xl tracking-normal font-dm-sans-medium font-medium text-black">CVV</h1>
                            <h1 class="text-left text-base tracking-normal text-gray-500 font-dm-sans-medium mb-2 sm:mb-4 ">862</h1>
                        </div>
                    </div>
                    <div class="flex flex-col lg:flex-row items-center">
                        <div class="w-full sm:w-tarjeta sm:mr-2 bg-gradient-to-r rounded-2xl">
                            <div class="flex items-center justify-evenly">
                                <button type="button" id="desactivar" class="w-full sm:w-1/4 px-6 py-4 mb-2 mr-2 sm:mb-0 xl:mx-5 bg-customGray rounded-2xl">
                                    <div class="flex items-center justify-start sm:block sm:text-center">
                                        <img src="{{ asset('img/Desactivar_tarjeta.png') }}" alt="" class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2" style="font-size: 14px">Desactivar tarjeta</h1>
                                    </div>
                                </button>
                                <button type="button" id="desactivar" class="w-full sm:w-1/4 px-6 py-4 mb-2 mr-2 sm:mb-0 xl:mx-5 bg-customGray rounded-2xl">
                                    <div class="flex items-center justify-start sm:block sm:text-center">
                                        <img src="{{ asset('img/Eliminar _tarjeta.png') }}" alt="" class="mr-2 sm:mx-auto" style="width: 38px; height: 38px;">
                                        <h1 class=" text-black font-dm-sans-medium tracking-tight mt-2" style="font-size: 14px">Cancelar tarjeta</h1>
                                    </div>
                                </button>
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