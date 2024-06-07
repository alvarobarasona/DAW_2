<?php
    spl_autoload_register(function ($clase) {
        require "clases/$clase.php";
    });

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa('criptomonedas', 'criptomonedas', '1312');

    session_start();
?>