<?php
    class Partido {

        private $persona1;
        private $persona2;
        private $resultado;
        private $hora_juego;

        public function obtener_jugador1() {

            return $this->persona1;
        }

        public function aniadir_jugador1($jugador1_nuevo) {

            $this->persona1 = $jugador1_nuevo;
        }

        public function obtener_jugador2() {

            return $this->persona2;
        }

        public function aniadir_jugador2($jugador2_nuevo) {
            
            $this->persona2 = $jugador2_nuevo;
        }

        public function obtener_resultado() {

            return $this->persona2;
        }

        public function aniadir_resultado($resultado_nuevo) {

            $this->resultado = $resultado_nuevo;
        }

        public function obtener_hora_juego() {

            return $this->hora_juego;
        }

        public function aniadir_hora_juego($hora_juego_nueva) {
            
            $this->hora_juego = $hora_juego_nueva;
        }

        public function obtener_fila_tabla() {

            echo "<tr>
                <td>{$this->persona1->obtener_nombre()} {$this->persona1->obtener_apellido1()} {$this->persona1->obtener_apellido2()} Edad: {$this->persona1->obtener_edad()}</td>
                <td>{$this->persona2->obtener_nombre()} {$this->persona2->obtener_apellido1()} {$this->persona2->obtener_apellido2()} Edad: {$this->persona2->obtener_edad()}</td>
                <td>{$this->resultado}</td>
                <td>{$this->hora_juego}</td>
            </tr>";
        }
    }
?>