const express = require("express");
const app = express();

app.get("/", (req, res) => {
    res.send(random.txt);
});

const port = 3000;

app.listen();