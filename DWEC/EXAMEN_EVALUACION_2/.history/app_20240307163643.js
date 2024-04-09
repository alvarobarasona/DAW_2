// const express = require("express");
// const app = express();
// const port = 3000;
// const path = require("path");
// const dataPath = path.join(__dirname, "data", "data.json");
// const fs = require("fs").promises;
// const internalServerError = 500;
// const ok = 200;

// app.use(express.urlencoded({ extended: true }));
// app.use(express.static(path.join(__dirname, "public")));
// app.use(express.json());

// app.get("/", (req, res) => {
//     res.send(path.join(__dirname, "public", "html", "login.html"));
// });

// app.post("/addmovie", async (req, res) => {
//     const { movieName, movieType } = req.body;
//     const newMovie = { movieName, movieType };
//     try {
//         const moviesArray = await fs.readFile(dataPath);
//         const jsonData = JSON.parse(moviesArray);
//         const jsonMoviesArray = jsonData.movies;
//         jsonMoviesArray.push(newMovie);
//         await fs.writeFile(dataPath, JSON.stringify(jsonData, null, 2));
//         res.json({ success: true });
//     } catch(error) {
//         res.status(internalServerError).send("Error al leer/escribir el archivo JSON.");
//     }
// });

// app.get("/movies", async (req, res) => {
//     try {
//         const movies = await fs.readFile(dataPath);
//         res.json(JSON.parse(movies));
//     } catch(error) {
//         res.status(internalServerError).send("Error al leer el archivo JSON.");
//     }
// });

// app.delete("/deletemovie/:movie", async (req, res) => {
//     try {
//         const movieName = req.params.movie;
//         let jsonData = await fs.readFile(dataPath);
//         let moviesArray = JSON.parse(jsonData);
//         moviesArray.movies = moviesArray.movies.filter((movie) => movie.movieName !== movieName);
//         await fs.writeFile(dataPath, JSON.stringify(moviesArray, null, 2));
//         res.status(ok).json({ message: "Película eliminada correctamente" });
//     } catch (error) {
//         res.status(internalServerError).send("Error al leer/escribir el archivo JSON.");
//     }
// });

// app.put("/modifymovie/:oldname/:newname", async (req, res) => {
//     try {
//         const oldName = req.params.oldname;
//         const newName = req.params.newname;
//         let jsonData = await fs.readFile(dataPath);
//         let moviesArray = JSON.parse(jsonData);
//         moviesArray.movies.forEach((movie) => {
//             if(movie.movieName === oldName) {
//                 movie.movieName = newName;
//             }
//         });
//         await fs.writeFile(dataPath, JSON.stringify(moviesArray, null, 2));
//         res.status(ok).json({ message: "Película modificada correctamente" });
//     } catch (error) {
//         res.status(internalServerError).send("Error al leer/escribir el archivo JSON.");
//     }
// });

// app.listen(port, () => {
//     console.log(`Server running at http://localhost:${port}`);
// });

const express = require("express");
const app = express();
const port = 3000;
const path = require("path");

app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, "public")));
app.use(express.json());

app.get("/", (req, res) => {
    res.sendFile(path.join(__dirname, "public", "index.html"));
});

app.get("/seemovies", );

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});