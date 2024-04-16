<?php
    define("VALUE_ZERO", 0);
    define("VALUE_ONE", 1);
    define("VALUE_TWO", 2);
    define("VALUE_THREE", 3);
    define("VALUE_TEN", 10);

    spl_autoload_register(function ($class) {

        include "$class.php";
    });

    $warning = new Warning("Warning", "Warning message");
    $error = new Err("Error", "Error message");
    $alarm = new Alarm("Alarm", "Alarm message");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 1 Clases y Objetos</title>
        <style>
            .warning {
                text-decoration: underline yellow solid;
            }
            .error {
                text-decoration: underline red solid;
            }
            body {
                display: flex;
                flex-direction: column;
                gap: 30px;
            }
        </style>
    </head>
    <body>
        <h1>Ejercicio 1 Clases y Objetos</h1>
        <?php for($i = VALUE_ZERO; $i < VALUE_TEN; $i++) : ?>
            <?php $random = rand(VALUE_ONE, VALUE_THREE); ?>
            <?php if($random === VALUE_ONE) { ?>
                <?php $warning->show(); ?>
            <?php } elseif($random === VALUE_TWO) { ?>
                <?php $error->show(); ?>
            <?php } else { ?>
                <?php $alarm->show(); ?>
            <?php } ?>
        <?php endfor; ?>
    </body>
</html>