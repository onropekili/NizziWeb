<?php

namespace App\Http\Controllers;

use App\Models\NotificacionModel;
use DateTime;
use Illuminate\Http\Request;

class notificacionesController extends Controller
{
    //
    public function Notificaciones(Request $request){

        $notificaciones = NotificacionModel::where('idUsuario', session()->get('id'))->orderBy('fecha','desc')->get();

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

         return view('user.notificaciones', compact('notificaciones'));
    }
}
