const express = require("express");
const app = express();
const port = 3000;
const path = require("path");
const fs = require("fs").promises;

const dataPath = path.join(__dirname, "data", "data.json");
const internalServerError = 500;

// * Devuelve el contenido del json como un objeto
const getJsonData = async (file) => {
    try {
        const movies = await fs.readFile(dataPath, "utf-8");
        return JSON.parse(movies);
    } catch(error) {
        res.status(internalServerError).send(`Error al leer el archivo JSON: ${error}`);
    }
}

app.use(express.static(path.join(__dirname, "public")));
app.use(express.urlencoded({ extended: true }));
app.use(express.json());

/*
! Para servir el index no es necesario este get, ya que el static servirá el archivo llamado index en la carpeta public de forma automática
app.get("/", (req, res) => {
    * Para servir un archivo que no sea el index hay que poner sendFile
    res.sendFile(path.join(__dirname, "public", "html", "movies.html"));
    res.send(path.join(__dirname, "public", "index.html"));
});
*/

app.post("/movies", async (req, res) => {
    try {
        const userId = req.body.localUserId;

        const movies = await fs.readFile(dataPath, "utf-8");
        const parsedMovies = JSON.parse(movies);
        //user.userId como la clave de usuario en el archivo json
        const loggedUserMovies = parsedMovies.users.find((user) => user.userId === userId).movies;
        res.json(loggedUserMovies);
    } catch(error) {
        res.status(internalServerError).send(`Error al leer el archivo JSON: ${error}`);
    }
});

app.post("/login", async (req, res) => {
    // * Se pasan los datos del cliente al servidor por el body
    try {
        const { userName, userPassword } = req.body;
        const loginUserData = { userName, userPassword };

        const data = await fs.readFile(dataPath, "utf-8");
        const usersArray = JSON.parse(data);
        console.log(usersArray.users);
        // * Se guarda el objeto usuario cuyo nombre de usuario y contraseña coincidan con los que se pasan del formulario del login y los que hay en el archivo json
        const userData = usersArray.users.find((user) => user.name === loginUserData.userName && user.password === loginUserData.userPassword);
        console.log(userData);
        if(userData) {
            res.json({
                success: true,
                userId: userData.userId
            });
        } else {
            res.status(internalServerError).json({
                success: false,
                message: "Usuario o contraseña incorrectos"
            });
        }
    } catch(error) {
        res.status(internalServerError).send(`Error al leer el archivo JSON: ${error}`);
    }
});

app.post("/addmovie", async (req, res) => {
    try {
        // * Guardamos el id del usuario logueado
        const userId = req.body.userId;

        // * Capturamps los datos de la película a añadir en el cuerpo de la petición
        const { movieTitle, movieCategory } = req.body;

        // * Guarmos el objeto de los datos de la película en una constante
        //! Al crear este objeto que se enviará como respuesta del servidor es importante tener cuidado con la claves que se le asignan (en este caso title y category), ya que si no son como se esperan en el cliente (en este caso en la función addMoviesToDom), no se podrá acceder a los datos de la respuesta del servidor y por tanto la nueva película no se añadirá al DOM
        const newMovieData = {
            "title": movieTitle,
            "category": movieCategory
        };

        // * Leemos y parseamos en contenido del json
        const jsonData = await fs.readFile(dataPath, "utf-8");
        const parsedData = JSON.parse(jsonData);

        // * Guardamos la posición del usuario logueado que quiere añadir una película
        const userPosition = parsedData.users.findIndex((user) => user.userId === userId);

        const movieExist = parsedData.users[userPosition].movies.find((movie) => movie.title === newMovieData.title) ? true : false;

        if(movieExist) {
            res.status(internalServerError).json({
                success: false,
                message: "La película ya existe"
            });
            return;
        } else {
            // * Añadimos la película al array de películas del usuario logueado
            parsedData.users[userPosition].movies.push(newMovieData);

            // * Escribimos el json con la película añadida al usuario logueado
            await fs.writeFile(dataPath, JSON.stringify(parsedData, null, 2), "utf-8");

            //* Devolvemos la película añadida
            res.json({
                success: true,
                newMovieData
            });
        }
    } catch(error) {
        res.status(internalServerError).send(`Error al leer el archivo JSON: ${error}`);
    }
});

app.delete("/deletemovie", async (req, res) => {
    try {
        const userId = req.body.userId;
        const movieName = req.body.movieTitle;
    
        const jsonData = await fs.readFile(dataPath, "utf-8");
        const parsedData = JSON.parse(jsonData);

        const userPosition = parsedData.users.findIndex((user) => user.userId === userId);

        const moviePosition = parsedData.users[userPosition].movies.findIndex((movie) => movie.title === movieName);

        parsedData.users[userPosition].movies.splice(moviePosition, 1);

        await fs.writeFile(dataPath, JSON.stringify(parsedData, null, 2), "utf-8");

        res.json({ movieName });
    } catch(error) {
        res.status(internalServerError).send(`Error al leer el archivo JSON: ${error}`);
    }
});

app.put("/modifymovie", async (req, res) => {
    try {
        const userId = req.body.userId;
        const oldMovieTitle = req.body.oldMovieTitle;
        const newMovieTitle = req.body.newMovieTitle;
    
        const jsonData = await fs.readFile(dataPath, "utf-8");
        const parsedData = JSON.parse(jsonData);

        const userPosition = parsedData.users.findIndex((user) => user.userId === userId);

        const moviePosition = parsedData.users[userPosition].movies.findIndex((movie) => movie.title === oldMovieTitle);

        const movieCategory = parsedData.users[userPosition].movies[moviePosition].category;

        parsedData.users[userPosition].movies[moviePosition].title = newMovieTitle;

        await fs.writeFile(dataPath, JSON.stringify(parsedData, null, 2), "utf-8");

        res.json({
            title: newMovieTitle,
            category: movieCategory
        });
    } catch(error) {
        res.status(internalServerError).send(`Error al leer el archivo JSON: ${error}`);
    }
});

app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});