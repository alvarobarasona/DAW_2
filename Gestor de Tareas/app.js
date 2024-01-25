const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const app = express();
const PORT = 8080;

app.use(express.static(__dirname + '/public'));
app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.json());

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/views/index.html');
});

app.get('/tasks', (req, res) => {
    fs.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) throw err;
        res.json(JSON.parse(data));
    });
});

app.put('/tasks/:id/status', (req, res) => {
    const taskId = Number(req.params.id);
    const newStatus = req.body.status;

    fs.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) {
            console.error('Error al leer el archivo:', err);
            return res.status(500).send('Error al leer el archivo de tareas');
        }

        let tasks = JSON.parse(data).tasks;
        const taskIndex = tasks.findIndex(task => task.id === taskId);

        if (taskIndex !== -1) {
            tasks[taskIndex].status = newStatus;
            fs.writeFile(__dirname + '/data/tasks.json', JSON.stringify({ tasks }, null, 2), (err) => {
                if (err) {
                    console.error('Error al escribir en el archivo:', err);
                    return res.status(500).send('Error al actualizar la tarea');
                }
                res.json({ id: taskId, status: newStatus });
            });
        } else {
            res.status(404).send('Tarea no encontrada');
        }
    });
});


app.post('/tasks', (req, res) => {
    const newTask = {
        id: Date.now(),
        description: req.body.description,
        status: 'new' // Estado inicial de la tarea
    };

    fs.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) throw err;
        const tasks = JSON.parse(data).tasks;
        tasks.push(newTask);
        fs.writeFile(__dirname + '/data/tasks.json', JSON.stringify({ tasks }), (err) => {
            if (err) throw err;
            res.json(newTask);
        });
    });
});

app.delete('/tasks/:id', (req, res) => {
    const taskId = Number(req.params.id);

    fs.readFile(__dirname + '/data/tasks.json', (err, data) => {
        if (err) throw err;
        let tasks = JSON.parse(data).tasks;
        tasks = tasks.filter(task => task.id !== taskId);
        fs.writeFile(__dirname + '/data/tasks.json', JSON.stringify({ tasks }), (err) => {
            if (err) throw err;
            res.json({ id: taskId });
        });
    });

});

app.delete('/tasks', (req, res) => {
    // Sobrescribe el archivo JSON con un array de tareas vacío
    fs.writeFile(__dirname + '/data/tasks.json', JSON.stringify({ tasks: [] }), (err) => {
        if (err) {
            console.error('Error al escribir en el archivo:', err);
            res.status(500).send('Error al eliminar todas las tareas');
        } else {
            res.status(200).send('Todas las tareas han sido eliminadas');
        }
    });
});

app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
