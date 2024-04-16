<?php
    function print_number($number, $limit) {

        if($number > $limit) {

            echo "<p>$number</p>";

            if($number === $limit) {

                return;
            } else {

                print_number(($number - 1), $limit);
            }
        } else {

            return;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Función recursiva</title>
    </head>
    <body>
        <h1>Función recursiva</h1>
        <?= print_number(5, 1); ?>
    </body>
</html>