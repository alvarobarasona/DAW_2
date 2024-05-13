<?php
    require_once('init.php');

    require_once('functions.php');

    define('INPUT_NOMBRE', 'nombre');
    define('INPUT_PASSWORD', 'password');
    define('INPUT_RECUERDAME', 'recuerdame');

    $errors_array = [];

    //Si se está enviando
    if(isset($_POST['enviado'])) {
        //cargo datos
        //verifico errores

        if(!is_valid_data(INPUT_NOMBRE)) {
            $errors_array['nombre-vacio'] = 'El campo del nombre no puede estar vacío';
        }

        if(!is_valid_data(INPUT_PASSWORD)) {
            $errors_array['contrasena-vacia'] = 'El campo de al contraseña no puede estar vacío';
        }

        if(empty($errors_array)) {
            $name = $_POST[INPUT_NOMBRE];
            $password = $_POST[INPUT_PASSWORD];

            
        }
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
        <h1>Login</h1>
        <form action="">
            <input type="text" name="<?= INPUT_NOMBRE; ?>" id="" value="<?= $usuario; ?>"><br>
            <input type="password" name="<?= INPUT_PASSWORD; ?>" id=""><br>
            <input type="checkbox" name="<?= INPUT_RECUERDAME; ?>" id="">
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>