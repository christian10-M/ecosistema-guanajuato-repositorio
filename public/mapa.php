<!DOCTYPE html>
<html lang="es">
<head>
  <!--Codificación UTF-8 para acentos-->
  <meta charset="UTF-8">
  <title>Mapa ICare</title>

  
  <!--Carga los estilos-->
  <!-- CCS Leaflet -->
  <link rel="stylesheet"href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <!-- CSS Fullscreen  -->
<link rel="stylesheet"href="https://unpkg.com/leaflet.fullscreen@1.6.0/Control.FullScreen.css"/>
  <!-- CSS mapa -->
  <link rel="stylesheet" href="/ecosistema-guanajuato-repositorio/public/css/mapa.css">
<!-- CHOICES.JS -->
 <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
<!--Inserta un header común-->
  <?php include 'includes/header.php'; ?>

</head>

<body>

<div id="map-wrapper">

  <div id="filtros">
  <label for="municipioSelect">Municipio:</label>
  <select id="municipioSelect">
    <option value="">Todos</option>
  </select>

   <!-- BOTÓN LIMPIAR -->
  <button id="btnLimpiar" type="button">🧹</button>
  
</div>

<div id="map"></div>

</div>

<!-- Carga los Scripts -->
<!--Motor del mapa / Leaflet JS-->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!-- Fullscreen plugin -->
<script src="https://unpkg.com/leaflet.fullscreen@1.6.0/Control.FullScreen.js"></script>
<!-- CHOICES -->
  <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!--Importar el js del mapa-->
<script src="js/mapa.js?=v2"></script>
<!-- Ctrl K + Ctrl C :ATAJO PARA COMENTAR -->
</body>
</html>
