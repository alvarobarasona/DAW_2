<?php
    abstract class Terrestre extends Vehiculo {
        protected int $numero_ruedas;
        
        public function __construct($fabricante, $modelo, $matricula, $combustible, $autonomia, $precio, $numero_ruedas) {
            parent::__construct($fabricante, $modelo, $matricula, $combustible, $autonomia, $precio);
            $this->numero_ruedas = $numero_ruedas;
        }

        abstract function getNumeroRuedas();
    }
?>