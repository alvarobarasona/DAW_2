<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Arrays</title>
    </head>
    <body>
        <?php
            $array = array(
                "a" => 1,
                "b" => 2,
                "c" => 3,
                "d" => 4,
                "e" => 5
            );
            var_dump($array);

            echo '<br>';

            $array = [
                "f" => 6,
                "g" => 7,
                "h" => 8,
                "i" => 9,
                "j" => 10
            ];
            var_dump($array);

            echo '<br>';

            $array = array(
                1 => 5,
                "2" => 4,
                3 => 3,
                "2" => 2,
                1 => 1
            );
            var_dump($array);

            print('<br>');

            $array = [
                4.5 => 20,
                2.3 => 15,
                8.6 => 23
            ];
            var_dump($array);

            print('<br>');

            $array = array(
                "a" => 5,
                2 => "a",
                "lol" => 1,
                23.3 => 9,
                "4" => 25,
                3.1 => 40,
                78
            );
            var_dump($array);

            print('<br>');

            $array = [
                "clave" => "valor",
                1 => 5,
                "arrays" => [
                    "array1" => [1, "perro", 4 => 34],
                    "array2" => [5, 6, 7, 8]
                ]
            ];

            var_dump($array["arrays"]["array1"][1]);
            echo '<br>';
            var_dump($array[1]);
            print('<br>');
            var_dump($array["arrays"]["array1"][4]);
            echo '<br>';
            var_dump($array["arrays"]["array2"][2]);

            print('<br>');

            function get_array() {
                return array(5, 6, 7);
            }

            var_dump(get_array()[0]);
            var_dump(get_array()[1]);
            var_dump(get_array()[2]);

            print_r('<br>');

            $array = array(2, 4, 6, 8, 10);

            var_dump($array);

            foreach($array as $i => $value) {
                echo "<p>clave: $i | valor: $value</p><br>";
                unset($array[$i]);
            }
            print_r($array);

            print('<br>');

            $array[] = 12;
            var_dump($array);

            echo '<br>';

            $array = array_values($array);
            $array[] = 14;
            print_r($array);

            echo '<br>';

            $array = [1 => "uno", 2 => "dos", 3 => "tres"];
            var_dump($array);
            echo '<br>';
            unset($array[2]);
            var_dump($array);
            echo '<br>';
            var_dump(array_values($array));

            print('<br>');

            class A {
                private $A; //  Este campo se convertirá en '\0A\0A'
            }
            
            class B extends A {
                private $A; // Este campo se convertirá en '\0B\0A'
                public $AA; // Este campo se convertirá en 'AA'
            }
            
            var_dump((array) new B());

            echo '<br>';

            $array = array(1, 2, 3);
            $array2 = array(...$array);
            $array3 = array(4, ...$array, ...$array2);

            var_dump($array);
            echo '<br>';
            var_dump($array2);
            echo '<br>';
            var_dump($array3);
            echo '<br>';

            $array = [];
            var_dump($array);
            echo '<br>';
            $array["uno"] = 1;
            var_dump($array);
            echo '<br>';
            $array["dos"] = 2;
            var_dump($array);
            echo '<br>';
            $array[] = 20;
            var_dump($array);
            echo '<br>';
            $array[6] = 5;
            var_dump($array);
            echo '<br>';
            $array[] = 9;
            var_dump($array);
            echo '<br>';

            $array = array("pedro", "manolo", "andres", "eustaquio");
            sort($array);
            var_dump($array);
            echo '<br>';
            $array = array(4, 7, 2, 3, 1, 6, 5);
            sort($array);
            var_dump($array);
        ?>
    </body>
</html>