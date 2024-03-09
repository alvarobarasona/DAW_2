const fs = require('fs');

// Lee el archivo JSON existente
fs.readFile('datos.json', 'utf8', (err, data) => {
    if (err) {
        console.error('Error al leer el archivo:', err);
        return;
    }

    // Convierte el contenido a un objeto JavaScript
    let datos = JSON.parse(data);

    // Agrega un nuevo usuario
    datos.usuarios.push({ id: 4, nombre: "NuevoUsuario4", edad: 29 });

    // Convierte el objeto JavaScript modificado a una cadena JSON
    let datosModificados = JSON.stringify(datos, null, 2);

    // Escribe la cadena JSON en un nuevo archivo
    fs.writeFile('datos_modificados.json', datosModificados, 'utf8', (err) => {
        if (err) {
            console.error('Error al escribir en el archivo:', err);
            return;
        }
        console.log('Datos escritos exitosamente en datos_modificados.json');
    });

    // Escribe los nuevos datos sobre el mismo fichero inicial
    fs.writeFile('datos.json', datosModificados, 'utf8', (err) => {
        if (err) {
            console.error('Error al escribir en el archivo:', err);
            return;
        }
        console.log('Datos actualizados exitosamente en datos.json');
    });
});
