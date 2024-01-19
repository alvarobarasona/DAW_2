const title = document.getElementById(`title`);
const text = document.getElementById(`text`);
const contentTitle1 = `Ejercicio A`;
const contentText1 = `El título de ésta página cambiará a "¡Hola Universo!", y éste mismo texto se pondrá de color azul cambiando su clase a newClass al hacer click en el botón.`;
const contentTitle2 = `¡Hola Universo!`;
title.textContent = contentTitle1;
text.textContent = contentText1;

function changePage() {
    title.textContent = contentTitle2;
    text.className = `newClass`;
}