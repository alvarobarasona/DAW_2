const express = require('express');
const app = express();

// Middleware para procesar JSON
app.use(express.json());

const authMiddleware = (req, res, next) => {
    const user = req.headers.user;

    if (user === "usuarioAutorizado") {
        next();
    } else {
        res.status(403).send('Acceso denegado');
    }
};

app.use('/protegido', authMiddleware);

app.get('/protegido', (req, res) => {
    res.send('Acceso a ruta protegida concedido');
});


const PORT = 3000;

app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
