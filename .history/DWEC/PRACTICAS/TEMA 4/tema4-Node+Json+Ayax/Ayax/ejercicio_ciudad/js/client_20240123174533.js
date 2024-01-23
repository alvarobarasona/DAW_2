function showSuggestions(str) {
    if(str.length == 0) {
        document.getElementById("cities").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                document.getElementById("cities").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "http://localhost");
    }
}

const inputCity = document.getElementById("inputcitty");

const XMLHR = new XMLHttpRequest();
    if(XMLHR.readyState === 4 && XMLHR.status === 200) {
        const cities = JSON.parse(XMLHR.responseText);

        const resultado = document.getElementById("resultado");
        resultado.innerHTML = "";

        cities.forEach(ciudad => {
            const elementos = document.createElement("li");
            elementos.textContent = ciudad.nombre;
            resultado.appendChild(elementos);
        });
    }
    XMLHR.open("GET", "/consultarCiudades", true);