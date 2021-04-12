/*
Modo de uso:
	- Si se necesita cargar un xml y su fecha use carga_xml("xml/Privacidad.xml");
	- Si NO necesita cargar un xml, pero si su fecha filemtime("xml/podcast.xml");
	- Si es jsp entonces validateDate("jsp"); como en politicas.jsp
	- NUNCA ejecutar div_fecha directamente.
*/

/*var urlConfig = "xml/settingDate.xml";*/
var urlConfig = "/Nd/xml/settingDate.xml";


function carga_xml(url, callback) {
	$(document).ready(function() {
		var t = new Date().getTime();
		$.ajax({
			type: "GET",
			url: url + '?t=' + t,
			dataType: "xml",
			success: function(xml) {
				$(xml).find('texto').each(function() {
					var titulo  = $(this).find('titulo').text();
					var imagen  = $(this).find('imagen').text();
					var parrafo = $(this).find('parrafo').text();

					if (titulo == "" && imagen == "") {
						var content = $('<div class="texto_cont">'+parrafo+'</div>');
						var images  = $('img:not([src^="http"])', content);
						var time    = new Date().getTime();

						for (var i = 0, l = images.length; i < l; i++) {
							var image = $(images[i]);
							var src   = image.attr('src');
							if (src != null && src != '') {
								image.attr('src', src + ((src.indexOf('?') != -1) ? '&' : '?') + 't=' + time);
							}
						}

						content.appendTo('#content');
					} else {
						$('<div id="imagen_texto"><span class="titulo">'+titulo+'</span><img src="'+imagen+'" width="890" height="96" /></div><div class="texto_cont">'+parrafo+'</div>').appendTo('#content');
					}

					addBtnRedes();
				});

				filemtime(url);

				if (callback != null) {
					callback(this);
				}
			}
		});
	});
}

function addBtnRedes() {
    var BtnFacebook = '<div class="fb-like" data-href="' + ((location.href.search('q=') == -1) ? location.href : location.origin + location.pathname) + '" data-layout="button" data-action="recommend" data-size="small" data-show-faces="false" data-share="true"></div>';
    var BtnTwitter = '<a class="twitter-share-button" onclick="javascript:window.open(\'/Nd/Abandonar.htm?url=https://twitter.com/intent/tweet?via=fira_mexico\',\'\',\'scrollbars=no,width=750,height=400\');" href="javascript:void[0]">Tweet </a>';
    $('<div id="BtnRedes">' + BtnFacebook + BtnTwitter + '</div>').appendTo('.texto_cont');
}

//FECHA DE ACTUALIZACION DEL ARCHIVO
function div_fecha(fechaFinal){
	// Esta función NUNCA debe ser ejecutada directamente.
	$('<div class="fecha">&Uacute;ltima fecha de actualizaci&oacute;n: ' + fechaFinal + '</div>').prependTo('#content .texto_cont');
}

function filemtime(file) {
	// JSP no devuelve Last-Modified, por lo tanto
	// la fecha debe guardarse en settingDate.xml e
	// incovar validateDate directamente.

	if (validateDate("xml")) {
		var client = new XMLHttpRequest();
		client.open("GET", file, true);
		client.send();
		client.onreadystatechange = function() {
			if(this.readyState == this.HEADERS_RECEIVED) {
				var regresa = Date.parse(client.getResponseHeader("Last-Modified"))/1000;

				if (regresa > 0) {
					var fecha = new Date(regresa*1000);
					var fechaFinal = dia(fecha.getDay()) + ", " +  fecha.getDate() + " de " + mes(fecha.getMonth()) + " de " + fecha.getFullYear();
					div_fecha(fechaFinal);
				}
            }
        };
	}
}

function validateDate(typeFile) {
	var xmlhttp = new XMLHttpRequest();
	var x, i, xmlDoc, varBoolean = true;
	var dateWithoutFormat;

	xmlhttp.onreadystatechange = function() {
		if (this.readyState === 4) {
	    	if(this.status === 200){
				xmlDoc = this.responseXML;
				x = xmlDoc.getElementsByTagName("CONFIG");

				//Se recorre el documento para identificar el cambio de fecha masivo
				for (i = 0; i < x.length; i++) {
					if(x[i].getElementsByTagName("URL")[0].childNodes[0].nodeValue.trim() == "*" && x[i].getElementsByTagName("STATUS")[0].childNodes[0].nodeValue.toUpperCase() == "Y"){

						dateWithoutFormat = x[i].getElementsByTagName("DATE")[0].childNodes[0].nodeValue;
			  			var date = new Date(dateWithoutFormat.substring(6,10), dateWithoutFormat.substring(3,5) - 1, dateWithoutFormat.substring(0,2));

						if (typeFile == "xml") {
				  			div_fecha(dia(date.getDay()) + ", " + dateWithoutFormat.substring(0,2) + " de " +mes(mesFecha(dateWithoutFormat.substring(3,5)))+ " de " + dateWithoutFormat.substring(6,10));
							varBoolean = false;
						} else if (typeFile == "jsp") {
							div_fecha(dia(date.getDay()) + ", " + dateWithoutFormat.substring(0,2) + " de " +mes(mesFecha(dateWithoutFormat.substring(3,5)))+ " de " + dateWithoutFormat.substring(6,10));
							varBoolean = false;
						}
					}
				}

				//Se recorre el documento y se asigna la fecha manual de acuerdo al archivo de configuración
				for (i = 0; i < x.length; i++) {
					if(x[i].getElementsByTagName("URL")[0].childNodes[0].nodeValue == window.location.href
						&& x[i].getElementsByTagName("STATUS")[0].childNodes[0].nodeValue.toUpperCase() == "Y"
						&& varBoolean == true){

			  			dateWithoutFormat = x[i].getElementsByTagName("DATE")[0].childNodes[0].nodeValue.split('/');
			  			var date = new Date(dateWithoutFormat[2], dateWithoutFormat[1] - 1, dateWithoutFormat[0]);

			  			if (typeFile == "xml") {
				  			div_fecha(dia(date.getDay()) + ", " + date.getDate() + " de " +mes(date.getMonth())+ " de " + date.getFullYear());
					  		varBoolean = false;
				  		} else if(typeFile == "jsp") {
				  			div_fecha(dia(date.getDay()) + ", " + date.getDate() + " de " +mes(date.getMonth())+ " de " + date.getFullYear());
					  		varBoolean = false;
				  		}
					}
				}
			} else {
				//En caso de error, se busca la fecha automatica y se imprime en consola este mensaje.
				console.log("Existe un problema a extraer información del archivo "+urlConfig);
			}
		}
	};

	xmlhttp.open("GET", urlConfig + '?t=' + new Date().getTime(), false);
	xmlhttp.send();
	return varBoolean;
}

