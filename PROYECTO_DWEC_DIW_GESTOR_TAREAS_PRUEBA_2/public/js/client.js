document.addEventListener("DOMContentLoaded", () => {
    fetch("/data")
    .then(response => response.json())
    .then(data => {
        console.log(data);
    })
    .catch(error => console.error("Error al cargar al cargar el archivo JSON", error))
});