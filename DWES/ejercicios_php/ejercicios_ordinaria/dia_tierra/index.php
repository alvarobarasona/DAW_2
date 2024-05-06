<?php
    define("MIN_DATE", "1920-01-01");
    define("IMAGE_ERROR", 0);
    define("PATH", "subidas/");
    require("db.php");
    $current_date = date("Y-m-d");

    $errors_array = [];

    function is_valid_data($data) {

        return isset($data) && $data != "" ? true : false;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-button"])) {

        var_dump($_FILES["image"]["name"]);
        
        if(!is_valid_data($_POST["date"])) {

            $errors_array["empty-date"] = "El campo de la fecha no puede estar vacío";
        } else {

            if($_POST["date"] < MIN_DATE) {

                $errors_array["low-date"] = "La fecha no puede ser menor al " . MIN_DATE;
            }

            if($_POST["date"] > $current_date) {

                $errors_array["high-date"] = "La fecha no puede ser mayor al " . $current_date;
            }
        }

        if(!is_valid_data($_POST["place"])) {

            $errors_array["empty-place"] = "El campo del lugar no puede estar vacío";
        }

        if(!is_valid_data($_POST["name"])) {

            $errors_array["empty-name"] = "El campo del nombre no puede estar vacío";
        }

        if(!is_valid_data($_POST["description"])) {

            $errors_array["empty-description"] = "El campo de la descripción no puede estar vacío";
        }

        if(!isset($_FILES["image"]["error"]) || $_FILES["image"]["error"] != IMAGE_ERROR) {

            $errors_array["image-error"] = "Error en la imagen";
        } else {

            $file_name = basename($_FILES["image"]["name"]);

            $file_path = PATH . $file_name;

            $acc = 1;

            while(file_exists($file_path)) {

                $ext_less_name = pathinfo($file_name, PATHINFO_FILENAME);
                $file_format = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
                $file_path = PATH . "$ext_less_name-$acc.$file_format";
                $acc++;
            }

            $check_file = getimagesize($_FILES["image"]["tmp_name"]);

            if($check_file !== false) {

                move_uploaded_file($_FILES["image"]["tmp_name"], $file_path);
            } else {

                $errors_array["file-error"] = "Archivo $file_name invádido";
            }

            if(empty($errors_array)) {

                $date = $_POST["date"];
                $place = $_POST["place"];
                $name = $_POST["name"];
                $description = $_POST["description"];
                $image = $file_path;

                $insert = $db->prepare("INSERT INTO acciones (fecha, lugar, nombre, descripcion, foto) VALUES (:fecha, :lugar, :nombre, :descripcion, :foto)");

                $insert->bindValue(":nombre", $name);
                $insert->bindValue(":fecha", $date);
                $insert->bindValue(":lugar", $place);
                $insert->bindValue(":descripcion", $description);
                $insert->bindValue(":foto", $image);

                try {

                    $insert->execute();
                } catch(PDOException $pdoe) {

                    echo "Error al insertar el dato: {$pdoe->getMessage()}";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Formulario de inscripción</h1>
        <form action="index.php" method="post">
            <div>
                <label for="date-input">Fecha:</label>
                <input type="date" name="date" id="date-input" value="<?= is_valid_data($_POST["date"]) ? $_POST["date"] : ""; ?>">
                <?php if(isset($errors_array["empty-date"])) : ?>
                    <span class="error"><?= $errors_array["empty-date"] ?></span>
                <?php elseif(isset($errors_array["low-date"])) : ?>
                    <span class="error"><?= $errors_array["low-date"] ?></span>
                <?php elseif(isset($errors_array["high-date"])) : ?>
                    <span class="error"><?= $errors_array["high-date"] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="place-input">Lugar:</label>
                <input type="text" name="place" id="place-input" placeholder="Introduce un lugar..." value="<?= is_valid_data($_POST["place"]) ? $_POST["place"] : ""; ?>">
                <?php if(isset($errors_array["empty-place"])) : ?>
                    <span class="error"><?= $errors_array["empty-place"] ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="name" id="name-input" placeholder="Introduce un nombre..." value="<?= is_valid_data($_POST["name"]) ? $_POST["name"] : ""; ?>">
                <?php if(isset($errors_array["empty-name"])) : ?>
                    <span class="error"><?= $errors_array["empty-name"] ?></span>
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
                <label for="image-input">Imágen:</label>
                <input type="file" name="image" id="image-input">
                <?php if(isset($errors_array["image-error"])) : ?>
                    <span class="error"><?= $errors_array["image-error"] ?></span>
                <?php endif; ?>
                <?php if(isset($errors_array["file-error"])) : ?>
                    <span class="error"><?= $errors_array["file-error"] ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" name="submit-button">Enviar</button>
        </form>

        <?php include_once("exit.php"); ?>
    </body>
</html>