function dia(m){
	switch(m){
		case 0 : return "Domingo"; break;
		case 1 : return "Lunes"; break;
		case 2 : return "Martes"; break;
		case 3 : return "Mi&eacute;rcoles"; break;
		case 4 : return "Jueves"; break;
		case 5 : return "Viernes"; break;
		case 6 : return "S&aacute;bado"; break;
	}
}

//PARSE FECHA
function mes(m){
	switch(m){
		case 0 : return "Enero"; break;
		case 1 : return "Febrero"; break;
		case 2 : return "Marzo"; break;
		case 3 : return "Abril"; break;
		case 4 : return "Mayo"; break;
		case 5 : return "Junio"; break;
		case 6 : return "Julio"; break;
		case 7 : return "Agosto"; break;
		case 8 : return "Septiembre"; break;
		case 9 : return "Octubre"; break;
		case 10 : return "Noviembre"; break;
		case 11 : return "Diciembre"; break;
	}
}

function mesFecha(mesComp){
	var mes = mesComp;
	var mesInteger;

	if(mes=='01') {
		return mesInteger=0;
    } else if(mes=='02'){
    	return  mesInteger=1;
    } else if(mes=='03'){
    	return  mesInteger=2;
    } else if(mes=='04'){
    	return mesInteger=3;
    } else if(mes=='05'){
    	return mesInteger=4;
    } else if(mes=='06'){
    	return mesInteger=5;
    } else if(mes=='07'){
    	return mesInteger=6;
    } else if(mes=='08'){
    	return mesInteger=7;
    } else if(mes=='09'){
    	return mesInteger=8;
    } else if(mes=='10'){
    	return mesInteger=9;
    } else if(mes=='11'){
    	return mesInteger=10;
    } else if(mes=='12'){
    	return mesInteger=11;
    } else{
    	return mesInteger=mesInteger;
	}
}


/*==  ==  ==  ==  ==  ==       OSCAR       ==  ==  ==  ==  ==  ==  */



function cargaFecha(tiempo){

	validateDateJSPProy("jsp",tiempo);}


	function validateDateJSPProy(typeFile,tiempo) {

	var xmlhttp = new XMLHttpRequest();
	var x, i, xmlDoc, varBoolean = true;
	var dateWithoutFormat;

	var Formato = { weekday: "long", year: "numeric", month: "long", day: "numeric"};

	xmlhttp.onreadystatechange = function() {

		if (this.readyState === 4) {

	    	if(this.status === 200){
				xmlDoc = this.responseXML;
				x = xmlDoc.getElementsByTagName("CONFIG");

				//Se recorre el documento y se asigna la fecha manual de acuerdo al archivo de configuración
					for (i = 0; i < x.length; i++) {
						if(x[i].getElementsByTagName("URL")[0].childNodes[0].nodeValue == window.location.href
							&& x[i].getElementsByTagName("STATUS")[0].childNodes[0].nodeValue.toUpperCase() == "Y"
							&& varBoolean == true){
												  if(typeFile == "jsp"){

														if(x[i].getElementsByTagName("URL")[0].childNodes[0].nodeValue == window.location.href){

																dateWithoutFormat = x[i].getElementsByTagName("DATE")[0].childNodes[0].nodeValue.split('/');


																var date = new Date(dateWithoutFormat[2], dateWithoutFormat[1]-1, dateWithoutFormat[0]);

											                    var fechaFinal = date.toLocaleDateString("es-MX", Formato);

												 div_fechaJsp(fechaFinal);
											    varBoolean = false;
											break;
									}
							}
					}
				}

			   	if(varBoolean){
				        var fecha = new Date(tiempo);
                      	var fechaFinal = fecha.toLocaleDateString("es-MX", Formato);
					    div_fechaJsp(fechaFinal);
				  }

			} else {
			            var fecha = new Date(tiempo);
                        var fechaFinal = fecha.toLocaleDateString("es-MX", Formato);
						div_fechaJsp(fechaFinal);
				//En caso de error, se busca la fecha automatica y se imprime en consola este mensaje.
				console.log("Existe un problema a extraer información del archivo "+ urlConfig + fechaFinal);
			}
		}
	};

	xmlhttp.open("GET", urlConfig , false);
	xmlhttp.send();
	return varBoolean;
}

function div_fechaJsp(fechaFinal){
   $('<div class="fecha">&Uacute;ltima fecha de actualizaci&oacute;n: ' + fechaFinal + '</div><div id="fb-root"></div>').appendTo('#loadFechacont');
}









