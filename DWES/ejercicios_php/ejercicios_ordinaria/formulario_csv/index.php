<?php
    $errors_array = [];

    $questions_array = file("questions.csv");

    function is_valid_data($data) {

        return isset($data) && $data != "" ? true : false;
    }

    function get_valid_data($data) {

        return is_valid_data($data) ? $data : "";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-button"])) {

        if(!is_valid_data($_POST["name"])) {

            $errors_array["empty-name"] = "El campo del nombre no puede estar vacío";
        }

        if(empty($errors_array)) {

            $name = urlencode(strtolower($_POST["name"]));

            $options = isset($_POST["options"]) ? implode(";", $_POST["options"]) : "";

            $csv_responses = "$name;$options" . PHP_EOL. PHP_EOL;

            file_put_contents("responses.csv", $csv_responses, FILE_APPEND);
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario con CSV</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Formulario con CSV</h1>
        <form action="index.php" method="post">
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="name" id="name-input" placeholder="Introduce un nombre..." value="<?= get_valid_data($_POST["name"]); ?>">
                <?php if(isset($errors_array["empty-name"])) : ?>
                    <span class="error"><?= $errors_array["empty-name"]; ?></span>
                <?php endif; ?>
            </div>
            <?php foreach($questions_array as $key => $value) : ?>
                <div>
                    <p><?= $value; ?></p>
                    <div>
                        <div>
                            <label for="few-input">Poco:</label>
                            <input type="radio" name="options[<?= $key; ?>]" id="few-input" value="<?= $key; ?>-0" <?= isset($_POST["options"]) && in_array("$key-0", $_POST["options"]) ? "checked" : ""; ?>>
                        </div>
                        <div>
                            <label for="mid-input">Medio:</label>
                            <input type="radio" name="options[<?= $key; ?>]" id="mid-input" value="<?= $key; ?>-1" <?= isset($_POST["options"]) && in_array("$key-1", $_POST["options"]) ? "checked" : ""; ?>>
                        </div>
                        <div>
                            <label for="much-input">Mucho:</label>
                            <input type="radio" name="options[<?= $key; ?>]" id="much-input" value="<?= $key; ?>-2" <?= isset($_POST["options"]) && in_array("$key-2", $_POST["options"]) ? "checked" : ""; ?>>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
    </body>
</html>