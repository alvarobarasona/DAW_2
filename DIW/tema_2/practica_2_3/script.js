// Guardo la ul en la variable
var list = document.getElementById("unordered-list");

//Inicializo el contenido de la lista a la cadena al estar vacía
list.innerHTML = "<h3>No hay tareas agregadas a la lista.</h3>";

// Declaro como variable global el número del elemento
var numberElement = 1;

// Añade el valor del input a la lista en un elemento <li></li>
function addTask() {
    var inputValue = document.getElementById("input").value;
    if(inputValue !== "") {
        if(list.innerHTML == "<h3>No hay tareas agregadas a la lista.</h3>") {
            list.innerHTML = "";
            list.innerHTML += `<li onclick ="changeBackgroundColor('element-${numberElement}')" id = "element-${numberElement}">${inputValue}</li>`;
        } else {
            list.innerHTML += `<li onclick ="changeBackgroundColor('element-${numberElement}')" id = "element-${numberElement}">${inputValue}</li>`;
        }
        numberElement++;
        document.getElementById("input").value = "";
    }
}

// Acumulador para resaltar el fondo de un elemento
let acc_color = 0;

// Cambia el fondo de un elemento a rojo si no hay más elementos con el fondo rojo
function changeBackgroundColor(idElement) {
    var oneElementRed = 1;
    if(acc_color < oneElementRed) {
        var listElement = document.getElementById(idElement);
        listElement.style.backgroundColor = "red";
        acc_color++;
    }
}

// Guardo los diferentes elementos del contenedor en un array
var listArray = list.children;

// Devuelve la posición del elemento con el fondo rojo
function getElementPosition() {
    var position;
    for (let i = 0; i < listArray.length; i++) {
        if(listArray[i].style.backgroundColor === "red") {
            position = i;
        }
    }
    return position;
}

// Diferencia de un array
const ARRAY_DIFFERENCE = 1;
// No hay elementos en el contenedor
const noneElement = 0;

// Elimina la tarea remarcada en rojo si existe una tarea o más
function deleteTask() {
    if(listArray.length > noneElement) {
        list.removeChild(list.children[getElementPosition()]);
        if(listArray.length === noneElement) {
            list.innerHTML = "<h3>No hay tareas agregadas a la lista.</h3>"
        }   
        acc_color = 0;
    }
}

// Hay un único elemento en el contenedor
const oneElement = 1;

// Mueve una posición hacia arriba el elemento seleccionado y baja el elemento que estuviera arriba del selecccionado si existen por lo menos dos elementos en el contenedor. si el elemento seleccionado es el primero, éste pasará a ser el último de la lista
function moveUpTask() {
    if(listArray.length > oneElement) {
        var elementUp = listArray[getElementPosition()];
        var elementDown = listArray[getElementPosition() - 1];
        console.log(elementDown);
        list.insertBefore(elementUp, elementDown);
        console.log(list.children[getElementPosition()]);
        list.children[getElementPosition()].style.backgroundColor = "white";
        acc_color = 0;
    }
}