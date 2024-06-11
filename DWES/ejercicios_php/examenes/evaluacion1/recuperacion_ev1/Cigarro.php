<?php
    class Cigarro extends Ovni {
        private float $longitud;

        function pintarHTML() {
            echo
            "<h1>Disco Volador</h1>
            <p>$this->velocidad</p>
            <p>$this->camuflaje</p>
            <p>$this->longitud</p>";
        }

        function cargarInfo($info) {
            $array = explode(';', $info);
            $this->velocidad = $array[5];
            $this->camuflaje = $array[6];
        }
    }
?>