<?php
    class Warning extends Alert {

        public function show() {

            echo
            "<div>
                <h1 class='warning'>¡ $this->title !</h1>
                <p>$this->message</p>
            </div>";
        }
    }
?>