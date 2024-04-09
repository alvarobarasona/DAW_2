<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabla Partidos Ejercicio 1</title>
    </head>
    <body>
        <?php
            include('funciones.php');

            $array_partidos_aleatorios = sorteo(obtener_array_partidos(obtener_array_personas(5)), '2024-04-20 16:00:00', '+1 hour 30 minutes');

            function imprimir_fila_tabla($propiedad) {

                $propiedad->obtener_fila_tabla();
            }

            echo
            '<table>
                <thead>
                    <th>Jugador 1</th>
                    <th>Jugador 2</th>
                    <th>Resultado</th>
                    <th>Hora de juego</th>
                </thead>';

            array_map('imprimir_fila_tabla', $array_partidos_aleatorios);

            echo '</table>';
        ?>
    </body>
</html>