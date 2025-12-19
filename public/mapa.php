<!DOCTYPE html>
<html lang="es">
<head>
  <!--Codificación UTF-8 para acentos-->
  <meta charset="UTF-8">
  <title>Mapa ICare</title>

  
  <!--Carga los estilos de Leaflet-->
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
  />
  <link rel="stylesheet" href="/ecosistema-guanajuato-repositorio/public/css/header.css">
</head>

<body>
<!--Inserta un header común-->
  <?php include 'includes/header.php'; ?>

<div id="map"></div>

<!--Motor del mapa-->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<!--Importar el js del mapa-->
<script src="js/mapa.js"></script>
<!-- Ctrl K + Ctrl C :ATAJO PARA COMENTAR -->
</body>
</html>
