<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Games_model extends CI_Model {

    public function save(){
        $data = array(
            'game_id' => $this->input->post('gameID'),					
            'usr_token' => $this->input->post('usertoken'),
            'usr_remarks' => $this->input->post('score'),
        );
            return $this->db->insert('tbl_game', $data);
    }

    public function get_top_10_players() {
        $this->db->select('tbl_user.usr_name, tbl_user.usr_ous_id, tbl_user.usr_cso_key, 
                            tbl_ous.ous_id, tbl_ous.ous_desc, tbl_game.game_id, tbl_game.usr_token, 
                            MAX(tbl_game.usr_remarks) AS usr_remarks'); // Get the highest score
        $this->db->from('tbl_game');
        $this->db->join('tbl_user', 'tbl_user.usr_cso_key = tbl_game.usr_token');
        $this->db->join('tbl_ous', 'tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->where('tbl_game.game_id', '1');
        $this->db->group_by('tbl_game.game_id, tbl_game.usr_token, tbl_user.usr_name, 
                             tbl_user.usr_ous_id, tbl_user.usr_cso_key, tbl_ous.ous_id, tbl_ous.ous_desc'); 
        $this->db->order_by('usr_remarks', 'DESC'); // Sort by highest score
        $this->db->limit(10); // Limit to top 10
        return $this->db->get()->result();
    }
    
      
}
?>
