<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class productoModel extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'productos';

    protected $fillable=['_id','idEstablecimiento','nombre','precio','imagenProducto','descripcion', 'categoria', 'informacionNutrimental','stock'];

}
