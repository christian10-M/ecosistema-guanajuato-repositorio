<?php
header("Content-Type: application/json");
require_once "../../src/config/db.php";

$sql = "
SELECT COUNT(*) AS total
FROM ladrilleras
WHERE latitud IS NOT NULL
  AND longitud IS NOT NULL
  AND entidad='guanajuato'
  AND latitud <> ''
  AND longitud <> ''
  AND latitud BETWEEN -90 AND 90
AND longitud BETWEEN -180 AND 180
";

$stmt = $pdo->query($sql);
echo json_encode($stmt->fetch(PDO::FETCH_ASSOC));
