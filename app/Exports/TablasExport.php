<?php

namespace App\Exports;

use App\Tabla;
use Maatwebsite\Excel\Concerns\FromCollection;

class TablasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tabla::all();
    }
}
