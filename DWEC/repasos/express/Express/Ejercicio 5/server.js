const express = require('express');
const cors = require('cors');
const fs = require('fs').promises;
const path = require('path');

const app = express();
const PORT = 3000;
const datosPath = path.join(__dirname, 'datos.json');

app.use(cors());
app.use(express.json());

app.post('/anadir-datos', async (req, res) => {
    try {
        let datos;
        // Verifica si el archivo existe
        try {
            const data = await fs.readFile(datosPath, 'utf8');
            datos = JSON.parse(data);
        } catch (error) {
            // Si el archivo no existe, comienza con un arreglo vacío
            datos = [];
        }

        // Añade los nuevos datos
        datos.push(req.body);

        // Escribe de nuevo al archivo de datos
        await fs.writeFile(datosPath, JSON.stringify(datos, null, 2));

        res.send({ message: 'Datos añadidos correctamente', datos: req.body });
    } catch (error) {
        res.status(500).send({ message: 'Error al procesar la solicitud', error: error.message });
    }
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});

