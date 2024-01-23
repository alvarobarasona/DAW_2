const fs = require('fs');

const nuevoDatos = {
    usuarios: [
        { id: 4, nombre: "max", edad: 25 },
    ]
};

fs.readFile('datos.json', 'utf8', (err, data) => {
    if (err) {
        console.error('Error al leer el archivo:', err);
        return;
    }
    
    const datos = JSON.parse(data);
    
    const datosCombinados = {
        usuarios: datos.usuarios.concat(nuevoDatos.usuarios)
    };
    
    
    const nuevoDatosJSON = JSON.stringify(datosCombinados, null, 2);
    
    fs.writeFile('datos.json', nuevoDatosJSON, 'utf8', (err) => {
        if (err) {
            console.error('Error al escribir en el archivo:', err);
            return;
        }
        
        console.log('Datos escritos exitosamente en datos.json');
        
        
    });
});
