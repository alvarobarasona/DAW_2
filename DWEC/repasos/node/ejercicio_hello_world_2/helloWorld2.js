const HTTP = require("http");
const SERVER = HTTP.createServer((req, res) => {
    const OK = 200;
    res.statusCode = OK;
    res.setHeader("Content-Type", "text/plain");
    res.end("pula");
});
const HOST_NAME = "127.0.0.1";
const PORT = 3000;
SERVER.listen(PORT, HOST_NAME, () => {
    console.log(`Server running at http://${HOST_NAME}:${PORT}/`);
});