<?php
    require_once('init.php');

    $coche = new Coche('Ferrari', 'Portofino', 'XDD 1312', 'Gasolina', 400.50, 250000, 4, 3);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Vehículos</title>
    </head>
    <body>
        <?php $coche->printHTML(); ?>
    </body>
</html>