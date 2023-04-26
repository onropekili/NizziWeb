<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class UsuarioModel extends Eloquent
{
    // use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'usuarios';

    public $fillable = [
        '_id', 'nombre', 'apellido_paterno', 'apellido_materno', 'img_perfil', 'email', 'telefono',
        'estadoEmail', 'estadoTelefono', 'numeroEmail', 'numeroTelefono', 'password', 'direccion', 'tarjeta', 'username'
    ];
    public $casts = [
        'estadoCorreo' => 'boolean',
        'estadoTelefono' => 'boolean',
        'direccion.codigoPostal' => 'integer',
        'tarjeta.fechaVencimiento' => 'datetime',
        'tarjeta.fechaObtencion' => 'datetime',
        'tarjeta.movimientos.*.fechaMovimiento' => 'datetime',
        'tarjeta.movimientos.*.tipoMovimiento' => 'boolean',
        'tarjeta.movimientos.*.monto' => 'float',
    ];

    public function sumarMontos()
    {
        $pipeline = [
            [
                '$unwind' => '$tarjeta'
            ],
            [
                '$unwind' => '$tarjeta.movimientos'
            ],
            [
                '$group' => [
                    '_id' => null,
                    'total' => [
                        '$sum' => [
                            '$cond' => [
                                [
                                    '$eq' => ['$tarjeta.movimientos.tipoMovimiento', false]
                                ],
                                ['$subtract' => [0, '$tarjeta.movimientos.monto']],
                                '$tarjeta.movimientos.monto'
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $resultado = $this->aggregate($pipeline);

        return $resultado[0]->total ?? 0;
    }
}
