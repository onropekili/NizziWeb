<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>

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
                    <h1 class="text-black text-2xl font-dm-sans-bold tracking-tight">Ganancias</h1>
                </div>
                <hr class="border-t-2 border-gray-500 opacity-10 my-4">
                <div class="grid grid-cols-1 xl:gap-4 my-4 ">
                  <div class="w-full grid grid-cols-1 xl:grid-cols-2 2xl:grid-cols-2 gap-4">
                      <div class="bg-white shadow-md rounded-lg lg:col-span-1 border border-customGray2">
                         <div class="flex items-center justify-between rounded-t-lg bg-NiziGray1 px-4 py-2  border-b border-customGray2">
                            <div class="flex-shrink-0">
                               <span class="text-base sm:text-lg font-dm-sans-medium leading-none text-gray-900">Ganancias de la ùltima semana</span>
                            </div>
                            {{-- <div class="flex items-center justify-end flex-1 text-base font-bold">
                              <span class="text-base leading-none font-dm-sans-bold text-black mr-2">Ver más</span>
                              <img src="{{ asset('img/flecha-correcta (8).png') }}" alt="logo" class="h-6 w-6 ">
                            </div> --}}
                         </div>
                         <canvas class="m-4 " id="dailyChart" style="display: block;"></canvas>
                         <canvas class="m-4 " id="weeklyChart" style="display: none;"></canvas>
                         <canvas class="m-4 " id="monthlyChart" style="display: none;"></canvas>
                         
                         <span class="text-base leading-none px-6 font-dm-sans-bold text-black mr-2">Filtrar por ganancias</span>

                         <div class="m-4 text-start">
                         <button onclick="showDaily()" class="text-base font-dm-sans-medium my-2 mx-3 py-2 px-4 text-black bg-customGray rounded-full hover:bg-black hover:text-white ">Día</button>
                         <button onclick="showWeekly()" class="text-base font-dm-sans-medium my-2 mx-3 py-2 px-4 text-black bg-customGray rounded-full hover:bg-black hover:text-white ">Semana</button>
                         <button onclick="showMonthly()" class="text-base font-dm-sans-medium my-2 mx-3 py-2 px-4 text-black bg-customGray rounded-full hover:bg-black hover:text-white ">Mes</button>
                        </div>
                         {{-- <canvas class="m-4" id="myChart"></canvas> --}}
                      </div>
                      <div class="bg-white rounded-lg col-span-1  border-customGray2 ">
                          <div class="flex items-center justify-between px-5 py-3  border-customGray2">
                              <div class="flex-shrink-0">
                                 <span class="text-2xl font-dm-sans-medium leading-none text-black">Reporte de ganancias</span>
                                 
                              </div>
                              {{-- <div class="flex items-center justify-end flex-1 text-base font-bold">
                                  <span class="text-base leading-none font-dm-sans-bold text-black mr-2">Ver más</span>
                                  <img src="{{ asset('img/flecha-correcta (8).png') }}" alt="logo" class="h-6 w-6 ">
                              </div> --}}
                           </div>
                         <div class="flex flex-col px-4 m-2  overflow-y-auto">
                            <div class="overflow-x-auto">
                               <div class="align-middle inline-block min-w-full">
                                 <p class="text-base text-justify leading-none font-dm-sans-regular mb-8 text-black">
                                    Para generar un reporte de las ganancias de tu negocio es importante 
                                    que completes todos los datos que se solicitan.
                                 </p>
                                 <p class="text-lg font-dm-sans-medium leading-none text-black mb-2">Periodo</p>
                                 <p class="text-base text-justify leading-none font-dm-sans-regular mb-8 text-black">
                                    Por defecto se tomará el día, semana o mes en curso.
                                 </p>
                                 <div class="flex flex-row mb-6">
                                    <button class="bg-customGray hover:bg-NiziGray text-black text-base font-dm-sans-medium hover:text-white text-center py-2 px-4 rounded mr-2 w-28">Día</button>
                                    <button class="bg-customGray hover:bg-NiziGray text-black text-base font-dm-sans-medium hover:text-white text-center py-2 px-4 rounded mr-2 w-28">Semana</button>

                                  </div>
                                  <p class="text-lg font-dm-sans-medium leading-none text-black mb-2">Formato</p>
                                  <p class="text-base text-justify leading-none font-dm-sans-regular mb-6 text-black">
                                    Selecciona un formato para generar tu reporte.
                                 </p>
                                 <div class="flex flex-row mb-6">
                                    <button class="bg-customGray hover:bg-NiziGray text-black text-base font-dm-sans-medium hover:text-white text-center py-2 px-4 rounded mr-2 w-40">Archivo Excel</button>
                                    <button class="bg-customGray hover:bg-NiziGray text-black text-base font-dm-sans-medium hover:text-white text-center py-2 px-4 rounded mr-2 w-40">Archivo PDF</button>
                                  </div>
                                  <div class="flex flex-row mb-4">
                                    <button class="bg-NiziBlue3 hover:bg-NiziGray text-white text-base font-dm-sans-medium hover:text-white text-center py-2 px-4 rounded mr-2 w-48">Descargar reporte</button>
                                  </div>
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   // Datos de ejemplo
   var dailyData = {
       labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
       datasets: [{
           label: 'Ventas diarias',
           data: [12, 19, 3, 5, 2, 3, 7],
           backgroundColor: 'rgba(32, 289, 255, 0.2)',
           borderColor: 'rgba(32, 289, 255, 1)',
           borderWidth: 1
       }]
   };

   var weeklyData = {
       labels: ['Semana 1', 'Semana 2', 'Semana 3', 'Semana 4'],
       datasets: [{
           label: 'Ventas semanales',
           data: [68, 53, 92, 74],
           backgroundColor: 'rgba(57, 234, 133, 0.2)',
           borderColor: 'rgba(57, 234, 133, 1)',
           borderWidth: 1
       }]
   };

   var monthlyData = {
       labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       datasets: [{
           label: 'Ventas mensuales',
           data: [1200, 1500, 900, 800, 1100, 1400, 1700, 1300, 1800, 2000, 2500, 2200],
           backgroundColor: 'rgba(125, 8, 242, 0.2)',
           borderColor: 'rgba(125, 8, 242, 1)',
           borderWidth: 1
       }]
   };

   // Crear las gráficas
   var dailyChart = new Chart(document.getElementById('dailyChart').getContext('2d'), {
       type: 'bar',
       data: dailyData
   });

   var weeklyChart = new Chart(document.getElementById('weeklyChart').getContext('2d'), {
       type: 'bar',
       data: weeklyData
   });

   var monthlyChart = new Chart(document.getElementById('monthlyChart').getContext('2d'), {
       type: 'bar',
       data: monthlyData
   });
   
   function showDaily() {
        dailyChart.canvas.style.display = 'block';
        weeklyChart.canvas.style.display = 'none';
        monthlyChart.canvas.style.display = 'none';
    }

    function showWeekly() {
        dailyChart.canvas.style.display = 'none';
        weeklyChart.canvas.style.display = 'block';
        monthlyChart.canvas.style.display = 'none';
    }

    function showMonthly() {
        dailyChart.canvas.style.display = 'none';
        weeklyChart.canvas.style.display = 'none';
        monthlyChart.canvas.style.display = 'block';
    }
</script>

<script>
   // Seleccionar el botón y agregar el controlador de eventos
const downloadBtn = document.querySelector('#download-pdf');
downloadBtn.addEventListener('click', () => {
  // Crear un nuevo documento jsPDF
  const doc = new jsPDF();
  
  // Agregar texto al documento
  doc.text('¡Hola, mundo!', 10, 10);
  
  // Generar el archivo PDF y descargarlo
  doc.save('mi-archivo.pdf');
});

</script>

<script>
   // Obtener una referencia al botón de descarga
const downloadBtn = document.getElementById('download-pdf');

// Agregar un controlador de eventos de clic al botón
downloadBtn.addEventListener('click', () => {
  // Crear una instancia de jsPDF
  const pdf = new jsPDF();

  // Agregar contenido al PDF
  pdf.text('¡Hola, mundo!', 10, 10);

  // Descargar el PDF
  pdf.save('mi-archivo-pdf.pdf');
});

</script>
        
</html>