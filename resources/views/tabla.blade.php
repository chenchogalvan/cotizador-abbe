<table class="table">
    <thead>
        <tr>
            <th scope="col">Fecha</th>
            <th scope="col">Fecha</th>
            <th scope="col">Monto restante</th>
            <th scope="col">Capital</th>
            <th scope="col">Impuesto</th>
            <th scope="col">Cantidad a pagar</th>
            <th scope="col">Saldo final</th>
        </tr>
    </thead>
    <tbody>
        @for ($i = 0; $i < $cantidad; $i++) @php $fechaDisp=date("d-M-Y",strtotime($fechaDisp)); $capital=$montoDisp /
            $cantidad; $impuesto=(($montoDisp*19.0)/360)*350; $pago=$montoDisp + $impuesto; $saldoFinal=$montoDisp -
            $capital; @endphp <tr>
            <td>{{ $fechaDisp }} </td>
            <td>{{ date("d-M-Y", strtotime($fechaDisp."+ 350 days")) }} </td>
            <td>{{ $montoDisp }} </td>
            <td>{{ $capital }} </td>
            <td>{{ $impuesto }} </td>
            <td>{{ $pago }} </td>
            <td>{{ $saldoFinal }} </td>
            </tr>

            @php
            $fechaDisp = date("d-M-Y",strtotime($fechaDisp."+ 350 days"));
            $montoDisp = $saldoFinal;

            $totalIntereses = $totalIntereses + $impuesto;
            $totalPago = $totalPago + $pago;
            @endphp

            @endfor



    </tbody>
</table>
