<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NotificacionModel;
use App\Models\SolicitudModel;
use App\Models\UsuarioModel;
use DateTime;
use Illuminate\Http\Request;

class CrearTarjetaController extends Controller
{
    //
    public function CrearTarjeta(Request $request){
        $idSolicitud = $request->input('idSolicitud');
        
        $solicitud = SolicitudModel::where('_id', $idSolicitud)->get()->first();

        $usuario = UsuarioModel::where('_id', $solicitud->idUsuario)->get()->first();

        $notificacionSolicitud = new NotificacionModel();
        $notificacionSolicitud->idUsuario = $solicitud->idUsuario;
        $notificacionSolicitud->titulo = '¡Felicidades ya tienes una Nizi Card!';
        $notificacionSolicitud->contenido = 'Hemos aprobado tu solicitud y te hemos asignado una tarjeta, recuerda dirigirte al apartado "Mi Tarjeta" para activarla.';
        date_default_timezone_set('America/Mexico_City');
        $notificacionSolicitud->fecha = new DateTime();

        $notificacionSolicitud->save();
        


        $tarjetaActualizada = [
            'codigoTarjeta' => $request->input('codigoTarjeta'),
            'numeroTarjeta' => $request->input('numeroTarjeta'),
            'cvv' => $request->input('cvv'),
            'fechaObtencion' => true,
            'fechaVencimiento' => true,
            'estado' => 'Desactivada',
        ];
        
        $tarjetaActualizadaCompleta = [$tarjetaActualizada];
        
        $usuario->tarjeta = $tarjetaActualizadaCompleta;
        $usuario->save();

         $solicitud->estado = 'Aprobada';
         $solicitud->save();

        
        return response()->json(['success' => true, 'cvv' => $request->input('cvv'), 'idSolicitud' => $request->input('idSolicitud')]);
    }


    public function DenegarSolicitud(Request $request){

    }
}
