const loginButton = document.getElementById("login-button");

loginButton.addEventListener("click", (event) => {
    // * Evita que el formulario se envíe por defecto
    event.preventDefault();
    const userName = document.getElementById("user-name-input").value;
    const userPassword = document.getElementById("password-input").value;
    if(userName !== "" && userPassword !== "") {
        fetch("/login", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ userName, userPassword})
        })
            .then((response) => response.json())
            .then((data) => {
                //userId tiene que ser igual a como está puesto en el servidor (línea 55)
                if(data.success) {
                    localStorage.setItem("userId", data.userId);
                    window.location.href = "/html/movies.html";
                } else {
                    alert(data.message);
                }
            })
            .catch((error) => {
                console.error(`Error al enviar los datos al servidor: ${error}`);
            });
    }
});