<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio prueba</title>
    </head>
    <body>
            <?=
                '<p>Esta es una opción para imprimir texto con comillas simples en una misma línea.</p>';
            ?>

            <?php
                echo '<p>Esto es otra forma de imprimir texto
                con comillas simples
                mediante echo
                en varias líneas(Pero sin salto de línea).</p>';
            ?>

            <?=
                '<p>Uso de comilla simple dentro de comillas dobles: "m&m\'s."</p>'
            ?>

            <?php
                $nombre = "Rodolfo";
                echo '<p>Usando \'comillas simples\' se verá $nombre, y no su valor.</p>';
            ?>

            <?=
                '<p>El particionado del disco C:\alumnos\ se ha completado correctamente</p>';
            ?>

            <?=
                '<p>También se ha completado el particionado del disco D:\\profesores\\</p>';
            ?>

            <?php
                $variable = "Esto es una variable";

                echo '<p>Aquí se debería ver el nombre de la variable: $variable</p>';

                echo "<p>Aquí se debería ver el valor de \$variable: $variable</p>";

                echo "<p>Con comillas dobles además puedo añadir letras que se unan sin espacios al valor de una variable de esta forma: {$variable}s</p>";

                $numero = 95;
                $numero_doble = 4.6;

                echo "<p>También se puede hacer lo mismo que en el ejemplo anterior con números: {$numero}j-{$numero_doble}</p>";

                echo <<<ej1
                <p>Prueba con heredoc
                otra línea de la prueba con heredoc</p>
                ej1;

                class persona {
                    const name = 'Manolo';
                    const apellido = 'García';
                }

                $Manolo = 'Eustaquio';
                $García = 'Perez';

                echo "<p>Nombre: {${persona::name}}, Apellido: {${persona::apellido}}</p>";

                $frase = '¡Hola mundo!';

                echo "<p>Ahora vamos a acceder al tercer caracter del string '$frase' (Debería ser la H): {$frase[2]}</p>";

                echo '<p>Hay que tener cuidado a la hora de usar var_dump() con caracteres especiales, tales como ¡!, porque de ésta forma el string pasa a estar formado por las comillas, además de los caracteres normales y especiales, y los espacios en blanco. El método var_dump() devuelve en estas ocasiones un número que no se corresponde al número de caracteres reales.</p>';

                var_dump($frase);
                var_dump($frase[2]);

                echo "<p>Ahora vamos a acceder al noveno caracter del string '$frase' (Debería ser la u): {$frase[8]}</p>";

                $frase2 = "Buenos días";

                echo "<p>Ahora vamos a acceder al último caracter del string '$frase2' (Debería ser la s sin contar las ' '): {$frase2[strlen($frase2) - 1]}</p>";

                $frase3 = 'Una uva';
                $frase3_cambiada = $frase3;
                $frase3_cambiada[strlen($frase3) - 1] = 'e';

                echo "<p>Ahora vamos a cambiar el último caracter de la palabra '$frase3' por una 'e': $frase3_cambiada</p>";

                echo "<p>Vamos a imprimir la primera letra de la variable \$frase2 = 'Buenos días' usando el valor string '1' en el índice del array de la variable: {$frase2['0']}</p>";

                echo '<p>Declaramos una variable $nothing sin inicializar, y se la pasamos al método var_dump($nothing), y devuelve un warning e imprime que el contenido de la variable es NULL:</p>';
                $nothing;
                var_dump($nothing);

                echo "<br><br><p>Al intentar convertir la variable \$true = true; a string mediante concatenación con otro string, \$true se convierte en string como '1':</p>";
                $true = true;
                var_dump("true = '$true'");

                echo "<br><br><p>Al intentar convertir la variable \$false = false; a string mediante concatenación con otro string, \$false se convierte en string como \"\" (vacío):</p>";
                $false = false;
                var_dump("false = '$false'");

                echo '<p>Vamos a convertir la variable $number = 1; a string de forma que quede en $number = "1"; mediante el casteo convencional ($number = (string) $number;):</p>';
                $number = 1;
                $number = (string) $number;
                var_dump($number);

                $number2 = 2;
                echo '<p>Ahora $number2 = 2; y vamos a parsearlo a string mediante strval($number):</p>';
                var_dump(strval($number2));

                $number_array = array(1, 5, 3, 2, 4);
                var_dump($number_array);
                print_r($number_array);
                $number_array = strval($number_array);
                var_dump($number_array);
                var_dump($number_array[0]);

                $foo = 1 + "10.5";
                print_r($foo);

                $ascii_value = "104";
                $char_value = ord($ascii_value);
                print_r($char_value);

                $char_value = "d"
            ?>

            
    </body>
</html>