<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class movimientosController extends Controller
{
    //
    public function Movimiento(Request $request){

        $data = UsuarioModel::where('_id', session()->get('id'))->get();
        $data= $data[0];
         if(isset($data->tarjeta[0]['movimientos'])){
             $movimientos = $data->tarjeta[0]['movimientos'];
             // dd($movimientos);
             foreach ($movimientos as &$movimiento) {
                 if(isset($movimiento['fechaMovimiento'])){
                     $timestamp = $movimiento['fechaMovimiento']->toDateTime()->getTimestamp();
                     $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                     $fecha = date('j', $timestamp) . ' de ' . $meses[date('n', $timestamp) - 1] . ' del ' . date('Y', $timestamp); // '24 de Enero del 2003'
                     $hora = date('g:i a', $timestamp); // '8:30 am'
                    
                     $movimiento['fecha'] = $fecha;
                     $movimiento['hora'] = $hora;

                    
                 }}
                
             }else $movimientos = null;

             
          return view('user.movimientos', compact('movimientos'));
    }
}
