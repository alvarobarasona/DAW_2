<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>iterables PHP</title>
    </head>
    <body>
        <?php
            function foo(iterable $iterable = [1, 2, 3]) {
                return $iterable;
            }

            foreach(foo() as $element) {
                echo "<p>$element</p>";
            }

            print("<br>");
            
            foreach(foo([4, 5, 6]) as $element) {
                echo "<p>$element</p>";
            }

            print("<br>");
            
            foreach(foo(["uno", "dos", "tres"]) as $element) {
                echo "<p>$element</p>";
            }

            print("<br>");

            function return_array_values(): iterable {
                $acc = 0;
                $limit = 10;
                for($i = 0; $i < $limit; $i++) {
                    yield $i; 
                }
            }

            foreach(return_array_values() as $element) {
                echo "<p>$element</p>";
            }

            print('<br>');

            class Proof {}

            function show_proof_object(?Proof $proof_object) {
                var_dump($proof_object);
                echo '<br>';
            }

            show_proof_object(new Proof);
            show_proof_object(null);
            show_proof_object("hello");
        ?>
    </body>
</html>