<!DOCTYPE html>
<html lang="es">
<head>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
	<meta name="keywords" content="costos, superficies, pwa, cultivos, granos, hortalizas, estados, siap"/>
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@fira_mexico" />
	<meta name="twitter:creator" content="@fira_mexico" />
	<meta property="og:title" content="Agrocostos Interactivo FIRA" />
	<meta property="og:description" content="El sistema de Agrocostos es una herramienta que permite estimar de manera paramétrica costos de producción agrícola en una zona o región determinada bajo una tecnología de producción específica." />
	<meta property="og:image" content="https://www.fira.gob.mx/Nd/img/og-appAgrocostos.jpg" />

    	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="language" content="es"/>
<meta name="robots" content="index,follow"/>

<link rel="stylesheet" href="https://www.fira.gob.mx/Nd/css/bootstrap.min.css" />
{{-- <link rel="stylesheet" href="https://www.fira.gob.mx/Nd/css/portal.css" /> --}}
<link rel="stylesheet" href="/portal.css" />
<link rel="stylesheet" href="https://www.fira.gob.mx/Nd/css/styles.css" />
<link href="https://www.fira.gob.mx/Nd/img/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
<link href="https://www.fira.gob.mx/Nd/img/favicon-32x32.png" rel="icon" sizes="32x32" type="image/png">
<link href="https://www.fira.gob.mx/Nd/img/favicon-16x16.png" rel="icon" sizes="16x16" type="image/png">
<link href="https://www.fira.gob.mx/Nd/img/favicon.ico" rel="shortcut icon">
<link href="/site.webmanifest" rel="manifest">
<link color="#003170" href="https://www.fira.gob.mx/Nd/img/safari-pinned-tab.svg" rel="mask-icon">
<meta content="#003170" name="msapplication-TileColor">
<meta content="https://www.fira.gob.mx/Nd/xml/browserconfig.xml" name="msapplication-config">
<meta content="#ffffff" name="theme-color">


	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://www.fira.gob.mx/Nd/Scripts/bootstrap.min.js"></script>
	<script src="/Nd/carga_xml.js"></script>
	<script>
		document.write('<style id="antiClickjack">body{display:none !important;}</style>');

		if (self === top) {
			var antiClickjack = document.getElementById("antiClickjack");
			antiClickjack.parentNode.removeChild(antiClickjack);
		} else {
			top.location = self.location;
		}
	</script>

   <title>Portal FIRA - Agocostos Interactivo</title>
   <style>
      .texto_cont .cuerpo img {
         max-width: 20%;
      }

      #formulario.collapse,
      #formulario .collapse,
      #formulario .collapsed,
      #resultados.collapse {
         display: block !important;
         visibility: visible !important;

      }

      #formulario h2 {
         clear: both;
      }

      #resultados {
         display: none;
      }

      #resultados h1 {
         font-size: 1.4em;
         color: #0d72b4;
      }

      table {
         width: 100%;
      }

      select {
         width: 100%;
      }

      #tituloSec br {
         display: none;
      }

      #riesgosSeguros li {
         list-style: none;
         padding: 1em;
         font-weight: 700;
         margin: 5px;
         float: left;
         width: 22%;
         text-align: center;
         height: 8em;
         color: #FFF;
         background-color: #3f789d;
      }

      #riesgosSeguros li:hover {
         background-color: #FFF;
         color: #3f789d;
         border: solid 1px #3f789d;
      }

      .consideraciones {
         clear: both;
         padding-top: 1em;
      }

      .atras {
         display: none;
      }

      #menuBtnAtras {
         width: 100%;
         padding: 0.5em;
         background-color: #d7d7d7;
      }

      #variedadSiap {
         width: 70%;
         margin-right: 1em;
         float: left;
      }

      #datosSiap img {
         max-width: 1em;
      }

      .popup {
         text-align: center;
      }

      #datosSiap p span {
         line-height: 2.5em;
      }

      div#select1.collapsed,
      div#select2.collapsed {
         background-color: #003170;
         width: 50%;
         float: left;
         padding: 1em;
         color: #fff;
      }

      div#select2.collapsed {
         background-color: #0d72b4;
      }

      div#select1.collapsed select,
      div#select2.collapsed select {
         border: none;
         margin: 0;
         padding-bottom: 4px;
         background: 0 0;
         text-align: left;
         color: inherit;
         width: 100%;
         display: block;
         font-weight: 600;
         -webkit-appearance: none;
         -moz-appearance: none;
         -ms-appearance: none;
         -o-appearance: none;
         appearance: none;
      }

      div#select3 div#zonaSel {
         margin: 0 auto;
         width: 40%;
         margin-top: 40vh;
         padding: 1em;
         overflow: hidden;
         background-color: #aacd4c;
         color: #000;
      }

      div#select3 {
         position: fixed;
         height: 100vh;
         width: 100vw;
         background-color: #FFF;
         background-color: rgba(255, 255, 255, 0.8);
         top: 0;
         left: 0;
         z-index: 3;
         padding: 2em;
      }

      div#select3 select {
         border: 1px solid #003170;
      }

      #instalaApp {
         z-index: 9;
         display: none;
         position: fixed;
         top: calc(50vh - 225px);
         height: 450px;
         width: 450px;
         left: calc(50% - 225px);
         background-color: #FFF;
         padding: 1.5em;
         box-shadow: #333 2px 2px 5px;
      }

      #instalaApp .cerrar {
         position: absolute;
         top: 0.5em;
         right: 0.5em;
         font-size: 1.5em;
         cursor: pointer;
      }

      #instalaApp .movil {
         display: none;
      }

      @media screen and (max-width: 550px) {
         div#select3 {}

         div#select3 p {
            font-weight: bolder;
         }

         #instalaApp {
            bottom: 0;
            height: 50px;
            width: 100%;
            padding: 0.3em 2em 0.3em 0.5em;
            font-size: 0.8em;
            left: 0;
            top: unset;
         }

         #instalaApp .cerrar {
            top: 0;
         }

         #instalaApp img {
            width: 10% !important;
            height: auto !important;
            float: left;
         }

         #instalaApp h2 {
            float: right;
            font-size: 1.2em !important;
            margin: 0;
            clear: both;
         }

         #instalaApp p {
            clear: right;
            float: right;
            margin: 0;
         }

         #instalaApp .movil {
            display: inline-block;
            float: right;
            max-width: 85%;
         }

         #instalaApp .escritorio {
            display: none;
         }
      }
   </style>
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3379651-1"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag() { dataLayer.push(arguments); }
      gtag('js', new Date());

      gtag('config', 'UA-3379651-1');
   </script>
