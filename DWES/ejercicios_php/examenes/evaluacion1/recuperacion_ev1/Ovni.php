<?php
    trait BaseOvni {
        protected int $velocidad;
        protected string $camuflaje;

        abstract function pintarHTML();
        abstract function cargarInfo($info);
    }
    abstract class Ovni {
        use BaseOvni;
    }
?>