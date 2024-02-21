const addPersonButton = document.getElementById("add-person-button");



addPersonButton.addEventListener("click", () => {
  addPerson();
});

function addPerson() {
    const personNif = document.getElementById("nif").value;
    const personName = document.getElementById("name").value;
    const personFirstSurname = document.getElementById("first-surname").value;
    const personSecondSurname = document.getElementById("second-surname").value;
    const personAge = document.getElementById("age").value;
    const personSex = document.getElementById("sex").value;
    console.log(personNif);

    fetch("/addperson", {
        method: "POST",
        headers: { "Content-Type": "application/json"},
        body: JSON.stringify({
            nif: personNif,
            name: personName,
            firstSurname: personFirstSurname,
            secondSurname: personSecondSurname,
            age: personAge,
            sex: personSex
        })
    })
    .then((response) => response.json())
    .catch((error) => console.error("Error al añadir la persona al JSON", error));
}