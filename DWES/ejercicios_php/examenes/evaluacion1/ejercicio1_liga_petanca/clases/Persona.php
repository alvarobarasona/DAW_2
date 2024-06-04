<?php
    class Persona {
        private $nombre;
        private $apellido1;
        private $apellido2;
        private $edad;

        function aniadirNombre($nombre) {
            $this->nombre = $nombre;
        }

        function obtenerNombre() {
            return $this->nombre;
        }

        function aniadirApellido($apellido, $numero_apellido) {
            if($numero_apellido === 1) {
                $this->apellido1 = $apellido;
            } else {
                $this->apellido2 = $apellido;
            }
        }

        function obtenerApellido($numero_apellido) {
            if($numero_apellido === 1) {
                return $this->apellido1;
            } else {
                return $this->apellido2;
            }
        }

        function aniadirEdad($edad) {
            $this->edad = $edad;
        }

        function obtenerEdad() {
            return $this->edad;
        }
    }
?>