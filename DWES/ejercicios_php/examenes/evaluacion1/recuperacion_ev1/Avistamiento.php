<?php
    class Avistamiento {
        private string $localizacion;
        private string $fecha;
        private string $hora;
        private string $notas;
        private Ovni $ovni;

        function pintarHTML() {
            echo
            "<p>Localización: $this->localizacion</p>
            <p>Fecha: $this->fecha</p>
            <p>Hora: $this->hora</p>
            <p>Notas: $this->notas</p>
            {$this->ovni->pintarHTML()}";
        }

        function cargarInfo($info) {
            $data = explode(';', $info);
            $this->localizacion = $data[0];
            $this->fecha = $data[1];
            $this->hora = $data[2];
            $this->notas = $data[3];
            
            switch($data[4]) {
                case 'cigarro':
                    $this->ovni = new Cigarro();
                    break;

                case 'luz':
                    $this->ovni = new LuzMisteriosa();
                    break;

                case 'disco':
                    $this->ovni = new DiscoVolador();
                 

                default:
                    break;
            }
            $this->ovni->cargarInfo($info);
        }
    }
?>