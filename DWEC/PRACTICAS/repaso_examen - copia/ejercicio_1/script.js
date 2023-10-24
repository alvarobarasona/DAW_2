function Movie(title, year, actorsList) {
    this.title = title;
    this.year = year;
    this.actorsList = actorsList;
}

let moviesArray = [];

let actorsArray1 = ["Marlon Brando", "Al Pacino", "James Caan"];
let movie1 = new Movie("El Padrino", "1972", actorsArray1);
moviesArray.push(movie1);

let actorsArray2 = ["Leonardo DICaprio", "Kate Winslet", "Billy Zane"];
let movie2 = new Movie("Titanic", "1997", actorsArray2);
moviesArray.push(movie2);

let actorsArray3 = ["Keanu Reeves", "Laurence FishBurne", "Carrie-Anne Moss"];
let movie3 = new Movie("Matrix", "1999", actorsArray3);
moviesArray.push(movie3);

function showMovies() {
    console.log(moviesArray);
    var container = document.getElementById("container");
    container.innerHTML = "";
    for (let i = 0; i < moviesArray.length; i++) {
        container.innerHTML += `<h2>${moviesArray[i].title}</h2><p>Año: ${moviesArray[i].year}</p><p>Actores Principales: ${moviesArray[i].actorsList.join(", ")}</p><br>`;
    }
}

window.onload = function() {
    showMovies();
}



























/*
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
*/