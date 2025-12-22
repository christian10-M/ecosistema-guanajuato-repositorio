function cargarMetrica(url, elementoId, formato = v => v) {
  fetch(url)
    .then(r => r.json())
    .then(data => {
      const el = document.getElementById(elementoId);
      el.textContent = formato(data.total);
    })
    .catch(err => {
      console.error('Error cargando métrica:', err);
    });
}

// Cargar métricas al iniciar
cargarMetrica(
  'api/minas_total.php',
  'zonas-mineras'
);

cargarMetrica(
  'api/ladrilleras_total.php',
  'ladrilleras'
);

