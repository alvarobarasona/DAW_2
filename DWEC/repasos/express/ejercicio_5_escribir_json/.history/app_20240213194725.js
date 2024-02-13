const express = require("express");

const app = express();
const port = 3000;

//Middleware para habilitar CORS
app.use(cors());