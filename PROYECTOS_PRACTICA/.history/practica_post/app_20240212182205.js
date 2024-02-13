const express = require("express");
const app = express();
const port = 3000;

app.post("/practica_post/", (req, res) => {
    res.send("Petición manejada con POST");
});

app.listen();