const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');
const app = express();
const port = 3000;

app.use(bodyParser.json());

app.use(express.static('public'));

app.post('/searchFruit', (req, res) => {
  fs.readFile('fruits.json', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      return;
    }
    else{
      const FRUITS = JSON.parse(data);
      const RESULT = FRUITS.filter(fruit => fruit.type.toLowerCase().includes(req.body.type.toLowerCase()));
      res.json(RESULT);
    }
  });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});