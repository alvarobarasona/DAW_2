function submitFormulary() {
    var name = document.getElementById("input-name").value;
    var firstSurname = document.getElementById("input-first-surname").value;
    var secondSurname = document.getElementById("input-second-surname").value;
    var sex = document.getElementById("input-sex").value;
    var age = document.getElementById("input-age").value;
    var url = `studentData.html?name=${encodeURIComponent(name)}&firstSurname=${encodeURIComponent(firstSurname)}&secondSurname=${encodeURIComponent(secondSurname)}&sex=${encodeURIComponent(sex)}&age=${encodeURIComponent(age)}`;
    window.location.href = url;
}