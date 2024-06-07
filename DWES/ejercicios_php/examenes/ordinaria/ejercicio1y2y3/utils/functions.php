<?php
    function isValidData($data) {
        return isset($_POST[$data]) && $_POST[$data] !== "" ? true : false;
    }

    function showError($error, $errors_array) {
        $errors_array;
        if(isset($errors_array[$error])) {
            echo "<span class='error'>{$errors_array[$error]}</span>";
        }
    }

    function showValue($name) {
        echo isset($_POST[$name]) ? $_POST[$name] : "";
    }

    function showSelect($name, $value) {
        echo isset($_POST[$name]) && $_POST[$name] == $value ? "selected" : "";
    }
?>