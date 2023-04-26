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
                <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl h-contenedor2 2xl:h-contenedor1 overflow-y-auto">
                    <div class="flex items-center mb-3">
                        <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                        <h1 class=" text-black text-2xl font-dm-sans-bold font-bold tracking-tight">Mi tarjeta</h1>
                    </div>
                    <div class="flex flex-col lg:flex-row">
                        <div class="flex flex-col items-center lg:w-1/2 sm:p-4 sm:pl-0">
                            <div class="flex w-full  px-3 bg-customGray3 items-center text-left rounded-xl h-16 sm:h-24 mb-2">
                                <img src="{{ asset('img/Rectangle 30.png') }}" alt="" >
                                <div class=" sm:block ml-4 sm:ml-2">
                                    <p class="text-black text-text13 font-dm-sans-bold font-semibold" >Coffee Wind</p>
                                    <p class="text-black text-text10 font-dm-sans-regular">Carretera Santa Cruz-San Isidro 880 A Santa Cruz de las Flores, 45640 Tlajomulco de Zúñiga, Jal.</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col lg:w-1/2 sm:p-4 sm:pl-0 bg-orange-300">
                            <div id="map-container" class="h-tarjeta" style="width: 550px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: 37.7749, lng: -122.4194},
            zoom: 8
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBb_akgZ3ttwYU5MdYDWdbY1h-5OObrBTE&callback=initMap" async defer></script>  
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>     
</body>
</html>