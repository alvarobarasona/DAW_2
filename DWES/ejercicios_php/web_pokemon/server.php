<?php
    function connect_db() {
        $mysqli = new mysqli("localhost", "root", "root", "pokemon", 3306);

        if($mysqli-> connect_errno) {
            echo "Fallo al conectar con MySQL: $mysqli-> connect_errno | $mysqli-> connect_error";
        }
        return $mysqli;
    }
    

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_URI"] == "/ejercicios_php/web_pokemon/insertdata") {

        $data = $_POST;

        if(isset($data["name"]) && isset($data["type"]) && isset($data["sex"])) {
            header('HTTP/1.1 200 OK');
            header('Content-Type: application/json');
            // echo json_encode([
            //     "Message"=> "Datos recibidos",
            //     "Nombre"=> $data["name"],
            //     "Tipo"=> $data["type"],
            //     "Sexo"=> $data["sex"]
            // ]);

            insert($data);

            header("Location: index.php");
            exit();
        }
    } else if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_URI"] == "/ejercicios_php/web_pokemon/deletedata") {

        $mysqli = connect_db();

        if(isset($_POST['checklist'])) {

            $values = implode(",", $_POST['checklist']);

            $query = "DELETE FROM pokemon WHERE id IN ($values)";

            if($mysqli-> query($query) === TRUE) {
                echo "Datos eliminados correctamente";
            } else {
                echo "Error {$mysqli-> error}";
            }

            $mysqli-> close();

            header("Location: index.php");
            exit();
        }
    } else if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_URI"] == "/ejercicios_php/web_pokemon/modifydata") {

        $data = $_POST;

        if(isset($data["name"]) && isset($data["type"]) && isset($data["sex"])) {
            header('HTTP/1.1 200 OK');
            header('Content-Type: application/json');

            $mysqli = connect_db();

            $name = $data["name"];
            $type = $data["type"];
            $sex = $data["sex"];
            $date = date('Y-m-d H:i:s');

            $query = "UPDATE pokemon SET name = '" . $name . "', type = '" . $type . "', sex = '" . $sex . "', timestamp = '" . $date . "' WHERE id = '" . $data['modify'] . "'";

            if($mysqli-> query($query) === TRUE) {
                echo "Datos insertados correctamente";
            } else {
                echo "Error {$mysqli-> error}";
            }
    
            $mysqli-> close();

            header("Location: index.php");
            exit();
        }
    }

    function insert($data) {

        $mysqli = connect_db();

        $name = $data["name"];
        $type = $data["type"];
        $sex = $data["sex"];
        $date = date('Y-m-d H:i:s');

        $query = "INSERT INTO pokemon (name, type, sex, timestamp) VALUES ('$name', '$type', '$sex', '$date')";

        if($mysqli-> query($query) === TRUE) {
            echo "Datos insertados correctamente";
        } else {
            echo "Error {$mysqli-> error}";
        }

        $mysqli-> close();
    }

    function get_total_pages() {

        $mysqli = connect_db();

        $query = "SELECT COUNT(*) AS total_rows FROM pokemon";

        $total_rows = $mysqli-> query($query);

        if($total_rows) {
            // echo "Datos insertados correctamente";

            foreach($total_rows as $row) {
                
                $total_pages = ceil($row['total_rows'] / 5);

                return $total_pages;
            };
        } else {
            echo "Error {$mysqli-> error}";
        }
    }

    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_SERVER["REQUEST_URI"] == "/ejercicios_php/web_pokemon/" && isset($_POST['pagebutton'])) {

        if(isset($_POST['page'])) {

            if(!isset($_SESSION['page'])) {
                $_SESSION['page'] = 1;
            } else {

                $_SESSION['page'] = $_POST['page'];
            }
        }
    }

    $id_row = ($_SESSION['page'] - 1) * 5;

    $mysqli = connect_db();
    $query = "SELECT * FROM pokemon LIMIT 5 OFFSET ". $id_row;
    $data = $mysqli-> query($query);
    $mysqli-> close();
?>