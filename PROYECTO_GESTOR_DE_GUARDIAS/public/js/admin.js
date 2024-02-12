document.addEventListener("DOMContentLoaded", function () {
  cargarProfesores().then(mostrarProfesores);
  prepararCeldasParaDrop();
  cargarProfesores().then(() => {
    cargarTodasLasGuardias();
  });
  const logoutButton = document.getElementById('logout-button');
  if (logoutButton) {
    logoutButton.addEventListener('click', cerrarSesion);
  }
});

function cerrarSesion() {
  // Aquí podrías también limpiar la sesión o tokens de autenticación si es necesario
  window.location.href = 'index.html'; // Redirigir al usuario al index.html
}

// Evento para escuchar cuando se cargue el DOM
document.addEventListener('DOMContentLoaded', () => {
  const logoutButton = document.getElementById('logout-button');
  if (logoutButton) {
    logoutButton.addEventListener('click', cerrarSesion);
  }
  const botonEliminarTodas = document.getElementById('eliminar-todas-guardias');
  if (botonEliminarTodas) {
    botonEliminarTodas.addEventListener('click', eliminarTodasLasGuardias);
  }
});

function prepararCeldasParaDrop() {
  document.querySelectorAll("#calendar td").forEach((celda) => {
    celda.addEventListener("dragover", function (event) {
      event.preventDefault(); // Esto es necesario para permitir el drop
    });

    celda.addEventListener("drop", function (event) {
      event.preventDefault();
      const profesorId = event.dataTransfer.getData("text/plain");
      console.log(`Soltaste al ${profesorId} en la celda ${this.id}`);

      // Aquí invocas a asignarGuardia o la lógica para procesar el drop
      asignarGuardia(profesorId, this.id);
    });
  });
}

let asignacionesGuardias = {};

function asignarGuardia(profesorId, celdaId) {
  // Comprobación 1: Verificar si la celda ya tiene un profesor asignado
  if (asignacionesGuardias[celdaId]) {
    alert(`La celda ${celdaId} ya tiene un profesor asignado.`);
    return;
  }

  // Comprobación 2: Verificar si el profesor ya está asignado a otra celda el mismo día
  const diaCelda = celdaId.split("-")[0]; // Asume que el ID de celda sigue un formato 'Día-Índice'
  for (const [key, value] of Object.entries(asignacionesGuardias)) {
    if (value === profesorId && key.startsWith(diaCelda)) {
      alert(`El profesor ya está asignado a una celda el ${diaCelda}.`);
      return;
    }
  }

  // Pedir al usuario que introduzca la descripción de la guardia
  const descripcion = prompt("Introduce la clase de la guardia:");

  // Si el usuario presiona cancelar, prompt() devuelve null. Aquí se detiene la ejecución.
  if (descripcion === null) {
    console.log("Asignación de guardia cancelada por el usuario.");
    return; // Detiene la ejecución si el usuario cancela
  }

  // Preparar los datos para enviar al servidor, incluyendo la descripción
  var data = JSON.stringify({
    profesorId: profesorId,
    celdaId: celdaId,
    descripcion: descripcion // Incluir la descripción en los datos enviados
  });

  // Configuración de la solicitud AJAX
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/guardias", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      console.log("Guardia asignada con éxito:", JSON.parse(xhr.responseText));
      asignacionesGuardias[celdaId] = profesorId; // Actualizar el registro de asignaciones
      // Asegúrate de tener una función para actualizar la UI de manera adecuada
      actualizarCelda(celdaId, profesorId, descripcion); 
    } else {
      alert("Error al asignar guardia: " + xhr.statusText);
    }
  };

  xhr.onerror = function () {
    alert("Error en la petición XHR");
  };

  xhr.send(data);
}


function actualizarCelda(celdaId, profesorId, descripcion) {
  const celda = document.getElementById(celdaId);
  if (celda) {
    // Agrega la descripción de alguna manera, por ejemplo, como un tooltip
    celda.innerHTML = `${profesorId} <span class="descripcion-tooltip">${descripcion}</span>
      <div class="guardia-buttons">
        <button class="edit-btn" onclick="editarGuardia('${celdaId}')">Editar</button>
        <button class="delete-btn" onclick="eliminarGuardia('${celdaId}')">Eliminar</button>
      </div>`;
  }
}



