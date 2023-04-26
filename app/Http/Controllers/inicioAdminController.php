<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pedidoModel;
use App\Models\SolicitudModel;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class inicioAdminController extends Controller
{
    //
    public function inicioAdminController(){
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
}
