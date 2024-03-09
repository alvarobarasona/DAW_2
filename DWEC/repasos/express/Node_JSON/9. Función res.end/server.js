const http = require('http');

const server = http.createServer((req, res) => {
    res.end('Finalizando la respuesta');
});

server.listen(3000, 'localhost', () => {
    console.log('Servidor corriendo en http://localhost:3000/');
});
