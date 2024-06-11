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
    <style>
            .error {
                color: red;
            }
        </style>
</head>
    <body>
        <h1>Registrar usuario</h1>
        <?php showError('user-exists', $register_errors); ?>
        <form action="" method="post">
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" value="<?php showValue('username'); ?>">
                <?php showError('empty-name', $register_errors); ?>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" value="<?php showValue('password'); ?>">
                <?php showError('empty-password', $register_errors); ?>
            </div>
            <div>
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" value="<?php showValue('email'); ?>">
                <?php showError('empty-email', $register_errors); ?>
            </div>
            <button type="submit" name="register-button">Enviar</button>
        </form>
    </body>
</html>