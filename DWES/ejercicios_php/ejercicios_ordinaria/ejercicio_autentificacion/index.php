<?php
    require_once('init.php');

    if(!isset($_SESSION['session'])) {
        header('Location: login.php');
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
        <h1>HAS ACCEDIDO A TU PERFIL</h1>
    </body>
</html>