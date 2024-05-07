<?php
    class FileGestor extends DataGestor {

        private $file_format;
        private $access_mode;

        public function __construct($name, $description, $file_format, $access_mode) {

            parent::__construct($name, $description);
            $this->file_format = $file_format;
            $this->access_mode = $access_mode;
        }

        function get_detail() {

            yield $this->name;
            yield $this->description;
            yield $this->file_format;
            yield $this->access_mode;
        }
    }
?>