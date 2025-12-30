<?php
require_once "../src/config/db.php";

$tipo = $_GET['tipo'] ?? 'mina'; // 👈 por defecto mina
$id   = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
  die("Información no encontrada");
}

if ($tipo === 'mina') {

  $stmt = $pdo->prepare("SELECT * FROM minas WHERE id = :id");
  $stmt->execute(['id' => $id]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$data) {
    die("Mina no encontrada");
  }

} elseif ($tipo === 'retc') {

  $stmt = $pdo->prepare("SELECT * FROM retc_leon WHERE ID = :id");
  $stmt->execute(['id' => $id]);
  $data = $stmt->fetch(PDO::FETCH_ASSOC);

  if (!$data) {
    die("Registro RETC no encontrado");
  }

}
else {
  die("Tipo inválido");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Información</title>
  <link rel="stylesheet" href="/ecosistema-guanajuato-repositorio/public/css/informacion.css">
</head>

<?php include 'includes/header.php'; ?> 

<body>

<div class="mina-detalle">

<?php if ($tipo === 'mina'): ?>

  <h1><?= htmlspecialchars($data['Nombre']) ?></h1>
  <p class="ubicacion">
    <strong>Municipio:</strong> <?= htmlspecialchars($data['Municipio']) ?>
  </p>

  <section>
    <h3>Proceso</h3>
    <p><?= htmlspecialchars($data['Tipo_de_proceso']) ?></p>
  </section>

  <section>
    <h3>Contaminantes</h3>
    <ul>
      <li><strong>Agua:</strong> <?= htmlspecialchars($data['Contaminante_agua']) ?></li>
      <li><strong>Suelo:</strong> <?= htmlspecialchars($data['Contaminante_suelo']) ?></li>
      <li><strong>Aire:</strong> <?= htmlspecialchars($data['Contaminante_aire']) ?></li>
    </ul>
  </section>

  <section>
    <h3>Referencias</h3>
    <p><?= nl2br(htmlspecialchars($data['Referencias_articulos'])) ?></p>
  </section>

<?php elseif ($tipo === 'retc'): ?>

  <h1><?= htmlspecialchars($data['sust']) ?></h1>
  <p class="ubicacion">
    <strong>Establecimiento:</strong> <?= htmlspecialchars($data['nombre']) ?><br>
    <strong>Municipio:</strong> <?= htmlspecialchars($data['MUNICIPIO']) ?>
  </p>

  <section>
    <h3>Emisiones</h3>
    <ul>
      <li><strong>Aire:</strong> <?= htmlspecialchars($data['AIRE']) ?> <?= htmlspecialchars($data['UNIDAD']) ?></li>
      <li><strong>Agua:</strong> <?= htmlspecialchars($data['AGUA']) ?></li>
      <li><strong>Suelo:</strong> <?= htmlspecialchars($data['SUELO']) ?></li>
      <li><strong>Matriz:</strong> <?= htmlspecialchars($data['matriz']) ?></li>
    </ul>
  </section>

  <section>
    <h3>Efectos</h3>
    <p><?= htmlspecialchars($data['efectos']) ?></p>
  </section>

<?php endif; ?>

  <a href="mapa.php" class="btn-volver">← Volver al mapa</a>

</div>

</body>
</html>
