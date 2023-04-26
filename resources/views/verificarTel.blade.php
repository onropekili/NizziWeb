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
<body >
    <div class="min-w-screen min-h-screen flex sm:items-center justify-center px-5 py-5" style="background: linear-gradient(228deg, rgba(100,255,166,1) 10%, rgba(32,189,255,1) 50%, rgba(84,51,255,1) 90%);">
        <div class="bg-white text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1050px">
            <div class="md:flex w-full items-center justify-between ">
                <div class="hidden md:block w-1/2 ">
                    <img src="{{ asset('img/logoEdit.png') }}" alt="logo" class="h-8 w-h-8 ml-24 mb-16  text-left">
                    <img class="m-auto mb-28" src="{{ asset('img/Mobile phone with arrow.png') }}" alt="" style="width: 320px; height: 320px;">
                </div>
                <div class="w-full md:w-1/2 py-10 px-12 sm:px-16">
                    <div class="text-left mb-10 ">
                        <div class="relative pt-1 mx-10">
                            <div class="overflow-hidden h-2  mt-16 w-full text-xs flex rounded bg-gray-300">
                              <div style="width: 100%" class=" shadow-none flex flex-col text-center whitespace-nowrap bg-gradient-to-r from-customViolet via-customBlue1 to-customGreen"></div>
                              {{-- <div style="width: 15%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-orange-500"></div>
                              <div style="width: 25%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-emerald-500"></div> --}}
                            </div>
                            <h1 class="font-bold text-xl text-center sm:text-texto text-black mb-2 mt-3 font-dm-sans-bold" >Paso 2 de 2</h1>

                          </div>
                        {{-- <img src="{{ asset('img/logoEdit.png') }}" alt="logo" class="h-8 max-h-8 mb-10"> --}}
                        <h1 class="font-bold text-3xl text-center sm:text-titulo text-black mt-6 mb-2 sm:mt-20 font-dm-sans-bold" >Verifica tu número telefónico</h1>
                        <p class="font-dm-sans-medium text-gray-600 text-texto text-center" >Hemos enviado un código vía SMS a tu número de teléfono para confirmar que te pertenece</p>
                    </div>
                    <div>
                        <form action="" method="post">
                        
                        <div class="flex text-left items-center mb-6">
                            <div class="flex">
                                <input type="text" class="w-1/4 border px-2 py-1 m-1 sm:m-4 bg-customGray rounded-lg text-center text-5xl" placeholder="">
                                <input type="text" class="w-1/4 border px-2 py-1 m-1 sm:m-4 bg-customGray rounded-lg text-center text-5xl" placeholder="">
                                <input type="text" class="w-1/4 border px-2 py-1 m-1 sm:m-4 bg-customGray rounded-lg text-center text-5xl" placeholder="">
                                <input type="text" class="w-1/4 border px-2 py-1 m-1 sm:m-4 bg-customGray rounded-lg text-center text-5xl" placeholder="">
                              </div>
                        </div>
                        <div class="flex -mx-3">
                            <div class="w-full  px-3 sm:px-16 mb-5">
                                <button class="block w-full items-center justify-between rounded-xl bg-blue-700 hover:bg-blue-400 text-white px-5 py-3 mb-2 font-dm-sans-bold font-bold">Continuar<img src="{{ asset('img/Vector.png') }}" alt=""></button>
                            </div>
                        </div>
                        </form>
                        <p class=" font-dm-sans-medium text-gray-600 text-texto text-center mb-8"><a href="/login">Generar nuevo código en 02:59</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>