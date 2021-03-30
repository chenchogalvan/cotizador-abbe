<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Demo in Laravel 7</title>
    <style>
        #customers {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 100%;
          font-size: 11px;
        }

        #customers td, #customers th {
          border: 1px solid #ddd;
          padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
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

        @page { margin: 100px 25px; }

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
        <table id="customers" style="margin-bottom:20px; width:300px;">
            <thead>
                <tr>
                    <th colspan="2" scope="col">Resumen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="">Pago mensual</td>
                    <td style="">${{ round($totales[0]->pagoMensual) }}</td>
                </tr>
                <tr>
                    <td style="">Intereses totales</td>
                    <td style="">${{ round($totales[0]->totalInteres) }}</td>
                </tr>

                <tr>
                    <td style="">Costo total del credito</td>
                    <td style="">${{ round($totales[0]->costoTotal) }}</td>
                </tr>
            </tbody>
        </table>


        <table id="customers">
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
                    <td> ${{ $t->montoDisp }} </td>
                    <td> ${{ $t->pago }} </td>
                    <td> ${{ $t->capital }} </td>
                    <td> ${{ $t->interes }} </td>
                    <td> ${{ $t->saldoFinal }} </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </main>





  </body>
</html>
