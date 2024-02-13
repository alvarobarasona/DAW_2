const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
const fs = require("fs");
const bodyParser = require("body-parser");
const path = require("path");
//Middleware para habilitar CORS
app.use(cors());

app.use(bodyParser.json());

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

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

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "html", "index.html"));
});