<?php
    $register_errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if($_POST['register-button']) {
            if(!isValidData('username')) {
                $register_errors['empty-name'] = 'El campo del usuario no puede estar vacío';
            }
            if(!isValidData('password')) {
                $register_errors['empty-password'] = 'El campo de la contraseña no puede estar vacío';
            }
            if(empty($register_errors)) {
                $username = $_POST['username'];
            }
        }
    }
?>