document.getElementById('enviarTarea').addEventListener('click', function() {
    const descripcion = document.getElementById('tareaInput').value;
    if (!descripcion) {
        alert('Por favor, ingrese la descripción de la tarea.');
        return;
    }

    fetch('https://jsonplaceholder.typicode.com/todos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ title: descripcion, userId: 1, completed: false })
    })
        .then(response => response.json())
        .then(data => {
            const lista = document.getElementById('listaTareas');
            const elemento = document.createElement('li');
            elemento.textContent = `Tarea: ${data.title}, Estado: ${data.completed ? 'Completado' : 'Pendiente'}`;
            lista.appendChild(elemento);

            // Limpiar el campo de entrada después de enviar.
            document.getElementById('tareaInput').value = '';
        })
        .catch(error => console.error('Error al agregar tarea:', error));
});
