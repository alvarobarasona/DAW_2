// const addMovieButton = document.getElementById("add-movie-button");
// const pendingMovies = document.getElementById("pending-movies");
// const showMovies = document.getElementById("show-movies");
// const favouritesMovies = document.getElementById("favourites-movies");
// const noRecomendatedMovies = document.getElementById("no-recomendated-movies");

// document.addEventListener("DOMContentLoaded", () => {
//     loadMovies();
// });

// function loadMovies() {
//     fetch("/movies")
//         .then((response) => response.json())
//         .then((data) => {
//             data.movies.forEach((movie) => {
//                 addMovieToDom(movie);
//             });
//         });
// }

// function addMovieToDom(movie) {
//     const movieContainer = document.createElement("div");
//     movieContainer.id = movie.movieName;
//     movieContainer.classList.add("movie-container");
//     movieContainer.innerHTML = `<span>${movie.movieName}</span><button id='delete-${movie.movieName}'>Eliminar</button><button id='modify-${movie.movieName}'>Modificar</button>`;
//     switch(movie.movieType) {
//         case "pendingMovies":
//             pendingMovies.appendChild(movieContainer);
//             break;
//         case "showMovies":
//             showMovies.appendChild(movieContainer);
//             break;
//         case "favouritesMovies":
//             favouritesMovies.appendChild(movieContainer);
//             break;
//         case "noRecomendatedMovies":
//             noRecomendatedMovies.appendChild(movieContainer);
//         default:
//             break;
//     }
//     const deleteMovieButton = document.getElementById(`delete-${movie.movieName}`);
//     deleteMovieButton.addEventListener("click", () => {
//         deleteMovie(movie.movieName);
//     });
//     const modifyMovieButton = document.getElementById(`modify-${movie.movieName}`);
//     modifyMovieButton.addEventListener("click", () => {
//         modifyMovie(movie.movieName);
//     });
// }

// function addMovie() {
//     const movieName = document.getElementById("input-movie-name").value;
//     const movieType = document.getElementById("input-movie").value;
//     if(movieName !== "") {
//         fetch("/addmovie", {
//             method: "POST",
//             headers: {
//                 "Content-Type": "application/json"
//             },
//             body: JSON.stringify({
//                 movieName: movieName,
//                 movieType: movieType
//             })
//         })
//             .then((response) => response.json())
//             .catch((error) => console.error("Error: ", error));
//     }
// }

// addMovieButton.addEventListener("click", () => {
//     addMovie();
// });

// function deleteMovie(movieName) {
//     fetch(`/deletemovie/${movieName}`, {
//         method: "DELETE"
//     })
//         .then((response) => {
//             if(!response.ok) {
//                 throw new Error("Error al eliminar la película.");
//             }
//             return response.json();
//         })
//         .then(() => {
//             const movie = document.getElementById(movieName);
//             if(movie) {
//                 movie.parentNode.removeChild(movie);
//             }
//         })
//         .catch((error) => {
//             console.error("Error:", error);
//         });
// }

// function modifyMovie(movieName) {
//     const movieContainer = document.getElementById(movieName);
//     movieContainer.innerHTML = `<input id='modify-movie-${movieName}'></input><button id='button-modify-${movieName}'>Aceptar</button>`;
//     const buttonModifyName = document.getElementById(`button-modify-${movieName}`);
//     buttonModifyName.addEventListener("click", () => {
//         const modifyNameInput = document.getElementById(`modify-movie-${movieName}`).value;
//         if(modifyNameInput !== "") {
//             movieContainer.id = modifyNameInput;
//             fetch(`/modifymovie/${movieName}/${modifyNameInput}`, {
//                 method: "PUT"
//             })
//         }
//     });
// }

users = {
    "users": [
        {
            "user": {
                "name": "pepe",
                "password": "123a",
                "movies": [
                    {
                        "title": "Star Wars",
                        "type": "pendingMovies"
                    }
                ]
            }
        },
        {
            "user": {
                "name": "maria",
                "password": "456b",
                "movies": [
                    {
                        "title": "Narnia",
                        "type": "favouritesMovies"
                    }
                ]
            }
        },
        {
            "user": {
                "name": "juan",
                "password": "789c",
                "movies": [
                    {
                        "title": "ET",
                        "type": "noRecomendatedMovies"
                    }
                ]
            }
        }
    ]
}

console.log(users.users[0].user.name);

const loginButton = document.getElementById("add-movie-button");

loginButton.addEventListener("click", () => {
    const userName = document.getElementById("input-user").value;
    const password = document.getElementById("input-password").value;
    if(userName !== "" && password !== "") {
        fetch("/loginuser", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                userName: userName,
                userPassword: password
            })
        })
            .then((response) => response.json())
            .catch((error) => console.error("Error: ", error));
    }
});