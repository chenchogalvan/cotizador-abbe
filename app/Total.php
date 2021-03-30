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
        'costoTotal'
    ];

    protected $hidden = [
        'id', 'token', 'created_at', 'updated_at'
    ];
}
