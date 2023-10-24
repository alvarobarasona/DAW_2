
//Constructor del objeto libro
function Book(tittle, author, year, gender) {
    this.tittle = tittle;
    this.author = author;
    this.year = year;
    this.gender = gender;
}

//Declaro array vacío
let arrayBooks = [];
let contenedor = document.getElementById("contenedor");

//Rellena un objeto Book e imprime el número de libros que haya en el array
function showBook() {
    contenedor.innerHTML = "";
    for (let book of arrayBooks) {
        contenedor.innerHTML += "<p>Titulo: " + book.tittle +" | Autor: "+book.author+" | Año: "+book.year+" | Género: "+book.gender+"</p>";
    }
}

//Añade un libro al array
function addBook() {
    var newBook = new Book(prompt("Introduce el título del libro:"), prompt("Introduce el autor del libro:"), prompt("Introduce el año del libro:"), prompt("Introduce el genero del libro:"));
    arrayBooks.push(newBook);
    showBook();
}

var arrayDiference = 1;

//Borra el elemento del array introducido por el usuario
function deleteBook(){
    let affectedNumberPositions = 1;
    let uniqueBook = 1;
    let min = 1;
    let max = arrayBooks.length;
    let option = 999;
    if(arrayBooks.length === uniqueBook) {
        arrayBooks.splice(uniqueBook - arrayDiference, affectedNumberPositions);
    }
    if(arrayBooks.length > uniqueBook) {
        do{
            option = parseInt(prompt("Introduce el número de libro a eliminar:"));
        } while(option < min || option > max);
        arrayBooks.splice(option - arrayDiference, affectedNumberPositions);
    }
    showBook();
}