<?php
    require_once 'init.php';

    $query = 'SELECT * FROM auth_tokens';

    $db->ejecuta($query);

    $tokens = $db->obtenDatos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>
            Listado de enlaces de autentificación
        </h1>
        <ul>
            <?php foreach($tokens as $key => $value) : ?>
                <a href="auth.php?token=<?= $value['token'] ?>">enlace <?= $key + 1; ?></a><br>
            <?php endforeach; ?>
        </ul>
    </body>
</html>