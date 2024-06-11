<?php
    require_once('utils/init.php');
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minitwitter - Recuperar contraseña</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Recuperar contraseña</h1>
        <form action="" method="post">
            <label for="email">Correo:</label>
            <input type="email" name="email" id="email" value="<?php showValue('email'); ?>">
            <button type="submit" name="recover_password">Enviar</button>
            <button type="submit" name="cancel-recover">Volver</button>
            <?php showError('empty-email', $recover_password_errors); ?>
        </form>
    </body>
</html>