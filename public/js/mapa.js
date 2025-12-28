//Crea el mapa con centro en Guanajuato
const map = L.map('map').setView([21.02, -101.25], 8);

//Capa básica
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);

//SELECT: CONTROLADOR DEL FILTRO
//Todo reacciona a lo que diga el filtro
const municipioSelect = document.getElementById('municipioSelect');
const btnLimpiar = document.getElementById('btnLimpiar');


const choicesMunicipio = new Choices(municipioSelect, {
  searchEnabled: true, //ACTIVA EL BUSCADOR
  shouldSort: false, //RESPETA EL ORDEN QUE MANDA LA BD
  itemSelectText: '', //QUITA EL TEXTO FEO PRESS TO SELECT
  placeholderValue: 'Buscar municipio...', //TEXTO INICIAL
  noResultsText: 'No se encontraron municipios', //UX CUNAOD NO HAY RESULTADOS
});

console.log('Choices iniciado:', choicesMunicipio);



// Cargar lista de municipios
//No depende del front, si la BD cambia, cambia ese filtro...
fetch('api/municipios.php')
  .then(r => r.json())
  .then(municipios => {
    const opciones = municipios.map(m => ({
      value: m,
      label: m
    }));

    choicesMunicipio.setChoices(opciones, 'value', 'label', true);
  });


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
function cargarCapa({ url, capa, color, popup, municipio }) {

  // Limpiamos la capa antes de volver a dibujar
  capa.clearLayers();
  // Aqui endpoint toma el valor de la api solicitada...
  let endpoint = url;
  //Checa si hay Municipio
  if (municipio) {
    //Si si lo hay, agrega "?municipio='El valor de la variable municipio'"
    endpoint += `?municipio=${encodeURIComponent(municipio)}`;
  }
//Peticion HTTP al backend
  fetch(endpoint)
  //Convierte la respuesta en JSON
    .then(r => r.json())
    .then(data => {
    //Data es un arreglo de puntos
      data.forEach(p => {
        if (!p.lat || !p.lng){ 
            console.warn('Punto inválido detectado:', p);
            return;} //Protección

        const lat = parseFloat(p.lat);
        const lng = parseFloat(p.lng);

        if (isNaN(lat) || isNaN(lng)) return;

        L.circleMarker([lat, lng], {
            radius: 4,
            color,
            fillOpacity: 0.7
        })
        .bindPopup(popup(p))
        .addTo(capa);
        });

    });
}



//Funciones que coordina todas las capas, para que usen todas el mismo filtro
function recargarCapas (municipio= ''){
cargarCapa({
  url: 'api/agua.php',
  capa: capaAgua,
  color: '#0077cc',
  municipio,
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});

cargarCapa({
  url: 'api/minas.php',
  capa: capaMinas,
  color: '#b30000',
  municipio,
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});

cargarCapa({
  url: 'api/ladrilleras.php',
  capa: capaLadrilleras,
  color: '#e19613ff',
  municipio,
  popup: p => `
    <strong>Municipio:</strong> ${p.municipio}<br>
    <strong>Localidad:</strong> ${p.localidad}
  `
});

cargarCapa({
  url: 'api/retc.php',
  capa: capaRETC,
  color: '#bb13e1ff',
  municipio,
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});

cargarCapa({
  url: 'api/salud.php',
  capa: capaSalud,
  color: '#13a3e1ff',
  municipio,
  popup: p => `
    <strong>Nombre:</strong> ${p.nombre}<br>
    <strong>Municipio:</strong> ${p.municipio}
  `
});
}

//Caja para activar/desactivar capas
L.control.layers(null, {
  "Agua": capaAgua,
  "Minas": capaMinas,
  "Ladrilleras": capaLadrilleras,
  "RETC":capaRETC,
  "Servicios de Salud":capaSalud
}).addTo(map);

//Boton de ampliar pantalla
L.control.fullscreen({
  position: 'topleft'
}).addTo(map);

recargarCapas(); // carga inicial sin filtro

//Flujo final:
//Usuario cambia el municipio
//Se obtiene el valor, se almacena en municipio
//Se manda a recargar las capas con dicho valor
municipioSelect.addEventListener('change', () => {
  const municipio = municipioSelect.value;
  recargarCapas(municipio);
});

btnLimpiar.addEventListener('click', () => {
  // 1. Reset visual del select (Choices)
  choicesMunicipio.clearStore();
  choicesMunicipio.setChoiceByValue('');

  // 2. Recargar capas sin filtro
  recargarCapas();

  // (opcional pero elegante)
  map.setView([21.02, -101.25], 8);
});




