<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\mailCotizador;
use App\Exports\TablasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Tabla;


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

Route::post('/cotizador', function (Request $request) {

    setlocale(LC_MONETARY, 'es_MX');

    if ($request->get('tipoCredito') == 'mensual') {
        $periocidad = 12;
        $intervalo = 1;
    }else if ($request->get('tipoCredito') == 'trimestral') {
        $periocidad = 4;
        $intervalo = 3;
    }else if ($request->get('tipoCredito') == 'semestral') {
        $periocidad = 2;
        $intervalo = 6;
    }else if ($request->get('tipoCredito') == 'anual') {
        $periocidad = 1;
        $intervalo = 12;
    }

    $plazo = $request->get('plazo');
    $npagos = $request->get('npagos');
    $fechaDisp = $request->get('fechaDisp');
    $fechaOrigen = $fechaDisp;
    $montoDisp = $request->get('montoDisp');
    $pagoinicial = $montoDisp;

    $totalIntereses = 0;
    $totalPago = 0;
    $cont = 0;
    $tabla;

    for ($i=0; $i < $npagos; $i++) {

        //Mostramos la fecha en el formato
        $fechaDisp = date("d-M-Y",strtotime($fechaDisp));
        //Iniciamos el contador del intervalo
        $inter = $intervalo * $cont + 1;
        //Hacemos la suma de la fecha origen + el intervalo seleccionado por el periodo de pago
        $fechaPago = date("d-M-Y",strtotime($fechaOrigen."+". $inter . "month"));


        $interes = ($montoDisp * 0.17)/$periocidad;





        //Calcular pago
        $in = 17/$periocidad;
        $C = $pagoinicial;
        $I = $in/100;
        $N = $npagos;
        $pago = $C * (pow((1+$I), $N) * $I) /  (pow((1+$I), $N) - 1);
        $pago = round($pago, 2);

        $capital = $pago - $interes;
        $capital = round($capital);
        $saldoFinal = $montoDisp - $capital;
        $saldoFinal = round($saldoFinal);

        //echo $fechaPago. " | Saldo inicial:" .$montoDisp. " | Pago: ".round($pago, 2)." | Capital:". round($capital) ." |"  ."Intereses: " . $interes . " | Saldo final:". round($saldoFinal) ."<br>";

        $tabla[] = [
            'fechaPago' => $fechaPago,
            'montoDisp' =>$montoDisp,
            'pago' =>$pago,
            'capital' =>$capital,
            'interes' =>$interes,
            'saldoFinal' =>$saldoFinal
        ];


        $t = new Tabla;
        $t->token = $request->get('_token');
        $t->fechaPago = $fechaPago;
        $t->montoDisp = $montoDisp;
        $t->pago = $pago;
        $t->capital = $capital;
        $t->interes = $interes;
        $t->saldoFinal = $saldoFinal;
        $t->save();

        $montoDisp = round($saldoFinal);
        $cont = $cont+1;
    }

    $token = $request->get('_token');
    //return Tabla::where('token', $request->get('_token'))->get();

    $excel =  Excel::download(new TablasExport($token), 'users.xlsx')->getFile();
    //$excel =  Excel::download(new CotizadorExport($tabla), 'users.xlsx')->getFile();
    $excel;


    //return view('tabla', compact('tabla', 'excel'));
    Mail::to($request->correo)->send( new mailCotizador($excel));

    //echo 'Total Intereses: '.$totalIntereses.'<br>'.'Total pago: '.$totalPago;
    return "Hemos enviado el cotizador a tu correo electronico";
    //return 'Correcto';
    //return view('tabla', compact(['cantidad'], ['fechaDisp'], ['montoDisp'], ['totalIntereses'], ['totalPago']));

})->name('cotizador');
