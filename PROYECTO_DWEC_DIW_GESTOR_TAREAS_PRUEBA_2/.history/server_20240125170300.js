//Guardo en módulo de express en la constante EXPRESS.
const EXPRESS = require('express');
//
const BODY_PARSER = require('body-parser');
//Guardo en módulo de file system en la constante FS.
const FS = require('fs');
//Guardo en la constante APP la función del módulo express.
const APP = EXPRESS();
//Guardo el número de puerto en la constante PORT.
const PORT = 8080;
//
APP.use(EXPRESS.static(__dirname + '/public'));
//
APP.use(BODY_PARSER.urlencoded({ extended: true }));

APP.get('/', (req, res) => {
    res.sendFile(__dirname + '/views/index.html');
});

APP.get('/tasks', (req, res) => {
    FS.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) throw err;
        res.json(JSON.parse(data));
    });
});

APP.post('/tasks', (req, res) => {
    const newTask = { id: Date.now(), description: req.body.description, type: tas };

    FS.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) throw err;
        const tasks = JSON.parse(data).tasks;
        tasks.push(newTask);
        FS.writeFile(__dirname + '/data/tasks.json', JSON.stringify({ tasks }), (err) => {
            if (err) throw err;
            res.json(newTask);
        });
    });
});

APP.delete('/tasks/:id', (req, res) => {
    const taskId = Number(req.params.id);

    FS.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) throw err;
        let tasks = JSON.parse(data).tasks;
        
        tasks = tasks.filter(task => task.id !== taskId);
        
        FS.writeFile(__dirname + '/data/tasks.json', JSON.stringify({ tasks }), (err) => {
            if (err) throw err;
            res.json({ id: taskId });
        });
    });
});

APP.listen(PORT, () => {
    console.log(`Server running on port http://localhost:${PORT}`);
});