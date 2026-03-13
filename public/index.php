<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EcoSafe</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=DM+Sans:wght@400;500&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --teal:      #00C9B1;
      --teal-dark: #00a896;
      --dark:      #111827;
      --body-bg:   #f0f4f4;
    }
    * { box-sizing: border-box; }
    body {
      font-family: 'DM Sans', sans-serif;
      background-color: var(--body-bg);
      color: var(--dark);
      margin: 0;
    }
    h1, h2, h3 { font-family: 'Sora', sans-serif; }

    /* ── HERO ── */
    .hero {
      background: linear-gradient(135deg, #e8f5f4 0%, #f0f9f8 60%, #f5fbfb 100%);
      padding: 5rem 0 4rem;
    }
    .hero-title {
      font-size: clamp(2.2rem, 4vw, 3rem);
      font-weight: 800;
      line-height: 1.15;
      margin-bottom: 1.2rem;
    }
    .hero-title .accent { color: var(--teal); }
    .hero-subtitle {
      font-size: .975rem;
      color: #4b5563;
      max-width: 420px;
      line-height: 1.7;
      margin-bottom: 2.2rem;
    }
    .btn-hero-primary {
      background: var(--teal); color: #fff;
      font-weight: 600; font-size: .9rem;
      padding: .7rem 1.6rem; border-radius: 10px;
      border: none; text-decoration: none; display: inline-block;
      transition: background .2s, transform .15s;
    }
    .btn-hero-primary:hover { background: var(--teal-dark); color:#fff; transform:translateY(-2px); }
    .btn-hero-outline {
      background: transparent; color: var(--dark);
      font-weight: 600; font-size: .9rem;
      padding: .7rem 1.6rem; border-radius: 10px;
      border: 2px solid #d1d5db; text-decoration: none; display: inline-block;
      transition: border-color .2s, color .2s, transform .15s;
    }
    .btn-hero-outline:hover { border-color: var(--teal); color: var(--teal); transform:translateY(-2px); }

    /* Mapa card */
    .map-card {
      background: #fff; border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0,0,0,0.10); overflow: hidden;
    }
    .map-placeholder {
      background: #e9eef2; height: 280px;
      display: flex; align-items: center; justify-content: center;
    }
    .map-placeholder i { font-size: 4rem; color: #b0bac5; }
    .map-badge {
      padding: 1rem 1.25rem; display: flex; align-items: center;
      gap: .6rem; font-size: .85rem; font-weight: 500;
      border-top: 1px solid #f3f4f6;
    }
    .dot-live {
      width: 10px; height: 10px; background: #ef4444;
      border-radius: 50%; flex-shrink: 0; animation: pulse 1.8s infinite;
    }
    @keyframes pulse {
      0%,100% { box-shadow: 0 0 0 0 rgba(239,68,68,.4); }
      50%      { box-shadow: 0 0 0 6px rgba(239,68,68,0); }
    }

    /* ── STATS MÉTRICAS ── */
    .stats-bar {
      background: #fff;
      border-top: 1px solid #e5e7eb;
      border-bottom: 1px solid #e5e7eb;
      padding: 2rem 0;
    }
    .stat-label {
      font-size: .72rem; font-weight: 600;
      letter-spacing: .08em; text-transform: uppercase;
      color: #6b7280; margin-bottom: .25rem;
    }
    .stat-value {
      font-family: 'Sora', sans-serif;
      font-size: 2rem; font-weight: 800;
    }
    .stat-divider {
      width: 1px; background: #e5e7eb;
      height: 50px; align-self: center;
    }

    /* ── ÁREAS / NOTICIAS ── */
    .section-areas { padding: 4rem 0 3rem; }
    .section-title  { font-size: 1.75rem; font-weight: 700; margin-bottom: .5rem; }
    .section-underline {
      width: 48px; height: 4px;
      background: var(--teal); border-radius: 4px; margin-bottom: 2.5rem;
    }

    /* News cards */
    .news-card {
      border-radius: 16px;
      padding: 1.5rem;
      font-size: .9rem;
      font-weight: 500;
      line-height: 1.6;
      color: #fff;
      height: 100%;
      transition: transform .2s, box-shadow .2s;
    }
    .news-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(0,0,0,0.12); }
    .news-card.blue  { background: linear-gradient(135deg, #3b82f6, #1d4ed8); }
    .news-card.teal  { background: linear-gradient(135deg, #00C9B1, #007a6e); }
    .news-card.green { background: linear-gradient(135deg, #22c55e, #15803d); }
    .news-card .badge-tag {
      display: inline-block;
      background: rgba(255,255,255,0.25);
      border-radius: 20px;
      font-size: .72rem;
      padding: .2rem .7rem;
      margin-bottom: .75rem;
      letter-spacing: .04em;
    }

    /* Fade-up */
    .fade-up { opacity:0; transform:translateY(24px); animation: fadeUp .6s forwards; }
    .fade-up:nth-child(1) { animation-delay:.1s; }
    .fade-up:nth-child(2) { animation-delay:.25s; }
    @keyframes fadeUp { to { opacity:1; transform:translateY(0); } }
  </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<!-- ── HERO ── -->
<section class="hero">
  <div class="container">
    <div class="row align-items-center g-5">

      <div class="col-lg-6 fade-up">
        <h1 class="hero-title">
          Democratizando la<br>
          <span class="accent">Transparencia<br>Científica</span> para la<br>
          Salud pública
        </h1>
        <p class="hero-subtitle">
          Visualizando la intersección de los factores de riesgo ambientales
          y la incidencia de enfermedades en León, Guanajuato.
        </p>
        <div class="d-flex flex-wrap gap-3">
          <a href="mapa.php" class="btn-hero-primary">Explorar el Mapa</a>
          <a href="dashboard.php" class="btn-hero-outline">Ver el análisis de datos</a>
        </div>
      </div>

      <div class="col-lg-6 fade-up">
        <div class="map-card">
          <div class="map-placeholder">
            <i class="bi bi-map"></i>
          </div>
          <div class="map-badge">
            <span class="dot-live"></span>
            Capas de datos de salud en vivo
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ── STATS (datos del script original) ── -->
<div class="stats-bar">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center">

      <div class="col-12 col-md py-2">
        <div class="stat-label">Minas en el Estado</div>
        <div class="stat-value" id="zonas-mineras">--</div>
      </div>
      <div class="stat-divider d-none d-md-block mx-4"></div>

      <div class="col-12 col-md py-2">
        <div class="stat-label">Ladrilleras registradas</div>
        <div class="stat-value" id="ladrilleras">--</div>
      </div>
      <div class="stat-divider d-none d-md-block mx-4"></div>

      <div class="col-12 col-md py-2">
        <div class="stat-label">Pozos</div>
        <div class="stat-value" id="agua-calidad">42%</div>
      </div>
      <div class="stat-divider d-none d-md-block mx-4"></div>

      <div class="col-12 col-md py-2">
        <div class="stat-label">Personas en zonas de riesgo</div>
        <div class="stat-value" id="personas-riesgo">150,000</div>
      </div>

    </div>
  </div>
</div>

<!-- ── NOTICIAS Y ALERTAS ── -->
<section class="section-areas">
  <div class="container">
    <h2 class="section-title">Noticias y alertas ambientales</h2>
    <div class="section-underline"></div>

    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="news-card blue">
          <span class="badge-tag">Actualización</span><br>
          Datos de calidad del agua 2025 disponibles.
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="news-card teal">
          <span class="badge-tag">Alerta</span><br>
          Nuevo registro de contaminación por plomo en Zacatecas.
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="news-card green">
          <span class="badge-tag">Reporte</span><br>
          Nuevo registro de contaminación por plomo en Zacatecas.
        </div>
      </div>
    </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>