<?php
    class Coche extends Terrestre {
        protected int $numero_puertas;

        public function __construct($fabricante, $modelo, $matricula, $combustible, $autonomia, $precio, $numero_ruedas, $numero_puertas) {
            parent::__construct($fabricante, $modelo, $matricula, $combustible, $autonomia, $precio, $numero_ruedas);
            $this->numero_puertas = $numero_puertas;
        }

        function getFabricante() {
            return $this->fabricante;
        }

        function getModelo() {
            return $this->modelo;
        }

        function getMatricula() {
            return $this->matricula;
        }

        function getCombustible() {
            return $this->combustible;
        }

        function getAutonomia() {
            return $this->autonomia;
        }

        function getPrecio() {
            return $this->precio;
        }

        function getNumeroRuedas() {
            return $this->numero_ruedas;
        }

        function getNumeroPuertas() {
            return $this->numero_puertas;
        }

        function printHTML() {
            echo
            "<h1>$this->fabricante $this->modelo</h1>
            <p>Matrícula: $this->matricula</p>
            <p>Combustible: $this->combustible</p>
            <p>Autonomía: $this->autonomia km</p>
            <p>Precio: $this->precio €</p>
            <p>Número de ruedas: $this->numero_ruedas</p>
            <p>Número de puertas: $this->numero_puertas</p>";
        }
    }
?>