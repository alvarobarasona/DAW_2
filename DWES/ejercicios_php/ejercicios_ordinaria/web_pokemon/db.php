<?php
    define("HOST", "localhost");
    define("DB_NAME", "pokemon");
    define("USER", "alvaro");
    define("PASSWORD", "1312");

    try {

        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, USER, PASSWORD);
    } catch(PDOException $e) {

        echo "ERROR {$e->getMessage()}";
        die();
    }
?>