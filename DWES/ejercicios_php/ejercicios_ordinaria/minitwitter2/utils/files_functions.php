<?php
    /**
     * LEER ARCHIVOS JSON, DAT Y CSV
     * 
     * Lee el contenido de un archivo json, data o csv y lo devuelve en una estructura de datos adecuada.
     *
     * La función detecta la extensión del archivo y realiza la lectura en consecuencia.
     * Soporta los siguientes tipos de archivos: .dat, .csv, y .json.
     *
     * @param string $file_path La ruta completa al archivo que se desea leer.
     * @return array|null Devuelve un array con los datos leídos del archivo o null en caso de error.
     *
     * - Para archivos .dat: Devuelve un array de cadenas, cada una representando una línea del archivo.
     * - Para archivos .csv: Devuelve un array de arrays, donde cada sub-array representa una fila del CSV.
     * - Para archivos .json: Devuelve un array asociativo (decodificado desde JSON).
     *
     * @throws Exception Si la extensión del archivo no está soportada o si ocurre un error durante la lectura.
     */
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

    /**
     * Escribe datos en un archivo según su extensión.
     *
     * Soporta los siguientes tipos de archivos: .dat, .csv, y .json.
     *
     * @param string $file_path La ruta completa al archivo en el que se desea escribir.
     * @param mixed ...$data Los datos que se desean escribir en el archivo. Pueden ser cadenas o arrays.
     * @return void
     *
     * @throws Exception Si la extensión del archivo no está soportada.
     */
    function write($file_path, ...$data){
        $file_info = pathinfo($file_path);

        $extension = isset($file_info['extension']) ? strtolower($file_info['extension']) : '';

        switch ($extension) {
            case 'dat':
                $data_row = implode(' ', $data) . PHP_EOL;
                file_put_contents($file_path, $data_row . FILE_APPEND);
                break;
                
            case 'csv':
                $data_row = implode(';', $data);
                file_put_contents(CSV_PATH, $data_row . PHP_EOL, FILE_APPEND);
                break;

            case 'json':
                if (file_exists($file_path)) {
                    $existing_data = read($file_path);
                    if ($existing_data === null) {
                        $existing_data = [];
                    }
                } else {
                    $existing_data = [];
                }

                foreach ($data as $row) {
                    if (is_array($row)) {
                        $existing_data[] = $row;
                    } else {
                        $existing_data[] = [$row];
                    }
                }

                $json_data = json_encode($existing_data, JSON_PRETTY_PRINT);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    echo "Error al codificar los datos a JSON: " . json_last_error_msg() . "\n";
                    return;
                }

                if (file_put_contents($file_path, $json_data) === false) {
                    echo "Error al escribir en el archivo JSON: $file_path\n";
                    return;
                }
                break;

            default:
                echo "Extensión no soportada: $extension\n";
                break;
        }
    }
?>