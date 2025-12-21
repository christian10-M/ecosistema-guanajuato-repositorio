<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$municipio = $_GET['municipio'] ?? null;

$sql = "
SELECT
  LATITUD  AS lat,
  LONGITUD AS lng,
  Nombre AS nombre,
  MUNICIPIO AS municipio,
  ESTADO AS estado
FROM agua
WHERE LATITUD IS NOT NULL
  AND LONGITUD IS NOT NULL
  AND ESTADO='guanajuato'
";

$params = [];

if ($municipio) {
  $sql .= " AND UPPER(MUNICIPIO) = :municipio";
  $params[':municipio'] = strtoupper($municipio);
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));