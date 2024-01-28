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
                createTaskElement("no-iniciated-task", "no-iniciated-tasks", task.name);
            break;
            case "IN_PROGRESS":
                console.log("Hello in-progress")

                createTaskElement("iniciated-task", "iniciated-tasks", task.name);
            break;
            case "DEPLOYED":
                console.log("Hello deploy")
                createTaskElement("finalizated-task", "finalizated-tasks", task.name);
            break;
        }
    }); 
}

function createTaskElement(newClassName, taskContainerClass, taskName){

    let rootDiv = document.createElement("div")
    rootDiv.classList.add(newClassName);

    let spanName = createElement(taskName);
    console.log(spanName);

    let spanId = createElement("ID");
    console.log(spanId);
    
    let spanDate = createElement(Date.now());
    console.log(spanDate);

    rootDiv.appendChild(spanName);
    rootDiv.appendChild(spanId);
    rootDiv.appendChild(spanDate);
    
    return document.getElementById(taskContainerClass).appendChild(rootDiv);
}

function createElement(data) {
    let span = document.createElement("span");
    span.innerHTML = data;
    return span;
}
