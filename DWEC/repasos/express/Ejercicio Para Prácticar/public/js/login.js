document.addEventListener('DOMContentLoaded', function(){
  const form = document.getElementById('formLogin');

  form.addEventListener('submit',function(e){
    e.preventDefault();

    //Valores a comparar
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    const data = {username, password};

  fetch('/login',{
    method:'POST',
    headers:{
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(data),
    })
    .then(response => {
      if (!response.ok) {
          if (response.status === 404) {
              throw new alert('Usuario no encontrado');
          } else if (response.status === 401) {
              throw new alert('Contraseña incorrecta');
          } else {
              throw new alert('Error en el servidor');
          }
      }
      return response.json();
  }) 
  
    .then(data =>{
      if(data.success){
        // Guarda el username en localStorage
        localStorage.setItem('username', data.username);
        
        //Si inicio de sesion bien, mandamos al usuario a main
        window.location.href = 'main.html';
      } else {
        //Error:
        alert('Inicio de sesión fallido: '+ data.message);
      }
    })
    .catch((error)=>{
      console.error('Error',error);
      alert('Error en el proceso de inicio de sesión');
    });
  });
});  