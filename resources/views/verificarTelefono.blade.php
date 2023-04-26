<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script> --}}
    {{-- @import url('https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.min.css'); --}}
    <title>Login</title>
    @vite ("resources/css/app.css")
</head>

<body>
    <div class="min-w-screen min-h-screen flex sm:items-center justify-center px-5 py-3"
        style="background: linear-gradient(228deg, rgba(100,255,166,1) 10%, rgba(32,189,255,1) 50%, rgba(84,51,255,1) 90%);">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden h-full" style="max-width:1000px">
            <div class="md:flex w-full items-center justify-between ">
                <div class="hidden md:block w-1/2 ">
                    <img src="{{ asset('img/logoEdit.png') }}" alt="logo" class="h-8 w-h-8 ml-24 mb-16  text-left">
                    <img class="m-auto mb-28" src="{{ asset('img/Mobile phone with arrow.png') }}" alt=""
                        style="width: 320px; height: 320px;">
                </div>
                <div class="w-full md:w-1/2 py-16 px-8">
                    <div class="text-left mb-10 ">
                        <div class="relative pt-1 mx-14">
                            <div class="overflow-hidden h-2 w-full flex rounded bg-gray-300">
                                <div style="width: 100%"
                                    class=" shadow-none flex flex-col text-center whitespace-nowrap bg-gradient-to-r from-NiziViolet via-NiziBlue to-NiziGreen">
                                </div>
                            </div>
                            <h1 class="text-base text-center text-black mb-2 mt-3 font-dm-sans-bold">Paso 2 de 2</h1>
                        </div>
                        <h1
                            class=" text-3xl text-center sm:text-titulo text-black mt-6 mb-2 sm:mt-20 font-dm-sans-bold">
                            Verifica tu número telefónico</h1>
                        <p class="font-dm-sans-regular text-gray-600 text-base text-center mx-6">Hemos enviado un código
                            vía SMS a tu número de teléfono para confirmar que te pertenece</p>
                    </div>
                    <div>
                        <form action="verificarTelefono" method="post">
                            {{ csrf_field() }}
                            <div class="flex text-left items-center mb-6">
                                <div class="flex md:px-10">
                                    <input type="text"
                                        class="w-1/4 border sm:px-2 sm:py-1 m-1 sm:m-3 bg-customGray rounded-lg text-center text-5xl font-dm-sans-medium codeVer "
                                        placeholder="" name="n1" id="n1" maxlength="1">
                                    <input type="text"
                                        class="w-1/4 border sm:px-2 sm:py-1 m-1 sm:m-3 bg-customGray rounded-lg text-center text-5xl font-dm-sans-medium codeVer"
                                        placeholder="" name="n2" id="n2" maxlength="1">
                                    <input type="text"
                                        class="w-1/4 border sm:px-2 sm:py-1 m-1 sm:m-3 bg-customGray rounded-lg text-center text-5xl font-dm-sans-medium codeVer"
                                        placeholder="" name="n3" id="n3" maxlength="1">
                                    <input type="text"
                                        class="w-1/4 border sm:px-2 sm:py-1 m-1 sm:m-3 bg-customGray rounded-lg text-center text-5xl font-dm-sans-medium codeVer"
                                        placeholder="" name="n4" id="n4" maxlength="1">
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 sm:px-16 mb-5">
                                    <button
                                        class="flex w-full items-center justify-end rounded-xl bg-NiziBlue3 hover:bg-NiziViolet text-white px-5 py-3  font-dm-sans-bold font-bold">
                                        <p class="mr-20">Continuar</p>
                                        <img src="{{ asset('img/Vector.png') }}" alt="flecha" class="mr-2">
                                    </button>
                                </div>
                            </div>
                        </form>
                        <form action="{{ route('reenviarCodigoTel') }}" method="POST">
                            {{ csrf_field() }}
                            <p class=" font-dm-sans-medium text-gray-600 text-texto text-center mb-8"><button
                                    class="boton" id="contador" disabled></button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        var myopt = document.querySelectorAll(".codeVer");
        //will check in console first.
        for (var i = 0; i < myopt.length - 1; i++) {
            myopt[i].addEventListener("keyup", function() {
                this.nextElementSibling.focus();
            });
        }
    </script>
    @if (session('success') == 'Has verificado con éxito')
        <script>
            Swal.fire(
                '¡Correo verificado!',
                'Estás a un paso',
                'success'
            ).then((result) => {
                if (result) {
                    window.location.href = "{{ route('login') }}"
                }
            })
        </script>
    @elseif(session('failed') == 'Parece que el código que ingresaste no es correcto')
        <script>
            Swal.fire(
                'Error',
                'Parece que haz ingresado un código incorrecto',
                'error'
            )
        </script>
    @elseif(session('success') == 'El código ha sido reenviado')
        <script>
            Swal.fire(
                'El código ha sido reenviado',
                '',
                'success'
            )
        </script>
    @endif

    <script>
        var tiempoRestante = 5;

        // Actualizar el contador cada segundo
        var interval = setInterval(function() {

            // Calcular minutos y segundos restantes
            var minutos = Math.floor(tiempoRestante / 60);
            var segundos = tiempoRestante % 60;

            // Formatear el tiempo para mostrar en el contador
            var tiempoFormateado = minutos.toString().padStart(2, '0') + ':' + segundos.toString().padStart(2, '0');

            // Actualizar el contador
            document.getElementById('contador').innerHTML = tiempoFormateado;

            // Restar un segundo del tiempo restante
            tiempoRestante--;

            // Detener el contador cuando llegue a cero
            if (tiempoRestante < 0) {
                clearInterval(interval);
                var contador = document.getElementById('contador');
                contador.innerHTML = 'Reenviar código';
                contador.disabled = false;
            }
        }, 1000);
    </script>


</body>

</html>
