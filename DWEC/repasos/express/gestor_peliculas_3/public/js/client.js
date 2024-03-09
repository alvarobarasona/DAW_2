document.addEventListener("DOMContentLoaded", () => {
    loadMovies();

    const addMovieButton = document.getElementById("add-movie");

    addMovieButton.addEventListener("click", () => {
        addMovie();
    });

    const logoutButton = document.getElementById("logout-button");

    logoutButton.addEventListener("click", () => {
        localStorage.removeItem("userId");
        window.location.href = "/index.html";
    });
});

function addMovie() {
    const userId = localStorage.getItem("userId");

    const movieTitle = document.getElementById("title-input").value;
    const movieCategory = document.getElementById("category-select").value;

    if(movieTitle !== "") {
        fetch("/addmovie", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ userId, movieTitle, movieCategory })
        })
            .then((response) => response.json())
            .then(data => {
                if(data.success) {
                    addMoviesToDom(data);
                } else {
                    alert(data.message);
                }    
            })
            .catch((error) => {
                console.error(`Error al cargar el JSON: ${error}`);
            });
    }
}

function deleteMovie(movieTitle) {
    const userId = localStorage.getItem("userId");

    fetch("/deletemovie", {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ userId, movieTitle })
    })
        .then((response) => response.json())
        .then((data) => {
            document.getElementById(data.movieName).remove();
        })
        .catch((error) => {
            console.error(`Error al cargar el JSON: ${error}`);
        });
}

function modifyMovie(oldMovieTitle) {
    const userId = localStorage.getItem("userId");

    const newMovieTitle = prompt("Introduce el nuevo nombre de la película.");

    fetch("/modifymovie", {
        method: "PUT",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ userId, oldMovieTitle, newMovieTitle })
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            document.getElementById(oldMovieTitle).remove();
            addMoviesToDom(data);
        })
        .catch((error) => {
            console.error(`Error al cargar el JSON: ${error}`);
        });
}

function loadMovies() {
    const localUserId = localStorage.getItem("userId");
    fetch("/movies", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({ localUserId })
    })
        .then((response) => response.json())
        .then((data) => {
            data.forEach((movie) => {
                addMoviesToDom(movie);
            });
        })
        .catch((error) => {
            console.error(`Error al cargar el JSON: ${error}`);
        });
}

function addMoviesToDom(movie) {
    const movieContainer = document.createElement("div");
    movieContainer.id = movie.title;
    movieContainer.classList.add("movie-class");
    movieContainer.innerHTML = `<span>${movie.title}</span><button id='delete-button-${movie.title}'>Eliminar</button><button id='modify-button-${movie.title}'>Modificar</button>`;

    //! Aquí es donde tiene que llamarse la clave igual que en ${movie.category}-movies (línea 85 - 88 del servidor)
    document.getElementById(`${movie.category}-movies`).appendChild(movieContainer);

    const deleteMovieButton = document.getElementById(`delete-button-${movie.title}`);

    deleteMovieButton.addEventListener("click", () => {
        deleteMovie(movie.title);
    });

    const modifyMovieButton = document.getElementById(`modify-button-${movie.title}`);

    modifyMovieButton.addEventListener("click", () => {
        modifyMovie(movie.title);
    });
}