<?php
    define("DIFFERENCE", 1);
    require("db.php");
    require("config.php");

    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    $select = $db->prepare("SELECT * FROM pokemon LIMIT :offset, :max_limit");

    $select->bindValue(":max_limit", PAGES_NUMBER, PDO::PARAM_INT);

    $select->bindValue(":offset", PAGES_NUMBER * ($page - DIFFERENCE), PDO::PARAM_INT);

    $select->execute();

    $rows = $select->fetchAll(PDO::FETCH_ASSOC);

    $count_rows = $db->query("SELECT COUNT(*) FROM pokemon");

    $total_rows = $count_rows->fetch();

    $pages_number = ceil($total_rows[0] / PAGES_NUMBER);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Pokemon - Exit</title>
        <style>
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
        </style>
    </head>
    <body>
        <a href="?page=<?= $page == 1 ? $pages_number : $page - 1; ?>"><</a>
        <?php for($i = 1; $i <= $pages_number; $i++) : ?>
            <a href="?page=<?= $i ?>"><?= $i; ?></a>
        <?php endfor; ?>
        <a href="?page=<?= $page == $pages_number ? 1 : $page + 1; ?>">></a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>NIVEL</th>
                    <th>TIPO</th>
                    <th>FECHA DE CAPTURA</th>
                    <th>LUGAR DE CAPTURA</th>
                    <th>ASPECTO</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row) : ?>
                    <tr>
                        <td><?= $row["pokemon_id"]; ?></td>
                        <td><?= $row["pokemon_name"]; ?></td>
                        <td><?= $row["pokemon_description"]; ?></td>
                        <td><?= $row["pokemon_level"]; ?></td>
                        <?php if($row["pokemon_type_2"] == "null") : ?>
                            <td><?= $row["pokemon_type_1"]; ?></td>
                        <?php else : ?>
                            <td><?= "{$row['pokemon_type_1']}/{$row['pokemon_type_2']}"; ?></td>
                        <?php endif; ?>
                        <td><?= $row["pokemon_catch_date"]; ?></td>
                        <td><?= $row["pokemon_catch_place"]; ?></td>
                        <td><img src="<?= $row["pokemon_img"]; ?>" alt="" class="image"></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>