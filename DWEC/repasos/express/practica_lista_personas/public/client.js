document.addEventListener("DOMContentLoaded", () => {
    loadPeople();
});

const peopleContainer = document.getElementById("people-container");

function loadPeople() {
    fetch("/people")
    .then((response) => response.json())
    .then((data) => {
        data.forEach((person) => {
            addPersonToDom(person);
        });
    })
}

function addPersonToDom(person) {
    const personData = document.createElement("div");
    personData.id = person.nif;
    personData.innerHTML = `<p>NIF: ${person.nif}, Nombre: ${person.name}, Primer apellido: ${person.firstSurname}, Segundo apellido: ${person.secondSurname}, Edad: ${person.age}, Sexo: ${person.sex}</p><button id="delete-${person.nif}">Eliminar</button>`;
    peopleContainer.appendChild(personData);

    const deleteButton = document.getElementById(`delete-${person.nif}`);

    deleteButton.addEventListener("click", () => {
        deletePerson(person.nif);
    });
}

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

function deletePerson(nif) {
    fetch(`/deleteperson/${nif}`, {
        method: "DELETE"
    })
    .then((response) => {
        if(!response.ok) {
            throw new Error("Error al eliminar la persona");
        }
        return response.json();
    })
    .then(() => {
        const personElement = document.getElementById(`${nif}`);
        if(personElement) {
            personElement.parentNode.removeChild(personElement);
        }
    })
    .catch((error) => {
        console.error("Error:", error);
    })
}