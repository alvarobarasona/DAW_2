<?php
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

    $errors_array = [];

    function is_valid_data($data) {

        return isset($data) && $data !== "" ? true : false;
    }

    if(isset($_POST["submit-button"]) && $_SERVER["REQUEST_METHOD"] === "POST") {

        if(!is_valid_data($_POST["name"]) && empty($_POST["name"])) {

            $errors_array["empty-name"] = "El campo del nombre no puede estar vacío";
        }

        if(!is_valid_data($_POST["address"]) && empty($_POST["address"])) {

            $errors_array["empty-address"] = "El campo de la dirección no puede estar vacío";
        }

        if(!is_valid_data($_POST["dishes"]) && empty($_POST["dishes"])) {

            $errors_array["empty-dishes"] = "El campo del número de platos no puede estar vacío";
        } else {

            if($_POST["dishes"] < 3) {

                $errors_array["no-dishes"] = "El campo del número de platos debe ser mayor que 2";
            }
        }

        if(empty($errors_array)) {

            $name = urlencode($_POST["name"]);
            $address = urlencode($_POST["address"]);
            $dishes = urlencode($_POST["dishes"]);
            $vegetarian = urlencode($_POST["vegetarian"]);
            $allergies = isset($_POST["allergies"]) ? implode(", ", $_POST["allergies"]) : "";

            var_dump($allergies);

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
        <title>Servicio de comida</title>
    </head>
    <style>
        ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        li {
            margin-left: 15px;
        }
        .error {
            color: red;
        }
    </style>
    <body>
        <h1>Servicio de comida</h1>
        <form action="index.php" method="post">
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="name" id="name-input" value="<?= is_valid_data($_POST["name"]) ? $_POST["name"] : ""; ?>">
                <?php if(isset($errors_array["empty-name"])) { ?>
                    <span class="error"><?php echo $errors_array["empty-name"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="address-input">Dirección:</label>
                <input type="text" name="address" id="address-input" value="<?= is_valid_data($_POST["address"]) ? $_POST["address"] : ""; ?>">
                <?php if(isset($errors_array["empty-address"])) { ?>
                    <span class="error"><?php echo $errors_array["empty-address"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="dishes-input">Número de platos:</label>
                <input type="number" name="dishes" id="dishes-input" value="<?= is_valid_data($_POST["dishes"]) ? $_POST["dishes"] : ""; ?>">
                <?php if(isset($errors_array["empty-dishes"])) { ?>
                    <span class="error"><?php echo $errors_array["empty-dishes"]; ?></span>
                <?php } ?>
                <?php if(isset($errors_array["no-dishes"])) { ?>
                    <span class="error"><?php echo $errors_array["no-dishes"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="vegetarian-select">Vegetariano:</label>
                <select name="vegetarian" id="vegetarian-select">
                    <option value="yes" <?= is_valid_data($_POST["vegetarian"]) && $_POST["vegetarian"] == "yes" ? "selected" : ""; ?>>Sí</option>
                    <option value="no" <?= is_valid_data($_POST["vegetarian"]) && $_POST["vegetarian"] == "no" ? "selected" : ""; ?> >No</option>
                </select>
            </div>
            <ul>
                Alérgias:
                <?php foreach($allergies_array as $allergy) { ?>
                    <li>
                        <label for="<?php echo $allergy ?>-input"><?= $allergy; ?></label>
                        <input type="checkbox" name="allergies[]" id="<?= $allergy; ?>-input" value="<?= $allergy; ?>" <?= is_valid_data($_POST["allergies"]) && in_array($allergy, $_POST["allergies"]) ? "checked" : ""; ?>>
                    </li>
                <?php } ?>
            </ul>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
    </body>
</html>