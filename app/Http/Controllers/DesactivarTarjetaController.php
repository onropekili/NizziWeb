<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class DesactivarTarjetaController extends Controller
{
    //
    public function DesactivarTarjeta(Request $request){
        $usuario = UsuarioModel::where('_id', session()->get('id'))->get();

        $usuario->tarjeta[0]['estado'] = 'Desactivada';

        $data = UsuarioModel::where('_id', $request->session()->get('id')) -> get();
        $data = $data[0];
         if(isset($data->tarjeta[0]['numeroTarjeta'])){
             $tarjeta = $data->tarjeta[0]['numeroTarjeta'];
             $numeroTarjeta = chunk_split($tarjeta, 4, ' ');
             $tarjeta = substr($tarjeta, 14);

             
             }else{
                $tarjeta = null;
             }
             return view('user.tarjeta', compact('data', 'tarjeta', 'numeroTarjeta'))->with('success', 'La tarjeta se ha desactivado');

    }

    public function ActivarTarjeta(Request $request){
        $usuario = UsuarioModel::where('_id', session()->get('id'))->get();

        $usuario->tarjeta[0]['estado'] = 'Activada';

        $data = UsuarioModel::where('_id', $request->session()->get('id')) -> get();
        $data = $data[0];
         if(isset($data->tarjeta[0]['numeroTarjeta'])){
             $tarjeta = $data->tarjeta[0]['numeroTarjeta'];
             $numeroTarjeta = chunk_split($tarjeta, 4, ' ');
             $tarjeta = substr($tarjeta, 14);

             
             }else{
                $tarjeta = null;
             }
             return view('user.tarjeta', compact('data', 'tarjeta', 'numeroTarjeta'))->with('success', 'La tarjeta se ha desactivado');
    }
}