</head>

<body>
   <div id="fb-root">
</div>
<script>
  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0]
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v6.0&appId=148294472341560&autoLogAppEvents=1";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Twiiter Scripts
  window.twttr = (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
      t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);
    t._e = [];
    t.ready = function (f) {
      t._e.push(f);
    };
    return t;
  }(document, "script", "twitter-wjs"));
</script>
<!--[if lt IE 9]>
    <script src="bower_components/html5shiv/dist/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<!-- Formulario para documentos -->
<form name="formTemas" id="IDformTemas" action="/InfEspDtoXML/TemasUsuario.jsp" method="post" accept-charset="iso-8859-1">
  <input type="hidden" name="NumPag" id="IDNumPag" />
  <input type="hidden" name="getIdCarpDoc" id="IDgetIdCarpDoc" />
  <input type="hidden" name="getNombre_Arc_Doc" id="IDgetNombre_Arc_Doc" />
  <input type="hidden" name="Aplicacion" id="IDIdAplicacion" />
  <input type="hidden" name="IdPadre" id="IDgetIdSeguimientoPadre" />
  <input type="hidden" name="key" id="key" value="38988CC6D42723FBF48C19352FB8F66A6B3437EED9B1C102F6DF420A68932C39" />
</form>
<!--Fin de formulario -->
<!-- Navegacion TOP-->
<div id="layerMenu" role="navigation">
  <nav class="navbar navbar-default" style="margin-bottom:0px;border-color:transparent;border-radius:0px;">
    <div class="container">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
          <a href="/Nd/index.jsp"> <img src="/Nd/img/Logo175x70azul-osc.png" height="70" alt="logo FIRA" /></a>
        </div>
        <div class="col-md-4" id="sitiosTop" role="menu">
          <ul class="nav navbar-nav" role="presentation">
            <li role="presentation"> <a href="/Nd/purepecha.jsp" role="menuitem">P'urh&eacute;pecha</a></li>
            <li role="presentation"> <a href="/Nd/IndiceEn.jsp" role="menuitem">English</a></li>
            <li role="presentation"> <a href="/Nd/MapaSitio.jsp" role="menuitem">Mapa de Sitio </a></li>
            <li role="presentation"> <a href="/CreditAsistantXML/RegistraComentario.jsp?ID_Buz=2" role="menuitem">Cont&aacute;ctenos </a></li>
            <li role="presentation"> <a href="/Nd/Art7_oic.jsp" target="_parent" role="menuitem">O I C</a></li>
            <li role="presentation"> <a href="#" data-toggle="collapse" data-target="#BuscadorGoog" title="Buscador google" aria-label="Buscador google" role="menuitem"><i
                  class="glyphicon glyphicon-search"></i>
                <p class='sr-only'>Buscar...</p>
              </a></li>
          </ul>
          <div id="BuscadorGoog" class="collapse" role="search">
            <div class="input-group">
              <div class="gcse-search"></div>
              <script>
                // Deshabilita la busqueda con parametro
                if (location.href.search('q=') == -1) {
                  (function () {
                    var cx = '011121167039566433518:_9mxl82wuby';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                  })();
                }
              </script>
            </div>
          </div>
          <div class="gcse-searchresults-only"></div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Barra secundaria con ligas -->
  <nav class="navbar navbar-default" style="background-color:#4479A2;border:0;">
    <div class="container">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
          <span class="sr-only">Men&uacute;</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <!--
                <a class="navbar-brand visible-xs" href="#" style="color:#FFF"></a>
                -->
      </div>
      <div class="collapse navbar-collapse js-navbar-collapse">
        <ul class="nav navbar-nav" role="menubar">
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menuitem">Acerca de Nosotros <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
            <ul class="dropdown-menu mega-dropdown-menu row" role="menubar">
              <li class="col-sm-4" role="presentation">
                <ul role="menu">
                  <li><strong class="dropdown-header">Qui&eacute;nes Somos</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/AcercadeNosotros.jsp">&iquest;Qui&eacute;nes Somos?</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/Directorio.jsp">Directorio Principal</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/VisionMisionValores.jsp">Misi&oacute;n - Visi&oacute;n - Valores</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/EstatutoOrganico.pdf" target="_blank">Estatuto Org&aacute;nico</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/LineasYAccionesEstrat.jsp">Programa Institucional 2020 - 2024</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/INFORME_DE_RENDICION_DE_CUENTAS_2012-2018.pdf" target="_blank">Informe de
                      rendici&oacute;n de cuentas 2012-2018</a></li>
                </ul>
              </li>
              <li class="col-sm-4">
                <ul role="menu">
                  <li><strong class="dropdown-header">Nuestra Instituci&oacute;n</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/ComiteEtica.jsp">Comit&eacute; de &Eacute;tica</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/igualdad.jsp">Igualdad de G&eacute;nero</a></li>
                  <li role="menuitem">
                    <a href="javascript:void[0]"
                      onclick="document.getElementById('IDIdAplicacion').value='7'; document.getElementById('IDgetIdSeguimientoPadre').value='0'; document.getElementById('IDNumPag').value=0; document.getElementById('IDgetNombre_Arc_Doc').value='Presentaciones Institucionales' ; document.getElementById('IDgetIdCarpDoc').value='7'; document.getElementById('IDformTemas').submit(); return true">
                      Presentaciones Institucionales</a>
                  </li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/normativaInterna.jsp">Normatividad Interna</a></li>
                  <!--ESTA LIGA SE INCLUYE EN EL SITIO COMIT&Eacute; DE &Eacute;TICA
                        <li><a href="/Nd/2015_Informe_ajustes.pdf" target="_blank">Informe anual de actividades del Comit&eacute; de &Eacute;tica</a></li>-->
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/VacantesUserDtoXML/Requisitos.jsp">Oportunidades de Empleo</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/RelaBienes.jsp" target="_self">Relaci&oacute;n de Bienes Muebles e Inmuebles</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/RegistroIF.jsp">Registro IF</a></li>
                </ul>
              </li>
              <li class="col-sm-4">
                <ul role="menu">
                  <li><strong class="dropdown-header">Adquisiciones</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/Invitac_%20fortalecimiento_Archivos.pdf" target="_blank">Invitaci&oacute;n y
                      conformidad de adhesi&oacute;n al Proyecto para el fortalecimiento de
                      Archivos</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/AdquisicionesObraPublica.jsp" target="_self">Adquisiciones y Obra P&uacute;blica</a>
                  </li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="javascript:void[0]" onclick="document.getElementById('IDIdAplicacion').value='65';
                           document.getElementById('IDgetIdSeguimientoPadre').value='0';
                           document.getElementById('IDNumPag').value=0;
                           document.getElementById('IDgetNombre_Arc_Doc').value='Seguimiento de Gastos de OperaciÃÂ³n de FIRA';
                           document.getElementById('IDgetIdCarpDoc').value='65';
                           document.getElementById('IDformTemas').submit(); return true">
                      Medidas de Austeridad</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menuitem">Cr&eacute;ditos, Garant&iacute;as y Apoyos <span
                class="glyphicon glyphicon-chevron-down pull-right"></span></a>
            <ul class="dropdown-menu mega-dropdown-menu row">
              <li class="col-sm-3">
                <ul role="menu">
                  <li><strong class="dropdown-header">Cr&eacute;dito y Garant&iacute;a</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/FondeoFira.jsp">Cr&eacute;dito FIRA</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/GarantiaFira.jsp">Garant&iacute;a FIRA</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/ApoyosPDFRedirect.jsp">Monto disponible para otorgamiento de apoyos con recursos FIRA para el ejercicio 2021</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/ConsultaCfdi/index.jsp">Consulta de CFDI de apoyos otorgados</a></li>
                </ul>
              </li>
              <li class="col-sm-3">
                <ul role="menu">
                  <li><strong class="dropdown-header">Programas</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/ProgramasOtrasEntidades.jsp">Avances en los Programas de Apoyo directo con recursos SADER y otras Entidades 2021</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/Eficiencia.jsp">Programa de Eficiencia Energ&eacute;tica</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/ProgramasSAGARPA.jsp">Resultados de Programas de SAGARPA y otras Entidades operados por
                      FIRA al 2020</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/CertificacionAGD.jsp">Certificaci&oacute;n Operativa de AGD</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/turismo.jsp">Programa de Financiamiento para el Turismo Rural</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/prosostenible.jsp">Programa de Apoyo a Proyectos Sostenibles</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/condicionesOpCOVID.jsp">Condiciones de operaci&oacute;n temporales para el
                      financiamiento FIRA durante la contingencia por COVID-19</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menuitem">Capacitaci&oacute;n e Informaci&oacute;n <span
                class="glyphicon glyphicon-chevron-down pull-right"></span></a>
            <ul class="dropdown-menu mega-dropdown-menu row">
              <li class="col-sm-6 col-md-3">
                <ul role="menu">
                  <li><strong class="dropdown-header">Capacitaci&oacute;n</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/CdtsAcerca.jsp">Centros de Desarrollo Tecnol&oacute;gico</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/CursosSeminariosXML/LstCursos.jsp?clave=0">Cursos de Capacitaci&oacute;n</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/HabilyCalif.jsp">Habilitaci&oacute;n y Registro de Consultores</a></li>
                </ul>
              </li>
              <li class="col-sm-6 col-md-3">
                <ul role="menu">
                  <li><strong class="dropdown-header">Informaci&oacute;n</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/NEstEcon.jsp">Estudios Econ&oacute;micos</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/EstFinancierosN.jsp">Informaci&oacute;n Financiera</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/PlanAFPDFRedirect.jsp" target="_blank">Plan Anual de Financiamiento 2021</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="javascript:void[0]"
                      onclick="javascript:window.open('/Nd/Abandonar.htm?url=http://datos.gob.mx/busca/organization/fira', '', 'scrollbars=no,width=750,height=400');" target="_self">Datos
                      Abiertos</a></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/WsFechas/AVOperN.jsp">Avance de Operaciones</a></li>
                  <li role="menuitem">
                    <a href="javascript:void[0]"
                      onclick="document.getElementById('IDIdAplicacion').value='5'; document.getElementById('IDgetIdSeguimientoPadre').value='0'; document.getElementById('IDNumPag').value=0; document.getElementById('IDgetNombre_Arc_Doc').value='Memorias de Eventos' ; document.getElementById('IDgetIdCarpDoc').value='5'; document.getElementById('IDformTemas').submit(); return true">Memorias
                      de Eventos</a></li>
                  <li role="menuitem">
                    <a aria-label="Ir a p&aacute;gina" href="/Nd/Agrocostos.jsp">Agrocostos</a></li>
                  <li role="presentation"><a role="menuitem" href="/agrocostosApp/AgroApp.jsp">Agrocostos Interactivo</a></li>
                  <li role="presentation"><a role="menuitem" href="/firaCifrasApp/CifrasFira.jsp">FIRA en Cifras</a></li>
                  <li role="presentation"><a role="menuitem" href="/JspWebService/CallWebServ">Fechas &Oacute;ptimas de Ministraci&oacute;n de Cr&eacute;ditos</a></li>
                  <!-- li role="presentation"><a role="menuitem" href="/Nd/indicadoresGestion.jsp">Indicadores de gesti&oacute;n documental</a></li -->
                  <li role="presentation">
                    <a role="menuitem" href="#" class="dropdown-toggle" data-toggle="dropdown"> Gesti&oacute;n de Archivos Institucionales
                      <span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
                    <ul role="menu">
                      <li><a role="menuitem" href="/Nd/indicadoresGestion.jsp">Indicadores de Gesti&oacute;n Documental</a>
                        <a role="menuitem" href="javascript:void[0]" onclick="
                              document.getElementById('IDgetIdCarpDoc').value='86720';
                              document.getElementById('IDgetIdSeguimientoPadre').value='86720';
                              document.getElementById('IDIdAplicacion').value='106';
                              document.getElementById('IDNumPag').value=0;
                              document.getElementById('IDgetNombre_Arc_Doc').value='Programas Anuales e Informes';
                              document.getElementById('IDformTemas').submit();return true;">Programas Anuales e Informes
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li role="presentation"><a role="menuitem" href="/Nd/estimacionCierre.jsp">Estimaci&oacute;n del Avance del Saldo al Cierre del a&ntilde;o</a></li>
                  <li role="presentation"><a role="menuitem" href="/Nd/cotizadorCoberturas.jsp">Cotizador de coberturas</a></li>
                </ul>
              </li>
              <li class="col-sm-6 col-md-3">
                <ul role="menu">
                  <li><strong class="dropdown-header">Memorias de Sostenibilidad</strong></li>
                  <li role="presentation">
                    <a aria-label="Ir a p&aacute;gina" href="/Nd/MemoriasSostenibilidad.jsp" role="menuitem"><img src="/Nd/img/memorias2019.jpg" style="max-width: 100%;" alt="Portada de "
                        aria-label="Portada de ">Memorias de Sostenibilidad</a>
                  </li>
                </ul>
              </li>
              <li class="col-sm-6 col-md-3">
                <ul role="menu">
                  <li><strong class="dropdown-header">Informes de Actividades</strong></li>
                  <li role="presentation">
                    <a aria-label="Ir a p&aacute;gina" href="/Nd/InformeActividades.jsp" role="menuitem"><img src="/Nd/img/informe2019.jpg" style="max-width: 100%;" alt="Portada de "
                        aria-label="Portada de ">Informes de Actividades</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>

          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menuitem">Relaci&oacute;n con Inversionistas<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
            <ul class="dropdown-menu mega-dropdown-menu row" role="menubar">
              <li class="col-sm-6 col-md-3" role="presentation">
                <ul role="menu">
                  <li><strong class="dropdown-header">Relaci&oacute;n con Inversionistas</strong></li>
                  <li>
                    <a href="javascript:void[0]"
                      onclick="document.getElementById('IDIdAplicacion').value='43'; document.getElementById('IDgetIdSeguimientoPadre').value='0'; document.getElementById('IDNumPag').value=0; document.getElementById('IDgetNombre_Arc_Doc').value='Estados Financieros' ; document.getElementById('IDgetIdCarpDoc').value='43'; document.getElementById('IDformTemas').submit(); return true"
                      role="menuitem">Emisi&oacute;n de Certificados Burs&aacute;tiles</a>
                  </li>
                  <li>
                    <a href="javascript:void[0]"
                      onclick="document.getElementById('IDIdAplicacion').value='98'; document.getElementById('IDgetIdSeguimientoPadre').value='0'; document.getElementById('IDNumPag').value=0; document.getElementById('IDgetNombre_Arc_Doc').value='Bonos verdes, sociales y/o sostenibles' ; document.getElementById('IDgetIdCarpDoc').value='98'; document.getElementById('IDformTemas').submit(); return true"
                      role="menuitem">Bonos verdes, sociales y/o sostenibles</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="/Nd/ESG.jsp" class="LigasBloqueHeader" style="border: none;" role="menuitem">ESG</a>
          </li>
          <!--
          <li class="dropdown mega-dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="menuitem">ESG<span class="glyphicon glyphicon-chevron-down pull-right"></span></a>
            <ul class="dropdown-menu mega-dropdown-menu row" role="menubar">
              <li class="col-sm-12 col-md-3" role="presentation">
                <ul role="menu">
                  <li><strong class="dropdown-header">ESG</strong></li>
                  <li role="presentation"><a aria-label="Ir a p&aacute;gina" role="menuitem" href="/Nd/ESG.jsp">Acciones en Materia Ambiental, Social y Gobernanza (ESG)</a></li>

                </ul>
              </li>
              <li class="col-sm-4 col-md-3" role="presentation">
                <ul role="menu">
                  <li><strong class="dropdown-header">Ambiental</strong></li>
                  <li role="presentation">
                    <a aria-label="Ir a p&aacute;gina" href="/Nd/ESG-ambiental.jsp" role="menuitem"><img src="/Nd/img/medioAmbiente.jpg" style="max-width: 100%;" alt="Portada de "
                        aria-label="Portada de ">Ambiental</a>
                  </li>
                </ul>
              </li>
              <li class="col-sm-4 col-md-3" role="presentation">
                <ul role="menu">
                  <li><strong class="dropdown-header">Social</strong></li>
                  <li role="presentation">
                    <a aria-label="Ir a p&aacute;gina" href="/Nd/ESG-social.jsp" role="menuitem"><img src="/Nd/img/Asocial.jpg" style="max-width: 100%;" alt="Portada de "
                        aria-label="Portada de ">Social</a>
                  </li>
                </ul>
              </li>

              <li class="col-sm-4 col-md-3" role="presentation">
                <ul role="menu">
                  <li><strong class="dropdown-header">Gobernanza</strong></li>
                  <li role="presentation">
                    <a aria-label="Ir a p&aacute;gina" href="/Nd/ESG-gobernanza.jsp" role="menuitem"><img src="/Nd/img/gobernanza.jpg" style="max-width: 100%;" alt="Portada de "
                        aria-label="Portada de ">Gobernanza</a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          -->
          <li>
            <a href="/Nd/transparencia_gobmx1.jsp" class="LigasBloqueHeader" style="border: none;" role="menuitem">Transparencia</a>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right" role="menubar">
          <li class="dropdown" role="presentation" data-persistent="true">
            <a href="#" class="dropdown-toggle LigasBloqueHeader" data-toggle="dropdown" role="menuitem"><span class="hidden-sm">Acceder</span> <i class="glyphicon glyphicon-log-in">
              </i></a>
            <ul id="login-dp" class="dropdown-menu">
              <li role="presentation">
                <div class="row">
                  <div class="col-md-12">
                    <form name="logonForm" class="form" id="logonForm" method="post" action="/irj/servlet/prt/portal/prtroot/com.sap.portal.navigation.portallauncher.default">
                      <div class="form-group">
                        <label class="sr-only" for="name">Usuario: </label>
                        <input name="j_user" type="text" size="15" id="name" class="usuario_in form-control" placeholder="Usuario" required />
                      </div>
                      <div class="form-group">
                        <label class="sr-only" for="pass">Contrase&ntilde;a: </label>
                        <input name="j_password" type="password" size="15" id="pass" class="pass_in form-control" placeholder="Contrase&ntilde;a" />
                      </div>
                      <div class="form-group">
                        <input name="button" type="submit" class="button btn btn-primary btn-block" id="button" value="Entrar" title="ENTRAR" /> &nbsp;&nbsp;&nbsp;
                        <input name="login_submit" type="hidden" value="on" />
                        <input type="hidden" name="login_do_redirect" value="1" />
                        <input name="j_authscheme" type="hidden" value="default" />
                      </div>
                    </form>
                    <div class="bottom text-right">
                      <a href="/Nd/formaRegistro.jsp">Registrate aqu&iacute;</a>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
        </ul>
      </div>
    </div>
    <!-- /.nav-collapse -->
  </nav>
