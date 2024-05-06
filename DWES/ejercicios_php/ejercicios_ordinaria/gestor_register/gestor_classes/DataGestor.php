<?php
    require("RelationalGestor");

    abstract class DataGestor {

        protected $name;
        protected $description;

        public function __construct($name, $description) {

            $this->name = $name;
            $this->description = $description;
        }

        abstract function get_detail();
    }
?>