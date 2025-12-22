<!DOCTYPE html>
<html lang="es">
<head>
    <?php include 'includes/header.php'; ?>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<header class="topbar">
    <div class="logo">
        <img src="assets/ecosafe-0.75.png" alt="">
        <span>Sistema de Información Ambiental y Riesgo Poblacional</span>
    </div>
    <a href="mapa.php" class="btn-mapa">Ver mapa</a>
</header>

<main class="container">

    <!-- TARJETAS DE MÉTRICAS -->
    <section class="stats">
        <div class="card">
            <h2 id="zonas-mineras">120</h2>
            <p>Zonas mineras activas</p>
        </div>

        <div class="card">
            <h2 id="ladrilleras">85</h2>
            <p>Ladrilleras registradas</p>
        </div>

        <div class="card">
            <h2 id="agua-calidad">42%</h2>
            <p>Agua con calidad baja</p>
        </div>

        <div class="card">
            <h2 id="personas-riesgo">150,000</h2>
            <p>Personas en zonas de riesgo</p>
        </div>
    </section>

    <!-- NOTICIAS -->
    <section class="news">
        <h2>Noticias y alertas ambientales</h2>

        <div class="news-grid">
            <article class="news-card blue">
                Actualización:<br>
                Datos de calidad del agua 2025 disponibles.
            </article>

            <article class="news-card teal">
                Nuevo registro de contaminación por plomo en Zacatecas.
            </article>

            <article class="news-card green">
                Nuevo registro de contaminación por plomo en Zacatecas.
            </article>
        </div>
    </section>

</main>

<script src="js/app.js"></script>
</body>
</html>
