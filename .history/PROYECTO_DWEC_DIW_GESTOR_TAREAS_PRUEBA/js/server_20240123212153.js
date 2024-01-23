// const EXPRESS = require("express");
// const APP = EXPRESS();
// const PORT = 3000;

// APP.use(EXPRESS.urlencoded({extended: true}));

// APP.get("/", (req, res) => {
//     res.sendFile(__dirname + "/index.html");
// });

// APP.post("/gestor_tareas", (req, res) => {
//     const {nombre, correo} = req.body;
//     res.send(``);
// });

// APP.listen(PORT, () => {
//     console.log(`Server running on htpp://localhost:${PORT}`);
// });

const express = require('express');
const app = express();

const PORT = 3000;

app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});

app.get('/', (req, res) => {
    res.sendFile('Hola Mundo');
});
