var contador = 0;
var rSAB = {};
var cultivosObj = {};
var zonasObj = {};
var dataObj = [];
var siapObj = {};
var estadosObj = {};
var tXHR = 0;
var rVersion = 0.50;

// device APIs are available
$(document).ready(function () {
  if (window.cordova) {
    if (window.cordova.plugins) {
      window.cordova.plugins.firebase.analytics.setUserProperty("ua", navigator.userAgent);
    }
  }
  //Variable de hace 1 mes
  var fecha = new Date();
  fecha.setMonth(fecha.getMonth() - 1);
  // Listeners Moviles
  document.addEventListener("backbutton", onBackKeyDown, false);
  //Moestrar primera pantalla
  $('#formulario').show();
  //Revisar si existe localStorage y si la fecha guardada menos un mes es mayor a hoy

  if (localStorage.getItem('dataObj') && localStorage.getItem('csv') && localStorage.getItem('fechaObj') > Date.parse(fecha)) {
    //Si existe cargar datos de localStorage
    csv = JSON.parse(localStorage.getItem('csv'));
    dataObj = JSON.parse(localStorage.getItem('dataObj'));
    console.log('InformaciÃ³n cargada de localStorage');
    $('.popup').html('Llenando datos...');
    llenaAgrocosto(csv);
  } else {
      t = new Date().getTime();
    //Si no hay informaciÃ³n o tiene mÃ¡s de un mes cargar de Ajax
    $.ajax({
      url: '/Nd/agrocosto_data_completa.csv?t='+t,
      contentType: "charset=utf-8",
      success: function (data, status, xhr) {
        $('.popup').html('Procesando datos...');
        hr = xhr.getAllResponseHeaders().split(/[\r\n]+/);
        hd = {};
        hr.forEach(function (line) {
          line.split(": ")[0] != "" ? hd[line.split(": ")[0]] = line.split(": ")[1] : line.split(": ")[0];
        });
        lDate = Date.parse(hd["last-modified"]);
        //guarda respuesta para ser usada en caso de error
        tXHR = xhr;


          localStorage.setItem('fechaObj', JSON.stringify(lDate));
          console.log('InformaciÃ³n cargada de csv interno');
          llenaAgrocosto(xhr);



      }
    });
  }
  //Cargar CSV maestro
  function llenaAgrocosto(csv) {
    $('.popup').remove();
    var data = [];
    var filteredData = [];
    var labelSet = [];
    var rows = csv.responseText.split(/[\r\n]+/g);
    headers = rows[0].split(',');
    //split each line, then save to data array
    for (i = 1; i < rows.length; i++) {
      elements = rows[i].split(',');
      data.push(elements);
    }
    //Search for unique values, will be used in labels
    for (s = 0; s < headers.length; s++) {
      filteredData = [];
      labelSet.push([]);
      for (i = 0; i < data.length; i++) {
        //Only add new elements to save memory and processing power
        if (filteredData.indexOf(data[i][s]) == -1) {
          filteredData.push(data[i][s]);
        }
      }
      //Loop the unique values
      for (i = 0; i < filteredData.length; i++) {
        //Check if it isn't empty
        if (filteredData[i] != '' && filteredData[i] != undefined) {
          //Create labelSet
          labelSet[s].push(filteredData[i]);
        }
      }
    }

    //Crear objetos para filtrar cultivo por estado y zona
    for (d = 0; d < data.length; d++) {
      if (!data[d][14]) {
        continue;
      }
      //cultivosObj CULTIVO>ESTADO

      if (!cultivosObj[data[d][14]]) {
        cultivosObj[data[d][14]] = [];
      }
      if (cultivosObj[data[d][14]].indexOf(data[d][10]) < 0) {
        cultivosObj[data[d][14]].push(data[d][10]);
      }
      //estadosObj ESTADO>Cultivo

      if (!estadosObj[data[d][10]]) {
        estadosObj[data[d][10]] = [];
      }

      if (estadosObj[data[d][10]].indexOf(data[d][14]) < 0) {
        estadosObj[data[d][10]].push(data[d][14]);
      }
      //zonasObj es de 4 dimensiones ESTADO>CULTIVO>ZONA>AÃ‘O
      //Estado
      if (!zonasObj[data[d][10]]) {
        zonasObj[data[d][10]] = {};
      }
      //Cultivo
      if (!(data[d][14] in zonasObj[data[d][10]])) {
        zonasObj[data[d][10]][data[d][14]] = [];
      }
      //Zona
      if (!zonasObj[data[d][10]][data[d][14]][data[d][12]]) {
        zonasObj[data[d][10]][data[d][14]][data[d][12]] = [];
      }
      //AÃ±o
      if (zonasObj[data[d][10]][data[d][14]][data[d][12]].indexOf(data[d][0]) < 0) {
        zonasObj[data[d][10]][data[d][14]][data[d][12]].push(data[d][0]);
      }

    }

    //Copiar a variable global
    dataObj = data;
    //Guarda valores en localStorage
    localStorage.setItem('dataObj', JSON.stringify(dataObj));
    localStorage.setItem('csv', JSON.stringify(csv));
    //Llenar Select
    llenaSelects(cultivosObj, estadosObj);

  }

  function llenaSelects(cultivos, estados) {
    $('#cultivo').html('<option value="0" disabled selected="selected">Selecciona...</option>');
    $('#zona').html('<option value="0" disabled selected="selected">Selecciona...</option>');
    $('#estado').html('<option value="0" disabled selected="selected">Selecciona...</option>');
    cArr = Object.keys(cultivos);
    cArr.sort();
    for (c = 0; c < cArr.length; c++) {
      opt = document.createElement('OPTION');
      txt = document.createTextNode(cArr[c]);
      opt.setAttribute('value', cArr[c]);
      opt.appendChild(txt);
      document.getElementById('cultivo').appendChild(opt);
    }
    eArr = Object.keys(estados);
    eArr.sort();
    for (e = 0; e < eArr.length; e++) {
      opt = document.createElement('OPTION');
      txt = document.createTextNode(eArr[e]);
      opt.setAttribute('value', eArr[e]);
      opt.appendChild(txt);
      document.getElementById('estado').appendChild(opt);
    }
  }

  function reLlenarSelect(otipo, valor) {
    otipo != 'estado' ? theObj = estadosObj : theObj = cultivosObj;
    $('#' + otipo).html('');
    $('#' + otipo).html('<option value="0" disabled selected="selected">Selecciona...</option>');
    for (i = 0; i < theObj[valor].length; i++) {
      opt = document.createElement('OPTION');
      txt = document.createTextNode(theObj[valor][i]);
      opt.setAttribute('value', theObj[valor][i]);
      opt.appendChild(txt);
      $('#' + otipo).append(opt);
    }
  }

  //Listener de Selects
  $('#cultivo').change(function (e) {
    cambio('cultivo', this.value, $(this).closest('.topSelect')[0].id);
  });

  $('#estado').change(function (e) {
    cambio('estado', this.value, $(this).closest('.topSelect')[0].id);
  });
  $('#zona').change(function (e) {
    year = llenarAnos(tipoDe.estado.value, tipoDe.cultivo.value, tipoDe.zona.value);
    llenarDatos(tipoDe.cultivo.value, tipoDe.zona.value, year);
    $('#select3').hide();
  });


  function cambio(tipo, valor, iniciador) {
    tipoDe = $('#tipoDe')[0];
    if (tipo == 'estado') {
      otipo = 'cultivo';
    } else {
      otipo = 'estado';
    }
    //Cuenta cuantos collapsed hay
    collapsed = $('#tipoDe .collapsed').length;
    //Resetea la segunda secciÃ³n en caso de cambio del primer select
    if (iniciador == 'select1' && collapsed == 2) {
      $('header .SIAP').hide();
      $('#datosSiap').removeClass('visible');
      $('#resultados').removeClass('invisible');
      $('.logoFIRA').show();
      $('.cuerpo').show();
      $('#zona').html('');
      $('.cuerpo').append($('#' + otipo.toLowerCase()).parent());
      $('#select2').removeClass('collapsed');
      $('#resultados').hide();
      $('.seccion').removeClass('collapse');
      if (valor != 0) {
        reLlenarSelect(otipo, valor);
      }
      $('#tituloCosto tr:first-child').css('text-decoration', 'none');
      $('#select3').unbind('click');
      return;
    } //Se selecciona el primer select
    //Asigna valor a contador para ver cuantos selects tienen informaciÃ³n
    tipoDe.cultivo.value == 0 || tipoDe.estado.value == 0 ? contador = 1 : contador = 2;
    //Si el contador es 1 y si hay un dato Animar el primer Select
    if (contador == 1) {
      //Si es la primera vez cambiar la DOM acorde
      if (collapsed == 0) {
        $('header .acercade').hide();
        $('header .atras').show();
        $('header h1').show();
        $('#tituloSec').html("Seleccione un " + otipo);
        $('#select1').prepend($('#' + tipo.toLowerCase()).parent());
        $('#select2').prepend($(".cuerpo"));
        $('.cuerpo img').hide();
        $('.cuerpo h1').hide();
        $('.topSelect').addClass('collapse');
        $('#select1').addClass('collapsed');
      }
      //Llena el select 2 con los datos filtrados
      reLlenarSelect(otipo, valor);
      contador = 0;
    }
    //Si hay dos valores seleccionados
    //Animar el segundo Select y mostrar resultados
    if (contador == 2) {
      //Si esta en la seccion de SIAP abierta, cerrarla
      if ($('#datosSiap').hasClass('visible')) {
        $('#SIAPLink').click();
      }
      //Si es la primera vez cambiar la DOM acorde
      if (collapsed == 1) {
        $('.logoFIRA').hide();
        $('#select2').prepend($('#' + tipo.toLowerCase()).parent());
        $('#select2').addClass('collapsed');
        $('.cuerpo').hide();
        $('#resultados').show();
        $('.seccion').addClass('collapse');
      }
      //Busca las zonas del cultivo en el estado y abre selector si hay mas de una zona
      llenarZonas(tipoDe.cultivo.value, tipoDe.estado.value);
      //Pausa el llenado si no se ha escogido zona
      if (tipoDe.zona.value == 0) {
        return
      }
      //Llenar aÃ±os
      year = llenarAnos(tipoDe.estado.value, tipoDe.cultivo.value, tipoDe.zona.value);
      //cuando ya se tiene todo
      llenarDatos(tipoDe.cultivo.value, tipoDe.zona.value, year);
    }
  }

  function llenarZonas(cultivo, estado) {
    $('#tituloCosto tr:first-child').css('text-decoration', 'none');
    $('#select3').unbind('click');
    zArr = Object.keys(zonasObj[estado][cultivo]);
    $('#zona').html('');
    if (zArr.length > 1) {
      $('#select3').show();
      $('#select3').click(function (e) {
        if (event.target !== this) {
          return;
        }
        if ($('#zona')[0].value != 0) {
          $(this).hide()
        }

      });
      $('#zona').html('<option value="0" selected disabled>Seleccione...</option>');
      $('#tituloCosto tr:first-child').css('text-decoration', 'underline').bind('click', function () {
        $('#select3').show();
      });
    }
    for (z = 0; z < zArr.length; z++) {
      opt = document.createElement('OPTION');
      txt = document.createTextNode(zArr[z]);
      opt.setAttribute('value', zArr[z]);
      opt.appendChild(txt);
      document.getElementById('zona').appendChild(opt);
    }


  }

  function llenarAnos(estado, cultivo, zona) {
    year = 0;
    if (zonasObj[estado][cultivo][zona].length > 1) {
      $("#tdAno").html('<select id="anSelect">');
      for (an = 0; an < zonasObj[estado][cultivo][zona].length; an++) {
        oAn = document.createElement('OPTION');
        oAn.setAttribute('value', zonasObj[estado][cultivo][zona][an]);
        tAn = document.createTextNode(zonasObj[estado][cultivo][zona][an]);
        oAn.appendChild(tAn);
        $('#anSelect').append(oAn);
      }
      $('#anSelect').change(function (e) {
        llenarDatos(tipoDe.cultivo.value, tipoDe.zona.value, $('#anSelect')[0].value);
      });
      //Se selecciona el valor mÃ¡s reciente
      $("#anSelect").val($("#anSelect option")[0].value);
      year = $('#anSelect option')[0].value;
    } else {
      year = zonasObj[tipoDe.estado.value][tipoDe.cultivo.value][tipoDe.zona.value][0];
      $("#tdAno").html(year);

    }
    return year;
  }

  //Listener de Accordion
  $('.accordion').click(function () {
    $(this).hasClass('active') ? $(this).removeClass('active') : $(this).addClass('active');
    $(this.nextElementSibling).hasClass('opened') ? $(this.nextElementSibling).removeClass('opened') : $(this.nextElementSibling).addClass('opened');
  });
  //BotÃ³n de atrÃ¡s resetea Clasess
  function onBackKeyDown(e) {
    e.preventDefault();
    $('#menuBtnAtras').click();

  }
  $('#menuBtnAtras').click(function () {
    if ($('#datosSiap').hasClass('visible')) {
      $('#SIAPLink').click();
      return;
    }

    contador = 0;
    $('header h1').hide();
    $('header .SIAP').hide();
    $('#datosSiap').removeClass('visible');
    $('#tituloCosto tr:first-child').css('text-decoration', 'none').unbind('click');
    $('#select3').unbind('click');
    $('#resultados').removeClass('invisible');
    $('header .atras').hide();
    $('header .acercade').show();
    $('.logoFIRA').show();
    $('.cuerpo').show();
    $('#select1').append($('.cuerpo'));
    $('.cuerpo').append($('#estado').parent());
    $('.cuerpo').append($('#cultivo').parent());
    $('.topSelect').removeClass('collapsed').removeClass('collapse');
    $('#resultados').hide();
    $('.seccion').removeClass('collapse');
    $('.cuerpo img').show();
    $('.cuerpo h1').show();
    $('#tituloSec').html('Consulta los costos<br> de producciÃ³n por:');
    $(".formGroup select").val(0);
    $('#formulario').show();
    llenaSelects(cultivosObj, zonasObj, estadosObj);
  });


  //Muestra resultados

  function llenarDatos(cultivo, zona, year) {
    //Sacar aÃ±os de cultivo y zona

    //Analytics
    if (window.cordova) {
      if (window.cordova.plugins) {
        window.cordova.plugins.firebase.analytics.logEvent('Consulta', {
          cultivo: cultivo
        });
        window.cordova.plugins.firebase.analytics.logEvent('Consulta', {
          zona: zona
        });
        window.cordova.plugins.firebase.analytics.logEvent('Consulta', {
          alto: year
        });
        window.cordova.plugins.firebase.analytics.logEvent('screen_view', {
          screen: 'Consulta'
        });
      }
    }
    if (zona == 0) {
      return
    }


    for (i = 0; i < dataObj.length; i++) {
      if (dataObj[i][14] == cultivo && dataObj[i][12] == zona && dataObj[i][0] == year) {
        //Ajustar hasta arriba por si se estaba abajo
        $('#resultados').scrollTop(0);
        //Llenar tÃ­tulos
        $("#tdZona").html(dataObj[i][12].toLowerCase().capitalize());
        $("#tdCiclo").html(dataObj[i][4].toLowerCase().capitalize());

        $("#tdPaquete").html(dataObj[i][6].toLowerCase().capitalize());
        $("#tdModalidad").html(dataObj[i][8].toLowerCase().capitalize());
        //AnÃ¡lisis Economico
        if (dataObj[i][23] < 0.1 && dataObj[i][1] == 3) {
          $("#tdRendimientoP").html('<small>En caso de cultivos Perennes Establecimiento, el Rendimiento probable NO es representativo</small>');
        } else {
          $("#tdRendimientoP").html(dataObj[i][23]);
        }

        $("#tdPrecioP").html(Number(dataObj[i][26]).formatMoney(0));
        $("#tdIngresoP").html(Number(dataObj[i][27]).formatMoney(0));
        $("#tdTotal").html(Number(dataObj[i][54]).formatMoney(0));

        $("#tdUtilidadP").html(Number(dataObj[i][55]).formatMoney(0));
        if (dataObj[i][23] < 0.1 && dataObj[i][1] == 3) {
          $("#tdCostoUnitario").html('<small>En caso de cultivos Perennes Establecimiento, el Costo Unitario NO es representativo</small>');
        } else {
          $("#tdCostoUnitario").html(Number(dataObj[i][56]).formatMoney(0));
        }
        $("#tdPEquilibrio").html(Number(dataObj[i][57]).toFixed(2));
        //ProducciÃ³n a Cubrir
        $("#tdAvio").html(Number(dataObj[i][62]).toFixed(2));
        $("#tdCostoDirecto").html(Number(dataObj[i][63]).toFixed(2));
        //Resumen del Costo
        $("#tdPTerreno").html(Number(dataObj[i][68]).formatMoney(0));
        $("#tdSiembra").html(Number(dataObj[i][74]).formatMoney(0));
        $("#tdFertiliza").html(Number(dataObj[i][80]).formatMoney(0));
        $("#tdLabores").html(Number(dataObj[i][86]).formatMoney(0));
        $("#tdriegos").html(Number(dataObj[i][92]).formatMoney(0));
        $("#tdPlagas").html(Number(dataObj[i][99]).formatMoney(0));
        $("#tdCosecha").html(Number(dataObj[i][104]).formatMoney(0));
        $("#tdComercializacion").html(Number(dataObj[i][110]).formatMoney(0));
        $("#tdDiversos").html(Number(dataObj[i][116]).formatMoney(0));
        $("#tdTotalResumen").html(Number(dataObj[i][54]).formatMoney(0));


        //Financiamiento

        //Cuota de crÃ©dito $/ha
        $("#tdCuotaMenos").html(Number(dataObj[i][46]).formatMoney(0)); //Revisar Columna
        $("#tdCuostaMas").html(Number(dataObj[i][50]).formatMoney(0)); //Revisar Columna
        //AportaciÃ³n $/ha
        $("#tdAportacionMenos").html(Number(dataObj[i][47]).formatMoney(0)); //Revisar Columna
        $("#tdAportacionMas").html(Number(dataObj[i][51]).formatMoney(0)); //Revisar Columna
        //Intereses $/ha
        $("#tdInteresMenos").html(Number(dataObj[i][48]).formatMoney(0)); //Revisar Columna
        $("#tdInteresMas").html(Number(dataObj[i][52]).formatMoney(0)); //Revisar Columna
        llenaSAB(cultivo, dataObj[i][2], dataObj[i][10]);
        processSIAP(cultivo, tipoDe.estado.value);

      }
    }

  }

  //SecciÃ³n Seguros
  $('#segurosH1').click(function () {
    setTimeout(function () {
      $('#resultados').scrollTop($('#resultados').scrollTop() + $('#riesgosSeguros h2').height())
    }, 250);
  });
  //Variable para seguros
  $('#SIAPLink').click(function () {
    if (window.cordova) {
      if (window.cordova.plugins) {
        window.cordova.plugins.firebase.analytics.logEvent('screen_view', 'SIAP');
      }
    }
    $('#datosSiap').toggleClass('visible');
    $('#resultados').toggleClass('invisible');
  });

  function llenaSAB(cultivo, ciclo, estado) {
    $('.consideraciones').html('<ul></ul>').show();
    $.ajax({
      url: "riesgosSAB.json",
      method: 'GET',
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      complete: function (data) {
        rSAB = data.responseJSON;
        if (ciclo.indexOf('PRIMAVERA') > -1) {
          ciclo = 'PV';
        }
        if (ciclo.indexOf('INVIERNO') > -1) {
          ciclo = 'OI';
        }
        $('#riesgosSeguros').html('<h2>Para ' + cultivo + ' en ' + estado + ' en ciclo ' + ciclo + ' se requiere contratar Seguro AgrÃ­cola BÃ¡sico con las siguientes coberturas: </h2>');
        $('#riesgosSeguros').append('<ul>');
        for (var i = 0; i < rSAB.length; i++) {
          if (rSAB[i].Estado == estado.toUpperCase()) {
            if (ciclo != "PERENNE") {
              $.each(rSAB[i][ciclo], function (index, value) {
                if (value) {
                  $('#riesgosSeguros ul').append('<li>' + index + '</li>');
                  var cond = '';
                  switch (index) {
                    case "Sequia":
                      cond = '<li>El Riesgo de Sequia es para cultivos de Temporal y Humedad Residual</li>';
                      break;
                    case "Falta de Piso":
                      cond = '<li>El Riesgo de Falta de Piso unicamente aplica para Granos</li>';
                      break;
                    case "Incendios":
                      cond = '<li>El Riesgo de Incendio unicamente aplica para Granos</li>';
                      break;
                    case "Exceso de Humedad  e InundaciÃ³n (Lluvias)":
                      cond = '<li>El Riesgo de Taponamiento unicamente aplica para Siembra Directa No Transplantes</li>' +
                        '<li>El Riesgo de Taponamiento aplicarÃ¡ en todos los cultivos de granos y de Riego; solicitudes que se reciban posterior a la fecha oficial de cierre de siembra (SAGARPA) este riesgo no serÃ¡ obligatorio </li>' +
                        '<li>El Riesgo de Taponamiento, imposibilidad de realizar la siembra y No Nacencia, aplicarÃ¡ a todos los cultivos de granos en en Temporal; solicitudes que se reciban posterior a la fecha oficial de cierre de siembra (SAGARPA) estos riesgos no seran obligatorios</li>';
                      break;
                    case "Vientos (Fuertes)":
                      cond = '<li>En Agricultura protegida (Invernadero) aplica solo contra Vientos Fuertes. Opcional Granizo, InundaciÃ³n y Heladas segÃºn Zona y TÃ©cnologÃ­a que maneje </li>';
                      break;
                    case "Plagas y Enfermedades":
                      cond = '<li>El Riesgo de Plagas y enfermedades sÃ³lo aplica para granos </li>';
                      break;
                  }
                  $('.consideraciones ul').append(cond);

                }
              });
            }
          }
        }
        $('.consideraciones').show();

        $('#riesgosSeguros').append('</ul>');
        if ($('#riesgosSeguros li').length == 0) {
          $('#riesgosSeguros').html('<h2 style="color:red">No existe informaciÃ³n para  ' + cultivo + ' en ' + estado + ' en ciclo ' + ciclo + '</h2>');
          $('.consideraciones').hide();
        }
        $('header .SIAP').show();
        $('header .SIAP').attr('cultivo', cultivo).attr('estado', estado).attr('ciclo', ciclo);
      }
    });
  };

  function processSIAP(cultivo, estado) {

    //SIAP
    var dataSiap = [];
    $('#datosSiap div').addClass('loader');
    $.ajax({
      url: 'Datos_SIAP_2019.csv',
      contentType: "charset=utf-8",
      success: function (data, status, xhr) {
        var filteredData = [];
        var labelSet = [];
        var rows = xhr.responseText.split(/[\r\n]+/g);
        var headers = rows[0].split(',');
        //split each line, then save to data array
        for (i = 1; i < rows.length; i++) {
          elements = rows[i].split(',');
          dataSiap.push(elements);
        }
        equivObj = '';
        $.ajax({
          url: 'equivalenciasSIAP.json',
          contentType: "charset=utf-8",
          success: function (data, status, xhr) {
            equivObj = $.parseJSON(xhr.responseText);
            siapObj = {};
            for (s = 0; s < dataSiap.length; s++) {
              if (dataSiap[s][0] == estado) {
                if (dataSiap[s][2].toUpperCase() == equivObj[cultivo].toUpperCase()) {
                  console.log(dataSiap[s][2].toUpperCase() + '--' + equivObj[cultivo])
                  if (!siapObj[dataSiap[s][3]]) {
                    siapObj[dataSiap[s][3]] = [];
                  }
                  siapObj[dataSiap[s][3]] = dataSiap[s];
                }
              }
            }
            //Para optimizar ciclos solo llena el select en esta funciÃ³n
            $('#variedadSiap').empty();
            for (v in siapObj) {
              so = document.createElement('OPTION');
              so.setAttribute('VALUE', siapObj[v][3]);
              st = document.createTextNode(siapObj[v][3].toUpperCase());
              so.appendChild(st);
              $('#datosSiap #variedadSiap').append(so);
            }
            //siapObj contiene arrays de variantes del cultivo
            $('#variedadSiap').change(function () {
              llenaSIAP(siapObj);
            })
            llenaSIAP(siapObj);
          }
        });

      }
    });
  }

  function llenaSIAP(siapObj) {

    if ($.isEmptyObject(siapObj)) {
      $('header .SIAP').hide();
      $('#datosSiap h1').html('No se encontro informaciÃ³n SIAP');
      $('#datosSiap .imagen').css('background-image', 'none');
      $('#datosSiap div').removeClass('loader');
      $('#datosSiap table').html('');
      return
    }
    siap = siapObj[$('#variedadSiap')[0].value];
    cultivo = $('#cultivo')[0].value;
    $('#datosSiap h1').html('Datos del SIAP al 2019').append('<img src="img/siap.svg" alt="SIAP" />');
    $('#datosSiap span').html(siap[0]);

    $('#datosSiap table').html('');
    imageUrl = "img/" + quitaacentos(siap[2].split(" ")[0]) + ".jpg";
    $('#datosSiap .imagen').css('background-image', 'url(' + imageUrl + ')');
    tr = document.createElement('TR');
    td = document.createElement('TD');
    txt = document.createTextNode('Superficie Sembrada (ha)');
    td.appendChild(txt);
    tr.appendChild(td);
    td = document.createElement('TD');
    txt = document.createTextNode(Number(siap[5]).formatMoney(0).substr(1));
    td.appendChild(txt);
    tr.appendChild(td);
    $('#datosSiap table').append(tr);

    tr = document.createElement('TR');
    td = document.createElement('TD');
    txt = document.createTextNode('Superficie Cosechada (ha)');
    td.appendChild(txt);
    tr.appendChild(td);
    td = document.createElement('TD');
    txt = document.createTextNode(Number(siap[6]).formatMoney(0).substr(1));
    td.appendChild(txt);
    tr.appendChild(td);
    $('#datosSiap table').append(tr);

    tr = document.createElement('TR');
    td = document.createElement('TD');
    txt = document.createTextNode('Volumen de ProducciÃ³n (ton)');
    td.appendChild(txt);
    tr.appendChild(td);
    td = document.createElement('TD');
    txt = document.createTextNode(Number(siap[8]).formatMoney(0).substr(1));
    td.appendChild(txt);
    tr.appendChild(td);
    $('#datosSiap table').append(tr);

    tr = document.createElement('TR');
    td = document.createElement('TD');
    txt = document.createTextNode('Rendimiento (ton/ha)');
    td.appendChild(txt);
    tr.appendChild(td);
    td = document.createElement('TD');
    txt = document.createTextNode(Number(siap[9]).toFixed(2));
    td.appendChild(txt);
    tr.appendChild(td);
    $('#datosSiap table').append(tr);

    tr = document.createElement('TR');
    td = document.createElement('TD');
    txt = document.createTextNode('Precio Medio Rural ($/ton)');
    td.appendChild(txt);
    tr.appendChild(td);
    td = document.createElement('TD');
    txt = document.createTextNode(Number(siap[10]).formatMoney(0));
    td.appendChild(txt);
    tr.appendChild(td);
    $('#datosSiap table').append(tr);

    tr = document.createElement('TR');
    td = document.createElement('TD');
    txt = document.createTextNode('Valor ProducciÃ³n (Miles de pesos)');
    td.appendChild(txt);
    tr.appendChild(td);
    td = document.createElement('TD');
    txt = document.createTextNode(Number(siap[11]).formatMoney(0));
    td.appendChild(txt);
    tr.appendChild(td);
    $('#datosSiap table').append(tr);

    $('#datosSiap div').removeClass('loader');

  };
  //Money Format
  Number.prototype.formatMoney = function (c, d, t) {
    var n = this,
      c = isNaN(c = Math.abs(c)) ? 2 : c,
      d = d == undefined ? "." : d,
      t = t == undefined ? "," : t,
      s = n < 0 ? "-" : "",
      i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
      j = (j = i.length) > 3 ? j % 3 : 0;
    return '$ ' + s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
  };
  String.prototype.capitalize = function () {
    return this.replace(/(?:^|\s)\S/g, function (a) {
      return a.toUpperCase();
    });
  };

  function quitaacentos(s) {
    var r = s.toLowerCase();
    r = r.replace(new RegExp(/\s/g), "");
    r = r.replace(new RegExp(/[Ã Ã¡Ã¢Ã£Ã¤Ã¥]/g), "a");
    r = r.replace(new RegExp(/[Ã¨Ã©ÃªÃ«]/g), "e");
    r = r.replace(new RegExp(/[Ã¬Ã­Ã®Ã¯]/g), "i");
    r = r.replace(new RegExp(/Ã±/g), "n");
    r = r.replace(new RegExp(/[Ã²Ã³Ã´ÃµÃ¶]/g), "o");
    r = r.replace(new RegExp(/[Ã¹ÃºÃ»Ã¼]/g), "u");

    return r;
  }
  //Service Worker
  if ('serviceWorker' in navigator) {
    window.addEventListener("load", function () {
      navigator.serviceWorker.register('sw.js').then(function (registration) {
        // SW registrado
        console.log('ServiceWorker: registrado al nivel: ', registration.scope);
        //Revisar si corre como APP, si no solicitar la instalaciÃ³n
        if (!(window.matchMedia('(display-mode: standalone)').matches) || (window.navigator.standalone == false)) {
          window.addEventListener('beforeinstallprompt', function(e) {
            // Enivar solicitud de instalaciÃ³n
            e.prompt();
            e.userChoice.then(function(choiceResult) {
              console.log(choiceResult.outcome);
            });
          });
        }
      }).catch(function (err) {
        // Error al registrar SW :(
        console.log('Error de registro de ServiceWorker: ', err);
      });
    });
  }
});
