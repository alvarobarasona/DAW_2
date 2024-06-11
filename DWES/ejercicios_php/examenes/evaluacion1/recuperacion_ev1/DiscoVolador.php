<?php
    class DiscoVolador extends Ovni {
        private int $radio;

        function pintarHTML() {
            echo
            "<h1>Disco Volador</h1>
            <p>$this->velocidad</p>
            <p>$this->camuflaje</p>
            <p>$this->radio</p>";
        }

        function cargarInfo($info) {
            $array = explode(';', $info);
            $this->velocidad = $array[5];
            $this->camuflaje = $array[6];
            $this->radio = $array[7];
        }
    }
?>