<?php

class Games extends CI_Controller{

    public function valentines_2025() {
        $this->Games_model->save();
    }

    public function get_top_10_players() {
        $top_players = $this->Games_model->get_top_10_players();

        // Return the data as JSON
        echo json_encode($top_players);
    }

}