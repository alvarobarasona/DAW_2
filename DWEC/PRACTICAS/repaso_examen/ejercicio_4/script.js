//Declaro array de estudiantes vacío
let studentsArray = [];

//Creo constructor del objeto Estudiante
function Student(name, age, subjectsList) {
    this.name = name;
    this.age = age;
    this.subjectsList = subjectsList;
}

//Devuelve un array de strings con una o varias posiciones
function getSubjects() {
    var stringSubject = prompt("Introduce una o varias materias separadas por comas:");
    return stringSubject.split(",");
}

//Creo un objeto de Estudiante y lo introduzco en el array studentsArray
function addStudent() {  
    var student = new Student(prompt("Introduce el nombre del estudiante:"), prompt("Introduce la edad del estudiante:"), getSubjects());
    studentsArray.push(student);
    console.log(studentsArray);
}

//Devuelve un número entero parseado de la posición del estudiante en el array con la que se desea trabajar
function getPositionOfStudent() {
    var studentPosition = parseInt(prompt("Introduce la posición del alumno al que deseas añadir una o varias materias separadas por comas:"));
    return studentPosition;
}

//Solo hay un estudiante en el array
const UNIQUE_STUDENT = 1;
//Diferencia de los arrays
const ARRAY_DIFFERENCE = 1;
//Posición mínimima del estudiante en el array studentsArray
const MIN_POSITION = 1;
//Posición máxima del estudiante en el array studentsArray
let maxPosition;

function insertSubjectIntoArray(studentPosition) {
    var subjectsArray = getSubjects();
    var subject;
    for (let i = 0; i < subjectsArray.length; i++) {
        subject = subjectsArray[i];
        studentsArray[studentPosition].subjectsList.push(subject);
    }
}

//Añade una asignatura al estudiante en caso de que el array studentsArray no esté vacío. Si sólo existe un estudiante en el array, directamente insertará las asignaturas a ese estudiante. Si hay más de uno, la función preguntará primero el número de la posición del estudiante al que se le desea añadir asignaturas
function addSubject() {
    if(studentsArray != null) {
        var studentPosition;
        if(studentsArray.length === UNIQUE_STUDENT) {
            studentPosition = 0;
            insertSubjectIntoArray(studentPosition);
            console.log(studentsArray);
        }
        if(studentsArray.length > UNIQUE_STUDENT) {
            console.log("Posición mínima: " + MIN_POSITION);
            maxPosition = studentsArray.length;
            console.log("Posición máxima: " + maxPosition);
            studentPosition = 0;
            do {
                studentPosition = getPositionOfStudent();
            } while(studentPosition < MIN_POSITION || studentPosition > maxPosition);
            studentPosition -= ARRAY_DIFFERENCE;
            console.log("Posición estudiante: " + studentPosition);
            insertSubjectIntoArray(studentPosition);
            console.log(studentsArray);
        }
    }
}

//Construye la estructura a imprimir del array de asignaturas del numero de estudiante que se le pasa por parámetro
function showSubject(studentPosition) {
    var subjectsString = "";
    var subjectsArray = studentsArray[studentPosition].subjectsList;
    for (let i = 0; i < subjectsArray.length; i++) {
        subjectsString += `<p>${subjectsArray[i]}</p><br>`;
    }
    return subjectsString;
}

//Guardo el div con in "container" del documento html en la variable container
let container = document.getElementById("container");

//Construye la estructura a imprimir del array de estudiantes haciendo uso de la función showSubject() para recibir las asignaturas del numero de estudiante que se le pasa por parámetro
function showStudent(studentPosition) {
    container.innerHTML = "";
    container.innerHTML += `<h2>Nombre: ${studentsArray[studentPosition].name}</h2><br><p>Edad: ${studentsArray[studentPosition].age}</p><br><p>Asignaturas:</p><br>${showSubject(studentPosition)}`;
}

//Imprime el estudiante si el array studentsArray no está vacío. Si sólo existe un estudiante en el array, directamente imprimirá la información de ese estudiante. Si hay más de uno, la función preguntará primero el número de la posición del estudiante que se desea imprimir la información
function printStudent() {
    if(studentsArray != null) {
        if(studentsArray.length === UNIQUE_STUDENT) {
            var studentPosition = 0;
        }
        if(studentsArray.length > UNIQUE_STUDENT) {
            maxPosition = studentsArray.length;
            var studentPosition = 0;
            do {
                studentPosition = parseInt(prompt("Introduce la posición del alumno que deseas ver la información:"));
            } while(studentPosition < MIN_POSITION || studentPosition > maxPosition);
            studentPosition -= ARRAY_DIFFERENCE;   
        } 
        showStudent(studentPosition);
    }
}