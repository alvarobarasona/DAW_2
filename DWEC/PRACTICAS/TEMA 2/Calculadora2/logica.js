
let numero1 = "";
let numero2 = "";
let operation = "";
let resultado = 0;
let char;
document.getElementById("texto").innerHTML = resultado;

function deleteAll() {
    resultado = 0;
    numero1 = "";
    numero2 = "";
    operation = "";
    accNumber1 = 0;
    accNumber2 = 0;
    document.getElementById("texto").innerHTML = resultado;
}

function addChar(c) {
    char = c;
    insertNumberOrOperation();
}

function addNumber() {
    if(operation === "" && numero2 === "") {
        numero1 += char;
        document.getElementById("texto").innerHTML = numero1;
    } else {
        if(numero1 !== "" && operation !== "") {
            numero2 += char;
            document.getElementById("texto").innerHTML = numero1 + operation + numero2;
        }
    }
}

function addOperation() {
    if(numero1 !== "" && operation === "" && numero2 === "") {
        if(numero1.charAt(numero1.length - 1) !== ".") {
            operation = char;
            document.getElementById("texto").innerHTML = numero1 + operation;
        } 
    }
}

function insertNumberOrOperation() {
    if(char === "+" || char === "-" || char === "x" || char === "/" || char === "%") {
        addOperation();
    } else {
        addNumber();
    }
}

let accNumber1 = 0;
let accNumber2 = 0;

function addDecimal(number, accNumber) {
    if(number !== "") {
        if(accNumber == 0) {
            return true;
        }
        return false;
    }
    return false;
}

function insertDecimalInNumber() {
    if(operation === "") {
        if(addDecimal(numero1, accNumber1)) {
            char = ".";
            addNumber();
            accNumber1++;
        }
    } else {
        if(addDecimal(numero2, accNumber2)) {
            char = ".";
            addNumber();
            accNumber2++;
        }
    }
}

function getIntNumber() {
    numero1 = parseFloat(numero1);
    numero2 = parseFloat(numero2);
}

function getOperation() {
    if(numero2.charAt(numero2.length - 1) !== ".") {
        getIntNumber();
        switch (operation) {
            case "+":
                let suma = numero1 + numero2;
                resultado = suma.toString();
                console.log(resultado);
                document.getElementById("texto").innerHTML = resultado;
                numero1 = resultado.toString();
                operation = "";
                numero2 = "";
                break;
            case "-":
                resultado = numero1 - numero2;
                document.getElementById("texto").innerHTML = resultado;
                numero1 = resultado.toString();
                operation = "";
                numero2 = "";
                break;
            case "x":
                resultado = numero1 * numero2;
                document.getElementById("texto").innerHTML = resultado;
                numero1 = resultado.toString();
                operation = "";
                numero2 = "";
                break;
                
            case "/":
                resultado = numero1 / numero2;
                document.getElementById("texto").innerHTML = resultado;
                numero1 = resultado.toString();
                operation = "";
                numero2 = "";
                break;
            case "%":
                resultado = (numero1 * numero2) / 100;
                document.getElementById("texto").innerHTML = resultado;
                numero1 = resultado.toString();
                operation = "";
                numero2 = "";
            default:
                break;
        }
    }
}

function deleteChar() {
    if(numero1 !== "" && operation === "" && numero2 === "") {
        if(numero1[numero1.length - 1] === ".") {
            numero1 = numero1.substring(0, numero1.length - 1);
            accNumber1--;
        } else {
            numero1 = numero1.substring(0, numero1.length - 1);
        }
        document.getElementById("texto").innerHTML = numero1;
    }
    if(numero1 !== "" && operation !== "" && numero2 === "") {
        operation = operation.substring(0, operation.length - 1);
        document.getElementById("texto").innerHTML = numero1 + operation;
    }
    if(numero1 !== "" && operation !== "" && numero2 !== "") {
        if(numero2[numero2.length - 1] === ".") {
            numero2 = numero2.substring(0, numero2.length - 1);
            accNumber2--;
        } else {
            numero2 = numero2.substring(0, numero2.length - 1);
        }
        document.getElementById("texto").innerHTML = numero1 + operation + numero2;
    }
    if(numero1 === "") {
        resultado = 0;
        document.getElementById("texto").innerHTML = resultado;
    }
}
