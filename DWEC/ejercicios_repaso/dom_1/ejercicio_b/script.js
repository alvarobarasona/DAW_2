const listOfElements = document.getElementsByClassName(`element-list`);
console.log(listOfElements);
function changeElementsOfList() {
    for(let i=0; i < listOfElements.length; i++) {
        listOfElements[i].style.backgroundColor = `green`;
        listOfElements[i].style.color = `red`;
    }
}