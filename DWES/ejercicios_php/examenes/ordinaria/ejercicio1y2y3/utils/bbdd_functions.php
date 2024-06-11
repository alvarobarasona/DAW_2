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

    function redirect($path) {
        header("Location: $path");
        die();
    }

    /**
     * Esta función que obtiene el número de página de la url.
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
 * Funcion que obtiene la pagina actual en la que estas para mostrar los datos de esa pagina y calcula el numero de paginas en funcion de los datos que contenga la tabla que le pasas y el numero de elementos por pagina.
 * 
 * @params $table_name
 * @params $rows_per_page
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
?>