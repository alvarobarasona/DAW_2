<?php
    require_once('utils/init.php');

    $errors_array = [];

    $query_nombre_flores = 'SELECT * FROM flores';

    $nombres_flores = obtainQuery($query_nombre_flores);
    
    if(isPostMethod() && buttonExists('boton-aniadir')) {
        $query_flor = 'SELECT * FROM flores WHERE nombre = :nombre';
        $flor = obtainQuery($query_flor, $_POST['flor']);
        $stock_flor = $flor['stock'];
        $flag = true;

        catchEmptyError($errors_array, 'nombre-vacio', 'nombre');
        catchEmptyError($errors_array, 'fecha-vacia', 'fecha');
        catchDateError($errors_array, 'fecha-invalida', 'fecha');
        catchEmptyError($errors_array, 'cantidad-vacia', 'cantidad');
        catchAmountError($errors_array, 'cantidad-invalida', 'cantidad');
        catchExceededStockError($errors_array, 'stock-excedido', 'cantidad', $stock_flor);
        noStockError($errors_array, 'no-stock', $stock_flor);

        if(empty($errors_array)) {
            $flor_id = $flor['id'];
            $prefijo_direccion = $flor['nombre'] !== 'Clavel' ? 'Calle de la' : 'Calle del';
            $nombre_flor = $flor['nombre'];
            $numero_direccion = getRowsNumber('pedidos') + 1;
            $direccion = "$prefijo_direccion $nombre_flor, $numero_direccion";
            
            $fecha = $_POST['fecha'];
            $unidades_flor = $_POST['cantidad'];
            $query_insertar_pedido = 'INSERT INTO pedidos (flor_id, direccion, fecha, unidades) VALUES (:flor_id, :direccion, :fecha, :unidades)';
            $db->ejecuta($query_insertar_pedido, $flor_id, $direccion, $fecha, $unidades_flor);

            $stock_actualizado = $flor['stock'] - $_POST['cantidad'];
            $query_actualizar_stock = 'UPDATE flores SET stock = :stock WHERE nombre = :nombre';
            $db->ejecuta($query_actualizar_stock, $stock_actualizado, $flor['nombre']);

            $ruta_exito = 'exito.php';
            redirect('exito.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Ordinaria</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
    <body>
        <form action="" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?php showValue('nombre'); ?>">
            <?php showError($errors_array, 'nombre-vacio'); ?>

            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="fecha" value="<?php showValue('fecha'); ?>">
            <?php showError($errors_array, 'fecha-vacia'); ?>
            <?php showError($errors_array, 'fecha-invalida'); ?>

            <label for="flor">Flor</label>
            <select name="flor" id="flor">
                <?php generateSelectOptions($nombres_flores, 'nombre', 'flor', 'stock'); ?>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" value="<?php showValue('cantidad'); ?>">
            <?php showError($errors_array, 'cantidad-vacia'); ?>
            <?php showError($errors_array, 'cantidad-invalida'); ?>
            <?php showError($errors_array, 'stock-excedido'); ?>
            <?php showError($errors_array, 'no-stock'); ?>

            <button type="submit" name="boton-aniadir" class="button">Enviar</button>
        </form>
    </body>
</html>