<?php
    //TO DO: Reordenar el array en vez de hacer las querys en el filtado

    require("utils/db.php");

    $page = isset($_GET["page"]) ? (int)$_GET["page"] : 1;

    $select = $db->prepare("SELECT * FROM matches LIMIT :offset, :max_limit");

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["filter-button"])) {

        $name_order = $_POST["filter-name"];

        $result_order = $_POST["filter-result"];

        switch($result_order) {

            case "all":

                switch($name_order) {

                    case "default":

                        $select = $db->prepare("SELECT * FROM matches LIMIT :offset, :max_limit");

                        break;

                    case "ascendent":

                        $select = $db->prepare("SELECT * FROM matches ORDER BY country ASC LIMIT :offset, :max_limit");

                        break;

                    case "descendent";

                        $select = $db->prepare("SELECT * FROM matches ORDER BY country DESC LIMIT :offset, :max_limit");
                }

                break;

            case "win":

                switch($name_order) {

                    case "default":

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'win' LIMIT :offset, :max_limit");

                        break;

                    case "ascendent":

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'win' ORDER BY country ASC LIMIT :offset, :max_limit");

                        break;

                    case "descendent";

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'win' ORDER BY country DESC LIMIT :offset, :max_limit");
                }

                break;

            case "tie":

                switch($name_order) {

                    case "default":

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'tie' LIMIT :offset, :max_limit");

                        break;

                    case "ascendent":

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'tie' ORDER BY country ASC LIMIT :offset, :max_limit");

                        break;

                    case "descendent";

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'tie' ORDER BY country DESC LIMIT :offset, :max_limit");
                }

                break;

            case "lose":

                switch($name_order) {

                    case "default":

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'lose' LIMIT :offset, :max_limit");

                        break;

                    case "ascendent":

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'lose' ORDER BY country ASC LIMIT :offset, :max_limit");

                        break;

                    case "descendent";

                        $select = $db->prepare("SELECT * FROM matches WHERE result = 'lose' ORDER BY country DESC LIMIT :offset, :max_limit");
                }
        }
    }

    $select->bindValue(":offset", PAGES_PER_PAGE * ($page - 1), PDO::PARAM_INT);

    $select->bindValue(":max_limit", PAGES_PER_PAGE, PDO::PARAM_INT);

    $select->execute();

    $rows = $select->fetchAll(PDO::FETCH_ASSOC);

    $sql_rows_number = $db->query("SELECT COUNT(*) FROM matches");

    $php_rows_number = $sql_rows_number->fetch();

    $pages_number = (int)ceil($php_rows_number[0] / PAGES_PER_PAGE);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rugby</title>
    </head>
    <body>
        <form action="index.php" method="post">
            <label>Filtrado:</label>
            <select name="filter-result">
                <option value="all" <?php get_checked_option("filter-result", "all"); ?>>Todos</option>
                <option value="win" <?php get_checked_option("filter-result", "win"); ?>>Victoria</option>
                <option value="tie" <?php get_checked_option("filter-result", "tie"); ?>>Empate</option>
                <option value="lose" <?php get_checked_option("filter-result", "lose"); ?>>Derrota</option>
            </select>
            <select name="filter-name">
                <option value="default" <?php get_checked_option("filter-name", "default"); ?>>Orden de inserción</option>
                <option value="ascendent" <?php get_checked_option("filter-name", "ascendent"); ?>>Nombre ascendente</option>
                <option value="descendent" <?php get_checked_option("filter-name", "descendent"); ?>>Nombre descendente</option>
            </select>
            <button type="submit" name="filter-button">Filtrar</button>
        </form>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE PAÍS</th>
                    <th>RESULTADO</th>
                    <th>PUNTUACIÓN</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row) : ?>
                    <tr>
                        <td><?= $row["id"]; ?></td>
                        <td><?= $row["country"]; ?></td>
                        <td><?= $row["result"]; ?></td>
                        <td><?= $row["score"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php show_pages($page, $pages_number); ?>
    </body>
</html>