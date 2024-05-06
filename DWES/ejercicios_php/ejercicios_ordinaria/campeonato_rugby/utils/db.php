<?php
    try {

        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, USER, PASSWORD);
    } catch(PDOException $e) {

        echo "ERROR {$e->getMessage()}";
        die();
    }
?>