<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createqrcode_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function save_qrcode($base64_image, $param)
    {
        $data = array(
            'usr_cso_key' => hash('sha256', $param),
            'usr_cso_qrcode' => $base64_image
        );
        $this->db->where('usr_id', $param);
        return $this->db->update('tbl_user', $data);
    }

    public function view_qrcode($param)
    {  
        $this->db->select('usr_cso_qrcode');
        $this->db->from('tbl_user');
        $this->db->where('usr_id', $param);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function view_qr_code_ict($param)
    {  
        $this->db->select('usr_ict_qrcode');
        $this->db->from('tbl_user');
        $this->db->where('usr_id', $param);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result;
    }

    public function get_accounts(){
        $this->db->where('usr_cso_key =', null);
        $this->db->where('usr_cso_qrcode =', null);
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }

    public function get_accounts_ict(){
        $this->db->where('usr_ict_qrcode =', null);
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }

    public function save_qrcode_ict($base64_image, $param)
    {
        $data = array(
            'usr_ict_qrcode' => $base64_image
        );
        $this->db->where('usr_id', $param);
        return $this->db->update('tbl_user', $data);
    }

}