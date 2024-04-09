<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Enums PHP</title>
    </head>
    <body>
        <?php
            enum Type {
                case Fire;
                case Water;
                case Grass;
            }
            function get_type(Type $type) {
                var_dump($type);
                echo '<br>';
                /*
                $type_object = (object) Type $type;
                var_dump($type_object);
                */
            }
            
            get_type(Type::Fire);
            get_type(Type::Water);
            get_type(Type::Grass);
        ?>
    </body>
</html>