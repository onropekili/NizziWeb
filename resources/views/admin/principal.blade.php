<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
    @vite ("resources/css/app.css")
</head>
<body>
   @extends('admin.layouts.sider')
   <div class="bg-white border-b border-gray-200 h-screen overflow-y-auto fixed z-30 w-full">
      @extends('admin.layouts.nav')
      <div class="flex overflow-hidden pt-16">
         <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
         <div id="main-content" class="h-full w-full bg-customGray1 relative overflow-y-auto lg:ml-64">
            <main>
               <div class="pt-6 px-4">
                  <div class="flex items-center ">
                     {{-- <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;"> --}}
                     <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Bienvenido Coffe Wind</h1>
                  </div>
                  <hr class="border-t-2 border-gray-500 opacity-10 my-4">
                  <div class="flex items-center ">
                     <h1 class="text-black text-lg font-dm-sans-medium tracking-tight">Actividad diaria</h1>
                  </div>
                  <div class="mt-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                     {{-- Ganacias del dia --}}
                     <div class="shadow-md rounded-lg border-2  border-NiziViolet bg-NiziViolet">
                        <div class="flex items-center justify-evenly mr-4">
                           <div class="flex-shrink-0 m-4 text-center">
                              <img src="{{ asset('img/ganancias_icon.png') }}" alt="logo" class="h-20 w-20 ml-4 ">
                           </div>
                           <div class="m-2 w-0 flex items-center justify-end flex-1 text-base font-bold">
                              <div class="flex flex-col text-end">
                                 <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">${{$totalIngresosHoy}}</span>
                                 <h3 class="text-base font-dm-sans-regular text-white">Ingresos del día</h3>
                              </div>
                           </div>
                        </div>
                        <a href="{{route('gananciasAdmin')}}" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziViolet rounded-b-lg bg-NiziGray1 py-2 px-4">
                           <span class="text-base leading-none font-dm-sans-bold text-NiziViolet">Ver más</span>
                           <img src="{{ asset('img/flecha-correcta (2).png') }}" alt="logo" class="h-6 w-6 ">
                        </a>
                     </div>
                     {{-- ---------Fin-------- --}}

                 {{--<div class="shadow-md rounded-lg border-2  border-NiziGreen bg-white">
                        <div class="flex items-center justify-evenly mr-4">
                           <div class="flex-shrink-0 m-4 text-center">
                              <img src="{{ asset('img/ganancias_icon.png') }}" alt="logo" class="h-20 w-20 ml-4 ">
                           </div>
                           <div class="m-2 w-0 flex items-center justify-end flex-1 text-base font-bold">
                              <div class="flex flex-col text-end">
                                  <span class="text-3xl leading-none font-dm-sans-bold text-NiziGreen mb-1">$2000</span>
                                  <h3 class="text-base font-dm-sans-regular text-NiziGray">Ingresos del día</h3>
                               </div>
                           </div>
                        </div>
                        <a href="/ganancias" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziGreen rounded-b-md bg-NiziGreen py-2 px-4">
                          <span class="text-base leading-none font-dm-sans-medium text-white">Ver más</span>
                          <img src="{{ asset('img/flecha-correcta (5).png') }}" alt="logo" class="h-6 w-6 ">
                        </a>
                     </div> --}}

                     {{-- Solicitudes --}}
                     <div class="shadow-md rounded-lg border-2  border-NiziBlue bg-NiziBlue">
                        <div class="flex items-center justify-evenly mr-4">
                           <div class="flex-shrink-0 m-4 text-center">
                              <img src="{{ asset('img/email_icon.png') }}" alt="logo" class="h-20 w-20 ml-4 ">
                           </div>
                           <div class="m-2 w-0 flex items-center justify-end flex-1 text-base font-bold">
                              <div class="flex flex-col text-end">
                                 <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">{{$totalSolisHoy}}</span>
                                 <h3 class="text-base font-dm-sans-regular text-white">Todas las solicitudes</h3>
                              </div>
                           </div>
                        </div>
                        <a href="{{route('SolicitudAdmin')}}" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziBlue rounded-b-lg bg-NiziGray1 py-2 px-4">
                           <span class="text-base leading-none font-dm-sans-bold text-NiziBlue">Ver más</span>
                           <img src="{{ asset('img/flecha-correcta (4).png') }}" alt="logo" class="h-6 w-6 ">
                        </a>
                     </div>
                     {{-- ---------Fin-------- --}}

                     {{-- Pedidos --}}
                     <div class="shadow-md rounded-lg border-2  border-NiziGreen2 bg-NiziGreen2">
                        <div class="flex items-center justify-evenly mr-4">
                           <div class="flex-shrink-0 m-4 text-center">
                              <img src="{{ asset('img/pedidos_icon.png') }}" alt="logo" class="h-20 w-20 ml-4 ">
                           </div>
                           <div class="m-2 w-0 flex items-center justify-end flex-1 text-base font-bold">
                              <div class="flex flex-col text-end">
                                 <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">{{$totalPedidosHoy}}</span>
                                 <h3 class="text-base font-dm-sans-regular text-white">Pedidos del día</h3>
                              </div>
                           </div>
                        </div>
                        <a href="{{route('pedidosAdmin')}}" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziGreen2 rounded-b-lg bg-NiziGray1 py-2 px-4">
                           <span class="text-base leading-none font-dm-sans-bold text-NiziGreen2">Ver más</span>
                           <img src="{{ asset('img/flecha-correcta (6).png') }}" alt="logo" class="h-6 w-6 ">
                        </a>
                     </div>
                     {{-- ---------Fin-------- --}}
                  </div>

                  {{-- Contenedor de grafica semanal --}}
                  <div class="grid grid-cols-1 xl:gap-4 my-4 ">
                     <div class="w-full grid grid-cols-1 xl:grid-cols-3 2xl:grid-cols-3 gap-4">
                        <div class="bg-white shadow-md rounded-lg lg:col-span-2 border border-customGray2">
                           <div class="flex items-center justify-between rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                              <div class="flex-shrink-0">
                                 <span class="text-base sm:text-lg font-dm-sans-medium leading-none text-black">Ganancias en la última semana</span>
                              </div>
                              <div class="flex items-center justify-end flex-1 ">
                                 <a href="/ganancias" class="flex flex-row items-center">
                                    <span class="text-sm sm:text-base leading-none font-dm-sans-medium text-black mr-2">Ver más</span>
                                    <img src="{{ asset('img/flecha-correcta (7).png') }}" alt="logo" class="h-6 w-6 ">
                                 </a>
                              </div>
                           </div>
                           <canvas class="m-4" id="myChart"></canvas> {{--Grafica de canva--}}
                        </div>
                        {{-- Contenedor Pedidos --}}
                        <div class="bg-white shadow-md rounded-lg col-span-1 border border-customGray2 ">
                           <div class="flex items-center justify-between rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                              <div class="flex-shrink-0">
                                 <span class="text-base sm:text-lg font-dm-sans-medium leading-none text-gray-900">Pedidos</span>
                              </div>
                              <div class="flex items-center justify-end flex-1 ">
                                 <a href="/ganancias" class="flex flex-row items-center">
                                    <span class="text-sm sm:text-base leading-none font-dm-sans-medium text-black mr-2">Ver más</span>
                                    <img src="{{ asset('img/flecha-correcta (7).png') }}" alt="logo" class="h-6 w-6 ">
                                 </a>
                              </div>
                           </div>
                           <div class="flex flex-col m-2 h-96 lg:h-96 overflow-y-auto">
                              <div class="overflow-x-auto rounded-lg">
                                 <div class="align-middle inline-block min-w-full">
                                    {{-- Contenedor Pedido Entregado --}}
                                    @foreach ($pedidos as $pedido)
                                       @if ($pedido->estado == 'En espera')
                                       <div class="shadow-md overflow-hidden rounded-lg bg-customGray3 py-3 px-5 mb-2">
                                          <div class="grid grid-cols-2 grid-rows-2 gap-2 items-center">
                                             <div class="flex flex-col mb-1">
                                                <span class="mb-1 text-base leading-none font-dm-sans-medium text-black">#{{$pedido->numeroPedido}}</span>
                                                <span class="text-sm leading-none font-dm-sans-regular text-NiziGray">{{$pedido->fechaFormateada}}</span>
                                             </div>
                                             <div class="flex flex-col text-end">
                                                <span class="mb-1 text-base leading-none font-dm-sans-medium text-orange-600">{{$pedido->estado}}</span>
                                                <span class="text-sm leading-none font-dm-sans-regular text-NiziGray">{{$pedido->horaFormateada}}</span>
                                             </div>
                                             <div class="flex flex-col">
                                                <span class="mb-1 text-base leading-none font-dm-sans-medium text-black">Cliente</span>
                                                <span class="text-sm leading-none font-dm-sans-regular text-NiziGray">{{$pedido->nombre}} {{$pedido->apellidoPaterno}}</span>
                                             </div>
                                             <a href="#" class="text-end">
                                                <span class="text-base leading-none font-dm-sans-bold text-black">Ver más</span>
                                             </a>
                                          </div>
                                       </div>
                                       @else
                                       <div class="shadow-md overflow-hidden rounded-lg bg-customGray3 py-3 px-5 mb-2">
                                          <div class="grid grid-cols-2 grid-rows-2 gap-2 items-center">
                                             <div class="flex flex-col mb-1">
                                                <span class="mb-1 text-base leading-none font-dm-sans-medium text-black">#{{$pedido->numeroPedido}}</span>
                                                <span class="text-sm leading-none font-dm-sans-regular text-NiziGray">{{$pedido->fechaFormateada}}</span>
                                             </div>
                                             <div class="flex flex-col text-end">
                                                <span class="mb-1 text-base leading-none font-dm-sans-medium text-NiziGreen">{{$pedido->estado}}</span>
                                                <span class="text-sm leading-none font-dm-sans-regular text-NiziGray">{{$pedido->horaFormateada}}</span>
                                             </div>
                                             <div class="flex flex-col">
                                                <span class="mb-1 text-base leading-none font-dm-sans-medium text-black">Cliente</span>
                                                <span class="text-sm leading-none font-dm-sans-regular text-NiziGray">{{$pedido->nombre}} {{$pedido->apellidoPaterno}}</span>
                                             </div>
                                             <a href="#" class="text-end">
                                                <span class="text-base leading-none font-dm-sans-bold text-black">Ver más</span>
                                             </a>
                                          </div>
                                       </div>
                                       @endif
                                    
                                    @endforeach

                                    {{-- ---------Fin-------- --}}
                                 </div>
                              </div>
                           </div>
                        </div>
                        {{-- ---------Fin-------- --}}
                     </div>
                  </div>
               </div>
            </main>
         </div>
      </div>
   </div>
   
   @php
       echo '  <script>
      const primerDia ='. $unoDiasGanancias .
      ';const SegundoDia =' . $dosDiasGanancias . 
       ';const tercerDia = '. $tresDiasGanancias . 
       ';const cuartoDia =' . $cuatroDiasGanancias . 
       ';const cincoDia = ' . $cincoDiasGanancias . 
       ';const seisDia = ' . $seisDiasGanancias .
       ';const sieteDia = ' . $sieteDiasGanancias . ';'.
   '</script>'
   @endphp
 
   <script>
      console.log(primerDia);
   const datosGanancias = {
      'Septimo día': sieteDia,
      'Sexto día': seisDia,
      'Quinto día': cincoDia,
      'Cuarto día': cuartoDia,
      'Antier': tercerDia,
      'Ayer': SegundoDia,
      'Hoy': primerDia,
   };
   
   const canvas = document.getElementById('myChart');
   
   const grafico = new Chart(canvas, {
      type: 'line',
      data: {
         labels: Object.keys(datosGanancias),
         datasets: [{
            label: 'Ganancias',
            data: Object.values(datosGanancias),
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.3
         }]
      },
      options: {
         responsive: true,
         plugins: {
            legend: {
               position: 'top',
            },
         }
      }
   });
   </script>
</body>
</html>