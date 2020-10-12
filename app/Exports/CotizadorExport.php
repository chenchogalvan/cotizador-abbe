<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class CotizadorExport implements Fromview
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $cantidad;
    public $fechaDisp;
    public $montoDisp;
    public $totalIntereses;
    public $totalPago;


    public function __construct($cantidad,$fechaDisp,$montoDisp,$totalIntereses,$totalPago)
    {
        $this->cantidad = $cantidad;
        $this->fechaDisp = $fechaDisp;
        $this->montoDisp = $montoDisp;
        $this->totalIntereses = $totalIntereses;
        $this->totalPago = $totalPago;
    }
    public function view(): View
    {
        return view('tabla', [
            'cantidad' => $this->cantidad,
            'fechaDisp' => $this->fechaDisp,
            'montoDisp' => $this->montoDisp,
            'totalIntereses' => $this->totalIntereses,
            'totalPago' => $this->totalPago
        ]);
    }
}


