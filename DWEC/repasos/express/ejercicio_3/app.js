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

app.get("/saludo/:name", (req, res) => {
    const { name } = req.params;
    res.send(`Bienvenido a la app de tareas ${name}`);
});

app.get("/saludo/:name/:task", (req, res) => {
    const { name, task } = req.params;
    res.send(`${name} tienes que hacer la tarea de ${task}`);
});