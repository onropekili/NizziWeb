<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite ("resources/css/app.css")
    <style>
        // Estilo CSS para hacer que el Sweet Alert aparezca por encima de todo
        .my-swal {
            position: fixed !important;
            z-index: 999999 !important;
        }
    </style>
</head>

<body class="lg:overflow-hidden"></body>
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-customWhite overflow-y-auto">
    {{-- Sidebar --}}
    @extends('user.layouts.siderbar')
    @section('name')
        <p class="text-black text-sm font-dm-sans-medium">{{ session()->get('nombre') }}</p>
        <p class="text-gray-400 text-text10 font-dm-sans-regular">{{ session()->get('correo') }}</p>
    @endsection
    {{-- end siderbar --}}
    <div class="lg:ml-64 mt-8">
        <!--Contenido-->
        <div class="mx-4 sm:h-contenedor2 2xl:h-contenedor1">
            <div class="grid grid-cols-1">
                <div
                    class="p-4 md:py-4 md:px-10 bg-customGray1 rounded-2xl sm:h-contenedor1 lg:h-contenedor2 2xl:h-contenedor1 shadow-md">
                    <div class="sm:flex items-center mb-5">
                        <div class="flex sm:w-1/2 justify-between mb-5 md:mb-0">
                            <div class="flex">
                                <img src="{{ asset('img/back.png') }}" alt="" class="mr-2"
                                    style="width: 35px; height: 25px;">
                                <h1 class=" text-black text-2xl font-dm-sans-bold tracking-tight">Menu digital</h1>
                            </div>
                            <button id="toggleSidebarMobileSearch" type="button"
                                class=" lg:hidden bg-NiziBlue  text-white hover:text-gray-900 hover:bg-NiziGreen p-2 rounded-lg shadow-lg">
                                <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <svg id="toggleSidebarMobileClose" class="w-6 h-6 hidden" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="flex sm:justify-end items-center sm:w-1/2 justify-start">
                            <div class="flex justify-center ">
                                <input id="search-input"
                                    class="w-full max-w-md px-4 py-1 mr-4 text-black bg-white border border-customGray rounded-full focus:outline-none focus:shadow-outline-blue focus:border-NiziViolet transition duration-150 ease-in-out"
                                    type="text" placeholder="Buscar...">
                            </div>
                            <button onclick="mostrarCarritoConValidacion()"><img src="{{ asset('img/carrito.png') }}"
                                    alt="" class="mr-2" style="width: 35px; height: 35px;"></button>
                        </div>
                    </div>
                    <div class="h-contenedor5 2xl:h-contenedor6 overflow-y-auto ">
                        <h1 class="mb-4 font-dm-sans-medium text-lg">Platillos de la semana</h1>
                        <div class="flex overflow-x-auto ">
                            <div
                                class="flex-shrink-0 w-full sm:w-80 h-52 mr-4 p-4 bg-gradient-to-r from-NiziBlue via-NiziViolet to-NiziBlue3 rounded-2xl justify-center shadow-md my-1">
                                <img src="{{ asset('img/platillo1.png') }}" alt=""
                                    class="w-28 text-center mx-auto my-2 " style="width: 120px; height: 120px;">
                                <div class="flex items-center mb-5">
                                    <div class="flex w-2/3 p-1 text-sm font-dm-sans-medium text-white">Ensalada de pollo
                                        con vegetales</div>
                                    <div
                                        class="flex justify-end px-2 py-1 ml-8 text-sm font-dm-sans-medium bg-gray-800 text-white w-1/3 rounded-full">
                                        $ 85.00</div>
                                </div>
                            </div>
                            <div
                                class="flex-shrink-0 w-full sm:w-80 h-52 mr-4 p-4 bg-gradient-to-tr from-NiziBlue via-NiziViolet to-NiziBlue3 rounded-2xl justify-center shadow-md my-1">
                                <img src="{{ asset('img/platillo1.png') }}" alt=""
                                    class="w-28 text-center mx-auto my-2 " style="width: 120px; height: 120px;">
                                <div class="flex items-center mb-5">
                                    <div class="flex w-2/3 p-1 text-sm font-dm-sans-medium text-white">Ensalada de pollo
                                        con vegetales</div>
                                    <div
                                        class="flex justify-end px-2 py-1 ml-8 text-sm font-dm-sans-medium bg-gray-800 text-white w-1/3 rounded-full">
                                        $ 85.00</div>
                                </div>
                            </div>
                            <div
                                class="flex-shrink-0 w-full sm:w-80 h-52 mr-4 p-4 bg-gradient-to-br from-NiziBlue via-NiziViolet to-NiziBlue3 rounded-2xl justify-center shadow-md my-1">
                                <img src="{{ asset('img/platillo1.png') }}" alt=""
                                    class="w-28 text-center mx-auto my-2 " style="width: 120px; height: 120px;">
                                <div class="flex items-center mb-5">
                                    <div class="flex w-2/3 p-1 text-sm font-dm-sans-medium text-white">Ensalada de pollo
                                        con vegetales</div>
                                    <div
                                        class="flex justify-end px-2 py-1 ml-8 text-sm font-dm-sans-medium bg-gray-800 text-white w-1/3 rounded-full">
                                        $ 85.00</div>
                                </div>
                            </div>
                            <div
                                class="flex-shrink-0 w-full sm:w-80 h-52 mr-4 p-4 bg-gradient-to-l from-NiziBlue via-NiziViolet to-NiziBlue3 rounded-2xl justify-center shadow-md my-1">
                                <img src="{{ asset('img/platillo1.png') }}" alt=""
                                    class="w-28 text-center mx-auto my-2 " style="width: 120px; height: 120px;">
                                <div class="flex items-center mb-5">
                                    <div class="flex w-2/3 p-1 text-sm font-dm-sans-medium text-white">Ensalada de pollo
                                        con vegetales</div>
                                    <div
                                        class="flex justify-end px-2 py-1 ml-8 text-sm font-dm-sans-medium bg-gray-800 text-white w-1/3 rounded-full">
                                        $ 85.00</div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button
                                class=" px-2 py-2 sm:my- items-center text-xs sm:text-base md:mx-2 font-dm-sans-bold hover:bg-black hover:text-white bg-customGray rounded-lg text-black shadow-md"
                                onclick="mostrarMenu(menu)">
                                <span class="sm:mr-2 mx-2">Todo</span>
                            </button>
                            <button
                                class="px-2 py-2 sm:my-4 items-center text-xs sm:text-base md:mx-2 font-dm-sans-bold hover:bg-black hover:text-white bg-customGray rounded-lg text-black shadow-md"
                                onclick="filtrarMenu('ensaladas')">
                                <span class="inline-flex items-center flex-row">
                                    <span class="sm:mr-2">Ensaladas</span>
                                    <img src="{{ asset('img/ensalada_icon.png') }}" alt=""
                                        class=" h-6 w-6 hidden sm:block">
                                </span>
                            </button>
                            <button
                                class="px-2 py-2 sm:my-4 items-center text-xs sm:text-base md:mx-2 font-dm-sans-bold hover:bg-black hover:text-white bg-customGray rounded-lg text-black shadow-md"
                                onclick="filtrarMenu('Snacks')">
                                <span class="inline-flex items-center flex-row">
                                    <span class="sm:mr-2">Snacks</span>
                                    <img src="{{ asset('img/snack_icon.png') }}" alt=""
                                        class=" h-6 w-6 hidden sm:block">
                                </span>
                            </button>
                            <button
                                class="px-2 py-2 sm:my-4 items-center text-xs sm:text-base md:mx-2 font-dm-sans-bold hover:bg-black hover:text-white bg-customGray rounded-lg text-black shadow-md"
                                onclick="filtrarMenu('Bebidas')">
                                <span class="inline-flex items-center flex-row">
                                    <span class="sm:mr-2">Bebidas</span>
                                    <img src="{{ asset('img/bebidas_icon.png') }}" alt=""
                                        class=" h-6 w-6 hidden sm:block">
                                </span>
                            </button>
                        </div>
                        <div id="menu-container" class="flex flex-wrap"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
