<?php
    spl_autoload_register(function ($class) {
        include "clases/$class.php";
    });

    function obtenerArrayPersonas($numero_personas) {
        $array_personas = [];
        $array_nombres = file('../resources/e1/nombres.dat', FILE_IGNORE_NEW_LINES);
        $array_apellidos = file('../resources/e1/apellidos.dat', FILE_IGNORE_NEW_LINES);
        for($i = 1; $i <= $numero_personas; $i++) {
            $persona = new Persona();
            $persona->aniadirNombre($array_nombres[rand(0, count($array_nombres) - 1)]);
            for($j = 1; $j <= 2; $j++) {
                $persona->aniadirApellido($array_apellidos[rand(0, count($array_apellidos) - 1)], $j);
            }
            $persona->aniadirEdad(rand(7, 122));
            array_push($array_personas, $persona);
        }
        return $array_personas;
    }

    function obtenerArrayPartidos($array_personas) {
        $array_partidos = [];
        for($i = 0; $i < count($array_personas); $i++) {
            for($j = 1 + $i; $j < count($array_personas); $j++) {
                $partido = new Partido();
                for($p = 1; $p <= 2; $p++) {
                    if($p === 1) {
                        $partido->aniadirPersona($array_personas[$i], $p);
                    } else {
                        $partido->aniadirPersona($array_personas[$j], $p);
                    }
                }
                array_push($array_partidos, $partido);
            }
        }
        return $array_partidos;
    }

    function obtenerSorteo($array_partidos) {
        foreach($array_partidos as $partido) {
            print_r($partido);
        }

        shuffle($array_partidos);
        echo '<br>';
        echo '<br>';

        foreach($array_partidos as $partido) {
            print_r($partido);
        }
    }
    obtenerSorteo(obtenerArrayPartidos(obtenerArrayPersonas(3)));
?>