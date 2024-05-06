<?php
    /*
        Resultados de Rugby - PHP
        Página para introducir resultados de rugby de la selección Española. Un resultado tiene:

        País
        Victoria|Empate|Derrota
        Resultado
        Estará paginado y permitirá ordenar
    */

    require("utils/validations.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Campeonato rugby</title>
        <style>
            .error {
                color: red;
            }
        </style>
    </head>
    <body>
        <h1>Campeonato de rugby</h1>
        <form action="index.php" method="post">
            <div>
                <label for="country-name-input">Nombre país:</label>
                <input type="text" name="country-name" id="country-name-input" placeholder="Inroduce un país..." value="<?php get_value(RIVAL_NAME); ?>">
                <?php show_error(NAME_ERROR); ?>
            </div>
            <div>
                <label for="result-select">Resultado:</label>
                <select name="result" id="result-select">
                    <option value="win" <?php get_checked_option("result", "win"); ?>>Victoria</option>
                    <option value="tie" <?php get_checked_option("result", "tie"); ?>>Empate</option>
                    <option value="lose" <?php get_checked_option("result", "lose"); ?>>Derrota</option>
                </select>
            </div>
            <div>
                <label for="spain-score-input">Puntuación de España:</label>
                <input type="number" name="spain-score" id="spain-score-input" value="<?php get_value(SPAIN); ?>">
                <?php show_error(SPAIN_SCORE_EMPTY_ERROR); ?>
                <?php show_error(SPAIN_LOW_SCORE_ERROR); ?>
            </div>
            <div>
                <label for="rival-score-input">Puntuación del rival:</label>
                <input type="number" name="rival-score" id="rival-score-input" value="<?php get_value(RIVAL); ?>">
                <?php show_error(RIVAL_SCORE_EMPTY_ERROR); ?>
                <?php show_error(RIVAL_LOW_SCORE_ERROR); ?>
            </div>
            <button type="submit" name="submit-button">Enviar</button>
        </form>
        <?php include_once("exit.php"); ?>
    </body>
</html>