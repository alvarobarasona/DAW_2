<?php
    spl_autoload_register(function ($clase) {
        require("$clase.php");
    }); 
?>