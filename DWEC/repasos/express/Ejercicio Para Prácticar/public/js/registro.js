document.addEventListener('DOMContentLoaded',function(){
  const form = document.getElementById('formRegistro');

  form.addEventListener('submit', function(e){
    //Prevenir el envío tradicional del formulario(prevenir q se mande a la url del submit)
    e.preventDefault();

    //Datos del form
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const nombre = document.getElementById('nombre').value;

    //Cuerpo de la solicitud
    const data = {username, password, nombre};

    //Usamos un fetch para enviar la info al server, POST

    fetch('/registro',{
      method: 'POST',
      headers:{
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data),
    })
    .then(response => {
      if (response.status === 400) {
          // Usuario ya existe
          throw new Error('El usuario ya existe');
      } else if (!response.ok) {
          // Otras respuestas de error del servidor
          throw new Error('Error en el servidor');
      }
      return response.json();
  })
    .then(data=>{
      if(data.success){
        alert('Registro exitoso. Inicie sesión')
        window.location.href='login.html';
      } else{
        alert('Error en el registro' + data.message);
      }
    })
    .catch((error)=>{
      console.error('Error:',error);
      alert(error.message);
    })

  })
})