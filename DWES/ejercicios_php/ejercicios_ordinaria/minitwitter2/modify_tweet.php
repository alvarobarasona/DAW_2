<?php
    require_once('utils/init.php');

    setSession();
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Minitwitter - Modificar tweet</title>
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
        <h1>Modificar tweet</h1>
        <form action="" method="post">
            <textarea name="tweet-input" placeholder="Modifica el tweet..."><?= getTweetText($tweet_id); ?></textarea>
            <button type="submit" name="modify-tweet">Modificar</button>
            <button type="submit" name="cancel-modify">Cancelar</button>
            <?php showError('empty-tweet', $modify_tweet_errors); ?>
        </form>
    </body>
</html>