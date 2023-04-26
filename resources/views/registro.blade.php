<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

    <title>Login</title>
    @vite ("resources/css/app.css")
</head>

<body>
    <div class="min-w-screen min-h-screen flex sm:items-center justify-center px-5 py-3"
        style="background: linear-gradient(329deg, rgba(84,51,255,1) 7%, rgba(32,189,255,1) 48%, rgba(100,255,166,1) 87%);">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden mb-32 sm:mb-0"
            style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="hidden md:block  w-1/2">
                    <img class="w-full h-full object-cover" src="{{ asset('img/Rectangle 35.png') }}" alt="">
                </div>
                <div class="w-full md:w-1/2 py-10 px-10 sm:px-16">
                    <div class=" mb-4 ">
                        <div class="flex">
                            <div class="w-3/4">
                                <h1 class="text-2xl sm:text-3xl text-black mb-2 font-dm-sans-bold">Crea tu cuenta</h1>
                            </div>
                            <div class="w-1/4 ">
                                <img src="{{ asset('img/logoEdit.png') }}" alt="logo"
                                    class="w-8 h-8 ml-10 sm:ml-12">
                            </div>
                        </div>
                        <p class="text-base font-dm-sans-regular text-gray-600">Ingresa la información solicitada para
                            crear tu cuenta</p>
                    </div>
                    <div>
                        <form method="POST" action="{{ route('insertarUsuario') }}">
                            {{ csrf_field() }}
                            <div class="sm:h-96 overflow-y-auto">
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for=""
                                            class=" font-dm-sans-medium text-black text-base">Nombre</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="text"
                                            id="nombre"
                                            name="nombre"
                                                class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="Ingresa tu(s) nombre(s)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for="" class=" font-dm-sans-medium text-black text-base">Apellido
                                            Paterno</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="text"
                                                name="app"
                                                id="app"
                                                class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="Ingresa tu apellido paterno" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for=""
                                            class=" font-dm-sans-medium  text-black text-base">Apellido Materno</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="text"
                                            name="apm"
                                            id="apm"
                                                class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="Ingresa tu apellido materno">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for="" class=" font-dm-sans-medium text-black text-base">Número
                                            telefónico</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="tel"
                                            name="telefono"
                                            id="telfono"
                                                class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="Ingresa tu número de teléfono" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for="" class=" font-dm-sans-medium text-black text-base">Correo
                                            electrónico</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="email"
                                            name="email"
                                            id="email"
                                                class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="tucorreo@tucorreo.com" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for="" class=" font-dm-sans-medium text-black text-base">Nombre
                                            de usuario</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="text"
                                            name="username"
                                            id="username"
                                                class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="Ingresa un nombre de usuario" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex -mx-2">
                                    <div class="w-full px-3 mb-3">
                                        <label for=""
                                            class=" font-dm-sans-medium text-black text-base">Contraseña</label>
                                        <div class="flex">
                                            <div
                                                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-start justify-start">
                                            </div>
                                            <input type="password"
                                            name="password"
                                            id="password"
                                                class="w-full -ml-10 pl-5 pr-3 py-2  mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue"
                                                placeholder="Ingresa una contraseña" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex text-left items-center mb-4">
                                    <div class="items-center">
                                        <input id="remember" type="checkbox" value=""
                                            class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-customBlue dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                                            required>
                                        <label for="remember" class=" text-sm font-dm-sans-medium text-black ">Acepto
                                            <a href="#" id="show-alert"
                                                class=" text-blue-700 hover:text-NiziViolet">Terminos y
                                                condiciones</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-2">
                                    <button type="submit"
                                        class="block w-full  rounded-full bg-gradient-to-r from-NiziViolet to-NiziBlue hover:bg-gradient-to-b text-lg text-white px-3 py-3 font-dm-sans-bold ">Crear
                                        cuenta</button>
                                </div>
                            </div>
                        </form>
                        <p class=" text-xs sm:text-sm font-dm-sans-regular text-black mb-4 ">¿Ya tienes una cuenta?<a
                                class="text-xs sm:text-sm font-dm-sans-medium ml-2 sm:mr-3 text-blue-700 hover:text-NiziViolet "
                                href="/login">Inicia sesión aquí</a></p>
                        <p class="text-left text-xs  font-dm-sans-regular text-black ">{{ now()->year }} Nizi Todos
                            los derechos reservados</p>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success') == 'Cuenta creada con éxito')
    <script>
         Swal.fire(
             '¡Cuenta creada con éxito!',
             '',
             'success'
         ).then((result) => {
            if(result){
                window.location.href = "{{route('verificar')}}"
            }
         })
    </script>
@elseif(session('failed') == 'El correo que proporcionaste ya se encuentra en uso')
<script>
    Swal.fire(
        'Algo falló',
        'El correo que proporcionaste ya se encuentra en uso',
        'warning'
    )

    
