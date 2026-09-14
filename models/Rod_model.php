<?php

class Rod_model extends CI_Model{

    public function __construct(){

        $this->load->database();
        $this->load->helper("security");
    }

    public function get_pmr_pap($year){
        $this->db->select('*');
        $this->db->from('tbl_pmr_indicator');
        $this->db->where('ind_year', $year);
        $this->db->order_by('pap_id', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pmr_pobatanes($year){
        $this->db->select('*');
        $this->db->from('tbl_pmr_indicator');
        $this->db->where('ind_year', $year);
        $this->db->order_by('pap_id', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pmr_January($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'January');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_February($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'February');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_March($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'March');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    
    public function get_pmr_April($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'April');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_May($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'May');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_pmr_June($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'June');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_pmr_July($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'July');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_August($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'August');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_September($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'September');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_October($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'October');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_November($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'November');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_Decemebr($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('evi_month', 'December');
        $this->db->where('ous_id', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_employees_plantilla_1(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
        $result = $this->db->get();
        return $result->result();
    }

    public function get_employees_plantilla_2(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status !=', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
        $result = $this->db->get();
        return $result->result();
    }

    public function get_pmr_incharge($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_prm_incharge');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_prm_incharge.emp_id');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('inc_ous', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pmr_incharge1($ind_id, $ous_target_1){
        $this->db->select('*');
        $this->db->from('tbl_prm_incharge');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_prm_incharge.emp_id_jo');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('inc_ous', $ous_target_1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_target_id($filename){
        //Check if Update of Insert
        if ($this->input->post('edit_target_id') == ""){
            date_default_timezone_set('Asia/Manila');
            if (strtotime($this->input->post('deadline')) < date('m/d/Y')){
                $evi_t = 5;
            }else{
                $evi_t = 1;
            }

            //check duplicate values
            $result = $this->check_target();

            if($result){
                $return = array(
                    'status' => 'False'
                ); 
            }else{
                $data = array(
                    'ind_id' => $this->input->post('ind_id'),
                    'evi_accomplishment' => $this->input->post('edit_target_accomplishment'),
                    'evi_filename' => $filename,
                    'evi_month' => $this->input->post('edit_target_month'),
                    'evi_submitted' => date('m/d/Y'),
                    'ous_id' => $this->input->post('ous_editor'),
                    'usr_id' => $this->session->usr_id
                    //'evi_e' => 5,
                    //'evi_t' => $evi_t
                );
        
                //clean
                $data = $this->security->xss_clean($data);
                if($this->security->xss_clean($data)){  
                    $this->db->where('evi_id', $this->input->post('edit_target_id'));
                    $result = $this->db->insert('tbl_pmr_evidence', $data);  
                    if($result){
                        $return = array(
                            'status' => 'True'
                        );
                    }else{ 
                        $return = array(
                            'status' => 'False'
                        ); 
                    }
                    return $return;
                }
            }
        }else{
            date_default_timezone_set('Asia/Manila');
            $data = array(
                'evi_accomplishment' => $this->input->post('edit_target_accomplishment'),
                'evi_filename' => $filename,
                'evi_month' => $this->input->post('edit_target_month'),
                'evi_submitted' => date('m/d/Y'),
                'ous_id' => $this->input->post('ous_editor'),
                'usr_id' => $this->session->usr_id
            );
    
            //clean
            $data = $this->security->xss_clean($data);
            if($this->security->xss_clean($data)){  
                $this->db->where('evi_id', $this->input->post('edit_target_id'));
                $result = $this->db->update('tbl_pmr_evidence', $data);  
                if($result){
                    $return = array(
                        'status' => 'True'
                    );
                }else{ 
                    $return = array(
                        'status' => 'False'
                    ); 
                }
                return $return;
            }
        }
    }

    public function check_target(){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $this->input->post('ind_id'));
        $this->db->where('evi_month', $this->input->post('edit_target_month'));
        $this->db->where('ous_id', $this->input->post('ous_editor'));
        $query = $this->db->get();

        if($query->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function rate_target_id(){

        $data = array(
            'evi_q' => $this->input->post('edit_target_quality'),
            'evi_e' => $this->input->post('edit_target_efficiency'),
            'evi_t' => $this->input->post('edit_target_timeliness'),
            'evi_results' => $this->input->post('edit_evi_remarks')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            $this->db->where('evi_id', $this->input->post('rate_target_id'));
            $result = $this->db->update('tbl_pmr_evidence', $data);  
            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;

        }
    }

    
    public function edit_target_ous_id(){
        
        //Column
        $ous_desc =  $this->input->post('edit_ou_target_desc');
        
        $data = array(
            $ous_desc => $this->input->post('edit_ou_target_val')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            $this->db->where('ind_id', $this->input->post('edit_ou_target_ind_id'));
            $result = $this->db->update('tbl_pmr_indicator', $data);  
            if($result){

                //check if double entry
                $result = $this->check_emp();
                if($result){
                    $data = array(
                        'ind_id' => $this->input->post('edit_ou_target_ind_id'),
                        'emp_id' => $this->input->post('emp_name_edit_1'),
                        'emp_id_jo' => $this->input->post('emp_name_edit_2'),
                        'inc_ous' => $this->input->post('edit_ou_target_desc')
                    );
                    $this->db->where('ind_id', $this->input->post('edit_ou_target_ind_id'));
                    $this->db->where('inc_ous', $this->input->post('edit_ou_target_desc')); 
                    $result = $this->db->update('tbl_prm_incharge', $data);  
                    if($result){
                        $return = array(
                            'status' => 'True'
                        );
                    }
                }else{
                    $data = array(
                        'ind_id' => $this->input->post('edit_ou_target_ind_id'),
                        'emp_id' => $this->input->post('emp_name_edit_1'),
                        'emp_id_jo' => $this->input->post('emp_name_edit_2'),
                        'inc_ous' => $this->input->post('edit_ou_target_desc')
                        
                    );
                    $result = $this->db->insert('tbl_prm_incharge', $data);  
                    if($result){
                        $return = array(
                            'status' => 'True'
                        );
                    }
                }
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;

        }
    }

    public function check_emp(){
        $this->db->select('*');
        $this->db->from('tbl_prm_incharge');
        $this->db->where('ind_id', $this->input->post('edit_ou_target_ind_id'));
        $this->db->where('inc_ous', $this->input->post('edit_ou_target_desc'));
        $query = $this->db->get();

        if($query->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_operating_emails(){
        $query = $this->db->get('tbl_ous');
        return $query->result_array();
    }

    public function edit_access_form(){

        $data = array(
            'usr_fasd' => $this->input->post('fasd_access'),
            'usr_rod' => $this->input->post('rod_access')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            $this->db->where('usr_id', $this->input->post('edit_access_usr_id'));
            $result = $this->db->update('tbl_user', $data);  
            if($result){
                $return = array(
                    'status' => 'True'
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;

        }
    }

//----------Monitoring------------
    public function po_batanes_target_o(){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ous_id', 'po_batanes_target');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function po_cagayan_target_o(){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ous_id', 'po_cagayan_target');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function po_isabela_target_o(){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ous_id', 'po_isabela_target');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function po_quirino_target_o(){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ous_id', 'po_quirino_target');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function po_nv_target_o(){
        $this->db->select('*');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ous_id', 'po_nv_target');
        $result = $this->db->get();
        return $result->num_rows();
    }

//----------Monitoring------------

//------------------------update-------------------------
    public function del_target_id(){
        $this->db->where('evi_id', $this->input->post('ind_id_del'));
        $result = $this->db->delete('tbl_pmr_evidence');
        return $result;
    }


    public function get_evidence_ro_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ro_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ro_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
             $this->db->order_by("FIELD(tbl_pmr_evidence.evi_month, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')");
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_po_batanes_target($param){

        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_batanes_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_batanes_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_po_cagayan_target($param){

        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_cagayan_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_cagayan_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }

    }

    public function get_evidence_po_isabela_target($param){

        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_isabela_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_isabela_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_po_nv_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_nv_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_nv_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_po_quirino_target($param){
        
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_quirino_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'po_quirino_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    
    }

    public function get_evidence_api_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'api_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'api_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
        
    }

    public function get_evidence_lit_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'lit_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'lit_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    
    }

    public function get_evidence_rtc_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'rtc_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'rtc_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_isat_isabela_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'isat_isabela_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'isat_isabela_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
       
    }

    public function get_evidence_sicat_isabela_target($param){
        
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'sicat_isabela_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'sicat_isabela_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_nvpi_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'nvpi_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'nvpi_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
        
    }

    public function get_evidence_ptc_batanes_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_batanes_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_batanes_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_ptc_cagayan_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_cagayan_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_cagayan_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_ptc_isabela_target($param){

        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_isabela_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_isabela_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }

    }

    public function get_evidence_ptc_nv_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_nv_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_nv_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }

    public function get_evidence_ptc_quirino_target($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        if($sem == '1st'){
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_quirino_target');
            $this->db->where("(tbl_pmr_evidence.evi_month = 'January' OR tbl_pmr_evidence.evi_month = 'February' OR tbl_pmr_evidence.evi_month = 'March' OR tbl_pmr_evidence.evi_month = 'April' OR tbl_pmr_evidence.evi_month = 'May' OR tbl_pmr_evidence.evi_month = 'June')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();

        }else{
            $this->db->select('*');
            $this->db->from('tbl_pmr_evidence');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_pmr_evidence.usr_id');
            $this->db->where('tbl_pmr_evidence.ind_id', $id);
            $this->db->where('tbl_pmr_evidence.ous_id', 'ptc_quirino_target');
            //$this->db->where("(tbl_pmr_evidence.evi_month = 'July' OR tbl_pmr_evidence.evi_month = 'August' OR tbl_pmr_evidence.evi_month = 'September' OR tbl_pmr_evidence.evi_month = 'October' OR tbl_pmr_evidence.evi_month = 'November' OR tbl_pmr_evidence.evi_month = 'December')");
            //$this->db->order_by('MONTH(tbl_pmr_evidence.evi_month)');
            $result = $this->db->get();
            return $result->result_array();
        }
    }
//---------------Accomplishments

    //---------------RO
        public function get_ro_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ro_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ro_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ro_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------RO

    //---------------PO Batanes
        public function get_po_batanes_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_batanes_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_batanes_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_batanes_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Batanes

    //---------------PO Cagayan
        public function get_po_cagayan_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_cagayan_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_cagayan_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_cagayan_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Cagayan

    //---------------PO Isabela
        public function get_po_isabela_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_isabela_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Isabela

    //---------------PO NV
        public function get_po_nv_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_nv_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_nv_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_nv_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO NV

    //---------------PO Quirino
            public function get_po_quirino_percentage($ind_id){
                $this->db->select('AVG(evi_accomplishment)');
                $this->db->from('tbl_pmr_evidence');
                $this->db->where('ind_id', $ind_id);
                $this->db->where('ous_id', 'po_quirino_target');
                $result = $this->db->get();
                return $result->row_array();
            }

            public function get_po_quirino_sum($ind_id){
                $this->db->select('SUM(evi_accomplishment)');
                $this->db->from('tbl_pmr_evidence');
                $this->db->where('ind_id', $ind_id);
                $this->db->where('ous_id', 'po_quirino_target');
                $result = $this->db->get();
                return $result->row_array();
            }
    //---------------PO Quirino

    //---------------PO RTC
            public function get_rtc_percentage($ind_id){
                $this->db->select('AVG(evi_accomplishment)');
                $this->db->from('tbl_pmr_evidence');
                $this->db->where('ind_id', $ind_id);
                $this->db->where('ous_id', 'rtc_target');
                $result = $this->db->get();
                return $result->row_array();
            }

            public function get_rtc_sum($ind_id){
                $this->db->select('SUM(evi_accomplishment)');
                $this->db->from('tbl_pmr_evidence');
                $this->db->where('ind_id', $ind_id);
                $this->db->where('ous_id', 'rtc_target');
                $result = $this->db->get();
                return $result->row_array();
            }
    //---------------PO RTC

    //---------------PO API
        public function get_api_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'api_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_api_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'api_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO API

    //---------------PO LIT
        public function get_lit_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'lit_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_lit_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'lit_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO LIT

    //---------------PO ISAT
        public function get_isat_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'isat_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_isat_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'isat_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO ISAT

    //---------------PO SICAT
        public function get_sicat_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'sicat_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_sicat_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'sicat_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO SICAT

    //---------------PO SICAT
        public function get_nvpi_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'nvpi_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_nvpi_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'nvpi_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO SICAT

    //---------------PO PTC Batanes
        public function get_ptc_batanes_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_batanes_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_batanes_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_batanes_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Batanes

    //---------------PO PTC Cagayan
        public function get_ptc_cagayan_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_cagayan_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_cagayan_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_cagayan_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Cagayan

    //---------------PO PTC Isabela
        public function get_ptc_isabela_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_isabela_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_isabela_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Isabela

    //---------------PO PTC NV
        public function get_ptc_nv_percentage($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_nv_target');
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_nv_sum($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_nv_target');
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC NV

    //---------------PO PTC Quirino
    public function get_ptc_quirino_percentage($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_quirino_target');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ptc_quirino_sum($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_quirino_target');
        $result = $this->db->get();
        return $result->row_array();
    }
    //---------------PO PTC Quirino
    
//---------------Accomplishments

//---------------1st Semester
    public function get_fstsem_percentage($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_fstsem_sum($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------1st Semester

//---------------2nd Semester
    public function get_sndsem_percentage($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_sndsem_sum($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------2nd Semester

//---------------Total
    public function get_total_percentage($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_total_sum($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------Total

//---------------1st Semester
    //---------------RO
        public function get_ro_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ro_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ro_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ro_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------RO

    //---------------PO Batanes
        public function get_po_batanes_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_batanes_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_batanes_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_batanes_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Batanes

    //---------------PO Cagayan
        public function get_po_cagayan_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_cagayan_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_cagayan_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_cagayan_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Cagayan

    //---------------PO Isabela
        public function get_po_isabela_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_isabela_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Isabela

    //---------------PO NV
        public function get_po_nv_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_nv_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_nv_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_nv_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO NV

    //---------------PO Quirino
        public function get_po_quirino_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_quirino_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_po_quirino_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'po_quirino_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO Quirino

    //---------------PO RTC
        public function get_rtc_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'rtc_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_rtc_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'rtc_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO RTC

    //---------------PO API
        public function get_api_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'api_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_api_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'api_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO API

    //---------------PO LIT
        public function get_lit_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'lit_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_lit_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'lit_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO LIT

    //---------------PO ISAT
        public function get_isat_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'isat_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_isat_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'isat_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO ISAT

    //---------------PO SICAT
        public function get_sicat_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'sicat_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_sicat_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'sicat_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO SICAT

    //---------------PO SICAT
        public function get_nvpi_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'nvpi_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_nvpi_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'nvpi_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO SICAT

    //---------------PO PTC Batanes
        public function get_ptc_batanes_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_batanes_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_batanes_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_batanes_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Batanes

    //---------------PO PTC Cagayan
        public function get_ptc_cagayan_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_cagayan_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_cagayan_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_cagayan_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Cagayan

    //---------------PO PTC Isabela
        public function get_ptc_isabela_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_isabela_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_isabela_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Isabela

    //---------------PO PTC NV
        public function get_ptc_nv_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_nv_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_nv_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_nv_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC NV

    //---------------PO PTC Quirino
        public function get_ptc_quirino_percentage_fstsem($ind_id){
            $this->db->select('AVG(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_quirino_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }

        public function get_ptc_quirino_sum_fstsem($ind_id){
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ptc_quirino_target');
            $this->db->where("(evi_month='January' OR evi_month='February' OR evi_month='March' OR evi_month='April' OR evi_month='May' OR evi_month='June')", NULL, FALSE);
            $result = $this->db->get();
            return $result->row_array();
        }
    //---------------PO PTC Quirino
//---------------1st Semester

//---------------2nd Semester

//---------------RO
    public function get_ro_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ro_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ro_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ro_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------RO

//---------------PO Batanes
    public function get_po_batanes_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_batanes_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_po_batanes_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_batanes_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO Batanes

//---------------PO Cagayan
    public function get_po_cagayan_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_cagayan_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_po_cagayan_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_cagayan_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO Cagayan

//---------------PO Isabela
    public function get_po_isabela_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_po_isabela_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO Isabela

//---------------PO NV
    public function get_po_nv_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_nv_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_po_nv_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_nv_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO NV

//---------------PO Quirino
    public function get_po_quirino_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_quirino_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_po_quirino_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'po_quirino_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO Quirino

//---------------PO RTC
    public function get_rtc_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'rtc_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_rtc_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'rtc_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO RTC

//---------------PO API
    public function get_api_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'api_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_api_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'api_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO API

//---------------PO LIT
    public function get_lit_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'lit_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_lit_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'lit_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO LIT

//---------------PO ISAT
    public function get_isat_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'isat_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_isat_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'isat_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO ISAT

//---------------PO SICAT
    public function get_sicat_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'sicat_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_sicat_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'sicat_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO SICAT

//---------------PO SICAT
    public function get_nvpi_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'nvpi_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_nvpi_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'nvpi_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO SICAT

//---------------PO PTC Batanes
    public function get_ptc_batanes_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_batanes_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ptc_batanes_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_batanes_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO PTC Batanes

//---------------PO PTC Cagayan
    public function get_ptc_cagayan_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_cagayan_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ptc_cagayan_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_cagayan_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO PTC Cagayan

//---------------PO PTC Isabela
    public function get_ptc_isabela_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ptc_isabela_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_isabela_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO PTC Isabela

//---------------PO PTC NV
    public function get_ptc_nv_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_nv_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ptc_nv_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_nv_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO PTC NV

//---------------PO PTC Quirino
    public function get_ptc_quirino_percentage_sndsem($ind_id){
        $this->db->select('AVG(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_quirino_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_ptc_quirino_sum_sndsem($ind_id){
        $this->db->select('SUM(evi_accomplishment)');
        $this->db->from('tbl_pmr_evidence');
        $this->db->where('ind_id', $ind_id);
        $this->db->where('ous_id', 'ptc_quirino_target');
        $this->db->where("(evi_month='July' OR evi_month='August' OR evi_month='September' OR evi_month='October' OR evi_month='November' OR evi_month='December')", NULL, FALSE);
        $result = $this->db->get();
        return $result->row_array();
    }
//---------------PO PTC Quirino
//---------------2nd Semester


    public function get_ind_desc($param){
        $explode = explode('-', $param);
        $sem = $explode[0];
        $id = $explode[1];

        $this->db->select('ind_desc');
        $this->db->from('tbl_pmr_indicator');
        $this->db->where('ind_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}//Last