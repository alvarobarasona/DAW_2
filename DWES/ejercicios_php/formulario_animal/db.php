<?php
    /**
     * Constante que guarda el host de la BBDD.
     */
    define("HOST", "localhost");
    /**
     * Constante que guarda el nombre de la BBDD.
     */
    define("DB_NAME", "animales");
    /**
     * Constante que guarda el nombre del usuario de la BBDD.
     */
    define("USER", "animales");
    /**
     * Constante que guarda la contraseña del usuario de la BBDD.
     */
    define("PASSWORD", "1312");
    /**
     * Este trycatch intenta la conexión con la BBDD
     */
    try {
        /**
         * Variable que guarda la conexión de la BBDD.
         */
        $db = new PDO('mysql:host=' . HOST . ';dbname=' . DB_NAME, USER, PASSWORD);
    } catch(PDOException $e) {

        echo "Error {$e->getMessage()}";
        die();
    }
?>