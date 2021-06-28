<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Total extends Model
{
    //
    protected $fillable = [
        'nombre',
        'correo',
        'totalInteres',
        'pagoMensual',
        'costoTotal',
        'tipoPeriocidad',
        'montoSolicitado',
        'periocidadPago',
        'plazoCredito',
        'tazaInteres',
        'tipoCredito',
        'totalCapital'

    ];

    protected $hidden = [
        'id', 'token', 'created_at', 'updated_at'
    ];

    protected $dates = ['fechaSolicitud'];

}
