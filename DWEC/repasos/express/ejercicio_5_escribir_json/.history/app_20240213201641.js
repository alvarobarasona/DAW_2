const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
const fs = require("fs");
//Middleware para habilitar CORS
app.use(cors());

app.use.express.json();

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

let dataArray = [];
fs.writeFile(
    path.join(__dirname + "data" + ),
);

app.get("/insert", (req, res) => {
    const { data } = req.body;
});