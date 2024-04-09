<?php
    function is_valid_data($data) {

        return isset($data) && $data !== "" ? true : false;
    }

    $title = "";
    $author = "";
    $year = "";
    $pages = "";

    $errors = [];

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_URI"] == "/ejercicios_php/ejercicios_ordinaria/libros_bbdd/index.php") {

        if(isset($_POST["submit-button"])) {

            if(is_valid_data($_POST["title"])) {

                $title = $_POST["title"];

                var_dump($title);
            } else {
    
                $errors["empty-title"] = "El título del libro no puede estar vacío";
            }
    
            if(is_valid_data($_POST["author"])) {

                $author = $_POST["author"];
    
                var_dump($author);
            } else {
    
                $errors["empty-author"] = "El autor del libro no puede estar vacío";
            }
    
            if(is_valid_data($_POST["year"])) {

                $year = $_POST["year"];

                if($_POST["year"] <= date("Y")) {
    
                    var_dump($year);
                } else {

                    $errors["greater-year"] = "El año no puede ser mayor que el actual";
                }
    
            } else {
    
                $errors["empty-year"] = "El año del libro no puede estar vacío";
            }
    
            if(is_valid_data($_POST["pages"])) {

                $pages = $_POST["pages"];

                if($_POST["pages"] > 0) {
    
                    var_dump($pages);
                } else {

                    $errors["no-pages"] = "El número de páginas debe ser mayor que 0";
                }
    
            } else {
    
                $errors["empty-pages"] = "El número de páginas del libro no puede estar vacío";
            }

            if(empty($errors)) {

                header("Location: exit.php");
                die();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Insertador de libros</title>
    </head>
    <body>
        <h1>Insertador de libros</h1>
        <form action="index.php" method="post">
            <div>
                <label for="title-input">Título:</label>
                <input type="text" name="title" id="title-input" value="<?php echo $title; ?>">
                <?php
                    if(isset($errors["empty-title"])) {

                        echo "<span>{$errors['empty-title']}</span>";
                    }
                ?>
            </div>
            <div>
                <label for="author-input">Autor:</label>
                <input type="text" name="author" id="author-input" value="<?php echo $author; ?>">
                <?php
                    if(isset($errors["empty-author"])) {

                        echo "<span>{$errors['empty-author']}</span>";
                    }
                ?>
            </div>
            <div>
                <label for="year-input">Año:</label>
                <input type="text" name="year" id="year-input" value="<?php echo $year; ?>">
                <?php
                    if(isset($errors["empty-year"])) {

                        echo "<span>{$errors['empty-year']}</span>";
                    }

                    if(isset($errors["greater-year"])) {

                        echo "<span>{$errors['greater-year']}</span>";
                    }
                ?>
            </div>
            <div>
                <label for="pages-input">Número de páginas:</label>
                <input type="text" name="pages" id="pages-input" value="<?php echo $pages; ?>">
                <?php
                    if(isset($errors["empty-pages"])) {

                        echo "<span>{$errors['empty-pages']}</span>";
                    }

                    if(isset($errors["no-pages"])) {

                        echo "<span>{$errors['no-pages']}</span>";
                    }
                ?>
            </div>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
    </body>
</html>