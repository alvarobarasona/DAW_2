<?php
    require_once 'init.php';

    $errores_auth = [];

    $token = urldecode($_GET['token']);

    $query_consumido = 'SELECT consumido FROM auth_tokens WHERE token = :token';
    $db->ejecuta($query_consumido, $token);
    $token_consumido = $db->obtenDatos()['consumido'];

    if($token_consumido === 0) {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registrar'])) {
            if(!isValidData('email')) {
                $errores_auth['email-vacio'] = 'El campo del email no debe estar vacío';
            }
            if(empty($errores_auth)) {
                $query_insertar_usuario = 'INSERT INTO usuarios (email) VALUES (:email)';
                $db->ejecuta($query_insertar_usuario, $_POST['email']);
                $query_usuario = 'SELECT * FROM usuarios WHERE email = :email';
                $db->ejecuta($query_usuario, $_POST['email']);
                $datos_usuario = $db->obtenDatos();
                $_SESSION['user'] = $datos_usuario;
                $query_insertar_tokens = 'INSERT INTO auth_tokens (token, id_user_generador) VALUES (:token, :id_user_generador)';
                for($i = 0; $i < 5; $i++) {
                    $db->ejecuta($query_insertar_tokens, getNewToken(10), $datos_usuario['id']);
                }
                $query_consumir_token = 'UPDATE auth_tokens SET consumido = 1 WHERE token = :token';
                $db->ejecuta($query_consumir_token, $token);
                header('Location: privada.php');
                die();
            }
        }
    } else {
        $query_sesion_usuario = 'SELECT * FROM usuarios WHERE id = (SELECT id_user_generador FROM auth_tokens WHERE token = :token)';
        $db->ejecuta($query_sesion_usuario, $token);
        $datos_usuario = $db->obtenDatos();
        $_SESSION['user'] = $datos_usuario;
        var_dump($_SESSION['user']);
        header('Location: privada.php');
        die();
    }

    function isValidData($data) {
        return isset($_POST[$data]) && $_POST[$data] !== "" ? true : false;
    }

    function showError($error, $errors_array) {
        $errors_array;
        if(isset($errors_array[$error])) {
            echo "<span class='error'>{$errors_array[$error]}</span>";
        }
    }

    function showValue($name) {
        echo isset($_POST[$name]) ? $_POST[$name] : "";
    }

    function getNewToken($token_length) {
        return bin2hex(openssl_random_pseudo_bytes($token_length));
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
        <h1>Verifica token y registra al usuario</h1>
        <form action="" method="post">
            <input type="email" name="email" value="<?php showValue('email'); ?>">
            <input type="hidden" name="token">
            <button type="submit" name="registrar">Registrar</button>
            <?php showError('email-vacio', $errores_auth); ?>
        </form>
    </body>
</html>