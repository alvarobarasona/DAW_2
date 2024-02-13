// //constantes
// const express = require("express");
// const app = express();
// const port = 3000;
// const cors = require("cors");
// const fs = require("fs");
// const bodyParser = require("body-parser");
// const path = require("path");

// //Middlewares
// app.use(cors());
// app.use(express.urlencoded({ extended: true }));
// app.use(bodyParser.json());

// app.listen(port, () => {
//     console.log(`Server running at http://localhost:${port}`);
// });

// app.get(__dirname, (req, res) => {
//     res.sendFile(path.join(__dirname, "public", "html", "index.html"));
// });

// app.post

// fs.readFile(path.join());

// fs.writeFile(
//     path.join(__dirname, "data", "data.json"),
//     JSON.stringify({ data }),
//     (err) => {
//         if (err) {
//             res.status(500).send("Error al guardar la tarea");
//         } else {
//             res.status(200).json(newTask); // Envía la tarea recién creada como respuesta
//         }
//     }
// );

const fs = require('fs');

// Objeto que deseas agregar al archivo JSON
const nuevoObjeto = {
  nuevoCampo: 'nuevoValor'
};

// Ruta del archivo JSON
const rutaArchivo = './data/data.json';

// Lee el archivo JSON existente (si existe)
let datosExistentes = [];
try {
  const datosJson = fs.readFileSync(rutaArchivo, 'utf-8');
  datosExistentes = JSON.parse(datosJson);
} catch (error) {
  console.error('Error al leer el archivo JSON:', error);
}

// Agrega el nuevo objeto al array de datos existentes
datosExistentes.push(nuevoObjeto);

// Escribe los datos actualizados en el archivo JSON
fs.writeFile(rutaArchivo, JSON.stringify(datosExistentes, null, 2), (error) => {
  if (error) {
    console.error('Error al escribir en el archivo JSON:', error);
    return;
  }
  console.log('Datos escritos correctamente en el archivo JSON.');
});
