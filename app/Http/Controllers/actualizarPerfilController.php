<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;
use PDO;

class actualizarPerfilController extends Controller
{
    
    //retornar vista
    public function Vista(String $mensaje1)
    {
        date_default_timezone_set('America/Mexico_City');

         $data = UsuarioModel::where('_id', session()->get('id'))->get();
         $data = $data[0];

         return view('user.perfil', compact('data', 'mensaje1'));
    }





    //atualizar perfil
    public function ActualizarPerfil(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');

        $user = UsuarioModel::find(session()->get('id'));
        $user->nombre = $request->input('nombre');
        $user->apellido_paterno = $request->input('app');
        $user->apellido_materno = $request->input('apm');
        $user->telefono = $request->input('telefono');
        $user->email = $request->input('email');
        $user->username = $request->input('username');

        $user->save();

        $mensaje = 'Haz actualizado tu informción personal de forma exitosa';

        return $this->Vista($mensaje);
    }




    //actualizar direccion
    public function actualizarDireccion(Request $request)
    {

        date_default_timezone_set('America/Mexico_City');


        $direccion = UsuarioModel::find(session()->get('id'));
        $direccionActualizada = [
            'estado' => $request->input('estado'),
            'municipio' => $request->input('municipio'),
            'codigoPostal' => $request->input('codigoPostal'),
            'colonia' => $request->input('colonia'),
            'numeroExterior' => $request->input('numeroExterior'),
            'numeroInterior' => $request->input('numeroInterior'),
            'calle' => $request->input('calle')
        ];

        $direccionActualizadaCompleta = [$direccionActualizada];

        $direccion->direccion = $direccionActualizadaCompleta;

        $direccion->save();

        $mensaje = 'Haz actualizado tu dirección de manera exitosa';

        return $this->Vista($mensaje);
    }

    public function NewPassword(Request $request)
    {
        date_default_timezone_set('America/Mexico_City');


        $password = UsuarioModel::find(session()->get('id'));

         if ($password->password == $request->input('oldPassword')) {
             $password->password = $request->input('newPassword');
             $password->save();
             return $this->Vista($mensaje = 'Haz actualizado tu contraseña de manera exitosa');
         } else {
             $data = UsuarioModel::where('_id', session()->get('id'))->get();
             $data = $data[0];
             $mensajeError = 'Contraseña incorrecta';
            
             return view('user.perfil', compact('data', 'mensajeError', 'codigoPostal'));
         }
    }
}
