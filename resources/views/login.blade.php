



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Inicio de Sesión</title>
    @vite ("resources/css/app.css")
</head>
<body >
    <div class="min-w-screen min-h-screen flex sm:items-center justify-center px-5 py-3" style="background: linear-gradient(216deg, rgba(84,51,255,1) 0%, rgba(32,189,255,1) 47%, rgba(100,255,166,1) 77%);">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
            <div class="md:flex w-full">
                <div class="w-full md:w-1/2 py-10 px-10 sm:px-16">
                    <div class="text-left mb-10 ">
                        <img src="{{   asset('img/logoEdit.png') }}" alt="logo" class="h-8 max-h-8 mb-10">
                        <h1 class="font-semibold text-3xl text-black mb-2 font-dm-sans-bold">Inicio de Sesión</h1>
                        <p class="font-dm-sans-medium text-base text-gray-600" >Inicia sesión con tu cuenta Nizi</p>
                    </div>
                    <div>
                        <form action="{{route('login')}}" method="post">
                          {{ csrf_field() }}
                            <div class="flex -mx-2">
                              <div class="w-full px-3 mb-8">
                                <label for="username" class="font-dm-sans-medium text-black text-base">Nombre de usuario</label>
                                <div class="flex">
                                  <div class="w-10 z-10 pl-1 text-left pointer-events-none flex items-start justify-start"></div>
                                  <input type="text" id="username" class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue" 
                                  placeholder="Ingresa tu nombre de usuario" required name="username" id="username"> 
                                </div>
                              </div>
                            </div>
                            <div class="flex -mx-2">
                              <div class="w-full px-3 mb-5">
                                <label for="password" class="font-dm-sans-medium text-black text-base">Contraseña</label>
                                <div class="flex">
                                  <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-start justify-start"></div>
                                  <input type="password" id="password" class="w-full -ml-10 pl-5 pr-3 py-2 mt-2 rounded-full border-2 font-dm-sans-regular text-base text-black border-gray-300 outline-none focus:border-customBlue" 
                                  placeholder="Ingresa tu contraseña" required name="password" id="password">
                                </div>
                              </div>
                            </div>
                            <div class="flex text-left items-center mb-6">
                              <div class="w-1/2">
                                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-customBlue dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800">
                                <label for="remember" class="text-sm font-dm-sans-medium text-black">Recordarme</label>
                              </div>
                              <div class="w-1/2 text-right">
                                <label class="text-xs sm:text-sm font-dm-sans-medium sm:mr-2 text-blue-700 hover:text-NiziViolet"><a href="#" id="myButton">Olvide mi contraseña</a></label>
                              </div>
                            </div>
                            <div class="flex -mx-3">
                              <div class="w-full px-3 mb-5">
                                <button id="submitBtn" class="block w-full rounded-full bg-gradient-to-r from-NiziGreen to-NiziBlue hover:bg-gradient-to-t text-lg text-white px-3 py-3 mb-2 font-dm-sans-bold font-bold">Ingresar</button>
                              </div>
                            </div>
                          </form>
                        <p class=" text-xs sm:text-sm font-dm-sans-regular text-black mb-12 ">¿Aún no tienes una cuenta?<a class="text-xs sm:text-sm font-dm-sans-medium ml-2 sm:mr-2 text-blue-700 hover:text-NiziViolet" href="/registro">Regístrate aquí</a></p>
                        <p class="text-left text-xs  font-dm-sans-regular text-black ">{{now()->year}}  Nizi   Todos los derechos reservados</p>
                    </div>
                </div>
                <div class="hidden md:block  w-1/2">
                    <img class="w-full h-full object-cover" src="{{ asset('img/Rectangle 35.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('failed') == 'Usuario o contraseña incorrectos')
    <script>
                Swal.fire(
                'Datos incorrectos',
                'Usuario o contraseña incorrectos',
                'error'
            )
    </script>
    @endif
      
      
      
      
      
</body>
</html>