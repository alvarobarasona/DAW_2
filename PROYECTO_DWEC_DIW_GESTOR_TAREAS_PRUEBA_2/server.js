const EXPRESS = require("express");
const APP = EXPRESS();
const PORT = 5501;
const path = require('path')

APP.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, 'views', 'index.html'));
});

APP.get("/data", (req, res) => {
    const JSON_DATA = require(path.join(__dirname, 'data', 'tasks.json'));
    console.log(JSON_DATA);
    res.json(JSON_DATA);
});

APP.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});

APP.use(EXPRESS.static(path.join(__dirname, 'public')));
