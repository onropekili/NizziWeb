<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SolicitudModel;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class SolicitudesAdminController extends Controller
{
    //
    public function solicitudesAdmin(){

        $Solicitudes = SolicitudModel::orderBy('fecha', 'desc')->get();
        $solicitudesAprobadas = 0;
        $solicitudesDenegadas = 0;
        $solicitudesEspera = 0;

        $totalSolicitudes = count($Solicitudes);

        foreach($Solicitudes as &$solicitud){
            if($solicitud->estado == 'Aprobada'){
                $solicitudesAprobadas++;

            }elseif($solicitud->estado == 'En espera'){
                $solicitudesEspera++;
            }elseif($solicitud->estado == 'Denegada'){
                $solicitudesDenegadas++;

            }

            if (isset($solicitud->fecha)) {
                $timestamp = $solicitud->fecha->toDateTime()->getTimestamp();
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                $fecha = date('j', $timestamp) . ' de ' . $meses[date('n', $timestamp) - 1] . ' , ' . date('Y', $timestamp); // '24 de Enero del 2003'
                $hora = date('g:i a', $timestamp); // '8:30 am'

                $solicitud->fechaFormateada = $fecha;
                $solicitud->horaFormateada = $hora;
                $solicitud->numeroSolicitud = substr($solicitud->_id, 21);
                $usuario = UsuarioModel::where('_id', $solicitud->idUsuario)->get()->first();

                if(isset($usuario->nombre) && isset($usuario->apellido_paterno) && isset($usuario->apellido_materno)){
                 $solicitud->nombre = $usuario->nombre;
                 $solicitud->apellidoPaterno = $usuario->apellido_paterno;
                 $solicitud->apellidoMaterno = $usuario->apellido_materno;
            }
        }}


        return view('admin.solicitudes', compact('Solicitudes','solicitudesDenegadas','solicitudesAprobadas','solicitudesEspera', 'totalSolicitudes'));
    }
}
