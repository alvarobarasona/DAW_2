function buscarCiudad() {
    var entrada = document.getElementById("entradaUsuario").value;
    if (entrada.length === 0) {
        document.getElementById("listaCiudades").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            var ciudades = JSON.parse(this.responseText);
            mostrarSugerencias(ciudades, entrada);
        }
    };
    xhr.open("GET", "ciudades.json", true);
    xhr.send();
}

function mostrarSugerencias(ciudades, filtro) {
    var lista = "";
    filtro = filtro.toLowerCase();
    ciudades.forEach(function(ciudad) {
        if (ciudad.nombre.toLowerCase().startsWith(filtro)) {
            lista += "<li>" + ciudad.nombre + "</li>";
        }
    });

    document.getElementById("listaCiudades").innerHTML = lista;
}
