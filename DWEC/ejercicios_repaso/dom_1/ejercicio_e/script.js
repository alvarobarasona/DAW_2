function showAllElementsItemClass() {
    const listClassItem = document.querySelectorAll(`.item`);
    listClassItem.forEach((element) => console.log(element.textContent));
}

function showthreeFirstElementsOutstandingClass() {
    const listClassOutstanding = document.querySelectorAll(`ul div.outstanding:nth-child(n-3)`);
    listClassOutstanding.forEach((element) => console.log(element.textContent));
}