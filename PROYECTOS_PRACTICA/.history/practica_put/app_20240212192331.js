const express = require("express");
const app = express();

app.put("/user", (req, res) => {
    res.send("Petición manejada con PUT");
    
});