<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class pedidoModel extends Eloquent
{
    // use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'pedidos';

    protected $fillable=['_id','idUsuario','estado','productos','fecha', 'total'];

    protected $casts = ['fecha' => 'datetime'];

}
