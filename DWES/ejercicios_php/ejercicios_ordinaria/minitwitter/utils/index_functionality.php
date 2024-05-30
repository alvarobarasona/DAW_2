<?php
    $index_errors = [];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['add-tweet'])) {
            if(!isValidData('tweet-input')) {
                $index_errors['empty-tweet'] = 'El campo del tweet no puede estar vacío';
            }
    
            if(empty($index_errors)) {
                $user_id = $_SESSION['user']['id'];
                $tweet = $_POST['tweet-input'];
                $tweet_date = date('Y-m-d H:i:s', time());
    
                var_dump($user_id);
                var_dump($tweet);
                var_dump($tweet_date);
    
                addTweet($user_id, $tweet, $tweet_date);
            }
        }
        if(isset($_POST['private-button'])) {
            header('Location: ../private.php');
            die();
        }
    }
?>