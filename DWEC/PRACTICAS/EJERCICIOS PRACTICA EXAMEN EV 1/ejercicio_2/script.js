let square = document.getElementById("cuadrado");
let numberOfColumns = 5;
let numberOfRows = 5;

function printSquare() {
    square.innerHTML = "";
    for (let f = 0; f < numberOfColumns; f++) {
        for (let c = 0; c < numberOfRows; c++) {
            if(f == 0 || f == numberOfRows - 1) {
                square.innerHTML += "*";
            } else {
                if(c == 0 || c == numberOfColumns - 1) {
                    square.innerHTML += "*";
                } else {
                    square.innerHTML += " ";
                }
            }
        }
        square.innerHTML += "<br>"
    }
}

printSquare();