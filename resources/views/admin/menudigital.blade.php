<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Document</title>
    @vite ("resources/css/app.css")
</head>
<body>
  <!-- Modal para agregar un nuevo producto -->
  <div class="modal fixed w-full h-full top-0 left-0 flex items-center justify-center hidden" style="z-index: 99999">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      <div class="modal-content py-4 text-left px-6">
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Agregar nuevo producto</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M18 1.5l-1.5-1.5-7.5 7.5-7.5-7.5-1.5 1.5 7.5 7.5-7.5 7.5 1.5 1.5 7.5-7.5 7.5 7.5 1.5-1.5-7.5-7.5z"/>
            </svg>
          </div>
        </div>
        <form>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="nombre">
              Nombre del producto
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nombre" type="text" placeholder="Ingrese el nombre del producto">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="descripcion">
              Descripción del producto
            </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="descripcion" type="text" placeholder="Ingrese el nombre del producto"></textarea>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="precio">
              Precio del producto
            </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="precio" type="number" placeholder="Ingrese el precio del producto">
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2" for="imagen">
              Imagen del producto
            </label>
            <input type="file" name="imagen" id="imagen">
          </div>
          <div class="flex justify-end pt-2">
            <button class="bg-gray-300 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" id="guardarProducto">
              Guardar
            </button>
            <button class="modal-close px-4 py-2 mt-2 mr-2 text-gray-500 font-bold text-xl hover:text-gray-700 focus:outline-none focus:shadow-outline" type="button">
              Cancelar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @extends('admin.layouts.sider')
  <div class="bg-white border-b border-gray-200 h-screen overflow-y-auto fixed z-30 w-full">
    @extends('admin.layouts.nav') 
    <div class="flex overflow-hidden pt-16">
      <div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>
      <div id="main-content" class="h-full w-full bg-customGray1 relative overflow-y-auto lg:ml-64">
         <main>
            <div class="pt-6 px-4">
              <div class="flex items-center ">
                <img src="{{ asset('img/back.png') }}" alt="" class="mr-2" style="width: 35px; height: 25px;">
                <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Mis productos</h1>
              </div>
              <hr class="border-t-2 border-gray-500 opacity-10 my-4">
              <div class="grid grid-cols-1 xl:gap-4 my-4 ">
                <div class="w-full grid grid-cols-1">
                  <div class="bg-white shadow-md rounded-lg lg:col-span-2 border border-customGray2">
                    <div class=" w-full rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                      <span class="text-base sm:text-lg font-dm-sans-medium leading-none text-gray-900">Mi menu digital</span>
                    </div>
                    <!-- Contenedor del menú de productos -->
                    <div id="menu-container" class="w-full flex flex-wrap md:flex-row p-4 justify-center gap-2 gap-y-2 overflow-y-auto">
                      <!-- Botón para agregar un nuevo producto -->
                      <button id="agregarProducto" class="producto w-full sm:w-1/5 p-4 shadow-md rounded-lg flex sm:block font-dm-sans-medium text-lg text-center border-NiziGray hover:bg-customGray">
                        Agregar nuevo producto
                      </button>
                      <!-- Productos existentes -->
                      <div class="producto w-full md:w-1/5 p-4 shadow-md rounded-lg flex sm:block  gap-y-2 ">
                        <img src="{{ asset('img/platillo2.png') }}" alt="Imagen del producto" class="w-20 h-20 sm:w-32 sm:h-32 mr-4 sm:m-auto sm:mb-1">
                        <div class="gap-y-2 ">
                          <h3 class="font-dm-sans-bold text-base ">Nombre del producto</h3>
                          <p class="h-12 overflow-y-auto font-dm-sans-regular text-justify">Ensalada de pollo con vegetales</p>
                          <p class="font-dm-sans-medium text-base">Precio: $85</p>
                        </div>
                      </div>
                      <div class="producto w-full md:w-1/5 p-4 shadow-md rounded-lg flex sm:block r gap-y-2 ">
                        <img src="{{ asset('img/platillo3.png') }}" alt="Imagen del producto" class="w-20 h-20 sm:w-32 sm:h-32 mr-4 sm:m-auto sm:mb-1">
                        <div class="gap-y-2 ">
                          <h3 class="font-dm-sans-bold text-base ">Nombre del producto</h3>
                          <p class="h-12 overflow-y-auto font-dm-sans-regular text-justify">Papas fritas caseras</p>
                          <p class="font-dm-sans-medium text-base">Precio: $27.50</p>
                        </div>
                      </div>
                      <div class="producto w-full md:w-1/5 p-4 shadow-md rounded-lg flex sm:block r gap-y-2 ">
                        <img src="{{ asset('img/platillo4.png') }}" alt="Imagen del producto" class="w-20 h-20 sm:w-32 sm:h-32 mr-4 sm:m-auto sm:mb-1">
                        <div class="gap-y-2 ">
                          <h3 class="font-dm-sans-bold text-base ">Nombre del producto</h3>
                          <p class="h-12 overflow-y-auto font-dm-sans-regular text-justify">Café cappuccino </p>
                          <p class="font-dm-sans-medium text-base">Precio: $37</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </main>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {

        // Maneja el evento de click del botón "Agregar" del formulario
        $('#agregarProducto').click(function() {

          // Muestra el modal para agregar un nuevo producto
          $('.modal').removeClass('hidden');
        });

        // Maneja el evento de click del botón "Guardar" del formulario
        $('#guardarProducto').click(function() {

          // Obtiene los valores ingresados por el usuario
          var nombre = $('#nombre').val();
          var imagen = $('#imagen').val();
          var descripcion = $('#descripcion').val();
          var precio = $('#precio').val();

          // Crea el nuevo producto como un elemento div con una imagen
          var nuevoProducto = 
          '<div class="producto w-full md:w-1/5 p-4 shadow-md rounded-lg flex sm:block">'+
            '<img src="' + imagen + '" alt="Imagen del producto" class="w-20 h-20 sm:w-32 sm:h-32 mr-4 sm:m-auto sm:mb-1">'+
            '<div>'+
              '<h3 class="font-dm-sans-bold text-base ">'+ nombre +'</h3>'+
              '<p class="h-12 overflow-y-auto font-dm-sans-regular text-justify">' + descripcion + '</p>'+
              '<p class="font-dm-sans-medium text-base">Precio: $' + precio + '</p>'+
            '</div>'+
          '</div>';

          // Agrega el nuevo producto al final del contenedor del menú
          $('#menu-container').append(nuevoProducto);
          
          // Cierra el modal para agregar un nuevo producto
          $('.modal').addClass('hidden');
        });
        
        // Maneja el evento de click del botón "Cerrar" del modal
        $('.modal-close').click(function() {
          
          // Cierra el modal para agregar un nuevo producto
          $('.modal').addClass('hidden');
        });
      });
    </script>
</body>
</html>