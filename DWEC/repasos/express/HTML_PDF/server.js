const express = require('express');
const app = express();
const port = 3000;

// Sirve archivos estáticos desde el directorio 'public'
app.use(express.static('public'));

// Ruta principal que envía el archivo HTML
app.get('/', (req, res) => {
    res.sendFile(__dirname + '/public/index.html');
});

// Inicia el servidor
app.listen(port, () => {
    console.log(`Servidor ejecutándose en http://localhost:${port}`);
});

