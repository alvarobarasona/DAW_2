<?php
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

    function printList($array) {
        foreach($array as $value) {
            $info = "";
            foreach($value as $key => $data) {
                $info .= " | $key:$data | ";
            }
            echo "<p>$info</p>";
        }
    }

    function redirect($path, $params = null) {
        if($params != null) {
            $acc = 1;
            $path .= '?';
            foreach($params as $key => $value) { 
                if($acc < count($params)) {
                    $path .= "$key=$value&";
                } else {
                    $path .= "$key=$value";
                }
                $acc++;
            }
        }
        header("Location: $path");
        die();
    }

    function getLinkList($array, $path) {
        
        foreach($array as $data) {
            $acc = 1;
            $complete_path = "$path?";
            foreach($data as $key => $value) {
                if($acc < count($data)) {
                    $complete_path .= "$key=$value&";
                } else {
                    $complete_path .= "$key=$value";
                }
                $acc++;
            }
            echo "<li><a href='$complete_path'>Recuperar contraseña</a></li>";
        }
    }

    function getUrlParams(...$params) {
        $obtained_params = [];
        foreach($params as $param) {
           $obtained_params[$param] = $_GET[$param];
        }
        return $obtained_params;
    }
?>