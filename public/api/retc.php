<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$municipio = $_GET['municipio'] ?? null;

$sql = "
SELECT
  id,
  latitud  AS lat,
  longitud AS lng,
  nombre AS nombre,
  MUNICIPIO AS municipio,
  ESTADO AS estado
FROM retc_leon
WHERE latitud IS NOT NULL
  AND longitud IS NOT NULL
  AND latitud <> ''
  AND longitud <> ''
  AND latitud BETWEEN -90 AND 90
  AND longitud BETWEEN -180 AND 180
";

$params = [];

if ($municipio) {
  $sql .= " AND UPPER(MUNICIPIO) = :municipio";
  $params[':municipio'] = strtoupper($municipio);
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));