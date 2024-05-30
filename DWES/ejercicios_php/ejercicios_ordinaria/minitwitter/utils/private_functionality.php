<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['delete-tweet'])) {
            deleteTweet();
        }
        if(isset($_POST['index-button'])) {
            header('Location: ../index.php');
            die();
        }
    }
?>