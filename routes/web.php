<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Mail\mailCotizador;
use App\Exports\TablasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Tabla;
use App\Total;
use Barryvdh\DomPDF\Facade as PDF;



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

    // return $request->all();

    if ($request->get('periocidadPago') == 'mensual') {
        $periocidad = 12;
        $intervalo = 1;
        $tipoPeriocidad = "Mensual";
    }else if ($request->get('periocidadPago') == 'trimestral') {
        $periocidad = 4;
        $intervalo = 3;
        $tipoPeriocidad = "Trimestral";
    }else if ($request->get('periocidadPago') == 'semestral') {
        $periocidad = 2;
        $intervalo = 6;
        $tipoPeriocidad = "Semestral";
    }else if ($request->get('periocidadPago') == 'anual') {
        $periocidad = 1;
        $intervalo = 12;
        $tipoPeriocidad = "Anual";
    }

    if ($request->get('tipoCredito') == 'creditoCorriente') {
        if ($request->get('periocidadPago') == 'mensual') {
            $npagos = '12';
            $tipoPeriocidad = "Mensual";
        }else if ($request->get('periocidadPago') == 'trimestral') {
            $npagos = '4';
            $tipoPeriocidad = "Trimestral";
        }else if ($request->get('periocidadPago') == 'semestral') {
            $npagos = '2';
            $tipoPeriocidad = "Semestral";
        }else if ($request->get('periocidadPago') == 'anual') {
            $npagos = '1';
            $tipoPeriocidad = "Anual";
        }
        // $periocidad = 12;
        // $intervalo = 1;
        // return $npagos . '  |   '. $periocidad.' | '. $intervalo;
    }else if($request->get('tipoCredito') == 'creditoSimple'){
        $npagos = $request->get('npagos');
        $npagos = $npagos / $intervalo;
        // return $npagos;
        // return $npagos . '  |   '. $periocidad.' | '. $intervalo;
    }


    $plazo = $request->get('plazo');
    // $npagos = $request->get('npagos');
    $fechaDisp = $request->get('fechaDisp');
    $fechaOrigen = $fechaDisp;
    $montoDisp = $request->get('montoDisp');
    $pagoinicial = $montoDisp;

    $totalIntereses = 0;
    $totalPago = 0;
    $cont = 0;
    $tabla;



    //Maximo de 60 minimo de 12- Opciones de plazo: multiplos de 12 de 12 hasta 60
    for ($i=0; $i < $npagos; $i++) {

        //Mostramos la fecha en el formato
        $fechaDisp = date("d-M-Y",strtotime($fechaDisp));
        //Iniciamos el contador del intervalo
        $inter = $intervalo * $cont + 1;
        //Hacemos la suma de la fecha origen + el intervalo seleccionado por el periodo de pago
        $fechaPago = date("d-M-Y",strtotime($fechaOrigen."+". $inter . "month"));


        $interes = ($montoDisp * 0.19)/$periocidad;





        //Calcular pago
        // $in = 17/$periocidad;
        $in = 19/$periocidad;
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
        $t->token = $request->get('tokenL');
        $t->fechaPago = $fechaPago;
        $t->montoDisp = $montoDisp;
        $t->pago = $pago;
        $t->capital = $capital;
        $t->interes = $interes;
        $t->saldoFinal = $saldoFinal;
        $t->save();

        $montoDisp = round($saldoFinal);
        $cont = $cont+1;

        $totalIntereses = $totalIntereses + $interes;
    }

    $pagoTotal = $pago * $npagos;

    $token = $request->get('tokenL');
    //return Tabla::where('token', $request->get('tokenL'))->get();

    // $excel =  Excel::download(new TablasExport($token), 'users.xlsx')->getFile();
    //$excel =  Excel::download(new CotizadorExport($tabla), 'users.xlsx')->getFile();
    // $excel;


    // Mail::to($request->correo)->send( new mailCotizador($excel));

    $to = new Total;
    $to->token = $request->get('tokenL');
    $to->nombre = $request->get('nombre');
    $to->correo = $request->get('correo');
    $to->totalInteres = $totalIntereses;
    $to->pagoMensual = $pago;
    $to->costoTotal = $pagoTotal;
    $to->save();


    $tabla = Tabla::where('token', $token)->get();
    $totales = Total::where('token', $token)->get();


    // view()->share('tabla', $tabla);

    $pdf = PDF::loadView('pdf', compact('tabla', 'totales', 'tipoPeriocidad'));



    // return $pdf->download('archivo.pdf');
    // return $pdf->download('archivo.pdf');

    // Mail::to($request->correo)->send( new mailCotizador($excel));




    $data["email"] = $request->correo;
    $data["subject"] = "Abbe Agronegocios - Cotización";
    $data["token"] = $request->get('tokenL');


    //return $data;
    Mail::send('mail', $data, function($message)use($data,$pdf) {
        $message->to($data["email"], $data["email"])
        ->subject($data["subject"])
        ->attachData($pdf->output(), $data["token"]."-cotizacion.pdf");
        });


    // return 'Intereses: '.$totalIntereses.' | Pago Mensual:'. $pago .' | Costo total del credito: '.$pagoTotal;

    return view('tabla', compact('tabla', /*'excel',*/ 'pagoTotal', 'totales', 'tipoPeriocidad'));

    //echo 'Total Intereses: '.$totalIntereses.'<br>'.'Total pago: '.$totalPago;
    //return "Hemos enviado el cotizador a tu correo electronico";
    //return 'Correcto';
    //return view('tabla', compact(['cantidad'], ['fechaDisp'], ['montoDisp'], ['totalIntereses'], ['totalPago']));

})->name('cotizador');


