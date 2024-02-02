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
    res.json(JSON_DATA);
});

APP.use(BODY_PARSER.json());

APP.post("/data/add", (req, res) => {
    const DATA = req.body;
    if(DATA && DATA.name) {
        const NEW_JSON_OBJECT = {"name" : DATA.name, "id": "" + Date.now(), "state" :"ANALYSING"};
        let JSON_DATA = require(path.join(__dirname, 'data', 'tasks.json'));
        console.log(JSON_DATA);
        JSON_DATA.task.push(NEW_JSON_OBJECT);
        console.log(JSON_DATA);
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
    const filePath = path.join(__dirname, 'data', 'tasks.json');

    // Leer el archivo JSON
    FS.readFile(filePath, 'utf8', (err, data) => {
        if (err) {
            console.error("Error al leer el archivo JSON", err);
            return res.status(500).json({ error: "Error al leer el archivo JSON" });
        }

        let JSON_DATA = JSON.parse(data);

        // Filtrar el array y actualizar el archivo
        JSON_DATA.task = JSON_DATA.task.filter(e => e.id !== ID_PARAM);
        console.log(JSON_DATA);
        FS.writeFile(filePath, JSON.stringify(JSON_DATA, null, 2), (err) => {
            if (err) {
                console.error("Error al escribir el archivo JSON", err);
                return res.status(500).json({ error: "Error al escribir el archivo JSON" });
            }

            res.json(JSON_DATA);
        });
    });
});


APP.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});

APP.use(EXPRESS.static(path.join(__dirname, 'public')));

APP.patch("/data/update", (req, res) => {
    const updatedData = req.body;

    if (updatedData.id) {

        let JSON_DATA = require(path.join(__dirname, 'data', 'tasks.json'));

        let array = JSON_DATA.task.map(e => {
            if (e.id === updatedData.id){

                if (updatedData.name) {
                   e.name = updatedData.name;
                }

                if (updatedData.state){
                    e.state = updatedData.state;
                }
            }
            return e;
        })

        let arrayTask = {"task": array};

        FS.writeFile(path.join(__dirname, 'data', 'tasks.json'), JSON.stringify(arrayTask, null, 2), (err) => {
            if(!err) {
                res.json(arrayTask);
            }
        });
    
    }else{
        res.status(400).json({message : "El identificador no viene informado"})
    }

   
});

function isBlank(str) {
    return !str || /^\s*$/.test(str);
}