<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabla extends Model
{
    protected $fillable = [
        'token',
        'fechaPago',
        'montoDisp',
        'pago',
        'capital',
        'interes',
        'saldoFinal'
    ];
}
