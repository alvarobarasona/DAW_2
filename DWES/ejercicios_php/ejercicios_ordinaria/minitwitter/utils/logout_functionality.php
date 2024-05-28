<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout-button'])) {
        session_destroy();
        if(isset($_COOKIE)) {
            consumeToken($_COOKIE[REMEMBER_COOKIE_NAME]);
            destroyCookie(REMEMBER_COOKIE_NAME);
        }
        
        header('Location: ../login.php');
        die();
    }
?>