</script>
    @elseif(session('failed') == 'El username que proporcionaste ya se encuentra en uso')
    <script>
        Swal.fire(
            'Algo falló',
            'El username que proporcionaste ya se encuentra en uso',
            'warning'
        )

        
   </script>
   @elseif(session('failed') == 'El telefono que proporcionaste ya se encuentra en uso')
   <script>
       Swal.fire(
           'Algo falló',
           'El telefono que proporcionaste ya se encuentra en uso',
           'warning'
       )

       
  </script>
@endif
    <script>
        document.getElementById('show-alert').addEventListener('click', function() {
            Swal.fire({
                title: '<h1 class=" text-black text-2xl sm:text-3xl font-dm-sans-regular tracking-tight text-center">Términos y Condiciones</h1>',
                html: '<p class="text-base font-dm-sans-medium mb-4 text-start">Desliza hacia abajo para visualizar todo el contenido.</p>' +
                    '<div style="height: 300px; overflow-y: auto; white-space: pre-wrap; text-align: justify;" class="mb-4">' +
                    '<p class="text-base font-dm-sans-medium mb-4">Bienvenido/a a la aplicación móvil Nizi (en adelante, la "Aplicación"), que tiene como finalidad facilitar la distribución y uso de tarjetas de pago. Antes de utilizar la Aplicación, por favor lea detenidamente estos Términos y Condiciones, ya que su uso implica la aceptación de los mismos.</p>' +
                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">1. Uso de la Aplicación.</h3>' +
                    '<p class="text-base font-dm-sans-regular mb-4"> El uso de la Aplicación está sujeto a las siguientes condiciones:' +
                    'a. La Aplicación es de uso exclusivo para personas mayores de edad.' +
                    'b. La Aplicación está diseñada para su uso en dispositivos móviles.' +
                    'c. El uso de la Aplicación se limita a la distribución y uso de tarjetas de pago.' +
                    'd. El usuario es responsable de mantener la confidencialidad de su información personal y de su dispositivo móvil.' +
                    'e. La Aplicación no se hace responsable del mal uso de las tarjetas de pago distribuidas por los usuarios.' +
                    'f. La Aplicación se reserva el derecho de cancelar o restringir el acceso a la misma en cualquier momento y sin previo aviso.' +
                    '</p>' +
                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">2. Información personal y privacidad</h3>' +
                    '<p class="text-base font-dm-sans-regular mb-4">La Aplicación recopila información personal del usuario, como su ubicación y datos de contacto, con el fin de facilitar la distribución de las tarjetas de pago. Esta información será utilizada exclusivamente para estos fines y no será compartida con terceros con fines de lucro. El usuario puede solicitar en cualquier momento la eliminación de sus datos personales de la Aplicación. Para ello, deberá enviar una solicitud a través de los canales de contacto de la Aplicación.</p>.' +
                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3"> 3. Propiedad intelectual</h3>' +
                    '<p class="text-base font-dm-sans-regular mb-4">Todos los derechos de propiedad intelectual relacionados con la Aplicación, incluyendo su diseño, código fuente, contenidos y marcas, son propiedad exclusiva de Nizi. Queda prohibida su reproducción, distribución o uso no autorizado.</p>' +
                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">4. Responsabilidad</h3>' +
                    '<p class="text-base font-dm-sans-regular mb-4">La Aplicación no se hace responsable por daños o perjuicios que puedan derivarse del uso de la misma, incluyendo la distribución y uso de las tarjetas de pago. El usuario asume toda la responsabilidad por el uso que haga de la Aplicación y de las tarjetas de pago distribuidas a través de la misma.</p>' +
                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3">5. Modificaciones</h3>' +
                    '<p class="text-base font-dm-sans-regular mb-4">Podemos cancelar tu tarjeta de pago en cualquier momento y por cualquier motivo, incluyendo si sospechamos que la tarjeta se ha utilizado de forma fraudulenta o para fines ilegales. También puedes solicitar la cancelación de tu tarjeta en cualquier momento.</p>' +
                    '<h3 class="mb-2 text-start text-base font-dm-sans-medium text-NiziBlue3"> 6. Ley aplicable y jurisdicció</h3>' +
                    '<p class="text-base font-dm-sans-regular mb-4">Estos Términos y Condiciones se regirán e interpretarán de acuerdo con la legislación de México. Cualquier controversia que pudiera derivarse del uso de la Aplicación será sometida a los tribunales competentes de México.Al utilizar la Aplicación, el usuario acepta los presentes Términos y Condiciones en su totalidad y se compromete a cumplir con ellos en todo momento. Si el usuario no está de acuerdo con alguno de los términos y condiciones, deberá dejar de utilizar la Aplicación de inmediato. Si tienes alguna duda o consulta sobre estos Términos y Condiciones, por favor no dudes en contactar con nosotros a través de los canales de contacto que ponemos a tu disposición en la Aplicación.</p>' +
                    '<p class="text-base font-dm-sans-regular mb-4">Gracias por utilizar Nizi.' +
                    '</div>',
                footer: '<p class="text-left text-xs  font-dm-sans-regular text-black ">{{ now()->year }}   Nizi   Todos los derechos reservados</p>'
            });
        });
    </script>
</body>

</html>
