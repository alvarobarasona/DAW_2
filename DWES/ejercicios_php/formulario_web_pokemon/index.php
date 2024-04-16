<?php
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

    $food = [
        "dulce",
        "salado",
        "amargo",
        "ácido",
        "picante",
        "seco"
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
        
        if(!is_valid_data($_POST["id"])) {

            $errors_array["empty-id"] = "El campo del ID no puede estar vacío";
        } else {

            if($_POST["id"] < 1) {

                $errors_array["invalid-id"] = "El ID no puede ser menor que 1";
            }
        }

        if(!is_valid_data($_POST["name"])) {

            $errors_array["empty-name"] = "El campo del nombre no puede estar vacío";
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

        if(empty($errors_array)) {

            $id = urlencode($_POST["id"]);
            $name = urlencode($_POST["name"]);
            $level = urlencode($_POST["level"]);
            $type1 = urlencode($_POST["type1"]);
            $type2 = urlencode($_POST["type2"]);
            $pokerus = urlencode($_POST["pokerus"]);
            $flavors = isset($_POST["flavors"]) ? implode(", ", $_POST["flavors"]) : "";

            header("Location: exit.php?id=$id&name=$name&level=$level&type1=$type1&type2=$type2&pokerus=$pokerus&flavors=$flavors");
            die();
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
        <h1>Formulario práctica Pokémon</h1>
        <form action="index.php" method="post">
            <div>
                <label for="id-input">ID:</label>
                <input type="number" name="id" id="id-input" value="<?= isset($_POST["id"]) ? $_POST["id"] : ""; ?>" placeholder="Introduce un ID..." required>
                <?php if(isset($errors_array["empty-id"])) : ?>
                    <span class="error"><?= $errors_array["empty-id"]; ?></span>
                <?php endif; ?>
                <?php if(isset($errors_array["invalid-id"])) : ?>
                    <span class="error"><?= $errors_array["invalid-id"]; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="name-input">Nombre:</label>
                <input type="text" name="name" id="name-input" value="<?= isset($_POST["name"]) ? $_POST["name"] : ""; ?>" placeholder="Introduce un nombre..." required>
                <?php if(isset($errors_array["empty-name"])) : ?>
                    <span class="error"><?= $errors_array["empty-name"]; ?></span>
                <?php endif; ?>
            </div>
            <div>
                <label for="level-input">Nivel:</label>
                <input type="number" name="level" id="level-input" value="<?= isset($_POST["level"]) ? $_POST["level"] : ""; ?>" placeholder="Introduce un nivel..." required>
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
                <label for="pokerus-select">Pokérus:</label>
                <input type="checkbox" name="pokerus" id="pokerus-select" <?= isset($_POST["pokerus"]) && $_POST["pokerus"] == "on" ? "checked" : ""; ?>>
            </div>
            <div>
                <p>Comida que le gusta:</p>
                <ul>
                    <?php foreach($food as $flavor) : ?>
                        <li>
                            <label for="<?= $flavor; ?>-input"><?= $flavor; ?>:</label>
                            <input type="checkbox" name="flavors[]" id="<?= $flavor; ?>-input" value="<?= $flavor ?>" <?= isset($_POST["flavors"]) && in_array($flavor, $_POST["flavors"]) ? "checked" : ""; ?>>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <button type="submit" name="add-button">Añadir</button>
        </form>
    </body>
</html>