const express = require("express");
const app = express();

app.delete("/user", (req, res) => {
    res.send("Solicitud manejada con delete.");
});