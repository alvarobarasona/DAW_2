<?php
    class DiscoVolador extends Ovni {
        private float $radio;

        public function __construct($velocidad, $camuflaje, $radio) {
            parent::__construct($velocidad, $camuflaje);
            $this->radio = $radio;
        }

        function pintarHTML() {
            echo
            "<h1>Disco Volador</h1>
            <p>$this->velocidad</p>
            <p>$this->camuflaje</p>
            <p>$this->radio</p>";
        }

        
    }
?>