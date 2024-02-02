document.addEventListener("DOMContentLoaded", () => {
    fetch("/data")
    .then(response => response.json())
    .then(data => {
        showTasks(data);
    })
    .catch(error => console.error("Error al cargar al cargar el archivo JSON", error))
});

function showTasks(data) {
    const taskList = data.task;

    taskList.forEach(task => {
        const existingTask = document.getElementById(task.id);
        if (!existingTask) {
            switch(task.state) {
                case "ANALYSING": 
                    createTaskElement("no-iniciated-task", "no-iniciated-tasks", task.name, task.id, data);
                    break;
                case "IN_PROGRESS":
                    createTaskElement("iniciated-task", "iniciated-tasks", task.name, task.id, data);
                    break;
                case "DEPLOYED":
                    createTaskElement("finalizated-task", "finalizated-tasks", task.name, task.id, data);
                    break;
            }
        }
    }); 
}

function createTaskElement(newClassName, taskContainerClass, taskName, taskId, data) {
    let rootDiv = document.createElement("div");
    rootDiv.classList.add(newClassName);
    rootDiv.id = taskId;

    let spanName = createElement(taskName);

    let spanIdText = createElement("ID");

    let spanId = createElement(taskId); 
    console.log("Identificador único: " + typeof(taskId));

    let dataTask = document.createElement("div");
    dataTask.classList.add("data-task");

    dataTask.appendChild(spanName);
    dataTask.appendChild(spanIdText);
    dataTask.appendChild(spanId);

    rootDiv.appendChild(dataTask);

    let modifyButton = document.createElement("button");
    modifyButton.classList.add("modify-task-button");
    modifyButton.innerHTML = "Modificar";
    rootDiv.appendChild(modifyButton);

    let deleteButton = document.createElement("button");
    deleteButton.classList.add("delete-task-button");
    deleteButton.type = "submit"; // Establecer el tipo como "submit"
    deleteButton.innerHTML = "Eliminar";
    deleteButton.addEventListener("click", (event) => {
        event.preventDefault(); // Evitar el envío predeterminado del formulario
        deleteTask(taskId);
    });

    rootDiv.appendChild(deleteButton);

    if (newClassName !== "finalizated-task") {
        let moveButton = document.createElement("button");
        moveButton.classList.add("move-task-button");
        moveButton.innerHTML = "Mover";
        rootDiv.appendChild(moveButton);
    }

    return document.getElementById(taskContainerClass).appendChild(rootDiv);
}


function createElement(data) {
    let span = document.createElement("span");
    span.innerHTML = data;
    return span;
}

function addTask() {
    const INPUT_TASK = document.getElementById("task-input").value;
    fetch("/data/add", {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify({"name": INPUT_TASK}),
       
    }).then(response, () => {
        return response.json();
    }).then(data => {
        console.log("Respuesta del servidor: ", data);
    }).catch(err => {
        console.err("Error al realizar petición", err);
    });
}

function deleteTask(id) {
    fetch(`/data/delete/${id}`, {
        method: "DELETE"
    })
    .then(response => {

        
        if (response.ok) {
            console.log("Tarea eliminada correctamente.");

        } else {
            console.error("Error al eliminar la tarea. Estado:", response.status);
        }

    })
    .then(() => {
        let rootDiv = document.getElementById(`${id}`);
        if(rootDiv) {
            rootDiv.parentNode.removeChild(rootDiv);
        }
    })
    .catch(err => {
        console.error("Error al realizar la petición", err);
    });
}

// function cleanContainers(){
//     const noIniciatedTasks = document.getElementById("no-iniciated-tasks");
//     const iniciatedTasks = document.getElementById("iniciated-tasks");
//     const finalizatedTasks = document.getElementById("finalizated-tasks");
//     noIniciatedTasks.innerHTML = "";
//     iniciatedTasks.innerHTML = "";
//     finalizatedTasks.innerHTML = "";
// }

