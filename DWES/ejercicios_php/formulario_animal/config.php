<?php
    /**
     * DEFAULT_PAGE guarda el número de la página de la paginación por defecto.
     */
    define("DEFAULT_PAGE", 1);
    /**
     * PAGINATION_ROWS define el número de filas que se mostrará en cada página mediante la paginación.
     */
    define("PAGINATION_ROWS", 4);
    /**
     * PAGINATION_DIFFERENCE define la diferencia a la hora de calcular el :offset para la paginación.
     */
    define("PAGINATION_DIFFERENCE", 1);
    /**
     * POSITION_COUNT define la posición en el array asociativo devuelto despúes de haber aplicado la función fetch() a $count_rows.
     */
    define("POSITION_COUNT", 0);
    /**
     * HREF_NAME define el nombre de la página de redirección del href.
     */
    define("HREF_NAME", "page");
    /**
     * $page guarda el número de la página actual para realizar la paginación de los elementos de la base de datos.
     */
    $page = isset($_GET["page"]) ? (int)$_GET["page"] : DEFAULT_PAGE;
    /**
     * $select guarda todas las filas en formato sql que haya en la base de datos.
     * 
     * :offset indica a partir de que fila se empiezan a devolver los datos de la base de datos, mientras que :max_limit indica el numero máximo de filas que se devolverán de la base de datos.
     * 
     * Ej: :offset = 4      max_limit = 10
     * (la query devolvera a partir de la cuarta fila un máximo de diez filas.)
     */
    $select = $db->prepare("SELECT * FROM animales LIMIT :offset, :max_limit");
    /**
     * Relaciona la variable :offset de la query con el cálculo de la fila a partir de la que se muestran los datos en la BBDD.
     */
    $select->bindValue(":offset", PAGINATION_ROWS * ($page - PAGINATION_DIFFERENCE), PDO::PARAM_INT);
    /**
     * Relaciona la variable :max_limit de la query con el número máximo de filas que se mostrarán en cada página con la paginación
     */
    $select->bindValue(":max_limit", PAGINATION_ROWS, PDO::PARAM_INT);
    /**
     * Ejecuta la query de $select una vez se le han relacionado las variables de ésta con valores reales.
     */
    $select->execute();
    /**
     * $rows convierte el formato sql de $select en un array asociativo.
     */
    $rows = $select->fetchAll(PDO::FETCH_ASSOC);
    /**
     * $count_rows obtiene un objeto PDO necesario para obtener el número de filas en la BBDD.
     */
    $count_rows = $db->query("SELECT COUNT(*) FROM animales");
    /**
     * $total_rows guarda el número entero total de filas en la BBDD después de convertir el objeto PDO.
     */
    $total_rows = $count_rows->fetch();
    /**
     * $pages_number obtiene el número total de páginas disponibles para paginar.
     */
    $pages_number = ceil($total_rows[POSITION_COUNT] / PAGINATION_ROWS);
?>