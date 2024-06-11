<?php
    trait BaseVehiculo {
        protected string $fabricante;
        protected string $modelo;
        protected string $matricula;
        protected string $combustible;
        protected float $autonomia;
        protected int $precio;

        public function __construct($fabricante, $modelo, $matricula, $combustible, $autonomia, $precio) {
            $this->fabricante = $fabricante;
            $this->modelo = $modelo;
            $this->matricula = $matricula;
            $this->combustible = $combustible;
            $this->autonomia = $autonomia;
            $this->precio = $precio;
        }

        abstract function getFabricante();

        abstract function getModelo();

        abstract function getMatricula();

        abstract function getCombustible();

        abstract function getAutonomia();

        abstract function getPrecio();

        abstract function printHTML();
    }

    abstract class Vehiculo {
        use BaseVehiculo;
    }
?>