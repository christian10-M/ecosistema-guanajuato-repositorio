<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$sql = "
SELECT
  latitud  AS lat,
  longitud AS lng,
  MUNICIPIO AS municipio,
  ESTADO AS estado
FROM retc_leon
WHERE Latitud IS NOT NULL
  AND Longitud IS NOT NULL
";

$stmt = $pdo->query($sql);
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datos);
