<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class CotizadorExport implements Fromview
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $fechaPago;
    public $montoDisp;
    public $pago;
    public $capital;
    public $interes;
    public $saldoFinal;


    public function __construct($fechaPago, $montoDisp, $pago, $capital, $interes, $saldoFinal)
    {

        $this->fechaPago = $fechaPago;
        $this->montoDisp = $montoDisp;
        $this->pago = $pago;
        $this->capital = $capital;
        $this->interes = $interes;
        $this->saldoFinal = $saldoFinal;
    }
    public function view(): View
    {
        return view('tabla', [

            'fechaPago' => $fechaPago,
            'montoDisp' => $montoDisp,
            'pago' => $pago,
            'capital' => $capital,
            'interes' => $interes,
            'saldoFinal' => $saldoFinal
        ]);
    }
}


