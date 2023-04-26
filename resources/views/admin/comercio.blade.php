<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/stylecomercio.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
    <title>Document</title>
    @vite ("resources/css/app.css")
</head>
<body>
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
              <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Mi Comercio</h1>
            </div>
            <hr class="border-t-2 border-gray-500 opacity-10 my-4">
            <div class="grid grid-cols-1 xl:gap-4 my-4 ">
              <div class="w-full grid grid-cols-1 gap-4">
                <div class="bg-white shadow-md rounded-lg lg:col-span-2 border border-gray-500 border-opacity-10">
                  <div class="flex items-center justify-between rounded-t-lg  px-4 py-2 ">
                    <div class="flex flex-col items-center">
                      <div class="flex w-full sm:pr-8 items-center text-left rounded-xl h-28 lg:h-36">
                        <div class="sm:p-2">
                          <img src="{{ asset('img/coffee_win.jpg') }}" alt="" class="w-28 lg:w-32 rounded-full">
                        </div>
                        <div class="grid grid-cols-2 w-full ml-6">
                          <h1 class="sm:mb-2 text-start text-base sm:text-2xl col-span-2 font-dm-sans-bold">Coffee Win</h1>
                          <h1 class="text-start text-sm sm:text-lg col-span-2 text-gray-600">Miembro desde 22/01/2023</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tabset flex flex-col sm:block p-4">
                    <!-- Tab 1 -->
                    <input type="radio" name="tabset"  id="tab1" aria-controls="marzen" class="hidden" checked >
                    <label for="tab1" class="text-base font-dm-sans-bold  mb-2 sm:mb-0 flex justify-center">
                      <span class="inline-flex items-center flex-row">
                        <img src="{{ asset('img/Editar.png') }}" alt="" class="mr-2 h-6 w-6">
                        <span class="mr-2">Información sobre mi negocio</span>
                      </span>
                    </label>
                    <!-- Tab 2 -->
                    <input type="radio" name="tabset" id="tab2" aria-controls="rauchbier" class="hidden">
                    <label for="tab2" class="text-base font-dm-sans-bold  mb-2 sm:mb-0 flex justify-center">
                      <span class="inline-flex items-center flex-row">
                        <img src="{{ asset('img/Inicio.png') }}" alt="" class="mr-2 h-6 w-6">
                        <span class="mr-2">Domicilio</span>
                      </span>
                    </label>
                    <!-- Tab 3 -->
                    <input type="radio" name="tabset" id="tab3" aria-controls="dunkles" class="hidden">
                    <label for="tab3" class="text-base font-dm-sans-bold  mb-2 sm:mb-0 flex justify-center">
                      <span class="inline-flex items-center flex-row">
                        <img src="{{ asset('img/Key.png') }}" alt="" class="mr-2 h-6 w-6">
                        <span class="mr-2">Cambio de contraseña</span>
                      </span>
                    </label>
                    <div class="tab-panels ">
                      <section id="marzen" class="tab-panel p-0 ">
                        <div class="flex-col md:grid md:grid-cols-3">
                          <div class=" col-span-2 lg:h-85 overflow-y-auto">
                            <form class="py-4 rounded">
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Nombre del negocio</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="name" type="text" placeholder=""/>
                              </div>
                              <div class="mb-6 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email" >Fecha de registro</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="date" placeholder="" disabled/>
                              </div>
                              <p class="mb-8 font-dm-sans-bold text-base">Información del encargado</p>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2  block text-base font-dm-sans-medium text-black " for="email">Nombre del encargado</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="text" placeholder="" />
                              </div>
                              <div class=" md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Nombre de usuario</label>
                                <input class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="text" placeholder="" />
                              </div>
                            </form>
                          </div>
                          <div class="col-span-1 mb-20 lg:px-12 py-4">
                            <div class="mb-6 text-center">
                              <button id="mostrar" onclick="mostrar()" class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziViolet text-white rounded-xl bg-NiziViolet hover:bg-NiziViolet  hover:bg-opacity-10 hover:text-NiziViolet shadow-sm" type="button">
                                Editar
                              </button>
                            </div>
                            <div id="contenido" class="hidden">
                              <div class="mb-6 text-center">
                                <button class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziGreen text-white rounded-xl bg-NiziGreen hover:bg-NiziGreen  hover:bg-opacity-10 hover:text-NiziGreen shadow-sm" type="button">
                                  Guardar
                                </button>
                              </div>
                              <div class="mb-6 text-center">
                                <button id="ocultar" onclick="ocultar()" class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-red-600 text-white rounded-xl bg-red-600 hover:bg-red-600  hover:bg-opacity-10 hover:text-red-600 shadow-sm"  type="button">
                                  Cancelar
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section id="rauchbier" class="tab-panel p-0">
                        <div class="flex-col md:grid md:grid-cols-3">
                          <div class=" col-span-2 lg:h-85 overflow-y-auto">
                            <form class="py-4 rounded">
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Calle</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="email" placeholder=""/>
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2  block text-base font-dm-sans-medium text-black " for="email">Número Exterior</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="email" placeholder=""/> 
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Número Interior</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="email" placeholder="" /> 
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Colonia</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700  border-2 rounded-xl" id="email" type="email" placeholder="" /> 
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Ciudad</label>
                                <input class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="email" placeholder=""/>
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Código Postal</label>
                                <input class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="email" placeholder=""/>
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Estado</label>
                                <input class=" w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="email" placeholder=""/>
                              </div>
                            </form>
                          </div>
                          <div class="col-span-1 mb-20 lg:px-12 py-4">
                            <div class="mb-6 text-center">
                              <button id="mostrar1" onclick="mostrar1()" class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziViolet text-white rounded-xl bg-NiziViolet hover:bg-NiziViolet  hover:bg-opacity-10 hover:text-NiziViolet shadow-sm" type="button">
                                Editar
                              </button>
                            </div>
                            <div id="contenido1" class="hidden">
                              <div class="mb-6 text-center">
                                <button class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziGreen text-white rounded-xl bg-NiziGreen hover:bg-NiziGreen  hover:bg-opacity-10 hover:text-NiziGreen shadow-sm" type="button">
                                  Guardar
                                </button>
                              </div>
                              <div class="mb-6 text-center">
                                <button id="ocultar1" onclick="ocultar1()" class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-red-600 text-white rounded-xl bg-red-600 hover:bg-red-600  hover:bg-opacity-10 hover:text-red-600 shadow-sm" type="button">
                                  Cancelar
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                      <section id="dunkles" class="tab-panel p-0">
                        <div class="flex-col md:grid md:grid-cols-3">
                          <div class=" col-span-2 lg:h-85 overflow-y-auto">
                            <form class="py-4 rounded">
                              <div class="mb-6 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Contraseña actual</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5 text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="password" placeholder="Ingresa tu contraseña actual"/>
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2  block text-base font-dm-sans-medium text-black " for="email">Nueva contraseña</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="password" placeholder="Ingresa tu nueva contraseña"/>
                              </div>
                              <div class="mb-4 md:flex items-center">
                                <label class="w-full sm:w-1/4 py-2 block text-base font-dm-sans-medium text-black " for="email">Confirmar nueva contraseña</label>
                                <input class="w-full sm:w-4/5 px-3 py-2 sm:ml-5  text-base font-dm-sans-regular leading-tight text-gray-700 border-2 rounded-xl" id="email" type="password" placeholder="Repite tu nueva contraseña"/>
                              </div>
                            </form>
                          </div>
                          <div class="col-span-1 mb-20 lg:px-12 py-4">
                            <div class="mb-6 text-center">
                              <button id="mostrar2" onclick="mostrar2()" class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziViolet text-white rounded-xl bg-NiziViolet hover:bg-NiziViolet  hover:bg-opacity-10 hover:text-NiziViolet shadow-sm" type="button">
                                Editar
                              </button>
                            </div>
                            <div id="contenido2" class="hidden">
                              <div class="mb-6 text-center">
                                <button class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-NiziGreen text-white rounded-xl bg-NiziGreen hover:bg-NiziGreen  hover:bg-opacity-10 hover:text-NiziGreen shadow-sm" type="button"> 
                                  Guardar
                                </button>
                              </div>
                              <div class="mb-6 text-center">
                                <button id="ocultar2" onclick="ocultar2()" class="w-full px-4 py-2 font-base font-dm-sans-medium border-2 hover:border-red-600 text-white rounded-xl bg-red-600 hover:bg-red-600  hover:bg-opacity-10 hover:text-red-600 shadow-sm" type="button">
                                  Cancelar
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
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
    function ocultar() {
    document.getElementById("contenido").classList.add("hidden");
  }
  
  function mostrar() {
    document.getElementById("contenido").classList.remove("hidden");
  }
  
  function ocultar1() {
    document.getElementById("contenido1").classList.add("hidden");
  }
  
  function mostrar1() {
    document.getElementById("contenido1").classList.remove("hidden");
  }
  
  function ocultar2() {
    document.getElementById("contenido2").classList.add("hidden");
  }
  
  function mostrar2() {
    document.getElementById("contenido2").classList.remove("hidden");
  }
</script>
</body>
</html>