function editarGuardia(celdaId) {
  // Asumiendo que asignacionesGuardias ahora guarda objetos con profesorId y descripcion
  const guardiaActual = asignacionesGuardias[celdaId];
  
  if (!guardiaActual) {
    alert('No hay guardia asignada en esta celda');
    return;
  }

  // Utiliza el profesorId actual de la guardia
  const profesorIdActual = guardiaActual.profesorId;
  const descripcionActual = guardiaActual.descripcion; // Usa la descripción actual guardada

  // Pedir el nuevo ID del profesor (opcionalmente puedes omitir esto si no necesitas cambiar el profesor)
  const nuevoProfesorId = prompt('Ingresa el ID del nuevo profesor para esta guardia:', profesorIdActual) || profesorIdActual;

  // Pedir la nueva descripción para la guardia
  const nuevaDescripcion = prompt('Ingresa la nueva descripción para esta guardia:', descripcionActual);

  // Verificar si hubo cambios antes de enviar la solicitud
  if (nuevoProfesorId !== profesorIdActual || nuevaDescripcion !== descripcionActual) {
    var xhr = new XMLHttpRequest();
    xhr.open("PUT", `/guardias/${celdaId}`, true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 300) {
        console.log("Guardia actualizada con éxito");
        actualizarCelda(celdaId, nuevoProfesorId, nuevaDescripcion);
        // Actualiza el registro de asignaciones con el nuevo profesorId y descripción
        asignacionesGuardias[celdaId] = { profesorId: nuevoProfesorId, descripcion: nuevaDescripcion };
      } else {
        console.error("Error al actualizar la guardia:", xhr.statusText);
      }
    };

    xhr.onerror = function() {
      console.error("Error en la petición XHR");
    };

    var data = JSON.stringify({
      profesorId: nuevoProfesorId,
      descripcion: nuevaDescripcion // Incluir la nueva descripción en los datos enviados
    });

    xhr.send(data);
  } else {
    alert('No se hicieron cambios en la guardia.');
  }
}


function eliminarGuardia(celdaId) {
  if (confirm('¿Estás seguro de que deseas eliminar esta guardia?')) {
    var xhr = new XMLHttpRequest();
    xhr.open("DELETE", `/guardias/${celdaId}`, true);

    xhr.onload = function() {
      if (xhr.status >= 200 && xhr.status < 300) {
        console.log("Guardia eliminada con éxito");
        const celda = document.getElementById(celdaId);
        if (celda) {
          celda.innerHTML = ''; // Limpiar el contenido de la celda
          delete asignacionesGuardias[celdaId]; // Eliminar del registro de asignaciones
        }
      } else {
        console.error("Error al eliminar la guardia:", xhr.statusText);
      }
    };

    xhr.onerror = function() {
      console.error("Error en la petición XHR");
    };

    xhr.send();
  }
}

function cargarTodasLasGuardias() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "/guardias", true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      console.log("Respuesta recibida:", xhr.responseText);
      const data = JSON.parse(xhr.responseText);
      console.log("Datos parseados para mostrarGuardias:", data);
      mostrarGuardias(data);
    } else {
      console.error("Error al cargar las guardias:", xhr.statusText);
    }
  };

  xhr.onerror = function () {
    console.error("Error en la petición XHR");
  };

  xhr.send();
}

let profesores = [];
async function cargarProfesores() {
  try {
    const respuesta = await fetch("/api/profesores");
    if (!respuesta.ok) throw new Error("No se pudieron cargar los profesores");
    profesores = await respuesta.json();
  } catch (error) {
    console.error("Error al cargar profesores:", error);
  }
}

function eliminarTodasLasGuardias() {
  if (confirm('¿Estás seguro de que deseas eliminar TODAS las guardias? Esta acción no se puede deshacer.')) {
    var xhr = new XMLHttpRequest();
    xhr.open("DELETE", "/guardias", true);

    xhr.onload = function () {
      if (xhr.status >= 200 && xhr.status < 300) {
        console.log("Todas las guardias han sido eliminadas con éxito");
        // Restablecer las asignaciones a un objeto vacío
        asignacionesGuardias = {}; 
        // Regenerar las casillas del calendario
        generarCasillas(); 
        // Volver a preparar las celdas para aceptar nuevas guardias
        prepararCeldasParaDrop();
        alert("Todas las guardias han sido eliminadas con éxito");
      } else {
        console.error("No se pudieron eliminar las guardias");
        alert("Error al eliminar las guardias");
      }
    };

    xhr.onerror = function () {
      console.error("Error en la red o el servidor");
      alert("Error en la red o el servidor");
    };

    xhr.send();
  }
}


