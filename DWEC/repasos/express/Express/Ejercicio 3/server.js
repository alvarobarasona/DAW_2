const express = require('express');
const app = express();

// Middleware para procesar JSON
app.use(express.json());

app.get('/tarea/:nombre/:autor', (req, res) => {
    const { nombre, autor } = req.params;
    res.send(`Tarea: ${nombre}, Autor: ${autor}`);
});

app.get('/busqueda', (req, res) => {
    const { q, tipo } = req.query;
    res.send(`Búsqueda: ${q}, Tipo: ${tipo}`);
});

const PORT = 3000;

app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});