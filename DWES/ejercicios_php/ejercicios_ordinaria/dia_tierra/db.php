<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=acciones', 'acciones', 'acciones');
    } catch(PDOException $e) {
        echo "ERROR {$e->getMessage()}";
        die();
    }
?>