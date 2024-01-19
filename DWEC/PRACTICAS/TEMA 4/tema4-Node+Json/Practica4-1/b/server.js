const http = require('http');
const fs = require('fs');
const path = require('path');

const server = http.createServer((req, res) => {
    let filePath = path.join(__dirname, 'public', req.url === '/' ? 'index.html' : req.url);
    if (req.url === '/saludo') {
        filePath = path.join(__dirname, 'public', 'saludo.html');
    } else if (req.url === '/despedida') {
        filePath = path.join(__dirname, 'public', 'despedida.html');
    }

    let extname = path.extname(filePath);
    let contentType = 'text/html';

    switch (extname) {
        case '.css':
            contentType = 'text/css';
            break;
        case '.js':
            contentType = 'text/javascript';
            break;
        case '.json':
            contentType = 'application/json';
            break;
    }

    fs.readFile(filePath, (error, content) => {
        if (error) {
            if (error.code === 'ENOENT') {
                res.writeHead(404, {'Content-Type': 'text/html'});
                res.end('Página no encontrada', 'utf-8');
            } else {
                res.writeHead(500);
                res.end('Error interno del servidor', 'utf-8');
            }
        } else {
            res.writeHead(200, {'Content-Type': contentType});
            res.end(content, 'utf-8');
        }
    });
});

server.listen(3000, () => {
    console.log('Servidor ejecutándose en http://localhost:3000/');
});
