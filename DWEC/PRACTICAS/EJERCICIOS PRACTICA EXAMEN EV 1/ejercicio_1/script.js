let actors1 = ["Marlon Brando", "Al Pacino", "James Caan"];
let actors2 = ["Leonardo DiCaprio", "Kate Winslet", "Billy Zane"];
let actors3 = ["Keanu Reeves", "Laurence Fishburne", "Carrie-Anne Moss"];

let movie1 = ["El Padrino", "1972", actors1];
let movie2 = ["Titanic", "1997", actors2];
let movie3 = ["Matrix", "1999", actors3];

let movies = [movie1, movie2, movie3];

let container = document.getElementById("container");

function listMovies() {
    container.innerHTML = "";

    movies.forEach(element => {
        container.innerHTML += `<h2>${element[0]}</h2><p>Año: ${element[1]}</p><p>Actores Principales: ${element[2].join(", ")}</p><br>`;
    });
}

window.onload = function() {
    listMovies();
}