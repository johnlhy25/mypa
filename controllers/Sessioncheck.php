<?php
class Sessioncheck extends CI_Controller {
    public function check_status() {
        //header('Content-Type: application/json');

        if ($this->session->logged_in) {
             echo 'false';
        } else {
             echo 'true';
        }
    }
}

?>