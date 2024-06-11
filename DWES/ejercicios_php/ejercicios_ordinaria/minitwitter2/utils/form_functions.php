<?php
    // LÓGICA FORMULARIOS

    /**
     * COMPROBAR SI EL MÉTODO ES POST
     * 
     * Esta función comprueba si el método HTTP usado es POST.
     * 
     * Devuelve true si lo es y false si no lo es.
     * 
     * @return boolean
     */
    function isPostMethod() {
        return $_SERVER['REQUEST_METHOD'] === 'POST' ? true : false;
    }

    /**
     * COMPROBAR SI EXISTE UN BOTÓN
     * 
     * Esta función recibe por parámetro el valor del atributo name
     * del botón pulsado y comprueba si éste está declarado y es distinto
     * de null.
     * 
     * Si existe devuelve true, y si no devuelve false.
     * 
     * @param string $button_name
     * @return boolean
     */
    function buttonExists($button_name) {
        return isset($_POST[$button_name]) ? true : false;
    }

    /**
     * SABER SI UN DATO DE UN FORMULARIO ES VÁLIDO
     * 
     * Esta función recibe por parámetro una cadena que
     * será el valor del atributo name del input a comprobar.
     * 
     * Si está declarada, es distinto de null y distinto a un
     * string vacío, devuelve true. Si no cumple algunas de estas
     * características, devolverá false.
     * 
     * @param string $data
     * @return boolean
     */
    function isValidData($data) {
        return isset($_POST[$data]) && $_POST[$data] !== "" ? true : false;
    }

    /**
     * MOSTRAR ERRORES EN UN INPUT
     * 
     * Esta función recibe por parámetro un array de errores,
     * y como segundo parámetro recibe el nombre del error.
     * 
     * Imprime el texto del error en un span con la clase error.
     * 
     * @param array $errors_array
     * @param string $error_key
     * 
     * @return void
     */
    function showError($errors_array, $error_key) {
        $errors_array;
        if(isset($errors_array[$error_key])) {
            echo "<span class='error'>{$errors_array[$error_key]}</span>";
        }
    }

    /**
     * PERSISTENCIA DE INPUTS DE TEXTO, NUMÉRICOS, DE FECHA Y PASSWORD
     * 
     * Esta función recibe por parámetro una cadena que
     * será el valor del atributo name del input que se 
     * desee hacer la persistencia.
     * 
     * Si la función post está declarada y es distinto de null imprime
     * su valor al usarse esta función dentro de la etiqueta value
     * del input. Si no está declarada o es null, imprime una cadena vacía.
     * 
     * @param string $name
     * @return void
     * 
     */
    function showValue($name) {
        echo isset($_POST[$name]) ? $_POST[$name] : "";
    }

    /**
     * PERSISTENCIA EN ETIQUETAS SELECT
     * 
     * (Se tiene que usar en la etiqueta option)
     * 
     * Esta función recibe por parámetro una cadena que
     * será el valor del atributo name del input que se 
     * desee hacer la persistencia, y como segundo parámetro
     * el valor del método post con el que compara que opción
     * es la que está seleccionada mediante el valor del atributo
     * value de la etiqueta option.
     * 
     * Si está declarada la función post y es distinto de null, y
     * además el valor de la función post es igual al valor que se
     * le pasa como segundo parámetro, devuelve la cadena selected, si no,
     * devuelve una cadena vacía.
     * 
     * @param string $name
     * @param string $value
     * 
     * @return string
     */
    function showSelect($name, $value) {
        return isset($_POST[$name]) && $_POST[$name] == $value ? "selected" : "";
    }

    /**
     * PERSISTENCIA EN INPUTS CHECKBOX
     * 
     * (Se tiene que usar dentro de la etiqueta input)
     * 
     * Esta función recibe como primer parámetro una cadena que
     * será el valor del atributo name(En la etiqueta tiene que estar
     * con [] para indicar que es un array, PERO AL PASARLE EN NOMBRE
     * DEL NAME POR PARÁMETRO TIENE QUE SER SI []. Ej:
     * 
     * En el atributo name:
     * 
     * name="ejemplo[]"
     * 
     * al pasarlo por parámetro:
     * 
     * showCheckedOption('ejemplo', 'valor')) del
     * input que se desee hacer la persistencia.
     * Como segundo parámetro se le pasa el valor del atributo
     * value, que comprobará si se encuentra en el array que se
     * le pasa como primer parámetro.
     * 
     * Si está declarada la función post y es distinto de null, y
     * además el valor se encuentra en el array, devuelve la cadena
     * 'ckecked', si no, devuelve una cadena vacía.
     * 
     * @param string $name
     * @param string $value
     * @return string
     */
    function showCheckedOption($name, $value) {
        return isset($_POST[$name]) && in_array($value, $_POST[$name]) ? "checked" : "";
    }

    /**
     * CAPTURAR ERROR DE INPUT DE TEXT, NUMÉRICO Y DE FECHA VACÍOS
     * 
     * Esta función recibe como primer parámetro un array de errores,
     * como segundo parámetro una cadena que se le pasa como clave al
     * array de errores, y como tercer parámetro el valor del atributo
     * name del input.
     * 
     * Si el valor del input no es válido, introduce el mensaje de error
     * en el array de errores.
     * 
     * @param array $errors_array
     * @param string $error_key
     * @param string $name_input
     * @return void
     */
    function catchEmptyError(&$errors_array, $error_key, $name_input) {
        if(!isValidData($name_input)) {
            $errors_array[$error_key] = "El campo $name_input es obligatorio.";
        }
    }

    /**
     * CAPTURAR ERROR FECHA ANTERIOR A LA ACTUAL
     * 
     * Esta función recibe como primer parámetro un array de errores,
     * como segundo parámetro una cadena que se le pasa como clave al
     * array de errores, y como tercer parámetro el valor del atributo
     * name del input de fecha.
     * 
     * Si la fecha introducida en el formulario es menor que la fecha actual
     * y además es distinta de una cadena vacía, introduce el mensaje de error
     * en el array de errores.
     * 
     * @param array $errors_array
     * @param string $error_key
     * @param string $name_input
     * @return void
     */
    function catchDateError(&$errors_array, $error_key, $name_input) {
        $current_date = getCurrentDate();
        if($_POST[$name_input] < $current_date && $_POST[$name_input] !== "") {
            $errors_array[$error_key] = "La fecha debe ser posterior a hoy.";
        }
    }

    /**
     * CAPTURAR ERROR DE INPUT NUMÉRICO DE UNA CANTIDAD MENOR O IGUAL A 0
     * 
     * Esta función recibe como primer parámetro un array de errores,
     * como segundo parámetro una cadena que se le pasa como clave al
     * array de errores, y como tercer parámetro el valor del atributo
     * name del input numérico.
     * 
     * Si la cantidad introducida en el formulario es menor que 1,
     * introduce el mensaje de error en el array de errores.
     * 
     * @param array $errors_array
     * @param string $error_key
     * @param string $name_input
     * @return void
     */
    function catchAmountError(&$errors_array, $error_key, $name_input) {
        if($_POST[$name_input] < 1) {
            $errors_array[$error_key] = 'Debe ser al menos 1 unidad';
        }
    }

    /**
     * CAPTURAR ERROR DE INPUT NUMÉRICO DE EXCEDIMIENTO DE STOCK
     * 
     * Esta función recibe como primer parámetro un array de errores,
     * como segundo parámetro una cadena que se le pasa como clave al
     * array de errores, como tercer parámetro el valor del atributo
     * name del input numérico, y como cuarto parámetro un int que es
     * la cantidad de stock disponible en la BBDD.
     * 
     * Si el número introducido en el input es mayor que el número de
     * stock, introduce el mensaje de error en el array de errores.
     * 
     * @param array $errors_array
     * @param string $error_key
     * @param string $name_input
     * @param int stock
     * @return void
     */
    function catchExceededStockError(&$errors_array, $error_key, $name_input, $stock) {
        if($_POST[$name_input] > $stock) {
            $errors_array[$error_key] = 'No se dispone de esa cantidad de unidades';
        }
    }

    /**
     * CAPTURAR ERROR SIN STOCK
     * 
     * Esta función recibe como primer parámetro un array de errores,
     * como segundo parámetro una cadena que se le pasa como clave al
     * array de errores, y como tercer parámetro un int que es
     * la cantidad de stock disponible en la BBDD.
     * 
     * Si el número de stock es menor que 1, introduce el mensaje
     * de error en el array de errores.
     * 
     * @param array $errors_array
     * @param string $error_key
     * @param int stock
     * @return void
     */
    function noStockError(&$errors_array, $error_key, $stock) {
        if($stock < 1) {
            $errors_array[$error_key] = 'Sin stock';
        }
    }

    /**
     * GENERAR OPCIONES DE UNA ETIQUETA SELECT
     * 
     * Esta función recibe como primer parámetro un
     * array bidimensional como resultado de ejecutar
     * la función obtainQuery sobre una BBDD, como segundo
     * parámetro el nombre de la columna de la BBDD que se
     * desea obtener, como tercer parámetro el valor del
     * atributo name de la etiqueta select, y como cuarto parámetro
     * opcional el valor de una segunda columna de la tabla para imprimirla
     * 
     * Recorre el array que se le pasa como primer parámetro,
     * y guarda la cadena selected de cada opción para indicar si
     * está seleccionada. Después imprime la etiqueta option y
     * concatena la variable $selected dentro de ésta.
     * 
     * @param array $array
     * @param string $assoc_name
     * @param string $select_name
     * @param string $data
     * @return void
     */
    function generateSelectOptions($array, $assocc_name, $select_name, $data = null) {
        foreach($array as $key => $value) {
            $selected = showSelect($select_name, $array[$key][$assocc_name]);
            if($data == null) {
                echo "<option value='{$array[$key][$assocc_name]}' $selected>{$array[$key][$assocc_name]}</option>";
            } else {
                echo "<option value='{$array[$key][$assocc_name]}' $selected>{$array[$key][$assocc_name]} ({$array[$key][$data]})</option>";
            }
        }
    }

    /**
     * GENERAR OPCIONES DE CHECKBOX
     * 
     * Esta función recibe como primer parámetro un
     * array bidimensional como resultado de ejecutar
     * la función obtainQuery sobre una BBDD, como segundo
     * parámetro el nombre de la columna de la BBDD que se
     * desea obtener, y como tercer parámetro el valor del
     * atributo name de la propia etiqueta input.
     * 
     * Recorre el array que se le pasa como primer parámetro,
     * y guarda la cadena checked de cada opción para indicar si
     * está seleccionada. Después imprime la etiqueta input y
     * concatena la variable $checked dentro de ésta.
     * 
     * @param array $array
     * @param string $assoc_name
     * @param string $input_name
     * @return void
     */
    function generateCheckboxOptions($array, $assocc_name, $input_name) {
        echo '<ul>';
            foreach($array as $key => $value) {
                echo '<li>';
                    $checked = showCheckedOption($input_name, $array[$key][$assocc_name]);
                    echo "<label for='{$array[$key][$assocc_name]}-input'>{$array[$key][$assocc_name]}:</label>";
                    echo "<input type='checkbox' name='{$input_name}[]' id='{$array[$key][$assocc_name]}-input' value='{$array[$key][$assocc_name]}' $checked>";
                echo '</li>';
            }
        echo '</ul>';
    }
?>