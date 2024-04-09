<?php
    spl_autoload_register(function ($nombre_clase) {

        include $nombre_clase . '.php';
    });

    function obtener_string_dat($ruta_archivo) {

        $numero_random = rand(1, 24);

        $acc = 1;

        $contenido_dat = fopen($ruta_archivo, 'r');

        if($contenido_dat) {

            while($string = fgets($contenido_dat)) {

                if($acc == $numero_random) {

                    fclose($contenido_dat);

                    return $string;
                }

                $acc++;
            }
        } else {

            echo 'Error al abrir el archivo.';
        }
    }

    function obtener_array_personas($numero_jugadores) {

        $array_personas = [];

        for($i = 1; $i <= $numero_jugadores; $i++) {

            $jugador = new Persona();

            $jugador->aniadir_nombre(obtener_string_dat('nombres.dat'));

            $jugador->aniadir_apellido1(obtener_string_dat('apellidos.dat'));

            $jugador->aniadir_apellido2(obtener_string_dat('apellidos.dat'));

            $jugador->aniadir_edad(rand(7, 122));

            // echo "{$jugador->obtener_nombre()} {$jugador->obtener_apellido1()} {$jugador->obtener_apellido2()} {$jugador->obtener_edad()}<br>";

            array_push($array_personas, $jugador);
        }

        // echo '<br><br>';

        return $array_personas;
    }

    function obtener_array_partidos($array_personas) {

        $array_partidos = [];

        for($i = 0; $i < count($array_personas); $i++) {

            for($j = (1 + $i); $j < count($array_personas); $j++) {

                $partido = new Partido();

                $partido->aniadir_jugador1($array_personas[$i]);

                $partido->aniadir_jugador2($array_personas[$j]);

                array_push($array_partidos, $partido);
            }
        }

        return $array_partidos;
    }

    // foreach(obtener_array_partidos(obtener_array_personas(5)) as $partido) {

    //     echo "{$partido->obtener_jugador1()->obtener_nombre()} {$partido->obtener_jugador1()->obtener_apellido1()} {$partido->obtener_jugador1()->obtener_apellido2()} {$partido->obtener_jugador1()->obtener_edad()}<br>
    //     {$partido->obtener_jugador2()->obtener_nombre()} {$partido->obtener_jugador2()->obtener_apellido1()} {$partido->obtener_jugador2()->obtener_apellido2()} {$partido->obtener_jugador2()->obtener_edad()}<br><br>";
    // };

    // $timestamp = strtotime('2024-03-23 14:00:00');

    // $date = date('Y-m-d H:i:s', $timestamp);

    // echo 'Fecha inicial:<br>';

    // var_dump($date);

    // echo '<br>';

    // $datatime = new DateTime($date);

    // var_dump($datatime);

    // echo '<br>';

    // $fecha_modificada = date_modify($datatime, '+1 hour 30 minutes');

    // echo 'Fecha modificada<br>';

    // var_dump($fecha_modificada);

    function sorteo($array_partidos, $hora_inicio_competicion, $tiempo_entre_partidos) {

        $timestamp = strtotime($hora_inicio_competicion);

        $date_time = new DateTime("@$timestamp");

        $date_time->sub(new DateInterval('PT1H30M'));

        shuffle($array_partidos);

        array_reduce($array_partidos, function ($acumulador, $partido) use ($date_time, $tiempo_entre_partidos) {

            $fecha_modificada = date_modify($date_time, $tiempo_entre_partidos);

            $partido->aniadir_hora_juego($fecha_modificada->format('Y-m-d H:i:s'));

            return $acumulador;
        }, []);

        return $array_partidos;
    }

    // sorteo(obtener_array_partidos(obtener_array_personas(5)), '2024-04-20 16:00:00', '+1 hour 30 minutes');
?>