const http = require('http');

const server = http.createServer((req, res) => {
    res.statusCode = 200;
    res.setHeader('Content-Type', 'text/plain');
    res.end('Hola Mundo\n');
});

server.listen(3000, 'localhost', () => {
    console.log('Servidor corriendo en http://localhost:3000/');
});

