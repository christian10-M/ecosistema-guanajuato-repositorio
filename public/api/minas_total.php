<?php
header("Content-Type: application/json");
require_once "../../src/config/db.php";

$sql = "
SELECT COUNT(*) AS total
FROM minas
WHERE ESTADO = 'guanajuato'
";

$stmt = $pdo->query($sql);
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($resultado);
