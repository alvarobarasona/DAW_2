const unorderedList = document.getElementsByTagName(`ul`);

function changeList() {
    for (let i = 0; i < unorderedList.length; i++) {
        unorderedList[i].style.color = `green`;
    }
}