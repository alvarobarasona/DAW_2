document.getElementById("loginForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  const errorMessage = document.getElementById("error-message"); // Obtener el elemento del mensaje de error

  var xhr = new XMLHttpRequest();
  xhr.open("POST", "/login", true);
  xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);
      if (data.success) {
        // Almacenar el rol y el profesorId en localStorage
        localStorage.setItem("rolUsuario", data.role);
        if (data.role === "profesor") {
          // Asegurarse de que solo se guarda el profesorId para usuarios con rol de profesor
          localStorage.setItem("profesorId", data.profesorId); // Suponiendo que esta propiedad se envía desde el servidor
        }

        // Redirigir al usuario basándose en el rol
        if (data.role === "admin") {
          window.location.href = "/admin.html";
        } else if (data.role === "profesor") {
          window.location.href = "/profesor.html";
        }
      } else {
        // Mostrar mensaje de error específico del servidor
        errorMessage.textContent = data.message;
      }
    } else {
      // Mostrar un mensaje de error genérico para otros códigos de estado
      const data = JSON.parse(xhr.responseText);
      errorMessage.textContent =
        data.message || "Ha ocurrido un error. Por favor, inténtalo de nuevo.";
    }
  };

  xhr.onerror = function () {
    // Manejar errores de conexión o problemas de red
    errorMessage.textContent =
      "Error de conexión. Por favor, verifica tu conexión a internet.";
  };

  var data = JSON.stringify({ username, password });
  xhr.send(data);
});

function manejarRespuestaLogin(respuesta) {
  // Suponiendo que 'respuesta' es el objeto que recibes del servidor
  localStorage.setItem("rolUsuario", respuesta.role);
  localStorage.setItem("profesorId", data.profesorId); // ID del usuario

  // Redireccionar al usuario a su página correspondiente basado en el rol
  if (respuesta.rol === "admin") {
    window.location.href = "/admin.html";
  } else if (respuesta.rol === "profesor") {
    window.location.href = "/profesor.html";
  }
}
