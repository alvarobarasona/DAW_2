<?php
    require_once('utils/init.php');
    
    $errores_formulario = [];

    $query_id_pedidos = 'SELECT id FROM pedidos';

    $id_pedidos = obtainQuery($query_id_pedidos);

    $query_nombre_flores = 'SELECT nombre FROM flores';

    $nombres_flores = obtainQuery($query_nombre_flores);

    var_dump($nombres_flores);

    if(isPostMethod() && buttonExists('enviar-formulario')) {
        $query_flor = 'SELECT * FROM flores WHERE nombre = :nombre';

        catchEmptyError($errores_formulario, 'nombre-vacio', 'nombre');

        catchEmptyError($errores_formulario, 'fecha-vacia', 'fecha');

        catchDateError($errores_formulario, 'fecha-menor', 'fecha');

        catchEmptyError($errores_formulario, 'cantidad-vacia', 'cantidad');

        catchAmountError($errores_formulario, 'cantidad-minima', 'cantidad');

        $flor = obtainQuery($query_flor, $_POST['flor']);

        $stock_flor = $flor['stock'];

        catchExceededStockError($errores_formulario, 'stock-insuficiente', 'cantidad', $stock_flor);

        noStockError($errores_formulario, 'sin-stock', $stock_flor);

        if(empty($errores_formulario)) {
            $nombre_flor = $flor['nombre'];
            $prefijo_direccion = $nombre_flor !== 'Clavel' ? 'Calle de la' : 'Calle del';
            $id_flor = $flor['id'];
            var_dump($id_flor);
            $numero_direccion = getRowsNumber('pedidos') + 1;
            $query_registrar_pedido = 'INSERT INTO pedidos (flor_id, direccion, fecha, unidades) VALUES (:flor_id, :direccion, :fecha, :unidades)';
            $db->ejecuta($query_registrar_pedido, $id_flor, "$prefijo_direccion $nombre_flor, $numero_direccion", $_POST['fecha'], $_POST['cantidad']);
            $stock_actualizado = $stock_flor - $_POST['cantidad'];
            $query_stock_actualizado = 'UPDATE flores SET stock = :stock_actualizado WHERE id = :id_flor';
            $db->ejecuta($query_stock_actualizado, $stock_actualizado, $id_flor);
            //header('Location: ');
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    
    <form action="" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php showValue('nombre'); ?>">
        <?php showError($errores_formulario, 'nombre-vacio'); ?>

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php showValue('fecha'); ?>">
        <?php showError($errores_formulario, 'fecha-vacia'); ?>
        <?php showError($errores_formulario, 'fecha-menor'); ?>

        <label for="flor">Flor</label>
        <select name="flor" id="flor">
            <?php generateSelectOptions($nombres_flores, 'nombre', 'flor'); ?>
        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="<?php showValue('cantidad'); ?>">
        <?php showError($errores_formulario, 'cantidad-vacia'); ?>
        <?php showError($errores_formulario, 'cantidad-minima'); ?>
        <?php showError($errores_formulario, 'sin-stock'); ?>
        <?php showError($errores_formulario, 'stock-insuficiente'); ?>

        <?php generateCheckboxOptions($id_pedidos, 'id', 'pula'); ?>

        <button type="submit" name="enviar-formulario">Enviar</button>
    </form>
</body>
</html>