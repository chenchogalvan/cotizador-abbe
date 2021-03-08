<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    protected $fillable = [
        '',
        'fechaPago',
        'montoDisp',
        'pago',
        'capital',
        'interes',
        'saldoFinal'
    ];

    protected $hidden = [
        'id', 'token', 'created_at', 'updated_at'
    ];
}
