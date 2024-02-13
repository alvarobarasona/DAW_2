const express = require("express");
const app = express();
const port = 3000;

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.sendFile(__dirname + "/public/html/index.html");
});

app.post("/formulary", (req, res) => {
    const { name, mail, password } = req.body;
    res.send(`Bienvenido ${name}, tu correo es ${mail} y tu contraseña es ${password}`);
});

el id 