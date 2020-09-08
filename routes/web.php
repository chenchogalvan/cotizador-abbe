<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::post('/corizador', function (Request $request) {

    setlocale(LC_MONETARY, 'es_MX');

    $cantidad = $request->get('plazo');
    $fechaDisp = $request->get('fechaDisp');
    $montoDisp = $request->get('montoDisp');

    $totalIntereses = 0;
    $totalPago = 0;

    // foreach ($cantidad as $cantidad) {
    //     return $cantidad.'<br>';
    // }

    //Creamos el for para la cantidad de meses
    for ($i=0; $i < $cantidad; $i++) {

        $fechaDisp = date("d-M-Y",strtotime($fechaDisp));

        $capital = $montoDisp / $request->get('plazo');
        $impuesto = (($montoDisp*19.0)/360)*350;
        $pago = $montoDisp + $impuesto;
        $saldoFinal = $montoDisp - $capital;


        echo $fechaDisp.' | '.date("d-M-Y",strtotime($fechaDisp."+ 350 days")).' | '.$montoDisp.' | '.$capital.' | '.$impuesto.' | '.$pago.' | '.$saldoFinal.'<br>';

        $fechaDisp = date("d-M-Y",strtotime($fechaDisp."+ 350 days"));
        $montoDisp = $saldoFinal;

        $totalIntereses = $totalIntereses + $impuesto;
        $totalPago = $totalPago + $pago;

    }

    echo 'Total Intereses: '.$totalIntereses.'<br>'.'Total pago: '.$totalPago;

})->name('corizador');
