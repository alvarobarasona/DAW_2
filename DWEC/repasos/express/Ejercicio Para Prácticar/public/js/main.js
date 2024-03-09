document.addEventListener('DOMContentLoaded', async() => {
  const username = localStorage.getItem('username');
  if (username) {
    const mensajeBienvenida = document.getElementById('mensaje-bienvenida');
    mensajeBienvenida.textContent = `Hola, ${username}`;
  }

  try {
    const response = await fetch(`/peliculas?username=${username}`);
    if (!response.ok) {
      throw new Error('Error del server');
    }
    const peliculas = await response.json();

    const pintarPeliculas = (categoria, listaPeliculas) => {
      const contenedor = document.getElementById(categoria);
      const lista = contenedor.querySelector('.contenido ul');
      lista.innerHTML = '';

      listaPeliculas.forEach((pelicula, index) => { 
        const li = document.createElement('li');
        li.textContent = pelicula;

        const botonEditar = document.createElement('button');
        botonEditar.textContent = 'Editar';
        botonEditar.onclick = () => editarPelicula(categoria, pelicula, index); 
        li.appendChild(botonEditar);

        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'X'
        botonEliminar.onclick=()=>eliminarPelicula(categoria,pelicula);
        li.appendChild(botonEliminar);

        lista.appendChild(li);
      });
    };

    pintarPeliculas('pendientes', peliculas.pendientes);
    pintarPeliculas('vistas', peliculas.vistas);
    pintarPeliculas('favoritas', peliculas.favoritas);
    pintarPeliculas('no-recomen', peliculas.no_recomendadas);
  } catch (err) {
    console.error('Error', err);
    alert('Error al cargar las películas: ' + err.message);
  }

  function editarPelicula(categoriaActual, nombrePelicula) {
    const nuevoNombre = prompt('Nuevo nombre para "' + nombrePelicula + '" o deja en blanco para no cambiar:', nombrePelicula);
    if (nuevoNombre === null) return;
    
    const nuevaCategoria = prompt('Nueva categoría para "' + nombrePelicula + '":\nV - Vistas\nF - Favoritas\nN - No Recomendadas\nP - Pendientes');
    let categoria = '';
    
    switch(nuevaCategoria.toUpperCase()) {
      case 'V': categoria = 'vistas'; break;
      case 'F': categoria = 'favoritas'; break;
      case 'N': categoria = 'no-recomen'; break;
      case 'P': categoria = 'pendientes'; break;
      default: alert('Categoría no válida.'); return;
    }
    
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/editar-pelicula", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        alert(response.message);
        location.reload();
      } else if (xhr.readyState === 4) {
        alert('Error al actualizar la película');
      }
    };
    
    xhr.send(JSON.stringify({
      username: localStorage.getItem('username'),
      nombrePelicula: nombrePelicula,
      nuevoNombre: nuevoNombre.trim() === '' ? nombrePelicula : nuevoNombre,
      categoriaActual: categoriaActual,
      nuevaCategoria: categoria
    }));
  }

  const eliminarPelicula = (categoria, nombrePelicula) => {
    const confirmacion = confirm(`¿Estás seguro de que deseas eliminar "${nombrePelicula}" de ${categoria}?`);
    if (!confirmacion) return;

    const username = localStorage.getItem('username'); 
    if (!username) {
      alert('No se ha detectado un usuario. Por favor, inicie sesión.');
      return;
    }

    fetch('/eliminar-pelicula', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ username, nombrePelicula, categoria }),
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al eliminar película');
      }
      return response.json();
    })
    .then(data => {
      alert(data.message); 
      location.reload();
    })
    .catch(error => {
      console.error('Error:', error);
      alert(error.message);
    });
  };
});
//Funcion de añadir pelicula, la sacamos del DOM content loader, porque no es necesario que este ahí 
document.getElementById('añadir-pelicula').addEventListener('click', () => {
  const nombrePelicula = prompt('Nombre de la nueva película:');
  if (!nombrePelicula) return; 

  const abreviaturaCategoria = prompt('Categoría de la nueva película:\nV - Vistas\nF - Favoritas\nN - No Recomendadas\nP - Pendientes');
  if (!abreviaturaCategoria) return;

  let categoria;
  switch (abreviaturaCategoria.toUpperCase()) {
    case 'V':
      categoria = 'vistas';
      break;
    case 'F':
      categoria = 'favoritas';
      break;
    case 'N':
      categoria = 'no-recomen';
      break;
    case 'P':
      categoria = 'pendientes';
      break;
    default:
      alert('Categoría no válida.');
      return;
  }

  const username = localStorage.getItem('username'); 
  if (!username) {
    alert('No se ha detectado un usuario. Por favor, inicie sesión.');
    return;
  }

  fetch('/agregar-pelicula', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({ username, nombrePelicula, categoria }),
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Error al agregar película');
    }
    return response.json();
  })
  .then(data => {
    alert(data.message); 
    location.reload(); 
  })
  .catch(error => {
    console.error('Error:', error);
    alert(error.message);
  });
});
