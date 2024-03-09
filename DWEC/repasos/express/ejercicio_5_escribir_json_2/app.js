const express = require("express");
const app = express();
const port = 3000;
const path = require("path");
const fs = require("fs").promises;

app.use(express.urlencoded({ extended: true }));
app.use(express.json());
app.use(express.static(path.join(__dirname, "public")));

app.get("/", (req, res) => {
    res.send(path.join(__dirname, "public", "index.html"));
});

app.post("/data", async (req, res) => {
    const { data } = req.body;
    try {
        var dataArray = await fs.readFile(path.join(__dirname, "data", "data.json"));
        const jsonData = JSON.parse(dataArray).jsonData;
        jsonData.push(data);
        await fs.writeFile(path.join(__dirname, "data", "data.json"), JSON.stringify({ jsonData }, null, 2));
        // res.status(200);
    } catch(error) {
        console.error(`Error: ${error}`)
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});