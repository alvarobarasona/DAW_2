<?php
    class RelationalGestor extends DataGestor {

        private $operative_system;
        private $version;
        private $transaction_support;

        public function __construct($name, $description, $operative_system, $version, $transaction_support) {

            parent::__construct($name, $description);
            $this->operative_system = $operative_system;
            $this->version = $version;
            $this->transaction_support = $transaction_support;
        }

        function get_detail() {
            
            yield $this->name;
            yield $this->description;
            yield $this->operative_system;
            yield $this->version;
            yield $this->transaction_support;
        }
    }
?>