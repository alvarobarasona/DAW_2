<?php

    function generate_allergies_options() {

        $allergies_array = [
            'Cereales con gluten',
            'Crustáceos y productos a base de crustáceos',
            'Huevos y productos derivados',
            'Pescado y productos a base de pescados',
            'Cacahuetes, productos a base de cacahuetes y frutos secos',
            'Soja y productos a base de soja',
            'Leche y sus derivados (incluida la lactosa)',
            'Frutos de cáscara y productos derivados',
            'Apio y productos derivados',
            'Mostaza y productos a base de mostaza',
            'Granos o semillas de sésamo y productos a base de sésamo',
            'Dióxido de azufre y sulfitos',
            'Altramuces y productos a base de altramuces',
            'Moluscos y crustáceos y productos a base de estos'
        ];

        $acc = 1;

        foreach($allergies_array as $allergy) {

            echo
            "<div>
                <label for='option$acc-checkbox'>$allergy: </label>
                <input type='checkbox' name='option$acc' id='option$acc-checkbox'>
            </div>";

            $acc++;
        };
    }

    function is_valid_data($data) {

        return isset($data) && $data !== "" ? true : false;
    }

    $errors_array = [];

    $name = "";
    $adress = "";
    $dishes = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_URI"] == "/recuperacion_ordinaria/servicio_comida/index.php") {

        if(is_valid_data($_POST["name"])) {

            $name = $_POST["name"];
            var_dump($name);
        } else {

            $errors_array["empty-name"] = "El campo del nombre no puede estar vacío";
        }
        
        if(is_valid_data($_POST["adress"])) {

            $adress = $_POST["adress"];
            var_dump($adress);
        } else {

            $errors_array["empty-adress"] = "El campo de la dirección no puede estar vacío";
        }

        if(is_valid_data($_POST["dishes"])) {

            $dishes = $_POST["dishes"];

            if($_POST["dishes"] > 0) {

                var_dump($dishes);
            } else {

                $errors_array["no-dishes"] = "El número de platos debe ser mayor que 0";
            }
        } else {

            $errors_array["empty-dishes"] = "El campo del número de platos no puede estar vacío";
        }

        $vegan = "no";

        if(is_valid_data($_POST["vegan"])) {

            $vegan = $_POST["vegan"];
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
    <body>
        <h1>Servicio de comida</h1>
        <form action="index.php" method="post">
            <div>
                <label for="name-input">Nombre: </label>
                <input type="text" name="name" id="name-input" value="<?php echo $name; ?>">

                <?php if(isset($errors_array["empty-name"])) { ?>
                    <span><?php echo $errors_array["empty-name"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="adress-input">Dirección: </label>
                <input type="text" name="adress" id="adress-input" value="<?php echo $adress; ?>">

                <?php if(isset($errors_array["empty-adress"])) { ?>
                    <span><?php echo $errors_array["empty-adress"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label for="dishes-input">Número de platos: </label>
                <input type="number" name="dishes" id="dishes-input" value="<?php echo $dishes; ?>">

                <?php if(isset($errors_array["empty-dishes"])) { ?>
                    <span><?php echo $errors_array["empty-dishes"]; ?></span>
                <?php } ?>

                <?php if(isset($errors_array["no-dishes"])) { ?>
                    <span><?php echo $errors_array["no-dishes"]; ?></span>
                <?php } ?>
            </div>
            <div>
                <label>Vegano: </label>
                <select name="vegan" value="<?php echo $vegan; ?>">
                    <option value="yes">Sí</option>
                    <option value="no">No</option>
                </select>
            </div>
            <div>
                <label>Alergias:</label>
                <div>
                    <?php generate_allergies_options(); ?>
                </div>
            </div>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
    </body>
</html>