</div>
<script src="/Nd/Scripts/navbar.js"></script>
   <div id="content" role="main" class="container text-justify">
      <ol class="breadcrumb">
         <li class="breadcrumb-item"><i class="glyphicon glyphicon-home"></i></li>
         <li class="breadcrumb-item">Capacitación e Información</li>
         <li class="breadcrumb-item">Agrocostos Interactivo</li>
      </ol>
      <div class="texto_cont">







<div class="fecha">
	&Uacute;ltima fecha de actualización: jueves, 19 de noviembre de 2020
</div>
         <div class="row">
            <h1> Agrocostos Interactivo</h1>
            <img style="width: 100%;" src="/Nd/img/agrocostos-app.jpg">
            <p class="destacado claro"><strong>Nota:</strong> Es necesario precisar que los datos de costos de producción presentados son de carácter informativo y están destinados a estimar
               cuotas de crédito de diversos cultivos para aquellas empresas que lleguen a solicitar financiamiento con recursos fondeados por FIRA. Los datos sobre los costos de producción
               reportados provienen de un número reducido de observaciones, y por lo tanto, no deben considerarse como estadísticamente representativos de los costos de producción
               nacionales, estatales, por cultivo, tecnología o ciclo productivo correspondiente. El uso para otros fines no es responsabilidad de FIRA.</p>
         </div>
         <div class="row">
            <div class="seccion" id="formulario">
               <form id="tipoDe">
                  <div id="select1" class="topSelect">
                     <div class="cuerpo">
                        <h1></h1>
                        <h2 id="tituloSec">Consulta los costos de producción por:</h2>
                        <div class="formGroup" id="cultivoSel">
                           <label for="cultivo">Cultivo</label>
                           <select name="cultivo" id="cultivo">
                              <option value="0" disabled selected="selected">Selecciona...</option>
                           </select>
                        </div>
                        <div class="formGroup" id="estadoSel">
                           <label for="estado">Estado</label>
                           <select name="estado" id="estado">
                              <option value="0" disabled selected="selected">Selecciona...</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div id="select2" class="topSelect"></div>
                  <div id="select3" style="display: none;" onclick="window.scrollTo(0,0)">
                     <div class="formGroup" id="zonaSel">
                        <p>Seleccione la Zona</p>
                        <div>
                           <label for="zona">Zona</label>
                           <select name="zona" id="zona">
                              <option value="0" disabled selected="selected">Selecciona...</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
            <header>
               <div class="popup">...</div>
               <nav>
                  <a href="#" class="SIAP boton" id="SIAPLink"></a>
                  <div class="atras"><button id="menuBtnAtras">Nueva búsqueda</button></div>
               </nav>
            </header>
         </div>
         <div class="row" id="Show">
            <div class="col-sm-12">
               <div id="resultados" class="seccion resultados" style="padding-top:2%">
                  <div id="head" class="seccionRes">
                     <table id="tituloCosto">
                        <tr>
                           <td>Zona:</td>
                           <td id="tdZona">Cargando...</td>
                        </tr>
                        <tr>
                           <td>Ciclo: </td>
                           <td id="tdCiclo">Cargando...</td>
                        </tr>
                        <tr>
                           <td>Año: </td>
                           <td id="tdAno">Cargando...</td>
                        </tr>
                        <tr>
                           <td>Tecnología</td>
                           <td id="tdPaquete">Cargando...</td>
                        </tr>
                        <tr>
                           <td>Modalidad</td>
                           <td id="tdModalidad">Cargando...</td>
                        </tr>
                     </table>
                  </div>
                  <div id="analisis" class="seccionRes">
                     <h1> Análisis económico</h1>
                     <div>
                        <table cellspacing="0" cellpadding="0">
                           <tr>
                              <td>Rendimiento probable (ton/ha)</td>
                              <td id="tdRendimientoP">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Precio probable ($/ton)</td>
                              <td id="tdPrecioP">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Ingreso probable ($/ha)</td>
                              <td id="tdIngresoP">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Costo total ($)</td>
                              <td id="tdTotal">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Utilidad probable ($/ha)</td>
                              <td id="tdUtilidadP">Cargando... </td>
                           </tr>
                           <tr>
                              <td>Costo unitario ($/ton)</td>
                              <td id="tdCostoUnitario">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Punto de equilibrio (ton/ha)</td>
                              <td id="tdPEquilibrio">Cargando...</td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div>
                     <h1 class="accordion">Producción (ton) para cubrir:</h1>
                     <div class="panel">
                        <table>
                           <tr>
                              <td>Avío+Intereses</td>
                              <td id="tdAvio"> Cargando...</td>
                           </tr>
                           <tr>
                              <td>Costo directo</td>
                              <td id="tdCostoDirecto">Cargando...</td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div id="capitulo" class="seccionRes">
                     <h1 class="accordion">Resumen de Costos</h1>
                     <div class="panel">
                        <table cellspacing="0" cellpadding="0">
                           <tr>
                              <td>Preparación del Terreno</td>
                              <td id="tdPTerreno">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Siembra</td>
                              <td id="tdSiembra">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Fertilización</td>
                              <td id="tdFertiliza">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Labores Culturales</td>
                              <td id="tdLabores">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Riegos</td>
                              <td id="tdriegos">$Cargando...</td>
                           </tr>
                           <tr>
                              <td>Control de plagas, malezas y enfermedades</td>
                              <td id="tdPlagas">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Cosecha, Selección y empaque</td>
                              <td id="tdCosecha">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Comercialización</td>
                              <td id="tdComercializacion">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Diversos</td>
                              <td id="tdDiversos">Cargando...</td>
                           </tr>
                           <tr>
                              <td>Total:</td>
                              <td id="tdTotalResumen">Cargando...</td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div id="financiamiento">
                     <h1 class="accordion">Financiamiento</h1>
                     <div class="panel">
                        <table>
                           <tr>
                              <td>Necesidades de Financiamiento</td>
                              <td>Hasta 160 mil UDI</td>
                              <td>Mayor a 160 mil UDI</td>
                           </tr>
                           <tr>
                              <td>Cuota de crédito $/ha</td>
                              <td id="tdCuotaMenos">Cargando... </td>
                              <td id="tdCuostaMas">Cargando... </td>
                           </tr>
                           <tr>
                              <td>Aportación $/ha</td>
                              <td id="tdAportacionMenos">Cargando... </td>
                              <td id="tdAportacionMas">Cargando... </td>
                           </tr>
                           <tr>
                              <td>Intereses $/ha</td>
                              <td id="tdInteresMenos">Cargando... </td>
                              <td id="tdInteresMas">Cargando... </td>
                           </tr>
                        </table>
                     </div>
                  </div>
                  <div>
                     <h1 class="accordion" id="segurosH1">Seguros</h1>
                     <div class="panel">
                        <div id="riesgosSeguros">
                           <ul>
                              <li>Bajas Temperaturas </li>
                              <li>Exceso de Humedad e Inundación (Lluvias)</li>
                              <li>Falta de Piso</li>
                              <li>Granizo</li>
                              <li>Heladas</li>
                              <li>Incendios</li>
                              <li>Onda Cálida</li>
                              <li>Sequia</li>
                              <li>Vientos (Fuertes)</li>
                              <li>Plagas y Enfermedades</li>
                           </ul>
                        </div>
                        <div class="consideraciones">
                           <h2>Consideraciones a aplicarse:</h2>
                           <ul>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div id="datosSiap">
                     <div class="imagen"></div>
                     <h1>Datos del SIAP a 2018</h1>
                     <p>
                        <select id="variedadSiap"></select> en <span></span>
                     </p>
                     <table>
                        <tr>
                           <td>Cargando...</td>
                        </tr>
                     </table>
                     <div class="loader">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!--
         <div id="instalaApp">
           <span class="cerrar" onclick="this.parentElement.style='display:none'">x</span>
            <h2>Instala nuestra aplicación web</h2>
            <a href="agrocostos.html"> <img src="icon-96-96.png" style="width:96px;height:96px;float: left;margin-right:1em;" /> </a>
            <div class="escritorio">
               <p>Consulta los costos de cultivo desde tu dispositivo móvil</p>
               Escanea este código en tu dispositivo y <a href="javascript:return void" data-toggle="appDemo">agrega el ícono </a> a tu pantalla de inicio.
               <a href="agrocostos.html"><img src="img/qr.png" style="width:250px;height:250px;float:right;clear:both;" /></a>
            </div>
            <div class="movil">
               <p>Consulta los costos de cultivo desde tu dispositivo.
                  Haz click <a href="agrocostos.html">aquí</a> y <button data-toggle="appDemo">agrega el ícono </button> a tu pantalla de inicio.
               </p>
            </div>

      </div>-->

      </div>

	<div id="BtnRedes">
		<div class="fb-like" data-href="https://www.fira.gob.mx/agrocostosApp/AgroApp.jsp" data-layout="button" data-action="recommend" data-size="small" data-show-faces="false" data-share="true"></div>
		<a class="twitter-share-button" onclick="javascript:window.open('/Nd/Abandonar.htm?url=https://twitter.com/intent/tweet?via=fira_mexico','','scrollbars=no,width=750,height=400');" href="javascript:void[0]">
		 Tweet </a>
	</div>
      <br />
   </div>

	<div id="layerFooter" role="contentinfo">
	    <div class="container-fluid">
	        <div class="row text-center">
	            <div class="col-md-12 disclaimer">
	                "Este programa es público, ajeno a cualquier partido político. Queda prohibido su uso para fines distintos a los establecidos en el programa".
	            </div>
	        </div>
	        <div class="row text-center" style="color:#FFF;">
	            <div class="footerContacto">
	                <div class="col-md-3">
	                    &copy; Copyright FIRA 2020 | 01 800 999 FIRA
	                </div>
	                <div class="col-md-2">&nbsp;</div>
	                <div class="col-md-7 text-right">
	                    La informaci&oacute;n contenida en el portal de FIRA que sea reproducida, procesada o citada por alg&uacute;n usuario, deber&aacute; hacer referencia a la localizaci&oacute;n electr&oacute;nica de la misma, as&iacute; como la fecha en la que se realiz&oacute; la consulta.
	                </div>
	            </div>
	        </div>
	        <div class="row">
	            <div class="col-md-12 linksabajo">
	                <a href="#" onclick="javascript:window.open('/Nd/Abandonar.htm?url=http://consultas.curp.gob.mx/CurpSP/','','scrollbars=no,width=750,height=400');" class="LigasHeader">
	       Obtenga su CURP</a> <span> | </span>
	                <a href="/Nd/Seguridad.jsp" class="LigasHeader">Seguridad</a><span> | </span>
	                <a href="/Nd/Privacidad.jsp" class="LigasHeader">Privacidad</a><span> | </span>
	                <a href="/Nd/AvisoLegal.jsp" class="LigasHeader">Aviso Legal</a><span> | </span>
	                <a href="/Nd/Accesibilidad.jsp" class="LigasHeader">Declaratoria de Accesibilidad</a>
	                <!--span style="color:white;font-size:small;font-weight:bold"> | </span>
	                                                                        <a href="/SalaPrensaXml/ServletRss"  class="LigasHeader">RSS</a-->
	            </div>
	        </div>
	    </div>
	</div>

	<script>
		var images = $('img:not([src^="http"])', $('.texto_cont'));
		var time = new Date().getTime();
		for (var i = 0, l = images.length; i < l; i++) {
			var image = $(images[i]);
			var src   = image.attr('src');
			if (src != null && src != '') {
				image.attr('src', src + ((src.indexOf('?') != -1) ? '&' : '?') + 't=' + time);
			}
		}
	</script>
   <script type="text/javascript" src="/script.js"></script>
   <!-- Global site tag (gtag.js) - Google Analytics -->
   <script>
      let deferredPrompt;
      if (/iPad|iPhone|iPod/.test(navigator.userAgent)) $('#instalaApp').show();
      window.addEventListener('beforeinstallprompt', function(e) {
         deferredPrompt = e;
         showInstallPromotion();
         //$('#instalaApp').show();
      });

      function showInstallPromotion() {
         deferredPrompt.prompt();
         // Wait for the user to respond to the prompt
         deferredPrompt.userChoice
            .then(function(choiceResult) {
               if (choiceResult.outcome === 'accepted') {
                  console.log('App Instalada');
                  location.reload();
               } else {
                  console.log('App Rechazada');
               }
               deferredPrompt = null;
            });
      }
   </script>
</body>

</html>