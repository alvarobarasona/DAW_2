<?php
    class Err extends Alert {

        public function show() {

            echo
            "<div>
                <h1 class='error'>X $this->title X</h1>
                <p>$this->message</p>
            </div>";
        }
    }
?>