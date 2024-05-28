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

    function showChecked($name) {
        echo isset($_POST[$name]) && $_POST[$name] === "on" ? "checked" : "";
    }

    function userExists($username, $password) {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['user_password']) ? true : false;
    }

    function getUserData($username) {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    function getNewToken($token_length) {
        return bin2hex(openssl_random_pseudo_bytes($token_length));
    }

    function saveToken($token, $user_id, $time_to_expire) {
        global $db;
        $query = $db->prepare('INSERT INTO tokens (token, user_id, fecha) VALUES (:token, :user_id, :time_to_expire)');
        $query->bindParam(':token', $token);
        $query->bindParam(':user_id', $user_id);
        $query->bindParam(':time_to_expire', $time_to_expire);
        $query->execute();
    }

    function setSession() {
        if(!isset($_SESSION['user'])) {
            if(isset($_COOKIE[REMEMBER_COOKIE_NAME])) {
                global $db;
                $cookie_token = $_COOKIE[REMEMBER_COOKIE_NAME];
                $db_token = $db->prepare('SELECT * FROM tokens WHERE token = :token');
                $db_token->bindParam(':token', $cookie_token);
                $db_token->execute();
                $php_token = $db_token->fetch();

                $current_date = date('Y-m-s H:i:s', time());

                if($php_token['fecha'] > $current_date && !$php_token['consumido']) {
                    $user_id = $php_token['user_id'];
                    $db_user = $db->prepare('SELECT * FROM users WHERE id = :user_id');
                    $db_user->bindParam(':user_id', $user_id);
                    $db_user->execute();
                    $php_user = $db_user->fetch();
                    $_SESSION['user'] = $php_user;
                }
            } else {
                header('Location: login.php');
                die();
            }
        }
    }

    function destroyCookie($cookie_name) {
        setcookie($cookie_name, '', time() - 3600, '/');
        unset($_COOKIE[$cookie_name]);
    }

    function consumeToken($cookie_token) {
        global $db;
        $query = $db->prepare('UPDATE tokens SET consumido = true WHERE token = :token');
        $query->bindValue(':token', $cookie_token);
        $query->execute();
    }

    function showTweets($user_id = null) {
        global $db;
        if($user_id == null) {
            $db_tweets = $db->prepare('SELECT * FROM tweets, users WHERE tweets.user_id = users.id');
            $db_tweets->execute();
        } else {
            $db_tweets = $db->prepare('SELECT * FROM tweets, users WHERE tweets.user_id = :user_id AND tweets.user_id = users.id');
            $db_tweets->bindParam(':user_id', $user_id);
            $db_tweets->execute();
        }
         return $db_tweets->fetchAll(PDO::FETCH_ASSOC);
    }

    function addTweet($user_id, $tweet, $tweet_date) {
        global $db;
        $query_tweet = $db->prepare('INSERT INTO tweets (user_id, tweet, fecha) VALUES (:user_id, :tweet, :tweet_date)');
        $query_tweet->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $query_tweet->bindParam(':tweet', $tweet);
        $query_tweet->bindParam(':tweet_date', $tweet_date);
        $query_tweet->execute();
    }
?>