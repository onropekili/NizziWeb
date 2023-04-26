<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <div class="inline-block align-bottom bg-NiziGray1 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="flex px-2 py-2 sm:px-4 flex-row items-center justify-between ">
                    <h3 class="text-lg font-dm-sans-bold" id="modal-headline">Detalles de la Solicitud</h3>
                    <button type="button"
                        class=" rounded-full border shadow-sm px-3 py-1 bg-customGray2 text-lg font-dm-sans-medium text-white hover:bg-red-600 sm:w-auto"
                        onclick="closeModal()">X</button>
                </div>
                <div class="bg-NiziGray1 px-4 py-2">
                    <div class="text-black text-base">
                        <p><span class="font-dm-sans-regular">Número de Solicitud:</span> <span
                                id="modal-solicitud"></span></p>
                        <p><span class="font-dm-sans-regular">Nombre de la Persona:</span> <span
                                id="modal-nombre"></span></p>
                        <p><span class="font-dm-sans-regular">Fecha de registro:</span> <span id="modal-fecha"></span>
                        </p>
                        <p><span class="font-dm-sans-regular">Estado de la Tarjeta:</span> <span
                                id="modal-estado"></span></p>
                        {{-- <p><span class="font-bold">Detalles:</span> <span id="modal-detalles"></span></p> --}}
                    </div>
                </div>
                <div class="bg-gray-100 px-4 py-3 sm:px-6 flex flex-row justify-center items-center gap-4 my-4">
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-md text-black font-dm-sans-medium hover:text-white border border-NiziGreen2 bg-NiziGreen2 bg-opacity-10 hover:bg-NiziGreen2 shadow-md px-4 py-2  "
                        id="aprobar">Aprobar Solicitud</button>
                    <button type="button"
                        class="w-full inline-flex justify-center rounded-md text-black font-dm-sans-medium hover:text-white border border-red-600 bg-red-600 bg-opacity-10 hover:bg-red-600 shadow-md px-4 py-2  "
                        id="rechazar">Rechazar Solicitud</button>
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
                            <img src="{{ asset('img/back.png') }}" alt="" class="mr-2"
                                style="width: 35px; height: 25px;">
                            <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Solicitudes</h1>
                        </div>
                        <hr class="border-t-2 border-gray-500 opacity-10 my-4">
                        <div class="mt-4 w-full grid grid-cols-2 md:grid-cols-2 xl:grid-cols-4 gap-4">
                            {{-- //Todas las solicitudes --}}
                            <div class="shadow-md rounded-lg border-2  border-NiziBlue5 bg-NiziBlue5">
                                <div class="flex items-center mr-4">
                                    <div class="m-2 w-0 items-center  flex-1 text-base font-bold">
                                        <div class="flex flex-col text-center">
                                            <span
                                                class="text-3xl leading-none font-dm-sans-bold text-white mb-1">{{ $totalSolicitudes }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" onclick="filterTable('')"
                                    class="flex flex-row items-center justify-between w-full border-t-2 border-NiziBlue5 rounded-b-md bg-NiziGray1 py-2 px-4">
                                    <span
                                        class="text-sm sm:text-base leading-none font-dm-sans-medium text-NiziBlue5">Todas
                                        las solicitudes</span>
                                </a>
                            </div>
                            {{-- Fin --}}

                            {{-- //Solicitudes en espera --}}
                            <div class="shadow-md rounded-lg border-2  border-NiziBlue bg-NiziBlue">
                                <div class="flex items-center mr-4">
                                    <div class="m-2 w-0 items-center  flex-1 text-base font-bold">
                                        <div class="flex flex-col text-center">
                                            <span
                                                class="text-3xl leading-none font-dm-sans-bold text-white mb-1">{{ $solicitudesEspera }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" onclick="filterTable('En espera')"
                                    class="flex flex-row items-center justify-between w-full border-t-2 border-NiziBlue rounded-b-lg bg-NiziGray1 py-2 px-4">
                                    <span
                                        class="text-sm sm:text-base leading-none font-dm-sans-bold text-NiziBlue">Solicitudes
                                        en espera</span>
                                </a>
                            </div>
                            {{-- Fin --}}

                            {{-- //Solicitudes en aceptadas --}}
                            <div class="shadow-md rounded-lg border-2  border-NiziViolet bg-NiziViolet">
                                <div class="flex items-center justify-evenly mr-4">
                                    <div class="m-2 w-0  items-center flex-1 text-base font-bold">
                                        <div class="flex flex-col text-center">
                                            <span
                                                class="text-3xl leading-none font-dm-sans-bold text-white mb-1">{{ $solicitudesAprobadas }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" onclick="filterTable('Aprobada')"
                                    class="flex flex-row items-center justify-between w-full border-t-2 border-NiziViolet rounded-b-lg bg-NiziGray1 py-2 px-4">
                                    <span
                                        class="text-sm sm:text-base leading-none font-dm-sans-bold text-NiziViolet">Solicitudes
                                        aceptadas </span>
                                </a>
                            </div>
                            {{-- Fin --}}
                            {{-- //Solicitudes en denengadas --}}
                            <div class="shadow-md rounded-lg border-2  border-NiziGreen bg-NiziGreen">
                                <div class="flex items-center justify-evenly mr-4">
                                    <div class="m-2 w-0  items-center flex-1 text-base font-bold">
                                        <div class="flex flex-col text-center">
                                            <span
                                                class="text-3xl leading-none font-dm-sans-bold text-white mb-1">{{ $solicitudesDenegadas }}</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" onclick="filterTable('Rechazada')"
                                    class="flex flex-row items-center justify-between w-full border-t-2 border-NiziGreen rounded-b-lg bg-NiziGray1 py-2 px-4">
                                    <span
                                        class="text-sm sm:text-base leading-none font-dm-sans-bold text-NiziGreen">Solicitudes
                                        denegadas</span>
                                </a>
                            </div>
                            {{-- Fin --}}
                        </div>
                        <div class="grid grid-cols-1 xl:gap-4 my-4 ">
                            <div class="w-full grid grid-cols-1 gap-4">
                                <div class="bg-white shadow-md rounded-lg lg:col-span-2 border border-customGray2">
                                    <div
                                        class="flex items-center justify-between rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                                        <div class="flex-shrink-0">
                                            <span
                                                class="text-base sm:text-lg font-dm-sans-bold leading-none text-gray-900">Todas
                                                las solicitudes</span>
                                        </div>
                                    </div>
                                    <div class="w-full overflow-auto h-96">
                                        <table table id="tabla" class="w-full  overflow-auto whitespace-nowrap">
                                            <thead>
                                                <tr class="bg-NiziGray1 bg-opacity-50 text-black ">
                                                    <th class="px-4 py-2 text-start font-dm-sans-regular">No. Solicitud
                                                    </th>
                                                    <th class="px-4 py-2 text-start font-dm-sans-regular">Nombre del
                                                        solicitante</th>
                                                    <th class="px-4 py-2 text-start font-dm-sans-regular">Fecha de
                                                        registro</th>
                                                    <th class="px-4 py-2 text-start font-dm-sans-regular">Estado de la
                                                        Tarjeta</th>
                                                    <th class="px-4 py-2 text-start font-dm-sans-regular"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Solicitudes as $solicitud)
                                                    @if (isset($solicitud->nombre))
                                                        <tr class="font-dm-sans-regular border shadow-sm ">
                                                            <td class=" px-4 py-2">{{ $solicitud->numeroSolicitud }}
                                                            </td>
                                                            <td class=" px-4 py-2">{{ $solicitud->nombre }}
                                                                {{ $solicitud->apellidoPaterno }}</td>
                                                            <td class=" px-4 py-2">{{ $solicitud->fechaFormateada }}
                                                            </td>
                                                            @if ($solicitud->estado == 'En espera')
                                                                <td id="estado"
                                                                    class="font-dm-sans-bold px-4 py-2 text-orange-500">
                                                                    {{ $solicitud->estado }}</td>
                                                            @elseif($solicitud->estado == 'Aprobada')
                                                                <td id="estado"
                                                                    class="font-dm-sans-bold px-4 py-2 text-NiziGreen2">
                                                                    {{ $solicitud->estado }}</td>
                                                            @elseif($solicitud->estado == 'Denegada')
                                                                <td id="estado"
                                                                    class="font-dm-sans-bold px-4 py-2 text-red-600">
                                                                    {{ $solicitud->estado }}</td>
                                                            @endif

                                                            <td class=" px-4 py-2">
                                                                <button
                                                                    class=" text-black hover:text-NiziViolet  font-bold py-1 px-2 rounded btn-mostrar"
                                                                    data-numero='{{ $solicitud->_id }}'
                                                                    data-nombre="{{ $solicitud->nombre }} {{ $solicitud->apellidoPaterno }}"
                                                                    data-fecha="{{ $solicitud->fechaFormateada }}"
                                                                    data-estado="{{ $solicitud->estado }}">Ver
                                                                    Detalles</button>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach



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
    <input type="text">
    </div>


    <!-- Scripts de JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var botonAprobar = document.getElementById('aprobar');
        botonAprobar.addEventListener('click', () => {
            closeModal();

            var data = {
                idSolicitud: document.getElementById('modal-solicitud').innerHTML

            };

            swal.fire({
                title: '<h1 class=" text-black text-3xl font-dm-sans-bold tracking-tight">Solicitud de tarjeta</h1>',
                html: '<h1 class="mb-2 text-black text-start text-lg font-dm-sans-medium tracking-tight">Datos de tarjeta</h1>' +
                    '<p class="mb-2 text-black text-start text-base font-dm-sans-regular tracking-tight">Verifica y completa la información solicitada.</p>' +
                    '<h1 class="mb-2 text-black text-start text-lg font-dm-sans-medium tracking-tight">Número de tarjeta</h1>' +
                    '<div class="flex items-center">' +
                    '<div class="items-center justify-start mr-5  w-1/3">' +
                    '<input class="bg-gray-200 w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="numerosAutomaticos" type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ.]*" placeholder="" disabled value="3598 1167"/>' +
                    '</div>' +
                    '<div class="items-center justify-start  w-2/3">' +
                    '<input class="w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="numerosRFID" type="email" placeholder="" pattern="\d*" oninput="this.value = this.value.replace(/[^0-9]/g, \'\')" maxlength="8" minlength="8"/>' +
                    '</div>' +
                    '</div>' +
                    '<div class="flex items-center mt-4 gap-2">' +
                    '<div class="flex flex-col justify-start w-1/2">' +
                    '<h1 class="mb-2 text-black text-start text-lg font-dm-sans-medium tracking-tight">CVV</h1>' +
                    '<input class="bg-gray-200 w-full px-3 py-2 text-base text-start font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-lg" id="cvv" value="" disabled/>' +
                    '</div>' +
                    '</div>' +

                    '</div>',
                didOpen: () => {
                    // Generar un número aleatorio de tres cifras
                    const numeroAleatorio = Math.floor(Math.random() * (999 - 100 + 1) + 100);

                    // Establecer el valor por defecto del input con el número aleatorio
                    const cvvInput = document.getElementById("cvv");
                    cvvInput.value = numeroAleatorio;
                },
                focusConfirm: false,

                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonText: "Siguiente",
                preConfirm: () => {
                    const CodigoTarjeta = document.getElementById('numerosRFID').value

                    // Si los campos están vacíos, muestra un mensaje de error y evita que se cierre el Sweet Alert
                    if (!CodigoTarjeta || CodigoTarjeta.length != 8) {
                        Swal.showValidationMessage(
                            'Este campo debe tener una longitud de 8 numeros')
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    var laravelToken = document.querySelector(
                        'meta[name="csrf-token"]').getAttribute(
                        'content');


                    

                    var codigoTarjeta = document.getElementById('numerosRFID').value
                    
                    var numerosFijos = document.getElementById('numerosAutomaticos').value

                    var numerosFijos = numerosFijos.replace(/\s/g, "");

                    data.numeroTarjeta = numerosFijos + codigoTarjeta;
                    data.codigoTarjeta = codigoTarjeta
                    data.cvv = document.getElementById('cvv').value;

                    axios.post('/CrearTarjeta', data)
                        .then((response) => {
                          console.log(response);
                            Swal.fire(
                                'Solicitud enviada',
                                '',
                                'success'
                            ).then((result) => {
                              location.reload();
                            })
                        })

                }
            })
        });


        // Función para abrir el modal y mostrar detalles de la solicitud
        document.querySelectorAll('.btn-mostrar').forEach(buttonModal => {
            buttonModal.addEventListener('click', () => {
                const nombre = buttonModal.getAttribute('data-nombre');
                const numeroSolicitud = buttonModal.getAttribute('data-numero');
                const estado = buttonModal.getAttribute('data-estado');
                const fecha = buttonModal.getAttribute('data-fecha');
                document.getElementById('modal-solicitud').innerHTML = numeroSolicitud;
                document.getElementById('modal-nombre').innerHTML = nombre;
                document.getElementById('modal-fecha').innerHTML = fecha;
                document.getElementById('modal-estado').innerHTML = estado;
                // // document.getElementById('modal-detalles').innerHTML = detalles;
                document.getElementById('modal').style.display = 'block';
            })
        });

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
</body>

</html>
