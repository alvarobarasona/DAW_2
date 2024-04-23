<?php
    require('db.php');

    $select = $db->prepare("SELECT * FROM acciones");
    $select->execute();
    $row = $select->fetchAll(PDO::FETCH_ASSOC);

    echo "<pre>";
    print_r($row);
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
    </body>
</html>