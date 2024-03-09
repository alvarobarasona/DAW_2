const express = require('express');
const app = express();
const path = require('path');
const PORT = 3000;

// Middleware para servir archivos estáticos
app.use(express.static('public'));

// Ruta para la página principal
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, '/public/index.html'));
});

// Ruta para obtener las ciudades del archivo JSON
app.get('/ciudades', (req, res) => {
    res.sendFile(path.join(__dirname, '/public/ciudades.json'));
});

// Iniciar el servidor
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
