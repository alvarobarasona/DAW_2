const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
//Middleware para habilitar CORS
app.use(cors());

app.use.express.json();

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/insert", (req, res) => {
    const { data }
});