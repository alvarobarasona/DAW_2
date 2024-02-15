const express = require("express");
const app = express();
const port = 3000;

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

const authMiddleware = (req, res, next) => {
    const authHeader = req.headers.authorization;
    if(authHeader === "4321") {
        next();
    } else {
        res.status(401).send("Error al autentificar");
    }
};

app.use(authMiddleware);

app.get("/", (req, res) => {
    res.send("Bienvenido al index");
});