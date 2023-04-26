<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\NotificacionModel;
use App\Models\SolicitudModel;
use App\Models\UsuarioModel;
use DateTime;
use Illuminate\Http\Request;

class solicitudController extends Controller
{
    //

    public function Solicitud(Request $request)
    {


        $usuario = UsuarioModel::where('_id', session()->get('id'))->get();
        $usuario = $usuario[0];
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido_paterno = $request->input('apellido_paterno');
        $usuario->apellido_materno = $request->input('apellido_materno');
        $usuario->email = $request->input('email');
        $usuario->telefono = $request->input('telefono');


        $direccionActualizada = [
            'municipio' => $request->input('municipio'),
            'codigoPostal' => $request->input('codigoPostal'),
            'colonia' => $request->input('colonia'),
            'numeroExterior' => $request->input('numeroExterior'),
            'numeroInterior' => $request->input('numeroInterior'),
            'calle' => $request->input('calle'),
            'estado' => $request->input('estado')
        ];

        $direccionActualizadaCompleta = [$direccionActualizada];

        $usuario->direccion = $direccionActualizadaCompleta;

        $usuario->save();

        $usuario->save();
        $solicitud = new SolicitudModel();

        $solicitud->idUsuario = session()->get('id');
        $solicitud->estado = 'En espera';
        date_default_timezone_set('America/Mexico_City');
        $solicitud->fecha = new DateTime();

        $solicitud->save();


        $notificacionCorreo = new NotificacionModel();
        $notificacionCorreo->idUsuario = session()->get('id');
        $notificacionCorreo->titulo = 'Solicitud recibida';
        $notificacionCorreo->contenido = 'Hemos recibido tu solicitud, nos pondremos en contacto lo más pronto posible.';
        date_default_timezone_set('America/Mexico_City');
        $notificacionCorreo->fecha = now();


        $notificacionCorreo->save();

        return response()->json(['success' => true]);
    }
}
