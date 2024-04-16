<?php
    $id = urldecode($_GET["id"]);
    $name = urldecode($_GET["name"]);
    $level = urldecode($_GET["level"]);
    $type1 = urldecode($_GET["type1"]);
    $type2 = urldecode($_GET["type2"]);
    $pokerus = urldecode($_GET["pokerus"]);
    $flavors = urldecode($_GET["flavors"]);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro Pokémon</title>
    </head>
    <body>
        <h1>Pokémon registrado</h1>
        <p>
            El pokémon <?= $name; ?> con ID <?= $id; ?> ha sido registrado correctamente.
            <br>
            <br>
            Está al nivel <?= $level; ?>.
            <br>
            <br>
            <?= $type2 === "null" ? "Es de tipo $type1." : "Es de tipo $type1/$type2."; ?>
            <br>
            <br>
            <?= $pokerus === "on" ? "Ha pasado el pokérus." : "No ha pasado el pokérus."; ?>
            <br>
            <br>
            <?= $flavors !== "" ? "Sabores favoritos: $flavors." : "El pokémon no tiene sabores favoritos."; ?>
        </p>
    </body>
</html>