document.addEventListener('DOMContentLoaded', function () {
    const ADD_TASK_BUTTON = document.getElementById('add-task-button');
    const TASK_INPUT = document.querySelector('#task-input');
    const TASK_LIST = document.querySelector('.task-list');
    
    ADD_TASK_BUTTON.addEventListener('click', function () {
        const TASK_DESCRIPTION = TASK_INPUT.value.trim();
        if (TASK_DESCRIPTION) {
            addTask(TASK_DESCRIPTION);
            TASK_INPUT.value = '';
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
                const TASK_ELEMENT = document.createElement('div');
                TASK_ELEMENT.className = 'task-item';
                TASK_ELEMENT.innerHTML = `<span>${task.description}</span><button onclick="deleteTask(${task.id})">Eliminar</button>`;
                TASK_LIST.appendChild(TASK_ELEMENT);
            })
            .catch(error => console.error('Error:', error));
    }
    
    window.deleteTask = function (id) {
        fetch(`/tasks/${id}`, {
            method: 'DELETE'
        })
            .then(response => response.json())
            .then(data => {
                document.querySelectorAll('.task-item').forEach(item => {
                    if (item.contains(document.querySelector(`button[onclick="deleteTask(${data.id})"]`))) {
                        TASK_LIST.removeChild(item);
                    }
                });
            })
            .catch(error => console.error('Error:', error));
    };
    
});