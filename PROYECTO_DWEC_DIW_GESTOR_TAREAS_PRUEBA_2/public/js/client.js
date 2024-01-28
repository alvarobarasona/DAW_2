document.addEventListener("DOMContentLoaded", () => {
    fetch("/data")
    .then(response => response.json())
    .then(data => {
        const ADD_TASK_BUTTON = document.getElementById("add-task-button");
        ADD_TASK_BUTTON.addEventListener("click", () => {
            var acc = 0;
            addTask(data, acc);
            acc++;
        });
        // console.log(data.task[0].name);
        // data.task.forEach(element => {
        //     document.getElementById()
        // });
    })
    .catch(error => console.error("Error al cargar al cargar el archivo JSON", error))
});
function addTask(data, i) {
    const NO_INICIATED_TASK = document.createElement("div");
    NO_INICIATED_TASK.classList.add("no-iniciated-task");
    const NO_INICIATED_TASKS = document.getElementById("no-iniciated-tasks");
    NO_INICIATED_TASKS.appendChild(NO_INICIATED_TASK);
    const DATA_TASK_DIV = document.createElement("div");
    NO_INICIATED_TASK.appendChild(DATA_TASK_DIV);
    const TASK_NAME = document.createElement("span");
    TASK_NAME.innerHTML = data.task[i].name;
    DATA_TASK_DIV.appendChild(TASK_NAME);
    const TASK_ID_LABEL = document.createElement("span");
    TASK_ID_LABEL.innerHTML = "ID:";
    DATA_TASK_DIV.appendChild(TASK_ID_LABEL);
    const TASK_ID = document.createElement("span");
    TASK_ID.innerHTML = Date.now();
    DATA_TASK_DIV.appendChild(TASK_ID);
}