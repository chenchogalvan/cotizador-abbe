<!DOCTYPE html>
<html lang="es">
<head>

<link rel="stylesheet" href="https://www.fira.gob.mx/Nd/css/bootstrap.min.css" />
{{-- <link rel="stylesheet" href="https://www.fira.gob.mx/Nd/css/portal.css" /> --}}
<link rel="stylesheet" href="/portal.css" />
<link rel="stylesheet" href="https://www.fira.gob.mx/Nd/css/styles.css" />



	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="https://www.fira.gob.mx/Nd/Scripts/bootstrap.min.js"></script>
	<script src="/Nd/carga_xml.js"></script>


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

</head>

<body>
</div>

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

   <div id="content" role="main" class="container text-justify">

      <div class="texto_cont">







<div class="fecha">
	&Uacute;ltima fecha de actualización: jueves, 19 de noviembre de 2020
</div>
         <div class="row">
            <h1> Agrocostos Interactivo</h1>
                <img src="https://abbeco.com.mx/images/ABBE_logo_sm.jpg" alt="" style="width:176px !important; height:66px !important;">
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


      <br />
   </div>

   <script type="text/javascript" src="/script.js"></script>

</body>

</html>
