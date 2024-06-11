<?php
    require_once('init.php');

    $csv = file('data.csv');

    $array_avistamientos = [];

    for($i = 0; $i < count($csv); $i++) {
        if($i !== 0) {
            $avistamiento = new Avistamiento();
            $avistamiento->cargarInfo($csv[$i]);
            array_push($array_avistamientos, $avistamiento);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2</title>
    </head>
    <body>
        <?php foreach($array_avistamientos as $avistamiento) : ?>
            <?php $avistamiento->pintarHTML(); ?>
        <?php endforeach; ?>
    </body>
</html>