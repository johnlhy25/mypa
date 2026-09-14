<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model {

    public function insert($data)
    {
        $result = $this->db->insert_batch('tbl_hr_work_experience', $data);
        if($result){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
