<?php

    require_once('init.php');

    require_once('functions.php');

    define('INPUT_NOMBRE', 'nombre');
    define('INPUT_PASSWORD', 'password');
    define('INPUT_RECUERDAME', 'recuerdame');
    define('SEGUNDOS_HORA', 3600);
    define('HORAS_DIA', 24);
    define('NUMERO_DIAS', 7);
    define('TIEMPO_EXPIRACION', SEGUNDOS_HORA * HORAS_DIA * NUMERO_DIAS);

    define('NAME_ERROR', 'empty-name');
    define('PASSWORD_ERROR', 'empty-password');
    define('CREDENTIALS_ERROR', 'incorrect-credentials');

    $errors_array = [];
/*
    if(isset($_SESSION['session'])) {
        header('Location: index.php');
        die();
    }
    */

    //Si se está enviando
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enviar'])) {
        //cargo datos
        //verifico errores

        if(!isValidData(INPUT_NOMBRE)) {
            $errors_array[NAME_ERROR] = 'El campo del nombre no puede estar vacío';
        }

        if(!isValidData(INPUT_PASSWORD)) {
            $errors_array[PASSWORD_ERROR] = 'El campo de al contraseña no puede estar vacío';
        }

        if(empty($errors_array)) {
            $name = $_POST[INPUT_NOMBRE];
            $password = $_POST[INPUT_PASSWORD];

            $select = "SELECT * FROM usuarios WHERE nombre = :nombre";

            $user = $db->ejecuta($select, $name);

            $user = $db->obtenDatos();

            //print_r($user);

            if(password_verify($password, $user[0]['pass'])) {

                $_SESSION["session"] = $name;

                if(isset($_POST[INPUT_RECUERDAME])) {

                    $token = bin2hex(openssl_random_pseudo_bytes(128));

                    $expiration = time() + TIEMPO_EXPIRACION;

                    var_dump(date('Y-m-d H:i:s', $expiration));

                    saveToken($token, date('Y-m-d H:i:s', $expiration), $user[0]['id'], false);
                }

                //header('Location: index.php');
                //die();
            } else {

                $errors_array[CREDENTIALS_ERROR] = 'Datos de identificación incorrectos';
            }
        }
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
        <h1>Login</h1>
        <form action="login.php" method="post">
            <?php showError(CREDENTIALS_ERROR); ?>
            <div>
                <input type="text" name="<?= INPUT_NOMBRE; ?>" id="" value="<?php showValue(INPUT_NOMBRE); ?>" placeholder="Introduce un usuario...">
                <?php showError(NAME_ERROR); ?>
            </div>
            <div>
                <input type="password" name="<?= INPUT_PASSWORD; ?>" id="" value="<?php showValue(INPUT_PASSWORD); ?>" placeholder="Introduce una contraseña...">
                <?php showError(PASSWORD_ERROR); ?>
            </div>
            <div>
                <label for="check">Recuérdame:</label>
                <input type="checkbox" name="<?= INPUT_RECUERDAME; ?>"  id="check" <?= isset($_POST[INPUT_RECUERDAME]) ? "checked" : ""; ?>>
            </div>
            
            <button type="submit" name="enviar">Enviar</button>
        </form>
    </body>
</html>