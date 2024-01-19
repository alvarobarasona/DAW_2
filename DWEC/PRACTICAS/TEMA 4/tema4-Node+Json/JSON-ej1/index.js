const fs = require('fs');

fs.readFile('datos.json', 'utf8', (err, data) => {
    if (err) {
        console.error('Error al leer el archivo:', err);
        return;
    }

    const datos = JSON.parse(data);

    console.log('Usuarios:');
    datos.usuarios.forEach(usuario => {

        console.log(`nombre: ${usuario.id}, Nombre: ${usuario.nombre}, Edad: ${usuario.edad}`);
    });
});
