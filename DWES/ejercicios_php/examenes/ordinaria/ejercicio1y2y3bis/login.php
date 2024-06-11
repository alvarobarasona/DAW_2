<?php
    require_once('utils/init.php');

    $login_errors = [];

    if(isPostMethod() && buttonExists('boton-login')) {
        catchEmptyError($login_errors, 'usuario-vacio', 'usuario');
        catchEmptyError($login_errors, 'password-vacia', 'password');

        $query_usuario = 'SELECT * FROM usuarios WHERE nombre = :nombre';

        userLogin($login_errors, 'datos-incorrectos', $query_usuario, 'usuario', 'password', 'pass', 'pedidos.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <!--formulario de login -->
        <?php showError($login_errors, 'datos-incorrectos'); ?>
        <form action="" method="post">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" value="<?php showValue('usuario'); ?>">
            <?php showError($login_errors, 'usuario-vacio'); ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" id="password" value="<?php showValue('password'); ?>">
            <?php showError($login_errors, 'password-vacia'); ?>

            <button type="submit" name="boton-login">Enviar</button>
        </form>
    </body>
</html>