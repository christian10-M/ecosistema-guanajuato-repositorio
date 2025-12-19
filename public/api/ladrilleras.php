<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

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

$stmt = $pdo->query($sql);
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datos);
