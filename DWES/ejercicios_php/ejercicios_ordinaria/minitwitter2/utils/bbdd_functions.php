<?php
    //LOGICA BASE DE DATOS

    /**
     * OBTENER EL NÚMERO DE FILAS DE UNA TABLA
     * 
     * Esta función recibe por parámetro un string
     * del nombre de una tabla(Tiene que
     * ser idéntico a como está en la BBDD).
     * 
     * Devuelve un int del número de elementos totales
     * en la tabla.
     * 
     * @param string $table_name
     * @return int
    */
    function getRowsNumber($table_name) {
        global $db;
        $query = "SELECT COUNT(*) FROM $table_name";
        $db->ejecuta($query);
        return $total_rows_number = $db->obtenDatos()['COUNT(*)'];
    }

    /**
     * SABER SI UNA TABLA ESTÁ VACÍA
     * 
     * Esta función recibe por parámetro un string
     * del nombre de una tabla(Tiene que
     * ser idéntico a como está en la BBDD).
     * 
     * Devuelve True si la tabla está vacía,
     * y false si tiene alguna fila.
     * 
     * @param string $table_name
     * @return boolean
     */
    function tableIsEmpty($table_name) {
        return getRowsNumber($table_name) === 0 ? true : false;
    }

    /**
     * OBTENER FILA DE UNA TABLA
     * 
     * Esta función recibe como primer parámetro un string
     * del nombre de una tabla(Tiene que
     * ser idéntico a como está en la BBDD), como segundo
     * parámetro el nombre del id(Tiene que ser idéntico a como
     * está en la BBDD), y como tercer parámetro un int
     * que corresponde al id de fila.
     * 
     * Devuelve un array con los valores de la fila
     * 
     * @param string $table_name
     * @param string $id_name
     * @param int $id
     * @return array
     */
    function getRowForId($table_name, $id_name, $id) {
        global $db;
        $query = "SELECT * FROM $table_name WHERE $id_name = :$id_name";
        $db->ejecuta($query, $id);
        return $db->obtenDatos();
    }
    
    /**
     * OBTENER EL VALOR DE LA COLUMNA DE UNA FILA
     * 
     * Esta función recibe como primer parámetro un string
     * del nombre de una tabla(Tiene que
     * ser idéntico a como está en la BBDD), como segundo
     * parámetro el nombre del id(Tiene que ser idéntico a como
     * está en la BBDD), como tercer parámetro un int
     * que corresponde al id de fila, y como cuarto parámetro
     * el nombre de la columna de la que se desea obtener
     * el dato(Tiene que ser idéntico a como está en la BBDD).
     * 
     * Devuelve el valor de la columna de esa fila concreta.
     * Si es la BBDD es un VARCHAR, devuelve un string, si
     * es un INT, devolverá un int, y si es BOOLEAN devolverá
     * int(0) si es false e int(1) si es true.
     * 
     * @param string $table_name
     * @param string $id_name
     * @param int $id
     * @param string $column_name
     * @return mixed
     */
    function getValueOfColumnRow($table_name, $id_name, $id, $column_name) {
        return getRowForId($table_name, $id_name, $id)[$column_name];
    }

    /**
     * OBTENER RESULTADO DE UNA SELECT
     * 
     * Esta función recibe como primer parámetro una sentencia
     * SELECT, y un número indefinido de parámetros que serán los
     * nombres de las columnas de la tabla que se desea obtener datos.
     * 
     * Devuelve un array con el resultado de la query
     * 
     * @params string $query
     * @params string $params
     * @return array
     */
    function obtainQuery($query, ...$params) {
        global $db;
        if(count($params) === 0) {
            $db->ejecuta($query);
        } else {
            $db->ejecuta($query, $params);
        }
        return $db->obtenDatos();
    }

    /**
     * OBTENER TODAS LAS FILAS DE UNA TABLA
     * 
     * Esta función recibe como primer parámetro un string
     * del nombre de una tabla(Tiene que
     * ser idéntico a como está en la BBDD)
     * 
     * Devuelve un array con todas las filas de la tabla
     * 
     * @param string $table_name
     * @return array
     */
    function getAllRows($table_name) {
        global $db;
        $query = "SELECT * FROM $table_name";
        $db->ejecuta($query);
        return $db->obtenDatos();
    }

    /**
     * OBTENER NÚMERO DE PÁGINA
     * 
     * Esta función obtiene el número de página de la url.
     * 
     * Devuelve el número de la pagina, y si no está inicializada,
     * la inicializa a 1
     * 
     * @return int
     */
    function page(){
        return isset($_GET['page']) ? (int)$_GET['page'] : 1;
    }

    /**
     * PAGINACION PARA TODA LA TABLA
     * 
     * Construye la paginacion en funcion de los datos que se obtienen de la BDD y calcula el numero de paginas con el numero de elementos por pagina
     * 
     * @params $table_name Nombre de la tabla
     * @params $rows_per_page Numero de elementos por pagina
     */
    function show_pages_all($table_name, $rows_per_page){

        $current_page = page();
        
        $pages_number = getRowsNumber($table_name) / $rows_per_page;
        
        echo "<a href='?page=" . (1) . "'><<</a> "; 
        echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";

        for($i = 1; $i <= $pages_number; $i++) {
            echo "<a href='?page=$i'>$i</a>";
        }

        echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a> ";
        echo "<a href='?page=" . ($pages_number) . "'>>></a>";
    }

    /**
     * PAGINACION CON QUERY
     * 
     * Construye cuna paginacion en funcion del numero de paginas que se le pasen para crear
     * 
     * @param $pages_number Numero de paginas a crear
     * 
     */
    function show_pages_query($rows_per_page, $query){
        global $db;
        $current_page = page();
        $num_elementos = $db->obtenDatos($db->ejecuta($query));
        $pages_number = $num_elementos["COUNT(*)"]/$rows_per_page;

        if($pages_number > 1){
        echo "<a href='?page=" . (1) . "'><<</a> "; 
        echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";

        for($i = 1; $i <= $pages_number; $i++) {
            echo "<a href='?page=$i'>$i</a>";
        }

        echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a> ";
        echo "<a href='?page=" . ($pages_number) . "'>>></a>";
    }
    }

    /**
     * PAGINACION SIMPLE
     * 
     * Funcion que obtiene la pagina actual en la que estas para mostrar los datos de esa pagina y con el numero de paginas que le pases construye la paginacion.
     * 
     * @param $pages_number
     * 
     */
    function show_pages($pages_number){
        $current_page = page();
        echo "<a href='?page=" . (1) . "'><<</a> "; 
        echo "<a href='?page=" . ($current_page == 1 ? $pages_number : $current_page - 1) . "'><</a>";

        for($i = 1; $i <= $pages_number; $i++) {
            echo "<a href='?page=$i'>$i</a>";
        }

        echo "<a href='?page=" . ($current_page == $pages_number ? 1 : $current_page + 1) . "'>></a> ";
        echo "<a href='?page=" . ($pages_number) . "'>>></a>";
    }

    /**
     * COMPROBAR SI EL USUARIO EXISTE
     * 
     * 
     */
    function userExists($query, $user_name, $password = null, $password_name = null) {
        $user = obtainQuery($query, $user_name);
        if($password == null && $password_name == null) {
            return $user ? true : false;
        } else {
            return $user && password_verify($password, $user[$password_name]) ? true : false;
        }
    }

    /**
     * OBTENER TOKEN
     * 
     * Esta función recibe como parámetro un int de la longitud de token.
     * 
     * Devuelve un string del 
     */
    function getNewToken($token_length) {
        return bin2hex(openssl_random_pseudo_bytes($token_length));
    }

    /**
     * DESTRUIR COOKIE
     */
    function destroyCookie($cookie_name) {
        setcookie($cookie_name, '', time() - 3600, '/');
        unset($_COOKIE[$cookie_name]);
    }

    function logoutFunction($query_consume_token, $button_name, $remember_cookie_name, $redirect_path) {
        if(isPostMethod() && buttonExists($button_name)) {
            session_destroy();
            if(isset($_COOKIE)) {
                //$db->ejecuta($query_consume_token, $_COOKIE[$remember_cookie_name]);
                destroyCookie($remember_cookie_name);
            }
            redirect($redirect_path);
        }
    }

    function userLogin(&$errors_array, $key_error, $user_query, $name_input, $password_input, $password_column, $redirect_path) {
        if(empty($errors_array)) {
            $user_name = $_POST[$name_input];
            $user_password = $_POST[$password_input];
            if(userExists($user_query, $user_name, $user_password, $password_column)) {
                $user_data = obtainQuery($user_query, $user_name);
                
                $_SESSION['user'] = $user_data;

                redirect($redirect_path);
            } else {
                $errors_array[$key_error] = 'Usuario o contraseña incorrectos';
            }
        }
    }

    function userLoginWhitRemember(&$errors_array, $key_error, $user_query, $name_input, $password_input, $password_column, $redirect_path, $session_name, $insert_token_query, $remember_input, $token_length, $token_expiration, $assocc_user_id, $remember_cookie_name) {
        if(empty($errors_array)) {
            $user_name = $_POST[$name_input];
            $user_password = $_POST[$password_input];
            if(userExists($user_query, $user_name, $user_password, $password_column)) {
                $user_data = obtainQuery($user_query, $user_name);
                
                $_SESSION[$session_name] = $user_data;
              
                if(isset($_POST[$remembre_input])) {
                    $remember_token = getNewToken($token_length);
                    var_dump($remember_token);
                    $time_to_expire = time() + $token_expiration;
                    $db->ejecuta($insert_token_query, $remember_token, $user_data[$assocc_user_id], date('Y-m-d H:i:s', $time_to_expire));
                    setcookie($remember_cookie_name, $remember_token, $time_to_expire, '/');
                }
                 
                redirect($redirect_path);
            } else {
                $errors_array[$key_error] = 'Usuario o contraseña incorrectos';
            }
        }
    }

    function setSession($session_name, $remember_cookie_name, $token_query, $column_date, $column_consumed, $column_user_id, $user_query, $redirect_path) {
        if(!isset($_SESSION[$session_name])) {
            if(isset($_COOKIE[$remember_cookie_name])) {
                global $db;
                $cookie_token = $_COOKIE[$remember_cookie_name];
                $db_token = obtainQuery($token_query, $cookie_token);

                if($db_token[$column_date] > getCurrentDate() && !$db_token[$column_consumed]) {
                    $user_id = $db_token[$column_user_id];
                    $user = obtainQuery($user_query, $user_id);
                    $_SESSION[$session_name] = $user;
                }
            } else {
                redirect($redirect_path);
            }
        }
    }
?>