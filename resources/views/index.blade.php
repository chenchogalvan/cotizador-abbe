<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
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
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-bottom:50px;">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://abbeco.com.mx/images/ABBE_logo_sm.jpg" alt="" width="auto"
                height="72">
            <h2>Formato de alta de credito</h2>
        </div>

        <div class="row">


            <div class="col-md-12">

                <form class="needs-validation" method="POST" action="{{ route('cotizador') }}">
                    @csrf
                    <input type="hidden" name="tokenL" value="{{ rand(0,1000000000000000) }}">

                    <div id="paso1">
                        <div class="row">
                            <h4 class="mb-3">Información del solicitante</h4>
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="firstName" placeholder=""
                                    value="" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="firstName">Correo</label>
                                <input type="text" name="correo" class="form-control" id="firstName" placeholder=""
                                    value="" required>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="firstName">Tipo de credito</label>
                            <select class="custom-select" name="tipoCredito" id="select-tipo-credito" required>
                                <option selected>Selecciona tipo de credito</option>
                                <option value="mensual">Mensual</option>
                                <option value="trimestral">Trimestral</option>
                                <option value="semestral">Semestral</option>
                                <option value="anual">Anual</option>
                            </select>

                        </div>

                        <input type="button" class="btn btn-primary btn-lg btn-block" id="btnContinuar" value="Continuar">

                    </div>

                    <div id="paso2">
                        <div class="mb-3">
                            <label for="username">Fecha de disposición</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="date" name="fechaDisp" class="form-control" id="email" placeholder="">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Monto de disposición </label>
                            <input type="number" max="12000000" name="montoDisp" class="form-control" id="email"
                                placeholder="">
                        </div>


                        <div class="row">


                            <div class="col-md-12 mb-3">
                                <label for="firstName">Plazo (años)</label>
                                {{-- <select class="custom-select" name="plazo" id="select-anual" required>
                                <option selected>Selecciona un valor</option>
                                <option value="1">1 año</option>
                                <option value="2">2 años</option>
                                <option value="3">3 años</option>
                                <option value="4">4 años</option>
                                <option value="5">5 años</option>
                            </select> --}}

                                <label for="firstName">N° Pagos</label>
                                <input type="number" max="100" name="npagos" class="form-control" placeholder="">




                                {{-- <select class="custom-select" name="plazoCorto" id="select-mensual" style="display: none;" required>
                                <option selected>Plazo mensual</option>
                                <option value="1">1 mes</option>
                                <option value="3">3 meses</option>
                                <option value="6">6 meses</option>
                                <option value="12">12 meses</option>
                            </select> --}}

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


                        <input type="button" class="btn btn-secondary btn-lg btn-block" id="btnRegresar" value="Regresar">
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Solicitar cotización</button>

                    </div>

                </form>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <script src="form-validation.js"></script>


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


        $("#btnContinuar").click(function () {
            $("#paso2").show();
            $("#paso1").hide();
        });

        $("#btnRegresar").click(function () {
            $("#paso1").show();
            $("#paso2").hide();
        });




    </script>
</body>

</html>
