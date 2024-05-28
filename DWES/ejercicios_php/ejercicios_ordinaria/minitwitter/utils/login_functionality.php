<?php
    define('TOKEN_LENGTH', 64);
    define('DAYS_TO_EXPIRE', 7);
    define('HOURS_TO_EXPIRE', 24);
    define('MINUTES_TO_EXPIRE', 60);
    define('SECONDS_TO_EXPIRE', 60);
    define('TOKEN_EXPIRATION_SECONDS', SECONDS_TO_EXPIRE * MINUTES_TO_EXPIRE * HOURS_TO_EXPIRE * DAYS_TO_EXPIRE);
    define('REMEMBER_COOKIE_NAME', 'remember_cookie');

    $login_errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login-button'])) {
        if(!isValidData('username')) {
            $login_errors['empty-name'] = 'El campo del usuario no puede estar vacío';
        }
        if(!isValidData('password')) {
            $login_errors['empty-password'] = 'El campo de la contraseña no puede estar vacío';
        }

        if(empty($login_errors)) {
            $user = $_POST['username'];
            $password = $_POST['password'];

            if(userExists($user, $password)) {

                $user_data = getUserData($user);
             
                $_SESSION['user'] = $user_data;

                if(isset($_POST['remember'])) {
                    $remember_token = getNewToken(TOKEN_LENGTH);
                    $time_to_expire = time() + TOKEN_EXPIRATION_SECONDS;
                    saveToken($remember_token, $user_data['id'], date('Y-m-d H:i:s', $time_to_expire));
                    setcookie(REMEMBER_COOKIE_NAME, $remember_token, $time_to_expire, '/');
                }

                header('Location: ../index.php');
                die();
            } else {
                $login_errors['invalid-user'] = 'El usuario o la contraseña son incorrectos';
            }
        }
    }
?>