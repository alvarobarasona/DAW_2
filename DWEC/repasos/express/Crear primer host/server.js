//Paso 1: Cargamos el módulo http en nuestro programa.

const http = require('http');

//Paso 2: Indicamos hostname y port. Se definen las variables hostname y port que representan la
// dirección IP del host (en este caso, '127.0.0.1', que se refiere a la dirección local) y el número
// de puerto (en este caso, 3000) en el que el servidor escuchará las solicitudes.

const hostname = '127.0.0.1';
const port = 3000;

//Paso 3: Luego usamos el método createServer para aceptar una petición y devolver una respuesta
// con un código de estado. Dentro de la función de devolución de llamada, se configura la
// respuesta HTTP estableciendo el código de estado en 200 (OK), el tipo de contenido en 'text/
// plain', y el cuerpo de la respuesta en ‘Hola Mundo!'.

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hello World! Welcome to Node.js');
});

//Paso 4: Finalmente, escuchamos en un puerto definido con listen. La función listen se utiliza para
// hacer que el servidor escuche en el puerto y la dirección IP especificados. Cuando el servidor
// comienza a escuchar, se ejecuta la función de devolución de llamada que imprime un
// mensaje en la consola indicando que el servidor está en ejecución.

server.listen(port, hostname, () => {
    console.log(`Server running at http://${hostname}:${port}/`);
});