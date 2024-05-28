<?php
    require_once('utils/init.php');

    setSession();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minitwitter - Perfil</title>
        <style>
            img {
                width: 80px;
                border-radius: 50%;
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
        <h2>Tweets</h2>
        <?php foreach(showTweets() as $tweet) : ?>
            <div class="tweet">
                <img src="media/<?= $tweet['foto'] ?>" alt="<?= $tweet['username'] ?>">
                <span><?= $tweet['username'] ?></span>
                <p><?= $tweet['tweet'] ?></p>
                <p><?= $tweet['fecha'] ?></p>
            </div>
        <?php endforeach; ?>
        <form action="" method="post">
            <textarea name="tweet-input" placeholder="Escribe un tweet..."></textarea>
            <button type="submit" name="add-tweet">Enviar</button>
            <?php showError('empty-tweet', $index_errors); ?>
        </form>
        <form action="" method="post">
            <button type="submit" name="logout-button">Cerrar sesión</button>
        </form>
    </body>
</html>