const express = require("express");
const app = express();
const port = 3000;
const path = require("path");
const fs = require("fs");
const { error } = require("console");
const valueOne = 1;
const valueZero = 0;
let updatedPersons;

app.use(express.static(path.join(__dirname, "public")));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

let dataArray;

app.post("/addperson", (req, res) => {
    const newPerson = {
        nif: req.body.nif,
        name: req.body.name,
        firstSurname: req.body.firstSurname,
        secondSurname: req.body.secondSurname,
        age: req.body.age,
        sex: req.body.sex
    }
    fs.readFile(path.join(__dirname, "data", "data.json"), (err, data) => {
        if(err) {
            res.status(500).send("Error al leer el JSON");
            return;
        }
        try {
            dataArray = JSON.parse(data);
            if (!Array.isArray(dataArray)) {
                throw new Error('Data is not an array');
            }
        } catch (error) {
            res.status(500).send("Error al parsear el JSON como array");
            return;
        }  
        dataArray.push(newPerson);
        updatedPersons = JSON.stringify(dataArray, null, 2);
        fs.writeFile(path.join(__dirname, "data", "data.json"), updatedPersons, (err) => {
            if(err) {
                res.status(500).send("Error al escribir el JSON");
                return;
            } else {
                res.status(200).json(newPerson);
            }
        });
    });
});

app.get("/persons", (req, res) => {
    fs.readFile(path.join(__dirname, "data", "data.json"), (err, data) => {
    if(err) {
        res.status(500).send("Error al leer el JSON");
        return;
    }
    res.json(JSON.parse(data));
    });
});

app.get("/public/client.js", (req, res) => {
    res.set('Content-Type', 'application/javascript');
    res.sendFile(path.join(__dirname, "public", "client.js"));
});

app.delete("/deleteperson/:nif", (req, res) => {
    const personNif = req.params.nif;

    fs.readFile(path.join(__dirname, "data", "data.json"), (err, data) => {
        if(err) throw err;
        let people = JSON.parse(data);

        people = people.filter((person) => person.nif !== personNif);

        fs.writeFile(path.join(__dirname, "data", "data.json"), JSON.stringify(people), (err) => {
            if (err) {
                res.status(500).send("Error al escribir el JSON");
                return;
            }

            // Enviamos una respuesta de éxito
            res.status(200).json({ message: "Persona eliminada correctamente" });
        });
    });
});