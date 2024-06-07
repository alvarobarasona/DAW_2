<?php
    require_once 'init.php';
    var_dump($_SESSION['user']['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Bienvenido</h1>
        <h2>Hola <?= $_SESSION['user']['email']; ?></h2>
    </body>
</html>