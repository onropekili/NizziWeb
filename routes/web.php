<?php

use App\Http\Controllers\actualizarPerfilController;
use App\Http\Controllers\CrearTarjetaController;
use App\Http\Controllers\DesactivarTarjetaController;
use App\Http\Controllers\inicioAdminController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\insertarUsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\movimientosController;
use App\Http\Controllers\notificacionesController;
use App\Http\Controllers\perfilController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\solicitudController;
use App\Http\Controllers\SolicitudesAdminController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\verificarCorreoController;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Rutas generales
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/registro', function () {
    return view('registro');
})->name('registro');

Route::get('/verificarEmail', function () {
    return view('verificarEmail');
})->name('verificar');

Route::get('/verificarTelefono', function () {
    return view('verificarTelefono');
})->name('verificarTel');







//Rutas usuario

Route::get('/principal', function () {
    return view('user.inicio');
})->name('principal');

Route::get('/tarjeta', function () {
    return view('user.tarjeta');
})->name('tarjeta');

Route::get('/movimientos', function () {
    return view('user.movimientos');
})->name('movimiento');

Route::get('/notificaciones', function () {
    return view('user.notificaciones');
})->name('notificaciones');

Route::get('/comercios', function () {
    return view('user.comercios');
})->name('comercios');
Route::get('/perfil', function () {
    return view('user.perfil');
})->name('perfil');
Route::get('/recargar', function () {
    return view('user.recargar');
})->name('recarga');

Route::get('/menu', function () {
    return view('user.menu');
})->name('menu');









//Rutas Administrador
Route::get('/admin', function () {
    return view('admin.principal');
})->name('principalAdmin');



Route::get('/comercio', function () {
    return view('admin.comercio');
})->name('comercioAdmin');



Route::get('/ganancias', function () {
    return view('admin.ganancias');
})->name('gananciasAdmin');



Route::get('/menudigital', function () {
    return view('admin.menudigital');
})->name('menuAdmin');



Route::get('/reportes', function () {
    return view('admin.reportes');
})->name('reportesAdmin');



Route::get('/solicitudes', function () {
    return view('admin.solicitudes');
})->name('solicitudAdmin');



Route::get('/pedidos', function () {
    return view('admin.pedidos');
})->name('pedidosAdmin');











// Rutas con metodo
Route::post('/login', [LoginController::class, 'Login'])
    ->name('login');



Route::post('/insertarUsuario', [insertarUsuarioController::class, 'insertarUsuario'])
    ->name('insertarUsuario');

Route::post('/verificarCorreo', [verificarCorreoController::class, 'verificarCorreo'])
    ->name('verificarCorreo');

Route::post('reenviarCodigo', [verificarCorreoController::class, 'reenviarCodigo'])
    ->name('reenviarCodigo');

Route::post('reenviarCodigoTel', [verificarCorreoController::class, 'reenviarCodigoTel'])
    ->name('reenviarCodigoTel');

Route::post('verificarTelefono', [verificarCorreoController::class, 'verificarTelefono'])
    ->name('verificarTelefono');

Route::post('Inicio', [InicioController::class, 'inicioController'])
    ->name('Inicio');

Route::post('vistaTarjeta', [TarjetaController::class, 'vistaTarjeta'])->name('vistaTarjeta');

Route::post('/Notificaciones', [notificacionesController::class, 'Notificaciones'])->name('Notificaciones');

Route::post('Movimiento', [movimientosController::class, 'Movimiento'])->name('Movimiento');

Route::post('Menu', [menuController::class, 'Menu'])->name('Menu');

Route::post('Perfil', [perfilController::class, 'Perfil'])->name('perfil');

Route::post('ActualizarPerfil', [actualizarPerfilController::class, 'ActualizarPerfil'])->name('ActualizarPerfil');

Route::post('ActualizarDireccion', [actualizarPerfilController::class, 'actualizarDireccion'])->name('ActualizarDireccion');

Route::post('ActualizarPassword', [actualizarPerfilController::class, 'NewPassword'])->name('user');

Route::post('Solicitud', [solicitudController::class, 'Solicitud'])->name('Solicitud');

Route::get('Productos', [ProductosController::class, 'Productos'])->name('Productos');

Route::post('GenerarPedido', [ProductosController::class, 'GenerarPedido'])->name('GenerarPedido');

Route::post('DesactivarTarjeta', [DesactivarTarjetaController::class, 'DesactivarTarjeta'])->name('DesactivarTarjeta');

Route::post('ActivarTarjeta', [DesactivarTarjetaController::class, 'ActivarTarjeta'])->name('ActivarTarjeta');









//rutas de admin con verbo http

Route::get('InicioAdmin', [inicioAdminController::class, 'inicioAdminController'])->name('InicioAdmin');

Route::get('SolicitudAdmin', [SolicitudesAdminController::class, 'solicitudesAdmin'])->name('SolicitudAdmin');

Route::post('CrearTarjeta', [CrearTarjetaController::class, 'CrearTarjeta'])->name('CrearTarjeta');

