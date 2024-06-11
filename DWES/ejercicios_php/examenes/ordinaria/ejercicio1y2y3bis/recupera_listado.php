<?php
    require_once('utils/init.php');

    $query_tokens = 'SELECT token FROM tokens';
    $array_tokens = obtainQuery($query_tokens);
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
    <!-- listado de enlaces para recuperar contraseña con varios tokens -->
    <div id="contenedor">
    <h1>Recuperar contraseña</h1>
    <?php getLinkList($array_tokens, 'recupera.php'); ?>
    </div>  
</body>
</html>