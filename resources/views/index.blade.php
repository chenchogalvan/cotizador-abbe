<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <link rel="stylesheet" href="/css-email/lib/email.css" type="text/css">
    {{-- <link rel="stylesheet" href="/css-email/examples.css" type="text/css"> --}}

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">



    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container" style="margin-bottom:50px;">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://abbeweb.clustermx.com/img/logo.png" alt="" width="auto"
                height="72">
            <h2>Formato de alta de credito. El % de interes se calcula con el 19%.</h2>
        </div>

        <div class="row">


            <div class="col-md-12">

                {{-- <form class="needs-validation" method="POST" name="Form" action="{{ route('cotizador') }}"> --}}
                    @csrf
                    <input type="hidden" name="tokenL" id="tokenL" value="{{ rand(0,1000000000000000) }}">

                    <div id="paso1">
                        <div class="row">
                            <h4 class="mb-3">Información del solicitante</h4>
                            <div class="col-md-12 mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="correo">Correo <small>puedes seleccionar diferentes correos electronicos separados por coma</small></label>
                                {{-- <input type="text" name="correo" class="form-control" id="correo" placeholder=""> --}}
                                <div id="emails-input"></div>

                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="TipoCredito">Tipo de crédito</label>
                        </div>
                        <div class="my-3">
                            <div class="form-check">
                                <input id="creditoCorriente" value="creditoCorriente" name="tipoCredito" type="radio" class="form-check-input">
                                <label class="form-check-label" for="creditoCorriente">Crédito Cuenta corriente (Capital de
                                    trabajo)</label>
                            </div>
                            <div class="form-check">
                                <input id="creditoSimple" value="creditoSimple" name="tipoCredito" type="radio" class="form-check-input">
                                <label class="form-check-label" for="creditoSimple">Credito Simple (Compra de
                                    maquinaria, equipo e infraestrcutrua)</label>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="periocidad">Periodicidad de pago </label>
                            <select class="form-select" name="periocidadPago" id="periocidadPago">
                                <option value="mensual">Mensual</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="semestral">Semestral</option>
                                <option value="anual">Anual</option>
                            </select>

                        </div>

                        <input type="button" class="btn btn-primary btn-lg" id="btnContinuar" value="Continuar">

                    </div>

                    <div id="paso2">
                        <div class="mb-3">
                            <label for="fechaDisp">Fecha de disposición</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="date" name="fechaDisp" class="form-control" id="fechaDisp" placeholder="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="montoDisp">Monto de disposición </label>
                            <input type="number" max="12000000" name="montoDisp" class="form-control" id="montoDisp"
                                placeholder="">
                        </div>


                        <div class="row">


                            <div class="col-md-12 mb-3">


                                <label for="firstName">Plazo del crédito (Meses)</label>
                                <select name="npagos" id="npagos" class="form-select">
                                    <option value="12">12 Meses</option>
                                    <option value="24">24 Meses</option>
                                    <option value="36">36 Meses</option>
                                    <option value="48">48 Meses</option>
                                    <option value="60">60 Meses</option>
                                </select>

                            </div>
                        </div>




                        <!--<div class="row">

                        <h4 class="mb-3">Resultado del cotizador</h4>


                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pago</th>
                                    <th scope="col">Inicio</th>
                                    <th scope="col">Vence</th>
                                    <th scope="col">Saldo inicial</th>
                                    <th scope="col">Capital</th>
                                    <th scope="col">Interés</th>
                                    <th scope="col">Refinac.</th>
                                    <th scope="col">I.V.A.</th>
                                    <th scope="col">Pago</th>
                                    <th scope="col">Saldo final</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <th>26-jun-20</th>
                                    <td>11-jun21</td>
                                    <td>7,000,000</td>
                                    <td> $1,000,000.00 </td>
                                    <td>1,293,055.56</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>2,293,055.56</td>
                                    <td>6,000,000.00</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>



                    </div>-->


                        <input type="button" class="btn btn-secondary btn-lg btn-block" id="btnRegresar"
                            value="Regresar">
                        <button class="btn btn-primary btn-lg btn-block" id="Solicitar" type="submit">Solicitar cotización</button>
                        <img src="spinner.gif" id="spinner" style="width:auto; height:50px" alt="">

                    </div>

                {{-- </form> --}}
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div id="salida"></div>
            </div>
        </div>

    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script src="/js-email/lib/utils.js"></script>
