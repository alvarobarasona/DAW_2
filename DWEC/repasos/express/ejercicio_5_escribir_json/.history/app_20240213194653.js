const express = require("express");
const cors = require("cors");
const app = express();
const port = 3000;

//Middleware 
app.use(cors());