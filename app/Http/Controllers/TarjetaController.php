<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    //
    public function vistaTarjeta(Request $request){
        $data = UsuarioModel::where('_id', $request->session()->get('id')) -> get();
        $data = $data[0];
         if(isset($data->tarjeta[0]['numeroTarjeta'])){
             $tarjeta = $data->tarjeta[0]['numeroTarjeta'];
             $numeroTarjeta = chunk_split($tarjeta, 4, ' ');
             $tarjeta = substr($tarjeta, 14);

             
             }else{
                $tarjeta = null;
             }
             return view('user.tarjeta', compact('data', 'tarjeta', 'numeroTarjeta'));
    }
}
