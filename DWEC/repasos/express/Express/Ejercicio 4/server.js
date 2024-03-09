// app.js
const express = require('express');
const path = require('path');

const app = express();
const PORT = 8080;

// Middleware para procesar los datos del formulario
app.use(express.urlencoded({ extended: true }));

// Servir archivos estáticos desde el directorio 'public'
app.use(express.static('public'));

// Ruta para servir el formulario HTML
app.get('/registro', (req, res) => {
    res.sendFile(path.join(__dirname, 'public', 'formulario.html'));
});

// Ruta para manejar la solicitud POST del formulario
app.post('/enviar-formulario', (req, res) => {
    const { nombre, correo, contrasena } = req.body;
    // Aquí deberías implementar la lógica para guardar estos datos, por ejemplo en una base de datos
    // Envía una respuesta al cliente con los datos recibidos
    res.send(`¡Hola, ${nombre}! Tu correo es ${correo} y tu contraseña es ${contrasena}.`);
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
