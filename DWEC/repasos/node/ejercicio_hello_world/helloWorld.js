/*
Vamos a empezar con el programa básico «Hello World», donde crearemos un servidor en 
Node.js que devolverá una salida «Hello World» en una petición al servidor.
*/
//Cargamos el módulo HTTP en nuestro programa.
const HTTP = require("http");
//Se defina la constante HOST_NAME que representa la dirección IP del host(127.0.0.1 es la dirección local).
const HOST_NAME = "127.0.0.1";
//Se define la constante PORT que representa el número de puerto.
const PORT = 3000;
//Usamos el método createServer guardándo lo que devuelve en la constante SERVER, para así aceptar una petición(req) y devolver una respuesta(res) con un código de estado.
const SERVER = HTTP.createServer((req, res) => {
    /*
    Configuramos la respuesta HTTP de la siguiente forma:
    Se establece el código de estado en 200(OK).
    */
   const OK = 200;
   res.statusCode = OK;
   //Se establece el tipo de contenido en 'text/plain'.
   res.setHeader("Content-Type", "text/plain");
    //Se establece el cuerpo de la respuesta en 'Hola Mundo!'.
    res.end("Hello World! Welcome to Node.js");
});
/*
Escuchamos en un puerto definido con el método listen, que se utiliza para que el servidor
pueda escuchar en el puerto con dirección IP especificados. Cuando el servidor comienza a escuchar,
se ejecuta la función de devolución de llamada, imprimiendo un mensaje por consola indicando que
el servidor se está ejecutando.
*/
SERVER.listen(PORT, HOST_NAME, () => {
    console.log(`Server running at http://${HOST_NAME}:${PORT}/`);
});