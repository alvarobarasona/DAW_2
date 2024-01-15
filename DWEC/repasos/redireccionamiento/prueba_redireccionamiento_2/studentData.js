const params = new URLSearchParams(window.location.search);
document.getElementById("name").textContent = decodeURIComponent(params.get("name"));
document.getElementById("first-surname").textContent = decodeURIComponent(params.get("firstSurname"));
document.getElementById("second-surname").textContent = decodeURIComponent(params.get("secondSurname"));
document.getElementById("age").textContent = decodeURIComponent(params.get("age"));
document.getElementById("sex").textContent = decodeURIComponent(params.get("sex"));