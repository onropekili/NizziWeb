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
          <div class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl sm:h-contenedor1 lg:h-contenedor2 2xl:h-contenedor1 shadow-md">
            <div class="flex items-center justify-between mb-5">
              <div class="w-3/4">
                <div class="flex items-center ">
                  <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                  <h1 class=" text-black text-2xl font-dm-sans-bold tracking-tight">Recargar tarjeta</h1>
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
            <div class="h-contenedor5 2xl:h-contenedor6 overflow-y-auto">
              <p class=" text-base sm:text-lg font-dm-sans-regular mb-10 text-justify">¿No cuentas con saldo suficiente? No te preocupes, Nizi cuenta con puntos de recarga en establecimientos participantes al igual tambien puede hacer recargas utilizando PayPal.</p>
              <div class="flex flex-col items-center ">
                <a href="/comercios" class="flex sm:w-full p-2 bg-customGray3 items-center rounded-xl h-20 sm:h-32 mb-4 shadow-md">
                  <img src="{{ asset('img/Dinero.png') }}" alt="" class="h-10 w-10 sm:h-20 sm:w-20 md:m-4">
                  <div class=" sm:block ml-2">
                    <p class="text-black text-sm sm:text-lg md:text-2xl lg:text-3xl font-dm-sans-medium">Recargar en establecimientos participantes (Efectivo)</p>
                  </div>
                </a>
                <a href="" id="mostrar-elemento" class="flex sm:w-full p-2 bg-customGray3 items-center rounded-xl h-20 sm:h-32 mb-4 shadow-md">
                  <img src="{{ asset('img/Paypal.png') }}" alt="" class="h-10 w-10 sm:h-20 sm:w-20 md:m-4">
                  <div class=" sm:block ml-2">
                    <p class="text-black text-sm sm:text-lg md:text-2xl lg:text-3xl font-dm-sans-medium">Recargar utilizando PayPal (Tarjeta débito / crédito y/o PayPal)</p>
                  </div>
                </a>
                <div id="elemento-oculto" class="hidden w-full text-center">
                  <div id="paypal-button-container"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
  <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
  <script>
    //Script para mostrar el boton de paypal
  document.getElementById("mostrar-elemento").addEventListener("click", function(event) {
    event.preventDefault();
    document.getElementById("elemento-oculto").classList.remove("hidden");
  })
  </script> 
  <script>
    //Scrip PayPal
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        size: 'responsive',
        shape: 'rect',
        color: 'silver',
        layout: 'vertical',
        label: 'paypal',
      },
      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{"amount":{"currency_code":"USD","value":1}}]
        });
      },
      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {
          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<h3>Thank you for your payment!</h3>';
          // Or go to another URL:  actions.redirect('thank_you.html');
          });
        },
        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
    </script>
</body>
</html>