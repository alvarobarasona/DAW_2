
function coloresAleatorios() {
  const elementos = ['#pendientes .titulo', '#vistas .titulo', '#favoritas .titulo', '#no-recomen .titulo','#pendientes .contenido', '#vistas .contenido', '#favoritas .contenido', '#no-recomen .contenido'];
  elementos.forEach(selector => {
    const elemento = document.querySelector(selector);
    const color = '#' + Math.floor(Math.random()*16777215).toString(16);
    elemento.style.backgroundColor = color;
  });
} 


