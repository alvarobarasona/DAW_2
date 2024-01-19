function submitFormulary() {
    const name = document.getElementById("name").value;
    const firstSurname = document.getElementById("first-surname").value;
    const secondSurname = document.getElementById("second-surname").value;
    const age = document.getElementById("age").value;
    const sex = document.getElementById("sex").value;
    const url = `studentData.html?name=${encodeURIComponent(name)}&firstSurname=${encodeURIComponent(firstSurname)}&secondSurname=${encodeURIComponent(secondSurname)}&age=${encodeURIComponent(age)}&sex=${encodeURIComponent(sex)}`;
    window.location.href = url;
}