const express = require('express');
const app = express();
const port = 8000;

app.listen(port, () => {
    console.log(`Servidor ejecutándose en http://localhost:${port}`);
});

const authMiddleware = (req, res, next) => {
    const authHeader = req.headers.authorization;
    if (authHeader && authHeader === "pula") {
        next();
    } else {
        res.status(401).send('No autorizado');
    }
};

app.use(authMiddleware);

app.get("/ruta-protegida", (req, res) => {
    res.send("Has accedido a la ruta protegida");
});

app.get("/", (req, res) => {
    res.send("Bienvenido al servidor");
});

