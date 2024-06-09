<?php
    spl_autoload_register(function ($clase) {
        require "$clase.php";
    });

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa('floristeria', 'floristeria', '1312');
    require_once('form_functions.php');
    require_once('bbdd_functions.php');
?>