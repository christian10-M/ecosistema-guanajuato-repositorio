<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$sql = "
SELECT
  Latitud  AS lat,
  Longitud AS lng,
  Municipio AS municipio,
  Estado AS estado
FROM minas
WHERE Latitud IS NOT NULL
  AND Longitud IS NOT NULL
";

$stmt = $pdo->query($sql);
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datos);
