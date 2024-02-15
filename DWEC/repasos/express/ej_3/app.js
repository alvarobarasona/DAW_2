const express = require("express");
const app = express();
const port = 3000;

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.send("Bienvenido al index");
});

app.get("/tareas", (req, res) => {
    const { task, author } = req.query;
    res.send(`Tarea: ${task}, Autor: ${author}`);
});

app.get("/saludar/tarea/:task", (req, res) => {
    const { task } = req.params;
    res.send(`Hola, tienes la tarea de ${task} pendiente.`);
});

app.get("/saludar/nombre/:author", (req, res) => {
    const { author } = req.params;
    res.send(`Bienvenido ${author}`);
});

app.get("/saludar/:author/:task", (req, res) => {
    const { author, task } = req.params;
    res.send(`Bienvenido ${author}, tienes pendiente la tarea de ${task}`);
});