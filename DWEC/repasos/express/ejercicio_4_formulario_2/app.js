const express = require("express");
const app = express();
const port = 3000;
const path = require("path");

app.use(express.static(path.join(__dirname, "public")));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.get("/", (req, res) => {
    res.send(path.join(__dirname, "public", "index.html"));
});

app.post("/addperson", (req, res) => {
    const { name, email, password } = req.body;
    res.send(`Hola ${name}, tu correo es ${email} y tu contraseña es ${password}`);
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});