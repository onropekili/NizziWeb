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
                        <div class="bg-white shadow-md rounded-lg lg:col-span-2 border border-customGray2">
                           <div class="flex items-center justify-between rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                              <div class="flex-shrink-0">
                                 <span class="text-base sm:text-lg font-dm-sans-medium leading-none text-gray-900">Ganancias de la ùltima semana</span>
                              </div>
                              <div class="flex items-center justify-end flex-1 text-base font-bold">
                                <span class="text-base leading-none font-dm-sans-bold text-black mr-2">Ver más</span>
                                <img src="{{ asset('img/flecha-correcta (8).png') }}" alt="logo" class="h-6 w-6 ">
                              </div>
                           </div>ffffffff
                        </div>
                     </div>
                </div>
             </div>
          </main>
       </div>
    </div>
</div>
</body>
</html>