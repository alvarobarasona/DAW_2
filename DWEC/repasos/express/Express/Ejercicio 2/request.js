const axios = require('axios');

axios.get('http://localhost:3000/protegido', {
    headers: {
        user: 'usuarioAutorizado'
    }
})
    .then(response => {
        console.log(response.data);
    })
    .catch(error => {
        console.error(error);
    });
