const button = document.getElementById("click-button");
button.addEventListener("click", () => {
alert("¡Has hecho clic en el botón!");
});
// ------------------------------------------------------
const div1 = document.getElementById("div-2");
div1.addEventListener("mouseover", () => {
div1.style.backgroundColor = "lightblue";
});
// ------------------------------------------------------
const div2 = document.getElementById("div-3");
div2.addEventListener("mouseover", () => {
    div2.style.backgroundColor = "lightblue";
});
div2.addEventListener("mouseout", () => {
    div2.style.backgroundColor = "";
});
// ------------------------------------------------------
const button2 = document.getElementById("button-2");
button2.addEventListener("mousedown", () => {
    button2.innerHTML = "Estás presionando el botón";
});
button2.addEventListener("mouseup", () => {
    button2.innerHTML = "Haz clic y mantén presionado";
});
// ------------------------------------------------------
document.addEventListener("keydown", (event) => {
    // Verificar si la tecla presionada es la tecla "Enter" (código 13)
    if (event.keyCode === 13) {
        alert("La tecla Enter ha sido presionada.");
    }
});
//--------------------------------------------------------
document.addEventListener("keyup", (event) => {
// Verificar si la tecla soltada es la tecla "Espacio" (código 32)
    document.addEventListener("keyup", (event) => {
        // Verificar si la tecla soltada es la tecla "Espacio" (código 32)
        if (event.keyCode === 32) {
            alert("La tecla Espacio ha sido soltada.");
        }
    });
});
//--------------------------------------------------------
const formulario = document.getElementById("formulary");
formulario.addEventListener("submit", (event) => {
    event.preventDefault(); // Evita el envío del formulari
    alert("Formulario enviado correctamente"); // Puedes realizar aquí validaciones antes de enviar el formulario
});
//--------------------------------------------------------
const miInput = document.getElementById("input1");
miInput.addEventListener("input", (event) => {
alert("El valor del campo ha cambiado a: " + event.target.value);
});
//--------------------------------------------------------
const miImagen = document.getElementById("image1");
miImagen.addEventListener("load", () => {
alert("La imagen se ha cargado correctamente.");
// Puedes realizar acciones que dependan de la imagen cargada aquí.
});
//--------------------------------------------------------
document.addEventListener("DOMContentLoaded", () => {
    const miParrafo = document.getElementById("paragraph1");
    miParrafo.textContent = "¡El documento se ha cargado completamente!";
});
//--------------------------------------------------------
function saludar() {
    console.log("¡Hola, mundo!");
}
setTimeout(saludar, 2000);
//--------------------------------------------------------
function incrementarContador() {
    contador++;
    console.log("Contador: " + contador);
}

const intervalID = setInterval(incrementarContador, 1000);

setTimeout(() => {
    clearInterval(intervalID);
    console.log("Intervalo detenido después de 5 segundos.");
}, 5000);
//--------------------------------------------------------
const input = document.getElementById("input2");
 input.addEventListener("focus", () => {
    input.style.backgroundColor = "lightblue";
 });
 input.addEventListener("blur", () => {
    input.style.backgroundColor = "white";
 });
//--------------------------------------------------------
 const div = document.getElementById("div-4");
 div.addEventListener("contextmenu", (event) => {
    event.preventDefault(); // Evita que aparezca el menú contextual predeterminado
    alert("Has hecho clic derecho en el div.");
 });
 //--------------------------------------------------------
 const draggable = document.getElementById("draggable");
 const droppable = document.getElementById("droppable");
 draggable.addEventListener("dragstart", (event) => {
 event.dataTransfer.setData("text/plain", "Este es un elemento arrastrable");
 });
 droppable.addEventListener("dragover", (event) => {
 event.preventDefault();
 });
 droppable.addEventListener("drop", (event) => {
 event.preventDefault();
 const data = event.dataTransfer.getData("text/plain");
 droppable.innerHTML = data;
 });

 window.addEventListener("beforeunload", (event) => {
    event.preventDefault(); // Previene que la ventana se cierre inmediatamente
    event.returnValue = ''; // Muestra un mensaje personalizado al usuario
});