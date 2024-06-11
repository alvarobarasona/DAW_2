<?php
    require_once('utils/init.php');

    setSession();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minitwitter - Perfil</title>
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
        <h2>Perfil de <?= $_SESSION['user']['username']; ?></h2>
        <h3>Tus tweets</h3>
        <?php foreach(showTweets($_SESSION['user']['id']) as $tweet) : ?>
            <div class="tweet">
                <div class="img">
                    <img src="media/<?= $_SESSION['user']['foto']; ?>" alt="<?= $tweet['username'] ?>">
                </div>
                <span><?= $_SESSION['user']['username']; ?></span>
                <p><?= $tweet['tweet']; ?></p>
                <p><?= $tweet['fecha']; ?></p>
                <form action="" method="post">
                    <button type="submit" name="delete-tweet" value="<?= $tweet['id'] ?>">Eliminar</button>
                    <button type="submit" name="modify-redirect" value="<?= $tweet['id'] ?>">Modificar</button>
                </form>
            </div>
        <?php endforeach; ?>
        <form action="" method="post">
            <button type="submit" name="index-button">Inicio</button>
            <button type="submit" name="logout-button">Cerrar sesión</button>
        </form>
    </body>
</html>