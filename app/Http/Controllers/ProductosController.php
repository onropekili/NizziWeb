<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pedidoModel;
use App\Models\productoModel;
use App\Models\UsuarioModel;
use DateTime;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Query\Builder as QueryBuilder;


class ProductosController extends Controller
{
    //

    public function Productos()
    {
        $productos = productoModel::get();
        $response = [];
        foreach ($productos as $product) {
            $response[] = [
                'idProducto' => $product->_id,
                'titulo' => $product->nombre,
                'imagen' => asset('img/' . $product->imagenProducto),
                'descripcion' => $product->descripcion,
                'categoria' => strtolower($product->categoria),
                'precio' => $product->precio,
            ];
        }


        return response()->json($response);
    }

    public function GenerarPedido(Request $request)
    {
        $arregloProductos = [];
        $carrito = $request->input('carrito');
        $contador = 0;
        $costoTotal = 0;
        $total = 0;
        foreach ($carrito as $producto) {
            
            $productoid = $producto['id'];
                $arregloProductos[$contador]['idProducto'] = $productoid;
                $arregloProductos[$contador]['cantidad'] = $producto['cantidad'];
    
                $costoTotal += $producto['precioTotal'];
                $contador++;
            
        }
        $generarPedido = new pedidoModel();

        $generarPedido->idUsuario = session()->get('id');
        $generarPedido->estado = 'En espera';
        $generarPedido->fecha = new DateTime();
        $generarPedido->total = $costoTotal;
        $generarPedido->productos = $arregloProductos;

        $generarPedido->save();

        return response()->json($arregloProductos);

        
    }
}
