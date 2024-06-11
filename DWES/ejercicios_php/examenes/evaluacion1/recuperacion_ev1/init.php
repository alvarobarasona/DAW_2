<?php
    function read($file_path){
        $file_info = pathinfo($file_path);

        $extension = isset($file_info['extension']) ? strtolower($file_info['extension']) : '';

        switch ($extension) {
            case 'dat':
                $dat_file = file($file_path, FILE_IGNORE_NEW_LINES);
                return $dat_file;
                break;

            case 'csv':
                $csv_file = fopen($file_path, "r");

                if ($csv_file) {
                    $csv_array = [];
                    while ($row = fgets($csv_file)) {
                        array_push($csv_array, trim($row));
                    }
                    fclose($csv_file);

                    for ($i = 0; $i < count($csv_array); $i++) {
                        $csv_array[$i] = explode(";", $csv_array[$i]);
                    }
                    return $csv_array;
                }
                break;
            case 'json':
                $json_array = json_decode(file_get_contents($file_path), true);
                return $json_array;
                break;
        }
    }

    function printDataTable($data_array, $titles_array) {
        echo '<table>';
            echo '<thead>';
                echo '<tr>';
                    for($th = 0; $th < count($titles_array); $th++) {
                        echo "<th>$titles_array[$th]</th>";
                    }
                echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
                for($row = 0; $row < count($data_array); $row++) {   
                    echo '<tr>';
                        for($td = 0; $td < count($titles_array); $td++) {
                            echo "<td>{$data_array[$row][$td]}</td>";
                        }
                    echo '</tr>';
                }
            echo '</tbody>';
        echo '</table>';
    }

    spl_autoload_register(function ($class) {
        require("$class.php");
    });
?>