const url = require('url');

const parsedUrl = url.parse('http://www.example.com/pagina?query=123', true);
console.log(parsedUrl);

const formattedUrl = url.format(parsedUrl);
console.log(formattedUrl);

const resolvedUrl = url.resolve('http://www.example.com/', '/nueva/pagina');
console.log(resolvedUrl);
