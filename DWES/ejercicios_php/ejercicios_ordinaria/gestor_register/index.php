<?php
    /*
        PHP - Clases

        Crear un sistema en PHP que permita registrar y describir características de diferentes tipos de gestores de datos: relacional, no relacional y basado en ficheros. Cada tipo de gestor tendrá sus propios atributos distintivos. Se utilizará un trait para generar una representación en HTML de la información de cada gestor.

        Clase Base:

        Desarrollar una clase abstracta GestorDatos con propiedades comunes como nombre y descripción. Tendrá un método abstracto obternerDetalle.

        Subclases Específicas:

        GestorRelacional: Esta subclase tendrá atributos como sistemas operativos soportados, version, y soporteTransacciones.
        GestorNoRelacional: Incluirá atributos como tipoModeloDatos (por ejemplo, document, key-value, graph, etc.).
        GestorBasadoEnFichero: Tendrá atributos como formatoArchivo (por ejemplo, TXT, CSV, XML) y modoAcceso (lectura, escritura, ambos).
        Trait HTMLRenderer:
        Implementar un trait HTMLRenderer que contenga un método renderHTML() el cual genere una representación HTML de las propiedades del gestor de datos. Este trait pintará en un h1 el nombre, en un p la descripción, y en otro p los detalles del gestor.

        Tarea Final:
        
        Implementar las clases y el trait, y luego crear instancias de cada tipo de gestor de datos, asignarles valores a sus propiedades, y utilizar el HTMLRenderer para mostrar estas propiedades en formato HTML. El script principal debe usar autoload. Se creará un array de gestores de bases de datos y luego en la misma página se recorrerá mostrando la información.
    */
    define("NAME_POSITION", 0);

    spl_autoload_register(function($class) {

        include "classes_gestor/$class.php";
    });

    function html_render($generator) {

        foreach($generator as $key=>$value) {

            if($key == NAME_POSITION) {

                echo "<h1>$value</h1>";
            } else {

                echo "<p>$value</p>";
            }
        }
        echo "<br>";
    }

    $relational_gestor = new RelationalGestor("RG TURBOPOWER", "Gestor para contenido relacional", "Windows 8", "1.3", "RTX");

    $no_relational_gestor = new NoRelationalGestor("NRG MACHINE", "Gestor para contenido NO relacional", "Modelo de datos GTP");

    $file_gestor = new FileGestor("FG", "Gestor para contenido de ficheros", "json", "VPN");

    $gestors_array = [$relational_gestor, $no_relational_gestor, $file_gestor];

    foreach($gestors_array as $gestor) {

        $generator = $gestor->get_detail();
        html_render($generator);
    }
?>