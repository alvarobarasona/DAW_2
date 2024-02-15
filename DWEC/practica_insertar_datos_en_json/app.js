const express = require("express");
const app = express();
const port = 3000;
const path = require("path");
const fs = require("fs");

app.use(express.static(path.join(__dirname, "public")));
app.use(express.json());

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

app.post("/insertdata", (req, res) => {
    fs.readFile(path.join(__dirname, "data", "data.json"), (err, data) => {
        if(err) {
            res.status(500).send("Error al leer el JSON");
            return;
        }
        let dataArray;
        try {
            dataArray = JSON.parse(data);
            if (!Array.isArray(dataArray)) {
                throw new Error('Data is not an array');
            }
        } catch (error) {
            res.status(500).send("Error al parsear el JSON como array");
            return;
        }
        const newWord = req.body['wordinput'];
        dataArray.push({ word: newWord });
        const updatedWords = JSON.stringify(dataArray, null, 2);
        fs.writeFile(path.join(__dirname, "data", "data.json"), updatedWords, (err) => {
            if(err) {
                res.status(500).send("Error al escribir el JSON");
                return;
            }
            res.send("Mensaje guardado con éxito");
        });
    });
});
