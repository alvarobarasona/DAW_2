<?php
    function is_valid_data($data) {
        return isset($_POST[$data]) && $_POST[$data] !== "" ? true : false;
    }
?>