const express = require('express');
const app = express();
const port = 3000; // Puedes elegir cualquier puerto que esté disponible

// Middleware para servir archivos estáticos
// Asegúrate de que tus archivos HTML, CSS y JS estén en una carpeta llamada 'public'
app.use(express.static('public'));

// Ruta principal que sirve el archivo index.html
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/public/index.html');
});

// Inicia el servidor
app.listen(port, () => {
    console.log(`Servidor ejecutándose en http://localhost:${port}`);
});
