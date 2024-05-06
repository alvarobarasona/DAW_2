<?php

    require("DataGestor");

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

        function get_detail()
        {
            
        }
    }

    
    $relational_gestor = new RelationalGestor("name", "description", "OS", "version", "trans supp");

    echo "pula";
    var_dump($relational_gestor);
?>