Ecosistema Guanajuato – Plataforma de Visualización Geoespacial

Este proyecto es una plataforma web para la visualización, análisis y filtrado de datos geoespaciales relacionados con variables ambientales, industriales y de salud en el estado de Guanajuato.
El sistema permite mostrar diferentes capas de información sobre un mapa interactivo utilizando Leaflet, consumiendo datos desde una base de datos MySQL a través de una API desarrollada en PHP.


Arquitectura General

El proyecto utiliza una arquitectura cliente-servidor dividida en tres capas principales, lo que permite una mejor organización del código, mantenimiento y escalabilidad.

1. Frontend

Tecnologías utilizadas:
HTML5
CSS
JavaScript
Leaflet.js (visualización geoespacial)

Responsabilidades:
Renderizar el mapa interactivo
Solicitar datos al backend mediante fetch()
Dibujar puntos, capas y popups en el mapa
Controlar la activación y desactivación de capas

El frontend no accede directamente a la base de datos, solo consume información en formato JSON proveniente de la API.

2. Backend (API)

Tecnologías utilizadas:
PHP
PDO para la conexión a MySQL

Responsabilidades:
Actuar como intermediario entre el frontend y la base de datos
Ejecutar consultas SQL
Filtrar y transformar datos
Devolver respuestas en formato JSON

Endpoints
Cada conjunto de datos cuenta con su propio endpoint:

public/api/
├── agua.php
├── minas.php
├── ladrilleras.php
├── retc.php
├── salud.php


Cada endpoint:
Realiza una consulta específica
Normaliza los nombres de columnas usando alias SQL
Devuelve únicamente los campos necesarios para el mapa

Ejemplo:
SELECT
  LATITUD AS lat,
  LONGITUD AS lng,
  MUNICIPIO AS municipio,
  ESTADO AS estado
FROM agua

Esto permite que el frontend trabaje con una estructura de datos homogénea, aunque las tablas tengan columnas con nombres distintos.

3. Base de Datos

Tecnología utilizada:
MySQL

La base de datos almacena distintos conjuntos de información, entre ellos:
Agua
Minas
Ladrilleras
RETC
Unidades de salud

Cada tabla conserva su estructura original, sin forzar una normalización agresiva, ya que la normalización de nombres se realiza en la capa de backend mediante SQL.

4. Flujo de Datos
El usuario carga la vista del mapa
El frontend inicializa Leaflet
Se realiza una petición fetch() a un endpoint (api/agua.php, por ejemplo)
El backend consulta MySQL
El backend devuelve datos en formato JSON
El frontend recorre los datos y crea los marcadores
Los puntos se agregan a una capa específica del mapa

5. Capas del Mapa
Cada capa del mapa corresponde a:
Una tabla en la base de datos
Un endpoint de la API
Un L.layerGroup() en Leaflet

Esto permite:
Activar y desactivar capas
Escalar fácilmente agregando nuevas capas
Mantener independencia entre datasets

6. Filtros y Alcance Geográfico

El proyecto está enfocado exclusivamente en el estado de Guanajuato.
Por esta razón, los filtros geográficos se aplican directamente en la API, por ejemplo:

AND ESTADO = 'Guanajuato'

Esto reduce:
La cantidad de datos enviados al frontend
El procesamiento innecesario en el navegador
El riesgo de errores o inconsistencias

7. Organización del Código
ecosistema-guanajuato-repositorio/
├── public/
│   ├── api/
|   ├── assets/
|   ├── css/
│   ├── includes/
│   ├── js/
|   ├── index.php
│   └── mapa.php
├── src/
│   |── config/
│   |    └── db.php
|   ├── README.md
└── .gitignore


db.php: configuración central de la conexión a la base de datos

api/: endpoints del backend

assets/: imagenes usadas en el proyecto

css/: estilos del proyecto

includes/: componentes reutilizables (header, etc.)

js/: lógica del mapa y capas


8. Escalabilidad y Futuro

La separación por capas permite:
Agregar filtros dinámicos (?estado=, ?municipio=)
Reutilizar endpoints para otras vistas
Migrar el backend a Node.js
Migrar el frontend a frameworks como React o Vue
Implementar autenticación o control de acceso

9. Trabajo Colaborativo

El proyecto utiliza GitHub para control de versiones.
Flujo de trabajo:
git pull antes de comenzar a trabajar

Realizar cambios locales
git add .

git commit -m "Descripción clara del cambio"

git push

Esto permite que varios desarrolladores trabajen en paralelo sin conflictos.