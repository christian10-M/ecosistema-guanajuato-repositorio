<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mapa ICare</title>

  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  />

  <style>
    #map {
      height: 100vh;
    }
  </style>
</head>
<body>
  <?php include 'includes/header.php'; ?>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
  const map = L.map('map').setView([21.02, -101.25], 8);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap'
  }).addTo(map);

  const capaAgua = L.layerGroup().addTo(map);

fetch('api/agua.php')
  .then(response => response.json())
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


</script>

</body>
</html>
