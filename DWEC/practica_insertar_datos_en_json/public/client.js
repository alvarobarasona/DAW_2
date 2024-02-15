const addButton = document.getElementById("add-button");

let inputValue;

addButton.addEventListener("click", () => {
    inputValue = document.getElementById("word-input").value;
    console.log(inputValue);
});