<?php
    spl_autoload_register(function ($clase) {
        require "$clase.php";
    });

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa('floristeria2', 'floristeria2', '1312');
    require_once('form_functions.php');
    require_once('bbdd_functions.php');
    require_once('files_functions.php');
    require_once('generic_functions.php');
?>