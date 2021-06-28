<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <style>
        .customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
        }

        .customers td,
        .customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .customers tr:hover {
            background-color: #ddd;
        }

        .customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: white;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }

        @page {
            margin: 100px 25px;
        }

        header {
            position: fixed;
            top: -85px;
            left: 0px;
            right: 0px;

        }

        footer {
            position: fixed;
            bottom: 0px;
            left: 0px;
            right: 0px;

        }

    </style>
</head>

<body>

    <header>
        <img src="header.jpg" alt="header" style="width:100%;">
    </header>
    <footer>
        <img src="footer.jpg" alt="footer" style="width:100%;">
    </footer>

    <main>

        <p style="text-align: right;">Saltillo, Coahuila, a {{ $totales[0]->fechaSolicitud->format("d") }} de {{ $totales[0]->fechaSolicitud->format("M") }} del {{ $totales[0]->fechaSolicitud->format("Y") }}</p>

        {{-- <p>Estimado , la presente proyección se calcula con una tasa del 19%
            anual fija para fines informativos</p>
        <p>La tasa de interés podrá ajustarse de acuerdo al análisis de riesgos</p> --}}
        <p>Estimado <strong>{{ $totales[0]->nombre }}</strong> agradecemos su interés y confianza en nuestros servicios; en atención
            a su solicitud de información, nos permitimos compartir con usted la cotización requerida:</p>



        <table class="customers" style="margin-top:20px; width:300px;">
            {{-- <thead>
                <tr>
                    <th colspan="2" scope="col">Resumen</th>
                </tr>
            </thead> --}}
            <tbody>
                <tr>
                    <td style=""><b>Nombre del cliente</b></td>
                    <td style="">{{ $totales[0]->nombre }}</td>
                </tr>
                <tr>
                    <td style=""><b>Tipo de credito</b></td>
                    <td style="">{{ $totales[0]->tipoCredito }}</td>
                </tr>


            </tbody>
        </table>


        <table class="customers" style="margin-top:20px; width:300px; margin-bottom:20px;">
            {{-- <thead>
                <tr>
                    <th colspan="2" scope="col">Resumen</th>
                </tr>
            </thead> --}}
            <tbody>
                <tr>
                    <td style=""><b>Monto solicitado: </b></td>
                    <td style="">${{ number_format(round($totales[0]->montoSolicitado), 2) }}</td>
                </tr>
                <tr>
                    <td style=""><b>Periocidad de pago: </b></td>
                    <td style="">{{ $totales[0]->periocidadPago }}</td>
                </tr>

                <tr>
                    <td style=""><b>Plazo del crédito:</b></td>
                    <td style="">{{ $totales[0]->plazoCredito }} meses</td>
                </tr>

                <tr>
                    <td style=""><b>Tasa de interés:</b></td>
                    <td style="">{{ $totales[0]->tazaInteres }}%</td>
                </tr>
                <tr>
                    <td style=""><b>Pago {{ $totales[0]->periocidadPago }}:</b></td>
                    <td style="">${{ number_format($totales[0]->pagoMensual, 2) }}</td>
                </tr>
            </tbody>
        </table>

        {{-- <table class="customers" style="margin-top:20px; width:300px;">
            <thead>
                <tr>
                    <th colspan="2" scope="col">Resumen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="">Pago mensual</td>
                    <td style="">${{ number_format(round($totales[0]->pagoMensual), 2) }}</td>
                </tr>
                <tr>
                    <td style="">Intereses totales</td>
                    <td style="">${{ number_format(round($totales[0]->totalInteres), 2) }}</td>
                </tr>

                <tr>
                    <td style="">Costo total del credito</td>
                    <td style="">${{ number_format(round($totales[0]->costoTotal), 2) }}</td>
                </tr>
            </tbody>
        </table> --}}



        <table class="customers">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Monto restante</th>
                    <th>Pago</th>
                    <th>Capital</th>
                    <th>Interes</th>
                    <th>Saldo Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabla as $t)
                    <tr>
                        <td> {{ $t->fechaPago }} </td>
                        <td> ${{ number_format($t->montoDisp), 2 }} </td>
                        <td> ${{ number_format($t->pago, 2) }} </td>
                        <td> ${{ number_format($t->capital, 2) }} </td>
                        <td> ${{ number_format($t->interes, 2) }} </td>
                        <td> ${{ number_format($t->saldoFinal, 2) }} </td>
                    </tr>

                @endforeach
                <tr>
                    <td><b>Total</b></td>
                    <td>N/A</td>
                    <td>${{ number_format(round($totales[0]->costoTotal), 2) }}</td>
                    <td>${{ number_format(round($totales[0]->montoSolicitado), 2) }}</td>
                    <td>${{ number_format(round($totales[0]->totalInteres), 2) }}</td>
                    <td>N/A</td>
                </tr>
            </tbody>
        </table>


        <p>Nos es grato reiterarnos a sus órdenes, atentos a dudas o comentarios que pudieran surgir.</p>

        <p><b>NOTAS:</b></p>
        <p>
            *La presente cotización se proyecta con una tasa de interés del 19% anual fija, para fines informativos.<br>
            *La tasa de interés podrá ajustarse conforme al análisis de riesgos del proyecto, así como otras variables.<br>
            *En la cotización, no se considera la comisión por disposición (2% más I.V.A.)
        </p>


    </main>





</body>

</html>
