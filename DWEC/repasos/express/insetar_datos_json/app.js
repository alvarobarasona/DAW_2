const port = 3000;
const express = require("express");
const app = express();
const path = require("path");
const fs = require("fs");

app.use(express.static(path.join(__dirname, "public")));
app.use(express.json);
app.use(express.urlencoded({ extended: true }));

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

app.post("/insertperson", (req, res) => {
    fs.readFile(path.join(__dirname, "data", "persons.json"), (err, data) => {
        const jsonErr = 500;
        if(err) {
            res.status(jsonErr).send("Error al leer el JSON");
            return;
        }
        let personsArray;
        try {
            personsArray = JSON.parse(data);
            if(!Array.isArray(personsArray)) {
                throw new Error("personsArray no es un array");
            }
        } catch(err) {
            res.status(jsonErr).send("Error al parsear el JSON como array");
            return;
        }
        console.log(req.body);
        const name = req.body["name"];
        console.log(name);
        const surname = req.body["surname"];
        console.log(surname);
        const age = req.body["age"];
        console.log(age);
        personsArray.push({ "nombre": name, "apellido": surname, "edad": age });
        const updateWords = JSON.stringify(personsArray, null, 2);
        fs.writeFile(path.join(__dirname, "data", "persons.json"), updateWords, (err) => {
            if(err) {
                res.status(jsonErr).send("Error al escribir el JSON");
                return;
            }
            res.sendFile(path.join(__dirname, "public", "index.html"));
        });
    });
});