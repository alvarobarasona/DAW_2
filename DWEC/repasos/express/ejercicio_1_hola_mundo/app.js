const express = require("express");
const app = express();
port = 3000;

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.send("Hola mundo");
});