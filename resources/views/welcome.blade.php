@php
    session()->flush();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('css/app.css') }}"></script>
        <title>Nizi</title>
         @vite ("resources/css/app.css")
    </head>
    <body class="bg-white" >
      <div class="h-full w-full absolute">
        <!-- Navigation starts -->
        <!-- Mobile -->
        <div id="mobile-nav" class="w-full xl:hidden h-full absolute z-40">
            <div class="bg-gray-800 opacity-50 inset-0 fixed w-full h-full" onclick="sidebarHandler(false)"></div>
            <div class="w-64 absolute left-0 z-40 top-0 bg-white shadow flex-col justify-between transition duration-150 ease-in-out h-full">
                <div class="flex flex-col justify-between h-full">
                    <div class="px-6 pt-4 overflow-y-auto">
                        <div class="flex items-center justify-between">
                            <div aria-label="Home" role="img" class="flex items-center">
                              <img src="{{ asset('img/White_t_logo (1).png') }}" alt="logo" class="h-10 max-h-10">
                              <p class="text-bold md:text2xl text-xl font-dm-sans-medium font-semibold pl-3 text-black">Nizi Card</p>
                            </div>
                            <button id="cross" class="hidden text-NiziViolet focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-NiziViolet rounded" onclick="sidebarHandler(false)">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_Grey_background-svg2.svg" alt="cross">
                            </button>
                        </div>
                        <ul class="f-m-m">
                            <li class="py-4">
                                <div class="flex items-center">
                                    <a href="#Inicio" class="text-black hover:text-NiziViolet ml-3 text-lg">Inicio</a>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center">
                                    <a href="#Nosotros" class="text-black hover:text-NiziViolet ml-3 text-lg">Nosotros</a>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center">
                                    <a href="#CuentaNizi" class="text-black hover:text-NiziViolet ml-3 text-lg">Cuenta Nizi</a>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center">
                                    <a href="#NiziCard" class="text-black hover:text-NiziViolet ml-3 text-lg">Nizi Card</a>
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="flex items-center">
                                    <a href="#Contacto" class="text-black hover:text-NiziViolet ml-3 text-lg">Contacto</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full">
                        <div class=" border-gray-300">
                            <div class="w-full flex-row items-center justify-between px-6 pt-1">
                              <a a href="/registro" class="relative w-full inline-flex mb-10 p-0.5 mr-3 rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue group hover:text-white dark:text-white">
                                <span class="relative w-full px-5 py-1.5 text-center text-lg text-black hover:text-white font-dm-sans-medium rounded-full transition-all ease-in duration-75 bg-white group-hover:bg-opacity-0">
                                  Comienza ahora
                                </span>
                              </a>
                              <a a href="/login" class="relative w-full inline-flex mb-10 p-0.5 mr-3 rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue group hover:text-white dark:text-white">
                                <span class="relative w-full px-5 py-1.5 text-center text-lg text-white hover:text-black font-dm-sans-medium rounded-full transition-all ease-in duration-75 hover:bg-white ">
                                  Ingresa a tu cuenta
                                </span>
                              </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile -->
        <!-- Web -->
        <nav class="w-full md:mt-8">
            <div class="container justify-between h-16 flex items-center lg:items-stretch mx-auto">
                <div class="h-full flex items-center">
                    <div aria-label="Home" role="img" class="mr-10 flex items-center">
                        <img src="{{ asset('img/White_t_logo (1).png') }}" alt="logo" class="h-20 max-h-20">
                    </div>
                    <ul class="xl:flex items-center h-full hidden">
                        <li class="flex h-full items-center text-xl text-black tracking-normal hover:text-NiziViolet cursor-pointer font-dm-sans-bold mr-5"><a href="#Inicio">Inicio</a></li>
                        <li class="flex h-full items-center text-xl text-black tracking-normal hover:text-NiziViolet cursor-pointer font-dm-sans-bold mx-5"><a href="#Nosotros">Nosotros</a></li>
                        <li class="flex h-full items-center text-xl text-black tracking-normal hover:text-NiziViolet cursor-pointer font-dm-sans-bold mx-5"><a href="#CuentaNizi">Cuenta Nizi</a></li>
                        <li class="flex h-full items-center text-xl text-black tracking-normal hover:text-NiziViolet cursor-pointer font-dm-sans-bold mx-5"><a href="#NiziCard">Nizi Card</a></li>
                        <li class="flex h-full items-center text-xl text-black tracking-normal hover:text-NiziViolet cursor-pointer font-dm-sans-bold mx-5"><a href="#Contacto">Contacto</a></li>
                    </ul> 
                </div>
                <div class="h-full xl:flex items-center justify-end hidden ">
                  <a a href="/registro" class="relative inline-flex p-0.5 mr-3 rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue group hover:text-white dark:text-white">
                    <span class="relative px-5 py-1.5 text-lg text-black hover:text-white font-dm-sans-medium rounded-full transition-all ease-in duration-75 bg-white group-hover:bg-opacity-0">
                      Comienza ahora
                    </span>
                  </a>
                  <a a href="/login" class="relative inline-flex p-0.5 ml-3 rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue group hover:text-white dark:text-white">
                    <span class="relative px-5 py-1.5 text-lg text-white hover:text-black font-dm-sans-medium rounded-full transition-all ease-in duration-75 hover:bg-white ">
                      Ingresa a tu cuenta
                    </span>
                  </a>
                </div>
                <div class="visible xl:hidden flex items-center">
                    <div>
                        <button id="menu" class="mr-6 text-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" onclick="sidebarHandler(true) ">
                            <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/light_with_Grey_background-svg7.svg" alt="toggler">
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Web -->
        <!--Contenido -->
        <section id="Inicio" class="container mt-5 md:mt-20 px-6 mx-auto lg:pr-0 sm:mb-10">
          <div class="mb-10 text-gray-800 text-center sm:mb-36 lg:text-left">
            <div class="grid lg:grid-cols-2 gap-6 xl:gap-12 items-center">
              <div class="mb-6 lg:mb-0">
                <p class="text-5xl text-start sm:text-5xl md:text-6xl font-dm-sans-medium tracking-tight">
                  Más rápida, más inteligente y confiable.
                </p><br>
                <p class="text-black text-justify text-xl sm:text-2xl lg:mr-36 font-dm-sans-regular tracking-tight">Compra sin preocupaciones, compra lo que viste, date un capricho Premium y conoce Nizi Card.</p> <br><br>
                <a a href="/registro" class="relative inline-flex text-start p-0.5 rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue group hover:text-white dark:text-white">
                  <span class="relative px-14 py-2 text-2xl text-black hover:text-white font-dm-sans-medium rounded-full transition-all ease-in duration-75 bg-white group-hover:bg-opacity-0">
                    Comienza ahora
                  </span>
                </a>
              </div>
              <div class="lg:h-72 p-5 lg:p-7 mb-10 sm:m-10 md:m-20 lg:m-0 h lg:ml-32 rounded-2xl bg-gradient-to-r from-NiziBlue1 via-NiziBlue to-NiziGreen shadow-md">
                <div class="flex items-center mb-28 lg:mb-40 ">
                  <div class="w-1/2 flex justify-start ">
                    <h1 class="text-white text-3xl">Nizi Card</h1>
                  </div>
                  <div class="w-1/2 flex justify-end" >
                    <img src="{{ asset('img/contactless.png')}}" alt="logo" class="w-auto h-8 ">
                  </div>
                </div>
                <div>
                  <h1 class="text-white text-3xl text-start">Sebastián Flores</h1>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section id="Nosotros" class="container my-10 px-6 xl:pr-0 mx-auto sm:mb-28">
          <div class="mb-20 text-gray-800 text-center lg:text-left">
            <h1 class="mb-8 text-3xl text-left font-dm-sans-medium  sm:mb-16 sm:text-center sm:text-6xl bg-gradient-to-r from-NiziViolet  to-NiziBlue bg-clip-text text-transparent ">Nosotros</h1>
            <div class="grid lg:grid-cols-2 gap-6 xl:gap-12 items-center">
              <div class="lg:mb-0">
                <img src="{{ asset('img/Captura de pantalla 2023-02-26 200203.jpg') }}" alt="logo" class="rounded-lg">
              </div>
              <div class="xl:ml-20 ">
                <span class= "flex text-black text-justify text-xl sm:text-2xl items-start font-dm-sans-regular tracking-tight">
                  Nizi nació en 2022 después de realizar un análisis en el mercado de alimentos, principalmente en establecimientos pequeños con la misión de combatir las largas filas que causaban tiempos de espera enormes hacia sus clientes. <br><br>
                  Teniendo nuestra misión como guía Nizi aprovecha la tecnología y las prácticas comerciales para crear soluciones innovadoras siendo simples, intuitivas y convenientes
                </span>
              </div>
            </div>
          </div>
        </section>
        <section id="CuentaNizi" class="container my-10 px-6 mx-auto sm:mb-20 ">
          <div class="mb-20 text-gray-800 text-center lg:text-left">
            <h1 class="mb-8 text-3xl text-left font-dm-sans-medium sm:mb-16 sm:text-center sm:text-6xl bg-gradient-to-r from-NiziViolet via-NiziBlue1 to-NiziBlue bg-clip-text text-transparent ">Cuenta Nizi</h1>
            <span class="text-black text-justify text-xl items-start flex sm:text-2xl font-dm-sans-regular tracking-tight">
              Con tu cuenta Nizi podrás tener acceso a la administración de tu Nizi Card en tu totalidad. Nizi cuenta con una aplicación tanto móvil como web donde podrás encontrar novedosas características que hemos desarrollado para que dejes de lado tus preocupaciones.
            </span> <br>
            <div class="grid lg:grid-cols-2 gap-6 xl:gap-12 items-center">
              <div class="lg:mb-0">
                <img src="{{ asset('img/Rectangle 12.png') }}" alt="logo" class="rounded-lg xl:pl-28" style="height: 430px;">
              </div>
              <div class="lg:mb-0">
                <img src="{{ asset('img/CapPrincipal.jpg') }}" alt="logo" class="rounded-lg w-screen h-full">
              </div>
            </div>
          </div>
        </section>
        <section id="NiziCard" class="container my-10 px-6 mx-auto md:mb-40">
          <div class="text-center lg:text-left">
            <h1 class="mb-8 text-3xl text-left font-dm-sans-medium sm:mb-16 sm:text-center sm:text-6xl bg-gradient-to-r from-NiziViolet via-NiziBlue1 to-NiziBlue bg-clip-text text-transparent ">Nizi Card</h1>
            <span class="mb-10 md:mb-28 text-black text-justify text-xl items-start flex sm:text-2xl font-dm-sans-regular tracking-tight">
              Nuestra tarjeta por excelencia, además de brindar un control total mediante la aplicación Nizi Card cuenta con algunas características que pueden interesarte, descubre todos los beneficios que tiene Nizi Card para ti.
            </span>
            <div class="flex flex-wrap">
              <div class="w-full md:w-1/3 h-72 sm:pr-7 lg:pr-16">
                <img src="{{ asset('img/Globe showing Americas.png') }}" alt="logo" class="rounded-lg mb-5">
                <h1 class="text-justify text-2xl font-dm-sans-medium tracking-tight">Llévala a todas partes</h1><br>
                <p class="text-justify text-xl sm:text-2xl font-dm-sans-regular tracking-tight">Nizi Card es aceptada en miles de establecimientos de alimentos alrededor de México.</p>
                
              </div>
              <div class="w-full md:w-1/3 h-72 sm:px-3.5 lg:px-8" >
                <img src="{{ asset('img/www.jpg') }}" alt="logo" class="rounded-lg mb-5">
                <h1 class="text-justify text-2xl font-dm-sans-medium tracking-tight">Es tuya en minutos</h1><br>
                <p class="text-justify text-xl sm:text-2xl font-dm-sans-regular tracking-tight">Solo necesitas registrar tu información para solicitarla, además la podemos llevar hasta la puerta de tu casa.</p>
                
              </div>
              <div class="w-full md:w-1/3 h-72 sm:pl-7 lg:pl-16">
                <img src="{{ asset('img/CreditCard.png') }}" alt="logo" class="rounded-lg mb-5">
                <h1 class="text-justify text-2xl font-dm-sans-medium tracking-tight">Tarjeta con contactless</h1><br>
                <p class="text-justify text-xl sm:text-2xl font-dm-sans-regular tracking-tight">Nizi Card cuenta con la tecnología para deslizar la tarjeta y se acredite tu pago al instante.</p>
              </div>
            </div>
          </div>
        </section>
        <section class="container px-6 mx-auto sm:mb-10">
          <div class="mb-10 text-gray-800 text-center sm:mb-50 lg:text-left">
            <div class="grid lg:grid-cols-2 gap-6 xl:gap-12 items-center">
              <div class="mb-6 lg:mb-0">
                <p class="mb-10 md:mb-20 text-4xl text-start sm:text-5xl md:text-6xl font-dm-sans-medium tracking-tight">
                  Si no te convence puedes cancelarla directamente desde la aplicación.
                </p>
                <a a href="/registro" class="relative inline-flex text-start p-0.5 rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue group hover:text-white dark:text-white">
                  <span class="relative px-16 md:px-28 py-2 text-xl sm:text-2xl text-black hover:text-white font-dm-sans-medium rounded-full transition-all ease-in duration-75 bg-white group-hover:bg-opacity-0">
                    Solicitar mi Nizi Card
                  </span>
                </a>
              </div>
              <div class="lg:mb-0">
                <img src="{{ asset('img/Rectangle 12.png') }}" alt="logo" class="rounded-lg">
              </div>
            </div>
          </div>
        </section><br><br><br>
        <!-- Contenido -->
        <!-- Final de pagina -->
        <footer id="Contacto" class="bg-gradient-to-r from-NiziViolet via-NiziBlue to-NiziGreen">
          <div  class="flex items-center justify-center px-14  py-10 lg:justify-between">
            <div class="mr-12 hidden lg:block">
              <span class="text-4xl font-dm-sans-medium  text-white">Nizi</span>
            </div>
            <div class="flex justify-center">
              <a href="#!" class="mr-6 text-neutral-600 dark:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                </svg>
              </a>
              <a href="#!" class="mr-6 text-neutral-600 dark:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                </svg>
              </a>
              <a href="#!" class="mr-6 text-neutral-600 dark:text-neutral-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
              </a>
            </div>
          </div>
          <div class="mx-6 text-center md:text-lef mb-10">
            <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-2">
              <div class="sm:ml-10">
                <h6 class="flex justify-center md:justify-start text-xl sm:text-2xl text-white font-dm-sans-bold ">
                  Contacto
                </h6>
                <p class=" flex items-center justify-center md:justify-start text-xl sm:text-2xl text-white font-dm-sans-medium ">
                  contacto@nizi.com
                </p>
              </div>
              <div class="sm:ml-28">
                <p class="text-xl sm:text-2xl text-white font-dm-sans-medium ">
                  Síguenos en nuestras redes sociales para estar informado de todas las futuras actualizaciones.
                </p>
              </div>
            </div>
          </div>
          <div class="p-6 text-center text-base sm:text-xl text-white font-dm-sans-regular bg-gradient-to-r from-NiziViolet via-NiziBlue to-NiziGreen">
            <span>Nizi {{now()->year}}</span>
            <a>Todos los derechos reservados</a>
          </div>
        </footer>
        <!-- Final de pagina -->

        <script>
          // Codigo para abrir el siderbar
          let sideBar = document.getElementById("mobile-nav");
          let menu = document.getElementById("menu");
          let cross = document.getElementById("cross");
          sideBar.style.transform = "translateX(-100%)";
          const sidebarHandler = (check) => {
              if (check) {
                  sideBar.style.transform = "translateX(0px)";
                  menu.classList.add("hidden");
                  cross.classList.remove("hidden");
              } else {
                  sideBar.style.transform = "translateX(-100%)";
                  menu.classList.remove("hidden");
                  cross.classList.add("hidden");
              }
          };
        </script>
    </body>
   
</html>
