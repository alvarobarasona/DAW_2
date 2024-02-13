const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
const fs = require("fs");
//Middleware para habilitar CORS
app.use(cors());

app.use.express.json();

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

let dataArray = [];
fs.writeFile(
    path.join(__dirname, "data", "tasks.json"),
    JSON.stringify({ tasks }),
    (err) => {
      if (err) {
        res.status(500).send("Error al guardar la tarea");
      } else {
        res.status(200).json(newTask); // Envía la tarea recién creada como respuesta
      }
    }
  );

app.post("/insert", (req, res) => {
    const { data } = req.body;
});