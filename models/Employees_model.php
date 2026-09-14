<?php

class Employees_model extends CI_Model{

    public function __construct(){

        $this->load->database();
        $this->load->helper("security");
    }

    public function personal_information($param){

        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->join('tbl_hr_personal_information','tbl_hr_personal_information.usr_id = tbl_user.usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->where('tbl_user.usr_id', $param);
        $result = $this->db->get();
        return $result->result();
    }
    
    public function update_usr_token($param, $token){

        $data = array(
        'usr_token' => $token
        );
        
        $this->db->where('usr_id', $param);
        return $this->db->update('tbl_user', $data);
    }

    
}//Last