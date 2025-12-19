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
    <strong>Municipio:</strong> ${p.municipio}<br>
    <strong>Estado:</strong> ${p.estado}
  `
});

cargarCapa({
  url: 'api/minas.php',
  capa: capaMinas,
  color: '#b30000',
  popup: p => `
    <strong>Municipio:</strong> ${p.municipio}<br>
    <strong>Estado:</strong> ${p.estado}
  `
});

//Caja para activar/desactivar capas
L.control.layers(null, {
  "Agua": capaAgua,
  "Minas": capaMinas
}).addTo(map);
