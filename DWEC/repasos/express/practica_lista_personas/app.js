const express = require("express");
const app = express();
const port = 3000;
const path = require("path");
const fs = require("fs");
const internalServerError = 500;
const sucessfullResponse = 200;
let peopleArray;
let updatedPeopleArray;

app.use(express.static(path.join(__dirname, "public")));
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});

app.get("/", (req, res) => {
    res.send(path.join(__dirname, "public", "index.html"));
});

app.post("/addperson", (req, res) => {
    const newPerson = {
        nif: req.body.nif,
        name: req.body.name,
        firstSurname: req.body.firstSurname,
        secondSurname: req.body.secondSurname,
        age: req.body.age,
        sex: req.body.sex
    };
    fs.readFile(path.join(__dirname, "data", "people.json"), (err, data) => {
        if(err) {
            res.status(internalServerError).send("Error al leer el JSON");
        }
        try {
            peopleArray = JSON.parse(data);
            if(!Array.isArray(peopleArray)) {
                throw new Error("peopleArray no es un array.");
            }
        } catch(error) {
            res.status(internalServerError).send("Error al parsear el JSON como array");
            return;
        }
        peopleArray.push(newPerson);
        updatedPeopleArray = JSON.stringify(peopleArray, null, 2);
        fs.writeFile((path.join(__dirname, "data", "people.json")), updatedPeopleArray, (err) => {
            if(err) {
                res.status(internalServerError).send("Error al escribir el JSON");
                return;
            } else {
                res.status(sucessfullResponse).json(newPerson);
            }
        });
    });
});

app.get("/people", (req, res) => {
    fs.readFile(path.join("data", "people.json"), (err, data) => {
        if(err) {
            res.status(internalServerError).send("Error al leer el JSON");
            return;
        }
        res.json(JSON.parse(data));
    });
});

app.get(("/public/client.js"), (req, res) => {
    res.set('Content-Type', 'application/javascript');
    res.sendFile(path.join(__dirname, "public", "client.js"));
});

app.delete("/deleteperson/:nif", (req, res) => {
    const personNif = req.params.nif;

    fs.readFile(path.join(__dirname, "data", "people.json"), (err, data) => {
        if(err) {
            throw err;
        }
        let people = JSON.parse(data);

        people = people.filter((person) => person.nif !== personNif);

        fs.writeFile(path.join(__dirname, "data", "people.json"), JSON.stringify(people), (err) => {
            if(err) {
                res.status(internalServerError).send("Error al escribir el JSON");
                return;
            }
            res.status(sucessfullResponse).json({ message: "Persona eliminada correctamente" });
        });
    });
});