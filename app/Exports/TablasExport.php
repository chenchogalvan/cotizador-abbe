<?php

namespace App\Exports;

use App\Tabla;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TablasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $token;


    public function __construct($token)
    {

        $this->token = $token;
    }

    public function collection()
    {
        return Tabla::where('token', $this->token)->get();
    }


    public function headings(): array
    {
        return [
            'Fecha de pago',
            'Saldo Inicial',
            'Pago',
            'Capital',
            'Intereses',
            'Saldo Final'
        ];
    }
}
