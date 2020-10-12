<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\mailCotizador;
use App\Exports\CotizadorExport;
use Maatwebsite\Excel\Facades\Excel;


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


Route::get('/agrocostos-interactivo ', function () {
    return view('fira');
})->name('fira');

Route::post('/corizador', function (Request $request) {

    setlocale(LC_MONETARY, 'es_MX');



    if ($request->get('tipoCredito') == 'corto') {
        $cantidad = $request->get('plazoCorto');
    }else{
        $cantidad = $request->get('plazoLargo');
    }





    $fechaDisp = $request->get('fechaDisp');
    $montoDisp = $request->get('montoDisp');

    $totalIntereses = 0;
    $totalPago = 0;

    // foreach ($cantidad as $cantidad) {
    //     return $cantidad.'<br>';
    // }



    //Creamos el for para la cantidad de meses
    /*for ($i=0; $i < $cantidad; $i++) {

        $fechaDisp = date("d-M-Y",strtotime($fechaDisp));

        $capital = $montoDisp / $cantidad;
        $impuesto = (($montoDisp*19.0)/360)*350;
        $pago = $montoDisp + $impuesto;
        $saldoFinal = $montoDisp - $capital;


        $tabla[] = [
            'Columna 1' => $fechaDisp,
            'Columna 2' => date("d-M-Y", strtotime($fechaDisp."+ 350 days")),
            'Columna 4' =>$montoDisp,
            'Columna 5' =>$capital,
            'Columna 6' =>$impuesto,
            'Columna 7' =>$pago,
            'Columna 8' =>$saldoFinal
        ];


        $fechaDisp = date("d-M-Y",strtotime($fechaDisp."+ 350 days"));
        $montoDisp = $saldoFinal;

        $totalIntereses = $totalIntereses + $impuesto;
        $totalPago = $totalPago + $pago;

    }*/

    // foreach ($tabla as $key => $value) {
    //     $tabla['tabla'][$key] = (object) $value;
    // }
    //return $tabla['tabla'];

    //return $tabla;
    //$tabla = json_encode($tabla);
    $excel =  Excel::download(new CotizadorExport($cantidad, $fechaDisp, $montoDisp, $totalIntereses, $totalPago), 'users.xlsx')->getFile();

    Mail::to($request->correo)->send( new mailCotizador($excel));

    //echo 'Total Intereses: '.$totalIntereses.'<br>'.'Total pago: '.$totalPago;
    //return "Hemos enviado el cotizador a tu correo electronico";
        return 'Correcto';
    //return view('tabla', compact(['cantidad'], ['fechaDisp'], ['montoDisp'], ['totalIntereses'], ['totalPago']));

})->name('corizador');
