<?php
    require_once('utils/init.php');

    $errores_formulario = [];

    $query_flores = 'SELECT nombre FROM flores';

    $db->ejecuta($query_flores);
    $tipos_flores = $db->obtenDatos();

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar-formulario'])) {
        $query_flor = 'SELECT * FROM flores WHERE nombre = :nombre';
        if(!isValidData('nombre')) {
            $errores_formulario['nombre-vacio'] = 'Debe tener nombre';
        }
        $fecha_actual = date('Y-m-d', time());
        if(!isValidData('fecha')) {
            $errores_formulario['fecha-vacia'] = 'Debe tener fecha';
        }   elseif($_POST['fecha'] < $fecha_actual) {
                $errores_formulario['fecha-menor'] = 'Debe ser posterior a hoy';
        
        }
        $db->ejecuta($query_flor, $_POST['flor']);
        $stock_flor = $db->obtenDatos()['stock'];
        if(!isValidData('cantidad')) {
            $errores_formulario['cantidad-vacia'] = 'Debe tener cantidad';
        } else {
            if($_POST['cantidad'] < 1) {
                $errores_formulario['cantidad-minima'] = 'Debe ser al menos 1 unidad';
            } elseif($_POST['cantidad'] > $stock_flor) {
                $errores_formulario['stock-insuficiente'] = 'No se dispone de esa cantidad de unidades';
            }
        }
        if($stock_flor < 1) {
            $errores_formulario['sin-stock'] = 'No hay stock';
        }
        if(empty($errores_formulario)) {
            $db->ejecuta($query_flor, $_POST['flor']);
            $nombre_flor = $db->obtenDatos()['nombre'];
            $prefijo_direccion = $nombre_flor !== 'Clavel' ? 'Calle de la' : 'Calle del';
            $db->ejecuta($query_flor, $_POST['flor']);
            $id_flor = $db->obtenDatos()['id'];
            $query_numero_direccion = 'SELECT COUNT(*) FROM pedidos';
            $db->ejecuta($query_numero_direccion);
            $numero_direccion = $db->obtenDatos()['COUNT(*)'] + 1;
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
        <?php showError('sin-stock', $errores_formulario); ?>
        <?php showError('stock-insuficiente', $errores_formulario); ?>
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" value="<?php showValue('nombre'); ?>">
        <?php showError('nombre-vacio', $errores_formulario); ?>

        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" value="<?php showValue('fecha'); ?>">
        <?php showError('fecha-vacia', $errores_formulario); ?>
        <?php showError('fecha-menor', $errores_formulario); ?>

        <label for="flor">Flor</label>
        <select name="flor" id="flor">
            <?php foreach($tipos_flores as $key => $value) : ?>
                <option value="<?= $tipos_flores[$key]['nombre']; ?>" <?php showSelect('flor', $tipos_flores[$key]['nombre']); ?>><?= $tipos_flores[$key]['nombre']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" id="cantidad" value="<?php showValue('cantidad'); ?>">
        <?php showError('cantidad-vacia', $errores_formulario); ?>
        <?php showError('cantidad-minima', $errores_formulario); ?>

        <button type="submit" name="enviar-formulario">Enviar</button>
    </form>

</body>
</html>