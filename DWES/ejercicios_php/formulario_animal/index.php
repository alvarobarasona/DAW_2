<?php
    /**
     * Require para importar el objeto de conexión con la BBDD.
     */
    require("db.php");
    /**
     * Require que importa las variables del proyecto.
     */
    require("config.php");

    require("functions.php");

    print_r($pages_number);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario animales - Exit</title>
        <style>
            table {
                width: 100%;
            }
            .image {
                height: 200px;
            }

            th {
                padding: 0px 15px 0px 15px
            }

            td {
                text-align: center;
                padding: 0px 15px 0px 15px
            }
            img {
                height: 150px;
            }
        </style>
    </head>
    <body>
        <a href="?page=<?php show_page($page, $pages_number, "<"); ?>"><</a>
        <?php for($i = 1; $i <= $pages_number; $i++) : ?>
            <a href="?page=<?= $i; ?>"><?= $i; ?></a>
        <?php endfor; ?>
        <a href="?page=<?php show_page($page, $pages_number, ">"); ?>">></a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>EDAD</th>
                    <th>IMÁGEN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row) : ?>
                    <tr>
                        <td><?= $row["animal_id"]; ?></td>
                        <td><?= $row["animal_name"]; ?></td>
                        <td><?= $row["animal_description"]; ?></td>
                        <td><?= $row["animal_age"]; ?></td>
                        <td><img src="<?= $row["animal_img"]; ?>" alt=""></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>