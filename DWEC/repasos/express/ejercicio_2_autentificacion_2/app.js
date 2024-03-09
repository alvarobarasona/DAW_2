const express = require("express");
const app = express();
const port = 3000;

const authMiddleware = (req, res, next) => {
    const authHeader = req.headers.authorization;
    if(authHeader === "pulaman") {
        next();
    } else {
        res.status(401).send("No autorizado");
    }
};

app.use(authMiddleware);

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.send("Bienvenido al index");
});