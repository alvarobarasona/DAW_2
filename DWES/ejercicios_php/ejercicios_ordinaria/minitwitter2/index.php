<?php

    require_once('utils/init.php');

    $token_query = 'SELECT * FROM tokens WHERE token = :token';

    $user_query = 'SELECT * FROM users WHERE id = :user_id';

    setSession('user', 'remember_cookie', $token_query, 'fecha', 'consumido', 'user_id', $user_query, 'login.php');

    if(isPostMethod() && buttonExists('logout-button')) {
        $query_consume_token = 'UPDATE FROM tokens SET consumido = 1 WHERE token = :token';
        logoutFunction($query_consume_token, 'logout-button', 'remember_cookie', 'login.php');
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minitwitter - Inicio</title>
        <style>
            .img {
                width: 80px;
                height: 80px;
                border-radius: 50%;
                overflow: hidden;
            }
            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .tweet {
                background-color: gray;
                padding: 20px;
                margin-bottom: 30px;
            }
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Minitwitter</h1>
        <h2>Bienvenid@ <?= $_SESSION['user']['username']; ?></h2>
        <h3>Tweets</h3>
        <form action="" method="post">
            <textarea name="tweet-input" placeholder="Escribe un tweet..."></textarea>
            <button type="submit" name="add-tweet">Enviar</button>
            <?php showError('empty-tweet', $index_errors); ?>
        </form>
        <form action="" method="post">
            <button type="submit" name="private-button">Perfil</button>
            <button type="submit" name="logout-button">Cerrar sesión</button>
        </form>
    </body>
</html>