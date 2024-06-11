<?php
    require_once('utils/init.php');

    $query_pedidos_usuario = 'SELECT * FROM pedidos ORDER BY fecha ASC';
    $pedidos_ordenados = obtainQuery($query_pedidos_usuario);
    
    if(buttonExists('cerrar-sesion')) {
        redirect('login.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pedidos</title>
    </head>
    <body>
        <h1>Pedidos</h1>
        <?php printList($pedidos_ordenados); ?>
        <form action="" method="post">
            <button name="cerrar-sesion">Cerrar Sesión</button>
        </form>
    </body>
</html>