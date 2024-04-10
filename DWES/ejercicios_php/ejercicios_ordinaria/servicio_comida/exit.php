<?php
    $name = urldecode($_GET["name"]);
    $address = urldecode($_GET["address"]);
    $dishes = urldecode($_GET["dishes"]);
    $vegetarian = urldecode($_GET["vegetarian"]);
    $allergies = urldecode($_GET["allergies"]);
?>

<!DOCTYPE html>
<html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Pedido realizado</title>
        </head>
        <body>
            <h1>¡Éxito al realizar el pedido!</h1>
            <p>¡Hola <?= $name; ?>!<br>Éstas son tus alergias: <?= $allergies; ?><br>Eres vegetariano: <?= $vegetarian; ?><br>Has pedido un total de <?= $dishes ?> platos a la dirección <?= $address; ?></p>
        </body>
</html>