function mostrarProfesores() {
  const panel = document.getElementById("profesores-panel");
  panel.innerHTML = "";

  profesores.forEach((profesor) => {
    const profesorDiv = document.createElement("div");
    // Añade solo el nombre del profesor al texto visible
    profesorDiv.textContent = profesor.username;
    // Utiliza un atributo de datos para almacenar el ID del profesor
    profesorDiv.dataset.profesorid = profesor.profesorId;
    
    profesorDiv.setAttribute("draggable", true);
    // Modifica el evento ondragstart para utilizar el atributo de datos
    profesorDiv.setAttribute("ondragstart", "event.dataTransfer.setData('text/plain', event.target.dataset.profesorid)");
    profesorDiv.classList.add("profesor");
    // Opcional: Añadir disponibilidad como un elemento separado o un tooltip
    const disponibilidadDiv = document.createElement("span");
    disponibilidadDiv.textContent = ` ( ${profesor.disponibilidad.join(', ')} )`;
    disponibilidadDiv.classList.add("disponibilidad");
    profesorDiv.appendChild(disponibilidadDiv);

    panel.appendChild(profesorDiv);
  });
}

function mostrarGuardias(guardias) {
  if (!Array.isArray(guardias)) {
    console.error('Datos inválidos para mostrarGuardias:', guardias);
    return;
  }
  guardias.forEach((guardia) => {
    const { profesorId, celdaId, descripcion } = guardia; // Asegúrate de extraer 'descripcion' también
    // Actualizar el registro de asignaciones para incluir las guardias cargadas
    asignacionesGuardias[celdaId] = { profesorId, descripcion }; // Guarda tanto el profesorId como la descripcion

    // Llamar a actualizarCelda para cada guardia cargada para recrear los botones y mostrar la descripción
    actualizarCelda(celdaId, profesorId, descripcion); // Añade 'descripcion' como tercer argumento
  });
}


function mostrarResumenDisponibilidad() {
  cargarProfesores().then(() => {
    cargarTodasLasGuardias().then(() => {
      const resumen = profesores.map(profesor => {
        const guardiasAsignadas = Object.entries(asignacionesGuardias)
            .filter(([celdaId, profesorId]) => profesorId === profesor.profesorId)
            .map(([celdaId]) => celdaId);
        return {
          nombre: profesor.username,
          guardias: guardiasAsignadas,
          disponibilidad: calcularDisponibilidad(guardiasAsignadas)
        };
      });

      mostrarResumenEnUI(resumen);
    });
  });
}

function calcularDisponibilidad(guardiasAsignadas) {
  // Ejemplo: 5 días a la semana, 4 bloques por día
  const totalBloques = 5 * 4; // Modifica esto según tu horario real
  const bloquesOcupados = new Set();

  guardiasAsignadas.forEach(celdaId => {
    // Suponiendo que celdaId sigue el formato "D-#", donde "D" es el día y "#" el bloque horario
    bloquesOcupados.add(celdaId);
  });

  const bloquesDisponibles = totalBloques - bloquesOcupados.size;

  // Devolver un valor o una estructura que represente la disponibilidad
  return {
    totalBloques: totalBloques,
    bloquesOcupados: bloquesOcupados.size,
    bloquesDisponibles: bloquesDisponibles
  };
}

function mostrarResumenEnUI(resumen) {
  const contenedorResumen = document.getElementById("resumen-disponibilidad");
  contenedorResumen.innerHTML = ''; // Limpiar contenido previo

  resumen.forEach(item => {
    const elemento = document.createElement("div");
    elemento.innerHTML = `
            <h3>${item.nombre}</h3>
            <p>Guardias asignadas: ${item.guardias.join(", ")}</p>
            <p>Disponibilidad: ${item.disponibilidad}</p>
        `;
    contenedorResumen.appendChild(elemento);
  });
}