<?php
    define("WORKER_INP_NAME", "name");
    define("WORKER_INP_ERROR", "empty-name");
    define("WORKER_INP_DEPART", "depart");
    define("DEPART_INP_ERROR", "empty-depart");
    define("WORKER_INP_NICK", "nick");
    define("NICK_INP_ERROR", "empty-nick");
    define("CSV_PATH", "files/data.csv");
    define("JSON_PATH", "files/data.json");

    /*
        Implementar un formulario HTML para la captura de datos de empleados. Los campos del formulario deben incluir nombre, departamento y mote. Debajo aparecerá un listado. Toda la información se almacena en:

        1. versión con CSV
        2. versión con json
    */

    $errors_array = [];

    function is_valid_data($data) {

        return isset($_POST[$data]) && $_POST[$data] !== "" ? true : false;
    }

    function get_value($data) {

        echo is_valid_data($data) ? $_POST[$data] : "";
    }

    function show_error($error) {

        global $errors_array;

        if(isset($errors_array[$error])) {

            echo "<span class='error'>{$errors_array[$error]}</span>";
        }
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit-button"])) {

        if(!is_valid_data(WORKER_INP_NAME)) {

            $errors_array[WORKER_INP_ERROR] = "El campo del nombre del empleado no puede estar vacío";
        }

        if(!is_valid_data(WORKER_INP_DEPART)) {

            $errors_array[DEPART_INP_ERROR] = "El campo del departamento del empleado no puede estar vacío";
        }

        if(!is_valid_data(WORKER_INP_NICK)) {

            $errors_array[NICK_INP_ERROR] = "El campo del mote del empleado no puede estar vacío";
        }

        if(empty($errors_array)) {

            $data_row = "{$_POST[WORKER_INP_NAME]};{$_POST[WORKER_INP_DEPART]};{$_POST[WORKER_INP_NICK]}";

            file_put_contents(CSV_PATH, $data_row . PHP_EOL, FILE_APPEND);
            file_put_contents(JSON_PATH, json_encode($data_row) . "\n", FILE_APPEND);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio formulario empleados</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Formulario empleados</h1>
        <form action="index.php" method="post">
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="<?= WORKER_INP_NAME; ?>" id="name-input" value="<?= get_value(WORKER_INP_NAME); ?>">
                <?php show_error(WORKER_INP_ERROR); ?>
            </div>
            <div>
                <label for="depart-input">Departamento:</label>
                <input type="text" name="<?= WORKER_INP_DEPART; ?>" id="depart-input" value="<?= get_value(WORKER_INP_DEPART); ?>">
                <?php show_error(DEPART_INP_ERROR); ?>
            </div>
            <div>
                <label for="nick-input">Mote:</label>
                <input type="text" name="<?= WORKER_INP_NICK; ?>" id="nick-input" value="<?= get_value(WORKER_INP_NICK); ?>">
                <?php show_error(NICK_INP_ERROR); ?>
            </div>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
    </body>
</html>