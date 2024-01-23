const fs = require('fs');

function modificarYGuardarDatos(nombreArchivo, nuevoUsuario, archivoSalida) {
    fs.readFile(nombreArchivo, "utf8", (err, data) => {
        if (err) {
            console.error("Error al leer el archivo:", err);
            return;
        }
        const datosActuales = JSON.parse(data);
        
        datosActuales.usuarios.push(nuevoUsuario);
        
        const datosCombinadosJSON = JSON.stringify(datosActuales, null, 4);
        
        fs.writeFile(archivoSalida, datosCombinadosJSON, 'utf8', (err) => {
            if (err) {
                console.error("Error al escribir el archivo:", err);
                return;
            }
            console.log(`Datos nuevos creados correctamente en ${archivoSalida}`);
        });
    });
}

const newUser = {
    id: 6,
    nombre: "Luisito",
    edad: 30
};

modificarYGuardarDatos("datos.json", newUser, "datos_modificados.json");

modificarYGuardarDatos("datos.json", newUser, "datos.json");
