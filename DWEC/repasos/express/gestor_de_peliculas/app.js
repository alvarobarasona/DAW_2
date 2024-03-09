const express = require("express");
const app = express();
const port = 3000;
const path = require("path");
const fs = require("fs").promises;
const jsonPath = path.join(__dirname, "data", "movies.json");

app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "public")));

//Endpoint para servir el index
app.get("/", (req, res) => {
    res.send(path.join(__dirname, "public", "index.html"));
});

app.get("/movies", async (req, res) => {
    try {
        const moviesArray = await fs.readFile(jsonPath, "utf8");
        res.json(JSON.parse(moviesArray));
    } catch(error) {
        res.status(500).send("Error al leer el archivo");
    }
});

//Endpoint para escuchar el servidor en el puerto indicado
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});