<script src="/js-email/lib/emails-input.js"></script>
<script src="/js-email/app.js"></script>



    <script>
        $('#select-tipo-credito').on('change', function(){
            if($('#select-tipo-credito').val() == 'corto'){
                console.log('corto pago')
                $('#select-anual').css('display', 'none');
                $('#select-mensual').css('display', 'block');

            }else if ($('#select-tipo-credito').val() == 'largo'){
                console.log('largo pago')
                $('#select-anual').css('display', 'block');
                $('#select-mensual').css('display', 'none');
            }
        })


        $( "#paso2" ).hide();
        $( "#spinner" ).hide();


        $("#btnContinuar").click(function () {
            $("#paso2").show();
            $("#paso1").hide();
        });

        $("#btnRegresar").click(function () {
            $("#paso1").show();
            $("#paso2").hide();
        });


        $('input:radio[name="tipoCredito"]').change(
            function(){
            if (this.checked && this.value == 'creditoSimple') {
                console.log("Simple")
                $('#npagos').prop('disabled', false);
                // $('#select-tipo-credito').prop('disabled', false);

                npagos = $( "#npagos option:selected" ).text();
                tipoCredito = $( "#select-tipo-credito option:selected" ).text();
                console.log(npagos+ ' | ' + tipoCredito)


            }
            if(this.checked && this.value == 'creditoCorriente'){
                console.log("Corriente")
                $("#npagos").prop("selectedIndex", 0);
                // $("#select-tipo-credito").prop("selectedIndex", 0);

                $('#npagos').prop('disabled', true);
                // $('#select-tipo-credito').prop('disabled', true);

                npagos = $( "#npagos option:selected" ).text();
                tipoCredito = $( "#select-tipo-credito option:selected" ).text();
                console.log(npagos+ ' | ' + tipoCredito)


            }
        });

        document.getElementById('fechaDisp').valueAsDate = new Date();





    $('form').submit(function(){
        var a = $("#nombre").val();
        var b = $("#correo").val();
        var d = $("#montoDisp").val();
        var e = $("input[name='tipoCredito']:checked").val();
        if (a == "" || b == "" || d == "" || e == null) {
            alert("Revisa que todos los campos no esten vacios");
            console.log("Valor: "+a)
            console.log("Valor: "+b)
            console.log("Valor: "+d)
            console.log("Valor: "+e)
            return false;
        }else{
            $("#Solicitar").prop('disabled', true);
            $("#btnRegresar").prop('disabled', true);
            $( "#spinner" ).show();
        }


    });



    //TODO
    //Agregar el % de manera informativa
    //Cambiar de manera automatica el npagos dependiendo del tipo de credito




    //AJAX

    $('#Solicitar').click(regresar);

    var action = "{{ env("APP_URL") }}"

    function regresar() {

        $("#Solicitar").prop('disabled', true);
        $("#btnRegresar").prop('disabled', true);
        $( "#spinner" ).show();

        const emails = emailsInput.getValue()

        $.ajax({

            url: action+'/api/cotizador',
            // url: 'https://abbeco.webitmx.com/api/cotizador',
            type:'post',
            dataType: 'json',
            data:{
                tokenL: $('#tokenL').val(),
                nombre: $('#nombre').val(),
                correo: emails,
                tipoCredito: $("input[name='tipoCredito']:checked").val(),
                periocidadPago: $("#periocidadPago").val(),
                fechaDisp: $('#fechaDisp').val(),
                montoDisp: $('#montoDisp').val(),
                npagos: $("#npagos").val(),
                _token: $("input[name='_token']").val(),
                intervalo: ""


            }

        }).done(
            function (data) {

                $('#salida').append(data);
                console.log(data.Correo);
                console.log('hola');


                location.href = action+"/cotizador-vista?token="+data.Token+"&correo="+data.Correo;
                $("#Solicitar").prop('disabled', false);
                $("#btnRegresar").prop('disabled', false);
                $( "#spinner" ).hide();

            }
        ).fail(
            function (jqXHR, textStatus) {
                $("#Solicitar").prop('disabled', false);
                $("#btnRegresar").prop('disabled', false);
                $( "#spinner" ).hide();
            }
        );
    }



    </script>
</body>

</html>
