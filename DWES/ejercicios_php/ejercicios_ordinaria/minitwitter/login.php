<?php
    require_once('utils/init.php');

    if(isset($_SESSION['user'])) {
        header('Location: index.php');
        die();
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
        <h1>Iniciar sesión</h1>
        <?php showError('invalid-user', $login_errors); ?>
        <form action="login.php" method="post">
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" value="<?php showValue('username'); ?>">
                <?php showError('empty-name', $login_errors); ?>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" value="<?php showValue('password'); ?>">
                <?php showError('empty-password', $login_errors); ?>
            </div>
            <div>
                <label for="remember">Recordar usuario:</label>
                <input type="checkbox" name="remember" id="remember" <?php showChecked('remember') ?>>
            </div>
            <input type="submit" name="login-button" value="Entrar">
        </form>
    </body>
</html>