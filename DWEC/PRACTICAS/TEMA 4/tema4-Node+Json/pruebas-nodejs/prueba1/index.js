const hhtp = require('http');
const hostname = '127.0.0.1';

const server = hhtp.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hola Mundo');
});

server.listen(3000, hostname, () => {
    console.log('El servidor se está ejecutando en http://localhost:3000/');
});