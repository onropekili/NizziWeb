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
                        <h1 class=" text-black text-2xl font-dm-sans-bold font-bold tracking-tight">Movimientos</h1>
                    </div>
                    <div class="flex flex-col items-center xl:w-2/3">
                        <div class="flex w-full  px-3 bg-customGray3 items-center text-left rounded-xl h-16 sm:h-24 mb-2 overflow-y-auto">
                            <div class="bg-white rounded-md mr-3 p-1 sm:p-2">
                                <img src="{{ asset('img/Dinero.png') }}" alt="" class="h-8 w-8">
                            </div>
                            <div class="grid grid-cols-3 w-full">
                                <h1 class="sm:mb-2 text-start text-base col-span-2 font-dm-sans-medium">Recarga de Saldo</h1>
                                <h1 class="text-end text-base font-dm-sans-medium  text-green-500 ">+ $500.50</h1>
                                <h1 class="text-start text-sm col-span-2 text-gray-600">24 Enero, 2023</h1>
                                <h1 class="text-end text-sm text-gray-600">08:31 A.M</h1>
                            </div>
                        </div>
                        <div class="flex w-full  px-3 bg-customGray3 items-center text-left rounded-xl h-16 sm:h-24 mb-2 overflow-y-auto">
                            <div class="bg-white rounded-md mr-3 p-1 sm:p-2">
                                <img src="{{ asset('img/Dinero.png') }}" alt="" class="h-8 w-8">
                            </div>
                            <div class="grid grid-cols-3 w-full">
                                <h1 class="sm:mb-2 text-start text-base col-span-2 font-dm-sans-medium">Recarga de Saldo</h1>
                                <h1 class="text-end text-base font-dm-sans-medium  text-green-500 ">+ $500.50</h1>
                                <h1 class="text-start text-sm col-span-2 text-gray-600">24 Enero, 2023</h1>
                                <h1 class="text-end text-sm text-gray-600">08:31 A.M</h1>
                            </div>
                        </div>
                        <div class="flex w-full  px-3 bg-customGray3 items-center text-left rounded-xl h-16 sm:h-24 mb-2 overflow-y-auto">
                            <div class="bg-white rounded-md mr-3 p-1 sm:p-2">
                                <img src="{{ asset('img/Dinero.png') }}" alt="" class="h-8 w-8">
                            </div>
                            <div class="grid grid-cols-3 w-full">
                                <h1 class="sm:mb-2 text-start text-base col-span-2 font-dm-sans-medium">Recarga de Saldo</h1>
                                <h1 class="text-end text-base font-dm-sans-medium  text-green-500 ">+ $500.50</h1>
                                <h1 class="text-start text-sm col-span-2 text-gray-600">24 Enero, 2023</h1>
                                <h1 class="text-end text-sm text-gray-600">08:31 A.M</h1>
                            </div>
                        </div>
                        <div class="flex w-full  px-3 bg-customGray3 items-center text-left rounded-xl h-16 sm:h-24 mb-2 overflow-y-auto">
                            <div class="bg-white rounded-md mr-3 p-1 sm:p-2">
                                <img src="{{ asset('img/Dinero.png') }}" alt="" class="h-8 w-8">
                            </div>
                            <div class="grid grid-cols-3 w-full">
                                <h1 class="sm:mb-2 text-start text-base col-span-2 font-dm-sans-medium">Recarga de Saldo</h1>
                                <h1 class="text-end text-base font-dm-sans-medium  text-green-500 ">+ $500.50</h1>
                                <h1 class="text-start text-sm col-span-2 text-gray-600">24 Enero, 2023</h1>
                                <h1 class="text-end text-sm text-gray-600">08:31 A.M</h1>
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