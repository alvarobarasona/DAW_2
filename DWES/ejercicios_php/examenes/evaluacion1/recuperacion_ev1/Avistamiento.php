<?php
    class Avistamiento {
        private string $localizacion;
        private string $fecha;
        private int $hora;
        private string $notas;
        private Ovni $ovni;

        function pintarHTML() {

        }

        function cargarInfo($data, $title) {
            printDataTable($data, $title);
        }
    }
?>