<?php
    require_once('utils/init.php');

    if(isset($_SESSION['user'])) {
        header('Location: index.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Registrar usuario</h1>
        <?php showError('invalid-user', $register_errors); ?>
        <form action="utils/register_functionality.php" method="post">
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
            <button type="submit" name="register-button">Enviar</button>
        </form>
    </body>
</html>