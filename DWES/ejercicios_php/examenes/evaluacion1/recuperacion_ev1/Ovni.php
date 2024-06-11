<?php
    trait BaseOvni {
        protected float $velocidad;
        protected boolean $camuflaje;
        public function __construct($velocidad, $camuflaje) {
            $this->velocidad = $velocidad;
            $this->camuflaje = $camuflaje;
        }
    }
    abstract class Ovni {
        use BaseOvni;
        abstract function pintarHTML();
        abstract function cargarInfo();
    }
?>