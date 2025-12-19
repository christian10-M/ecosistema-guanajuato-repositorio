//Crea el mapa con centro en Guanajuato
const map = L.map('map').setView([21.02, -101.25], 8);

//Capa básica
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);

//CAPA AGUA
const capaAgua = L.layerGroup().addTo(map);
//CAPA MINAS
const capaMinas = L.layerGroup().addTo(map);
//CAPA LADRILLERAS
const capaLadrilleras = L.layerGroup().addTo(map);
//CAPA RETC
const capaRETC = L.layerGroup().addTo(map);
//CAPA SALUD
const capaSalud = L.layerGroup().addTo(map);


//Conexion con el backend
//Refactorizamos código lol
function cargarCapa({ url, capa, color, popup }) {
    //Peticion HTTP al backend
  fetch(url)
  //Convierte la respuesta en JSON
    .then(r => r.json())
    .then(data => {
    //Data es un arreglo de puntos
      data.forEach(p => {
    //Recorre cada fila Usa lat y lng
        L.circleMarker([p.lat, p.lng], {
        //Estilo del punto
          radius: 4,
          color,
          fillOpacity: 0.7
        })
        //Popup informativo
        .bindPopup(popup(p))
        .addTo(capa);
      });
    });
}

//Funciones especificas para cargar cada capa
cargarCapa({
  url: 'api/agua.php',
  capa: capaAgua,
  color: '#0077cc',
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});

cargarCapa({
  url: 'api/minas.php',
  capa: capaMinas,
  color: '#b30000',
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});

cargarCapa({
  url: 'api/ladrilleras.php',
  capa: capaLadrilleras,
  color: '#e19613ff',
  popup: p => `
    <strong>Municipio:</strong> ${p.municipio}<br>
    <strong>Localidad:</strong> ${p.localidad}
  `
});

cargarCapa({
  url: 'api/retc.php',
  capa: capaRETC,
  color: '#bb13e1ff',
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});

cargarCapa({
  url: 'api/salud.php',
  capa: capaSalud,
  color: '#13a3e1ff',
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});


//Caja para activar/desactivar capas
L.control.layers(null, {
  "Agua": capaAgua,
  "Minas": capaMinas,
  "Ladrilleras": capaLadrilleras,
  "RETC":capaRETC,
  "Servicios de Salud":capaSalud
}).addTo(map);
