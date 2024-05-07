<?php
    class NoRelationalGestor extends DataGestor {

        private $model_data_type;

        public function __construct($name, $description, $model_data_type) {

            parent::__construct($name, $description);
            $this->model_data_type = $model_data_type;
        }

        function get_detail() {

            yield $this->name;
            yield $this->description;
            yield $this->model_data_type;
        }
    }
?>