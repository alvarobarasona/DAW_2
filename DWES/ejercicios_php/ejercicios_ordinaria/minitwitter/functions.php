<?php

    function isValidData($data) {
        return isset($_POST[$data]) && $_POST[$data] !== "" ? true : false;
    }

    function showValue($name) {

        echo isset($_POST[$name]) ? $_POST[$name] : "";
    }

    function showError($error) {

        global $errors_array;

        if(isset($errors_array[$error])) {

            echo "<span class='error'>{$errors_array[$error]}</span>";
        }
    }

    function saveToken($token, $expirate, $user_id, $consum) {

        global $db;

        $params = [];

        $db->ejecuta();
    }
?>