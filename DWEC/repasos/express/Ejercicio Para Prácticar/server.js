const express = require('express');
const fs = require('fs').promises;
const bodyParser = require('body-parser');
const PORT = 7000;
const app = express();
const path = require('path');

// Declaro las rutas de los ficheros JSON
const database = path.join(__dirname, 'data', 'data.json');

// Asegurarse de que express use bodyParser para parsear el cuerpo de las solicitudes
app.use(bodyParser.json());

// Sirve archivos estáticos desde la carpeta 'public'
app.use(express.static(path.join(__dirname, 'public')));

// Endpoint para el registro de usuarios
app.post('/registro', async (req, res) => {
  const { username, password, nombre } = req.body;

  try {
    const data = await fs.readFile(database, 'utf8');
    const db = JSON.parse(data);

    if (db.users.some(u => u.username === username)) {
      return res.status(400).send('El usuario ya existe');
    }

    const newUser = {
      username,
      password,
      nombre,
      peliculas: {
        pendientes: [],
        vistas: [],
        favoritas: [],
        no_recomendadas: []
      }
    };

    db.users.push(newUser);
    await fs.writeFile(database, JSON.stringify(db, null, 2));
    res.send('Usuario registrado con éxito');
  } catch (err) {
    console.error(err);
    res.status(500).send('Error al procesar el JSON de usuario');
  }
});

// Endpoint para el login
app.post('/login', async (req, res) => {
  const { username, password } = req.body;

  console.log(`Intentando iniciar sesión con usuario: ${username} y contraseña: ${password}`);

  try {
    const data = await fs.readFile(database, 'utf8');
    const db = JSON.parse(data);

    console.log("Usuarios registrados:", db.users.map(u => u.username)); // Muestra los usuarios

    const user = db.users.find(u => u.username === username);

    if (!user) {
      console.log('Usuario no encontrado en la base de datos');
    }

    if (user.password === password) {
      console.log('Inicio de sesión exitoso');
      return res.json({ success: true, message: 'Sesión iniciada', username: user.username });
    } else {
      console.log('Contraseña incorrecta');
      return res.status(401).send('Contraseña incorrecta');
    }
  } catch (err) {
    console.error(err);
    res.status(500).send('Error al leer el JSON');
  }
});

//Endpoint para obtener los datos por usuario
app.get('/peliculas', async (req, res) => {
  const username = req.query.username;
  
  try{
    const data = await fs.readFile(database,'utf8');
    const db = JSON.parse(data);
    const user = db.users.find(u => u.username === username);

    if(!user){
      return res.status(404).send('Usuario no encontrado');
    }
    //devolvemos los datos de las peliculas del JSON
    res.json(user.peliculas);
  } catch(err){
    console.error(err);
    res.status(500).send('Error al leer el archivo JSON')
  }
})

app.post('/editar-pelicula', async (req, res) => {
  const { username, nombrePelicula, nuevoNombre, categoriaActual, nuevaCategoria } = req.body;

  try {
    const data = await fs.readFile(database, 'utf8');
    const db = JSON.parse(data);

    // Encontrar al usuario
    const user = db.users.find(u => u.username === username);
    if (!user) {
      return res.status(404).send('Usuario no encontrado');
    }

    // Encontrar la película en la categoría actual
    const index = user.peliculas[categoriaActual].indexOf(nombrePelicula);
    if (index === -1) {
      return res.status(404).send('Película no encontrada en la categoría especificada');
    }

    // Si se proporcionó un nuevo nombre, actualiza el nombre de la película
    const nombreFinal = nuevoNombre || nombrePelicula;

    // Eliminar la película de su categoría actual
    user.peliculas[categoriaActual].splice(index, 1);

    // Asegurar que la nueva categoría existe en el objeto de películas del usuario
    if (!user.peliculas[nuevaCategoria]) {
      user.peliculas[nuevaCategoria] = [];
    }

    // Añadir la película a la nueva categoría
    user.peliculas[nuevaCategoria].push(nombreFinal);

    // Guardar los cambios en el archivo JSON
    await fs.writeFile(database, JSON.stringify(db, null, 2));

    res.json({ success: true, message: 'Película actualizada con éxito' });
  } catch (err) {
    console.error(err);
    res.status(500).send('Error al procesar la solicitud');
  }
});

//Agregar pelicula
app.post('/agregar-pelicula', async (req,res)=>{
  const {username, nombrePelicula, categoria} = req.body;

  try{
    const data = await fs.readFile(database, 'utf8');
    const db = JSON.parse(data);

    //Buscamos al usuario
    const user = db.users.find(u => u.username === username);
    if(!user){
      return res.status(404).send('Usuario no encontrado');
    }

    //Verificar si la categoria introducida existe
    if(!user.peliculas[categoria]){
      return res.status(400).send("La categoría no existe");
    }

    //Validamos si ya existe la misma pelicula en la misma categoría
    if (user.peliculas[categoria].includes(nombrePelicula)) {
      return res.status(409).send('La película ya existe en esta categoría');
    }

    user.peliculas[categoria].push(nombrePelicula);

    await fs.writeFile(database, JSON.stringify(db, null, 2));

    res.json({ success: true, message: 'Película agregada con éxito' })
  } catch (err) {
    console.error(err);
    res.status(500).send('Error al procesar la solicitud');
  }
});

//Eliminar pelicula
app.post('/eliminar-pelicula', async (req, res) =>{
  const { username, nombrePelicula, categoria} = req.body;

  try{
    const data = await fs.readFile(database, 'utf8');
    const db =  JSON.parse(data);

    const user = db.users.find(u => u.username === username);
    if(!user) return res.status(404).send('usuario no encontrado');

    const index = user.peliculas[categoria].indexOf(nombrePelicula);
    if (index === -1) return res.status(404).send('Pelicula no encontrada');

    user.peliculas[categoria].splice(index, 1);

    await fs.writeFile(database, JSON.stringify(db,null,2));
    res.json({success:true, message: 'Pelicula eliminada.'});
  } catch{
    console.error('Error al eliminar pelicula');
    res.status(500).send('Error al procesar la solicitud');
  }
});

// Inicializamos el server en el puerto especificado
app.listen(PORT, () => {
  // Confirmación en consola de que el servidor está corriendo
  console.log(`Server running at http://localhost:${PORT}/`);
});
