<?php
    require_once('utils/init.php');

    setSession();
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
        <?php foreach(showTweets() as $tweet) : ?>
            <div class="tweet">
                <div class="img">
                    <img src="media/<?= $tweet['foto']; ?>" alt="<?= $tweet['username'] ?>">
                </div>
                <span><?= $tweet['username']; ?></span>
                <p><?= $tweet['tweet']; ?></p>
                <p><?= $tweet['fecha']; ?></p>
            </div>
        <?php endforeach; ?>
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