let container = document.getElementById("start-container");
const BUTTON = document.getElementById("start-button");
BUTTON.addEventListener("click", () => {
    container.id = "container";
    container.innerHTML = "";
    const MARIO = document.createElement("img");
    MARIO.src = "mario.gif"
    MARIO.setAttribute("alt", "mario");
    MARIO.id = "mario";
    container.appendChild(MARIO);
    const SHELL = document.createElement("img");
    SHELL.src = "caparazon.gif"
    SHELL.setAttribute("alt", "caparazon");
    SHELL.id = "shell";
    container.appendChild(SHELL);
});
