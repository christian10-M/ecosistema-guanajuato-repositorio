<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$municipio = $_GET['municipio'] ?? null;

$sql = "
SELECT
  Latitud  AS lat,
  Longitud AS lng,
  Nombre AS nombre,
  Municipio AS municipio,
  Estado AS estado
FROM minas
WHERE Latitud IS NOT NULL
  AND Longitud IS NOT NULL
  AND Estado='guanajuato'
  AND Latitud <> ''
  AND Longitud <> ''
  AND Latitud BETWEEN -90 AND 90
AND Longitud BETWEEN -180 AND 180
";

$params = [];

if ($municipio) {
  $sql .= " AND UPPER(MUNICIPIO) = :municipio";
  $params[':municipio'] = strtoupper($municipio);
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));