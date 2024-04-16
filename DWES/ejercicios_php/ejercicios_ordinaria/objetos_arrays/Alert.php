<?php
    abstract class Alert {

        protected $title;
        protected $message;

        public function __construct($title, $message) {

            $this->title = $title;
            $this->message = $message;
        }

        public abstract function show();
    }
?>