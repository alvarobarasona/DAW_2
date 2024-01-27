document.addEventListener("DOMContentLoaded", () => {
    fetch("/data")
    .then(response => response.json())
    .then(data => {
        const ADD_TASK_BUTTON = document.getElementById("add-task-button");
        ADD_TASK_BUTTON.addEventListener("click", () => {

        });
        console.log(data.task[0].name);
        data.task.forEach(element => {
            document.getElementById()
        });
    })
    .catch(error => console.error("Error al cargar al cargar el archivo JSON", error))
});
function addTask() {
    const NO_INICIATED_TASK = document.createElement("div");
    NO_INICIATED_TASK.classList.add("no-iniciated-task");
    const NO_INICIATED_TASKS = document.getElementById("no-iniciated-tasks");
    NO_INICIATED_TASKS.appendChild(NO_INICIATED_TASK);
    const DATA_TASK_DIV = document.createElement("div");
    NO_INICIATED_TASK.appendChild(DATA_TASK_DIV);
    const TASK_NAME = document.createElement("");
}