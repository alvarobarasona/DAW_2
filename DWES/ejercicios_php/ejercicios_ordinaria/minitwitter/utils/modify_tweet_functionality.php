<?php
    $modify_tweet_errors = [];

    $tweet_id = urldecode($_GET['tweet_id']);

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['modify-tweet'])) {
            if(!isValidData('tweet-input')) {
                $modify_tweet_errors['empty-tweet'] = 'El campo del tweet no puede estar vacío';
            }
            if(empty($modify_tweet_errors)) {
                //$user_id = $_SESSION['user']['id'];
                $tweet_text = $_POST['tweet-input'];
    
                modifyTweet($tweet_id, $tweet_text);
                header('Location: ../private.php');
                die();
            }
        }
        if(isset($_POST['cancel-modify'])) {
            header('Location: ../private.php');
            die();
        }
    }
?>