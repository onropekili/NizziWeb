<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <title>Document</title>
    @vite ("resources/css/app.css")
</head>
<body>
  <!-- Modal para mostrar más detalles del solicitante -->
  <div class="w-full fixed z-10 inset-0 overflow-y-auto" style="display:none; z-index: 99999;" id="modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <!-- Fondo oscuro -->
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <!-- Contenido del modal -->
      <div class="inline-block align-bottom bg-NiziGray1 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="flex px-2 py-2 sm:px-4 flex-row items-center justify-between ">
          <h3 class="text-lg font-dm-sans-bold" id="modal-headline">Detalles del Pedido</h3>
          <button type="button" class=" rounded-full border shadow-sm px-3 py-1 bg-customGray2 text-lg font-dm-sans-medium text-white hover:bg-red-600 sm:w-auto" onclick="closeModal()">X</button>
        </div>
        <div class="bg-NiziGray1 px-4 py-2">
          <div class="text-black text-base">
            <p><span class="font-dm-sans-regular">Número de Pedido:</span> <span id="modal-solicitud"></span></p>
            <p><span class="font-dm-sans-regular">Nombre del cliente:</span> <span id="modal-nombre"></span></p>
            <p><span class="font-dm-sans-regular">Hora:</span> <span id="modal-fecha"></span></p>
            <p><span class="font-dm-sans-regular">Estado del Pedido:</span> <span id="modal-estado"></span></p>
            <h3 class="text-lg font-dm-sans-bold mb-4" id="modal-headline">Productos</h3>
            <div id="carrito"></div>
          </div>
        </div>
        <div class="flex px-2 py-2 sm:px-4 flex-row items-center justify-between ">
          <h3 class="text-lg font-dm-sans-bold" id="modal-headline">Estado del pedido</h3>
        </div>
        <div class="bg-gray-100 px-4 py-3 sm:px-6 flex flex-row justify-center items-center gap-4 m-4">
          <button type="button" class="w-full inline-flex justify-center rounded-md text-black font-dm-sans-medium hover:text-white border border-NiziGreen2 bg-NiziGreen2 bg-opacity-10 hover:bg-NiziGreen2 shadow-md px-4 py-2  ">Entregado</button>
          <button type="button" class="w-full inline-flex justify-center rounded-md text-black font-dm-sans-medium hover:text-white border border-orange-600 bg-orange-600 bg-opacity-10 hover:bg-orange-600 shadow-md px-4 py-2  ">En cocina</button>
          <button type="button" class="w-full inline-flex justify-center rounded-md text-black font-dm-sans-medium hover:text-white border border-red-600 bg-red-600 bg-opacity-10 hover:bg-red-600 shadow-md px-4 py-2  ">En espera</button>
        </div>
      </div>
    </div>
  </div>
  {{-- Fin del Modal --}}
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
              <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Pedidos</h1>
            </div>
            <hr class="border-t-2 border-gray-500 opacity-10 my-4">
            <div class="mt-4 w-full grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-4">
              {{-- //Todas las solicitudes --}}
              <div class="shadow-md rounded-lg border-2  border-NiziBlue5 bg-NiziBlue5">
                <div class="flex items-center mr-4">
                  <div class="m-2 w-0 items-center  flex-1 text-base font-bold">
                    <div class="flex flex-col text-center">
                      <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">42</span>
                    </div>
                  </div>
                </div>
                <a href="#" onclick="filterTable('')" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziBlue5 rounded-b-md bg-NiziGray1 py-2 px-4">
                  <span class="text-sm sm:text-base leading-none font-dm-sans-medium text-NiziBlue5">Todas las Pedidos</span>
                </a>
              </div>
              {{-- Fin --}}

              {{-- //Solicitudes en espera --}}
              <div class="shadow-md rounded-lg border-2  border-NiziBlue bg-NiziBlue">
                <div class="flex items-center mr-4">
                  <div class="m-2 w-0 items-center  flex-1 text-base font-bold">
                    <div class="flex flex-col text-center">
                      <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">20</span>
                    </div>
                  </div>
                </div>
                <a href="#" onclick="filterTable('Pendiente')" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziBlue rounded-b-lg bg-NiziGray1 py-2 px-4">
                  <span class="text-sm sm:text-base leading-none font-dm-sans-bold text-NiziBlue">Pedidos en espera</span>
                </a> 
              </div>
              {{-- Fin --}} 

              {{-- //Solicitudes en aceptadas --}}
              <div class="shadow-md rounded-lg border-2  border-NiziViolet bg-NiziViolet">
                <div class="flex items-center justify-evenly mr-4">
                  <div class="m-2 w-0  items-center flex-1 text-base font-bold">
                    <div class="flex flex-col text-center">
                      <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">18</span>
                    </div>
                  </div>
                </div>
                <a href="#" onclick="filterTable('Aprobada')" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziViolet rounded-b-lg bg-NiziGray1 py-2 px-4">
                  <span class="text-sm sm:text-base leading-none font-dm-sans-bold text-NiziViolet">Pedidos entregados </span>
                </a>
              </div>
              {{-- Fin --}}
              {{-- //Solicitudes en denengadas --}}
              <div class="shadow-md rounded-lg border-2  border-NiziGreen bg-NiziGreen">
                <div class="flex items-center justify-evenly mr-4">
                  <div class="m-2 w-0  items-center flex-1 text-base font-bold">
                    <div class="flex flex-col text-center">
                      <span class="text-3xl leading-none font-dm-sans-bold text-white mb-1">4</span>
                    </div>
                  </div>
                </div>
                <a href="#" onclick="filterTable('Rechazada')" class="flex flex-row items-center justify-between w-full border-t-2 border-NiziGreen rounded-b-lg bg-NiziGray1 py-2 px-4">
                  <span class="text-sm sm:text-base leading-none font-dm-sans-bold text-NiziGreen">Pedidos en espera</span>
                </a>
              </div>
              {{-- Fin --}}
            </div>
            <div class="grid grid-cols-1 xl:gap-4 my-4 ">
              <div class="w-full grid grid-cols-1 gap-4">
                <div class="bg-white shadow-md rounded-lg lg:col-span-2 border border-customGray2">
                  <div class="flex items-center justify-between rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                    <div class="flex-shrink-0">
                      <span class="text-base sm:text-lg font-dm-sans-bold leading-none text-gray-900">Todos los pedidos</span>
                    </div>
                  </div>
                  <div class="w-full overflow-auto h-96">
                    <table table id="tabla" class="w-full  overflow-auto whitespace-nowrap">
                      <thead>
                        <tr class="bg-NiziGray1 bg-opacity-50 text-black ">
                          <th class="px-4 py-2 text-start font-dm-sans-regular">No. Pedido</th>
                          <th class="px-4 py-2 text-start font-dm-sans-regular">Nombre del cliente</th>
                          <th class="px-4 py-2 text-start font-dm-sans-regular">Hora</th>
                          <th class="px-4 py-2 text-start font-dm-sans-regular">Estado del pedido</th>
                          <th class="px-4 py-2 text-start font-dm-sans-regular"></th>
                        </tr>
                        </thead>
                        <tbody>
                          
                          <tr class="font-dm-sans-regular border">
                            <td class=" px-4 py-2">002</td>
                            <td class=" px-4 py-2">María García</td>
                            <td class=" px-4 py-2">2023-04-07</td>
                            <td id="estado"  class="font-dm-sans-bold px-4 py-2 text-NiziGreen2">Entregado</td>
                            <td class=" px-4 py-2 "><button class=" text-black hover:text-NiziViolet font-bold py-1 px-2 rounded" 
                              onclick="openModal('002', 'María García', '2023-04-07', 'Aprobada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan odio sit amet vestibulum lobortis.')">Ver Detalles</button></td>
                          </tr>
                          <tr class="font-dm-sans-regular border">
                            <td class=" px-4 py-2">003</td>
                            <td class=" px-4 py-2">Pedro López</td>
                            <td class=" px-4 py-2">2023-04-06</td>
                            <td id="estado" class="font-dm-sans-bold px-4 py-2 text-red-600">En espera</td>
                            <td class=" px-4 py-2"><button class=" text-black hover:text-NiziViolet  font-bold py-1 px-2 rounded" 
                              onclick="openModal('003', 'Pedro López', '2023-04-06', 'Rechazada', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan odio sit amet vestibulum lobortis.')">Ver Detalles</button></td>
                          </tr>
                          <tr class="font-dm-sans-regular border">
                            <td class=" px-4 py-2">004</td>
                            <td class=" px-4 py-2">Ana Rodríguez</td>
                            <td class=" px-4 py-2">2023-04-05</td>
                            <td id="estado" class="font-dm-sans-bold px-4 py-2 text-orange-500">En cocina</td>
                            <td class=" px-4 py-2"><button class=" text-black hover:text-NiziViolet  font-bold py-1 px-2 rounded" 
                              onclick="openModal('004', 'Ana Rodríguez', '2023-04-05', 'Pendiente', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan odio sit amet vestibulum lobortis.')">Ver Detalles</button></td>
                          </tr>
                        </tbody>
                      </table>
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

<!-- Scripts de JavaScript -->
<script>
    // Función para abrir el modal y mostrar detalles de la solicitud
    function openModal(solicitud, nombre, fecha, estado, detalles) {
      document.getElementById('modal-solicitud').innerHTML = solicitud;
      document.getElementById('modal-nombre').innerHTML = nombre;
      document.getElementById('modal-fecha').innerHTML = fecha;
      document.getElementById('modal-estado').innerHTML = estado;
      document.getElementById('modal').style.display = 'block';
    }
  
    // Función para cerrar el modal
    function closeModal() {
      document.getElementById('modal').style.display = 'none';
    }
    
    //Funcion para filtrar las solocitudes
    function filterTable(filterValue) {
      const tabla = document.getElementById("tabla");
      const filas = tabla.getElementsByTagName("tr");
      for (let i = 0; i < filas.length; i++) {
        const celdaEstado = filas[i].getElementsByTagName("td")[3];
        if (celdaEstado) {
          const valorEstado = celdaEstado.textContent || celdaEstado.innerText;
          if (valorEstado.toUpperCase().indexOf(filterValue.toUpperCase()) > -1) {
            filas[i].style.display = "";
          } else {
            filas[i].style.display = "none";
          }
        }
      }
    }
  </script>
  <SCript>
    // Suponiendo que los datos del carrito están almacenados en un objeto llamado "carrito"
const carrito = {
  productos: [
    { nombre: "Ensalada de pollo", cantidad: 2, precio: 10.99, detalles: "Lorem ipsum dolor sit amet" },
    { nombre: "Producto 2", cantidad: 1, precio: 19.99, detalles: "Consectetur adipiscing elit" },
    { nombre: "Producto 3", cantidad: 3, precio: 7.99, detalles: "Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua" }
  ]
};

// Obtener la referencia al elemento con id "carrito"
const carritoElement = document.getElementById("carrito");

// Crear un elemento <table> para mostrar los datos del carrito
const table = document.createElement("table");
table.classList.add("table", "w-full", "border", "border-gray-400", "divide-y", "divide-gray-400");


// Crear una fila para la cabecera de la tabla
const headerRow = document.createElement("tr");
headerRow.classList.add("bg-gray-200", "font-dm-sans-bold","text-base","text-center");

// Crear celdas para cada columna de la cabecera
const productoHeader = document.createElement("th");
productoHeader.textContent = "Producto";
headerRow.appendChild(productoHeader);

const cantidadHeader = document.createElement("th");
cantidadHeader.textContent = "Cantidad";
headerRow.appendChild(cantidadHeader);

const precioHeader = document.createElement("th");
precioHeader.textContent = "Precio";
headerRow.appendChild(precioHeader);


// Agregar la fila de cabecera a la tabla
table.appendChild(headerRow);

// Iterar por cada producto en el carrito y crear una fila para cada uno
carrito.productos.forEach(producto => {
  const row = document.createElement("tr");
  row.classList.add("text-center");

  const nombreCell = document.createElement("td");
  nombreCell.textContent = producto.nombre;
  row.appendChild(nombreCell);

  const cantidadCell = document.createElement("td");
  cantidadCell.textContent = producto.cantidad;
  row.appendChild(cantidadCell);

  const precioCell = document.createElement("td");
  precioCell.textContent = `$${producto.precio.toFixed(2)}`;
  row.appendChild(precioCell);


  // Agregar la fila a la tabla
  table.appendChild(row);
});

// Agregar la tabla al elemento con id "carrito"
carritoElement.appendChild(table);

  </SCript>
</body>
</html>