<script>
    let menu = [];
    //Script JSON para mostrar los datos de los productos

    axios.get('/Productos')
        .then((response) => {
            response.data.forEach(element => {
                menu.push(element);
            });
        })

    console.log(menu)

    //Funcion para mostrar los productos en el menu
    function mostrarMenu(menu) {
        let menuContainer = document.getElementById("menu-container");
        menuContainer.innerHTML = "";
        for (let i = 0; i < menu.length; i++) {
            let enlace = document.createElement("a");
            enlace.classList.add("w-full", "sm:w-1/2", "md:w-1/3", "lg:w-1/4", "xl:w-1/5", "p-2");
            enlace.href = "#";
            enlace.onclick = function() {
                abrirModal(menu[i]);
            };
            enlace.innerHTML = `
            <div class="flex sm:block bg-white rounded-lg shadow-md overflow-hidden p-1">
              <img class="w-24 h-24 sm:w-32 sm:h-32 my-auto mx-auto" src="${menu[i].imagen}" alt="${menu[i].titulo}">
              <div class="p-2">
                <h2 class="text-black font-dm-sans-medium text-lg mb-2">${menu[i].titulo}</h2>
                <p class="text-gray-800 font-dm-sans-regular text-base text-justify h-14 overflow-y-auto">${menu[i].descripcion}</p>
                <p class="text-black font-dm-sans-medium text-base">Precio: $${menu[i].precio}</p>
              </div>
            </div>`;
            menuContainer.appendChild(enlace);
        }
    }

    mostrarMenu(menu);
    //Fin

    //Buscador
    let searchInput = document.getElementById("search-input");
    searchInput.addEventListener("input", () => {
        let searchTerm = searchInput.value.trim().toLowerCase();
        let filteredMenu = menu.filter(item => item.titulo.toLowerCase().includes(
            searchTerm) /*|| item.descripcion.toLowerCase().includes(searchTerm)*/ );
        mostrarMenu(filteredMenu);
    });
    //Fin Buscador

    //Filtros por categoria
    function filtrarMenu(categoria) {
        let filteredMenu = menu.filter(item => item.categoria === categoria);
        mostrarMenu(filteredMenu);
    }
    //Fin Filtros por categoria

    //Funcion para abrir un modal del producto
    function abrirModal(menuItem) {
        let modal = document.createElement("div");
        modal.classList.add("fixed", "inset-0", "bg-gray-900", "bg-opacity-50", "flex", "justify-center",
            "items-center", "modal", );
        modal.style.zIndex = "999"; // Agregar la propiedad z-index
        modal.innerHTML = `
          <div class="bg-white rounded-lg shadow-lg p-6 m-1 w-96">
            <div class=" px-2 py-2 sm:px-4 sm:flex sm:flex-row-reverse">
                <button type="button" class="text-end rounded-full border shadow-sm px-3 py-1 bg-customGray2 text-lg font-dm-sans-medium text-white hover:bg-NiziViolet " onclick="cerrarModal()">X</button>
            </div>
            <img class="w-60 h-60 mx-auto mb-2" src="${menuItem.imagen}" alt="${menuItem.titulo}">
            <h2 class="text-black font-dm-sans-medium text-xl ">${menuItem.titulo}</h2>
            <div style="height: auto; overflow-y: auto; text-align: justify;" class=" w-full">
            <p class="text-gray-800 font-dm-sans-regular text-base text-justify my-2">${menuItem.descripcion}</p>
            </div>
            <div class="flex items-center mb-4">
              <div class="w-1/3">
                <p class="text-black font-dm-sans-medium text-base my-2">Precio:$ ${menuItem.precio}</p>
              </div>
              <div class="w-2/3 text-end "> 
                <label class="text-black font-dm-sans-medium text-base mr-2" for="cantidad">Cantidad:</label>
                <input class="w-20 border border-black rounded-md text-black font-dm-sans-medium text-base px-2" type="number" id="cantidad" name="cantidad" min="1" value="1">
              </div>
              </div>    
            <div class="flex flex-col">
                <button class="text-white font-dm-sans-medium text-base rounded-md py-2 bg-NiziBlue3 hover:bg-NiziBlue" onclick="agregarAlCarrito('${menuItem.titulo}', ${menuItem.precio}, '${menuItem.imagen}', '${menuItem.idProducto}')">Agregar al carrito</button>
            </div>
            </div>`;
        document.body.appendChild(modal);
        document.body.classList.add("overflow-hidden");
        modal.classList.remove("hidden");
    }
    //Fin Funcion para abrir un modal del producto

    //Funcion para cerrar el modal del producto
    function cerrarModal() {
        let modal = document.querySelector("body > div.modal");
        if (modal) {
            modal.classList.add("hidden");
            document.body.classList.remove("overflow-hidden");
            modal.remove();
        }
    }
    //Fin Funcion para cerrar el modal del producto


    //Funcion para agregar los productos al carrito
    let carrito = {};

    function agregarAlCarrito(titulo, precio, imagen, idProducto) {
        let cantidad = parseInt(document.getElementById("cantidad").value);
        if (carrito[titulo]) {
            carrito[titulo].cantidad += cantidad;
            carrito[titulo].precioTotal += precio * cantidad;
        } else {
            carrito[titulo] = {
                id: idProducto,
                cantidad: cantidad,
                precioTotal: precio * cantidad,
                imagen: imagen // Agregar la imagen al objeto del producto en el carrito
            };
        }
        Swal.fire({
            icon: 'success',
            title: 'Producto agregado al carrito',
            customClass: {
                container: 'my-swal',
            },
        });
        console.log(carrito)
    }

    //Fin Funcion para agregar los productos al carrito

    //Funcion para validar si el carrito esta vacion o no 
    function mostrarCarritoConValidacion() {
        if (Object.keys(carrito).length === 0) {
            Swal.fire('Carrito vacío', 'No hay productos en el carrito', 'warning');
        } else {
            mostrarCarrito();
        }
    }

    //Funcion para mostrar el carrito 
    function mostrarCarrito() {
        let modal = document.createElement("div");
        modal.classList.add(
            "fixed",
            "inset-0",
            "bg-gray-900",
            "bg-opacity-50",
            "flex",
            "justify-center",
            "items-center",
            "modal"
        );
        modal.style.zIndex = "9999"; // Agregar la propiedad z-index
        modal.innerHTML = `
          <div class="bg-white rounded-lg shadow-lg p-4 w-96 m-1">
            <div class="flex items-center mb-2">
              <div class="w-2/3">
                <h2 class="text-gray-900 font-dm-sans-bold text-2xl ">Carrito de compras</h2>
              </div>
              <div class="w-1/3 text-end">
                <div class=" px-2 py-2 sm:px-4 sm:flex sm:flex-row-reverse">
                  <button type="button" class="w-full rounded-full border shadow-sm px-3 py-1 bg-customGray2 text-lg font-dm-sans-medium text-white hover:bg-NiziViolet sm:w-auto" onclick="cerrarModal()">X</button>
                </div>
              </div>
            </div>
            <ul id="lista-carrito"></ul>
            <div class="flex flex-col mt-4">
                <button class="text-white font-dm-sans-medium text-base rounded-md py-2 bg-NiziBlue3 hover:bg-NiziBlue" onclick="pagarCarrito()">Pagar</button>
            </div>
          </div>`;
        document.body.appendChild(modal);
        document.body.classList.add("overflow-hidden");
        modal.classList.remove("hidden");

        let listaCarrito = document.getElementById("lista-carrito");
        let totalCarrito = 0;
        for (let producto in carrito) {
            let precioUnitario = carrito[producto].precioTotal / carrito[producto].cantidad;
            let itemCarrito = document.createElement("li");
            itemCarrito.innerHTML = `
          <div class="flex items-center mb-2">
            <img class="w-20 h-20 mr-2 " src="${carrito[producto].imagen}">
            <div class="flex flex-col">
            <span class="font-dm-sans-bold text-base">${producto}</span>
            <span class="font-dm-sans-regular text-sm">Cantidad: ${carrito[producto].cantidad}</span>
            <span class="font-dm-sans-regular text-sm">Precio unitario: $${precioUnitario.toFixed(2)}</span>
            <span class="font-dm-sans-regular text-sm">Precio total: $${carrito[producto].precioTotal.toFixed(2)}</span>
            </div>
          </div>`;
            listaCarrito.appendChild(itemCarrito);
            totalCarrito += carrito[producto].precioTotal;
        }
        let totalElement = document.createElement("li");
        totalElement.innerHTML = `
          <span class="font-dm-sans-bold text-base" >Total a pagar:</span>
          <span class="font-dm-sans-bold text-base">$${totalCarrito.toFixed(2)}</span>
        `;
        listaCarrito.appendChild(totalElement);
    }

    //Fin Funcion para mostrar el carrito 

    function pagarCarrito() {
        axios.post('/GenerarPedido', {carrito:carrito})
            .then((response) => {
              data = {};
              console.log(response.data);
              cerrarModal();
              Swal.fire({
            icon: 'success',
            title: 'pedido generado',
        });
            })
            .catch((error) => {
              console.log(error);
            })
    }
</script>

</body>

</html>
