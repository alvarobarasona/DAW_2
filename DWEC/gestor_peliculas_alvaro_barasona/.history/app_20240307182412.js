const express = require("express");
const { readFile, writeFile } = require("fs");
const app = express();
const port = 3000;
const path = require("path");
const dataPath = path.join(__dirname, "data", "data.json");
const fs = require("fs").promises;
const internalServerError = 500;
const ok = 200;

app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "public")));
app.use(express.json());

app.get("/", (req, res) => {
    res.send(path.join(__dirname, "public", "index.html"));
});

// app.get("/", (req, res) => {
//     res.send(path.join(__dirname, "public", "login.html"));
// });

app.post("/addmovie", async (req, res) => {
    const { movieName, movieType } = req.body;
    const newMovie = { movieName, movieType };
    try {
        const moviesArray = await fs.readFile(dataPath);
        const jsonData = JSON.parse(moviesArray);
        const jsonMoviesArray = jsonData.movies;
        jsonMoviesArray.push(newMovie);
        await fs.writeFile(dataPath, JSON.stringify(jsonData, null, 2));
        res.json({ success: true });
    } catch(error) {
        res.status(internalServerError).send("Error al leer/escribir el archivo JSON.");
    }
});

app.get("/movies", async (req, res) => {
    try {
        const movies = await fs.readFile(dataPath);
        res.json(JSON.parse(movies));
    } catch(error) {
        res.status(internalServerError).send("Error al leer el archivo JSON.");
    }
});

app.delete("/deletemovie/:movie", async (req, res) => {
    try {
        const movieName = req.params.movie;
        let jsonData = await fs.readFile(dataPath);
        let moviesArray = JSON.parse(jsonData);
        moviesArray.movies = moviesArray.movies.filter((movie) => movie.movieName !== movieName);
        await fs.writeFile(dataPath, JSON.stringify(moviesArray, null, 2));
        res.status(ok).json({ message: "Película eliminada correctamente" });
    } catch (error) {
        res.status(internalServerError).send("Error al leer/escribir el archivo JSON.");
    }
});

app.put("/modifymovie", async (req, res) => {
    try {
        const { oldName, newName} = req.body;
        const movieData = { oldName, newName };
        let jsonData = await fs.readFile(dataPath);
        let moviesArray = JSON.parse(jsonData);
        moviesArray.movies.forEach((movie) => {
            if(movie.movieName === movieData.oldName) {
                movie.movieName = movieData.newName;
            }
        });
        await fs.writeFile(dataPath, JSON.stringify(moviesArray, null, 2));
        res.status(ok).json({ message: "Película modificada correctamente" });
    } catch (error) {
        res.status(internalServerError).send("Error al leer/escribir el archivo JSON.");
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});