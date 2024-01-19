function getStudentData() {
    const name = document.getElementById("name").value;
    const surname = document.getElementById("surname").value;
    const sex = document.getElementById("sex").value;
    const url = `studentData.html?name=${encodeURIComponent(name)}&surname=${encodeURIComponent(surname)}&sex=${encodeURIComponent(sex)}`;
    window.location.href = url;
}