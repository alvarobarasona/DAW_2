<?php
    define("MIN_DATE", "1920-01-01");
    define("PATH", "img/");
    $current_date = date("Y-m-d");

    require("db.php");

    $errors_array = [];

    $types_array = [
        "agua",
        "fuego",
        "planta",
        "volador",
        "siniestro",
        "fantasma",
        "acero",
        "lucha",
        "hada",
        "tierra",
        "roca",
        "eléctrico",
        "psíquico",
        "normal",
        "hielo",
        "dragón",
        "veneno"
    ];

    function is_valid_data($data) {

        return isset($data) && $data !== "" ? true : false;
    }

    function get_valid_data($data) {

        if(is_valid_data($data)) {

            return $data;
        }
    }

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["add-button"])) {

        if(!is_valid_data($_POST["name"])) {

            $errors_array["empty-name"] = "El campo del nombre no puede estar vacío";
        }

        if(!is_valid_data($_POST["description"])) {

            $errors_array["empty-description"] = "El campo de la descripción no puede estar vacío";
        }

        if(!is_valid_data($_POST["level"])) {

            $errors_array["empty-level"] = "El campo del nivel no puede estar vacío";
        } else {

            if($_POST["level"] < 1) {

                $errors_array["low-invalid-level"] = "El nivel no puede ser menor que 1";
            }

            if($_POST["level"] > 100) {

                $errors_array["high-invalid-level"] = "El nivel no puede ser mayor que 100";
            }
        }

        if(!is_valid_data($_POST["catch-date"])) {

            $errors_array["empty-date"] = "El campo de la fecha no puede estar vacío";
        } else {

            if($_POST["catch-date"] < MIN_DATE) {

                $errors_array["low-date"] = "La fecha no puede ser menor al " . MIN_DATE;
            }

            if($_POST["catch-date"] > $current_date) {

                $errors_array["high-date"] = "La fecha no puede ser mayor al " . $current_date;
            }
        }

        if(!is_valid_data($_POST["catch-place"])) {

            $errors_array["empty-place"] = "El campo del lugar no puede estar vacío";
        }

        var_dump($_FILES["image"]["error"]);

        if(!isset($_FILES["image"]["error"]) || $_FILES["image"]["error"] != 0) {

            $errors_array["empty-file"] = "El campo de la imagen no puede estar vacío";
        } else {

            $file_name = basename($_FILES["image"]["name"]);

            $final_file = PATH . $file_name;

            $acc = 1;

            while(file_exists($final_file)) {

                $extensionless_name = pathinfo($file_name, PATHINFO_FILENAME);

                $file_format = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

                $final_file = PATH . "$extensionless_name($acc).$file_format";

                $acc++;
            }

            $file_dimensions = getimagesize($_FILES["image"]["tmp_name"]);

            if($file_dimensions !== false) {

                move_uploaded_file($_FILES["image"]["tmp_name"], $final_file);
            } else {

                $errors_array["not-file"] = "El archivo proporcionado no es una imagen";
            }
        }

        if(empty($errors_array)) {

            $name = $_POST["name"];
            var_dump($name);
            $description = $_POST["description"];
            var_dump($description);
            $level = $_POST["level"];
            var_dump($level);
            $type1 = $_POST["type1"];
            var_dump($type1);
            $type2 = $_POST["type2"];
            var_dump($type2);
            $catch_date = $_POST["catch-date"];
            var_dump($catch_date);
            $catch_place = $_POST["catch-place"];
            var_dump($catch_place);
            $image_file = $final_file;
            var_dump($image_file);

            $insert = $db->prepare("INSERT INTO pokemon (pokemon_name, pokemon_description, pokemon_level, pokemon_type_1, pokemon_type_2, pokemon_catch_date, pokemon_catch_place, pokemon_img) VALUES (:pokemon_name, :pokemon_description, :pokemon_level, :pokemon_type_1, :pokemon_type_2, :pokemon_catch_date, :pokemon_catch_place, :pokemon_img)");

            $insert->bindValue(":pokemon_name", $name);
            $insert->bindValue(":pokemon_description", $description);
            $insert->bindValue(":pokemon_level", $level);
            $insert->bindValue(":pokemon_type_1", $type1);
            $insert->bindValue(":pokemon_type_2", $type2);
            $insert->bindValue(":pokemon_catch_date", $catch_date);
            $insert->bindValue(":pokemon_catch_place", $catch_place);
            $insert->bindValue(":pokemon_img", $image_file);

            try {

                $insert->execute();
            } catch(PDOException $e) {

                echo "Error al insertar los datos: {$e->getMessage()}";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario práctica Pokémon</title>
        <style>
            .error {
                color: red;
            }
            form {
                display: flex;
                flex-direction: column;
                align-items: start;
                gap: 10px;
            }
            ul {
                list-style: none;
                margin: 0;
                padding-left: 20px;
            }
            p {
                margin: 0;
            }
        </style>
    </head>
    <body>
        <h1>Registro Pokédex</h1>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="name" id="name-input" value="<?= isset($_POST["name"]) ? $_POST["name"] : ""; ?>" placeholder="Introduce un nombre...">
                <?php if(isset($errors_array["empty-name"])) : ?>
                    <span class="error"><?= $errors_array["empty-name"]; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="description-textarea">Descripción:</label>
                <textarea name="description" id="description-textarea" cols="30" rows="10" placeholder="Introduce una descripción..." value="<?= is_valid_data($_POST["description"]) ? $_POST["description"] : ""; ?>"></textarea>
                <?php if(isset($errors_array["empty-description"])) : ?>
                    <span class="error"><?= $errors_array["empty-description"] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="level-input">Nivel:</label>
                <input type="number" name="level" id="level-input" value="<?= isset($_POST["level"]) ? $_POST["level"] : ""; ?>" placeholder="Introduce un nivel...">
                <?php if(isset($errors_array["empty-level"])) : ?>
                    <span class="error"><?= $errors_array["empty-level"]; ?></span>
                <?php endif; ?>
                <?php if(isset($errors_array["low-invalid-level"])) : ?>
                    <span class="error"><?= $errors_array["low-invalid-level"] ?></span>
                <?php endif; ?>
                <?php if(isset($errors_array["high-invalid-level"])) : ?>
                    <span class="error"><?= $errors_array["high-invalid-level"] ?></span>
                <?php endif; ?>
            </div>
            <?php for($i = 0; $i < 2; $i++) : ?>
                <?php if($i == 0) { ?>
                    <?php
                        $for = "type1-select";
                        $name = "type1";
                        $id = "type1-select";
                        $inner = "Tipo 1";
                    ?>
                <?php } else { ?>
                    <?php
                        $for = "type2-select";
                        $name = "type2";
                        $id = "type2-select";
                        $inner = "Tipo 2";
                    ?>
                <?php } ?>
                <div>
                    <label for="<?= $for; ?>"><?= $inner; ?>:</label>
                    <select name="<?= $name; ?>" id="<?= $id; ?>">
                        <?php foreach($types_array as $type) : ?>
                            <option value="<?= $type; ?>" <?= isset($_POST[$name]) && $_POST[$name] === $type ? "selected" : ""; ?>><?= $type; ?></option>
                        <?php endforeach; ?>
                        <?php if($i !== 0) : ?>
                            <option value="null">NULL</option>
                        <?php endif; ?>
                    </select>
                </div>
            <?php endfor; ?>
            <div>
                <label for="catch-date-input">Fecha de captura:</label>
                <input type="date" name="catch-date" id="catch-date-input" value="<?= is_valid_data($_POST["catch-date"]) ? $_POST["catch-date"] : ""; ?>">
                <?php if(isset($errors_array["empty-date"])) : ?>
                    <span class="error"><?= $errors_array["empty-date"] ?></span>
                <?php elseif(isset($errors_array["low-date"])) : ?>
                    <span class="error"><?= $errors_array["low-date"] ?></span>
                <?php elseif(isset($errors_array["high-date"])) : ?>
                    <span class="error"><?= $errors_array["high-date"] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="catch-place-input">Lugar de captura:</label>
                <input type="text" name="catch-place" id="catch-place-input" placeholder="Introduce un lugar..." value="<?= is_valid_data($_POST["catch-place"]) ? $_POST["catch-place"] : ""; ?>">
                <?php if(isset($errors_array["empty-place"])) : ?>
                    <span class="error"><?= $errors_array["empty-place"] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="image-input">Imagen:</label>
                <input type="file" name="image" id="image-input">
                <?php if(isset($errors_array["empty-file"])) : ?>
                    <span class="error"><?= $errors_array["empty-file"] ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" name="add-button">Añadir</button>
        </form>
        <?php include_once("exit.php"); ?>
    </body>
</html>