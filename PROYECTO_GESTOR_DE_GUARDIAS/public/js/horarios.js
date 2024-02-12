function generarCasillas() {
  const tabla = document
    .getElementById("calendar")
    .getElementsByTagName("tbody")[0];
  let horaInicio = new Date();
  horaInicio.setHours(16, 0); // Hora de inicio a las 16:00
  const duracionClase = 55; // Duración de cada clase en minutos
  const descansoInicio = new Date(horaInicio);
  descansoInicio.setHours(18, 45); // Inicio del descanso
  const descansoFin = new Date(descansoInicio);
  descansoFin.setMinutes(descansoInicio.getMinutes() + 25); // Fin del descanso
  let bloque = 1; // Inicializar contador de bloques horarios
  let horaActual = new Date(horaInicio);

  const tablaBody = document.getElementById("calendar").getElementsByTagName("tbody")[0];
  tablaBody.innerHTML = ''; 
  
  while (
    horaActual.getHours() < 21 ||
    (horaActual.getHours() === 21 && horaActual.getMinutes() < 55)
  ) {
    // Comprobar si es hora del descanso y ajustar horaActual si es necesario
    if (horaActual >= descansoInicio && horaActual < descansoFin) {
      horaActual = new Date(descansoFin);
    }

    // Generar fila y celdas para el bloque horario actual
    let fila = tabla.insertRow();
    let celdaHora = fila.insertCell();
    celdaHora.textContent = `${formatoHora(horaActual)} - ${formatoHora(
      new Date(horaActual.getTime() + duracionClase * 60000)
    )}`;
    let letrasDias = ["L", "M", "X", "J", "V"];

    for (let dia = 0; dia < letrasDias.length; dia++) {
      let celda = fila.insertCell();
      celda.id = `${letrasDias[dia]}-${bloque}`;
      // Aquí puedes añadir más lógica para interacción, como clases CSS, eventos, etc.
    }

    // Incrementar horaActual y bloque solo si no es la hora del descanso
    horaActual = new Date(horaActual.getTime() + duracionClase * 60000);
    if (!(horaActual > descansoInicio && horaActual < descansoFin)) {
      bloque++;
    }
  }
}

function formatoHora(fecha) {
  return fecha.toTimeString().substring(0, 5);
}

document.addEventListener("DOMContentLoaded", function () {
  generarCasillas();
});
