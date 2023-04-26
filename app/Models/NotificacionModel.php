<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NotificacionModel extends Eloquent
{
    // use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'mensajes';

    protected $fillable=['_id','idUsuario','titulo','contenido','fecha'];

    protected $casts = ['fecha' => 'datetime'];


}
