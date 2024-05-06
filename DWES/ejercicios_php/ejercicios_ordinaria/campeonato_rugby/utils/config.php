<?php
    define("NAME_ERROR", "empty-name");
    define("SPAIN_SCORE_EMPTY_ERROR", "empty-spain-score");
    define("SPAIN_LOW_SCORE_ERROR", "spain_low_score");
    define("RIVAL_SCORE_EMPTY_ERROR", "empty-rival-score");
    define("RIVAL_LOW_SCORE_ERROR", "rival_low_score");
    define("RIVAL_NAME", "country-name");
    define("SPAIN", "spain-score");
    define('RIVAL', 'rival-score');
    define("SCORE_LIMIT", 0);

    //db conection
    define("HOST", "localhost");
    define("DB_NAME", "rugby");
    define("USER", "rugby");
    define("PASSWORD", "1312");

    //pagination
    define("PAGES_PER_PAGE", 4);

    function is_valid_data($data) {

        return isset($data) && $data !== "" ? true : false;
    }

    function show_error($error) {

        global $errors_array;

        if(isset($errors_array[$error])) {

            echo "<span class='error'>$errors_array[$error]</span>";
        }
    }

    function get_value($input_name) {

        echo is_valid_data($_POST[$input_name]) ? $_POST[$input_name] : "";
    }

    function get_checked_option($select_name, $option_value) {

        echo is_valid_data($_POST[$select_name]) && $_POST[$select_name] === $option_value ? "selected" : "";
    }

    function show_pages($current_page, $pages_number) {

        echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";
        for($i = 1; $i <= $pages_number; $i++) {
            
            echo "<a href='?page= $i'>$i</a>";
        }
        echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a>";
    }
?>