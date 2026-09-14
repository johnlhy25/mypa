<?php

class Posts_model extends CI_Model{

    public function __construct(){

        $this->load->database();
        $this->load->helper("security");

        // Set table name
        $this->table = 'tbl_log';
        // Set orderable column fields
        $this->column_order = array(null, null, null, null, null, null, null, null);
        // Set searchable column fields
        $this->column_search = array('usr_name');
        // Set default order
        $this->order = array('log_timestamp' => 'desc');

    }

    //START OF MYPA

    public function get_accounts(){
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }

    public function get_accounts_admin($param){
        $this->db->where('usr_ous_id', $param);
        $query = $this->db->get('tbl_user');
        return $query->result_array();
    }

    public function get_list_of_division($ous_id){
        $this->db->where('ous_id', $ous_id);
        $this->db->order_by('dep_desc');
        $query = $this->db->get('tbl_dep');
        return $query->result_array();
    }

    public function get_poperating_units(){
        
        /*if( $this->session->role == 'Super Admin'){
            $this->db->order_by('ous_arrangement');
            $query = $this->db->get('tbl_ous');
            return $query->result_array();
        }else{
            $this->db->where('ous_id', $this->session->ous_id);
            $this->db->order_by('ous_arrangement');
            $query = $this->db->get('tbl_ous');
            return $query->result_array();
        }*/
        
        $this->db->order_by('ous_arrangement');
        $query = $this->db->get('tbl_ous');
        return $query->result_array();
    }

