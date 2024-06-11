<?php
    class LuzMisteriosa extends Ovni {
        private int $duracion_luz;

        function pintarHTML() {
            echo
            "<h1>Disco Volador</h1>
            <p>$this->velocidad</p>
            <p>$this->camuflaje</p>
            <p>$duracion_luz->duracion_luz</p>";
        }
    }
?>