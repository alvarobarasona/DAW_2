const express = require("express");
const app = express();
const port = 3000;

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

// http://localhost:3000/data?taskName=cocinar&author=Alvaro

app.get("/data", (req, res) => {
    const { taskName, author} = req.query;
    res.send(`Tarea: ${taskName}, Autor: ${author}`);
});

// http://localhost:3000/data/cocinar/Alvaro

app.get("/data/:taskName/:author", (req, res) => {
    const { taskName, author } = req.params;
    res.send(`Bienvenido ${author}, tienes pendiente la tarea de ${taskName}`);
});