<?php

    $array_errors = [];

    $allergies_array = [
        "Gluten",
        "Crustáceos",
        "Huevos",
        "Pescado",
        "Cacahuetes",
        "Soja",
        "Lácteos",
        "Frutos con cáscara",
        "Apio",
        "Mostaza",
        "Sésamo",
        "Sulfitos",
        "Altramuces",
        "Moluscos"
    ];

    function is_valid_data($data) {

        return isset($data) && $data !== "" ? true : false;
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit-button"])) {

        if(!is_valid_data($_POST["name"])) {

            $array_errors["emptyname"] = "El campo del nombre no puede estar vacío";
        }

        if(!is_valid_data($_POST["address"])) {

            $array_errors["emptyaddress"] = "El campo de la dirección no puede estar vacío";
        }

        if(!is_valid_data($_POST["dishes"])) {

            $array_errors["emptydishes"] = "El campo del número de platos no puede estar vacío";
        } else {

            if($_POST["dishes"] < 3) {

                $array_errors["fewdishes"] = "El campo del número de platos no puede ser menor que tres";
            }
        }

        if(empty($array_errors)) {

            $name = urlencode($_POST["name"]);
            $address = urlencode($_POST["address"]);
            $dishes = urlencode($_POST["dishes"]);
            $vegetarian = urlencode($_POST["vegetarian"]);
            $allergies = isset($_POST["allergies"]) ? implode(", ", $_POST["allergies"]) : "";

            header("Location: exit.php?name=$name&address=$address&dishes=$dishes&vegetarian=$vegetarian&allergies=$allergies");
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario comida</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Formulario comida</h1>
        <form action="index.php" method="post">
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="name" id="name-input" placeholder="Introduce un nombre..." require value="<?= is_valid_data($_POST["name"]) ? $_POST["name"] : ""; ?>">
                <?php if(isset($array_errors["emptyname"])) { ?>
                    <span class="error"><?= $array_errors["emptyname"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="address-input">Dirección:</label>
                <input type="text" name="address" id="address-input" placeholder="Introduce una dirección..." require value="<?= is_valid_data($_POST["address"]) ? $_POST["address"] : ""; ?>">
                <?php if(isset($array_errors["emptyaddress"])) { ?>
                    <span class="error"><?= $array_errors["emptyaddress"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="dishes-input">Número de platos:</label>
                <input type="number" name="dishes" id="dishes-input" placeholder="Introduce un número de platos..." require value="<?= is_valid_data($_POST["dishes"]) ? $_POST["dishes"] : ""; ?>">
                <?php if(isset($array_errors["emptydishes"])) { ?>
                    <span class="error"><?= $array_errors["emptydishes"]; ?></span>
                <?php } ?>
                <?php if(isset($array_errors["fewdishes"])) { ?>
                    <span class="error"><?= $array_errors["fewdishes"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="select-vegetarian">¿Eres vegetariano/a?</label>
                <select name="vegetarian" id="select-vegetarian">
                    <option value="yes" <?= is_valid_data($_POST["vegetarian"]) && $_POST["vegetarian"] === "yes" ? "selected" : ""; ?>>Sí</option>
                    <option value="no" <?= is_valid_data($_POST["vegetarian"]) && $_POST["vegetarian"] === "no" ? "selected" : ""; ?>>No</option>
                </select>
            </div>
            <div>
                <p>Alérgias:</p>
                <ul>
                    <?php foreach($allergies_array as $allergy) { ?>
                        <li>
                            <label for="allergy-<?= $allergy; ?>"><?= $allergy; ?></label>
                            <input type="checkbox" name="allergies[]" id="allergy-<?= $allergy ?>" value="<?= $allergy; ?>" <?= isset($_POST["allergies"]) && in_array($allergy, $_POST["allergies"]) ? "checked" : ""; ?>>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
    </body>
</html>