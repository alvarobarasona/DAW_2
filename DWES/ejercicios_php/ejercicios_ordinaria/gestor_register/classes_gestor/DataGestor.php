<?php
    trait BaseGestor {

        protected $name;
        protected $description;

        public function __construct($name, $description) {

            $this->name = $name;
            $this->description = $description;
        }
    }
    abstract class DataGestor {

        use BaseGestor;

        abstract function get_detail();
    }
?>