<?php
    class Persona {

        private $nombre;
        private $apellido1;
        private $apellido2;
        private $edad;

        public function obtener_nombre() {

            return $this->nombre;
        }

        public function aniadir_nombre($nombre_nuevo) {

            $this->nombre = $nombre_nuevo;
        }

        public function obtener_apellido1() {

            return $this->apellido1;
        }

        public function aniadir_apellido1($apellido1_nuevo) {

            $this->apellido1 = $apellido1_nuevo;
        }

        public function obtener_apellido2() {

            return $this->apellido2;
        }

        public function aniadir_apellido2($apellido2_nuevo) {

            $this->apellido2 = $apellido2_nuevo;
        }

        public function obtener_edad() {

            return $this->edad;
        }

        public function aniadir_edad($edad_nueva) {
            
            $this->edad = $edad_nueva;
        }

    }
?>