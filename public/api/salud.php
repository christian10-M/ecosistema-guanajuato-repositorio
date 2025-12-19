<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$sql = "
SELECT
  LATITUD  AS lat,
  LONGITUD AS lng,
  `Nombre Municipio` AS municipio,
  Estado AS estado
FROM ssguanajuato
WHERE LATITUD IS NOT NULL
  AND LONGITUD IS NOT NULL
";

$stmt = $pdo->query($sql);
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datos);
