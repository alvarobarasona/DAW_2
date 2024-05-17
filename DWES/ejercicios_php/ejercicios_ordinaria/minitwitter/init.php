<?php
    define('DOC_ROOT', dirname(__FILE__) . "/");

    spl_autoload_register(
        function($clase) {
            include("$clase.php");
        }
    );

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        'autentificacion',
        'autentificacion',
        '1312'
    );

    session_start();

?>