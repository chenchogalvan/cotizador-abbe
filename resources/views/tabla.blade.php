<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title></title>
  </head>
  <body>





    <main class="container">
    <p style="font-size: 20px;">Estimado <strong>{{ $totales[0]->nombre }}</strong>, la presente proyección se calcula con una tasa del 19% anual fija para fines informativos. <br>La tasa de interés podrá ajustarse de acuerdo al análisis de riesgos.<br>Está información fue enviada al correo <strong>{{ $totales[0]->correo }}</strong>.</p>
    {{-- <h4>El total del credito a pagar es de ${{ round($pagoTotal) }}</h4> --}}

    <table class="table" style="margin-top:50px; width:300px;">
        <thead>
            <tr>
                <th colspan="2" scope="col">Resumen</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="">Pago {{$totales[0]->tipoPeriocidad}}</td>
                <td style="">${{ number_format(round($totales[0]->totalInteres)) }}</td>
            <tr>
            <tr>
                <td style="">Intereses totales</td>
                <td style="">${{ number_format(round($totales[0]->pagoMensual)) }}</td>
            <tr>

            <tr>
                <td style="">Costo total del credito</td>
                <td style="">${{ number_format(round($totales[0]->costoTotal)) }}</td>
            <tr>







        </tbody>
    </table>

        <table class="table" style="margin-top:50px;">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Monto restante</th>
                    <th scope="col">Pago</th>
                    <th scope="col">Capital</th>
                    <th scope="col">Interes</th>
                    <th scope="col">Saldo final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tabla as $t)
                <tr>
                    <td style="">{{ $t['fechaPago'] }}</td>
                    <td style="">${{ number_format($t['montoDisp']) }}</td>
                    <td style="">${{ number_format($t['pago']) }}</td>
                    <td style="">${{ number_format($t['capital']) }}</td>
                    <td style="">${{ number_format($t['interes']) }}</td>
                    <td style="">${{ number_format($t['saldoFinal']) }}</td>
                <tr>

                @endforeach






            </tbody>
        </table>
        {{-- <a class="btn btn-primary btn-lg btn-block" href="{{ url()->previous() }}">Regresar</a> --}}
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
