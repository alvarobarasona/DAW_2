<?php
    //Todo esto es para que funcione el phpmailer

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

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

    function userExists($username, $password = null) {
        global $db;
        $query = $db->prepare('SELECT * FROM users WHERE username = :username');
        $query->bindParam(':username', $username);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($password == null) {
            return $user ? true : false;
        } else {
            return $user && password_verify($password, $user['user_password']) ? true : false;
        }
    }

    function registerUser($username, $password, $email) {
        //password_hash
        global $db;
        $query = $db->prepare('INSERT INTO users (username, user_password, email, foto) VALUES (:username, :user_password, :email, "default_img.png")');
        $query->bindParam(':username', $username);
        $query->bindParam(':user_password', password_hash($password, PASSWORD_DEFAULT));
        $query->bindParam(':email', $email);
        $query->execute();
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
        $query->bindParam(':token', $cookie_token);
        $query->execute();
    }

    function showTweets($user_id = null) {
        global $db;
        if($user_id == null) {
            $db_tweets = $db->prepare('SELECT * FROM tweets, users WHERE tweets.user_id = users.id ORDER BY tweets.fecha DESC');
            $db_tweets->execute();
        } else {
            $db_tweets = $db->prepare('SELECT * FROM tweets WHERE user_id = (SELECT id FROM users WHERE id = :user_id) ORDER BY fecha DESC');
            //$db_tweets = $db->prepare('SELECT * FROM tweets, users WHERE tweets.user_id = :user_id AND tweets.user_id = users.id');
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

    function deleteTweet() {
        $user_id = $_SESSION['user']['id'];
        $tweet_id = $_POST['delete-tweet'];
        
        global $db;
        $query_tweet = $db->prepare('DELETE FROM tweets WHERE id = :id AND user_id = :user_id');
        $query_tweet->bindParam(':id', $tweet_id, PDO::PARAM_INT);
        $query_tweet->bindParam(':user_id', $user_id);
        $query_tweet->execute();
    }

    function modifyTweet($tweet_id, $tweet_text) {
         global $db;
         $query_tweet = $db->prepare('UPDATE tweets SET tweet = :tweet_text WHERE id = :tweet_id');
         $query_tweet->bindParam(':tweet_text', $tweet_text);
         $query_tweet->bindParam(':tweet_id', $tweet_id, PDO::PARAM_INT);
         $query_tweet->execute();
    }

    function getTweetText($tweet_id) {
        global $db;
        $query_tweet = $db->prepare('SELECT tweet FROM tweets WHERE id = :tweet_id');
        $query_tweet->bindParam(':tweet_id', $tweet_id, PDO::PARAM_INT);
        $query_tweet->execute();
        return $query_tweet->fetchColumn();
    }

    function sendEmail($email) {
        $mail = new PHPMailer(true);

        $token = getNewToken(64);

        saveToken();

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //muestra el resultado de la ejecución
            $mail->isSMTP(); //usa el protocolo SMTP
            $mail->Host = 'smtp.educa.madrid.org'; //Set the SMTP server to send through
            $mail->SMTPAuth = false; //Educamadrid no utiliza auth
            $mail->Username = 'alvaro.barasonagismero@educa.madrid.org'; //SMTP username
            $mail->Password = 'secret'; //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $mail->Port = 587;

            $mail->Charset = 'utf-8';
        
            //Recipients
            $mail->setFrom('alvaro.barasonagismero@educa.madrid.org', 'Minitwitter');
            $mail->addAddress($email, 'example'); //Add a recipient
        
            //Content
            $mail->Subject = 'Recuperación de contraseña';
            $mail->Body = 'Para recuperar la contraseña <b>pincha aquí</b>';
        
            $mail->send();
            echo 'El mensaje se ha enviado correctamente';
        } catch (Exception $e) {
            echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
        }
    }

    function emailExists($email) {
        global $db;
        $email_query = $db->prepare('SELECT email FROM users WHERE email = :email');
        $email_query->bindParam(':email', $email);
        $email_query->execute();
        return $email_query->fetchColumn() ? true : false;
    }
?>