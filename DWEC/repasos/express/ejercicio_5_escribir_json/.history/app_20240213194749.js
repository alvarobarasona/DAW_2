const express = require("express");
const app = express();
const port = 3000;
const cors = require("cors");
//Middleware para habilitar CORS
app.use(cors());

app