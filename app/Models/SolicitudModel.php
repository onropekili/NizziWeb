<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SolicitudModel extends Eloquent
{
    // use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'solicitudes';

    protected $fillable = ['_id','idUsuario', 'estado', 'fecha'];

    protected $casts = ['fecha' => 'datetime'];
}
