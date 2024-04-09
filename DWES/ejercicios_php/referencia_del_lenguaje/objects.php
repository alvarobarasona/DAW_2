<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Objetos PHP</title>
    </head>
    <body>
        <?php
            class animal {
                function born() {
                    echo 'I\'m an animal and I born now.';
                }
            }
            $animal = new animal;
            $animal->born();

            echo '<br>';
            echo '<br>';

            $animal = (object) array(
                'type' => 'koala',
                'name' => 'Fred',
                'age' => 7,
                'sex' => 'male'
            );
            var_dump($animal);
            echo '<br>';
            var_dump($animal->{'type'});
            echo '<br>';
            var_dump($animal->{'name'});
            echo '<br>';
            var_dump($animal->{'age'});
            echo '<br>';
            var_dump($animal->{'sex'});

            echo '<br>';
            echo '<br>';

            $obj = (object) 'esto es un string';
            var_dump($obj);
            echo '<br>';
            echo $obj->scalar;
            $number = null;
            var_dump($number);
            echo '<br>';
            $number = (object) $number;
            var_dump($number);

            echo '<br>';
            echo '<br>';

            $array = (object) [
                "uno" => 1,
                2 => "dos"
            ];
            echo '<br>';
            var_dump($array->{"uno"});
            echo '<br>';
            var_dump(key($array));
            echo '<br>';
            var_dump($array->{2});
        ?>
    </body>
</html>