<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>EcoSafe</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --ecosafe-teal: #00C9B1;
      --ecosafe-dark: #eaeaea;
      --ecosafe-nav-text: #020202;
      --ecosafe-nav-hover: #ffffff;
    }

    body {
      font-family: 'Inter', sans-serif;
    }

    .navbar-ecosafe {
      background-color: var(--ecosafe-dark);
      padding: 0.75rem 2rem;
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }

    /* Logo */
    .navbar-brand {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
    }

    .logo-icon {
      width: 30px;
      height: 30px;
      color: var(--ecosafe-teal);
    }

    .brand-name {
      font-size: 1.1rem;
      font-weight: 700;
      color: #03090c;
      letter-spacing: 0.03em;
    }

    /* Nav links */
    .navbar-nav .nav-link {
      color: var(--ecosafe-nav-text);
      font-size: 0.875rem;
      font-weight: 500;
      padding: 0.4rem 0.9rem;
      transition: color 0.2s ease;
      letter-spacing: 0.01em;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
      color: var(--ecosafe-nav-hover);
    }

    /* Login button */
    .btn-login {
      background-color: var(--ecosafe-teal);
      color: #ffffff;
      font-size: 0.875rem;
      font-weight: 600;
      padding: 0.45rem 1.4rem;
      border-radius: 8px;
      border: none;
      text-decoration: none;
      transition: background-color 0.2s ease, transform 0.1s ease;
      letter-spacing: 0.02em;
    }

    .btn-login:hover {
      background-color: #00b3a0;
      color: #ffffff;
      transform: translateY(-1px);
    }

    /* Hamburger */
    .navbar-toggler {
      border-color: rgba(255,255,255,0.2);
    }
    .navbar-toggler-icon {
      filter: invert(1);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-ecosafe">
  <div class="container-fluid">

    <!-- Logo -->
    <a class="navbar-brand" href="index.php">
      <!-- Icono tipo matraz/laboratorio en SVG (teal) -->
      <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M9 3h6M10 3v6L6.5 15A4 4 0 0 0 10.3 21h3.4a4 4 0 0 0 3.8-6L14 9V3"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        <path d="M6.5 15h11" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
      </svg>
      <span class="brand-name">ECOSAFE</span>
    </a>

    <!-- Toggler para móvil -->
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Nav links -->
    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="mapa.php">Mapa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Análisis de datos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Colaboradores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Acerca del proyecto</a>
        </li>
      </ul>

      <!-- Botón Login -->
      <a href="login.php" class="btn-login">Login</a>
    </div>

  </div>
</nav>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>