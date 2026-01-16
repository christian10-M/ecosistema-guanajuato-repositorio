<?php
header("Content-Type: application/json");
require_once "../../src/config/db.php";

$tipo = $_GET['tipo'] ?? 'mapa';
$municipio = $_GET['municipio'] ?? null;

switch($tipo){

// ==========================
case 'cancer':

$sql = "
SELECT 
  `sitio-tipo-cáncer` AS tipo,
  COUNT(*) as total
FROM retc_leon
WHERE 
  `sitio-tipo-cáncer` IS NOT NULL
  AND `sitio-tipo-cáncer` != ''
  AND LOWER(`sitio-tipo-cáncer`) != 'sd'
GROUP BY `sitio-tipo-cáncer`
ORDER BY total DESC
LIMIT 10
";
break;


// ==========================
case 'cama':
// Dashboard 2
$sql = "
SELECT 
  sust AS sustancia,
  COUNT(*) as total
FROM retc_leon
WHERE CAMA = 'SI'
GROUP BY sust
ORDER BY total DESC
LIMIT 10
";
break;

// ==========================
case 'efectos':
$sql = "
SELECT 
  efectos,
  COUNT(*) as total
FROM retc_leon
GROUP BY efectos
";
break;

// ==========================
case 'disruptores':

$sql = "
SELECT 
  sust,
  COUNT(*) as total
FROM retc_leon
WHERE 
  DE = 'si'
  AND sust IS NOT NULL
  AND sust != ''
  AND LOWER(sust) != 'sd'
GROUP BY sust
ORDER BY total DESC
LIMIT 12
";
break;

// ==========================
default:
// MODO MAPA (tu actual)
$sql = "
SELECT
  id,
  latitud  AS lat,
  longitud AS lng,
  nombre,
  MUNICIPIO AS municipio,
  ESTADO AS estado
FROM retc_leon
WHERE latitud IS NOT NULL
";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
