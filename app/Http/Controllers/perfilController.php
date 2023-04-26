<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class perfilController extends Controller
{
    //
    public function Perfil(Request $request){
        $data = UsuarioModel::where('_id', session()->get('id'))->get();
        $data = $data[0];
        
            


         return view('user.perfil', compact('data'));
    }
}
