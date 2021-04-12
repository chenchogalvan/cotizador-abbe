
var CACHE_NAME = 'CACHE-Agrocostos';
var APP_VER = 0.50;
var urlsToCache = [
  './agrocostos.html',
  './favicon.png',
  './icon-192-192.png',
  './icon-96-96.png',
  './icon-1024-1024.png',
  './icon-36-36.png',
  '/Nd/Datos_SIAP_2019.csv',
  './riesgosSAB.json',
  './acercade.html',
  '/Nd/agrocosto_data_completa.csv',
  './launch.png',
  './equivalenciasSIAP.json',
  './manifest.json',
  './css/style.css',
  './font/openSans.css',
  './font/opensans-bold-webfont.woff',
  './font/opensans-bold-webfont.woff2',
  './font/opensans-bolditalic-webfont.woff',
  './font/opensans-bolditalic-webfont.woff2',
  './font/opensans-extrabold-webfont.woff',
  './font/opensans-extrabold-webfont.woff2',
  './font/opensans-extrabolditalic-webfont.woff',
  './font/opensans-extrabolditalic-webfont.woff2',
  './font/opensans-italic-webfont.woff',
  './font/opensans-italic-webfont.woff2',
  './font/opensans-light-webfont.woff',
  './font/opensans-light-webfont.woff2',
  './font/opensans-lightitalic-webfont.woff',
  './font/opensans-lightitalic-webfont.woff2',
  './font/opensans-regular-webfont.woff',
  './font/opensans-regular-webfont.woff2',
  './font/opensans-semibold-webfont.woff',
  './font/opensans-semibold-webfont.woff2',
  './font/opensans-semibolditalic-webfont.woff',
  './font/opensans-semibolditalic-webfont.woff2',
  './img/acercade.jpg',
  './img/acercade.svg',
  './img/agave.jpg',
  './img/aguacate.jpg',
  './img/ajo.jpg',
  './img/ajonjoli.jpg',
  './img/alfalfa.jpg',
  './img/algodon.jpg',
  './img/arandano.jpg',
  './img/arroz.jpg',
  './img/back.svg',
  './img/brocoli.jpg',
  './img/cacahuate.jpg',
  './img/cacao.jpg',
  './img/cafe.jpg',
  './img/cafecerezamantenimiento.jpg',
  './img/cana.jpg',
  './img/cartamo.jpg',
  './img/cebada.jpg',
  './img/chile verde.jpg',
  './img/chile.jpg',
  './img/chileancho.JPG',
  './img/chilejalapeno.jpg',
  './img/chilepimineto.jpg',
  './img/chileseco.jpg',
  './img/citricos.jpg',
  './img/coco.jpg',
  './img/datil.jpg',
  './img/dropdown.svg',
  './img/dropdownBlue.svg',
  './img/esparrago.jpg',
  './img/false.svg',
  './img/frambuesa.jpg',
  './img/fresa.jpg',
  './img/frijol.jpg',
  './img/garbanzo.jpg',
  './img/girasol.jpg',
  './img/higuerilla.jpg',
  './img/jitomate.jpg',
  './img/limon.jpg',
  './img/limonpersa.jpg',
  './img/logo.svg',
  './img/logoAgroCostosBlanco.svg',
  './img/logoAgrocostos.svg',
  './img/logoblanco.svg',
  './img/maiz.jpg',
  './img/mango.jpg',
  './img/manzana.jpg',
  './img/manzano.jpg',
  './img/melon.jpg',
  './img/menu.svg',
  './img/naranja.jpg',
  './img/naranjo.jpg',
  './img/nogal.jpg',
  './img/nuez.jpg',
  './img/palma.jpg',
  './img/papa.jpg',
  './img/papaya.jpg',
  './img/papayo.jpg',
  './img/pimiento.jpg',
  './img/platano.jpg',
  './img/sandia.jpg',
  './img/siap.svg',
  './img/sorgo forrajero en verde.jpg',
  './img/sorgo grano.jpg',
  './img/sorgo.jpg',
  './img/soya.jpg',
  './img/super.jpg',
  './img/tomate verde.jpg',
  './img/tomate.jpg',
  './img/trigo.jpg',
  './img/true.svg',
  './img/uva.jpg',
  './img/vid.jpg',
  './img/zarzamora.jpg',
  './js/acercade.js',
  '/Nd/Scripts/jquery-1.12.0.min.js',
  './js/script.js'
];

//Instala el Service Worker y Guarda Cache
// self.addEventListener('install', function (event) {
//   self.skipWaiting();
//   event.waitUntil(
//     caches.open(CACHE_NAME)
//       .then(cache => {
//         cache.addAll(urlsToCache);
//       })
//   );
// });

//Revisa si el serviceWorker estÃ¡ activo
self.addEventListener('activate', function (event) {
  event.waitUntil(self.clients.claim());
  console.log('ServiceWorker activo ya se puede usar el cache.');
});

//Trabaja las respuestas y peticiones de web
self.addEventListener('fetch', function (event) {
  if (event.request.method !== "GET") return;
  //Filtramos request de otros sitios, ej google docs
  if (event.request.url.startsWith(self.location.origin)) {
    //Devuelve inmediatamente cache
    event.respondWith((
      fromCache(event.request).then(
        function (response) {
          event.waitUntil(
            fetch(event.request).then(function (response) {
              return updateCache(event.request, response);
            })
          );
          return response;
        },
        function () {
          // Si no hay respuesta de cache se busca en lÃ­nea
          return fetch(event.request)
            .then(function (response) {
              // Se actualiza cache
              event.waitUntil(updateCache(event.request, response.clone()));
              return response;
            })
            .catch(function (error) {
              console.log("No es posible acceder al recurso." + error.message);
            });
        }
      )
    ));
  }
});
//Recibe versiÃ³n de la aplicaciÃ³n y si es mayor y esta en lÃ­nea, borra cache (desde app) y lo vuelve a poner en service Worker
self.addEventListener('message', function (event) {
  jsVer = event.data;
  console.log('En lÃ­nea:' + navigator.onLine + '. Version de SW ' + APP_VER + ', versiÃ³n en servidor ' + jsVer);
  if (navigator.onLine && jsVer > APP_VER) {
    console.log('Actualizando cache de version ' + APP_VER + ' a la version ' + jsVer);
    caches.open(CACHE_NAME)
      .then(function (cache) {
        cache.addAll(urlsToCache);
      });
  }


});

//funciones que se llaman arriba
function fromCache(request) {
  return caches.open(CACHE_NAME).then(function (cache) {
    return cache.match(request).then(function (matching) {
      if (!matching || matching.status === 404) {
        return Promise.reject("no-match");
      }
      return matching;
    });
  });
}

function updateCache(request) {
  return caches.open(CACHE_NAME).then(function (cache) {
    return cache.put(request, response);
  }).catch(error => {
    console.log('Error al guardar en cache ' + request.url + ' ' + error.message);
  });
}
