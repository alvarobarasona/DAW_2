<?php
    $register_errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['register-button'])) {
            var_dump($_POST['email']);
            if(!isValidData('username')) {
                $register_errors['empty-name'] = 'El campo del usuario no puede estar vacío';
            }
            if(!isValidData('password')) {
                $register_errors['empty-password'] = 'El campo de la contraseña no puede estar vacío';
            }
            if(!isValidData('email')) {
                $register_errors['empty-email'] = 'El campo del correo no puede estar vacío';
            }
            if(empty($register_errors)) {

                $username = $_POST['username'];

                if(userExists($username)) {
                    $register_errors['user-exists'] = "El usuario $username ya existe";
                } else {
                    $user_password = $_POST['password'];
                    $user_email = $_POST['email'];
                    registerUser($username, $user_password, $user_email);
                    header('Location: ../login.php');
                    die();
                }
            }
        }
    }
?>