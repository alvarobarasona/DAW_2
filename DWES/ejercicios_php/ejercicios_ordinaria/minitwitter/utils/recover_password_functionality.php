<?php
    $recover_password_errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['recover_password'])) {
            if(!isValidData('email')) {
                $recover_password_errors['empty-email'] = 'El campo del correo no puede estar vacío';
            }
            if(empty($recover_password_errors)) {
                $email = $_POST['email'];

                emailExists($email);
            }
        }
        if(isset($_POST['cancel-recover'])) {
            header('Location: ../login.php');
            die();
        }
    }
?>