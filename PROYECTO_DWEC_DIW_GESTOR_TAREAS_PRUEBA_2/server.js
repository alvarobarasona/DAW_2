const EXPRESS = require("express");
const APP = EXPRESS();
const PORT = 5501;
const path = require('path')
const BODY_PARSER = require("body-parser");
const FS = require("fs");
const { Console } = require("console");

APP.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, 'views', 'index.html'));
});

APP.get("/data", (req, res) => {
    const JSON_DATA = require(path.join(__dirname, 'data', 'tasks.json'));
    console.log(JSON_DATA);
    res.json(JSON_DATA);
});

APP.use(BODY_PARSER.json());

APP.post("/data/add", (req, res) => {
    const DATA = req.body;
    if(DATA && DATA.name) {
        const NEW_JSON_OBJECT = {"name" : DATA.name, "id": toString(Date.now()), "state" :"ANALYSING"};
        let JSON_DATA = require(path.join(__dirname, 'data', 'tasks.json'));
        console.log(JSON_DATA);
        JSON_DATA.task.push(NEW_JSON_OBJECT);
        FS.writeFile(path.join(__dirname, 'data', 'tasks.json'), JSON.stringify(JSON_DATA, null, 2), (err) => {
            if(!err) {
                res.json(JSON_DATA);
            }
        });
    } else {
        res.status(400).json({error: "Los datos no son válidos."});
    }
});

APP.delete("/data/delete/:id", (req, res) => {
    const ID_PARAM = req.params.id;
    let JSON_DATA = require(path.join(__dirname, 'data', 'tasks.json'));
    console.log(JSON_DATA);
    let array = JSON_DATA.task.filter(e => e.id !== ID_PARAM);
    console.log(array);
    let arrayTask = {"task": array};
    console.log(arrayTask);
    FS.writeFile(path.join(__dirname, 'data', 'tasks.json'), JSON.stringify(arrayTask, null, 2), (err) => {
        if(!err) {
            res.json(arrayTask);
        }
    });
});

APP.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});

APP.use(EXPRESS.static(path.join(__dirname, 'public')));
