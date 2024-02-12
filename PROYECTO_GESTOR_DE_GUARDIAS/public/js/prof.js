function cargarGuardiasDelProfesor(profesorId) {
  fetch(`/guardias/profesor/${profesorId}`)
      .then(response => {
          if (!response.ok) {
              throw new Error('Problema al cargar las guardias');
          }
          return response.json();
      })
      .then(data => {
          mostrarGuardias(data);
      })
      .catch(error => console.error('Error:', error));
}

function mostrarGuardias(guardias) {
  guardias.forEach(guardia => {
    const celda = document.getElementById(guardia.celdaId);
    if (celda) {
      // Asegúrate de que 'descripcion' es el nombre del campo que contiene la descripción de la guardia en la respuesta del servidor
      const contenidoGuardia = `<div class='guardia-info'>
                                   <strong>Guardia:</strong> ${guardia.descripcion || 'Sin descripción'}
                                </div>`;
      celda.innerHTML += contenidoGuardia;
    }
  });
}


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
});

document.addEventListener("DOMContentLoaded", function () {
  const profesorId = localStorage.getItem("profesorId");
  console.log(`ID del profesor recuperado del almacenamiento local: ${profesorId}`); // Verifica el ID recuperado
  if (profesorId) {
    cargarGuardiasDelProfesor(profesorId);
  } else {
    console.log("No se encontró el ID del profesor.");
  }
});