<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <title>Principal</title>
    @vite ("resources/css/app.css")
</head>
{{-- <body >
  <style>
    .swal2-actions {
    display: none !important;
}
  </style> --}}
    <aside id="sidebar" class="fixed hidden z-50 h-full top-0 left-0 sm:pt-5 pb-5 lg:flex flex-shrink-0 flex-col w-72 sm:w-64 transition-width duration-75 overflow-y-auto sm:overflow-hidden" aria-label="Sidebar">
        <div class="relative flex-1 flex flex-col min-h-0 my-3 ml-2 ">
            <div class="flex-1 px-4 bg-white rounded-2xl shadow-lg ">
                <ul class="flex flex-col py-4 space-y-1">
                    <li class="hidden md:block mb-4">
                      <div class="flex flex-row items-center h-8">
                        <img src="{{ asset('img/logoEdit.png') }}" alt="" class="h-8 w-8 mr-2 ">
                        <div class="text-2xl tracking-wide text-black font-dm-sans-bold">Nizi</div>
                      </div>
                    </li>
                    <li>
                        <div class="bg-NiziGray1  h-14 mx-auto mb-4 p-2 flex items-center rounded-xl">
                            <img src="{{ asset('img/D&D.jpg') }}" alt="" class="h-6 w-6 rounded-full  sm:h-10 sm:w-10" >
                            <div class=" sm:block ml-4 sm:ml-2" style="overflow: hidden">
                                @yield('name')
                            </div>
                        </div>
                    </li>
                    <li>
                      <form action="Inicio" method="post">
                        {{ csrf_field() }}
                      <button  class="relative flex flex-row items-center h-10 border-r-NiziBlue3  border-r-4 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent " style="width: 100%">
                        <span class="inline-flex justify-start items-center">
                            <img src="{{ asset('img/Inicio.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                          </span>
                        <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Inicio</span>
                      </button>
                      </form>
                    </li>




                    <li>




                      <form action="recargar" method="get">
                        {{ csrf_field() }}



                      @if (session()->get('tarjeta') !== null)




                      <Button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/Dinero.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                        </span>
                        <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate" >Recargar tarjeta</span>
                      </Button>

                      @else


                      <Button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent" disabled style="width: 100; opacity: 0.6">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/Dinero.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                        </span>
                        <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate" >Recargar tarjeta</span>
                      </Button>


                      @endif




                    </form>
                      
                    </li>


                    <li>
                      <form action="Movimiento" method="post">
                        {{ csrf_field() }}

                        @if (session()->get('tarjeta') !== null)
                        <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent" style="width: 100%">
                          <span class="inline-flex justify-center items-center">
                            <img src="{{ asset('img/Movimientos.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                          </span>
                          <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Movimientos</span>
                        </button>
                        @else
                        <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent" disabled style="width: 100%; opacity: 0.6;">
                          <span class="inline-flex justify-center items-center">
                            <img src="{{ asset('img/Movimientos.png') }}" alt="" class=" mr-2 " style="width: 25px; height: 25px;">
                          </span>
                          <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Movimientos</span>
                        </button>
                            
                        @endif

                      
                      </form>
                    </li>

                    
                    <li>
                      <form action="vistaTarjeta" method="post">
                        {{ csrf_field() }}

                        @if (session()->get('tarjeta') !== null)
                        <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray hover:text-white-800 border-l-4 border-transparent" style="width: 100%">
                          <span class="inline-flex justify-center items-center">
                            <img src="{{ asset('img/Tarjeta (1).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                          </span>
                          <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Mi tarjeta</span>
                        </button>
                        @else
                        <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray hover:text-white-800 border-l-4 border-transparent" disabled style="width: 100%; opacity: 0.6;">
                          <span class="inline-flex justify-center items-center">
                            <img src="{{ asset('img/Tarjeta (1).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                          </span>
                          <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Mi tarjeta</span>
                        </button>
                        @endif
                      
                      </form>
                    </li>
                    <li>

                      <form action="Menu" method="post">
                        {{ csrf_field() }}
                        @if (session()->get('tarjeta') !== null)
                        <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent " style="width: 100%">
                          <span class="inline-flex justify-center items-center">
                            <img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                          </span>
                          <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Menú digital</span>
                        </button>
                        @else
                        <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent " disabled style="width: 100%; opacity: 0.6;">
                          <span class="inline-flex justify-center items-center">
                            <img src="{{ asset('img/Menú.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                          </span>
                          <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Menú digital</span>
                        </button>
                        @endif
                      
                      </form>
                    </li>
                    <li>
                      <form action="Notificaciones" method="POST">
                        {{ csrf_field() }}
                      <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent " style="width: 100%">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/Notificaciones (2).png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                        </span>
                        <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Notificaciones</span>
                      </button>
                      </form>
                    </li>
                    <li>
                      <form action="comercios" method="get">
                        {{ csrf_field() }}
                      <button  class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent" style="width: 100%">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/Comercios.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                        </span>
                        <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Comercios</span>
                      </button>
                      </form>
                    </li>
                    <li>  
                      <form action="Perfil" method="post">
                        {{ csrf_field() }}
                      <button class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray text-white-600 hover:text-white-800 border-l-4 border-transparent" style="width: 100%">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/Perfil.png') }}" alt="" class="mr-2 " style="width: 25px; height: 25px;">
                        </span>
                        <span class="ml-2  text-black text-lg font-dm-sans-medium tracking-wide truncate">Perfil</span>
                      </button>
                      </form>
                    </li>
                    <li>
                      <a href="#" onclick="mostrarAlerta()" class="mt-28 md:mt-14 2xl:mt-52 relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray border-l-4 border-transparent">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/support_icon.png')}}" alt="" class="mr-2 " style="width: 35px; height: 30px;">
                        </span>
                        <span class="ml-2 text-black text-lg font-dm-sans-medium tracking-wide truncate">Atención clientes</span>
                      </a>
                    </li>
                    <li>
                      <a href="/login" class="relative flex flex-row items-center h-10 focus:outline-none hover:bg-customGray  border-l-4 border-transparent">
                        <span class="inline-flex justify-center items-center">
                          <img src="{{ asset('img/Door.png')}}" alt="" class=" mr-2 " style="width: 35px; height: 30px;">
                        </span>
                        <span class="ml-2 text-red-600 text-lg  font-dm-sans-medium tracking-wide truncate">Cerrar sesión</span>
                      </a>
                    </li>
                  </ul>
              </div>
        </div>
     </aside>
     <script async defer src="https://buttons.github.io/buttons.js"></script>
     <script src="https://demo.themesberg.com/windster/app.bundle.js"></script>    
     <script>
      function mostrarAlerta() {
        swal.fire({
          title: '<h1 class="text-justify justify-start text-black text-2xl font-dm-sans-bold tracking-tight">Atención al Cliente</h1>',
          html:
            "<p class='text-black text-base font-dm-sans-regular text-justify justify-start tracking-tight mb-4'>Si tienes alguna duda o consulta, puedes contactarnos a través de nuestra línea telefónica. Disponible las 24 horas del día, nuestro correo electrónico, nuestra página web o nuestras redes sociales. Estamos comprometidos a brindarte la mejor atención y resolver cualquier inquietud que tenga de manera rápida y efectiva.</p>"+
            "<p class='text-black text-base font-dm-sans-regular mb-3 text-justify justify-start'>Redes Sociales</p>"+
            "<div class='flex flex-col items-center mb-4'>"+
              "<a href='#' class='flex justify-between w-full py-2 px-4 bg-white border border-NiziGray items-center rounded-xl h-14 mb-4 shadow-md'>"+
                "<img src='{{ asset('img/facebook_logo.png') }}' alt='' class='h-8 w-8'>"+
                "<p class='text-black text-base font-dm-sans-medium text-start mr-20 lg:mr-52'>Nizi Official</p>"+
                "<img src='{{ asset('img/next_simple.png')}}' alt='' class='h-8 w-8  text-end'>"+
              "</a>"+
              "<a href='#'class='flex justify-between w-full py-2 px-4 bg-white border border-NiziGray items-center rounded-xl h-14 mb-4 shadow-md'>"+
                "<img src='{{ asset('img/instagram_logo.png') }}' alt='' class='h-8 w-8'>"+
                "<p class='text-black text-base font-dm-sans-medium text-start mr-20 lg:mr-52'>@Nizi_Official</p>"+
                "<img src='{{ asset('img/next_simple.png')}}' alt='' class='h-8 w-8  text-end'>"+
              "</a>"+
              "<a href='#' class='flex justify-between w-full py-2 px-4 bg-white border border-NiziGray items-center rounded-xl h-14 mb-4 shadow-md'>"+
                "<img src='{{ asset('img/twitter_logo.png') }}' alt='' class='h-8 w-8'>"+
                "<p class='text-black text-base font-dm-sans-medium text-start mr-20 lg:mr-52'>@Nizi_Official</p>"+
                "<img src='{{ asset('img/next_simple.png')}}' alt='' class='h-8 w-8  text-end'>"+
              "</a>"+
            "</div>"+
            "<p class='text-black text-base font-dm-sans-regular mb-3 text-justify justify-start'>Canales de comunicación</p>"+
            "<div class='flex flex-col items-center'>" +
              "<a href='#' class='flex justify-between w-full py-2 px-4 bg-white border border-NiziGray items-center rounded-xl h-14 mb-4 shadow-md'>"+
                "<img src='{{ asset('img/logoEdit.png') }}' alt='' class='h-8 w-8'>"+
                "<p class='text-black text-base font-dm-sans-medium text-start mr-20 lg:mr-52'>Nizi WebSite</p>"+
                "<img src='{{ asset('img/next_simple.png')}}' alt='' class='h-8 w-8  text-end'>"+
              "</a>"+
              "<a href='#' class='flex justify-between w-full py-2 px-4 bg-white border border-NiziGray items-center rounded-xl h-14 mb-4 shadow-md'>"+
                "<img src='{{ asset('img/email_icon.png') }}' alt='' class='h-8 w-8'>"+
                "<p class='text-black text-base font-dm-sans-medium text-start mr-18 lg:mr-40'>Contacto@nizi.com</p>"+
                "<img src='{{ asset('img/next_simple.png')}}' alt='' class='h-8 w-8  text-end'>"+
              "</a>"+
              "<a href='#'class='flex justify-between w-full py-2 px-4 bg-white border border-NiziGray items-center rounded-xl h-14 mb-4 shadow-md'>"+
                "<img src='{{ asset('img/telephone_icon.png') }}' alt='' class='h-8 w-8'>"+
                "<p class='text-black text-base font-dm-sans-medium text-start mr-20 lg:mr-52'>3334559076</p>"+
                "<img src='{{ asset('img/next_simple.png')}}' alt='' class='h-8 w-8  text-end'>"+
              "</a>"+
            "</div>",
          showCloseButton: true,
          customClass: {
            popup: "p-4 bg-white rounded-md shadow-lg text-center",
          },
        });
      }
      </script>
</body>
</html>