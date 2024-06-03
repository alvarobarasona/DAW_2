<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['delete-tweet'])) {
            deleteTweet();
        }
        if(isset($_POST['modify-redirect'])) {
            $tweet_id = urlencode($_POST['modify-redirect']);
            var_dump($tweet_id);
            header("Location: ../modify_tweet.php?tweet_id=$tweet_id");
            die();
        }
        if(isset($_POST['index-button'])) {
            header('Location: ../index.php');
            die();
        }
    }
?>