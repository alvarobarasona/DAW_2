function highlightElements(numList) {
    var list = document.getElementById(numList);
    list.classList.toggle('resaltar');
}

function hideElements(numList) {
    var list = document.getElementById(numList);
    list.classList.add('oculto');
}

function showElements(numList) {
    var list = document.getElementById(numList);
    list.classList.remove('oculto');
}