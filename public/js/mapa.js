const map = L.map('map').setView([21.02, -101.25], 8);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);

const capaAgua = L.layerGroup().addTo(map);

fetch('api/agua.php')
  .then(r => r.json())
  .then(data => {
    data.forEach(punto => {
      L.circleMarker([punto.lat, punto.lng], {
        radius: 4,
        color: '#0077cc',
        fillOpacity: 0.7
      })
      .bindPopup(`
        <strong>Municipio:</strong> ${punto.municipio}<br>
        <strong>Estado:</strong> ${punto.ESTADO}
      `)
      .addTo(capaAgua);
    });
  });

L.control.layers(null, {
  "Agua": capaAgua
}).addTo(map);
