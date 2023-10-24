let booksArray = [];

function Book(title, author, year, gender) {
    this.title = title;
    this.author = author;
    this.year = year;
    this.gender = gender;
}

function showBook() {
    var container = document.getElementById("text");
    container.innerHTML = "";
    for (let i = 0; i < booksArray.length; i++) {
        container.innerHTML += `<h2>${booksArray[i].title}</h2><br><p>${booksArray[i].author}</p><br><p>${booksArray[i].year}</p><br><p>${booksArray[i].gender}</p>`;
    }
    return container;
}

function addBook() {
    var book = new Book(prompt("Introduce el título del libro:"), prompt("Introduce el nombre del autor:"), prompt("Introduce el año del libro:"), prompt("Introduce el género del libro:"));
    booksArray.push(book);
    console.log(booksArray);
    showBook();
}

const MIN_OPTION = 1;
let maxOption;
const ARRAY_DIFFERENCE = 1;
const AFFECTED_POSITIONS = 1;
const EMPTY_ARRAY = 0;
const ONE_BOOK_ON_ARRAY = 1;

function deleteBook() {
    if(booksArray.length === ONE_BOOK_ON_ARRAY) {
        booksArray.splice(ONE_BOOK_ON_ARRAY - ARRAY_DIFFERENCE, AFFECTED_POSITIONS);
        showBook();
    }
    if(booksArray.length > EMPTY_ARRAY) {
        maxOption = booksArray.length;
        do {
            var option = parseInt(prompt("Introduce la posición del libro que deseas eliminar:"));
        } while(option < MIN_OPTION || option > maxOption);
        option -= ARRAY_DIFFERENCE;
        booksArray.splice(option, AFFECTED_POSITIONS);
        showBook();
    }
}