const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
const fs = require("fs");
const bodyParser = require("body-parser");
const path = require("path");
//Middleware para habilitar CORS
app.use(cors());

app.use(express.urlencoded());

app.use(bodyParser.json());

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

fs.readFile(path.join());

fs.writeFile(
    path.join(__dirname, "data", "data.json"),
    JSON.stringify({ data }),
    (err) => {
        if (err) {
            res.status(500).send("Error al guardar la tarea");
        } else {
            res.status(200).json(newTask); // Envía la tarea recién creada como respuesta
        }
    }
);
