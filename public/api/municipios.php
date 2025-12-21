<?php
header("Content-Type: application/json");

require_once "../../src/config/db.php";

$sql = "
  SELECT DISTINCT municipio
  FROM municipios
  WHERE estado = 'GUANAJUATO'
  ORDER BY municipio
";

$stmt = $pdo->query($sql);
$municipios = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode($municipios);
