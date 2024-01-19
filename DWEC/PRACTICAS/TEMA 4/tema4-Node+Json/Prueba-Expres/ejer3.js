const express = require('express');
const app = express();
const port = 8000;

app.listen(port, () => {
    console.log(`Servidor ejecutándose en http://localhost:${port}`);
});

app.get('/tareas', (req, res) => {
    const { tarea, autor } = req.query;
    res.send(`Tarea: ${tarea}, Autor: ${autor}`);
});

app.get('/saludo/:autor', (req, res) => {
    const { autor } = req.params;
    res.send(`Hola, ${autor}! Bienvenido a nuestra aplicación de tareas.`);
});