    public function get_poperating_units_id(){
        $this->db->select('ous_id, ous_desc');
        $this->db->from('tbl_ous');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_list_of_division_approved($ous_id){
        $this->db->select('*');
        $this->db->from('tbl_grant_ous');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_grant_ous.grant_usr_id');
        $this->db->join('tbl_dep','tbl_dep.dep_id = tbl_grant_ous.grant_dep_id');
        $this->db->where('tbl_grant_ous.grant_ous_id', $ous_id);
        $this->db->where('tbl_grant_ous.grant_status', 'Approved');
		$this->db->order_by('tbl_dep.dep_desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function unit_request_details_ous(){
        $this->db->where('ous_id', $this->input->post('ous_id'));
        $query = $this->db->get('tbl_ous');
        return $query->row_array();
    }

    public function unit_request_details_division(){
        $this->db->where('dep_id', $this->input->post('dep_id'));
        $query = $this->db->get('tbl_dep');
        return $query->row_array();
    }

    public function unit_request(){
        
        $result = $this->get_unit_request();
        if($result){
            return false;
        }else{
            $data = array(
                'grant_ous_id' => $this->input->post('ous_id'),
                'grant_dep_id' => $this->input->post('dep_id'),
                'grant_usr_id' => $this->session->usr_id,
                'grant_status' => 'pending'
            );
            $this->db->insert('tbl_grant_ous', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;


            //get last insert id OneSignal Notification
            //$insert_id = $this->db->insert_id();
            
            //return $this->onesignal($insert_id);
        }
    }

    public function get_unit_request(){

        $this->db->where('grant_usr_id', $this->session->usr_id);
        $this->db->where('grant_dep_id', $this->input->post('dep_id'));
        $result = $this->db->get('tbl_grant_ous');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_notifications_data(){
        $this->db->select('*');
        $this->db->from('tbl_grant_ous');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_grant_ous.grant_usr_id');
        $this->db->join('tbl_dep','tbl_dep.dep_id = tbl_grant_ous.grant_dep_id');
        $this->db->where('tbl_grant_ous.grant_status', 'pending');
		$this->db->order_by('tbl_grant_ous.grant_timestamp', 'Desc');
        $query = $this->db->get();
        return $query->result_array();

    }



    public function get_notifications_data_admin($ous_id){
        $this->db->select('*');
        $this->db->from('tbl_grant_ous');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_grant_ous.grant_usr_id');
        $this->db->join('tbl_dep','tbl_dep.dep_id = tbl_grant_ous.grant_dep_id');
        $this->db->where('tbl_grant_ous.grant_status', 'pending');
        $this->db->where('tbl_grant_ous.grant_ous_id', $ous_id);
		$this->db->order_by('tbl_grant_ous.grant_timestamp', 'Desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_email_request($param){
        $this->db->select('*');
        $this->db->from('tbl_grant_ous');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_grant_ous.grant_usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_grant_ous.grant_ous_id');
        $this->db->join('tbl_dep','tbl_dep.dep_id = tbl_grant_ous.grant_dep_id');
        $this->db->where('tbl_grant_ous.grant_id', $param);
        $result = $this->db->get();

        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
     }

    public function grant_user($param){
        $this->db->where('grant_id', $param);
        $data = array(
            'grant_status' => 'Approved');
        return $this->db->update('tbl_grant_ous', $data);
     }

     public function deny_user($param){
        $this->db->where('grant_id', $param);
        $data = array(
            'grant_status' => 'Denied');
        return $this->db->update('tbl_grant_ous', $data);
     }

     public function login(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->where('usr_email', $this->input->post('Username',true));
        $this->db->where('usr_password', md5($this->input->post('Password',true)));

        $result = $this->db->get();

        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
     }

     public function login_verification(){

        $this->db->where('usr_email', $this->input->post('Username',true));
        $this->db->where('usr_password', md5($this->input->post('Password',true)));
        $this->db->where('usr_status', 'Approved');

        $result = $this->db->get('tbl_user');

        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
     }

     public function get_category(){
        $query = $this->db->get('tbl_cat');
        return $query->result_array();
    }

    public function list_of_docs($year, $cat_id, $ous_id, $unit_id){
        $this->db->select('*');
        $this->db->from('tbl_file');
        $this->db->join('tbl_user','tbl_user.usr_ous_id = tbl_file.file_usr_id');
        $this->db->where('tbl_file.file_cat_id', $cat_id);
        $this->db->where('tbl_file.file_ous_id', $ous_id);
        $this->db->where('tbl_file.file_dep_id', $unit_id);
        $this->db->where('tbl_file.file_year', $year);
        $this->db->order_by('tbl_file.file_desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function list_of_docs_download(){
        $this->db->select('*');
        $this->db->from('tbl_file');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_exhibits_docs(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'file_desc' => $this->input->post('description'),
            'file_filename' => $filename,
            'file_cat_id' => $this->input->post('file_cat_id'),
            'file_ous_id' => $this->session->ous_id,
            'file_dep_id' => $this->input->post('file_dep_id'),
            'file_usr_id' => $this->session->usr_id,
            'file_year' => $this->input->post('year'),
            'file_google_link' => $this->input->post('file_google_link')
        );
            return $this->db->insert('tbl_file', $data);
     }

     public function insert_exhibits_docs1(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'file_desc' => $this->input->post('description'),
            'file_filename' => $filename,
            'file_cat_id' => $this->input->post('file_cat_id'),
            'file_ous_id' => $this->input->post('ous_id'),
            'file_dep_id' => $this->input->post('file_dep_id'),
            'file_usr_id' => $this->session->usr_id,
            'file_year' => $this->input->post('year'),
            'file_google_link' => $this->input->post('file_google_link')
        );
            return $this->db->insert('tbl_file', $data);
     }

     public function edit_exhibits_docs(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
        'file_desc' => $this->input->post('description'),
        'file_filename' => $filename,
        'file_google_link' => $this->input->post('file_google_link')
        );

        $id = $this->input->post('file_id');
        $this->db->where('file_id', $id);
        return $this->db->update('tbl_file', $data);
     }

     public function edit_exhibits_docs_null(){

        $data = array(
            'file_desc' => $this->input->post('description'),
            'file_google_link' => $this->input->post('file_google_link')
        );

        $id = $this->input->post('file_id');
        $this->db->where('file_id', $id);
        return $this->db->update('tbl_file', $data);

    }

     public function delete_exhibits_docs(){
         
        $id = $this->input->post('file_id');
        $this->db->where('file_id', $id);
        $this->db->delete('tbl_file');
        return true;
    }

    public function list_of_categories(){
        $this->db->order_by('cat_desc');
        $query = $this->db->get('tbl_cat');
        return $query->result_array();
    }

    public function add_quarter(){

        $data = array(
           'cat_desc' => $this->input->post('cat_desc'),
       );
       return $this->db->insert('tbl_cat', $data);
    }

    public function edit_quarter(){

        $data = array(
           'cat_desc' => $this->input->post('cat_desc'),
       );
       $id = $this->input->post('cat_id');
       $this->db->where('cat_id', $id);
       return $this->db->update('tbl_cat', $data);
    }

    public function delete_quarter(){

       $id = $this->input->post('cat_id');
       $this->db->where('cat_id', $id);
       return $this->db->delete('tbl_cat');
    }

    public function get_user_email($param){
        $this->db->where('usr_id', $param);
        $result = $this->db->get('tbl_user');

        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
     }

    public function update_user_status_approved($param){
        $this->db->where('usr_id', $param);

        $data = array(
            'usr_status' => 'Approved');
        return $this->db->update('tbl_user', $data);
     }

     public function resetpassword_user($param, $password){
        $this->db->where('usr_id', $param);
        $data = array(
            'usr_password' => md5($password));
        return $this->db->update('tbl_user', $data);
     }

     public function resetpassword_forgot($param, $password){
        $this->db->where('usr_email', $param);
        $data = array(
            'usr_password' => md5($password));
        return $this->db->update('tbl_user', $data);
     }

     public function insert_user(){

        $data = array(
            'usr_name' => ucwords(strtolower($this->input->post('fullname'))),
            'usr_ous_id' => $this->input->post('ous'),
            //'usr_dep_id' => $this->input->post('dep'),
            'usr_email' => $this->input->post('signupemail'),
            'usr_password' => md5($this->input->post('signuppassword')),
            'usr_status' => 'pending',
            'usr_role' => 'User'
        );

        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){
            $this->db->insert('tbl_user', $data);
        }else{
           // echo "xss failed";
        }

        $usr_id = $this->db->insert_id();

        $data_emp = array(
            'usr_id' => $usr_id,
            'emp_ous' => $this->input->post('ous')
        );

        $data = $this->security->xss_clean($data_emp);
        if($this->security->xss_clean($data_emp)){
            return $this->db->insert('tbl_hr_employee', $data_emp);
        }else{
           // echo "xss failed";
        }


     }

     public function insert_log(){

        $this->load->helper('url');
        $this->load->library('user_agent');


        $data = array(
            'log_usr_id	' => $this->session->usr_id,
            'log_usr_ip' => $this->input->ip_address(),
            'log_usr_browser' => $this->agent->browser(),
            'log_usr_browserversion' => $this->agent->version(),
            'log_usr_platform	' => $this->agent->platform(),
            'log_usr_user_agent' => $_SERVER['HTTP_USER_AGENT']
        );
        return $this->db->insert('tbl_log', $data);
     }

     public function add_operating_units(){

        $data = array(
           'ous_desc' => $this->input->post('ous_desc'),
           'ous_email' => $this->input->post('ous_email'),
           'ous_hrfocal_email' => $this->input->post('ous_hrfocal_email')
       );
       return $this->db->insert('tbl_ous', $data);
    }

    public function edit_operating_units(){

        $data = array(
           'ous_desc' => $this->input->post('ous_desc'),
           'ous_email' => $this->input->post('ous_email'),
           'ous_hrfocal_email' => $this->input->post('ous_hrfocal_email'),
           'ous_mis_focal' => $this->input->post('ous_mis_focal'),
           'ous_head_email' => $this->input->post('ous_head_email'),
           'ous_head' => $this->input->post('ous_head')
           
       );

       $this->db->where('ous_id', $this->input->post('ous_id'));
       return $this->db->update('tbl_ous', $data);
    }

    public function delete_operating_units(){
       $this->db->where('ous_id', $this->input->post('ous_id'));
       return $this->db->delete('tbl_ous');
    }

    public function get_list_of_division_admin($ous_id){
        $this->db->where('ous_id', $ous_id);
		$this->db->order_by('dep_desc');
        $query = $this->db->get('tbl_dep');
        return $query->result_array();
    }

    public function add_division(){

        $data = array(
            'ous_id' => $this->session->ous_id,
           'dep_desc' => $this->input->post('dep_desc')
       );
       return $this->db->insert('tbl_dep', $data);
    }

    public function edit_division(){

        $data = array(
           'dep_desc' => $this->input->post('dep_desc')
       );
       $id = $this->input->post('dep_id');
       $this->db->where('dep_id', $id);
       return $this->db->update('tbl_dep', $data);
    }

    public function delete_division(){

       $id = $this->input->post('dep_id');
       $this->db->where('dep_id', $id);
       return $this->db->delete('tbl_dep');
    }

    public function get_user_info(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->where('tbl_user.usr_id', $this->session->usr_id);
        $result = $this->db->get();

        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
     }


     public function update_user1($filename){
        
        $usr_id = $this->session->usr_id;

        if ($this->input->post('password') == null){
            if ($filename == null){
                $data = array(
                    'usr_email' => $this->input->post('email'),
                    'usr_name' => $this->input->post('name'),
                    'usr_ous_id' => $this->input->post('ous_desc')
                );
            }else{
                $data = array(
                    'usr_email' => $this->input->post('email'),
                    'usr_name' => $this->input->post('name'),
                    'usr_ous_id' => $this->input->post('ous_desc'),
                    'usr_link_id' => $filename
                );
            }
           
        }else{

            if ($filename == null){
                $data = array(
                    'usr_email' => $this->input->post('email'),
                    'usr_name' => $this->input->post('name'),
                    'usr_ous_id' => $this->input->post('ous_desc'),
                    'usr_password' => md5($this->input->post('password'))
                );
            }else{

                $data = array(
                    'usr_email' => $this->input->post('email'),
                    'usr_name' => $this->input->post('name'),
                    'usr_ous_id' => $this->input->post('ous_desc'),
                    'usr_password' => md5($this->input->post('password')),
                    'usr_link_id' => $filename
                );
            }
        }
       
            $this->db->where('usr_id', $usr_id);
            return $this->db->update('tbl_user', $data);
     }

     public function get_list_of_results(){

        $this->db->select('*');
        $this->db->from('tbl_result');
        $this->db->join('tbl_cat','tbl_cat.cat_id = tbl_result.res_cat_id');
        $this->db->where('tbl_result.res_cat', 'Result');
        $this->db->order_by('tbl_result.res_dep_desc');
		$this->db->order_by('tbl_result.res_year');
        $this->db->order_by('tbl_cat.cat_desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_list_of_results_Memo(){

        $this->db->select('*');
        $this->db->from('tbl_result');
        $this->db->join('tbl_cat','tbl_cat.cat_id = tbl_result.res_cat_id');
        $this->db->where('tbl_result.res_cat', 'Memo');
        $this->db->order_by('tbl_result.res_dep_desc');
		$this->db->order_by('tbl_result.res_year');
        $this->db->order_by('tbl_cat.cat_desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_list_of_divisions(){
        $this->db->group_by('dep_desc');
		$this->db->order_by('dep_desc');
        $query = $this->db->get('tbl_dep');
        return $query->result_array();
    }

    public function insert_results_docs(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'res_cat' => $this->input->post('res_cat'),
            'res_memo_no' => $this->input->post('res_memo_no'),
            'res_dep_desc' => $this->input->post('res_dep_desc'),
            'res_cat_id' => $this->input->post('res_cat_id'),
            'res_year' => $this->input->post('res_year'),
            'res_filename' => $filename
            
        );
            return $this->db->insert('tbl_result', $data);
     }

     public function get_memo($unit, $cat_id, $year){
        $this->db->where('res_cat', 'Memo');
        $this->db->where('res_dep_desc', $unit);
        $this->db->where('res_cat_id', $cat_id);
        $this->db->where('res_year', $year);
        $result = $this->db->get('tbl_result');
        return $result->row_array();
    
     }

     public function get_result($unit, $cat_id, $year){
        $this->db->where('res_cat', 'Result');
        $this->db->where('res_dep_desc', $unit);
        $this->db->where('res_cat_id', $cat_id);
        $this->db->where('res_year', $year);
        $result = $this->db->get('tbl_result');
        return $result->row_array();
    
     }

     public function delete_result_docs(){
         
        $id = $this->input->post('res_id');
        $this->db->where('res_id', $id);
        $this->db->delete('tbl_result');
        return true;
    }

    public function get_pending_user(){
        if ($this->session->role == "Super Admin"){
            $this->db->where('usr_status', 'pending');
            $query = $this->db->get('tbl_user');
            if($query){
                return $query->num_rows();
            } 
        }elseif ($this->session->role == "Admin"){
            $this->db->where('usr_status', 'pending');
            $this->db->where('usr_ous_id', $this->session->ous_id);
            $query = $this->db->get('tbl_user');
            if($query){
                return $query->num_rows();
            } 
        }
        
    }

    public function count_no_docs(){
        $query = $this->db->get('tbl_file');
        if($query){
            return $query->num_rows();
        } 
         
    }

    public function get_pending_request(){
        $this->db->where('grant_status', 'pending');
        $query = $this->db->get('tbl_grant_ous');
        if($query){
            return $query->num_rows();
        }
       
    }

    public function  get_auth_logs(){
        $this->db->select('*');
        $this->db->from('tbl_log');
        //$this->db->join('tbl_user','tbl_user.usr_id = tbl_log.log_usr_id');
        //$this->db->where('YEAR(tbl_log.log_timestamp)', date('2021'));
        //$this->db->where('MONTH(tbl_log.log_timestamp)', date('m'));
        $this->db->order_by('tbl_log.log_timestamp','Desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_email_admin(){
        $this->db->where('usr_role', 'Admin');
        $this->db->where('usr_ous_id', $this->input->post('ous_id'));
        $result = $this->db->get('tbl_user');
        return $result->result_array();
      
     }

     public function get_user_email_suadmin(){
        $this->db->where('usr_role', 'Super Admin');
        $result = $this->db->get('tbl_user');
        return $result->result_array();
      
     }

    //END OF MYPA

    


     public function block_user_account($param){
        $this->db->where('usr_id', $param);

        $data = array(
            'usr_status' => 'Blocked');
        return $this->db->update('tbl_user', $data);
     }

     public function accreditor_user_account($param){
        $this->db->where('usr_id', $param);

        $data = array(
            'usr_role' => 'Guesr');
        return $this->db->update('tbl_user', $data);
     }

     public function admin_user($param){
        $this->db->where('usr_id', $param);

        $data = array(
            'usr_role' => 'Admin');
        return $this->db->update('tbl_user', $data);
     }

     public function su_user($param){
        $this->db->where('usr_id', $param);

        $data = array(
            'usr_role' => 'Super Admin');
        return $this->db->update('tbl_user', $data);
     }

     public function u_user($param){
        $this->db->where('usr_id', $param);

        $data = array(
            'usr_role' => 'User');
        return $this->db->update('tbl_user', $data);
     }


    public function delete_user_account(){
        $id = $this->input->post('usr_id');
        $this->db->where('usr_id', $id);
        $query = $this->db->delete('tbl_user');
        if($query){
            return true;
        }
       
    }

    public function check_email(){

        $this->db->where('usr_email', $this->input->post('signupemail',true));

        $result = $this->db->get('tbl_user');

        if($result->num_rows() == 1){
            return $result->row_array();
        }else{
            return false;
        }
     }
    
    public function onesignal($insert_id){
            $dataonesignal = array(
            'request_id' => $insert_id,
            'email' => $this->session->email,
            'o_user_id' => $this->input->post('o_user_id')
            
        );
        return $this->db->insert('onesignal_user_id', $dataonesignal);
    }

    //Supply

    public function get_list_of_unit(){
        $this->db->order_by('supply_unit_desc','Asc');
        $query = $this->db->get('tbl_supply_unit');
        return $query->result_array();
    }

    //HR
    public function insert_training_docs($filename_reap, $filename_cot, $filename_tdorf){

        if($filename_reap == null && $filename_cot == null && $filename_tdorf == null){
            $status = "NC";
        }else {
            $status = "C";
        }

        $data = array(
            'usr_id' => $this->input->post('usr_id'),					
            'trn_learn_dev' => $this->input->post('title_LD'),
            'trn_from_date' => $this->input->post('date_from'),
            'trn_to_date' => $this->input->post('date_to'),
            'trn_no_hours' => $this->input->post('no_hours'),
            'trn_type' => $this->input->post('type_LD'),
            'trn_conducted' => $this->input->post('conducted'),
            'trn_objective' => $this->input->post('objective'),
            'trn_outline' => $this->input->post('outline'),
            'trn_cot' => $filename_cot,
            'trn_reap' => $filename_reap,
            'trn_tdorf' => $filename_tdorf,
            'trn_status' => $status
        );
            return $this->db->insert('tbl_hr_training', $data);
     }

     public function insert_training_docs1(){

        if($filename_reap == null && $filename_cot == null && $filename_tdorf == null){
            $status = "NC";
        }else {
            $status = "C";
        }

        $data = array(
            'usr_id' => $this->input->post('usr_id'),					
            'trn_learn_dev' => $this->input->post('title_LD'),
            'trn_from_date' => $this->input->post('date_from'),
            'trn_to_date' => $this->input->post('date_to'),
            'trn_no_hours' => $this->input->post('no_hours'),
            'trn_type' => $this->input->post('type_LD'),
            'trn_conducted' => $this->input->post('conducted'),
            'trn_objective' => $this->input->post('objective'),
            'trn_outline' => $this->input->post('outline'),
            'trn_status' => $status
        );
            return $this->db->insert('tbl_hr_training', $data);
     }

     public function edit_training_docs($filename_reap, $filename_cot, $filename_tdorf){

        if ($filename_reap == null){
        }else{
            $data = array(
                'trn_reap' => $filename_reap,
                'trn_status' => 'C'
            );
            $id = $this->input->post('trn_id');
            $this->db->where('trn_id', $id);
            $this->db->update('tbl_hr_training', $data); 
        }

        if ($filename_cot == null){
        }else{
            $data = array(
                'trn_cot' => $filename_cot,
                'trn_status' => 'C'
            );
            $id = $this->input->post('trn_id');
            $this->db->where('trn_id', $id);
            $this->db->update('tbl_hr_training', $data); 
        }

        if ($filename_tdorf == null){
        }else{
            $data = array(
                'trn_tdorf' => $filename_tdorf,
                'trn_status' => 'C'
            );
            $id = $this->input->post('trn_id');
            $this->db->where('trn_id', $id);
            $this->db->update('tbl_hr_training', $data);
        }

        $data = array(				
            'trn_learn_dev' => $this->input->post('title_LD'),
            'trn_from_date' => $this->input->post('date_from'),
            'trn_to_date' => $this->input->post('date_to'),
            'trn_no_hours' => $this->input->post('no_hours'),
            'trn_type' => $this->input->post('type_LD'),
            'trn_conducted' => $this->input->post('conducted'),
            'trn_objective' => $this->input->post('objective'),
            'trn_outline' => $this->input->post('outline')
        );
    
        $id = $this->input->post('trn_id');
        $this->db->where('trn_id', $id);
        $this->db->update('tbl_hr_training', $data);
        return true;
     }

    public function latest_trainings_of_user(){
         if ($this->session->role == "Super Admin"){
            $this->db->select('*');
            $this->db->from('tbl_hr_training');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
            $this->db->limit(5);
            $this->db->order_by('trn_id','Desc');
            $result = $this->db->get();
            return $result->result_array();
         }elseif ($this->session->role == "Admin"){
            $this->db->select('*');
            $this->db->from('tbl_hr_training');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
            $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
            $this->db->limit(5);
            $this->db->order_by('trn_id','Desc');
            $result = $this->db->get();
            return $result->result_array();
         }  
    }

    public function latest_invitation_attendance(){
           $this->db->select('*');
           $this->db->from('tbl_hr_inv_training');
           $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_inv_training.usr_id');
           $this->db->limit(5);
           $this->db->order_by('inv_trn_memo_mo','Desc');
           $result = $this->db->get();
           return $result->result_array();
   }

     public function list_of_trainings_user(){
        $this->db->where('usr_id', $this->session->usr_id);
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $result = $this->db->get('tbl_hr_training');
        return $result->result_array();
      
     }

     public function num_list_of_trainings_user(){
        $this->db->where('usr_id', $this->session->usr_id);
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
      
     }

     
     public function list_of_trainings_per_user1($usr_id){
        $this->db->where('usr_id', $usr_id);
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $result = $this->db->get('tbl_hr_training');
        return $result->result_array();
      
     }

     public function num_list_of_trainings_per_user1($usr_id){
        $this->db->where('usr_id', $usr_id);
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
      
     }

     public function list_of_trainings_per_user($year){
         if ($year == "All"){

            if ($this->session->role == "Super Admin"){
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_hr_training.trn_from_date','Desc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $this->db->order_by('tbl_ous.ous_desc','Desc');
                $result = $this->db->get();
                return $result->result_array();
            }else {
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_hr_training.trn_from_date','Desc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $this->db->order_by('tbl_ous.ous_desc','Desc');
                $result = $this->db->get();
                return $result->result_array();
            }
          

         }else{

            if ($this->session->role == "Super Admin"){
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->where('YEAR(tbl_hr_training.trn_from_date)', $year);
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_hr_training.trn_from_date','Desc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $this->db->order_by('tbl_ous.ous_desc','Desc');
                $result = $this->db->get();
                return $result->result_array();
            }else {
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
                $this->db->where('YEAR(tbl_hr_training.trn_from_date)', $year);
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_hr_training.trn_from_date','Desc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $this->db->order_by('tbl_ous.ous_desc','Desc');
                $result = $this->db->get();
                return $result->result_array();
            }
          

         }
         
     }

     public function recent_login(){
        if ($this->session->role == "Super Admin"){
            $this->db->select('*');
            $this->db->from('tbl_log');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_log.log_usr_id');
            $this->db->limit(5);
            $this->db->order_by('log_id','Desc');
            $result = $this->db->get();
            return $result->result_array();
        }elseif($this->session->role == "Admin") {
            $this->db->select('*');
            $this->db->from('tbl_log');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_log.log_usr_id');
            $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
            $this->db->limit(5);
            $this->db->order_by('log_id','Desc');
            $result = $this->db->get();
            return $result->result_array();
        }

       
      
     }

    public function delete_training(){
         
        $id = $this->input->post('trn_id');
        $this->db->where('trn_id', $id);
        $this->db->delete('tbl_hr_training');
        return true;
    }

    public function get_notifications_personal_information(){

        $this->db->where('usr_id', $this->session->usr_id);
        $this->db->where('emp_position IS NOT NULL');
        $this->db->where('emp_dob IS NOT NULL');
        $this->db->where('emp_pob IS NOT NULL');
        $this->db->where('emp_citizenship IS NOT NULL');
        $this->db->where('emp_sex IS NOT NULL');
        $this->db->where('emp_civil_status IS NOT NULL');
        $result = $this->db->get('tbl_hr_employee');

        if($result->num_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function training_total(){
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
    }

    public function employee_total(){
        $result = $this->db->get('tbl_hr_employee');
        return $result->num_rows();
    }

    public function OUS_total(){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->group_by('tbl_user.usr_ous_id');
        $result = $this->db->get();

        return $result->num_rows();
    }

    public function technical_total(){
        $this->db->where('trn_type', 'Technical');
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
    }

    public function supervisory_total(){
        $this->db->where('trn_type', 'Supervisory');
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
    }

    public function managerial_total(){
        $this->db->where('trn_type', 'Managerial');
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
    }

    public function leadership_total(){
        $this->db->where('trn_type', 'Leadership');
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
    }

    public function administrative_total(){
        $this->db->where('trn_type', 'Administrative');
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
    }

    //Per Ous Bar Chart
    public function technical_total_bar($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('tbl_hr_training.trn_type', 'Technical');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function supervisory_total_bar($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('tbl_hr_training.trn_type', 'Supervisory');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function managerial_total_bar($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('tbl_hr_training.trn_type', 'Managerial');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function leadership_total_bar($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('tbl_hr_training.trn_type', 'Leadership');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function administrative_total_bar($ous_id){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->where('tbl_user.usr_ous_id ', $ous_id);
        $this->db->where('tbl_hr_training.trn_type', 'Administrative');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function update_user_info() {         

        $data = array(
            'emp_position' => $this->input->post('position'),
            'emp_dob' => $this->input->post('date_of_birth'),
            'emp_pob' => $this->input->post('place_of_birth'),
            'emp_citizenship' => $this->input->post('citizenship'),
            'emp_sex' => $this->input->post('sex'),
            'emp_civil_status	' => $this->input->post('civil_status'),
            'emp_office	' => $this->input->post('office'),
            'emp_status	' => $this->input->post('emp_status'),
            'emp_sg	' => $this->input->post('salary_grade'),
            'emp_eop_1' => $this->input->post('emp_eop1'),
            'emp_eop_2' => $this->input->post('emp_eop2'),
            'emp_eop_3' => $this->input->post('emp_eop3'),
            'emp_eop_4' => $this->input->post('emp_eop4'),
            'emp_eop_5' => $this->input->post('emp_eop5'),
            'emp_eop_6' => $this->input->post('emp_eop6')

        );

        $id = $this->session->usr_id;
        $this->db->where('usr_id', $id);
        $this->db->update('tbl_hr_employee', $data);
        return true;
    }
    
    public function employment_information() {         

        $data = array(
            'emp_position' => $this->input->post('position'),
            'emp_office	' => $this->input->post('office'),
            'emp_status	' => $this->input->post('emp_status'),
            'emp_sg	' => $this->input->post('salary_grade'),
            'emp_eop_1' => $this->input->post('emp_eop1'),
            'emp_eop_2' => $this->input->post('emp_eop2'),
            'emp_eop_3' => $this->input->post('emp_eop3'),
            'emp_eop_4' => $this->input->post('emp_eop4'),
            'emp_eop_5' => $this->input->post('emp_eop5'),
            'emp_eop_6' => $this->input->post('emp_eop6')

        );

        $id = $this->session->usr_id;
        $this->db->where('usr_id', $id);
        $this->db->update('tbl_hr_employee', $data);
        return true;
    }

    public function update_user_info_admin() {

        $data = array(
            'emp_position' => $this->input->post('position'),
            'emp_dob' => $this->input->post('date_of_birth'),
            'emp_pob' => $this->input->post('place_of_birth'),
            'emp_citizenship' => $this->input->post('citizenship'),
            'emp_sex' => $this->input->post('sex'),
            'emp_civil_status' => $this->input->post('civil_status'),
            'emp_office' => $this->input->post('office'),
            'emp_status' => $this->input->post('emp_status'),
            'emp_sg	' => $this->input->post('salary_grade')
        );

        $this->db->where('usr_id', $this->input->post('usr_id'));
        $this->db->update('tbl_hr_employee', $data);
        return true;
    }

    public function get_personal_information(){
        $this->db->where('usr_id', $this->session->usr_id);
        $query = $this->db->get('tbl_hr_employee');
        return $query->row_array();
    }

    //Per Month
    public function jan_total(){
        $this->db->where('MONTH(trn_to_date)', 1);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function feb_total(){
        $this->db->where('MONTH(trn_to_date)', 2);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function mar_total(){
        $this->db->where('MONTH(trn_to_date)', 3);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function apr_total(){
        $this->db->where('MONTH(trn_to_date)', 4);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function may_total(){
        $this->db->where('MONTH(trn_to_date)', 5);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function jun_total(){
        $this->db->where('MONTH(trn_to_date)', 6);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function jul_total(){
        $this->db->where('MONTH(trn_to_date)', 7);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function aug_total(){
        $this->db->where('MONTH(trn_to_date)', 8);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function sep_total(){
        $this->db->where('MONTH(trn_to_date)', 9);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function oct_total(){
        $this->db->where('MONTH(trn_to_date)', 10);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function nov_total(){
        $this->db->where('MONTH(trn_to_date)', 11);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function dec_total(){
        $this->db->where('MONTH(trn_to_date)', 12);
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $result = $this->db->get('tbl_hr_training');

        return $result->result_array();   
    }

    public function OUs(){
        $this->db->order_by('ous_arrangement');
        $result = $this->db->get('tbl_ous');
        return $result->result_array();   
    }

    public function get_employees(){
        
        if($this->session->role=="Super Admin"){
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
            $result = $this->db->get();
            return $result->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
            $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
            $result = $this->db->get();
            return $result->result_array();
        }
       
    }

    public function get_employees_permanent($ous_idx){
        
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
            $this->db->where('tbl_ous.ous_id', $ous_idx);
            $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
             $this->db->where('tbl_user.usr_status', 'Approved');
            $result = $this->db->get();
            return $result->result_array();
        
       
    }

    public function count_training_provider($ous_idx){
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->join('tbl_hr_training','tbl_hr_training.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_ous.ous_id', $ous_idx);
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_hr_training.inv_trn_id IS NOT NULL');
        //$this->db->where('MONTH(tbl_hr_training.trn_to_date) >=', 01);
       //$this->db->where('MONTH(tbl_hr_training.trn_to_date) <=', 06);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_tmpr', '1');
        $this->db->where('tbl_hr_training.trn_remarks', 'Approved');
        $this->db->group_by('tbl_user.usr_id');
        $this->db->group_by('tbl_ous.ous_id');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function count_training_provider_first_semester($ous_idx){
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->join('tbl_hr_training','tbl_hr_training.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_ous.ous_id', $ous_idx);
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_hr_training.inv_trn_id IS NOT NULL');
        $this->db->where('MONTH(tbl_hr_training.trn_to_date) >=', 01);
       $this->db->where('MONTH(tbl_hr_training.trn_to_date) <=', 06);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->group_by('tbl_user.usr_id');
        $this->db->group_by('tbl_ous.ous_id');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_training_provider_second_semester($ous_idx){
        
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->join('tbl_hr_training','tbl_hr_training.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_ous.ous_id', $ous_idx);
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_hr_training.inv_trn_id IS NOT NULL');
        $this->db->where('MONTH(tbl_hr_training.trn_to_date) >=', 07);
        $this->db->where('MONTH(tbl_hr_training.trn_to_date) <=', 12);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->group_by('tbl_user.usr_id');
        $this->db->group_by('tbl_ous.ous_id');
        $result = $this->db->get();
        return $result->num_rows();
    }

    //Per type of L&D CY
    public function technical_total_report4($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_type', 'Technical');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function supervisory_total_report4($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_type', 'Supervisory');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function managerial_total_report4($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_type', 'Managerial');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function leadership_total_report4($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id ', $ous_idx);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_type', 'Leadership');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function administrative_total_report4($ous_id){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->where('tbl_hr_employee.emp_status', 'Permanent');
        $this->db->where('tbl_user.usr_ous_id ', $ous_id);
        $this->db->where('YEAR(tbl_hr_training.trn_to_date)', date('Y')); 
        $this->db->where('tbl_hr_training.trn_type', 'Administrative');
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function list_of_trainings_user_individual($usr_id){
        $this->db->where('usr_id', $usr_id);
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $result = $this->db->get('tbl_hr_training');
        return $result->result_array();
      
     }

     public function num_list_of_trainings_user_individual($usr_id){
        $this->db->where('usr_id', $usr_id);
        $result = $this->db->get('tbl_hr_training');
        return $result->num_rows();
      
     }

     public function list_of_trainings_user_ind($usr_id){
        $this->db->where('usr_id', $usr_id);
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $result = $this->db->get('tbl_hr_training');
        return $result->result_array();
      
     }

     public function list_of_trainings_user_report($year, $month){

        if ($this->session->role == "Admin"){

            if ($month == null){
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
                $this->db->where('YEAR(tbl_hr_training.trn_to_date)', $year);
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_ous.ous_arrangement','Asc');
                $this->db->order_by('tbl_hr_training.trn_from_date','Asc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $result = $this->db->get();
                return $result->result_array();
    
            } else{
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
                $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
                $this->db->where('MONTH(tbl_hr_training.trn_to_date)', $month);
                $this->db->where('YEAR(tbl_hr_training.trn_to_date)', $year);
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_ous.ous_arrangement','Asc');
                $this->db->order_by('tbl_hr_training.trn_from_date','Asc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $result = $this->db->get();
                return $result->result_array();
    
            }

        }else{
            if ($month == null){
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->where('YEAR(tbl_hr_training.trn_to_date)', $year);
                $this->db->order_by('tbl_ous.ous_arrangement','Asc');
                $this->db->order_by('tbl_hr_training.trn_from_date','Asc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $result = $this->db->get();
                return $result->result_array();


    
            } else{
                $this->db->select('*');
                $this->db->from('tbl_hr_training');
                $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
                $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
                $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
                $this->db->where('MONTH(tbl_hr_training.trn_to_date)', $month);
                $this->db->where('YEAR(tbl_hr_training.trn_to_date)', $year);
                $this->db->where('tbl_hr_training.trn_tmpr', 1);
                $this->db->order_by('tbl_ous.ous_arrangement','Asc');
                $this->db->order_by('tbl_hr_training.trn_from_date','Asc');
                $this->db->order_by('tbl_hr_training.trn_learn_dev','Asc');
                $this->db->order_by('tbl_user.usr_name','Asc');
                $result = $this->db->get();
                return $result->result_array();
            }
        }
     }

     public function get_training($trn_id){
        $this->db->where('trn_id', $trn_id);
        $result = $this->db->get('tbl_hr_training');
        return $result->row_array();
     }

     public function get_training_inv_duplicate($inv_trn_memo_mo){
        $this->db->where('inv_trn_memo_mo', $inv_trn_memo_mo);
        $result = $this->db->get('tbl_hr_inv_training');
        return $result->row_array();
     }

     public function insert_training_inv(){
        //trap duplicate
        $inv_trn_memo_mo = $this->input->post('inv_memo_no');
        $result = $this->get_training_inv_duplicate($inv_trn_memo_mo);

        if($result){
        }else{
            $max = $this->get_max_memo();

            if($max == null){
                $max =  1;
            }else{
                $max = $max + 1;
            }

            //check if invitation
            if($this->input->post('trn_tpmr') == '1'){
                $invitation_type = null;
            }else{
                $invitation_type = 'Invitation';
            }

            $uploadData = $this->upload->data();
            $filename = $uploadData['file_name'];

            $data = array(
                'inv_trn_memo_mo' => $this->input->post('inv_memo_no'),
                'trn_title' => $this->input->post('title_LD'),
                'trn_spo_agency' => $this->input->post('spo_agency'),
                'trn_agn_category' => $this->input->post('agn_category'),
                'trn_from_date' => $this->input->post('date_from'),
                'trn_to_date' => $this->input->post('date_to'),
                'trn_no_hours' => $this->input->post('no_hours'),
                'trn_type' => $this->input->post('type_LD'),
                'trn_with_reap' => $this->input->post('reap'),
                'trn_with_tr' => $this->input->post('TR'),
                'trn_trail_no' => $this->input->post('train_no'),
                'trn_inv_file' =>  $filename,
                'trn_qualification' =>  $this->input->post('qualifications'),
                'trn_venue' =>  $this->input->post('venue'),
                'trn_deadline' =>  $this->input->post('date_deadline'),
                'usr_id' =>  $this->session->usr_id,
                'inv_trn_hash' =>  url_title(date('m-Y').' '.$this->input->post('title_LD'),'-', true),
                'trn_tmpr' => $this->input->post('trn_tpmr'),
                'inv_memo_no' =>  $max,
                'trn_output' =>  $this->input->post('trn_output'),
                'trn_others' =>  $this->input->post('trn_others'),
                'trn_subject' =>  $this->input->post('trn_subject'),
                'trn_invitation' =>  $invitation_type
                
            );
                return $this->db->insert('tbl_hr_inv_training', $data);
        }
     }

     public function insert_training_inv1(){

        $max = $this->get_max_memo();

        if($max == null){
            $max =  1;
        }else{
            $max = $max + 1;
        }

         //check if invitation
         if($this->input->post('trn_tpmr') == '1'){
            $invitation_type = null;
        }else{
            $invitation_type = 'Invitation';
        }

        $data = array(
            'inv_trn_memo_mo' => $this->input->post('inv_memo_no'),
            'trn_title' => $this->input->post('title_LD'),
            'trn_spo_agency' => $this->input->post('spo_agency'),
            'trn_agn_category' => $this->input->post('agn_category'),
            'trn_from_date' => $this->input->post('date_from'),
            'trn_to_date' => $this->input->post('date_to'),
            'trn_no_hours' => $this->input->post('no_hours'),
            'trn_type' => $this->input->post('type_LD'),
            'trn_with_reap' => $this->input->post('reap'),
            'trn_with_tr' => $this->input->post('TR'),
            'trn_trail_no' => $this->input->post('train_no'),
            'trn_qualification' =>  $this->input->post('qualifications'),
            'trn_venue' =>  $this->input->post('venue'),
            'trn_deadline' =>  $this->input->post('date_deadline'),
            'usr_id' =>  $this->session->usr_id,
            'inv_trn_hash' =>  url_title(date('m-Y').' '.$this->input->post('title_LD'),'-', true), 
            'inv_memo_no' =>  $max,
            'trn_output' =>  $this->input->post('trn_output'),
            'trn_others' =>  $this->input->post('trn_others'),
            'trn_subject' =>  $this->input->post('trn_subject'),
            'trn_invitation' =>  $invitation_type
        );
            return $this->db->insert('tbl_hr_inv_training', $data);
     }

     public function get_max_memo(){
        $this->db->select_max('inv_memo_no');
        $this->db->from('tbl_hr_inv_training');
        //$this->db->where('YEAR(trn_timestamp)', date('Y'));
        $query = $this->db->get();
        $result = $query->result_array();
        $max = $result[0]['inv_memo_no'];
        return $max;
     }

     public function edit_training_inv(){

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

         //check if invitation
        if($this->input->post('trn_tpmr') == '1'){
            $invitation_type = null;
        }else{
            $invitation_type = 'Invitation';
        }

        $data = array(
            'trn_title' => $this->input->post('title_LD'),
            'trn_spo_agency' => $this->input->post('spo_agency'),
            'trn_agn_category' => $this->input->post('agn_category'),
            'trn_from_date' => $this->input->post('date_from'),
            'trn_to_date' => $this->input->post('date_to'),
            'trn_no_hours' => $this->input->post('no_hours'),
            'trn_type' => $this->input->post('type_LD'),
            'trn_with_reap' => $this->input->post('reap'),
            'trn_with_tr' => $this->input->post('TR'),
            'trn_trail_no' => $this->input->post('train_no'),
            'trn_inv_file' =>  $filename,
            'trn_qualification' =>  $this->input->post('qualifications'),
            'trn_venue' =>  $this->input->post('venue'),
            'trn_deadline' =>  $this->input->post('date_deadline'),
            'usr_id' =>  $this->session->usr_id,
            'inv_trn_hash' =>  url_title(date('m-Y').' '.$this->input->post('title_LD'),'-', true),
            'trn_tmpr' => $this->input->post('trn_tpmr'),
            'trn_output' =>  $this->input->post('trn_output'),
            'trn_others' =>  $this->input->post('trn_others'),
            'trn_subject' =>  $this->input->post('trn_subject')
            
        );
            $this->db->where('inv_trn_memo_mo', $this->input->post('inv_memo_no'));
            return $this->db->update('tbl_hr_inv_training', $data);
     }

     public function edit_training_inv1(){

         //check if invitation
         if($this->input->post('trn_tpmr') == '1'){
            $invitation_type = null;
        }else{
            $invitation_type = 'Invitation';
        }

        $data = array(
            'trn_title' => $this->input->post('title_LD'),
            'trn_spo_agency' => $this->input->post('spo_agency'),
            'trn_agn_category' => $this->input->post('agn_category'),
            'trn_from_date' => $this->input->post('date_from'),
            'trn_to_date' => $this->input->post('date_to'),
            'trn_no_hours' => $this->input->post('no_hours'),
            'trn_type' => $this->input->post('type_LD'),
            'trn_with_reap' => $this->input->post('reap'),
            'trn_with_tr' => $this->input->post('TR'),
            'trn_trail_no' => $this->input->post('train_no'),
            'trn_qualification' =>  $this->input->post('qualifications'),
            'trn_venue' =>  $this->input->post('venue'),
            'trn_deadline' =>  $this->input->post('date_deadline'),
            'usr_id' =>  $this->session->usr_id,
            'inv_trn_hash' =>  url_title(date('m-Y').' '.$this->input->post('title_LD'),'-', true),
            'trn_tmpr' => $this->input->post('trn_tpmr'),
            'trn_output' =>  $this->input->post('trn_output'),
            'trn_others' =>  $this->input->post('trn_others'),
            'trn_subject' =>  $this->input->post('trn_subject')
        );
            $this->db->where('inv_trn_memo_mo', $this->input->post('inv_memo_no'));
            return $this->db->update('tbl_hr_inv_training', $data);
     }

    public function list_of_trainings_inv($year){
        if ($year == "All"){
            $this->db->select('*');
            $this->db->from('tbl_hr_inv_training');
            $this->db->order_by('inv_trn_memo_mo','Desc');
            $result = $this->db->get();
            return $result->result_array();
         }else{
                $this->db->select('*');
                $this->db->from('tbl_hr_inv_training');
                $this->db->where('YEAR(trn_from_date)', $year);
                $this->db->order_by('inv_trn_memo_mo','Desc');
                $result = $this->db->get();
                return $result->result_array();
         }
     }

     public function list_of_trainings_inv_foreign($year){
        if ($year == "All"){

            $this->db->select('*');
            $this->db->from('tbl_hr_inv_training');
            $this->db->where('trn_agn_category', 'Foreign');
            $this->db->order_by('trn_from_date','Desc');
            $result = $this->db->get();
            return $result->result_array();

         }else{

           
                $this->db->select('*');
                $this->db->from('tbl_hr_inv_training');
                $this->db->where('YEAR(trn_from_date)', $year);
                $this->db->where('trn_agn_category', 'Foreign');
                $this->db->order_by('trn_from_date','Desc');
                $result = $this->db->get();
                return $result->result_array();
         }
      
     }

     public function list_of_trainings_inv_national($year){
        if ($year == "All"){

            $this->db->select('*');
            $this->db->from('tbl_hr_inv_training');
            $this->db->where('trn_agn_category', 'National');
            $this->db->order_by('trn_from_date','Desc');
            $result = $this->db->get();
            return $result->result_array();

         }else{

           
                $this->db->select('*');
                $this->db->from('tbl_hr_inv_training');
                $this->db->where('YEAR(trn_from_date)', $year);
                $this->db->where('trn_agn_category', 'National');
                $this->db->order_by('trn_from_date','Desc');
                $result = $this->db->get();
                return $result->result_array();
         }
      
     }

     public function list_of_trainings_inv_local($year){
        if ($year == "All"){

            $this->db->select('*');
            $this->db->from('tbl_hr_inv_training');
            $this->db->where('trn_agn_category', 'local');
            $this->db->order_by('trn_from_date','Desc');
            $result = $this->db->get();
            return $result->result_array();

         }else{

           
                $this->db->select('*');
                $this->db->from('tbl_hr_inv_training');
                $this->db->where('YEAR(trn_from_date)', $year);
                $this->db->where('trn_agn_category', 'local');
                $this->db->order_by('trn_from_date','Desc');
                $result = $this->db->get();
                return $result->result_array();
         }
      
     }

    public function delete_inv_training(){
        $id = $this->input->post('inv_trn_id');
        $this->db->where('inv_trn_id', $id);
        $this->db->delete('tbl_hr_inv_training');
        return true;
    }

    public function get_ous_email(){
        $this->db->order_by('ous_arrangement','Asc');
        $result = $this->db->get('tbl_ous');
        return $result->result_array();
    }

    public function get_nominees($inv_trn_id){
        
        if($this->session->role=="Super Admin"){
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_hr_trn_nominee','tbl_hr_trn_nominee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
            $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $inv_trn_id);
            $result = $this->db->get();
            return $result->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('tbl_user');
            $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_hr_trn_nominee','tbl_hr_trn_nominee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
            $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $inv_trn_id);
            $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
            $result = $this->db->get();
            return $result->result_array();
        }
       
    }

    public function get_nominees_per_ous($inv_trn_id){
        
        if($this->session->role=="Super Admin"){
            $this->db->select('tbl_ous.ous_id, tbl_ous.ous_desc');
            $this->db->from('tbl_user');
            $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_hr_trn_nominee','tbl_hr_trn_nominee.usr_id = tbl_user.usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
            $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $inv_trn_id);
            $this->db->group_by('ous_id');
            $result = $this->db->get();
            return $result->result_array();
        }

    }

    public function nominate_user($usr_id, $inv_trn_id){

        //Trap Duplicate

        //get training invitation details
        $invitation['invitationx'] = $this->get_inv_details($inv_trn_id);
        $trn_learn_dev = $invitation['invitationx']['trn_title'];

        //Trap duplicate training
        $duplicate = $this->get_training_duplicate($trn_learn_dev, $usr_id);
        if($duplicate){
            return false;
        }else{
            
            //Trap
            $result = $this->get_pending_nomination($usr_id, $inv_trn_id);
            if($result){
                return false;
            }else{

                $data = array(
                    'usr_id' => $usr_id,
                    'inv_trn_id' => $inv_trn_id,
                    'nmn_status' => 'Pending'
                );
                return $this->db->insert('tbl_hr_trn_nominee', $data);
            }
        }
    }

    public function get_pending_nomination($usr_id, $inv_trn_id){

        $this->db->where('usr_id', $usr_id);
        $this->db->where('inv_trn_id', $inv_trn_id);
        $result = $this->db->get('tbl_hr_trn_nominee');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function delete_nomination($trn_nmn_id){
        $TDIForm = $this->get_TDIForm($trn_nmn_id);
        unlink('./uploads/TDIForms/'.$TDIForm);
        
        $this->db->where('trn_nmn_id', $trn_nmn_id);
        $this->db->delete('tbl_hr_trn_nominee');
        return true;
     }

     public function get_TDIForm($trn_nmn_id){

        $this->db->where('trn_nmn_id', $trn_nmn_id);
        $query = $this->db->get('tbl_hr_trn_nominee');
        $result = $query->result_array();
        $TDIForm = $result[0]['nmn_tdi_form'];
        return $TDIForm;
     }

    public function upload_tdi_form(){

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'trn_d_attend' => $this->input->post('nmn_d_attend')
        );
        $this->db->where('usr_id', $this->input->post('usr_id'));
        $this->db->where('inv_trn_id', $this->input->post('inv_trn_id'));
        $this->db->update('tbl_hr_training', $data);

        $datax = array(
            'nmn_tdi_form' => $filename
        );
        $this->db->where('trn_nmn_id', $this->input->post('trn_nmn_id'));
        return $this->db->update('tbl_hr_trn_nominee', $datax);
     }

     public function upload_tesda_order(){

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'trn_tesda_order' => $filename
        );
        $this->db->where('inv_trn_id', $this->input->post('inv_trn_id_u'));
        return $this->db->update('tbl_hr_inv_training', $data);
     }

     public function get_inv_trn_details($inv_trn_id){
        $this->db->where('inv_trn_id', $inv_trn_id);
        $result = $this->db->get('tbl_hr_inv_training');
        return $result->row_array();
     }
    
     public function approve_nominee($trn_nmn_id, $usr_id){

        //Trap
        $result = $this->get_approved_nominee($trn_nmn_id);
        if($result){
            return false;
        }else{

            //get inv_trn_id from tbl_hr_trn_nominee
            $training['trainingx'] = $this->get_inv_trn_id($trn_nmn_id);
            $inv_trn_id = $training['trainingx']['inv_trn_id'];

 
            //get training invitation details
            $invitation['invitationx'] = $this->get_inv_details($inv_trn_id);

            if ($invitation['invitationx']['trn_with_reap'] == null && $invitation['invitationx']['trn_with_tr'] == null){
                $status = 'C';
            }else{
                $status = 'NC';
            }

                $data = array(
                    'usr_id' => $usr_id,
                    'trn_learn_dev' => $invitation['invitationx']['trn_title'],
                    'trn_from_date' => $invitation['invitationx']['trn_from_date'],
                    'trn_to_date' => $invitation['invitationx']['trn_to_date'],
                    'trn_no_hours' => $invitation['invitationx']['trn_no_hours'],
                    'trn_type' => $invitation['invitationx']['trn_type'],
                    'trn_conducted' => $invitation['invitationx']['trn_spo_agency'],
                    'trn_status' => $status,
                    'inv_trn_id' => $invitation['invitationx']['inv_trn_id'],
                    'trn_with_reap' => $invitation['invitationx']['trn_with_reap'],
                    'trn_with_tr' => $invitation['invitationx']['trn_with_tr'],
                    'trn_tmpr' => $invitation['invitationx']['trn_tmpr'],
                    'trn_remarks' => 'Approved',
                    'trn_output' => $invitation['invitationx']['trn_output'],
                    'trn_others' => $invitation['invitationx']['trn_others']
                    
                );
                $result = $this->db->insert('tbl_hr_training', $data);

            if($result){
                $datax = array(
                    'nmn_status' => 'Approved'
                );
                $this->db->where('trn_nmn_id', $trn_nmn_id);
                return $this->db->update('tbl_hr_trn_nominee', $datax);
            }else{
                return true;
            }
        }
     }

     public function cancel_nominee($trn_nmn_id, $usr_id){
       
        $datax = array(
            'nmn_status' => 'Pending'
        );
        $this->db->where('trn_nmn_id', $trn_nmn_id);
        return $this->db->update('tbl_hr_trn_nominee', $datax);
     }

     public function postpone_nominee($trn_nmn_id, $inv_trn_id, $usr_id){
        
        $data = array(
            'trn_remarks' => 'Postponed'
        );
        $this->db->where('inv_trn_id', $inv_trn_id);
        $this->db->where('usr_id', $usr_id);
        $this->db->update('tbl_hr_training', $data);

        $datax = array(
            'nmn_status' => 'Postponed'
        );
        $this->db->where('trn_nmn_id', $trn_nmn_id);
        return $this->db->update('tbl_hr_trn_nominee', $datax);
     }

     public function disapprove_nominee($trn_nmn_id, $usr_id){

        //Trap
        $result = $this->get_approved_nominee($trn_nmn_id);
        if($result){
            return false;
        }else{

            //get inv_trn_id from tbl_hr_trn_nominee
            $training['trainingx'] = $this->get_inv_trn_id($trn_nmn_id);
            $inv_trn_id = $training['trainingx']['inv_trn_id'];

            //get training invitation details
            $invitation['invitationx'] = $this->get_inv_details($inv_trn_id);

            if ($invitation['invitationx']['trn_with_reap'] == null && $invitation['invitationx']['trn_with_tr'] == null){
                $status = 'C';
            }else{
                $status = 'NC';
            }

            $data = array(
                'usr_id' => $usr_id,
                'trn_learn_dev' => $invitation['invitationx']['trn_title'],
                'trn_from_date' => $invitation['invitationx']['trn_from_date'],
                'trn_to_date' => $invitation['invitationx']['trn_to_date'],
                'trn_no_hours' => $invitation['invitationx']['trn_no_hours'],
                'trn_type' => $invitation['invitationx']['trn_type'],
                'trn_conducted' => $invitation['invitationx']['trn_spo_agency'],
                'trn_status' => $status,
                'inv_trn_id' => $invitation['invitationx']['inv_trn_id'],
                'trn_with_reap' => $invitation['invitationx']['trn_with_reap'],
                'trn_with_tr' => $invitation['invitationx']['trn_with_tr'],
                'trn_tmpr' => $invitation['invitationx']['trn_tmpr'],
                'trn_remarks' => 'Disapproved',
                'trn_output' => $invitation['invitationx']['trn_output'],
                'trn_others' => $invitation['invitationx']['trn_others']
                
            );
            $result = $this->db->insert('tbl_hr_training', $data);

            if($result){
                $datax = array(
                    'nmn_status' => 'Disapproved'
                );
                $this->db->where('trn_nmn_id', $trn_nmn_id);
                return $this->db->update('tbl_hr_trn_nominee', $datax);
            }else{
                return true;
            }
        }
       
        /*$datax = array(
            'nmn_status' => 'Disapproved'
        );
        $this->db->where('trn_nmn_id', $trn_nmn_id);
        return $this->db->update('tbl_hr_trn_nominee', $datax);*/
     }
     
     public function endorse_nominee($trn_nmn_id, $usr_id){
       
        $datax = array(
            'nmn_status' => 'Endorsed'
        );
        $this->db->where('trn_nmn_id', $trn_nmn_id);
        return $this->db->update('tbl_hr_trn_nominee', $datax);
     }

     public function get_approved_nominee($trn_nmn_id){

        $this->db->where('trn_nmn_id ', $trn_nmn_id);
        $this->db->where('nmn_status', 'Approved');
        //$this->db->or_where('nmn_status', 'dispproved');
        $result = $this->db->get('tbl_hr_trn_nominee');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_inv_trn_id($trn_nmn_id){
        $this->db->where('trn_nmn_id', $trn_nmn_id);
        $result = $this->db->get('tbl_hr_trn_nominee');
        return $result->row_array();
     }

     public function get_inv_details($inv_trn_id){
        $this->db->where('inv_trn_id ', $inv_trn_id );
        $result = $this->db->get('tbl_hr_inv_training');
        return $result->row_array();
     }

     public function list_of_vacant_position($year){
        $this->db->select('*');
        $this->db->from('tbl_hr_vacant');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_vacant.vac_ous_id');
        $this->db->where('YEAR(tbl_hr_vacant.vac_date_posted)', $year);
        $this->db->order_by('tbl_hr_vacant.vac_deadline','Desc');
        $this->db->order_by('tbl_ous.ous_desc','Asc');
        $this->db->order_by('tbl_hr_vacant.vac_sg','Desc');
        $result = $this->db->get();
        return $result->result_array();
      
     }

     public function insert_vacant_position(){

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'vac_plantilla_no' => $this->input->post('vac_plantilla_no'),
            'vac_desc' => $this->input->post('vac_desc')
            
        );
            return $this->db->insert('tbl_hr_vacant', $data);
     }

     public function upload_memorandum(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        //update Status
        $inv_trn_id = $this->input->post('inv_trn_id');
        $ous_id = $this->session->ous_id;
        $this->ous_inv_for_action_update($ous_id, $inv_trn_id);
        
        $data = array(
            'nom_ous_id_uploader' => $this->session->ous_id,
            'inv_trn_id' => $this->input->post('inv_trn_id'),
            'nom_ous_memo_no' => $this->input->post('nom_ous_memo_no'),
            'nom_ous_memo_filename' => $filename
        );
        return $this->db->insert('tbl_hr_inv_ous_memo', $data);
     }



    public function get_inv_ous_memo($inv_trn_id){
        $this->db->where('inv_trn_id', $inv_trn_id);
        $this->db->where('nom_ous_id_uploader', $this->session->ous_id);
        $this->db->order_by('no_ous_timestamp', 'Desc');
        $query = $this->db->get('tbl_hr_inv_ous_memo');
        if($query->num_rows() >= 1){
            return $return = $query->row_array();
        }else{
            
        }  
    }

    //get latest uploaded memorandum by the admins of OUs
    public function get_inv_ous_memo_all($inv_trn_id){
        $this->db->select('*');
        $this->db->from('tbl_hr_inv_ous_memo');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_inv_ous_memo.nom_ous_id_uploader');
        $this->db->where('tbl_hr_inv_ous_memo.inv_trn_id', $inv_trn_id);
        $this->db->order_by('tbl_hr_inv_ous_memo.no_ous_timestamp', 'Desc');
        //$this->db->limit(1);
        $query = $this->db->get();
        return $return = $query->result_array();       
    }

    public function get_approved_nominees($param){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_employee.emp_ous');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $param);
        $this->db->where('tbl_hr_trn_nominee.nmn_status', 'Endorsed');
        $this->db->order_by('tbl_ous.ous_desc','Desc');
        $this->db->order_by('tbl_user.usr_name','Asc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_version(){
        $this->db->where('ver_id ', 1);
        $result = $this->db->get('tbl_version');
        return $result->row_array();
     }
    
    public function get_training_duplicate($trn_learn_dev, $usr_id){

        $today = date("Y")-3;
        $newdate = date("Y", strtotime("-3 years", strtotime($today)));
       
        $this->db->where('trn_learn_dev', $trn_learn_dev);
        $this->db->where('YEAR(trn_to_date) >=', $today);
        $this->db->where('usr_id', $usr_id);
        $this->db->where('trn_remarks', 'Approved');
        $result = $this->db->get('tbl_hr_training');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function update_user_info_pds_sheet1() {

        //tbl_hr_employee
        $data = array(
            'emp_dob' => $this->input->post('date_of_birth'),
            'emp_pob' => $this->input->post('place_of_birth'),
            'emp_citizenship' => $this->input->post('citizenship'),
            'emp_sex' => $this->input->post('sex'),
            'emp_civil_status' => $this->input->post('civil_status')
        );

        $this->db->where('usr_id', $this->session->usr_id);
        $this->db->update('tbl_hr_employee', $data);

        //trap if there is existing record -> tbl_hr_personal_informaion
        $pds_sheet1_record = $this->get_pds_sheet1_record();
        if($pds_sheet1_record){
            
            //Update
            $data = array(  
                'usr_id' => $this->session->usr_id,
                'pi_surname' => $this->input->post('pi_surname'),
                'pi_firstname' => $this->input->post('pi_firstname'),
                'pi_middlename' => $this->input->post('pi_middlename'),
                'pi_extname' => $this->input->post('pi_extname'),
                'pi_height' => $this->input->post('pi_height'),
                'pi_weight' => $this->input->post('pi_weight'),
                'pi_blood_type' => $this->input->post('pi_blood_type'),
                'pi_gsis' => $this->input->post('pi_gsis'),
                'pi_pagibig' => $this->input->post('pi_pagibig'),
                'pi_philhealth' => $this->input->post('pi_philhealth'),
                'pi_sss' => $this->input->post('pi_sss'),
                'pi_tin_no' => $this->input->post('pi_tin_no'),
                'pi_employee_id' => $this->input->post('pi_employee_id'),
                'pi_ra_block_no' => $this->input->post('pi_ra_block_no'),
                'pi_ra_street' => $this->input->post('pi_ra_street'),
                'pi_ra_subdivision' => $this->input->post('pi_ra_subdivision'),
                'pi_ra_barangay' => $this->input->post('pi_ra_barangay'),
                'pi_ra_municipality' => $this->input->post('pi_ra_municipality'),
                'pi_ra_province' => $this->input->post('pi_ra_province'),
                'pi_ra_zip' => $this->input->post('pi_ra_zip'),
                'pi_pa_block_no' => $this->input->post('pi_pa_block_no'),
                'pi_pa_street' => $this->input->post('pi_pa_street'),
                'pi_pa_subdivision' => $this->input->post('pi_pa_subdivision'),
                'pi_pa_barangay' => $this->input->post('pi_pa_barangay'),
                'pi_pa_municipality' => $this->input->post('pi_pa_municipality'),
                'pi_pa_province' => $this->input->post('pi_pa_province'),
                'pi_pa_zip' => $this->input->post('pi_pa_zip'),
                'pi_telephone' => $this->input->post('pi_telephone'),
                'pi_mobile' => $this->input->post('pi_mobile'),
                'pi_email' => $this->input->post('pi_email')
            );

            $this->db->where('usr_id', $this->session->usr_id);
            $this->db->update('tbl_hr_personal_information', $data);

        }else{

            //Insert
            $data = array(
                'usr_id' => $this->session->usr_id,
                'pi_surname' => $this->input->post('pi_surname'),
                'pi_firstname' => $this->input->post('pi_firstname'),
                'pi_middlename' => $this->input->post('pi_middlename'),
                'pi_extname' => $this->input->post('pi_extname'),
                'pi_height' => $this->input->post('pi_height'),
                'pi_weight' => $this->input->post('pi_weight'),
                'pi_blood_type' => $this->input->post('pi_blood_type'),
                'pi_gsis' => $this->input->post('pi_gsis'),
                'pi_pagibig' => $this->input->post('pi_pagibig'),
                'pi_philhealth' => $this->input->post('pi_philhealth'),
                'pi_sss' => $this->input->post('pi_sss'),
                'pi_tin_no' => $this->input->post('pi_tin_no'),
                'pi_employee_id' => $this->input->post('pi_employee_id'),
                'pi_ra_block_no' => $this->input->post('pi_ra_block_no'),
                'pi_ra_street' => $this->input->post('pi_ra_street'),
                'pi_ra_subdivision' => $this->input->post('pi_ra_subdivision'),
                'pi_ra_barangay' => $this->input->post('pi_ra_barangay'),
                'pi_ra_municipality' => $this->input->post('pi_ra_municipality'),
                'pi_ra_province' => $this->input->post('pi_ra_province'),
                'pi_ra_zip' => $this->input->post('pi_ra_zip'),
                'pi_pa_block_no' => $this->input->post('pi_pa_block_no'),
                'pi_pa_street' => $this->input->post('pi_pa_street'),
                'pi_pa_subdivision' => $this->input->post('pi_pa_subdivision'),
                'pi_pa_barangay' => $this->input->post('pi_pa_barangay'),
                'pi_pa_municipality' => $this->input->post('pi_pa_municipality'),
                'pi_pa_province' => $this->input->post('pi_pa_province'),
                'pi_pa_zip' => $this->input->post('pi_pa_zip'),
                'pi_telephone' => $this->input->post('pi_telephone'),
                'pi_mobile' => $this->input->post('pi_mobile'),
                'pi_email' => $this->input->post('pi_email')
            );
            $this->db->insert('tbl_hr_personal_information', $data);
        }

        return true;
    }

    public function update_user_info_pds_sheet1_1() {
        
        //trap if there is existing record -> tbl_hr_educational_background
        $pds_sheet1_1_record = $this->get_pds_sheet1_1_record();
        if($pds_sheet1_1_record){
            
            //Update
            $data = array(  
                'fb_usr_id' => $this->session->usr_id,
                'fb_spouse_surname' => $this->input->post('fb_spouse_surname'),
                'fb_spouse_fname' => $this->input->post('fb_spouse_fname'),
                'fb_spouse_mname' => $this->input->post('fb_spouse_mname'),
                'fb_spouse_extname' => $this->input->post('fb_spouse_extname'),
                'fb_spouse_occupation' => $this->input->post('fb_spouse_occupation'),
                'fb_spouse_business' => $this->input->post('fb_spouse_business'),
                'fb_spouse_business_address' => $this->input->post('fb_spouse_business_address'),
                'fb_spouse_telephone' => $this->input->post('fb_spouse_telephone'),
                'fb_father_surname' => $this->input->post('fb_father_surname'),
                'fb_father_fname' => $this->input->post('fb_father_fname'),
                'fb_father_mname' => $this->input->post('fb_father_mname'),
                'fb_father_extname' => $this->input->post('fb_father_extname'),
                'fb_mother_surname' => $this->input->post('fb_mother_surname'),
                'fb_mother_fname' => $this->input->post('fb_mother_fname'),
                'fb_mother_mname' => $this->input->post('fb_mother_mname')
            );

            $this->db->where('fb_usr_id', $this->session->usr_id);
            $this->db->update('tbl_hr_family_background', $data);

        }else{

            //Insert
            $data = array(
                'fb_usr_id' => $this->session->usr_id,
                'fb_spouse_surname' => $this->input->post('fb_spouse_surname'),
                'fb_spouse_fname' => $this->input->post('fb_spouse_fname'),
                'fb_spouse_mname' => $this->input->post('fb_spouse_mname'),
                'fb_spouse_extname' => $this->input->post('fb_spouse_extname'),
                'fb_spouse_occupation' => $this->input->post('fb_spouse_occupation'),
                'fb_spouse_business' => $this->input->post('fb_spouse_business'),
                'fb_spouse_business_address' => $this->input->post('fb_spouse_business_address'),
                'fb_spouse_telephone' => $this->input->post('fb_spouse_telephone'),
                'fb_father_surname' => $this->input->post('fb_father_surname'),
                'fb_father_fname' => $this->input->post('fb_father_fname'),
                'fb_father_mname' => $this->input->post('fb_father_mname'),
                'fb_father_extname' => $this->input->post('fb_father_extname'),
                'fb_mother_surname' => $this->input->post('fb_mother_surname'),
                'fb_mother_fname' => $this->input->post('fb_mother_fname'),
                'fb_mother_mname' => $this->input->post('fb_mother_mname')
            );
            $this->db->insert('tbl_hr_family_background', $data);
        }

        return true;
    }

    public function get_pds_sheet1_record(){

        $this->db->where('usr_id', $this->session->usr_id);
        $result = $this->db->get('tbl_hr_personal_information');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_pds_sheet1_1_record(){

        $this->db->where('fb_usr_id', $this->session->usr_id);
        $result = $this->db->get('tbl_hr_family_background');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_personal_information_pds_sheet1(){
        $this->db->where('usr_id', $this->session->usr_id);
        $query = $this->db->get('tbl_hr_personal_information');
        return $query->row_array();
    }

    public function get_personal_information_pds_sheet1_1(){
        $this->db->where('fb_usr_id', $this->session->usr_id);
        $query = $this->db->get('tbl_hr_family_background');
        return $query->row_array();
    }

    public function update_notification_one_signal() {

        //tbl_onesignal_notification
        $data = array(
            'os_usr_id' => $this->session->usr_id,
            'os_usr_key' => $this->input->post('o_user_id')
        );
        $this->db->insert('tbl_onesignal_notification', $data);

        return true;
    }

    //One Signal
    public function get_o_user_id(){
        $result = $this->db->get('tbl_onesignal_notification');
        return $result->result_array();
    }

    //Get One Signal ID of each employee
    public function get_one_signal_user_id($usr_id){
        $this->db->where('os_usr_id', $usr_id);
        $result = $this->db->get('tbl_onesignal_notification');
        return $result->result_array();
    }

    //Accounts with One Signal Subscription
    public function get_accounts_onesignal(){
        $this->db->select('*');
        $this->db->from('tbl_onesignal_notification');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_onesignal_notification.os_usr_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Accounts with One Signal Subscription per notification
    public function get_accounts_onesignal_emp($os_user_id){
        $this->db->select('*');
        $this->db->from('tbl_onesignal_notification');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_onesignal_notification.os_usr_id');
        $this->db->where('os_usr_key', $os_user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Family Background name of Children
    public function get_family_background_children(){
        $this->db->where('chi_usr_id', $this->session->usr_id);
        $this->db->order_by('chi_date','Asc');
        $result = $this->db->get('tbl_hr_children');
        return $result->result();
    }

    public function get_family_background_children_array(){
        $this->db->where('chi_usr_id', $this->session->usr_id);
        $this->db->order_by('chi_date','Asc');
        $result = $this->db->get('tbl_hr_children');
        return $result->result_array();
    }

    public function children_data_save(){
        $data = array(
                'chi_usr_id'  => $this->session->usr_id, 
                'chi_name'  => $this->input->post('chi_name'), 
                'chi_date' => $this->input->post('chi_date') 
            );
        $result=$this->db->insert('tbl_hr_children',$data);
        return $result;
    }

    public function children_data_delete(){
        $this->db->where('chi_id', $this->input->post('chi_id'));
        $result=$this->db->delete('tbl_hr_children');
        return $result;
    }

    public function get_hr_eb_level(){
        $this->db->order_by('eb_order','Asc');
        $result=$this->db->get('tbl_hr_eb_level');
        return $result->result_array();
    }

    //Educational Background 
    public function get_educational_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->order_by('tbl_hr_eb_level.eb_order','Asc');
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function educational_data_save(){
        $data = array(
                'eb_usr_id'  => $this->session->usr_id,
                'eb_level_id'  => $this->input->post('eb_level_id'), 
                'eb_name_school'  => $this->input->post('eb_name_school'), 
                'eb_degree' => $this->input->post('eb_degree'), 
                'eb_from'  => $this->input->post('eb_from'), 
                'eb_to' => $this->input->post('eb_to'), 
                'eb_highest_level'  => $this->input->post('eb_highest_level'), 
                'eb_year_graduated' => $this->input->post('eb_year_graduated'), 
                'eb_award' => $this->input->post('eb_award')
                
            );
        $result=$this->db->insert('tbl_hr_educational_background',$data);
        return $result;
    }

    public function educational_data_update(){
        $eb_id = $this->input->post('eb_id_edit');
        $data = array( 
                'eb_level_id' => $this->input->post('eb_level_id_edit'), 
                'eb_name_school'  => $this->input->post('eb_name_school_edit'), 
                'eb_degree' => $this->input->post('eb_degree_edit'), 
                'eb_from'  => $this->input->post('eb_from_edit'), 
                'eb_to' => $this->input->post('eb_to_edit'), 
                'eb_highest_level'  => $this->input->post('eb_highest_level_edit'), 
                'eb_year_graduated' => $this->input->post('eb_year_graduated_edit'), 
                'eb_award' => $this->input->post('eb_award_edit')
            );

        $this->db->where('eb_id', $eb_id);
        $result = $this->db->update('tbl_hr_educational_background', $data);
        return $result;
    }

    public function educational_data_delete(){
        $this->db->where('eb_id', $this->input->post('eb_id'));
        $result=$this->db->delete('tbl_hr_educational_background');
        return $result;
    }

    //Educational Background Elementary
    public function get_educational_data_elementary(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 1);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_educational_data_elementary_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 1);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(100,1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Educational Background Secondary
    public function get_educational_data_secondary(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 2);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_educational_data_secondary_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 2);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(100,1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Educational Background Vocational
    public function get_educational_data_vocational(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 3);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_educational_data_vocational_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 3);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(100,1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Educational Background College
    public function get_educational_data_college(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 4);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_educational_data_college_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 4);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(100,1);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Educational Background Grdauate
    public function get_educational_data_graduate(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 5);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_educational_data_graduate_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_educational_background');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_educational_background.eb_usr_id');
        $this->db->join('tbl_hr_eb_level','tbl_hr_eb_level.eb_level_id = tbl_hr_educational_background.eb_level_id');
        $this->db->where('tbl_hr_educational_background.eb_level_id', 5);
        $this->db->where('tbl_hr_educational_background.eb_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_educational_background.eb_from','Asc');
        $this->db->limit(100, 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    /*public function get_operating_units_admin_onesignal_key($ous_id){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_user','tbl_onesignal_notification.os_usr_id = tbl_onesignal_notification.os_usr_id');
        $this->db->where('tbl_user.usr_ous_id', $ous_id);
        $this->db->where('tbl_user.usr_role', 'Admin');
        $query = $this->db->get();
        return $query->result_array();
    }*/

    public function upload_memo_endorsement(){

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'trn_memo_endorsement' => $filename
        );
        $this->db->where('inv_trn_id', $this->input->post('inv_trn_id'));
        return $this->db->update('tbl_hr_inv_training', $data);
     }

    //Eligibility Data 
    public function get_eligibility_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_eligibility');
        $this->db->where('tbl_hr_eligibility.eli_usr_id', $this->session->usr_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function eligibility_data_save(){
        $data = array(
                'eli_usr_id'  => $this->session->usr_id,
                'eli_desc'  => $this->input->post('eli_desc'), 
                'eli_rating'  => $this->input->post('eli_rating'), 
                'eli_date_of_examination' => $this->input->post('eli_date_of_examination'), 
                'eli_place_of_examination'  => $this->input->post('eli_place_of_examination'), 
                'eli_number' => $this->input->post('eli_number'), 
                'eli_date_of_validity'  => $this->input->post('eli_date_of_validity')
            );
        $result=$this->db->insert('tbl_hr_eligibility',$data);
        return $result;
    }

    public function eligibility_data_edit(){
        $data = array(
                'eli_usr_id'  => $this->session->usr_id,
                'eli_desc'  => $this->input->post('eli_desc'), 
                'eli_rating'  => $this->input->post('eli_rating'), 
                'eli_date_of_examination' => $this->input->post('eli_date_of_examination'), 
                'eli_place_of_examination'  => $this->input->post('eli_place_of_examination'), 
                'eli_number' => $this->input->post('eli_number'), 
                'eli_date_of_validity'  => $this->input->post('eli_date_of_validity')
            );
        $this->db->where('eli_id', $this->input->post('eli_id'));
        $result=$this->db->update('tbl_hr_eligibility', $data);
        return $result;
    }

    public function eligibility_data_delete(){
        $this->db->where('eli_id', $this->input->post('eli_id'));
        $result=$this->db->delete('tbl_hr_eligibility');
        return $result;
    }

    public function maintenance_on(){
        $data = array(
            'main_status' => '1'
        );
        $this->db->where('main_id', '1');
        return $this->db->update('tbl_maintenance', $data);
    }

    public function maintenance_off(){
        $data = array(
            'main_status' => '0'
        );
        $this->db->where('main_id', '1');
        return $this->db->update('tbl_maintenance', $data);
    }

    public function get_maintenance_status(){
        $query = $this->db->get('tbl_maintenance');
        return $query->row_array();
    }

    //Work Experience Data 
    public function get_work_experience_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_work_experience');
        $this->db->where('tbl_hr_work_experience.we_usr_id', $this->session->usr_id);
        $this->db->order_by('we_from','Desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function work_experience_data_save(){
        $data = array(
                'we_usr_id'  => $this->session->usr_id,
                'we_from'  => $this->input->post('we_from'),
                'we_to'  => $this->input->post('we_to'), 
                'we_position_title'  => $this->input->post('we_position_title'), 
                'we_agency' => $this->input->post('we_agency'), 
                'we_salary'  => $this->input->post('we_salary'), 
                'we_sg' => $this->input->post('we_sg'), 
                'we_status' => $this->input->post('we_status'), 
                'we_service'  => $this->input->post('we_service')
            );
        $result=$this->db->insert('tbl_hr_work_experience',$data);
        return $result;
    }

    public function work_experience_data_edit(){
        $data = array(
                'we_usr_id'  => $this->session->usr_id,
                'we_from'  => $this->input->post('we_from'),
                'we_to'  => $this->input->post('we_to'), 
                'we_position_title'  => $this->input->post('we_position_title'), 
                'we_agency' => $this->input->post('we_agency'), 
                'we_salary'  => $this->input->post('we_salary'), 
                'we_sg' => $this->input->post('we_sg'), 
                'we_status' => $this->input->post('we_status'), 
                'we_service'  => $this->input->post('we_service')
            );
        $this->db->where('we_id', $this->input->post('we_id'));
        $result=$this->db->update('tbl_hr_work_experience',$data);
        return $result;
    }

    public function work_experience_data_delete(){
        $this->db->where('we_id', $this->input->post('we_id'));
        $result=$this->db->delete('tbl_hr_work_experience');
        return $result;
    }

    //duplicate
    public function work_experience_data_duplicate(){
        $this->db->where('we_id', $this->input->post('we_id_duplicate'));
        $query=$this->db->get('tbl_hr_work_experience');
        $data = $query->row_array();

        //
        $we_from = $data['we_from'];
        $we_to = $data['we_to'];
        $we_position_title = $data['we_position_title'];
        $we_agency = $data['we_agency'];
        $we_salary = $data['we_salary'];
        $we_sg = $data['we_sg'];
        $we_status = $data['we_status'];
        $we_service = $data['we_service'];

        $data = array(
            'we_usr_id'  => $this->session->usr_id,
            'we_from'  => $we_from,
            'we_to'  => $we_to, 
            'we_position_title'  => $we_position_title, 
            'we_agency' => $we_agency, 
            'we_salary'  => $we_salary, 
            'we_sg' => $we_sg, 
            'we_status' => $we_status, 
            'we_service'  => $we_service
        );
        $result=$this->db->insert('tbl_hr_work_experience',$data);
        return $result;
    }

    //Learning and Development
    public function get_learning_and_development(){
        $this->db->where('usr_id', $this->session->usr_id);
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $result = $this->db->get('tbl_hr_training');
        return $result->result();
     }

     /*public function get_learning_and_development_pds(){
        $this->db->where('usr_id', $this->session->usr_id);
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $this->db->limit(17);
        $result = $this->db->get('tbl_hr_training');
        return $result->result_array();
     }*/
     
     
     public function get_learning_and_development_pds() {
        // First Query: Select rows where date = '0000-00-00'
        $this->db->where('trn_from_date', '0000-00-00');
        $this->db->where('usr_id', $this->session->usr_id);
        $query1 = $this->db->get('tbl_hr_training');
        $result1 = $query1->result_array();
        
        $remaining_limit = 17 - count($result1);
      
        // Second Query: Fetch remaining rows if needed
        $result2 = [];
        if ($remaining_limit > 0) {
            $this->db->where('usr_id', $this->session->usr_id);
            $this->db->where('trn_from_date !=', '0000-00-00'); // Exclude rows already fetched
            $this->db->order_by('trn_from_date', 'Desc');
            $this->db->order_by('trn_learn_dev', 'Asc');
            $this->db->limit($remaining_limit); // Adjust limit dynamically
            $query2 = $this->db->get('tbl_hr_training');
            $result2 = $query2->result_array();
        }
    
        // Combine results
        $final_result = array_merge($result1, $result2);
    
        return $final_result;
    }

     public function get_learning_and_development_pds_offset(){
        $this->db->where('usr_id', $this->session->usr_id);
        $this->db->where('trn_from_date !=', '0000-00-00'); // Exclude rows already fetched
        $this->db->order_by('trn_from_date','Desc');
        $this->db->order_by('trn_learn_dev','Asc');
        $this->db->limit(1000, 17);
        $result = $this->db->get('tbl_hr_training');
        return $result->result_array();
     }

     public function get_user_training_details($usr_id, $inv_trn_id){
        $this->db->where('usr_id', $usr_id);
        $this->db->where('inv_trn_id', $inv_trn_id);
        $result = $this->db->get('tbl_hr_training');
        return $result->row_array();

        if($result->num_rows() >= 1){
             return true;
        }else{
            return false;
        }
     }

     public function update_training_details($usr_id, $inv_trn_id, $type){
        if ($type == 'Approved'){
            $data = array(
                'trn_remarks' => 'Approved'
            );
            $this->db->where('usr_id', $usr_id);
            $this->db->where('inv_trn_id', $inv_trn_id);
            $result = $this->db->update('tbl_hr_training', $data);
    
            if($result){
                $datax = array(
                    'nmn_status' => 'Approved'
                );
                $this->db->where('usr_id', $usr_id);
                $this->db->where('inv_trn_id', $inv_trn_id);
                return $this->db->update('tbl_hr_trn_nominee', $datax);
            }
        }else{
            $data = array(
                'trn_remarks' => 'Disapproved'
            );
            $this->db->where('usr_id', $usr_id);
            $this->db->where('inv_trn_id', $inv_trn_id);
            $result = $this->db->update('tbl_hr_training', $data);
    
            if($result){
                $datax = array(
                    'nmn_status' => 'Disapproved'
                );
                $this->db->where('usr_id', $usr_id);
                $this->db->where('inv_trn_id', $inv_trn_id);
                return $this->db->update('tbl_hr_trn_nominee', $datax);
            }
        }
        
       
     }

    //Voluntary Work 
    public function get_voluntary_work_data(){
        $this->db->select('*');
        $this->db->from('tbl_voluntary_work');
        $this->db->where('tbl_voluntary_work.vw_usr_id', $this->session->usr_id);
        $this->db->order_by('vw_from','Desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function voluntary_work_data_save(){
       /* if($this->input->post('vw_present')=='1'){
            $to = 'Present';
        }else{
            $to = $this->input->post('vw_to');
        }*/
        $data = array(
                'vw_usr_id'  => $this->session->usr_id,
                'vw_organization'  => $this->input->post('vw_organization'),
                'vw_from'  => $this->input->post('vw_from'), 
                'vw_to'  => $this->input->post('vw_to'), 
                'vw_hours'  => $this->input->post('vw_hours'), 
                'vw_position' => $this->input->post('vw_position')
            );
        $result=$this->db->insert('tbl_voluntary_work',$data);
        return $result;
    }

    public function voluntary_work_data_edit(){
        /* if($this->input->post('vw_present')=='1'){
             $to = 'Present';
         }else{
             $to = $this->input->post('vw_to');
         }*/
         $data = array(
                 'vw_usr_id'  => $this->session->usr_id,
                 'vw_organization'  => $this->input->post('vw_organization'),
                 'vw_from'  => $this->input->post('vw_from'), 
                 'vw_to'  => $this->input->post('vw_to'), 
                 'vw_hours'  => $this->input->post('vw_hours'), 
                 'vw_position' => $this->input->post('vw_position')
             );
        $this->db->where('vw_id', $this->input->post('vw_id'));
         $result=$this->db->update('tbl_voluntary_work',$data);
         return $result;
     }

    public function voluntary_work_data_delete(){
        $this->db->where('vw_id', $this->input->post('vw_id'));
        $result=$this->db->delete('tbl_voluntary_work');
        return $result;
    }

    //Voluntary Work 
    public function get_voluntary_work_data_pds2(){
        $this->db->select('*');
        $this->db->from('tbl_voluntary_work');
        $this->db->where('tbl_voluntary_work.vw_usr_id', $this->session->usr_id);
        $this->db->order_by('vw_to','Desc');
        $this->db->limit(5);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_voluntary_work_data_pds2_offset(){
        $this->db->select('*');
        $this->db->from('tbl_voluntary_work');
        $this->db->where('tbl_voluntary_work.vw_usr_id', $this->session->usr_id);
        $this->db->order_by('vw_to','Desc');
        $this->db->limit(100, 5);
        $result = $this->db->get();
        return $result->result_array();
    }

    //Get Eligibility Data 
    public function get_eligibility_data_pds2(){
        $this->db->select('*');
        $this->db->from('tbl_hr_eligibility');
        $this->db->where('tbl_hr_eligibility.eli_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_eligibility.eli_date_of_examination','Desc');
        $this->db->limit(5);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_eligibility_data_pds2_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_eligibility');
        $this->db->where('tbl_hr_eligibility.eli_usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_eligibility.eli_date_of_examination','Desc');
        $this->db->limit(100, 5);
        $result = $this->db->get();
        return $result->result_array();
    }

    //Work Experience Data 
    public function get_work_experience_data_pds2(){
        $this->db->select('*');
        $this->db->from('tbl_hr_work_experience');
        $this->db->where('tbl_hr_work_experience.we_usr_id', $this->session->usr_id);
        $this->db->limit(25);
        $this->db->order_by('we_from','Desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_work_experience_data_pds2_offset1(){
        $this->db->select('*');
        $this->db->from('tbl_hr_work_experience');
        $this->db->where('tbl_hr_work_experience.we_usr_id', $this->session->usr_id);
        $this->db->order_by('we_from','Desc');
        $this->db->limit(1000, 25);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function ous_inv_for_action_save($ous_id, $inv_trn_id){
        $data = array(
            'act_ous_id'  => $ous_id,
            'act_inv_trn_id'  => $inv_trn_id
        );
    $result = $this->db->insert('tbl_hr_ous_action', $data);
    return $result;
    }

    public function ous_inv_for_action_update($ous_id, $inv_trn_id){
        $data = array(
            'act_status'  => 'Done'
        );
    $this->db->where('act_ous_id', $ous_id);
    $this->db->where('act_inv_trn_id', $inv_trn_id);
    $result = $this->db->update('tbl_hr_ous_action', $data);
    return $result;
    }

    //Get ous need for action
    public function get_ous_inv_for_action_save($act_inv_trn_id){
        $this->db->select('*');
        $this->db->from('tbl_hr_ous_action');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_ous_action.act_ous_id');
        $this->db->where('tbl_hr_ous_action.act_inv_trn_id', $act_inv_trn_id);
        $this->db->order_by('tbl_ous.ous_arrangement','Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Hobbies 
    public function get_hobbies_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_hobbies');
        $this->db->where('tbl_hr_hobbies.hb_usr_id', $this->session->usr_id);
        $this->db->order_by('hb_desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_hobbies_data_array(){
        $this->db->select('*');
        $this->db->from('tbl_hr_hobbies');
        $this->db->where('tbl_hr_hobbies.hb_usr_id', $this->session->usr_id);
        $this->db->order_by('hb_desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_hobbies_data_array_offset(){
        $this->db->select('*');
        $this->db->from('tbl_hr_hobbies');
        $this->db->where('tbl_hr_hobbies.hb_usr_id', $this->session->usr_id);
        $this->db->order_by('hb_desc');
        $this->db->limit(100, 5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_hobbies_data_array_offset_num_rows(){
        $this->db->select('*');
        $this->db->from('tbl_hr_hobbies');
        $this->db->where('tbl_hr_hobbies.hb_usr_id', $this->session->usr_id);
        $this->db->order_by('hb_desc');
        $this->db->limit(100, 5);
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function hobbies_data_save(){
        $data = array(
                'hb_usr_id'  => $this->session->usr_id,
                'hb_desc'  => $this->input->post('hb_desc')
            );
        $result=$this->db->insert('tbl_hr_hobbies',$data);
        return $result;
    }

    public function hobbies_data_delete(){
        $this->db->where('hb_id', $this->input->post('hb_id'));
        $result=$this->db->delete('tbl_hr_hobbies');
        return $result;
    }

    //Recognition 
    public function get_recognition_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_recognition');
        $this->db->where('tbl_hr_recognition.rec_usr_id', $this->session->usr_id);
        $this->db->order_by('rec_desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_recognition_data_array(){
        $this->db->select('*');
        $this->db->from('tbl_hr_recognition');
        $this->db->where('tbl_hr_recognition.rec_usr_id', $this->session->usr_id);
        $this->db->order_by('rec_desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recognition_data_array_offset(){
        $this->db->select('*');
        $this->db->from('tbl_hr_recognition');
        $this->db->where('tbl_hr_recognition.rec_usr_id', $this->session->usr_id);
        $this->db->order_by('rec_desc');
        $this->db->limit(100, 5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_recognition_data_array_offset_num_rows(){
        $this->db->select('*');
        $this->db->from('tbl_hr_recognition');
        $this->db->where('tbl_hr_recognition.rec_usr_id', $this->session->usr_id);
        $this->db->order_by('rec_desc');
        $this->db->limit(100, 5);
        $query = $this->db->get();
        return $query->num_rows();
    }
    

    public function recognition_data_save(){
        $data = array(
                'rec_usr_id'  => $this->session->usr_id,
                'rec_desc'  => $this->input->post('rec_desc')
            );
        $result=$this->db->insert('tbl_hr_recognition',$data);
        return $result;
    }

    public function recognition_data_delete(){
        $this->db->where('rec_id', $this->input->post('rec_id'));
        $result=$this->db->delete('tbl_hr_recognition');
        return $result;
    }

    //Membership 
    public function get_membership_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_membership');
        $this->db->where('tbl_hr_membership.mem_usr_id', $this->session->usr_id);
        $this->db->order_by('mem_desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_membership_data_array(){
        $this->db->select('*');
        $this->db->from('tbl_hr_membership');
        $this->db->where('tbl_hr_membership.mem_usr_id', $this->session->usr_id);
        $this->db->order_by('mem_desc');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_membership_data_array_offset(){
        $this->db->select('*');
        $this->db->from('tbl_hr_membership');
        $this->db->where('tbl_hr_membership.mem_usr_id', $this->session->usr_id);
        $this->db->order_by('mem_desc');
        $this->db->limit(100, 5);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_membership_data_array_offset_num_rows(){
        $this->db->select('*');
        $this->db->from('tbl_hr_membership');
        $this->db->where('tbl_hr_membership.mem_usr_id', $this->session->usr_id);
        $this->db->order_by('mem_desc');
        $this->db->limit(100, 5);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function membership_data_save(){
        $data = array(
                'mem_usr_id'  => $this->session->usr_id,
                'mem_desc'  => $this->input->post('mem_desc')
            );
        $result=$this->db->insert('tbl_hr_membership',$data);
        return $result;
    }

    public function membership_data_delete(){
        $this->db->where('mem_id', $this->input->post('mem_id'));
        $result=$this->db->delete('tbl_hr_membership');
        return $result;
    }

    //Reference 
    public function get_reference_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_reference');
        $this->db->where('tbl_hr_reference.ref_usr_id', $this->session->usr_id);
        $this->db->order_by('ref_name');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_reference_data_pds(){
        $this->db->select('*');
        $this->db->from('tbl_hr_reference');
        $this->db->where('tbl_hr_reference.ref_usr_id', $this->session->usr_id);
        $this->db->order_by('ref_name');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function reference_data_save(){
        //TRAP IF MORE THAN 3
        $trap = $this->trap_renference();

        if($trap){
            $data = array(
                'ref_usr_id'  => $this->session->usr_id,
                'ref_name'  => $this->input->post('ref_name'),
                'ref_address'  => $this->input->post('ref_address'),
                'ref_contact'  => $this->input->post('ref_contact')
            );
            $result=$this->db->insert('tbl_hr_reference',$data);
            return $result;
        }else{
            return false;
        }
    }

    public function trap_renference(){
        $this->db->where('ref_usr_id', $this->session->usr_id);
        $result = $this->db->get('tbl_hr_reference');

        if($result->num_rows() <= 2){
            return true;
        }else{
            return false;
        }
    }

    public function reference_data_delete(){
        $this->db->where('ref_id', $this->input->post('ref_id'));
        $result=$this->db->delete('tbl_hr_reference');
        return $result;
    }

    public function government_data_save(){
        
        $data = array(
            'emp_gov_id' => $this->input->post('emp_gov_id'),
            'emp_gov_type' => $this->input->post('emp_gov_type'),
            'emp_gov_place' => $this->input->post('emp_gov_place')
        );
        $this->db->where('usr_id', $this->session->usr_id);
        return $this->db->update('tbl_hr_employee', $data);
     }
    
     //WES 
    public function get_wes_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_wes');
        $this->db->where('tbl_hr_wes.wes_usr_id', $this->session->usr_id);
        $this->db->order_by('wes_from', 'Desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_wes_data_array(){
        $this->db->select('*');
        $this->db->from('tbl_hr_wes');
        $this->db->where('tbl_hr_wes.wes_usr_id', $this->session->usr_id);
        $this->db->order_by('wes_from', 'Desc');
        $query = $this->db->get();
        return $query->result_array();
    }

     public function wes_data_save(){
        $data = array(
            'wes_usr_id'  => $this->session->usr_id,
            'wes_from'  => $this->input->post('wes_from'),
            'wes_to'  => $this->input->post('wes_to'),
            'wes_position'  => $this->input->post('wes_position'),
            'wes_office'  => $this->input->post('wes_office'),
            'wes_supervisor'  => $this->input->post('wes_supervisor'),
            'wes_s_position'  => $this->input->post('wes_s_position'),
            'wes_agency'  => $this->input->post('wes_agency'),
            'wes_accomplishment'  => $this->input->post('wes_accomplishment'),
            'wes_actual_duties'  => $this->input->post('wes_actual_duties')
        );
        $result=$this->db->insert('tbl_hr_wes',$data);
        return $result;
    }

    public function wes_data_edit_wes(){

        $data = array(
            'wes_usr_id'  => $this->session->usr_id,
            'wes_from'  => $this->input->post('wes_from'),
            'wes_to'  => $this->input->post('wes_to'),
            'wes_position'  => $this->input->post('wes_position'),
            'wes_office'  => $this->input->post('wes_office'),
            'wes_supervisor'  => $this->input->post('wes_supervisor'),
            'wes_s_position'  => $this->input->post('wes_s_position'),
            'wes_agency'  => $this->input->post('wes_agency'),
            'wes_accomplishment'  => $this->input->post('wes_accomplishment'),
            'wes_actual_duties'  => $this->input->post('wes_actual_duties')
        );
        $this->db->where('wes_id',  $this->input->post('wes_id'));
        $result=$this->db->update('tbl_hr_wes',$data);
        return $result;
    }

    public function wes_data_delete(){
        $this->db->where('wes_id', $this->input->post('wes_id'));
        $result=$this->db->delete('tbl_hr_wes');
        return $result;
    }

    public function get_employees_plantilla(){

        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_user.usr_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_user.usr_ous_id');
        $this->db->where('tbl_user.usr_ous_id', $this->input->post('ous_id'));
        $result = $this->db->get();
        return $result->result();
    }

    public function plantilla_position_data_save(){
        $data = array(
            'pos_usr_id'  => $this->input->post('vacant'),
            'pos_ous_id'  => $this->input->post('ous'),
            'pos_desc'  => $this->input->post('plantilla_desc'),
            'pos_sg'  => $this->input->post('salary_grade'),
            'pos_plantilla_no'  => $this->input->post('plantilla_no'),
            'pos_salary'  => $this->input->post('salary'),
            'pos_education'  => $this->input->post('education'),
            'pos_training'  => $this->input->post('training'),
            'pos_experience'  => $this->input->post('experience'),
            'pos_eligibility'  => $this->input->post('eligibility'),
            'pos_competency'  => $this->input->post('competency'),
            'pos_ptc_position'  => $this->input->post('ptc_chk')
        );
        
        $result = $this->db->insert('tbl_hr_position',$data);

        //get last ID
        $insert_id = $this->db->insert_id();

        $data = array(
            'arp_pos_id'  => $insert_id,
            'arp_priority_level'  => $this->input->post('arp_priority_level'),
            'arp_no_applicant'  => $this->input->post('arp_no_applicant'),
            'arp_pub_date'  => $this->input->post('arp_pub_date'),
            'arp_hiring_date'  => $this->input->post('arp_hiring_date'),
            'arp_sourcing'  => $this->input->post('arp_sourcing'),
            'arp_resources'  => $this->input->post('arp_resources'),
            'arp_budgetary'  => $this->input->post('arp_budgetary'),
            'arp_risks'  => $this->input->post('arp_risks'),
            'arp_remarks'  => $this->input->post('arp_remarks')
        );

        $result = $this->db->insert('tbl_hr_position_recruitment_plan',$data);

        return $result;
    }

    public function get_plantilla_position(){
        if( $this->session->role == 'Super Admin'){
            $this->db->select('*');
            $this->db->from('tbl_hr_position');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_position.pos_usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
            //$this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
            $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
            $query = $this->db->get();
            return $query->result();
        }else{
            $this->db->select('*');
            $this->db->from('tbl_hr_position');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_position.pos_usr_id');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
            //$this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
            $this->db->where('tbl_ous.ous_id', $this->session->ous_id);
            $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
            $query = $this->db->get();
            return $query->result();
        }
    }

    //ok ito

    /*public function get_vacant_position(){
        if( $this->session->role == 'Super Admin'){
            $this->db->select('*');
            $this->db->from('tbl_hr_position');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
            $this->db->where('pos_usr_id', '0');
            $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
            $query = $this->db->get();
            return $query->result();
        }
        else{
            $this->db->select('*');
            $this->db->from('tbl_hr_position');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
            $this->db->where('pos_usr_id', '0');
            $this->db->where('tbl_ous.ous_id', $this->session->ous_id);
            $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
            $query = $this->db->get();
            return $query->result();
        }
      
    }*/

    public function get_vacant_position(){
        if( $this->session->role == 'Super Admin'){
            $this->db->select('*');
            $this->db->from('tbl_hr_position');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
            $this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
            $this->db->where('tbl_hr_position.pos_usr_id', '0');
            $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
            $this->db->order_by('tbl_hr_position.pos_sg', 'Desc');
            $query = $this->db->get();
            return $query->result_array();
        }
        else{
            $this->db->select('*');
            $this->db->from('tbl_hr_position');
            $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
            //$this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
            $this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
            $this->db->where('tbl_hr_position.pos_usr_id', '0');
            $this->db->where('tbl_ous.ous_id', $this->session->ous_id);
            $this->db->order_by('tbl_hr_position.pos_sg', 'Desc');
            $query = $this->db->get();
            return $query->result_array();
        }
      
    }

    public function get_vacant_position_open(){
        $this->db->select('*');
        $this->db->from('tbl_hr_position');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->where('tbl_hr_position.pos_status', 'Open');
        $this->db->order_by('tbl_hr_vacant.vac_deadline', 'Desc');
        $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_vacant_position_vac_id($vac_id){
        $this->db->select('*');
        $this->db->from('tbl_hr_vacant');
        $this->db->where('vac_id', $vac_id);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function vacant_position_id(){
        //Insert into Table HR Vacant
        $data = array(
            'vac_pos_id'  => $this->input->post('pos_id'),
            'vac_vice_usr_id'  => $this->input->post('vac_vice_usr_id'),
            'vac_nanture'  => $this->input->post('vac_nanture'),
            'vac_type'  => $this->input->post('vac_type')
        );

        $result=$this->db->insert('tbl_hr_vacant', $data);
        
        //get last ID
        $insert_id = $this->db->insert_id();

        //Update table
        $data1 = array(
            'pos_usr_id' => '0',
            'pos_status' => null,
            'vac_id' => $insert_id
        );
        $this->db->where('pos_id', $this->input->post('pos_id'));
        return $this->db->update('tbl_hr_position', $data1);
    }

    public function open_vacant_position_id(){
        $data = array(
            'pos_status' => 'Waiting for Approval'
        );
        $this->db->where('pos_id', $this->input->post('pos_id'));
        return $this->db->update('tbl_hr_position', $data);
    }

    public function timeline_vacant_position_id(){
        $data = array(
            'vac_evaluation_of_document' => $this->input->post('vac_evaluation_of_document'),
            'vac_initial_deliberation' => $this->input->post('vac_initial_deliberation'),
            'vac_cbwe' => $this->input->post('vac_cbwe'),
            'vac_bei' => $this->input->post('vac_bei')
        );
        $this->db->where('vac_id', $this->input->post('vac_id'));
        return $this->db->update('tbl_hr_vacant', $data);
    }

    public function close_vacant_position_id(){
        $data = array(
            'pos_status' => 'Closed'
        );
        $this->db->where('pos_id', $this->input->post('pos_id'));
        return $this->db->update('tbl_hr_position', $data);
    }

    public function delete_vacant_position_id(){
        $this->db->where('pos_id', $this->input->post('pos_id_del'));
        $result=$this->db->delete('tbl_hr_position');
        return $result;
    }

    public function duplicate_vacant_position_id(){
        //Position
        $arp_id = $this->input->post('pos_id_dup');
        $this->db->where('pos_id', $this->input->post('pos_id_dup'));
        $query = $this->db->get('tbl_hr_position');
        $result = $query->row_array();


        $pos_usr_id = '0';
        $pos_ous_id = $result['pos_ous_id'];
        $pos_desc = $result['pos_desc'];
        $pos_sg = $result['pos_sg'];
        $pos_salary = $result['pos_salary'];
        $pos_plantilla_no = $result['pos_plantilla_no'];
        $pos_education = $result['pos_education'];
        $pos_training = $result['pos_training'];
        $pos_experience = $result['pos_experience'];
        $pos_eligibility = $result['pos_eligibility'];
        $pos_competency = $result['pos_competency'];

        $data = array(
            'pos_usr_id' => $pos_usr_id,
            'pos_ous_id'  => $pos_ous_id,
            'pos_desc'  => $pos_desc,
            'pos_sg'  => $pos_sg,
            'pos_salary' => $pos_salary,
            'pos_plantilla_no'  => $pos_plantilla_no,
            'pos_education'  => $pos_education,
            'pos_training'  => $pos_training,
            'pos_experience' => $pos_experience,
            'pos_eligibility'  => $pos_eligibility,
            'pos_competency'  => $pos_competency
        );

        $result = $this->db->insert('tbl_hr_position', $data);
        $insert_id = $this->db->insert_id();

        //Position


        //Annual Plan
        $this->db->where('arp_pos_id', $arp_id);
        $query1 = $this->db->get('tbl_hr_position_recruitment_plan');
        $result1 = $query1->row_array();

        $arp_pos_id = $result1['arp_pos_id'];
        $arp_priority_level = $result1['arp_priority_level'];
        $arp_no_applicant = $result1['arp_no_applicant'];
        $arp_pub_date = $result1['arp_pub_date'];
        $arp_hiring_date = $result1['arp_hiring_date'];
        $arp_sourcing = $result1['arp_sourcing'];
        $arp_resources = $result1['arp_resources'];
        $arp_budgetary = $result1['arp_budgetary'];
        $arp_risks = $result1['arp_risks'];
        $arp_remarks = $result1['arp_remarks'];

        $data2 = array(
            'arp_pos_id' => $insert_id,
            'arp_priority_level'  => $arp_priority_level,
            'arp_no_applicant'  => $arp_no_applicant,
            'arp_pub_date'  => $arp_pub_date,
            'arp_hiring_date' => $arp_hiring_date,
            'arp_sourcing'  => $arp_sourcing,
            'arp_resources'  => $arp_resources,
            'arp_budgetary'  => $arp_budgetary,
            'arp_risks' => $arp_risks,
            'arp_remarks'  => $arp_remarks
        );

        $result2 = $this->db->insert('tbl_hr_position_recruitment_plan', $data2);

        //Annual Plan
        return $result2;
    }

    

    public function publish_vacant_position_id(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $data = array(
            'vac_pos_id' => $this->input->post('pos_id_publish'),
            'vac_date_posted'  => $this->input->post('posting_date'),
            'vac_deadline'  => $this->input->post('closing_date'),
            'vac_job_opening_file'  => $filename
        );

        //update vac_id
        $result=$this->db->insert('tbl_hr_vacant',$data);

        //get last ID
        $insert_id = $this->db->insert_id();
        
        $data1 = array(
            'pos_status' => 'Open',
            'vac_id' => $insert_id
        );
        $this->db->where('pos_id', $this->input->post('pos_id_publish'));
        return $this->db->update('tbl_hr_position', $data1);
        //update pos_id
    }

    public function request_for_publication(){
        $this->db->select('*');
        $this->db->from('tbl_hr_position');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->where('pos_status', 'Waiting for Approval');
        $this->db->order_by('tbl_hr_position.pos_sg', 'Desc');
        $this->db->order_by('tbl_ous.ous_arrangement', 'Asc');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function save_forme1($intent, $educational_file){
        
        $hash = substr(md5($this->input->post('pos_id',true)),0 ,6)."-".substr(md5($this->input->post('lastname',true)),0 ,3)."-".substr(md5($this->input->post('firstname',true)),0 ,6)."-".$this->generateRandomString();
        
        $data = array(
            'app_vac_id'  => $this->input->post('pos_id'),
            'app_lastname'  => $this->input->post('lastname'),
            'app_firstname'  => $this->input->post('firstname'),
            'app_middlename'  => $this->input->post('middlename'),
            'app_suffix'  => $this->input->post('suffix'),
            'app_birthdate'  => $this->input->post('birthdate'),
            'app_age'  => $this->input->post('age'),
            'app_address'  => $this->input->post('address'),
            'app_contacts'  => $this->input->post('contactno'),
            'app_email'  => $this->input->post('email'),
            'app_nationality'  => $this->input->post('nationality'),
            'app_civil_status'  => $this->input->post('status'),
            'app_gender'  => $this->input->post('gender'),
            'app_educational'  => $this->input->post('education'),
            'app_course'  => $this->input->post('course'),
            'app_hash'  => $hash,
            'app_reference_posting' => json_encode($this->input->post('reference')),
            'app_timestamp'  => date('Y-m-d H:i:s')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){
            $result = $this->db->insert('tbl_hr_applicant', $data);

            //get applicant ID
            $applicant_id = $this->db->insert_id();

            //save documents
            $data1 = array(
                'app_id'  => $applicant_id,
                'app_intent'  => $intent, // update check
                'app_educational_doc'  => $educational_file
            );

            $result1 = $this->db->insert('tbl_hr_applicant_documents', $data1);

            if($result1){
                $return = array(
                    'status' => 'True',
                    'app_id' => $applicant_id,
                    'app_hash' => $hash
                );
            }else{ 
                $return = array(
                    'status' => 'False'
                ); 
            }
            return $return;
        }else{
            $return = array(
                'status' => 'False'
            ); 
            return $return;
        }
    }

    public function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function save_forme2($eligibility_file, $national_certificate_file, $nttc_file){

        //eligibility
        $array_eligibility = $this->input->post('eligibility');
        $result_eligibility = '';

        foreach($array_eligibility as $row){
            $result_eligibility = $result_eligibility.';'.$row;
        }

        //nc
        $array_nc = $this->input->post('nc');
        $result_nc = '';

        foreach($array_nc as $row){
            $result_nc = $result_nc.';'.$row;
        }

        //nttc
        $array_nttc = $this->input->post('nttc');
        $result_nttc = '';

        foreach($array_nttc as $row){
            $result_nttc = $result_nttc.';'.$row;
        }

        $data = array(
            'app_eligibility' => $result_eligibility,
            'app_nc' => $result_nc,
            'app_nttc' =>  $result_nttc
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme2_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_eligibility_doc'  => $eligibility_file,
                'app_nc_doc'  => $national_certificate_file,
                'app_nttc_doc'  => $nttc_file
            );

            $this->db->where('app_id', $this->input->post('forme2_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function number_of_applicants($param){
        
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        //$this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $param);
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');

        //$this->db->where('app_vac_id', $param);    
        $query = $this->db->get();
        if($query){
            return $query->num_rows();
        } 
    }

    public function save_forme3($ipcr_file, $cpa_file, $sr_file, $coe_file){

        //relevant work experience
        $array_work_experience = $this->input->post('relevant_experience');
        $result_work_experience = '';

        foreach($array_work_experience as $row){
            $result_work_experience = $result_work_experience.';'.$row;
        }

         //relevant work experience years
         $array_work_experience_years = $this->input->post('relevant_experience_years');
         $result_work_experience_years = '';
 
         foreach($array_work_experience_years as $row){
             $result_work_experience_years = $result_work_experience_years.';'.$row;
         }

         //check date & year of service in TESDA
         if($this->input->post('tesda_service') == null){
            $tesda_service = null;
         }else{
            $tesda_service = $this->input->post('tesda_service');
         } 
         
         if($this->input->post('date_tesda_service') == null){
            $date_tesda_service = null;
         }else{
            $date_tesda_service = $this->input->post('date_tesda_service');
         } 

        $data = array(
            'app_present_position' => $this->input->post('present_position'),
            'app_present_office' => $this->input->post('present_office'),
            'app_years' =>  $this->input->post('no_years'),
            'app_relevant_experience' => $result_work_experience,
            'app_relevant_years' =>  $result_work_experience_years,
            'app_tesda_years' => $tesda_service,
            'app_date_tesda' =>  $date_tesda_service,
            'app_ipcr_rating' => $this->input->post('ipcr_rating')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme3_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_coe_doc'  => $coe_file,
                'app_sr'  => $sr_file,
                'app_appointment'  => $cpa_file,
                'app_ipcr'  => $ipcr_file
            );

            $this->db->where('app_id', $this->input->post('forme3_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function save_forme4($training_file){

        //relevant Training
        $array_relevant_training = $this->input->post('relevant_training');
        $result_relevant_training = '';

        foreach($array_relevant_training as $row){
            $result_relevant_training = $result_relevant_training.';'.$row;
        }

         //relevant Training
         $array_relevant_training_hours = $this->input->post('relevant_training_hours');
         $result_relevant_training_hours = '';
 
         foreach($array_relevant_training_hours as $row){
             $result_relevant_training_hours = $result_relevant_training_hours.';'.$row;
         }

         
        $data = array(
            'app_training' => $result_relevant_training,
            'app_training_hours' => $result_relevant_training_hours  
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme4_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_training_doc'  => $training_file
            );

            $this->db->where('app_id', $this->input->post('forme4_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function save_forme5(){

        //RA8371
        $array_RA8371 = $this->input->post('ra8371');
        $result_RA8371 = '';

        foreach($array_RA8371 as $row){
            $result_RA8371 = $result_RA8371.';'.$row;
        }

        //RA727
        $array_RA727 = $this->input->post('ra727');
        $result_RA727 = '';

        foreach($array_RA727 as $row){
            $result_RA727 = $result_RA727.';'.$row;
        }

        //RA8972
        $array_RA8972 = $this->input->post('ra8972');
        $result_RA8972 = '';

        foreach($array_RA8972 as $row){
            $result_RA8972 = $result_RA8972.';'.$row;
        }
         
         
        $data = array(
            'app_ra8371' => $result_RA8371,
            'app_ra7277' => $result_RA727,
            'app_ra8972' => $result_RA8972  
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme5_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

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

    public function save_forme6($pds_file, $wes_file){
        
        //applicant docs
        $data1 = array(
            'app_pds'  => $pds_file,
            'app_wes'  => $wes_file
        );

        $this->db->where('app_id', $this->input->post('forme6_app_id'));
        $result = $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function save_forme7(){

        //immediate_supervisor
        $array_immediate_supervisor = $this->input->post('immediate_supervisor');
        $result_immediate_supervisor = '';

        foreach($array_immediate_supervisor as $row){
            $result_immediate_supervisor = $result_immediate_supervisor.';'.$row;
        }

        //peer
        $array_peer = $this->input->post('peer');
        $result_peer = '';

        foreach($array_peer as $row){
            $result_peer = $result_peer.';'.$row;
        }

        //client
        $array_client = $this->input->post('client');
        $result_client = '';

        foreach($array_client as $row){
            $result_client = $result_client.';'.$row;
        }
         
         
        $data = array(
            'app_supervisor' => $result_immediate_supervisor,
            'app_peer' => $result_peer,
            'app_client' => $result_client  
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme7_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

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

    public function save_forme8($arp_file){
    
        $data = array(
            'app_performance_international' => $this->input->post('international_arp'),
            'app_performance_national' => $this->input->post('national_arp'),
            'app_performance_regional' => $this->input->post('regional_arp'),
            'app_performance_provincial' => $this->input->post('provincial_arp')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme8_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_performance'  => $arp_file
            );

            $this->db->where('app_id', $this->input->post('forme8_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function save_forme9($expertise_file){
    
        $data = array(
            'app_expert_international' => $this->input->post('international_expertise'),
            'app_expertise_national' => $this->input->post('national_expertise'),
            'app_expertise_regional' => $this->input->post('regional_expertise'),
            'app_expertise_provincial' => $this->input->post('provincial_expertise')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme9_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_service'  => $expertise_file
            );

            $this->db->where('app_id', $this->input->post('forme9_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function save_forme10($cmt_file){
    
        $data = array(
            'app_committee_chair' => $this->input->post('cmt_chair'),
            'app_committee_vchair' => $this->input->post('cmt_vcchair'),
            'app_committee_member' => $this->input->post('cmt_member'),
            'app_committee_sec' => $this->input->post('cmt_secretariat')
        );

        //clean
        $data = $this->security->xss_clean($data);
        if($this->security->xss_clean($data)){  
            //applicant info
            $this->db->where('app_id', $this->input->post('forme10_app_id'));
            $result = $this->db->update('tbl_hr_applicant', $data);  

            //applicant docs
            $data1 = array(
                'app_committee'  => $cmt_file
            );

            $this->db->where('app_id', $this->input->post('forme10_app_id'));
            $this->db->update('tbl_hr_applicant_documents', $data1); 

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

    public function get_applicants($param){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join(
            'tbl_hr_applicant_documents',
            'tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id'
        );
        $this->db->join(
            'tbl_hr_applicant_evaluation',
            'tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id',
            'left'
        );
        $this->db->join(
            'tbl_hr_position',
            'tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id'
        );
        $this->db->join(
            'tbl_hr_vacant',
            'tbl_hr_vacant.vac_id = tbl_hr_position.vac_id'
        );
        $this->db->join(
            'tbl_ous',
            'tbl_ous.ous_id = tbl_hr_position.pos_ous_id'
        );
        $this->db->where('tbl_hr_applicant.app_vac_id', $param);
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline, INTERVAL 1 DAY)');
        $this->db->order_by('tbl_hr_applicant.app_lastname', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function plantilla_position_data_edit(){
        $data = array(
            'pos_usr_id'  => $this->input->post('vacant'),
            'pos_ous_id'  => $this->input->post('ous'),
            'pos_desc'  => $this->input->post('plantilla_desc'),
            'pos_sg'  => $this->input->post('salary_grade'),
            'pos_plantilla_no'  => $this->input->post('plantilla_no'),
            'pos_salary'  => $this->input->post('salary'),
            'pos_education'  => $this->input->post('education'),
            'pos_training'  => $this->input->post('training'),
            'pos_experience'  => $this->input->post('experience'),
            'pos_eligibility'  => $this->input->post('eligibility'),
            'pos_competency'  => $this->input->post('competency'),
            'pos_ptc_position'  => $this->input->post('ptc_chk_edit')

        );

        $this->db->where('pos_id', $this->input->post('pos_id'));
        $result = $this->db->update('tbl_hr_position', $data);

        $data1 = array(
            'arp_priority_level'  => $this->input->post('arp_priority_level'),
            'arp_no_applicant'  => $this->input->post('arp_no_applicant'),
            'arp_pub_date'  => $this->input->post('arp_pub_date'),
            'arp_hiring_date'  => $this->input->post('arp_hiring_date'),
            'arp_sourcing'  => $this->input->post('arp_sourcing'),
            'arp_resources'  => $this->input->post('arp_resources'),
            'arp_budgetary'  => $this->input->post('arp_budgetary'),
            'arp_risks'  => $this->input->post('arp_risks'),
            'arp_remarks'  => $this->input->post('arp_remarks')
        );

        $this->db->where('arp_pos_id', $this->input->post('pos_id'));
        $result1 = $this->db->update('tbl_hr_position_recruitment_plan', $data1);

        return $result1;
    }

    //for update---------------------------------------------------------------------------

    //local

    public function count_training_local(){
        $this->db->select('*');
        $this->db->from('tbl_hr_inv_training');
        //$this->db->where('trn_tmpr <>', '1');
        $this->db->where('trn_agn_category', 'Local');
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $this->db->or_where('trn_tmpr', '2');
        $this->db->where('trn_tmpr IS NULL');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function count_training_local_nominee($training_local_id, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_local_id);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_training_local_approved($training_local_id, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_local_id);
        $this->db->where('nmn_status', 'Approved');
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    //local

    //National
    public function count_training_national(){
        $this->db->select('*');
        $this->db->from('tbl_hr_inv_training');
        //$this->db->where('trn_tmpr <>', '1');
        $this->db->where('trn_agn_category', 'National');
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $this->db->or_where('trn_tmpr', '2');
        $this->db->where('trn_tmpr IS NULL');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function count_training_national_nominee($training_national_id, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_national_id);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_training_national_approved($training_national_id, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_national_id);
        $this->db->where('nmn_status', 'Approved');
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    //National
    
    //RO
    public function count_training_regional(){
        $this->db->select('*');
        $this->db->from('tbl_hr_inv_training');
        $this->db->where('trn_agn_category', 'Regional');
        $this->db->where('YEAR(trn_to_date)', date('Y'));
        $this->db->or_where('trn_tmpr', '2');
        $this->db->where('trn_tmpr IS NULL');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function count_training_regional_nominee($training_regional, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_regional);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_training_regional_approved($training_regional, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_regional);
        $this->db->where('nmn_status', 'Approved');
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }
    
    //RO

    //Foreign
    public function count_training_foreign(){
        $this->db->select('*');
        $this->db->from('tbl_hr_inv_training');
        //$this->db->where('trn_tmpr <>', '1');
        $this->db->where('trn_agn_category', 'Foreign');
        $this->db->where('YEAR(trn_from_date)', date('Y'));
        $this->db->or_where('trn_tmpr', '2');
        $this->db->where('trn_tmpr IS NULL');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function count_training_foreign_nominee($training_foreign_id, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_foreign_id);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_training_foreign_approved($training_foreign_id, $ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_trn_nominee');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_trn_nominee.usr_id');
        $this->db->where('tbl_hr_trn_nominee.inv_trn_id', $training_foreign_id);
        $this->db->where('nmn_status', 'Approved');
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }
    //Foreign

    public function annual_recruitment_plan_sg18(){
        if ($this->session->role == "Super Admin"){
           $this->db->select('*');
           $this->db->from('tbl_hr_position');
           $this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
           $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
           $this->db->where('tbl_hr_position.pos_usr_id', 0);
           $this->db->where('tbl_hr_position.pos_sg >=', 18);
           $this->db->order_by('tbl_ous.ous_arrangement','Asc');
           $this->db->order_by('tbl_hr_position.pos_sg','Desc');
           $result = $this->db->get();
           return $result->result_array();
        }elseif ($this->session->role == "Admin"){
           $this->db->from('tbl_hr_position');
           $this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
           $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id'); 
           $this->db->where('tbl_hr_position.pos_usr_id', 0);
           $this->db->where('tbl_hr_position.pos_ous_id', $this->session->ous_id);
           $this->db->where('tbl_hr_position.pos_sg >=', 18);
           $this->db->order_by('tbl_ous.ous_arrangement','Asc');
           $this->db->order_by('tbl_hr_position.pos_sg','Desc');
           $result = $this->db->get();
           return $result->result_array();
        }  
   }

   public function annual_recruitment_plan_sg17(){
        if ($this->session->role == "Super Admin"){
        $this->db->select('*');
        $this->db->from('tbl_hr_position');
        $this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id'); 
        $this->db->where('tbl_hr_position.pos_usr_id', 0);
        $this->db->where('tbl_hr_position.pos_sg <=', 17);
        $this->db->order_by('tbl_ous.ous_arrangement','Asc');
        $this->db->order_by('tbl_hr_position.pos_sg','Desc');
        $result = $this->db->get();
        return $result->result_array();
        }elseif ($this->session->role == "Admin"){
        $this->db->from('tbl_hr_position');
        $this->db->join('tbl_hr_position_recruitment_plan','tbl_hr_position_recruitment_plan.arp_pos_id = tbl_hr_position.pos_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id'); 
        $this->db->where('tbl_hr_position.pos_usr_id', 0);
        $this->db->where('tbl_hr_position.pos_ous_id', $this->session->ous_id);
        $this->db->where('tbl_hr_position.pos_sg <=', 17);
        $this->db->order_by('tbl_ous.ous_arrangement','Asc');
        $this->db->order_by('tbl_hr_position.pos_sg','Desc');
        $result = $this->db->get();
        return $result->result_array();
        }  
    }

    public function my_document_data(){
        $this->db->select('*');
        $this->db->from('tbl_hr_emp_documemt');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_emp_documemt.usr_id'); 
        $this->db->where('tbl_user.usr_id', $this->session->usr_id);
        $this->db->order_by('tbl_hr_emp_documemt.doc_desc','Asc');
        $result = $this->db->get();
        return $result->result();
    }

    public function save_my_document(){
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        if($this->input->post('other_doc_chk') == '1'){
            $doc_desc = $this->input->post('other_doc');
        }else{
            $doc_desc = $this->input->post('doc_desc');
        }

        $data = array(
            'usr_id' => $this->session->usr_id,
            'doc_desc'  => $doc_desc,
            'doc_filename'  => $filename
        );

        //update vac_id
        $result=$this->db->insert('tbl_hr_emp_documemt',$data);
        return $result;
    }


    //for update

    public function count_no_of_treap($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_hr_training.usr_id');
        $this->db->where('emp_status', 'Permanent');
        $this->db->where('YEAR(tbl_hr_training.trn_from_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_reap !=', '');
        $this->db->where('tbl_hr_training.trn_tmpr', 1);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function delete_my_document(){
        $this->db->where('doc_id', $this->input->post('doc_id'));
        $result=$this->db->delete('tbl_hr_emp_documemt');
        return $result;
    }

    //for update
    public function count_no_of_tpmr($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_hr_training.usr_id');
        $this->db->where('emp_status', 'Permanent');
        $this->db->where('YEAR(tbl_hr_training.trn_from_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_tmpr', 1);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_no_of_tdorf($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_hr_training.usr_id');
        $this->db->where('emp_status', 'Permanent');
        $this->db->where('YEAR(tbl_hr_training.trn_from_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_tdorf !=', '');
        $this->db->where('tbl_hr_training.trn_tmpr', 1);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function count_no_of_cot($ous_idx){
        $this->db->select('*');
        $this->db->from('tbl_hr_training');
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_training.usr_id');
        $this->db->join('tbl_hr_employee','tbl_hr_employee.usr_id = tbl_hr_training.usr_id');
        $this->db->where('emp_status', 'Permanent');
        $this->db->where('YEAR(tbl_hr_training.trn_from_date)', date('Y'));
        $this->db->where('tbl_hr_training.trn_cot !=', '');
        $this->db->where('tbl_hr_training.trn_tmpr', 1);
        $this->db->where('tbl_user.usr_ous_id', $ous_idx);
        $result = $this->db->get();
        return $result->num_rows();
    }

    public function get_notify_vacant_position_id(){
        $pos_id = $this->input->post('pos_id_notify');
        $this->db->select('*');
        $this->db->from('tbl_hr_position');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->where('pos_id', $pos_id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function notify_vacant_position_id($salary_grade){
        $step = $salary_grade - 3;
        if ($this->session->role == "Super Admin"){
            $this->db->select('*');
            $this->db->from('tbl_hr_employee');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_employee.usr_id');
            $this->db->join('tbl_hr_personal_information','tbl_hr_personal_information.usr_id = tbl_hr_employee.usr_id');
            $this->db->where('tbl_hr_employee.emp_sg >=', $step);
            $this->db->where('tbl_hr_employee.emp_sg <', $salary_grade);
            $result = $this->db->get();
            return $result->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('tbl_hr_employee');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_employee.usr_id');
            $this->db->where('tbl_hr_employee.emp_sg >=', $step);
            $this->db->where('tbl_hr_employee.emp_sg <=', $salary_grade);
            $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
            $result = $this->db->get();
            return $result->result_array();

        }
    }

    public function notify_vacant_position_id1(){
        //$step = $salary_grade - 3;
        if ($this->session->role == "Super Admin"){
            $this->db->select('*');
            $this->db->from('tbl_hr_employee');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_employee.usr_id');
            $this->db->join('tbl_hr_personal_information','tbl_hr_personal_information.usr_id = tbl_hr_employee.usr_id');
            $this->db->where('tbl_hr_employee.emp_status', 'JOCOS');
            $result = $this->db->get();
            return $result->result_array();
        }else{
            $this->db->select('*');
            $this->db->from('tbl_hr_employee');
            $this->db->join('tbl_user','tbl_user.usr_id = tbl_hr_employee.usr_id');
            $this->db->join('tbl_hr_personal_information','tbl_hr_personal_information.usr_id = tbl_hr_employee.usr_id');
            $this->db->where('tbl_hr_employee.emp_status', 'JOCOS');
            $this->db->where('tbl_user.usr_ous_id', $this->session->ous_id);
            $result = $this->db->get();
            return $result->result_array();

        }
    }

    public function get_applicants_ind($param){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_applicant_evaluation','tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->where('tbl_hr_applicant.app_id', $param);
        $this->db->order_by('tbl_hr_applicant.app_lastname', 'Asc');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function evaluate_form(){

        //check app_id
        $result = $this->check_applicant_evaluation();

        if($result){
            $data = array(
                'eval_eligibility' => $this->input->post('eval_eligibility'),
                'eval_education' => $this->input->post('eval_education'),
                'eval_experience' => $this->input->post('eval_experience'),
                'eval_performance' => $this->input->post('eval_performance'),
                'eval_result' => $this->input->post('eval_result'),
                'eval_remarks' => $this->input->post('eval_remarks'),
                'eval_remarks1' => $this->input->post('eval_remarks1'),
                'eval_arp_international' => $this->input->post('eval_arp_international'),
                'eval_arp_national' => $this->input->post('eval_arp_national'),
                'eval_arp_regional' => $this->input->post('eval_arp_regional'),
                'eval_arp_provincial' => $this->input->post('eval_arp_provincial'),
                'eval_es_international' => $this->input->post('eval_es_international'),
                'eval_es_national' => $this->input->post('eval_es_national'),
                'eval_es_regional' => $this->input->post('eval_es_regional'),
                'eval_es_provincial' => $this->input->post('eval_es_provincial'),
                'eval_cmt_chair' => $this->input->post('eval_cmt_chair'),
                'eval_cmt_vcchair' => $this->input->post('eval_cmt_vcchair'),
                'eval_cmt_member' => $this->input->post('eval_cmt_member'),
                'eval_cmt_secretariat' => $this->input->post('eval_cmt_secretariat'),
                'eval_total' => $this->input->post('eval_total'),

                'chk1' => $this->input->post('chk1'),
                'chk2' => $this->input->post('chk2'),
                'chk3' => $this->input->post('chk3'),
                'chk4' => $this->input->post('chk4'),
                'chk5' => $this->input->post('chk5'),
                'chk6' => $this->input->post('chk6'),
                'chk7' => $this->input->post('chk7'),
                'chk8' => $this->input->post('chk8'),
                'chk9' => $this->input->post('chk9'),
                'chk10' => $this->input->post('chk10'),
                'chk11' => $this->input->post('chk11'),
                'chk12' => $this->input->post('chk12'),
                'chk13' => $this->input->post('chk13'),
                'chk14' => $this->input->post('chk14'),
                'chk15' => $this->input->post('chk15'),
                'chk16' => $this->input->post('chk16'),
                'chk17' => $this->input->post('chk17'),
                'chk18' => $this->input->post('chk18'),
                
                'eval_chklist' => $this->input->post('eval_chklist'),
                'eval_chklist1' => $this->input->post('eval_chklist1'),
                'eval_chklist2' => $this->input->post('eval_chklist2'),
                'eval_chklist3' => $this->input->post('eval_chklist3'),
                'eval_chklist4' => $this->input->post('eval_chklist4'),
                'eval_chklist5' => $this->input->post('eval_chklist5'),
                'eval_chklist6' => $this->input->post('eval_chklist6'),
                'eval_chklist7' => $this->input->post('eval_chklist7'),
                'eval_chklist8' => $this->input->post('eval_chklist8'),
                'eval_chklist9' => $this->input->post('eval_chklist9'),
                'eval_chklist10' => $this->input->post('eval_chklist10'),
                'eval_chklist11' => $this->input->post('eval_chklist11'),
                'eval_chklist12' => $this->input->post('eval_chklist12'),
                'eval_chklist13' => $this->input->post('eval_chklist13'),
                'eval_chklist14' => $this->input->post('eval_chklist14'),

                'eval_usr_id' => $this->session->usr_id

            );

            $this->db->where('app_id', $this->input->post('app_id_eval'));
            $result=$this->db->update('tbl_hr_applicant_evaluation', $data);

            if($this->input->post('eval_result') == 'Qualified'){
                $app_lock = 1;
            }else{
                $app_lock = null;
            }

            $data1 = array(
                'app_result' => $this->input->post('eval_result'),
                'app_reevaluation' => null,
                'app_lock' => $app_lock
            );

            $this->db->where('app_id', $this->input->post('app_id_eval'));
            $result1 = $this->db->update('tbl_hr_applicant', $data1);

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

        }else{

            $data = array(
                'app_id' => $this->input->post('app_id_eval'),
                'eval_eligibility' => $this->input->post('eval_eligibility'),
                'eval_education' => $this->input->post('eval_education'),
                'eval_experience' => $this->input->post('eval_experience'),
                'eval_performance' => $this->input->post('eval_performance'),
                'eval_result' => $this->input->post('eval_result'),
                'eval_remarks' => $this->input->post('eval_remarks'),
                'eval_remarks1' => $this->input->post('eval_remarks1'),
                'eval_arp_international' => $this->input->post('eval_arp_international'),
                'eval_arp_national' => $this->input->post('eval_arp_national'),
                'eval_arp_regional' => $this->input->post('eval_arp_regional'),
                'eval_arp_provincial' => $this->input->post('eval_arp_provincial'),
                'eval_es_international' => $this->input->post('eval_es_international'),
                'eval_es_national' => $this->input->post('eval_es_national'),
                'eval_es_regional' => $this->input->post('eval_es_regional'),
                'eval_es_provincial' => $this->input->post('eval_es_provincial'),
                'eval_cmt_chair' => $this->input->post('eval_cmt_chair'),
                'eval_cmt_vcchair' => $this->input->post('eval_cmt_vcchair'),
                'eval_cmt_member' => $this->input->post('eval_cmt_member'),
                'eval_cmt_secretariat' => $this->input->post('eval_cmt_secretariat'),
                'eval_total' => $this->input->post('eval_total'),
                'chk1' => $this->input->post('chk1'),
                'chk2' => $this->input->post('chk2'),
                'chk3' => $this->input->post('chk3'),
                'chk4' => $this->input->post('chk4'),
                'chk5' => $this->input->post('chk5'),
                'chk6' => $this->input->post('chk6'),
                'chk7' => $this->input->post('chk7'),
                'chk8' => $this->input->post('chk8'),
                'chk9' => $this->input->post('chk9'),
                'chk10' => $this->input->post('chk10'),
                'chk11' => $this->input->post('chk11'),
                'chk12' => $this->input->post('chk12'),
                'chk13' => $this->input->post('chk13'),
                'chk14' => $this->input->post('chk14'),
                'chk15' => $this->input->post('chk15'),
                'chk16' => $this->input->post('chk16'),
                'chk17' => $this->input->post('chk17'),
                'chk18' => $this->input->post('chk18'),

                'eval_chklist1' => $this->input->post('eval_chklist1'),
                'eval_chklist2' => $this->input->post('eval_chklist2'),
                'eval_chklist3' => $this->input->post('eval_chklist3'),
                'eval_chklist4' => $this->input->post('eval_chklist4'),
                'eval_chklist5' => $this->input->post('eval_chklist5'),
                'eval_chklist6' => $this->input->post('eval_chklist6'),
                'eval_chklist7' => $this->input->post('eval_chklist7'),
                'eval_chklist8' => $this->input->post('eval_chklist8'),
                'eval_chklist9' => $this->input->post('eval_chklist9'),
                'eval_chklist10' => $this->input->post('eval_chklist10'),
                'eval_chklist11' => $this->input->post('eval_chklist11'),
                'eval_chklist12' => $this->input->post('eval_chklist12'),
                'eval_chklist13' => $this->input->post('eval_chklist13'),
                'eval_chklist14' => $this->input->post('eval_chklist14'),

                'eval_usr_id' => $this->session->usr_id


            );
    
            $result=$this->db->insert('tbl_hr_applicant_evaluation', $data);

            if($this->input->post('eval_result') == 'Qualified'){
                $app_lock = 1;
            }else{
                $app_lock = null;
            }

            $data1 = array(
                'app_result' => $this->input->post('eval_result'),
                'app_reevaluation' => null,
                'app_lock' => $app_lock
            );
            
            $this->db->where('app_id', $this->input->post('app_id_eval'));
            $result1 = $this->db->update('tbl_hr_applicant', $data1);

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

    public function check_applicant_evaluation(){

        $this->db->where('app_id', $this->input->post('app_id_eval'));
        $result = $this->db->get('tbl_hr_applicant_evaluation');

        if($result->num_rows() >= 1){
            return true;
        }else{
            return false;
        }
    }

    public function get_applicants1($param){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_applicant_evaluation','tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $param);
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');
        $this->db->order_by('tbl_hr_applicant.app_lastname', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_applicants2($param){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_documents','tbl_hr_applicant_documents.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_applicant_evaluation','tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->join('tbl_ous','tbl_ous.ous_id = tbl_hr_position.pos_ous_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $param);
        $this->db->where('tbl_hr_applicant_evaluation.eval_result', 'Qualified');
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');
        $this->db->order_by('tbl_hr_applicant.app_lastname', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function notify_disqualified_applicants($id){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_evaluation','tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $id);
        $this->db->where('tbl_hr_applicant_evaluation.eval_result', 'Disqualified');
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');
        $this->db->order_by('tbl_hr_applicant.app_lastname', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function search_form_applicant(){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_evaluation','tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->where('tbl_hr_applicant.app_hash', $this->security->xss_clean($this->input->post('search_form_applicant')));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_indicators_data(){

            $id = $this->session->ous_id;
              switch ($id) {
                case "1":
                  $ous_desc = 'ro_target';
                  break;
                case "2":
                  $ous_desc = '';
                  break;
                case "3":
                  $ous_desc = '';
                  break;
                case "4":
                  $ous_desc = '';
                  break;
                case "5":
                  $ous_desc = '';
                  break;
                case "6":
                  $ous_desc = '';
                  break;
                case "7":
                  $ous_desc = '';
                  break;
                case "8":
                  $ous_desc = '';
                  break;
                case "9":
                  $ous_desc = '';
                  break;
                case "10":
                  $ous_desc = '';
                  break;
                case "11":
                  $ous_desc = '';
                  break;  
                case "12":
                  $ous_desc = '';
                  break;  
                case "13":
                  $ous_desc = '';
                  break;  
                case "14":
                  $ous_desc = '';
                  break;  
                case "15":
                  $ous_desc = '';
                  break;    
                
              }

        $this->db->select('tbl_prm_incharge.*, tbl_pmr_indicator.ind_id, tbl_pmr_indicator.ind_desc, tbl_pmr_indicator.'.$ous_desc);
        $this->db->from('tbl_prm_incharge');
        $this->db->join('tbl_pmr_indicator','tbl_pmr_indicator.ind_id = tbl_prm_incharge.ind_id');
        $this->db->where('tbl_prm_incharge.emp_id', $this->session->usr_id);
        $this->db->or_where('tbl_prm_incharge.emp_id_jo', $this->session->usr_id);
        $this->db->where('tbl_pmr_indicator.ind_year', date('Y'));
        $this->db->order_by('tbl_pmr_indicator.ind_id', 'Asc');
        $query = $this->db->get();
        $data = $query->result_array();

        $array = array(); 

        foreach($data as $row){
            $ind_id = $row['ind_id'];
            $ind_desc = $row['ind_desc'];
            $ous_desc1 = $row[$ous_desc];

            //get output
            $this->db->select('SUM(evi_accomplishment)');
            $this->db->from('tbl_pmr_evidence');
            $this->db->where('ind_id', $ind_id);
            $this->db->where('ous_id', 'ro_target');
            $query1 = $this->db->get();
            $data1 = $query1->row_array();

            $array[] = array(
                'ind_id' => $ind_id,
                'ind_desc' => $ind_desc,
                'ous_target' => $ous_desc1,
                'output' => $data1['SUM(evi_accomplishment)']
            );

        }

        return $array;
    }

    public function notify_qualified_applicants($id){
        $this->db->select('*');
        $this->db->from('tbl_hr_applicant');
        $this->db->join('tbl_hr_applicant_evaluation','tbl_hr_applicant_evaluation.app_id = tbl_hr_applicant.app_id');
        $this->db->join('tbl_hr_position','tbl_hr_position.pos_id = tbl_hr_applicant.app_vac_id');
        $this->db->join('tbl_hr_vacant','tbl_hr_vacant.vac_id = tbl_hr_position.vac_id');
        $this->db->where('tbl_hr_applicant.app_vac_id', $id);
        $this->db->where('tbl_hr_applicant_evaluation.eval_result', 'Qualified');
        $this->db->where('tbl_hr_applicant.app_timestamp >= tbl_hr_vacant.vac_date_posted');
        $this->db->where('tbl_hr_applicant.app_timestamp <= DATE_ADD(tbl_hr_vacant.vac_deadline,INTERVAL 1 DAY)');
        $this->db->order_by('tbl_hr_applicant.app_lastname', 'Asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    //Logs Server Side

    public function getLogs($postData){
        $this->_get_datatables_query($postData);
        if($postData['length'] != -1){
            $this->db->limit($postData['length'], $postData['start']);
        }
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_log.log_usr_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function countAll(){
        $this->db->join('tbl_user','tbl_user.usr_id = tbl_log.log_usr_id');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function countFiltered($postData){
        $this->_get_datatables_query($postData);

        $this->db->join('tbl_user','tbl_user.usr_id = tbl_log.log_usr_id');
        $query = $this->db->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($postData){
        // Get the current year
        $currentYear = date('Y');
        
        // Select from the table
        $this->db->from($this->table);
    
        // Join the necessary tables
        //$this->db->join('tbl_user', 'tbl_user.usr_id = tbl_log.log_usr_id', 'left');
        
        // Filter by the current year using the log_timestamp field
        $this->db->where('YEAR(tbl_log.log_timestamp)', $currentYear);
        $this->db->where('MONTH(tbl_log.log_timestamp)', date('m'));

        
        $i = 0;
        $this->column_search = array('tbl_user.usr_name', 'tbl_log.log_usr_ip');
    
        // Loop through searchable columns
        foreach($this->column_search as $item){
            // If datatable sends POST for search
            if($postData['search']['value']){
                // First loop
                if($i === 0){
                    // Open bracket
                    $this->db->group_start();
                    $this->db->like($item, $postData['search']['value']);
                } else {
                    $this->db->or_like($item, $postData['search']['value']);
                }
    
                // Last loop
                if(count($this->column_search) - 1 == $i){
                    // Close bracket
                    $this->db->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        } else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    
    public function show_flg_videos(){
        $this->db->select('*');
        $this->db->select_max('id');
        $this->db->from('tbl_rd_video');
        $query = $this->db->get();
        return $query->result_array();
    }

}//Last