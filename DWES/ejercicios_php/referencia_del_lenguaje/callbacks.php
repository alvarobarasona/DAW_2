<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recursos PHP</title>
    </head>
    <body>
        <?php
            function callback_function() {
                echo 'This is a callback function';
                print('<br>');
            }

            class proof_class {
                static function callback_method() {
                    echo 'This is a callback method';
                    print('<br>');
                }
            }

            call_user_func('callback_function');

            call_user_func(array('proof_class', 'callback_method'));

            $obj = new proof_class();
            call_user_func([$obj, "callback_method"]);

            call_user_func('proof_class::callback_method');

            class Animal {
                public static function identificate() {
                    echo "I'm a animal<br>";
                }
            }

            class Dog extends Animal {
                public static function identificate() {
                    echo "I'm a dog<br>";
                }
            }

            call_user_func(['Dog', 'parent::identificate']);
            call_user_func(['Dog', 'identificate']);

            class Choose_pokemon {
                public function __invoke($pokemon_name) {
                    print("Choose youre favourite pokémon: $pokemon_name<br>");
                }
            }

            $choose_function = new Choose_pokemon();

            call_user_func($choose_function, "Metagross");

            $double = function($number) {
                return $number * 2;
            };

            //range() genera un array (En este caso de 8 posiciones con un valor del 1 al 8: [0]=> int(1), [1]=> int(2), [2]=> int(3)..., [7]=> int(8))
            $numbers = range(1, 8);

            var_dump($numbers);
            echo '<br>';

            //array_map aplica la función callback que se le pasa como primer parámetro al array que se pasa como segundo parámetro, devolviendo un array con la función aplicada en cada una de las posiciones de éste nuevo array
            $new_numbers = array_map($double, $numbers);

            var_dump($new_numbers);
            echo '<br>';

            //implode() devuelve un string con cada una de las posiciones del array que se le pasa como segundo parámetro separadas por la cadena que se le pasa como primer parámetro
            print implode(' ', $new_numbers);

            $say_color = function($color) {
                echo 
            }
        ?>
    </body>
</html>