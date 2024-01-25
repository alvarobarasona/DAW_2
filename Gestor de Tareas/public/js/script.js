document.addEventListener('DOMContentLoaded', function() {
    const addButton = document.querySelector('#add-task');
    const taskInput = document.querySelector('#task-input');

    addButton.addEventListener('click', function() {
        const taskDescription = taskInput.value.trim();
        if (taskDescription) {
            addTask(taskDescription);
            taskInput.value = '';
        }
    });

    function addTask(description) {
        fetch('/tasks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `description=${encodeURIComponent(description)}`
        })
            .then(response => response.json())
            .then(task => {
                const taskElement = createTaskElement(task);
                document.querySelector('#new-tasks .task-list').appendChild(taskElement);
            })
            .catch(error => console.error('Error:', error));
    }

    function createTaskElement(task) {
        const taskElement = document.createElement('div');
        taskElement.className = 'task-item';
        taskElement.dataset.id = task.id;

        const taskDesc = document.createElement('span');
        taskDesc.className = 'task-desc';
        taskDesc.textContent = task.description;
        taskDesc.contentEditable = false;

        const stateButton = document.createElement('button');
        if (task.status === 'new') {
            stateButton.textContent = 'Mover a En Curso';
            stateButton.onclick = function() { moveTask(task.id, 'in-progress'); };
        } else if (task.status === 'in-progress') {
            stateButton.textContent = 'Mover a Terminadas';
            stateButton.onclick = function() { moveTask(task.id, 'completed'); };
        } else if (task.status === 'completed') {
            stateButton.textContent = 'Mover a Nuevas';
            stateButton.onclick = function() { moveTask(task.id, 'new'); };
        }

        const editButton = document.createElement('button');
        editButton.className = 'edit-btn';
        editButton.textContent = 'Editar';
        editButton.onclick = function() { editTaskMode(task.id, editButton); };

        const deleteButton = document.createElement('button');
        deleteButton.textContent = 'Eliminar';
        deleteButton.onclick = function() { deleteTask(task.id); };

        taskElement.appendChild(taskDesc);
        taskElement.appendChild(stateButton);
        taskElement.appendChild(editButton);
        taskElement.appendChild(deleteButton);

        return taskElement;
    }



    function editTaskMode(taskId, editButton) {
        const taskElement = document.querySelector(`div[data-id="${taskId}"]`);
        const taskDesc = taskElement.querySelector('.task-desc');
        taskDesc.contentEditable = true;
        taskDesc.focus();

        // Cambiar el botón de "Editar" a "Guardar"
        editButton.textContent = 'Guardar';
        editButton.onclick = function() {
            updateTask(taskId, taskDesc.innerText);
            taskDesc.contentEditable = false;
            editButton.textContent = 'Editar';
            editButton.onclick = function() { editTaskMode(taskId, editButton); };
        };
    }

    function updateTask(id, newDescription) {
        fetch(`/tasks/${id}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ description: newDescription })
        })
            .then(response => response.json())
            .catch(error => console.error('Error:', error));
    }

    function moveTask(taskId, newStatus) {
        fetch(`/tasks/${taskId}/status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ status: newStatus })
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error al mover la tarea');
                }
                return response.json();
            })
            .then(updatedTask => {
                const taskElement = document.querySelector(`div[data-id="${updatedTask.id}"]`);
                const stateButton = taskElement.querySelector('button:first-of-type');

                if (updatedTask.status === 'in-progress') {
                    stateButton.textContent = 'Mover a Terminadas';
                    stateButton.onclick = function() { moveTask(updatedTask.id, 'completed'); };
                } else if (updatedTask.status === 'completed') {
                    stateButton.textContent = 'Mover a En Curso';
                    stateButton.onclick = function() { moveTask(updatedTask.id, 'in-progress'); };
                }

                document.querySelector(`#${updatedTask.status}-task-list`).appendChild(taskElement);
            })
            .catch(error => console.error('Error:', error));
    }

    window.deleteTask = function(id) {
        fetch(`/tasks/${id}`, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => {
                const taskElement = document.querySelector(`div[data-id="${data.id}"]`);
                if (taskElement) {
                    taskElement.remove();
                }
            })
            .catch(error => console.error('Error:', error));
    };

    function loadTasks() {
        fetch('/tasks')
            .then(response => response.json())
            .then(data => {
                data.tasks.forEach(task => {
                    const taskElement = createTaskElement(task);
                    document.querySelector(`#${task.status}-task-list`).appendChild(taskElement);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    loadTasks();
});

document.querySelector('#delete-all-tasks').addEventListener('click', function() {
    if (confirm('¿Estás seguro de que quieres eliminar todas las tareas?')) {
        fetch('/tasks', {
            method: 'DELETE'
        })
            .then(response => {
                if (response.ok) {
                    // Elimina todas las tareas del DOM de las tres columnas
                    document.querySelectorAll('.task-list').forEach(taskList => {
                        while (taskList.firstChild) {
                            taskList.removeChild(taskList.firstChild);
                        }
                    });
                } else {
                    throw new Error('No se pudo eliminar las tareas');
                }
            })
            .catch(error => console.error('Error:', error));
    }
});

document.querySelector('#download-pdf').addEventListener('click', downloadTasksAsPDF);

function downloadTasksAsPDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    let y = 10; // Posición vertical inicial para empezar a escribir

    doc.text('Tareas', 10, y);
    y += 10;

    document.querySelectorAll('.task-item').forEach((taskElement, index) => {
        const taskDesc = taskElement.querySelector('.task-desc').textContent;
        const taskStatus = taskElement.parentNode.id; // Obtiene el ID del contenedor padre para saber el estado

        doc.text(`${index + 1}. ${taskDesc} (Estado: ${taskStatus})`, 10, y);
        y += 10;
    });

    doc.save('tareas.pdf');
}



