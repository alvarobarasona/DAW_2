//Guardo el módulo express en la constante
const express = require("express");
//Guardo la función del módulo de express en la constante
const app = express();
//Guardo el número de puerto en la constate
const port = 3000;
//Creo el servidor, indico la ruta en la raíz con '/' e indico la respuesta
app.get("/", (req, res) => {
    res.send("¡Hola Mundo!");
});

app.listen(port, () => {
    console.log(`Server running in http://localhost:${port}`);
});