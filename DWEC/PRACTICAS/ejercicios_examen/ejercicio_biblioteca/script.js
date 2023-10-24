let booksArray = [];

function Book(title, author, year, gender) {
    this.title = title;
    this.author = author;
    this.year = year;
    this.gender = gender;
}

function getTitle() {
    var title = document.getElementById("inputTitle").value;
    return title;
}

function getAuthor() {
    var author = document.getElementById("inputAutor").value;
    return author;
}

function getYear() {
    var year = document.getElementById("inputYear").value;
    return year;
}

function getGender() {
    var gender = document.getElementById("inputGender").value;
    return gender;
}

function emptyInput() {
    document.getElementById("inputTitle").value = "";
    document.getElementById("inputAutor").value = "";
    document.getElementById("inputYear").value = "";
    document.getElementById("inputGender").value = "";
}

function addBook() {
    var book = new Book(getTitle(), getAuthor(), getYear(), getGender());
    booksArray.push(book);
    showBooks();
    emptyInput();
}

function showBooks() {
    var container = document.getElementById("container");
    container.innerHTML = "";
    for (let i = 0; i < booksArray.length; i++) {
        container.innerHTML += `<p>Libro ${i + 1} - Título: ${booksArray[i].title} - Autor: ${booksArray[i].author} - Año: ${booksArray[i].year} - Género: ${booksArray[i].gender}</p>`;
    }
}

function getNameToLend() {
    var name = document.getElementById("inputName").value;
    return name;
}

function lendBook() {
    var initialArrayLength = booksArray.length;
    var counter = 0;
    for (let i = 0; i < booksArray.length; i++) {
        if(booksArray[i].title === getNameToLend()) {
            booksArray.splice(i, 1);
        } else {
            counter++;
        }
    }
    if(counter === initialArrayLength) {
        alert("El libro no existe");
    }
    showBooks();
    document.getElementById("inputName").value = "";
}