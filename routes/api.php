<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Mail\mailCotizador;
use App\Exports\TablasExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Tabla;
use App\Total;
use Barryvdh\DomPDF\Facade as PDF;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/prueba', function (Request $request) {

    $datos = $request->all();

    return json_encode($datos);
});


Route::group(['middleware' => ['cors']], function () {

    Route::post('/cotizador', function (Request $request) {

        setlocale(LC_MONETARY, 'es_MX');
        setlocale(LC_ALL, 'es_MX');

        $correos = $request->get('correo');
        // return $request->get('correo');


        foreach ($correos as $correo) {
            $correo;


            // return $correo;




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
                $tipoCredito = "Credito Corriente";
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
                $tipoCredito = "Credito Simple";
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
            $totalCapital = 0;
            $cont = 0;
            $tabla;
            $tazaInteres = 19;

            $fechaDisp = date("d-M-Y",strtotime($fechaDisp."+ 1 year"));

            //Maximo de 60 minimo de 12- Opciones de plazo: multiplos de 12 de 12 hasta 60
            for ($i=0; $i < $npagos; $i++) {

                //Mostramos la fecha en el formato
                $fechaDisp = date("d-M-Y",strtotime($fechaDisp));
                //Iniciamos el contador del intervalo
                $inter = $intervalo * $cont + 1;
                //Hacemos la suma de la fecha origen + el intervalo seleccionado por el periodo de pago
                $fechaPago = date("d-M-Y",strtotime($fechaDisp."+". $inter . "month"));


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
                $t->correo = $correo;
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
                $totalCapital = $totalCapital + $capital;
            }

            $pagoTotal = $pago * $npagos;

            $token = $request->get('tokenL');
            //return Tabla::where('token', $request->get('tokenL'))->get();

            // $excel =  Excel::download(new TablasExport($token), 'users.xlsx')->getFile();
            //$excel =  Excel::download(new CotizadorExport($tabla), 'users.xlsx')->getFile();
            // $excel;


            // Mail::to($request->correo)->send( new mailCotizador($excel));

            //fecha actual
            $fechaHoy = Carbon\Carbon::now();


            $to = new Total;
            $to->token = $request->get('tokenL');
            $to->nombre = $request->get('nombre');
            $to->correo = $correo;
            $to->totalInteres = $totalIntereses;
            $to->pagoMensual = $pago;
            $to->costoTotal = $pagoTotal;
            $to->tipoPeriocidad = $tipoPeriocidad;
            $to->totalCapital = $totalCapital;
            $to->montoSolicitado = $request->get('montoDisp');
            $to->periocidadPago = $request->get('periocidadPago');
            $to->plazoCredito = $request->get('npagos');
            $to->tazaInteres = $tazaInteres;
            $to->tipoCredito = $tipoCredito;
            $to->fechaSolicitud = $fechaHoy;

            $to->save();


            $tabla = Tabla::where('token', $token)->where('correo', $correo)->get();
            $totales = Total::where('token', $token)->where('correo', $correo)->get();



            $pdf = PDF::loadView('pdf', compact('tabla', 'totales', 'tipoPeriocidad'));





            $data["email"] = $correo;;
            $data["subject"] = "Abbe Agronegocios - Cotización";
            $data["token"] = $request->get('tokenL');


            //return $data;
            Mail::send('mail', $data, function($message)use($data,$pdf) {
                $message->to($data["email"], $data["email"])
                ->subject($data["subject"])
                ->attachData($pdf->output(), $data["token"]."-cotizacion.pdf");
                });


            // return 'Intereses: '.$totalIntereses.' | Pago Mensual:'. $pago .' | Costo total del credito: '.$pagoTotal;

            // return view('tabla', compact('tabla', /*'excel',*/ 'pagoTotal', 'totales', 'tipoPeriocidad'));

            //Regresar pagoTotal, tipoPeriocidad,


            //echo 'Total Intereses: '.$totalIntereses.'<br>'.'Total pago: '.$totalPago;
            //return "Hemos enviado el cotizador a tu correo electronico";
            //return 'Correcto';
            //return view('tabla', compact(['cantidad'], ['fechaDisp'], ['montoDisp'], ['totalIntereses'], ['totalPago']));

        }

        $datos = ['Token' => $token, 'Correo' => $correo];

        return $datos;

    })->name('cotizador');

    Route::post('/cotizadorPerso', 'CotizadorController@cotizadorPerso');


});






