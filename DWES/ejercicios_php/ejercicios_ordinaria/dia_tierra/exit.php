<?php
    require('config.php');
    require('db.php');

    $page = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;

    $select = $db->prepare("SELECT * FROM acciones LIMIT :offset, :limite");

    $select->bindValue(":limite", NUM_POR_PAGINA, PDO::PARAM_INT);

    $select->bindValue(":offset", NUM_POR_PAGINA * ($page - 1), PDO::PARAM_INT);

    $select->execute();

    $row = $select-> fetchAll(PDO::FETCH_ASSOC);

    $count = $db-> query("SELECT COUNT(*) FROM acciones");

    $total_actions = $count -> fetch();

    $num_paginas = ceil($total_actions[0] / NUM_POR_PAGINA);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <a href="?pagina=<?= $page == 1 ? $num_paginas : $page - 1; ?>"><</a>
        <?php for($i = 1; $i <= $num_paginas; $i++) : ?>
            <a href="?pagina=<?= $i ?>"><?= $i; ?></a>
        <?php endfor; ?>
        <a href="?pagina=<?= $page == $num_paginas ? 1 : $page + 1; ?>">></a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Lugar</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($row as $data) : ?>
                    <tr>
                        <td><?= $data["id"] ?></td>
                        <td><?= $data["fecha"] ?></td>
                        <td><?= $data["lugar"] ?></td>
                        <td><?= $data["nombre"] ?></td>
                        <td><?= $data["descripcion"] ?></td>
                        <td><img src="<?= $data["foto"] ?>" alt=""></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>