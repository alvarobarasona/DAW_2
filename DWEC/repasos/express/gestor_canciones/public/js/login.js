document.addEventListener("DOMContentLoaded", () => {
    const loginButton = document.getElementById("login-button");
    loginButton.addEventListener("click", () => {
        const userName = document.getElementById("username-input").value;
        const userPassword = document.getElementById("password-input").value;
        if(userName !== "" && userPassword !== "") {
            fetch("/add")
        }
    });
});