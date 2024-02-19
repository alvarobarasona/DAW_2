document.addEventListener("DOMContentLoaded", () => {
  loadPersons();
});

const peopleContainer = document.getElementById("people-container");

function loadPersons() {
  fetch("/persons")
    .then((response) => response.json())
    .then((data) => {
      data.forEach((person) => {
        addPersonToDom(person);
      });
    });
}

const addButton = document.getElementById("add-person-button");

addButton.addEventListener("click", () => {
  addPerson();
});

function addPerson() {
  const nif = document.getElementById("nifinput").value;
  const name = document.getElementById("nameinput").value;
  const firstSurname = document.getElementById("firstsurnameinput").value;
  const secondSurname = document.getElementById("secondsurnameinput").value;
  const age = document.getElementById("ageinput").value;
  const sex = document.getElementById("sexinput").value;
  fetch("/addperson", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      nif: nif,
      name: name,
      firstSurname: firstSurname,
      secondSurname: secondSurname,
      age: age,
      sex: sex,
    }),
  })
    .then((response) => response.json())
    .then((person) => {
      addPersonToDom(person);
    })
    .catch((error) => console.error("Error:", error));
}

function deletePerson(nif) {
  fetch(`/deleteperson/${nif}`, {
    method: "DELETE",
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error("Error al eliminar la persona");
      }
      return response.json();
    })
    .then(() => {
      const personElement = document.getElementById(`${nif}`);
      if (personElement) {
        personElement.parentNode.removeChild(personElement);
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function modifyPerson(nif) {
  var attributeOption = prompt("¿Qué valor deseas modificar? 1. NIF\n2. Nombre\n");
}

function addPersonToDom(person) {
  var personData = document.createElement("div");
  personData.id = `${person.nif}`;
  personData.innerHTML = `<p>Nombre: ${person.name}, Apellido 1: ${person.firstSurname}, Apellido 2: ${person.secondSurname}, Edad: ${person.age}, Sexo: ${person.sex}</p><button id='delete-${person.nif}'>Eliminar</button><button id='edit-${person.nif}'>Editar</button>`;
  peopleContainer.appendChild(personData);

  const deleteButton = document.getElementById(`delete-${person.nif}`);
  const modifyButton = document.getElementById(`modify-${person.nif}`);

  deleteButton.addEventListener("click", () => {
    deletePerson(person.nif);
  });
  modifyButton.addEventListener("click", () => {
    modifyPerson(person.nif);
  });
}