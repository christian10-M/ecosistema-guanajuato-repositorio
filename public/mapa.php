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


</head>

<body>
<!--Inserta un header común-->
  <?php include 'includes/header.php'; ?>

<div id="map"></div>

<!-- Carga los Scripts -->
<!--Motor del mapa / Leaflet JS-->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!-- Fullscreen plugin -->
<script src="https://unpkg.com/leaflet.fullscreen@1.6.0/Control.FullScreen.js"></script>
<!--Importar el js del mapa-->
<script src="js/mapa.js"></script>
<!-- Ctrl K + Ctrl C :ATAJO PARA COMENTAR -->
</body>
</html>
