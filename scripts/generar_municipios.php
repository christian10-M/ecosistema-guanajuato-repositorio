<?php
require_once "../src/config/db.php";

/*
  Este script:
  1. Obtiene municipios desde distintas tablas
  2. Normaliza nombres (trim + upper)
  3. Elimina duplicados
  4. Inserta los municipios únicos en la tabla municipios
*/

// 1. Arreglo con las tablas y el campo municipio correspondiente
$fuentes = [
  ['tabla' => 'agua',        'campo' => 'MUNICIPIO'],
  ['tabla' => 'minas',       'campo' => 'Municipio'],
  ['tabla' => 'ladrilleras', 'campo' => 'municipio'],
  ['tabla' => 'retc_leon',        'campo' => 'MUNICIPIO'],
  ['tabla' => 'ssguanajuato','campo' => '`Nombre Municipio`'],
];

// 2. Arreglo para almacenar municipios únicos
$municipios = [];

// 3. Recorremos cada fuente
foreach ($fuentes as $fuente) {

  $sql = "
    SELECT DISTINCT {$fuente['campo']} AS municipio
    FROM {$fuente['tabla']}
    WHERE {$fuente['campo']} IS NOT NULL
  ";

  $stmt = $pdo->query($sql);
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($resultados as $fila) {
    // Normalizamos el nombre
    $nombre = strtoupper(trim($fila['municipio']));

    if ($nombre !== '') {
      $municipios[$nombre] = true; // clave única
    }
  }
}

// 4. Insertamos en la tabla municipios
$insert = $pdo->prepare("
  INSERT IGNORE INTO municipios (municipio, estado)
  VALUES (:municipio, :estado)
");

foreach (array_keys($municipios) as $nombre) {
  $insert->execute([
    ':municipio' => $nombre,
    ':estado'    => 'GUANAJUATO'
  ]);
}

echo "Municipios insertados correctamente: " . count($municipios);
