function printSquare() {
    const squareLength = 5;
    var container = document.getElementById("cuadrado");
    container.innerHTML = "";
    for (let f = 0; f < squareLength; f++) {
        for (let c = 0; c < squareLength; c++) {
            if(f === 0 || f === squareLength - 1 || c === 0 || c === squareLength - 1) {
                container.innerHTML += "*";
            } else {
                container.innerHTML += " ";
            }
        }
        container.innerHTML += "<br>";
    }
}

window.onload = function() {
    printSquare();
}