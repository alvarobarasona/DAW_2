// Ejemplo en server.js
const express = require("express");
const fs = require("fs").promises;
const bodyParser = require("body-parser");
const app = express();
const PORT = 3000;

app.use(bodyParser.json());
app.use(express.static("public"));

// Servir index.html en la ruta raíz
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

// Función para leer los usuarios del archivo JSON
const getUsuarios = async () => {
  try {
    const data = await fs.readFile("./data/usuarios.json", "utf8");
    return JSON.parse(data).usuarios;
  } catch (error) {
    console.error("Error al cargar usuarios:", error);
    throw error;
  }
};

app.get("/api/profesores", async (req, res) => {
  try {
    const data = await fs.readFile("./data/usuarios.json", "utf8");
    const usuarios = JSON.parse(data).usuarios;
    const profesores = usuarios.filter(
      (usuario) => usuario.role === "profesor"
    );
    res.json(profesores);
  } catch (error) {
    console.error("Error al cargar usuarios:", error);
    res
      .status(500)
      .json({ success: false, message: "Error interno del servidor" });
  }
});

app.post("/login", async (req, res) => {
  // Asegúrate de marcar esta función como asincrónica
  console.log("Login request received");
  const { username, password } = req.body;
  console.log(`Attempting login for ${username}`);

  try {
    const usuarios = await getUsuarios(); // Usa await aquí
    console.log("Usuarios cargados correctamente");
    const usuario = usuarios.find(
      (u) => u.username === username && u.password === password
    );
    if (usuario) {
      // Envía también el profesorId si el usuario es un profesor
      const response = {
        success: true,
        role: usuario.role,
      };
      if (usuario.role === "profesor") {
        response.profesorId = usuario.profesorId; // Asegúrate de que este campo existe en tus objetos de usuario
      }
      res.json(response);
    } else {
      console.log(`Login failed for ${username}`);
      res
        .status(401)
        .json({ success: false, message: "Credenciales incorrectas" });
    }
  } catch (error) {
    console.error("Error al cargar usuarios:", error);
    res
      .status(500)
      .json({ success: false, message: "Error interno del servidor" });
  }
});

const FILE_PATH = "./data/guardias.json";

async function leerGuardias() {
  try {
    const data = await fs.readFile(FILE_PATH, "utf8");
    return JSON.parse(data).guardias; 
  } catch (error) {
    console.error("Error leyendo el archivo de guardias:", error);
    throw error; 
  }
}

async function escribirGuardias(data) {
  try {
    await fs.writeFile(FILE_PATH, JSON.stringify(data, null, 2), "utf8");
  } catch (error) {
    console.error("Error escribiendo en el archivo de guardias:", error);
    throw error;
  }
}

// Crear guardias
app.post("/guardias", async (req, res) => {
  const { profesorId, celdaId, descripcion } = req.body; // Incluir 'descripcion' en la extracción del cuerpo de la solicitud
  try {
    const guardias = await leerGuardias(); // Lee las guardias existentes
    const nuevaGuardia = { profesorId, celdaId, descripcion }; // Incluir 'descripcion' al crear el objeto de la nueva guardia

    guardias.push(nuevaGuardia); // Agrega la nueva guardia al arreglo
    await escribirGuardias({ guardias: guardias }); // Actualizar el archivo JSON con las guardias

    res.json({ message: "Guardia creada con éxito", guardia: nuevaGuardia });
  } catch (error) {
    res.status(500).json({ message: "Error al crear la guardia" });
  }
});


// obtener guardias
app.get("/guardias", async (req, res) => {
  try {
    const data = await leerGuardias();
    res.json(data);
  } catch (error) {
    console.error("Error al obtener las guardias:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
});

app.put("/guardias/:celdaId", async (req, res) => {
  const { celdaId } = req.params;
  const { profesorId, descripcion } = req.body; // Incluir 'descripcion' en la actualización
  try {
    const guardias = await leerGuardias();
    const index = guardias.findIndex(g => g.celdaId === celdaId);
    if (index !== -1) {
      guardias[index].profesorId = profesorId;
      guardias[index].descripcion = descripcion; // Actualizar la descripción de la guardia
      await escribirGuardias({ guardias: guardias });

      res.json({ message: "Guardia actualizada con éxito" });
    } else {
      res.status(404).json({ message: "Guardia no encontrada" });
    }
  } catch (error) {
    console.error("Error al actualizar la guardia:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
});


//Eliminar guardias
app.delete("/guardias/:celdaId", async (req, res) => {
  const { celdaId } = req.params;
  try {
    // Aquí es donde leerías tu archivo o base de datos para encontrar y eliminar la guardia
    const guardias = await leerGuardias();
    const index = guardias.findIndex(g => g.celdaId === celdaId);
    if (index > -1) {
      guardias.splice(index, 1);
      await escribirGuardias({ guardias });
      res.json({ message: "Guardia eliminada con éxito" });
    } else {
      res.status(404).json({ message: "Guardia no encontrada" });
    }
  } catch (error) {
    console.error("Error al eliminar la guardia:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
});

// Eliminar todas las guardias
app.delete("/guardias", async (req, res) => {
  try {
    const guardiasVacias = {
      guardias: []
    };

    await escribirGuardias(guardiasVacias);
    
    res.json({ message: "Todas las guardias han sido eliminadas con éxito" });
  } catch (error) {
    console.error("Error al eliminar todas las guardias:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
});


// obtener guardias en profesores
app.get("/guardias/profesor/:profesorId", async (req, res) => {
  const { profesorId } = req.params;
  try {
    const guardias = await leerGuardias(); // Suponiendo que esta función devuelve todas las guardias
    const guardiasDelProfesor = guardias.filter(
      (guardia) => guardia.profesorId === profesorId
    );
    res.json(guardiasDelProfesor);
  } catch (error) {
    console.error("Error al obtener las guardias del profesor:", error);
    res.status(500).json({ message: "Error interno del servidor" });
  }
});

app.listen(PORT, () =>
  console.log(`Servidor corriendo en http://localhost:${PORT}`)
);