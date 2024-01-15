const HTTP = require("http");
const SERVER = HTTP.createServer((req, res) => {
    const OK = 200;
    res.statusCode = 200;
    res.setHeader("Content-Type", "text/plain");
    res.end("pula pulita pula");
});
const PORT = 3000;
const HOST_NAME = "127.0.0.1";
SERVER.listen(PORT, HOST_NAME, () => {
    console.log(`Server running at http://${HOST_NAME}:${PORT}/`);
});