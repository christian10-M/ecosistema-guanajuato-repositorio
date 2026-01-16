<!DOCTYPE html>
<html lang="es">
    <head>
      <?php include 'includes/header.php'; ?>
      <link rel="stylesheet" href="/ecosistema-guanajuato-repositorio/public/css/dashboard.css">
    </head>

    <main class="container">

<h1 class="titulo-principal">Análisis de datos</h1>

<!-- ============ RETC ============ -->
<section class="bloque">
  <h2 class="titulo-bd">RETC</h2>

  <div class="carrusel">

    <div class="dash-card">
      <h3>Distribución por tipo de cáncer</h3>

      <canvas id="graf1"></canvas>

      <a href="detalle.php?id=retc_municipio" class="btn-detalle">
        Ver detalle
      </a>
    </div>

    <div class="dash-card">
      <h3>Sustancias asociadas a Cáncer de mama</h3>

      <canvas id="graf2"></canvas>

      <a href="detalle.php?id=retc_tipo" class="btn-detalle">
        Ver detalle
      </a>
    </div>

    <div class="dash-card">
      <h3>Tipos de riesgo identificados</h3>

      <canvas id="graf3"></canvas>

      <a href="detalle.php?id=retc_tipo" class="btn-detalle">
        Ver detalle
      </a>
    </div>

    <div class="dash-card">
      <h3>Disruptores endocrinos por sustancia</h3>

      <canvas id="graf4"></canvas>

      <a href="detalle.php?id=retc_tipo" class="btn-detalle">
        Ver detalle
      </a>
    </div>

  </div>
</section>


<!-- ============ SALUD ============ -->
<section class="bloque">
  <h2 class="titulo-bd">Salud</h2>

  <div class="carrusel">

    <div class="dash-card">
      <h3>Cáncer de mama por municipio</h3>

      <canvas id="graf3"></canvas>

      <a href="detalle.php?id=salud_cancer" class="btn-detalle">
        Ver detalle
      </a>
    </div>

  </div>
</section>

</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/dashboard.js"></script>

<html>