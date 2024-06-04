<?php
    class Partido {
        private $persona1;
        private $persona2;
        private $resultado;
        private $hora_juego;

        function aniadirPersona($persona, $numero_persona) {
            if($numero_persona === 1) {
                $this->persona1 = $persona;
            } else {
                $this->persona2 = $persona;
            }
        }

        function obtenerPersona($numero_persona) {
            if($numero_persona === 1) {
                return $this->persona1;
            } else {
                return $this->persona2;
            }
        }

        function aniadirResultado($resultado) {
            $this->resultado = $resultado;
        }

        function obtenerResultado() {
            return $this->resultado;
        }

        function aniadirHoraJuego($hora_juego) {
            $this->hora_juego = $hora_juego;
        }

        function obtenerHoraJuego() {
            return $this->hora_juego;
        }
    }
?>