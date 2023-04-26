<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\NotificacionModel;
use App\Models\SolicitudModel;
use DateTime;

class InicioController extends Controller
{
    //
    public function inicioController()
    {
        $data = UsuarioModel::where('_id',session()->get('id')) -> get();
        $data = $data[0];
         $notificaciones = NotificacionModel::Where('idUsuario', $data->_id)->orderBy('fecha', 'desc')->take(2)->get();
         if ($notificaciones->count() > 0) {
             foreach ($notificaciones as $notificacion) {
                 // Obtener la fecha actual
                 $fecha_actual = new DateTime();

                 // Obtener la fecha de la notificación (supongamos que la fecha está en formato ISODate)
                 $fecha_notificacion = $notificacion->fecha->toDateTime();

                 // Obtener la diferencia entre las fechas en segundos
                 $diferencia = $fecha_actual->getTimestamp() - $fecha_notificacion->getTimestamp();

                 // Convertir la diferencia a un formato de tiempo amigable
                 if ($diferencia < 60) {
                     $mensaje = "hace $diferencia segundos";
                 } else if ($diferencia < 3600) {
                     $minutos = floor($diferencia / 60);
                     $mensaje = "hace $minutos minutos";
                 } else if ($diferencia < 86400) {
                     $horas = floor($diferencia / 3600);
                     $mensaje = "hace $horas horas";
                 } else {
                     $dias = floor($diferencia / 86400);
                     $mensaje = "hace $dias días";
                 }

                 $notificacion->mensaje = $mensaje; // Imprime el mensaje de notificación

             }
         }

         if (isset($data->tarjeta[0]['movimientos'])) {
             $movimientos = $data->tarjeta[0]['movimientos'];
             // dd($movimientos);
             foreach ($movimientos as &$movimiento) {
                 if (isset($movimiento['fechaMovimiento'])) {
                     $timestamp = $movimiento['fechaMovimiento']->toDateTime()->getTimestamp();
                     $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                     $fecha = date('j', $timestamp) . ' de ' . $meses[date('n', $timestamp) - 1] . ' del ' . date('Y', $timestamp); // '24 de Enero del 2003'
                     $hora = date('g:i a', $timestamp); // '8:30 am'

                     $movimiento['fecha'] = $fecha;
                     $movimiento['hora'] = $hora;
                 }
             }
         } else $movimientos = null;

         
         if( isset($data->tarjeta[0]['numeroTarjeta']) ){
             $tarjeta = $data->tarjeta[0]['numeroTarjeta'];
             $tarjeta = substr($tarjeta, 14);
             }else{
                 $tarjeta = null;
             }

             $solicitudExists = SolicitudModel::where('idUsuario', $data->_id )->get();

             if($solicitudExists->count() > 0){
                $solicitudExists = $solicitudExists[0];
                $solicitud = true;
                $timestamp = $solicitudExists->fecha->toDateTime()->getTimestamp();
                    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                    $fecha = date('j', $timestamp) . ' de ' . $meses[date('n', $timestamp) - 1] . ' del ' . date('Y', $timestamp); // '24 de Enero del 2003'
                    $hora = date('g:i a', $timestamp); // '8:30 am'
                    
                    $solicitudExists->fechaFormateada = $fecha;
                    $solicitudExists->horaFormateada = $hora;

             }else{
                $solicitud  = false;
             }

         return view('user.inicio', compact('data', 'notificaciones','tarjeta', 'movimientos', 'solicitud', 'solicitudExists'));
    }
}