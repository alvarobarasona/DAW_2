const params = new URLSearchParams(window.location.search);
document.getElementById("name").textContent = decodeURIComponent(params.get("name"));
document.getElementById("surname").textContent = decodeURIComponent(params.get("surname"));
document.getElementById("sex").textContent = decodeURIComponent(params.get("sex"));