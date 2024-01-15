// Tablero de juego
var container = document.getElementById("container");
container.innerHTML = "";
var numberOfRows = 6;
var numberOfColumns = 7;
const ARRAY_DIFFERENCE = 1;
var containerArray = [];
var rowArray = [];
var acc = 0;
for (let r = 0; r < numberOfRows; r++) {
    for (let c = 0; c < numberOfColumns; c++) {
        rowArray[c] = `<div class="white-field" id="number-${acc + ARRAY_DIFFERENCE}"></div>`;
        container.innerHTML += rowArray[c];
        acc++;
    }
    containerArray[r] = rowArray;
    rowArray = [];
}

var acc_player = 0;
var numberOfColumn;

container.addEventListener("click", (event) => {
    var field = document.getElementById(event.target.id);
    var idField = event.target.id;
    if(field.className === "white-field") {
        columnIsEmpty(idField);
    }
});

function columnIsEmpty(idField) {
    var stringField = `<div class="white-field" id="${idField}"></div>`;
    var accColumn = 0;
    for (let r = 0; r < numberOfRows; r++) {
        for (let c = 0; c < numberOfColumns; c++) {
            if(containerArray[r][c] === stringField) {
                numberOfColumn = c;
                for (let r = 0; r < numberOfRows; r++) {
                    if(containerArray[r][numberOfColumn] === `<div class="white-field" id="number-${idField}"></div>`) {

                    }
                }
            }
        }
    }
    console.log(accColumn);
}