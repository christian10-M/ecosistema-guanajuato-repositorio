<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$municipio = $_GET['municipio'] ?? null;

$sql = "
SELECT
  Y AS lat,
  X AS lng,
  edad,
  dgx,
  sexo,
  FechaDgx
FROM CAMA_casos
WHERE Y IS NOT NULL
  AND X IS NOT NULL
  AND nom_ent = 'Guanajuato'
  AND Y <> ''
  AND X <> ''
  AND Y BETWEEN -90 AND 90
  AND X BETWEEN -180 AND 180
";

$params = [];

if ($municipio) {
  $sql .= " AND UPPER(nom_mun) = :municipio";
  $params[':municipio'] = strtoupper($municipio);
}

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
