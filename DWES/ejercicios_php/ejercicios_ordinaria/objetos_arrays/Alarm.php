<?php
    class Alarm extends Alert {

        public function show() {

            // echo "<script language='javascript'>alert('$this->title | $this->message');</script>";
            echo
            "<div>
                <h1>$this->title</h1>
                <p>$this->message</p>
            </div>";
        }
    }
?>