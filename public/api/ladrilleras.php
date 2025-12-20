<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$municipio = $_GET['municipio'] ?? null;

$sql = "
SELECT
  latitud  AS lat,
  longitud AS lng,
  localidad AS localidad,
  municipio AS municipio,
  entidad AS estado
FROM ladrilleras
WHERE Latitud IS NOT NULL
  AND Longitud IS NOT NULL
  AND entidad='guanajuato'
";

$params = [];

if ($municipio) {
  $sql .= " AND UPPER(MUNICIPIO) = :municipio";
  $params[':municipio'] = strtoupper($municipio);
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));