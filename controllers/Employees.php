<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Employees_model');
        
    }

	// employees
    public function personal_information($param){
        if($this->session->logged_in){
            $data = $this->Employees_model->personal_information($param);
            echo json_encode($data);
        }
    }
    
    //token
    public function user_token(){
        if($this->session->logged_in){
            $date_time   = date('Y-m-d H:i:s');
            $secret_key  = "icthub";
            $user_id     = $this->session->usr_id;
            $token       = hash('sha256', $user_id . $date_time . $secret_key);
            $data        = $this->Employees_model->update_usr_token($user_id, $token);
    
            if($data){
                // Load the waiting page with the token
                $this->load->view('pages/hr/waiting_page', ['token' => $token]);
            } else {
                show_404();
            }
        }
    }
    
    public function user_token1(){
        if($this->session->logged_in){
            //date and time
            $date_time = date('Y-m-d H:i:s');
            //secret key
            $secret_key = "icthub";
            //user id
            $user_id = $this->session->usr_id;
            //token
            $token = hash('sha256', $user_id . $date_time . $secret_key);
            //update token
            $data = $this->Employees_model->update_usr_token($user_id, $token);
            if($data)
            {
                redirect("https://proxy.tesdar02onlinereporting.ph/v2/auth/" . $token);
            }else{
                show_404();
            }

        }
    }
}
