<?php
    require_once('utils/init.php');

    redirectToIndex('user', 'index.php');

    $login_errors = [];

    $checkbox = [
        ['remember-me' => 'Recordar contraseña']
    ];

    if(isPostMethod() && buttonExists('login-button')) {
        catchEmptyError($login_errors, 'empty-name', 'username');
        catchEmptyError($login_errors, 'empty-password', 'password');

        $user_query = 'SELECT * FROM users WHERE username = :username';

        $insert_token_query = 'INSERT INTO tokens (token, user_id, fecha) VALUES (:token, :user_id, :time_to_expire)';

        $token_expiration = 60 * 60 * 24 * 7;

        userLoginWhitRemember($login_errors, 'invalid-data', $user_query, 'username', 'password', 'user_password', 'index.php', 'user', $insert_token_query, 'remember-me', 64, $token_expiration, 'id', 'remember_cookie');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minitwitter - Login</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <?php showError($login_errors, 'invalid-data'); ?>
        <h1>Iniciar sesión</h1>
        <?php showError('invalid-user', $login_errors); ?>
        <form action="" method="post">
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" value="<?php showValue('username'); ?>">
                <?php showError($login_errors, 'empty-name'); ?>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" value="<?php showValue('password'); ?>">
                <?php showError($login_errors, 'empty-password'); ?>
            </div>
            <?php generateCheckboxOptions($checkbox, 'remember-me', 'remember-me'); ?>
            <button type="submit" name="login-button" formaction="login.php">Entrar</button>
            <button type="submit" name="register-button" formaction="register.php">Registrarse</button>
            <button type="submit" name="recover-redirect">Olvidé mi contraseña</button>
        </form>
    </body>
</html>