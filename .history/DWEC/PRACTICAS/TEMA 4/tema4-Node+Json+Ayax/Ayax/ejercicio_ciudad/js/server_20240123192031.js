const express = require('express');
const fs = require('fs');
const app = express();
const PORT = 3000;


app.use(express.static('public'));

app.get('/', function(req, res) {
    res.sendFile(__dirname + '/index.html');
});

let ciudades = [];
fs.readFile('ejercicio_ciudad/json/cities.json', (err, data) => {
    if (err) throw err;
    ciudades = JSON.parse(data).cities;
});

app.get('/recommend', function(req, res) {
    const searchTerm = req.query.city.toLowerCase();
    const filteredCities = ciudades.filter(city => city.toLowerCase().startsWith(searchTerm));
    res.json({ suggestions: filteredCities });
});

app.listen(PORT, () => {
    console.log(`Servidor escuchando en http://localhost:${PORT}`);
});;