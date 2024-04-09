<?php
    define('DB_DATA', 'mysql:host=localhost;dbname=prueba');
    define('USERNAME', 'alvaro');
    define('PASSWORD', '1234');

    function connectdb($query, $id_cliente) {

        try {

            $mdb = new PDO($DB_DATA), $USERNAME, $PASSWORD;
            $mbd->setAttribute(PDO::ATTR_ERRMODE);
        } catch() {

        }
    }
?>