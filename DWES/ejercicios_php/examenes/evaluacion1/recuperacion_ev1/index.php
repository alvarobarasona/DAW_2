<?php
    require_once('init.php');

    $data = read('data.csv');
    $titles = $data[0];

    $texts = [];
    array_push($texts, $data[1]);

    var_dump($titles);

    $avistamiento = new Avistamiento;
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
    </head>
    <body>
        
    </body>
</html>