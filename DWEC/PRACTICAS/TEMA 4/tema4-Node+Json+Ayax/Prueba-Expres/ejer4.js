const express = require('express');
const app = express();
const PORT = 3000;

app.use(express.urlencoded({ extended: true })); // Para manejar datos de formularios

// Ruta para el formulario HTML
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/ejer4.html');
});

// Ruta para manejar la solicitud POST del formulario
app.post('/procesar', (req, res) => {
    const { nombre, correo } = req.body;
    res.send(`¡Hola, ${nombre}! Correo: ${correo}`);
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});