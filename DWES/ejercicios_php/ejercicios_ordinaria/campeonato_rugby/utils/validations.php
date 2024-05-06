<?php
    require("config.php");
    require("db.php");

    $errors_array = [];

    if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit-button"])) {

        if(!is_valid_data($_POST[RIVAL_NAME])) {

            $errors_array[NAME_ERROR] = "El campo del nombre del país no puede estar vacío";
        }

        if(!is_valid_data($_POST[SPAIN])) {

            $errors_array[SPAIN_SCORE_EMPTY_ERROR] = "El campo de la puntuación de España no puede estar vacío";
        } else {

            if($_POST[SPAIN] < SCORE_LIMIT) {

                $errors_array[SPAIN_LOW_SCORE_ERROR] = "La puntuación de España no puede ser menor que " . SCORE_LIMIT;
            }
        }

        if(!is_valid_data($_POST[RIVAL])) {

            $errors_array[RIVAL_SCORE_EMPTY_ERROR] = "El campo de la puntuación del equipo rival no puede estar vacío";
        } else {

            if($_POST[RIVAL] < SCORE_LIMIT) {

                $errors_array[RIVAL_LOW_SCORE_ERROR] = "La puntuación del equipo rival no puede ser menor que " . SCORE_LIMIT;
            }
        }

        if(empty($errors_array)) {

            $rival_country = $_POST["country-name"];
            $result = $_POST["result"];
            $score = "{$_POST[SPAIN]}-{$_POST[RIVAL]}";

            $insert = $db->prepare("INSERT INTO matches (country, result, score) VALUES (:country, :result, :score)");

            $insert->execute([
                ":country"=>$rival_country,
                ":result"=>$result,
                ":score"=>$score
            ]);
        }
    }
?>