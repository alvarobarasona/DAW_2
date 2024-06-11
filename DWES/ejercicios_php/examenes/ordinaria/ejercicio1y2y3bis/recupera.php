<?php
    require_once('utils/init.php');

    $token = getUrlParams('token')['token'];
    
    $query_datos_token = 'SELECT usuario_id, consumido, id FROM tokens WHERE token = :token';
    $datos_token = obtainQuery($query_datos_token, $token);
    var_dump($datos_token);

    if($datos_token['consumido'] == 1 || empty($token)) {
        redirect('recupera_listado.php');
    }

    $recupera_errors = [];

    if(isPostMethod() && buttonExists('cambiar-contrasena')) {
        catchEmptyError($recupera_errors, 'contrasena-vacia', 'recupera-password');

        if(empty($recupera_errors)) {
            $query_consumir_token = 'UPDATE tokens SET consumido = 1 WHERE id = :id';
            $db->ejecuta($query_consumir_token, $datos_token['id']);

            $contrasena_haseada = password_hash($_POST['recupera-password'], PASSWORD_DEFAULT);

            $query_actualizar_contrasena = 'UPDATE usuarios SET pass = :pass WHERE id = :usuario_id';
            $db->ejecuta($query_actualizar_contrasena, $contrasena_haseada, $datos_token['usuario_id']);

            redirect('login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <!-- formulario para recuperar contraseña -->
    <form action="" method="post">
        <label for="recupera-password">Nueva Contraseña</label>
        <input type="password" name="recupera-password" id="recupera-password" value="<?php showValue('recupera-password'); ?>">
        <?php showError($recupera_errors, 'contrasena-vacia'); ?>

        <button type="submit" name="cambiar-contrasena">Enviar</button>
    </form>

</body>
</html>