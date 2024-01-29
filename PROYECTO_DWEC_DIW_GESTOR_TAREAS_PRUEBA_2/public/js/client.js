document.addEventListener("DOMContentLoaded", () => {
    fetch("/data")
    .then(response => response.json())
    .then(data => {
        showTasks(data);

    })
    .catch(error => console.error("Error al cargar al cargar el archivo JSON", error))
});

function showTasks(data) {
    
    let taskList = data.task;
    console.log(taskList);

    taskList.forEach(task => {
        
        switch(task.state) {

            case "ANALYSING": 
                console.log("Hello analysing")
                createTaskElement("no-iniciated-task", "no-iniciated-tasks", task.name, task.id);
            break;
            case "IN_PROGRESS":
                console.log("Hello in-progress")

                createTaskElement("iniciated-task", "iniciated-tasks", task.name, task.id);
            break;
            case "DEPLOYED":
                console.log("Hello deploy")
                createTaskElement("finalizated-task", "finalizated-tasks", task.name, task.id);
            break;
        }
    }); 
}

function createTaskElement(newClassName, taskContainerClass, taskName, taskId){

    let rootDiv = document.createElement("div")
    rootDiv.classList.add(newClassName);

    let spanName = createElement(taskName);
    console.log(spanName);

    let spanIdText = createElement("ID");
    console.log(spanIdText);
    
    let spanId = createElement(taskId);
    console.log(spanId);

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
    deleteButton.innerHTML = "Eliminar";
    deleteButton.setAttribute("onclick", `deleteTask(${taskId})`);
    rootDiv.appendChild(deleteButton);

    let moveButton = document.createElement("button");
    moveButton.classList.add("move-task-button");
    moveButton.innerHTML = "Mover";
    rootDiv.appendChild(moveButton);

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
    }).then(response => {
        return response.json();
    }).then(data => {
        console.log("Respuesta del servidor: ", data);
    }).catch(err => {
        console.err("Error al realizar petición", err);
    });
}