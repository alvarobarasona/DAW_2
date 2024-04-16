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
        <h1>Pedido realizado</h1>
        <p>
            ¡Hola <?= $name; ?>!<br>
            <?= $allergies !== "" ? "Éstas son tus alergias: $allergies" : "No tienes alergias"; ?><br>
            Vegetariano: <?= $vegetarian ?><br>
            Tu pedido de <?= $dishes ?> platos ha sido enviado correctamente a la dirección <?= $address ?>.
        </p>
    </body>
</html>