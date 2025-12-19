El proyecto utiliza una arquitectura cliente-servidor dividida en tres capas:

1. Frontend

HTML, CSS y JavaScript

Leaflet.js para la visualización geoespacial

Consume datos mediante peticiones fetch() a una API

2. Backend

PHP como intermediario entre el frontend y la base de datos

Cada capa del mapa cuenta con un endpoint independiente

Los endpoints devuelven datos en formato JSON

3. Base de datos

MySQL

Almacena los distintos conjuntos de datos (agua, minas, ladrilleras, etc.)

Los nombres de columnas se normalizan usando alias SQL

Esta separación permite:

Escalabilidad

Mantenimiento sencillo

Posible migración futura a tecnologías modernas (Node.js, React)