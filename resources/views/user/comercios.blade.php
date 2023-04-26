@php



@endphp
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comercios</title>
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
                    <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl h-contenedor2 2xl:h-contenedor1 overflow-y-auto shadow-md">
                        <div class="flex items-center justify-between mb-5">
                            <div class="w-3/4">
                                <div class="flex items-center ">
                                    <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                                    <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Notificaciones</h1>
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
                        <div class="flex flex-col lg:flex-row">
                            <div class="flex flex-col items-center lg:w-1/2 sm:pr-4 sm:pl-0">
                                <div class="flex w-full px-3 bg-customGray3 items-center text-left rounded-xl h-24 mb-2 sm:mb-4 shadow-md">
                                    <img src="{{ asset('img/coffee_win.jpg') }}" alt="" class="h-12 w-12 sm:h-16 sm:w-16 sm:mr-2 rounded-full">
                                    <div class=" sm:block ml-2 ">
                                        <p class="text-black text-base sm:text-lg font-dm-sans-bold " >Coffee Wind</p>
                                        <p class="text-black text-xs sm:text-base font-dm-sans-regular">Carretera Santa Cruz-San Isidro 880 A Santa Cruz de las Flores, 45640 Tlajomulco de Zúñiga, Jal.</p>
                                    </div>
                                </div>
                                <div class=" hidden flex w-full px-3 bg-customGray3 items-center text-left rounded-xl h-24 mb-2 sm:mb-4 shadow-md">
                                    <img src="{{ asset('img/mariscos.jpg') }}" alt="" class="h-12 w-12 sm:h-16 sm:w-16 mr-2 rounded-full">
                                    <div class=" sm:block ml-2 ">
                                        <p class="text-black text-base sm:text-lg font-dm-sans-bold " >Mariscos La Herradura</p>
                                        <p class="text-black text-xs sm:text-base font-dm-sans-regular">C. Constitución 84, Centro, 45640 San Sebastián el Grande, Jal.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-col lg:w-1/2  sm:pl-0 overflow-auto mt-2 sm:mt-0">
                                <div id="map-container" class="h-contenedormapa sm:h-contenedormapa1 2xl:h-contenedormapa2 rounded-2xl shadow-md"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        //Script del mapa
        function initMap() {
        var map = new google.maps.Map(document.getElementById('map-container'), {
            center: {lat: 20.483327747857178, lng: -103.53324627611653},
            zoom: 8
        });

        // Crea un marcador en San Francisco con información adicional
        var marker1 = new google.maps.Marker({
            position: {lat: 20.485470638243815, lng: -103.54274364057123},
            map: map,
            title: 'Coffee Wind'
        });
        var contentString1 = '<div><h3>Coffee Wind</h3><p>Carretera Santa Cruz-San Isidro 880 A Santa Cruz de las Flores, 45640 Tlajomulco de Zúñiga, Jal.</p></div>';
        var infoWindow1 = new google.maps.InfoWindow({
            content: contentString1
        });
        marker1.addListener('click', function() {
            infoWindow1.open(map, marker1);
        });

        // Crea otro marcador en Marisocos La Herradura con información adicional
        var marker2 = new google.maps.Marker({
            position: {lat: 20.53118258088735, lng: -103.42430780310295},
            map: map,
            title: 'Marisocos La Herradura'
        });
        var contentString2 = '<div><h3>Marisocos La Herradura</h3><p>C. Constitución 84, Centro, 45640 San Sebastián el Grande, Jal.</p></div>';
        var infoWindow2 = new google.maps.InfoWindow({
            content: contentString2
        });
        marker2.addListener('click', function() {
            infoWindow2.open(map, marker2);
        });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBpZSQbuiGIIi52ByuGuaunuoKo3buXMQ&callback=initMap" async defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>     
</body>
</html>