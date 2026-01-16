async function cargarCancer() {

  const res = await fetch('api/retc.php?tipo=cancer');
  const datos = await res.json();

  const labels = datos.map(d => d.tipo);
  const valores = datos.map(d => d.total);

  new Chart(document.getElementById('graf1'), {
    type: 'bar',
    data: {
      labels: labels,
      datasets: [{
        label: 'Casos',
        data: valores,
        backgroundColor: '#2f9aa3'
      }]
    },
    options: {
      scales: {
      x: {
        display: false   // ❌ oculta textos de abajo
      }
    },

    plugins: {
      legend: {
        display: false
      },

      tooltip: {
        callbacks: {
          title: function(items) {
            return items[0].label; // 👈 nombre COMPLETO solo en hover
          }
        }
      }
    }
  }
  });

}

async function cargarGraficoSustanciasCAMA() {

  const r = await fetch('api/retc.php?tipo=cama');
  const data = await r.json();

  const labels = data.map(x => x.sustancia);
  const valores = data.map(x => x.total);

  const ctx = document.getElementById('graf2');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels,
      datasets: [{
        label: 'Registros con CAMA = ',
        data: valores,
        backgroundColor: '#c2185b'
      }]
    },

    options: {
      scales: {
        x: {
          display: false   // 👉 igual que el 1, limpio
        }
      },

      plugins: {
        legend: {
          display: false
        },

        tooltip: {
          callbacks: {
            title: items => items[0].label
          }
        }
      }
    }
  });
}

async function cargarGraficoEfectos() {

  const r = await fetch('api/retc.php?tipo=efectos');
  const data = await r.json();

  const labels = data.map(x => x.efectos);
  const valores = data.map(x => x.total);

  const ctx = document.getElementById('graf3');

  new Chart(ctx, {
    type: 'doughnut',

    data: {
      labels,
      datasets: [{
        data: valores,
        backgroundColor: [
          '#e53935',
          '#8e24aa',
          '#3949ab',
          '#039be5',
          '#43a047',
          '#fb8c00'
        ]
      }]
    },

    options: {
      plugins: {
        legend: {
          position: 'right'
        },

        tooltip: {
          callbacks: {
            label: item => 
              `${item.label}: ${item.raw} registros`
          }
        }
      }
    }

  });

}

async function cargarGraficoDisruptores() {

  const r = await fetch('api/retc.php?tipo=disruptores');
  const data = await r.json();

  const labels = data.map(x => x.sust);
  const valores = data.map(x => x.total);

  const ctx = document.getElementById('graf4');

  new Chart(ctx, {
    type: 'polarArea',

    data: {
      labels,
      datasets: [{
        data: valores,
        backgroundColor: [
          '#e53935aa',
          '#8e24aaaa',
          '#3949abaa',
          '#039be5aa',
          '#43a047aa',
          '#fb8c00aa',
          '#6d4c41aa',
          '#00acc1aa',
          '#c0ca33aa',
          '#5e35b1aa',
          '#fdd835aa',
          '#d81b60aa'
        ]
      }]
    },

    options: {

      scales: {
        r: {
          ticks: {
            display: false
          }
        }
      },

      plugins: {

        legend: {
          position: 'right',
          labels: {
            font: {
              size: 11
            }
          }
        },

        tooltip: {
          callbacks: {
            label: i =>
              `${i.label}: ${i.raw} registros`
          }
        }

      }

    }

  });

}



cargarCancer();
cargarGraficoSustanciasCAMA();
cargarGraficoEfectos();
cargarGraficoDisruptores();

