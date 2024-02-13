const express = require("express");
const app = express();

app.post("/", (req, res) => {
    res.send("Petición manejada con POST");
});
