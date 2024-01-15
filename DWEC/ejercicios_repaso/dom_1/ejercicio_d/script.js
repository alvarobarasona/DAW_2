const list = document.getElementsByClassName(`element`);
function changeClass() {
    for (let i = 0; i < list.length; i++) {
        console.log(list[i].textContent);
    }
}