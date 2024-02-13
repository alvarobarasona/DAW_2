//Guardo el módulo express
const express = require("express");
//Gu
const app = express();
const port = 3000;

app.get("/", (req, res) => {
    res.send("¡Hola Mundo!");
});

app.listen(port, () => {
    console.log(`Server running in http://localhost:${port}`);
});