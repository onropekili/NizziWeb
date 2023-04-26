<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\NotificacionModel;
use App\Models\pedidoModel;
use App\Models\SolicitudModel;
use DateTime;

class LoginController extends Controller
{
    //
    function Login(Request $request)
    {
        $data = UsuarioModel::where('username', $request->input('username'))->where('password', $request->input('password'))->get();
        $fecha = array();
        if ($data->count() > 0) {
            $data = $data[0];
            if ($data->estadoEmail == false) {
                $request->session()->put(['id' => $data->_id, 'estadoEmail' => false]);
                return redirect()->route('verificar');
            }

            if ($data->estadoTelefono == false) {
                $request->session()->put(['id' => $data->_id, 'estadoTelefono' => false]);
                return redirect()->route('verificarTel');
            }




            //Si el usuario es admin
            if (isset($data->admin)) {


                $hoy = time();
                $hoy = strtotime('-1 day -6 hours', $hoy);
                $sieteDias  = strtotime('-7 day -6 hours', $hoy);
                $seisDias   = strtotime('-6 day -6 hours', $hoy);
                $cincoDias  = strtotime('-5 day -6 hours', $hoy);
                $cuatroDias = strtotime('-4 day -6 hours', $hoy);
                $tresDias   = strtotime('-3 day -6 hours', $hoy);
                $dosDias    = strtotime('-2 day -6 hours', $hoy);
                $unoDias    = strtotime('-1 day -6 hours', $hoy);


                    $sieteDiasGanancias  =0;
                    $seisDiasGanancias   =0;
                    $cincoDiasGanancias  =0;
                    $cuatroDiasGanancias =0;
                    $tresDiasGanancias   =0;
                    $dosDiasGanancias   =0;
                    $unoDiasGanancias   =0;

                    $fechaHoy = date('Y-m-d\TH:i:s.u\Z', $hoy);
                $totalSolisHoy = 0;
                $totalPedidosHoy = 0;
                $totalIngresosHoy = 0;
                $solicitudes = SolicitudModel::get();

                foreach ($solicitudes as $solicitud) {
                    if ($solicitud->fecha > $fechaHoy) {
                        $totalSolisHoy++;
                    }
                }

                $pedidos = pedidoModel::get();

                // dd($pedidos);

                foreach ($pedidos as &$pedido) {
                    $fechaPedido  = $pedido->fecha;
                    $fechaPedidoFormateada = strtotime($fechaPedido);
                    $fechaHoy = strtotime($fechaHoy);
                    $sieteDias = strtotime($sieteDias);
                    $seisDias    = strtotime($seisDias);
                    $cincoDias = strtotime($cincoDias);
                    $cuatroDias = strtotime($cuatroDias);
                    $tresDias = strtotime($tresDias);
                    $dosDias = strtotime($dosDias);
                    $unoDias = strtotime($unoDias);

                    if ($fechaPedidoFormateada > $sieteDias && $fechaPedidoFormateada < $seisDias) {
                        $sieteDiasGanancias = $sieteDiasGanancias + $pedido->total;
                    }
                    if ($fechaPedidoFormateada > $seisDias && $fechaPedidoFormateada < $cincoDias) {
                        $seisDiasGanancias = $seisDiasGanancias + $pedido->total;
                    }
                    if ($fechaPedidoFormateada > $cincoDias && $fechaPedidoFormateada < $cuatroDias) {
                        $cincoDiasGanancias = $cincoDiasGanancias + $pedido->total;
                    }
                    if ($fechaPedidoFormateada > $cuatroDias && $fechaPedidoFormateada < $tresDias) {
                        $cuatroDiasGanancias = $cuatroDiasGanancias + $pedido->total;
                    }
                    if ($fechaPedidoFormateada > $tresDias && $fechaPedidoFormateada < $dosDias) {
                        $tresDiasGanancias = $tresDiasGanancias + $pedido->total;
                    }
                    if ($fechaPedidoFormateada > $dosDias && $fechaPedidoFormateada < $unoDias) {
                        $tresDiasGanancias = $tresDiasGanancias + $pedido->total;
                    }
                    if ($fechaPedidoFormateada > $unoDias) {
                        $unoDiasGanancias = $unoDiasGanancias + $pedido->total;
                    }

                    if ($fechaPedidoFormateada > $fechaHoy) {
                        $totalPedidosHoy++;

                        $totalIngresosHoy = $totalIngresosHoy + $pedido->total;
                    }

                    if (isset($pedido->fecha)) {
                        $timestamp = $pedido->fecha->toDateTime()->getTimestamp();
                        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                        $fecha = date('j', $timestamp) . ' de ' . $meses[date('n', $timestamp) - 1] . ' , ' . date('Y', $timestamp); // '24 de Enero del 2003'
                        $hora = date('g:i a', $timestamp); // '8:30 am'

                        $pedido->fechaFormateada = $fecha;
                        $pedido->horaFormateada = $hora;
                        $pedido->numeroPedido = substr($pedido->_id, 20);
                        $usuario = UsuarioModel::where('_id', $pedido->idUsuario)->get()->first();

                        if(isset($usuario->nombre) && isset($usuario->apellido_paterno) && isset($usuario->apellido_materno)){
                            $solicitud->nombre = $usuario->nombre;
                            $solicitud->apellidoPaterno = $usuario->apellido_paterno;
                            $solicitud->apellidoMaterno = $usuario->apellido_materno;
                       }
                    }
                }


                return view('admin.principal', compact('totalSolisHoy', 'totalIngresosHoy', 'totalPedidosHoy', 'pedidos', 'sieteDiasGanancias', 'seisDiasGanancias', 'cincoDiasGanancias', 'cuatroDiasGanancias', 'tresDiasGanancias', 'dosDiasGanancias', 'unoDiasGanancias'));
            }





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

                        $mensaje = "hace  $diferencia   segundos";
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

            if (isset($data->tarjeta[0]['numeroTarjeta'])) {
                $tarjeta = $data->tarjeta[0]['numeroTarjeta'];
                $tarjeta = substr($tarjeta, 14);
                $request->session()->put(['numeroTarjeta' => $data->tarjeta[0]['numeroTarjeta']]);
            } else {
                $tarjeta = null;
            }



            if (isset($data->apellido_paterno)) {
                $request->session()->put(['app' => $data->apellido_paterno]);
            }

            $solicitudExists = SolicitudModel::where('idUsuario', $data->_id)->get();

            if ($solicitudExists->count() > 0) {
                $solicitudExists = $solicitudExists[0];
                $solicitud = true;
                $timestamp = $solicitudExists->fecha->toDateTime()->getTimestamp();
                $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                $fecha = $meses[date('n', $timestamp) - 1] . ' del ' . date('Y', $timestamp); // '24 de Enero del 2003'
                $hora = date('g:i a', $timestamp); // '8:30 am'

                $solicitudExists->fechaFormateada = $fecha;
                $solicitudExists->horaFormateada = $hora;
            } else {
                $solicitud  = false;
            }



            $request->session()->put(['id' => $data->_id, 'nombre' => $data->nombre, 'correo' => $data->email, 'tarjeta' => $tarjeta]);
            return view('user.inicio', compact('data', 'notificaciones', 'tarjeta', 'movimientos', 'solicitud', 'solicitudExists'));
            // // return view('principal', compact('data'));




        } else {
            return redirect()->route('login')->with('failed', 'Usuario o contraseña incorrectos');
            //     // return view('login');
        }
    }
}
