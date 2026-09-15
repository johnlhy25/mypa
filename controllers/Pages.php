<?php

class Pages extends CI_Controller{

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        //$this->load->model('authors_model');
        $this->load->library("pagination");
        
    }
    
    //landing page
    public function view() {
        $data['status'] = $this->Posts_model->get_maintenance_status();
        $status = $data['status']['main_status'];

        if($status){
            redirect(base_url().'site_offline'); 
        }else{
            $page = 'home';
    
            if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
                show_404();
            }else{
                $data['menu'] = 'Login';
                $this->load->view('templates/header', $data);
                $this->load->view('pages/'.$page);
                $this->load->view('templates/footer');    
            }
        }
        
    }

    //START OF MYPA

    public function calendar() {
        $page = 'calendar';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
              //print_r($data);
            $notification['menu'] = 'Accounts';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page);
            $this->load->view('templates/admin-footer-template');  
        }
    }

    public function forgot_password() {
        $page = 'forgot-password';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $data['menu'] = 'Forgot Password';
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');    
        }
    }

//--Forgot Password Function--
    public function forgot(){
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please <strong>confirm</strong> that you are not a robot.');
        $this->form_validation->set_rules('signupemail');

    if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('validate_captcha','Please <strong>confirm</strong> that you are not a robot.');
            $this->forgot_password(); 

        }else{  

            $data = $this->Posts_model->check_email();

            if($data){

                $usr_email = $data['usr_email'];
                $result = $this->resetpassword_forgot($usr_email);
                if($result){
                    $this->session->set_flashdata('success_data',"A temporary password has been sent to your email. If you don’t see it in your inbox, please check your spam folder.");
                    redirect(base_url().'forgot_password'); 
                } else{
                    $this->session->set_flashdata('failed',"Error.");
                    redirect(base_url().'forgot_password'); 
                }
                
            }else{
                $this->session->set_flashdata('failed',"The email you entered does not exist in our system. Please try again.");
                redirect(base_url().'forgot_password'); 
            }
        }
    }
//--Forgot Password Function--

    public function resetpassword_forgot($usr_email){
        $password = $this->generateRandomString();
        $result = $this->Posts_model->resetpassword_forgot($usr_email, $password);
        if($result){
            $this->send_password($usr_email, $password);
            return true;
        }
    }

    public function zip_download(){
        if($this->session->logged_in){

              // Load zip library
            $this->load->library('zip');
            
            $zip = new ZipArchive;
            $download = date("Y-m-d").'-All-Files';
           // $zipname = 'temp.zip';
            $zip->open($download, ZipArchive::CREATE);
            
            foreach (glob("uploads/*.pdf") as $file) { /* Add appropriate path to read content of zip */
                $zip->addFile($file);
            }

            if ($zip->close() === false) {
                exit("Error creating ZIP file");
            };
            
            //download file from temporary file on server as '$filename.zip'
            if (file_exists($download)) {
                ob_clean();
                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename='.$download.'.zip');
                header('Content-Length: ' . filesize($download));
                readfile($download);
            } else {
                exit("Could not find Zip file to download");
            }
        }else {
            redirect(base_url()); 
        }
    }

    public function zip_download_per_quarter($param){
        if($this->session->logged_in){

            // Load zip library
            $this->load->library('zip');

            $explode = explode('-', $param);

            $ous_id = $explode[2];
            $ous_desc = str_replace('%20',' ',$explode[3]);
            $unit = $explode[0];
            $unit_id = $explode[1];
            $year = $explode[4];
            $cat_id = $explode[5];
            $cat_desc = str_replace('%20',' ',$explode[6]);
            
           
            $data = $this->Posts_model->list_of_docs($year, $cat_id, $ous_id, $unit_id);
            print_r($data);

            $zip = new ZipArchive;
            $download = date("Y-m-d").'-'.$ous_desc.'-'.$unit.'-'.$year.'-'.$cat_desc;
            //$zipname = 'temp.zip';
            $zip->open($download, ZipArchive::CREATE);

          

            foreach ($data as $row) {
                $filepath = "uploads/".$row['file_filename'];
                $zip->addFile($filepath);
            }
            
            if ($zip->close() === false) {
                exit("Error creating ZIP file");
            };
            
            //download file from temporary file on server as '$filename.zip'
            if (file_exists($download)) {
                ob_clean();
                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename='.$download.'.zip');
                header('Content-Length: ' . filesize($download));
                readfile($download);
            } else {
                exit("Could not find Zip file to download");
            }

        }else {
            redirect(base_url()); 
        }
    }

    

    public function accounts(){

        $page = 'accounts';

        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                $data['accounts'] = $this->Posts_model->get_accounts_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                $data['accounts'] = $this->Posts_model->get_accounts();
            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
              //print_r($data);
            $notification['menu'] = 'Accounts';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/admin-footer-template');

        }
    }

    public function ajaxaccount(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_pending_user();
            echo $data;
        }else{
            redirect(base_url());
        }
		
	}

    public function ajaxnotifications(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_pending_request();
            echo $data;
        }else{
            redirect(base_url());
        }
		
	}

    public function register(){

        $page = 'signup';

        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            $data['operating_units'] = $this->Posts_model->get_poperating_units();
            $data['menu'] = 'Register';
            //print_r($data);
            $this->load->view('templates/header', $data);
            $this->load->view('pages/'.$page);
            $this->load->view('templates/footer');

        }
    }

    public function login(){

            $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
            $this->form_validation->set_message('validate_captcha', 'Please <strong>confirm</strong>that you are not a robot.');
            $this->form_validation->set_rules('Username','','');

        if ($this->form_validation->run() == FALSE){
           $this->session->set_flashdata('validate_captcha','Please <strong>confirm</strong> that you are not a <strong>robot</strong>.');
           $this->view();
        }else{
                $user_id = $this->Posts_model->login();
        
                if($user_id){
                    
                    $user_verification = $this->Posts_model->login_verification();
    
                    if($user_verification){
                        $user_data = array(
                            'usr_id' => $user_id['usr_id'],
                            'email' => $user_id['usr_email'],
                            'name' => $user_id['usr_name'],
                            'role' => $user_id['usr_role'],
                            'ous_id' => $user_id['usr_ous_id'],
                            'ous_desc' => $user_id['ous_desc'],
                            'usr_fasd' => $user_id['usr_fasd'],
                            'usr_rod' => $user_id['usr_rod'],
                            'usr_access_hr_pillar1' => $user_id['usr_access_hr_pillar1'],
                            'profile' => $user_id['usr_link_id'],
                             'token' => $user_id['usr_cso_key'],
                            'logged_in' => true
                        );
                        //Set Sessions
                        $this->session->set_userdata($user_data);

                        //Insert Log
                        $this->Posts_model->insert_log();
              
                        if($user_data['role']=='Accre'){
                            redirect(base_url().'accreditor');  
                        }else{
                            redirect(base_url().'hr_dashboard'); 
                        }
                       
    
                    }else{
                        $this->session->set_flashdata('verification_failed','Your account has to be confirmed by an administrator before you can login. Please contact the administrator for <strong>verification.</strong>');
                        $this->view();
                    }
                   
                }else{
                    $this->session->set_flashdata('failed','<strong>Incorrect</strong> username or password. Please try again.');
                    $this->view(); 
                }

        }
    }

    public function signup(){

        $this->load->helper('email');

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha_signup');
        $this->form_validation->set_message('validate_captcha_signup', 'Please <strong>confirm</strong> that you are not a robot.');
        $this->form_validation->set_rules('signupemail', 'Email', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('name','','');

       if ($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('validate_captcha_signup','Please <strong>confirm</strong> that you are not a robot.');
            $this->register(); 

        }else{   

            $data = $this->Posts_model->check_email();

            if($data){
                $this->session->set_flashdata('registration_failed_email','The <strong>email</strong> is already registered, please choose another one.');
                $this->register();
            }else{
                $password_post = $this->input->post('signuppassword');
                $confirm_password = $this->input->post('confirmpassword');

                if ($this->valid_password($password_post)){

                    if($password_post == $confirm_password){

                        $this->Posts_model->insert_user();
                        
                        $this->session->set_flashdata('registration','Your registration has been submitted to the administrators for approval. You will be notified by email when your registration is approved.');
                        redirect(base_url().'register');
                    }else{
    
                        $this->session->set_flashdata('registration_failed','The <strong>password</strong> confirmation does not match. Please try again');
                        $this->register();
                    }

                }else{
                    $this->register();
                } 
            }
        }
    }

    public function valid_password($password){
		$password = trim($password);

		$regex_lowercase = '/[a-z]/';
		$regex_uppercase = '/[A-Z]/';
		$regex_number = '/[0-9]/';
		$regex_special = '/[!@#$%^&*()\-_=+{};:,<.>ยง~]/';

		if (preg_match_all($regex_lowercase, $password) < 1){   
            $this->session->set_flashdata('valid_password','The password field must have at least <strong>one lowercase letter.</strong>');
			return FALSE;
		}

		if (preg_match_all($regex_uppercase, $password) < 1){
            $this->session->set_flashdata('valid_password','The password field must have at least <strong>one uppercase letter.</strong>');
			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1){
            $this->session->set_flashdata('valid_password','The password field must have at least <strong> one number.</strong>');
			return FALSE;
		}

		if (preg_match_all($regex_special, $password) < 1){
            $this->session->set_flashdata('valid_password', 'The password field must have at least <strong> one special character.</strong> ' . ' ' . htmlentities('!@#$%^&*()\-_=+{};:,<.>~'));
			return FALSE;
		}

		if (strlen($password) < 8){
            $this->session->set_flashdata('valid_password','The password field must be at least <strong>eight(8) characters</strong> in length.');
			return FALSE;
		}

		if (strlen($password) > 32){
            $this->session->set_flashdata('valid_password','The password field cannot exceed <strong>thirty two(32) characters</strong> in length.');
			return FALSE;
		}

		return TRUE;
	}

    public function logout(){

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('ous_id');
        $this->session->unset_userdata('ous_desc');
        $this->session->unset_userdata('profile');
        $this->session->unset_userdata('usr_id');
        redirect(base_url());
    }

    public function dashboard(){

        $pagex = 'dashboard';

        if(!file_exists(APPPATH.'views/pages/' .$pagex.'.php')){
            show_404();
        }else{

            $data['list_of_divisions'] = $this->Posts_model->get_list_of_division($this->session->ous_id);
            $data['list_of_divisions_approved'] = $this->Posts_model->get_list_of_division_approved($this->session->ous_id);
            $data['no_of_docs'] = $this->Posts_model->count_no_docs();
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //print_r($data);
            $notification['menu'] = 'Dashboard';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

        function getUserIpAddr(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function unit_request(){
        
        $insert_id = $this->Posts_model->unit_request();
       if($insert_id){
        
        //email to OUs Admin

        $array = $this->Posts_model->get_user_email_admin();
        foreach($array as $row) {
            $email=$row['usr_email'];
            $this->send_notification_to_admin($email, $insert_id);
        }

        //  email to Super Admin

        $arrayx = $this->Posts_model->get_user_email_suadmin();
        foreach($arrayx as $rowx) {
            $emailx = $rowx['usr_email'];
            $this->send_notification_to_admin($emailx, $insert_id);
        }

        $this->session->set_flashdata('program_request','<strong>Request sent</strong>. Your admin has been notified of your request. Once the admin approves your request you will be notified via email or please check back here.  ');
        redirect(base_url().'dashboard');

       }else{
        $this->session->set_flashdata('program_request','<strong>Errsent</strong>. Please try again.');
        redirect(base_url().'dashboard');
       }
        
    }

    public function notifications(){

        $page = 'notifications';
       

        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            if($this->session->role == 'Admin'){
              $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
               $data['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                $data['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            //print_r($data);
            $notification['menu'] = 'Notifications';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page,   $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function grant_user($param){

        if($this->session->logged_in){
            $result = $this->Posts_model->grant_user($param);
            if($result){
                $request = $this->Posts_model->check_email_request($param);
                $email = $request['usr_email'];
                $ous = $request['ous_desc'];
                $dep = $request['dep_desc'];
                $action = 'GRANTED';

                $this->grant_user_send($email, $ous, $dep, $action);
            $this->session->set_flashdata('grant_user','Account access has been granted.');
            }
            redirect(base_url().'notifications');

        }else{
            $this->session->set_flashdata('deny_user','Please login to continue.');
            redirect(base_url());
        }
    }

    public function unit_user() {
        $page = 'units-user';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $data['list_of_divisions_approved'] = $this->Posts_model->get_list_of_division_approved($this->session->ous_id);
            
            $notification['menu'] = 'Divisions';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function unit_user_document($param) {
        $page = 'unit-user-document';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            //Explode to String
            $explode = explode('-', $param);
            $unit = $explode[0];
            $unit_id = $explode[1];

            $data['back_link'] = $param;
            $data['unit_desc'] = $unit;
            $data['unit_id'] = $unit_id;
            $data['category'] = $this->Posts_model->get_category();
            $data['list_of_divisions_approved'] = $this->Posts_model->get_list_of_division_approved($this->session->ous_id);
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $notification['menu'] = 'Divisions: '.$unit;
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function unit_user_document_add($param) {
        $page = 'unit-user-document-add';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $explode = explode('-', $param);
            $unit = $explode[0];
            $unit_id = $explode[1];
            $year = $explode[2];
            $cat_id = $explode[3];
            $cat_desc = str_replace('%20',' ',$explode[4]);
            $ous_id = $this->session->ous_id;

            $data['unit'] = $unit;
            $data['unit_id'] = $unit_id;
            $data['year'] = $year;
            $data['cat_id'] = $cat_id;
            $data['cat_desc'] = $cat_desc;
            $data['back_link'] = 'unit_user_document/'.$unit.'-'.$unit_id;
            $data['list_of_docs'] = $this->Posts_model->list_of_docs($year, $cat_id, $ous_id, $unit_id);
            $data['Memo'] = $this->Posts_model->get_memo($unit, $cat_id, $year);
            $data['Result'] = $this->Posts_model->get_result($unit, $cat_id, $year);
            $notification['menu'] = $unit.': Add Document';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/add-exhibits-docs');
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function add_exhibits_docs(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            $back_link = $this->input->post('back_link'); 
            $data = array();
            if(!empty($_FILES['file']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('file')){

                    // Get data about the file
                    $this->Posts_model-> insert_exhibits_docs();
                    $this->session->set_flashdata('add_exhibits','Document added successfully.');
                    redirect(base_url().'unit_user_document_add/'. $back_link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('add_exhibits', $error['error']);
                        redirect(base_url().'unit_user_document_add/'. $back_link);
                    // $data['response'] = 'failed';
                    }
            }else{
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('add_exhibits', $error['error']);
                redirect(base_url().'unit_user_document_add/'. $back_link);
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function add_exhibits_docs1(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            $back_link = $this->input->post('back_link'); 
            $data = array();
            if(!empty($_FILES['file']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('file')){

                    // Get data about the file
                    $this->Posts_model-> insert_exhibits_docs();
                    $this->session->set_flashdata('add_exhibits','Document added successfully.');
                    redirect(base_url().'unit_user_document_add_admin/'. $back_link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('add_exhibits', $error['error']);
                        redirect(base_url().'unit_user_document_add_admin/'. $back_link);
                    // $data['response'] = 'failed';
                    }
            }else{
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('add_exhibits', $error['error']);
                redirect(base_url().'unit_user_document_add_admin/'. $back_link);
            }
            
            // load view
            $this->session->set_flashdata('add_exhibits','Document added successfully.');
            redirect(base_url().'unit_user_document_add_admin/'. $back_link);
        }else{

            // load view  
        }
    }

    public function edit_exhibits_docs(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            $back_link = $this->input->post('back_link'); 
                      
            $data = array();
            if(!empty($_FILES['file']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                    
                //Load upload library
                $this->load->library('upload', 
                $config);         
                
               
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                          // File upload
                    if($this->upload->do_upload('file')){
                        
                        //delete file
                        $this->load->helper("file");
                        $file= $this->input->post('file_filename');
                        unlink('./uploads/'.$file);

                        // Get data about the file
                            $this->Posts_model-> edit_exhibits_docs();
                            $this->session->set_flashdata('edit_exhibits','Document updated successfully.');
                            redirect(base_url().'unit_user_document_add/'. $back_link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('edit_exhibits', $error['error']);
                        redirect(base_url().'unit_user_document_add/'. $back_link);
                    }
            }else{
                $this->Posts_model-> edit_exhibits_docs_null();
                $this->session->set_flashdata('edit_exhibits','Document updated successfully.');
                redirect(base_url().'unit_user_document_add/'. $back_link);

            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'exhibits/'.$accronym.'-'.$programID);
        }else{

            // load view
           
        }

    }

    public function edit_exhibits_docs1(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){

            $back_link = $this->input->post('back_link'); 
                      
            $data = array();
            if(!empty($_FILES['file']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                    
                //Load upload library
                $this->load->library('upload', 
                $config);         
                
               
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                          // File upload
                    if($this->upload->do_upload('file')){
                        
                        //delete file
                        $this->load->helper("file");
                        $file= $this->input->post('file_filename');
                        unlink('./uploads/'.$file);

                        // Get data about the file
                            $this->Posts_model-> edit_exhibits_docs();
                            $this->session->set_flashdata('edit_exhibits','Document updated successfully.');
                            redirect(base_url().'unit_user_document_add_admin/'. $back_link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('edit_exhibits', $error['error']);
                        redirect(base_url().'unit_user_document_add_admin/'. $back_link);
                    }
            }else{
                $this->Posts_model-> edit_exhibits_docs_null();
                $this->session->set_flashdata('edit_exhibits','Document updated successfully.');
                redirect(base_url().'unit_user_document_add_admin/'. $back_link);

            }
        }else{

            // load view
           
        }

    }

    public function delete_exhibits_docs(){

        $back_link = $this->input->post('back_link'); 
        $result = $this->Posts_model->delete_exhibits_docs();
        
        if($result){
            $this->load->helper("file");
            $file= $this->input->post('file_filename');
            unlink('./uploads/'.$file);
        }
      
        $this->session->set_flashdata('delete_exhibits','Document deleted successfully.');
        redirect(base_url().'unit_user_document_add/'. $back_link);
    }

    public function delete_exhibits_docs1(){

        $back_link = $this->input->post('back_link'); 
        $result = $this->Posts_model->delete_exhibits_docs();
        
        if($result){
            $this->load->helper("file");
            $file= $this->input->post('file_filename');
            unlink('./uploads/'.$file);
        }
      
        $this->session->set_flashdata('delete_exhibits','Document deleted successfully.');
        redirect(base_url().'unit_user_document_add_admin/'. $back_link);
    }

    public function categories() {
        $page = 'categories';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            $data['list_of_categories'] = $this->Posts_model->list_of_categories();
            $notification['menu'] = 'Quarters';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //$notification['get_pending_user'] = $this->Posts_model->get_pending_user();
            //$notification['notification_data'] = $this->Posts_model->get_notifications_data();
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/add-quarter');
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function results() {
        $page = 'result';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            $data['Memo'] = $this->Posts_model->get_list_of_results_Memo();
            $data['Result'] = $this->Posts_model->get_list_of_results();
            $data['Division'] = $this->Posts_model->get_list_of_divisions();
            $data['Quarter'] = $this->Posts_model->list_of_categories();
            //print_r($data);
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $notification['menu'] = 'Results';
            $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/add-result');
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function add_quarter(){
        $this->Posts_model->add_quarter();
        $this->session->set_flashdata('add_quarter','Quarter added successfully.');
        redirect(base_url().'categories');
    }

    public function edit_quarter(){
        $this->Posts_model->edit_quarter();
        $this->session->set_flashdata('edit_quarter','Quarter updated successfully.');
        redirect(base_url().'categories');
    }

    public function delete_quarter(){
        $this->Posts_model->delete_quarter();
        $this->session->set_flashdata('delete_quarter','Quarter deleted successfully.');
        redirect(base_url().'categories');
    }

    public function approved_user($param){

        $data['accounts'] = $this->Posts_model->get_user_email($param);
        $user_email = $data['accounts']['usr_email'];
        $result = $this->Posts_model->update_user_status_approved($param);
        if($result){
            $this->send($user_email);
            $this->session->set_flashdata('approved_user','Account has been approved.');
        }
        redirect(base_url().'accounts');
    }

    public function delete_user(){
        $result = $this->Posts_model->delete_user_account();
        if($result){
            $this->session->set_flashdata('delete_user','Account has been deleted.');
        }
        redirect(base_url().'accounts');
    }

    public function resetpassword_user($param){

        $data['accounts'] = $this->Posts_model->get_user_email($param);
        $user_email = $data['accounts']['usr_email'];
        $password = $this->generateRandomString();
        $result = $this->Posts_model->resetpassword_user($param, $password);
        if($result){
            $this->send_password($user_email, $password);
            $this->session->set_flashdata('resetpassword_user','Account password has been reset. Default Password: '.$password);
        }
        
        redirect(base_url().'accounts');
    }

    function generateRandomString() {
        $characters = '@!#$%&*0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString;
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    public function block_user($param){
        $this->Posts_model->block_user_account($param);
        $this->session->set_flashdata('block_user','Account has been blocked.');
        redirect(base_url().'accounts');
    }

    public function accreditor_user($param){
        $this->Posts_model->accreditor_user_account($param);
        $this->session->set_flashdata('accreditor_user','Account role has been set to accreditor.');
        redirect(base_url().'accounts');
    }

    public function test_user($param){
        $this->Posts_model->admin_user($param);
        $this->session->set_flashdata('admin_user','Account role has been set to administrator.');
        redirect(base_url().'accounts');
    }

    public function su_user($param){
        $this->Posts_model->su_user($param);
        $this->session->set_flashdata('admin_user','Account role has been set to Super Administrator.');
        redirect(base_url().'accounts');
    }

    public function u_user($param){
        $this->Posts_model->u_user($param);
        $this->session->set_flashdata('admin_user','Account role has been set to User.');
        redirect(base_url().'accounts');
    }

    function send($param){
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
        
        // Add a recipient
        $mail->addAddress($param);
        
        // Add cc or bcc 
       // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Your account is approved!        ';
        
        // Set email format to HTML
        $mail->isHTML(true);


        
        // Email body content
        $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='500' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 500px;' class='wrapper'>
                        
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;'>
                        
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>
                        
                                    <!-- LOGO -->
                                    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2. URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content=logo&utm_campaign={{Campaign-Name}} -->
                                    <a target='_blank' style='text-decoration: none;'
                                        href='". base_url() ."'><img border='0' vspace='0' hspace='0'
                                        src='http://dosbetaapp.byethost9.com/assets/img/MYPALogo.png'
                                        width='50' height='50'
                                        style='
                                        color: #FFFFFF;
                                        font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;' /></a>
                        
                                </td>
                            </tr>
                        
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='http://dosbetaapp.byethost9.com/assets/img/MYPALogo.png'
                                    width='340' style='
                                    width: 100%;
                                    max-width: 340px;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        NOTIFICATION
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                        Welcome to R2 FASD Services
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'>
                                    <strong>You can now login by using the email and password created during your registration process</strong>.
                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='".base_url()."'>
                                                        Login
                                                    </a>
                                                </td>
                                             
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 10px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        This email was sent to&nbsp; ". $param .".  © 2020 TESDA DOS.&nbsp; Site developed and&nbsp; managed by R2MIS Office.     
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            return TRUE;
        }
    }

    //--Send Password via Email--
    function send_password($param, $password){
    
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $this->config->load('phpmailer');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
            
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
            
        // Add a recipient
        $mail->addAddress($param);
        
        // Add cc or bcc 
        // $mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'New Login Credential';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                    </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://rms.tesdar02onlinereporting.ph/tdis/assets/img/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                    TEMPORARY PASSWORD
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    <hr>
                                    <br>
                                    Here is your temporary password: ".$password.". If you didn’t request this password reset, please secure your account and contact the administrator at region2.ictu@tesda.gov.ph immediately.
                                    <br>    
                                    <br>---- <br><br>
                                    <b>TESDA DOS ICTU</b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url() ."'>
                                                        Login
                                                    </a>
                                                    <br>
                                                </td>
                                                
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                        
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        <br>
                                        <br>
                                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp; ". $param .".  © ".$this->config->item('copyright_year')." TESDA Region II (Cagayan Valley).&nbsp; Site developed and&nbsp; managed by ICTU.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
        $mail->Body = $mailContent;
        
        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            return TRUE;
        }
    }
//--Send Password via Email--

    public function operating_units() {
        $page = 'operating-units';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $data['list_of_operating_units'] = $this->Posts_model->get_poperating_units();
            $notification['menu'] = 'Operating Units';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/add-operating-unit');
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function add_operating_units(){
        $this->Posts_model->add_operating_units();
        $this->session->set_flashdata('add_operating_units','Operating Unit added successfully.');
        redirect(base_url().'operating_units');
    }

    public function edit_operating_units(){
        $this->Posts_model->edit_operating_units();
        $this->session->set_flashdata('edit_operating_units','Operating Unit updated successfully.');
        redirect(base_url().'operating_units');
    }

    public function delete_operating_units(){
        $this->Posts_model->delete_operating_units();
        $this->session->set_flashdata('delete_operating_units','Operating Unit deleted successfully.');
        redirect(base_url().'operating_units');
    }

    public function unit_admin($parameter) {
        $page = 'units-admin';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $explode = explode('-', $parameter);
            $ous_id = $explode[2];
            $ous_desc = str_replace('%20',' ',$explode[3]);
           
            
            $data['ous_id'] = $ous_id;
            $data['ous_desc'] = $ous_desc;
            $data['list_of_divisions_admin'] = $this->Posts_model->get_list_of_division_admin($ous_id);
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $notification['menu'] = 'Operating Units: '.$ous_desc;
            //print_r($notification);
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function unit_user_document_admin($param) {
        $page = 'unit-user-document-admin';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            //Explode to String
            $explode = explode('-', $param);
            $unit = $explode[0];
            $unit_id = $explode[1];
            $ous_desc = str_replace('%20',' ',$explode[3]);

            $data['ous_desc'] = $ous_desc;
            $data['ous_id'] = $explode[2];
            $data['back_link'] = $param;
            $data['unit_desc'] = $unit;
            $data['unit_id'] = $unit_id;
            $data['category'] = $this->Posts_model->get_category();
            
            //$data['list_of_divisions_approved'] = $this->Posts_model->get_list_of_division_approved($this->session->ous_id);
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $notification['menu'] = 'Operating Unit: '.$ous_desc. ', Division: '.$unit;
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function unit_user_document_add_admin($param) {
        $page = 'unit-user-document-add-admin';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $explode = explode('-', $param);

            $ous_id = $explode[2];
            $ous_desc = str_replace('%20',' ',$explode[3]);
            $unit = $explode[0];
            $unit_id = $explode[1];
            $year = $explode[4];
            $cat_id = $explode[5];
            $cat_desc = str_replace('%20',' ',$explode[6]);
            
            $data['ous_desc'] = $ous_desc;
            $data['ous_id'] = $ous_id;
            $data['unit'] = $unit;
            $data['unit_id'] = $unit_id;
            $data['year'] = $year;
            $data['cat_id'] = $cat_id;
            $data['cat_desc'] = $cat_desc;
            $data['back_link'] = $param;
            $data['list_of_docs'] = $this->Posts_model->list_of_docs($year, $cat_id, $ous_id, $unit_id);
            $data['Memo'] = $this->Posts_model->get_memo($unit, $cat_id, $year);
            $data['Result'] = $this->Posts_model->get_result($unit, $cat_id, $year);
            //print_r($data);
            $notification['menu'] = 'Operating Unit: '.$ous_desc. ', Division: '.$unit.', '.$year.': '.$cat_desc.': Add Document';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/add-exhibits-docs1');
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function unit_user_admin() {
        $page = 'units-user-admin';
        
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $data['list_of_divisions_approved'] = $this->Posts_model->get_list_of_division($this->session->ous_id);
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            $notification['menu'] = 'Division: Add Division';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $data);
            $this->load->view('pages/add-division');
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function add_division(){
        $this->Posts_model->add_division();
        $this->session->set_flashdata('add_division','Division added successfully.');
        redirect(base_url().'unit_user_admin');
    }

    public function edit_division(){
        $this->Posts_model->edit_division();
        $this->session->set_flashdata('edit_division','Division updated successfully.');
        redirect(base_url().'unit_user_admin');
    }

    public function delete_division(){
        $this->Posts_model->delete_division();
        $this->session->set_flashdata('delete_division','Division deleted successfully.');
        redirect(base_url().'unit_user_admin');
    }

    public function user_profile(){

        $page = 'user-profile';
        //$page = 'maintenance1';
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            $data['accounts'] = $this->Posts_model->get_user_info();
            $name['name'] = $data['accounts']['usr_name'];
            $name['profile'] = $data['accounts']['usr_link_id'];
            $name['operating_unit'] = $data['accounts']['ous_desc'];
            $name['operating_units'] = $this->Posts_model->get_poperating_units();

            //Personal Information
            $data['personal_information'] = $this->Posts_model->get_personal_information();
            $name['position'] =  $data['personal_information']['emp_position'];
            $name['dob'] =  $data['personal_information']['emp_dob'];
            $name['pob'] =  $data['personal_information']['emp_pob'];
            $name['sex'] =  $data['personal_information']['emp_sex'];
            $name['citizenship'] =  $data['personal_information']['emp_citizenship'];
            $name['civil_status'] =  $data['personal_information']['emp_civil_status'];
            $name['office'] =  $data['personal_information']['emp_office'];
            $name['status'] =  $data['personal_information']['emp_status'];
            $name['salary_grade'] =  $data['personal_information']['emp_sg'];
            $name['eop1'] =  $data['personal_information']['emp_eop_1'];
            $name['eop2'] =  $data['personal_information']['emp_eop_2'];
            $name['eop3'] =  $data['personal_information']['emp_eop_3'];
            $name['eop4'] =  $data['personal_information']['emp_eop_4'];
            $name['eop5'] =  $data['personal_information']['emp_eop_5'];
            $name['eop6'] =  $data['personal_information']['emp_eop_6'];
            $name['emp_gov_id'] =  $data['personal_information']['emp_gov_id'];
            $name['emp_gov_place'] =  $data['personal_information']['emp_gov_place'];
            $name['emp_gov_type'] =  $data['personal_information']['emp_gov_type'];

            //PDS Sheet 1
            $data['personal_information_pds_sheet1'] = $this->Posts_model->get_personal_information_pds_sheet1();
            $name['pi_surname'] =  $data['personal_information_pds_sheet1']['pi_surname'];
            $name['pi_firstname'] =  $data['personal_information_pds_sheet1']['pi_firstname'];
            $name['pi_middlename'] =  $data['personal_information_pds_sheet1']['pi_middlename'];
            $name['pi_extname'] =  $data['personal_information_pds_sheet1']['pi_extname'];
            $name['pi_height'] =  $data['personal_information_pds_sheet1']['pi_height'];
            $name['pi_weight'] =  $data['personal_information_pds_sheet1']['pi_weight'];
            $name['pi_blood_type'] =  $data['personal_information_pds_sheet1']['pi_blood_type'];
            $name['pi_gsis'] =  $data['personal_information_pds_sheet1']['pi_gsis'];
            $name['pi_pagibig'] =  $data['personal_information_pds_sheet1']['pi_pagibig'];
            $name['pi_philhealth'] =  $data['personal_information_pds_sheet1']['pi_philhealth'];
            $name['pi_sss'] =  $data['personal_information_pds_sheet1']['pi_sss'];
            $name['pi_tin_no'] =  $data['personal_information_pds_sheet1']['pi_tin_no'];
            $name['pi_employee_id'] =  $data['personal_information_pds_sheet1']['pi_employee_id'];

            $name['pi_ra_block_no'] =  $data['personal_information_pds_sheet1']['pi_ra_block_no'];
            $name['pi_ra_street'] =  $data['personal_information_pds_sheet1']['pi_ra_street'];
            $name['pi_ra_subdivision'] =  $data['personal_information_pds_sheet1']['pi_ra_subdivision'];
            $name['pi_ra_barangay'] =  $data['personal_information_pds_sheet1']['pi_ra_barangay'];
            $name['pi_ra_municipality'] =  $data['personal_information_pds_sheet1']['pi_ra_municipality'];
            $name['pi_ra_province'] =  $data['personal_information_pds_sheet1']['pi_ra_province'];
            $name['pi_ra_zip'] =  $data['personal_information_pds_sheet1']['pi_ra_zip'];

            $name['pi_pa_block_no'] =  $data['personal_information_pds_sheet1']['pi_pa_block_no'];
            $name['pi_pa_street'] =  $data['personal_information_pds_sheet1']['pi_pa_street'];
            $name['pi_pa_subdivision'] =  $data['personal_information_pds_sheet1']['pi_pa_subdivision'];
            $name['pi_pa_barangay'] =  $data['personal_information_pds_sheet1']['pi_pa_barangay'];
            $name['pi_pa_municipality'] =  $data['personal_information_pds_sheet1']['pi_pa_municipality'];
            $name['pi_pa_province'] =  $data['personal_information_pds_sheet1']['pi_pa_province'];
            $name['pi_pa_zip'] =  $data['personal_information_pds_sheet1']['pi_pa_zip'];

            $name['pi_telephone'] =  $data['personal_information_pds_sheet1']['pi_telephone'];
            $name['pi_mobile'] =  $data['personal_information_pds_sheet1']['pi_mobile'];
            $name['pi_email'] =  $data['personal_information_pds_sheet1']['pi_email'];

            //PDS Sheet 1_1
            $data['personal_information_pds_sheet1_1'] = $this->Posts_model->get_personal_information_pds_sheet1_1();
            $name['fb_spouse_surname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_surname'];
            $name['fb_spouse_fname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_fname'];
            $name['fb_spouse_mname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_mname'];
            $name['fb_spouse_extname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_extname'];
            $name['fb_spouse_occupation'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_occupation'];
            $name['fb_spouse_business'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_business'];
            $name['fb_spouse_business_address'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_business_address'];
            $name['fb_spouse_telephone'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_telephone'];
            $name['fb_father_surname'] =  $data['personal_information_pds_sheet1_1']['fb_father_surname'];
            $name['fb_father_fname'] =  $data['personal_information_pds_sheet1_1']['fb_father_fname'];
            $name['fb_father_mname'] =  $data['personal_information_pds_sheet1_1']['fb_father_mname'];
            $name['fb_father_extname'] =  $data['personal_information_pds_sheet1_1']['fb_father_extname'];
            $name['fb_mother_surname'] =  $data['personal_information_pds_sheet1_1']['fb_mother_surname'];
            $name['fb_mother_fname'] =  $data['personal_information_pds_sheet1_1']['fb_mother_fname'];
            $name['fb_mother_mname'] =  $data['personal_information_pds_sheet1_1']['fb_mother_mname'];

            //Educational Background
            $name['eb_level'] = $this->Posts_model->get_hr_eb_level();


            $notification['menu'] = 'User Profile';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
           // print_r($name);
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page, $name);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function update_user(){

        if($this->input->post('password') == $this->input->post('confirmpassword')){
            
            // Check form submit or not
            if($this->input->post('upload') != NULL ){
                
                $data = array();
                if(!empty($_FILES['file']['name'])){
                    
                    // Set preference
                    $config['upload_path'] = 'uploads/profile/';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size'] = '2048'; // max size in KB
                    $config['max_width'] = '192'; //max resolution width
                    $config['max_height'] = '192';  //max resolution height
                    $config['file_name'] = $_FILES['file']['name'];
                        
                    //Load upload library
                    $this->load->library('upload',$config);         
                    
                    // File upload
                    if($this->upload->do_upload('file')){

                        // Get data about the file
                        $uploadData = $this->upload->data();
                        $filename = $uploadData['file_name'];

                        $this->Posts_model->update_user1($filename);
                        $user_id = $this->Posts_model->get_user_info();

                        $user_data = array(
                            'usr_id' => $user_id['usr_id'],
                            'email' => $user_id['usr_email'],
                            'name' => $user_id['usr_name'],
                            'role' => $user_id['usr_role'],
                            'ous_id' => $user_id['usr_ous_id'],
                            'ous_desc' => $user_id['ous_desc'],
                            'profile' => $user_id['usr_link_id'],
                            'logged_in' => true
                        );
                        
                        $this->session->set_userdata($user_data);

                        $this->session->set_flashdata('update_user','User infromation updated successfully.');
                        redirect(base_url().'user_profile');
                   
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('update_user', $error['error']);
                        redirect(base_url().'user_profile');
                    //echo $data['response'] = 'failed';
                    }
                }else{

                        $this->Posts_model->update_user1($filename);
                        
                        $user_id = $this->Posts_model->get_user_info();
                        $user_data = array(
                            'usr_id' => $user_id['usr_id'],
                            'email' => $user_id['usr_email'],
                            'name' => $user_id['usr_name'],
                            'role' => $user_id['usr_role'],
                            'ous_id' => $user_id['usr_ous_id'],
                            'ous_desc' => $user_id['ous_desc'],
                            'profile' => $user_id['usr_link_id'],
                            'logged_in' => true
                        );
                        
                        $this->session->set_userdata($user_data);
                        $this->session->set_flashdata('update_user','User infromation updated successfully.');
                        redirect(base_url().'user_profile');
                }
                // load view
                
            }else{

                   //Refresh user data

                   $user_id = $this->Posts_model->get_user_info();
                   $user_data = array(
                    'usr_id' => $user_id['usr_id'],
                    'email' => $user_id['usr_email'],
                    'name' => $user_id['usr_name'],
                    'role' => $user_id['usr_role'],
                    'ous_id' => $user_id['usr_ous_id'],
                    'ous_desc' => $user_id['ous_desc'],
                    'profile' => $user_id['usr_link_id'],
                    'logged_in' => true
                   );
                   
                   $this->session->set_userdata($user_data);

                // load view  
                $this->Posts_model->update_user1($filename);
                $this->session->set_flashdata('update_user','User infromation updated successfully.');
                redirect(base_url().'user_profile');
            }
           

        }else{

            $this->session->set_flashdata('update_user','The <strong>password</strong> confirmation does not match. Please try again.');
            redirect(base_url().'user_profile');
        
        } //End of  if($this->input->post('password')== $this->input->post('confirmpassword')){
        
    } // End of public function update_user(){

    public function add_result_docs(){
        $tab;
        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            $back_link = $this->input->post('back_link'); 
            $data = array();
            if(!empty($_FILES['file']['name'])){
                
                // Set preference
                if($this->input->post('res_cat') == 'Memo'){  
                    $config['upload_path'] ='uploads/memos';
                    $tab='Home';
                }else {
                    $config['upload_path'] ='uploads/results';
                    $tab='Contact';
                }
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['file']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('file')){

                    // Get data about the file
                    $this->Posts_model->insert_results_docs();
                    $this->session->set_flashdata('result_added','Document added successfully.');
                    redirect(base_url().'results#'.$tab);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('result_added', $error['error']);
                        redirect(base_url().'results#'.$tab);
                    // $data['response'] = 'failed';
                    }
            }else{
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('result_added', $error['error']);
                redirect(base_url().'results#'.$tab);
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function delete_result_docs(){

        if($this->input->post('res_cat') == 'Memo'){  
            $path ='./uploads/memos/';
            $tab='home';
        }else {
            $path ='./uploads/results/';
            $tab='contact';
        }
        $result = $this->Posts_model->delete_result_docs();
        
        if($result){
            $this->load->helper("file");
            $file= $this->input->post('res_filename');
            unlink($path.$file);
        }
      
        $this->session->set_flashdata('delete_result','Document deleted successfully.');
        redirect(base_url().'results#'.$tab);
    }

    public function auth_logs(){

        $page = 'logs';
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{

            //$data['auth_log'] = $this->Posts_model->get_auth_logs();
            $notification['menu'] = 'Auth Logs';

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }

             //get personal information
             $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$page);
            $this->load->view('templates/admin-footer-template');
        }
    }


    
    //Send to EMAIL

    function grant_user_send($email, $ous, $dep, $action){
        if ($email == null){

        }else{

            // Load PHPMailer library
            $this->load->library('phpmailer_lib');
            
            // PHPMailer object
            $mail = $this->phpmailer_lib->load();
            
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host       = $this->config->item('smtp_host');
            $mail->SMTPAuth   = $this->config->item('smtp_auth');
            $mail->Username   = $this->config->item('smtp_username');
            $mail->Password   = $this->config->item('smtp_password');
            $mail->SMTPSecure = $this->config->item('smtp_secure');
            $mail->Port       = $this->config->item('smtp_port');
                
            $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
            
            // Add a recipient
            $mail->addAddress($email);
            
            // Add cc or bcc 
            // $mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
            
            // Email subject
            $mail->Subject = 'TESDA DOS MYPA DocBank| Request '. $action;
            
            // Set email format to HTML
            $mail->isHTML(true);
            
            // Email body content
            $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='500' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 500px;' class='wrapper'>
                        
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;'>
                        
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>
                        
                                    <!-- LOGO -->
                                    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2. URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content=logo&utm_campaign={{Campaign-Name}} -->
                                    <a target='_blank' style='text-decoration: none;'
                                        href='". base_url() ."'><img border='0' vspace='0' hspace='0'
                                        src='https://www.mediafire.com/view/m5ag4222rks3xna/alert.png/file'
                                        width='50' height='50'
                                        style='
                                        color: #FFFFFF;
                                        font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;' /></a>
                        
                                </td>
                            </tr>
                        
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://www.mediafire.com/view/m5ag4222rks3xna/alert.png'
                                    width='340' style='
                                    width: 100%;
                                    max-width: 340px;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        NOTIFICATION
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                        REQUEST ".$action."
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'>
                                    <strong>". $this->session->name ."</strong>&nbsp; is ".$action ." your request to access &nbsp;<strong>". $ous ." => " .$dep. "</strong>.
                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url() ."'>
                                                        Login
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 10px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        This email was sent to&nbsp; ". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by MIS Office.     
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
            $mail->Body = $mailContent;
            
            // Send email
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }else{
                return TRUE;
            }
        }
    }

    public function deny_user($param){

        if($this->session->logged_in){
            $result = $this->Posts_model->deny_user($param);
            if($result){
                $request = $this->Posts_model->check_email_request($param);
                $email = $request['usr_email'];
                $ous = $request['ous_desc'];
                $dep = $request['dep_desc'];
                $action = "DENIED";

                $this->grant_user_send($email, $ous, $dep, $action);
            $this->session->set_flashdata('grant_user','Account access has been denied.');
            }
            redirect(base_url().'notifications');

        }else{
            $this->session->set_flashdata('deny_user','Please login to continue.');
            redirect(base_url());
        }
    }

    //Email to Admins

    function send_notification_to_admin($email, $insert_id){

        $request_ous = $this->Posts_model->unit_request_details_ous();
        $ous = $request_ous['ous_desc']; 
        $request_division = $this->Posts_model->unit_request_details_division();
        $division = $request_division['dep_desc'];
        
         // Load PHPMailer library
         $this->load->library('phpmailer_lib');
        
         // PHPMailer object
         $mail = $this->phpmailer_lib->load();
         
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
         
         // Add a recipient
         $mail->addAddress($email);
         
         // Add cc or bcc 
        // $mail->addCC('cc@example.com');
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  'R2 ONSA | Request for access to ['. $ous .' => ' .$division.']';
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='500' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 500px;' class='wrapper'>
                        
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;'>
                        
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>
                        
                                    <!-- LOGO -->
                                    <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2. URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content=logo&utm_campaign={{Campaign-Name}} -->
                                    <a target='_blank' style='text-decoration: none;'
                                        href='". base_url() ."'><img border='0' vspace='0' hspace='0'
                                        src='http://oas.csu.edu.ph/assets/img/logo.png'
                                        width='50' height='50'
                                        style='
                                        color: #FFFFFF;
                                        font-size: 10px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;' /></a>
                        
                                </td>
                            </tr>
                        
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='http://oas.csu.edu.ph/assets/img/alert.png'
                                    width='340' style='
                                    width: 100%;
                                    max-width: 340px;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        NOTIFICATION
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                        REQUEST FOR ACCESS
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'>
                                    <strong>". $this->session->name ."</strong>&nbsp; (". $this->session->email .")&nbsp; is requesting access to&nbsp;<strong>". $ous ." => " .$division. "</strong>.
                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='http://oas.csu.edu.ph/grant_user/". $insert_id ."'>
                                                        Approve
                                                    </a>
                                                </td>
                                                
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#d61e0b'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='http://oas.csu.edu.ph/deny_user/". $insert_id ."'>
                                                        Deny
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 10px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        This email was sent to&nbsp; ". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by MIS Office.     
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    //END OF MYPA


    /*public function grant_user_program($param){

        //get email of requester
        $result =  $this->Posts_model->get_grant_user_program($param);
        //set email of requester
        $request_id = $result["request_id"];
        $program = $result["description"];
        //set onesignal notif to requester
        $this->send_onesignalnotif_user_program($request_id, $program);

        $this->Posts_model->grant_user_program($param);
        $this->session->set_flashdata('grant_user_program','Account access has been granted.');
        redirect(base_url().'notifications');
    }

    public function send_onesignalnotif_user_program($request_id, $program){
        //get o_user_id of requester
        $result =  $this->Posts_model->get_o_user_id($request_id);
        //set o_user_id of requester
        $o_user_id = $result["o_user_id"];

        $this->sendMessageOne($o_user_id, $program);
    }

    function sendMessageOne($o_user_id, $program){
        $content = array(
            "en" => 'Your request to access '. $program .' was granted. Please refresh your browser.'
            );

        $heading = array(
            "en" => 'CSU | Online Accreditation System'
            );
        
        $fields = array(
            'app_id' => 'b02de34c-8c32-4ccd-86e0-dad60adbe1c5',
            'include_player_ids' => array($o_user_id),
            'data' => array("foo" => "bar"),
            'contents' => $content,
            'headings' => $heading
        );
        
        $fields = json_encode($fields);
        print("\nJSON sent:\n");
        print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }


    public function deny_user_program($param){
        $this->Posts_model->deny_user_program($param);
        $this->session->set_flashdata('deny_user_program','Account access has been denied.');
        redirect(base_url().'notifications');
    }*/

    function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
         $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfsr1AcAAAAAEx_ucaNHBcTLEQ0RmPvDbIGVV7Y=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function validate_captcha_signup() {
        $captcha = $this->input->post('g-recaptcha-response');
         $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfsr1AcAAAAAEx_ucaNHBcTLEQ0RmPvDbIGVV7Y=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }    

    public function site_offline(){

        $page = 'maintenance';
        if(!file_exists(APPPATH.'views/pages/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/'.$page);
        }
    }

    //Start of Supply

    public function request_supply() {
        $page = 'request-supply';
        
        if(!file_exists(APPPATH.'views/pages/supply/' .$page.'.php')){
            show_404();
        }else{

            $data['list_of_unit'] = $this->Posts_model->get_list_of_unit();
            
            $notification['menu'] = 'Divisions';
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            
             //get personal information
             $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();


            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/supply/'.$page, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    //Start HR

    public function hr_dashboard(){

        $pagex = 'dashboard';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            $data['latest_trainings_of_user'] = $this->Posts_model->latest_trainings_of_user();
            
            //$data['latest_invitation_attendance'] = $this->Posts_model->latest_invitation_attendance();
            
            $x_array = $this->Posts_model->latest_invitation_attendance();
            
            //array
            $x_latest_invitation = array();

            foreach($x_array as $row) {
                
                //get ous
                $act_inv_trn_id = $row['inv_trn_id'];
                $result = $this->Posts_model->get_ous_inv_for_action_save($act_inv_trn_id);
                $ous_array = array();
                foreach($result as $xrow){
                    $ous_array[] = array(
                        'ous_desc' => $xrow['ous_desc'],
                        'act_status' => $xrow['act_status']
                    );
                }

                $x_latest_invitation[] = array(
                    'trn_title' => $row['trn_title'],
                    'trn_from_date' => $row['trn_from_date'],
                    'trn_to_date' => $row['trn_to_date'],
                    'inv_trn_memo_mo' => $row['inv_trn_memo_mo'],
                    'inv_trn_id' => $row['inv_trn_id'],
                    'trn_inv_file' => $row['trn_inv_file'],
                    'trn_deadline' => $row['trn_deadline'],
                    'trn_tmpr' => $row['trn_tmpr'],
                    'trn_timestamp' => $row['trn_timestamp'],
                    'usr_name' => $row['usr_name'],
                    'ous_desc_x' => $ous_array
                );
            }

            $data['test_array'] = $x_latest_invitation;



            $data['recent_login'] = $this->Posts_model->recent_login();

            //Total per type of OUs
            $array = $this->Posts_model->OUs();
            $per_ous = array();

            foreach($array as $row) {
                $ous_idx=$row['ous_id'];
                $oua_desc=$row['ous_desc'];
                $administrative = $this->Posts_model->administrative_total_bar($ous_idx);
                $leadership = $this->Posts_model->leadership_total_bar($ous_idx);
                $managerial = $this->Posts_model->managerial_total_bar($ous_idx);
                $supervisory = $this->Posts_model->supervisory_total_bar($ous_idx);
                $technicals = $this->Posts_model->technical_total_bar($ous_idx);

                $per_ous[] = array(
                    'ous_id' => $ous_idx,
                    'ous_desc' => $oua_desc,
                    'administrative' => $administrative,
                    'leadership' => $leadership,
                    'managerial' => $managerial,
                    'supervisory' => $supervisory,
                    'technicals' => $technicals
                );
            }

            $data['data_array_per_ous'] =  $per_ous;
            //print_r($data);
            //Total per type of LD
            $data['administrative'] = $this->Posts_model->administrative_total();
            $data['leadership'] = $this->Posts_model->leadership_total();
            $data['managerial'] = $this->Posts_model->managerial_total();
            $data['supervisory'] = $this->Posts_model->supervisory_total();
            $data['technical'] = $this->Posts_model->technical_total();

            //Total row count LD
            $data['training_total'] = $this->Posts_model->training_total();

            //Total row count Emp
            $data['emp_total'] = $this->Posts_model->employee_total();

             //Total row count OUs
             $data['OUS_total'] = $this->Posts_model->OUS_total();

            //Per Month
           
            //January
            $january = $this->January();
            $data['Jan_A'] = $january['Administrative'];
            $data['Jan_L'] = $january['Leadership'];
            $data['Jan_M'] = $january['Managerial'];
            $data['Jan_S'] = $january['Supervisory'];
            $data['Jan_T'] = $january['Technical'];
            $data['Total_Jan'] = $january['Administrative'] + $january['Leadership'] + $january['Managerial'] + $january['Supervisory'] + $january['Technical'];

            //February
            $february = $this->February();
            $data['Feb_A'] = $february['Administrative'];
            $data['Feb_L'] = $february['Leadership'];
            $data['Feb_M'] = $february['Managerial'];
            $data['Feb_S'] = $february['Supervisory'];
            $data['Feb_T'] = $february['Technical'];
            $data['Total_Feb'] = $february['Administrative'] + $february['Leadership'] + $february['Managerial'] + $february['Supervisory'] + $february['Technical'];

            //March
            $march = $this->March();
            $data['Mar_A'] = $march['Administrative'];
            $data['Mar_L'] = $march['Leadership'];
            $data['Mar_M'] = $march['Managerial'];
            $data['Mar_S'] = $march['Supervisory'];
            $data['Mar_T'] = $march['Technical'];
            $data['Total_Mar'] = $march['Administrative'] + $march['Leadership'] + $march['Managerial'] + $march['Supervisory'] + $march['Technical'];

            //April
            $april = $this->April();
            $data['Apr_A'] = $april['Administrative'];
            $data['Apr_L'] = $april['Leadership'];
            $data['Apr_M'] = $april['Managerial'];
            $data['Apr_S'] = $april['Supervisory'];
            $data['Apr_T'] = $april['Technical'];
            $data['Total_Apr'] = $april['Administrative'] + $april['Leadership'] + $april['Managerial'] + $april['Supervisory'] + $april['Technical'];

             //May
             $may = $this->May();
             $data['May_A'] = $may['Administrative'];
             $data['May_L'] = $may['Leadership'];
             $data['May_M'] = $may['Managerial'];
             $data['May_S'] = $may['Supervisory'];
             $data['May_T'] = $may['Technical'];
             $data['Total_May'] = $may['Administrative'] + $may['Leadership'] + $may['Managerial'] + $may['Supervisory'] + $may['Technical'];

             //June
             $jun = $this->June();
             $data['Jun_A'] = $jun['Administrative'];
             $data['Jun_L'] = $jun['Leadership'];
             $data['Jun_M'] = $jun['Managerial'];
             $data['Jun_S'] = $jun['Supervisory'];
             $data['Jun_T'] = $jun['Technical'];
             $data['Total_Jun'] = $jun['Administrative'] + $jun['Leadership'] + $jun['Managerial'] + $jun['Supervisory'] + $jun['Technical'];

              //July
              $jul = $this->July();
              $data['Jul_A'] = $jul['Administrative'];
              $data['Jul_L'] = $jul['Leadership'];
              $data['Jul_M'] = $jul['Managerial'];
              $data['Jul_S'] = $jul['Supervisory'];
              $data['Jul_T'] = $jul['Technical'];
              $data['Total_Jul'] = $jul['Administrative'] + $jul['Leadership'] + $jul['Managerial'] + $jul['Supervisory'] + $jul['Technical'];

               //August
               $aug = $this->August();
               $data['Aug_A'] = $aug['Administrative'];
               $data['Aug_L'] = $aug['Leadership'];
               $data['Aug_M'] = $aug['Managerial'];
               $data['Aug_S'] = $aug['Supervisory'];
               $data['Aug_T'] = $aug['Technical'];
               $data['Total_Aug'] = $aug['Administrative'] + $aug['Leadership'] + $aug['Managerial'] + $aug['Supervisory'] + $aug['Technical'];

               //September
               $sep = $this->September();
               $data['Sep_A'] = $sep['Administrative'];
               $data['Sep_L'] = $sep['Leadership'];
               $data['Sep_M'] = $sep['Managerial'];
               $data['Sep_S'] = $sep['Supervisory'];
               $data['Sep_T'] = $sep['Technical'];
               $data['Total_Sep'] = $sep['Administrative'] + $sep['Leadership'] + $sep['Managerial'] + $sep['Supervisory'] + $sep['Technical'];

               //October
               $oct = $this->October();
               $data['Oct_A'] = $oct['Administrative'];
               $data['Oct_L'] = $oct['Leadership'];
               $data['Oct_M'] = $oct['Managerial'];
               $data['Oct_S'] = $oct['Supervisory'];
               $data['Oct_T'] = $oct['Technical'];
               $data['Total_Oct'] = $oct['Administrative'] + $oct['Leadership'] + $oct['Managerial'] + $oct['Supervisory'] + $oct['Technical'];

               //November
               $nov = $this->November();
               $data['Nov_A'] = $nov['Administrative'];
               $data['Nov_L'] = $nov['Leadership'];
               $data['Nov_M'] = $nov['Managerial'];
               $data['Nov_S'] = $nov['Supervisory'];
               $data['Nov_T'] = $nov['Technical'];
               $data['Total_Nov'] = $nov['Administrative'] + $nov['Leadership'] + $nov['Managerial'] + $nov['Supervisory'] + $nov['Technical'];

               //December
               $dec = $this->December();
               $data['Dec_A'] = $dec['Administrative'];
               $data['Dec_L'] = $dec['Leadership'];
               $data['Dec_M'] = $dec['Managerial'];
               $data['Dec_S'] = $dec['Supervisory'];
               $data['Dec_T'] = $dec['Technical'];
               $data['Total_Dec'] = $dec['Administrative'] + $dec['Leadership'] + $dec['Managerial'] + $dec['Supervisory'] + $dec['Technical'];

                //Total per LD
                $data['Total_A'] = $dec['Administrative'] + $nov['Administrative'] + $oct['Administrative'] + $sep['Administrative'] + $aug['Administrative'] + $jul['Administrative'] +  $jun['Administrative'] + $april['Administrative'] + $may['Administrative'] + $march['Administrative'] + $february['Administrative'] + $january['Administrative'];
                $data['Total_L'] = $dec['Leadership'] + $nov['Leadership'] + $oct['Leadership'] + $sep['Leadership'] + $aug['Leadership'] + $jul['Leadership'] +  $jun['Leadership'] + $april['Leadership'] + $may['Leadership'] + $march['Leadership'] + $february['Leadership'] + $january['Leadership'];
                $data['Total_M'] = $dec['Managerial'] + $nov['Managerial'] + $oct['Managerial'] + $sep['Managerial'] + $aug['Managerial'] + $jul['Managerial'] +  $jun['Managerial'] + $april['Managerial'] + $may['Managerial'] + $march['Managerial'] + $february['Managerial'] + $january['Managerial'];
                $data['Total_S'] =  $dec['Supervisory'] + $nov['Supervisory'] + $oct['Supervisory'] + $sep['Supervisory'] + $aug['Supervisory'] + $jul['Supervisory'] +  $jun['Supervisory'] + $april['Supervisory'] + $may['Supervisory'] + $march['Supervisory'] + $february['Supervisory'] + $january['Supervisory'];
                $data['Total_T'] = $dec['Technical'] + $nov['Technical'] + $oct['Technical'] + $sep['Technical'] + $aug['Technical'] + $jul['Technical'] +  $jun['Technical'] + $april['Technical'] + $may['Technical'] + $march['Technical'] + $february['Technical'] + $january['Technical'];

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            //print_r($notification);
            $notification['menu'] = 'HR Dashboard';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    function January(){
        $jan_a = 0;
        $jan_l = 0;
        $jan_m = 0;
        $jan_s = 0;
        $jan_t = 0;    

        $result = $this->Posts_model->jan_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $jan_a = $jan_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $jan_l = $jan_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $jan_m = $jan_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $jan_s = $jan_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $jan_t = $jan_t + 1;
            }
        }  
        
        return array(
            'Administrative' =>  $jan_a,
            'Leadership' => $jan_l,
            'Managerial' =>  $jan_m,
            'Supervisory' =>  $jan_s,
            'Technical' =>  $jan_t
        );  
    }

    function February(){
        $feb_a = 0;
        $feb_l = 0;
        $feb_m = 0;
        $feb_s = 0;
        $feb_t = 0;    

        $result = $this->Posts_model->feb_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $feb_a = $feb_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $feb_l = $feb_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $feb_m = $feb_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $feb_s = $feb_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $feb_t = $feb_t + 1;
            }
        }

        return array(
            'Administrative' =>  $feb_a,
            'Leadership' => $feb_l,
            'Managerial' =>  $feb_m,
            'Supervisory' =>  $feb_s,
            'Technical' =>  $feb_t
        );  
    } 
    
    function March(){
        $mar_a = 0;
        $mar_l = 0;
        $mar_m = 0;
        $mar_s = 0;
        $mar_t = 0;    

        $result = $this->Posts_model->mar_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $mar_a = $mar_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $mar_l = $mar_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $mar_m = $mar_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $mar_s = $mar_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $mar_t = $mar_t + 1;
            }
        }

        return array(
            'Administrative' =>  $mar_a,
            'Leadership' => $mar_l,
            'Managerial' =>  $mar_m,
            'Supervisory' =>  $mar_s,
            'Technical' =>  $mar_t
        );  
    } 

    function April(){
        $apr_a = 0;
        $apr_l = 0;
        $apr_m = 0;
        $apr_s = 0;
        $apr_t = 0;    

        $result = $this->Posts_model->apr_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $apr_a = $apr_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $apr_l = $apr_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $apr_m = $apr_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $apr_s = $apr_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $apr_t = $apr_t + 1;
            }
        }

        return array(
            'Administrative' =>  $apr_a,
            'Leadership' => $apr_l,
            'Managerial' =>  $apr_m,
            'Supervisory' =>  $apr_s,
            'Technical' =>  $apr_t
        );  
    } 

    function May(){
        $may_a = 0;
        $may_l = 0;
        $may_m = 0;
        $may_s = 0;
        $may_t = 0;    

        $result = $this->Posts_model->may_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $may_a = $may_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $may_l = $may_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $may_m = $may_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $may_s = $may_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $may_t = $may_t + 1;
            }
        }

        return array(
            'Administrative' =>  $may_a,
            'Leadership' => $may_l,
            'Managerial' =>  $may_m,
            'Supervisory' =>  $may_s,
            'Technical' =>  $may_t
        );  
    } 

    function June(){
        $jun_a = 0;
        $jun_l = 0;
        $jun_m = 0;
        $jun_s = 0;
        $jun_t = 0;    

        $result = $this->Posts_model->jun_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $jun_a = $jun_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $jun_l = $jun_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $jun_m = $jun_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $jun_s = $jun_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $jun_t = $jun_t + 1;
            }
        }

        return array(
            'Administrative' =>  $jun_a,
            'Leadership' => $jun_l,
            'Managerial' =>  $jun_m,
            'Supervisory' =>  $jun_s,
            'Technical' =>  $jun_t
        );  
    } 

    function July(){
        $jul_a = 0;
        $jul_l = 0;
        $jul_m = 0;
        $jul_s = 0;
        $jul_t = 0;    

        $result = $this->Posts_model->jul_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $jul_a = $jul_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $jul_l = $jul_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $jul_m = $jul_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $jul_s = $jul_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $jul_t = $jul_t + 1;
            }
        }

        return array(
            'Administrative' =>  $jul_a,
            'Leadership' => $jul_l,
            'Managerial' =>  $jul_m,
            'Supervisory' =>  $jul_s,
            'Technical' =>  $jul_t
        );  
    } 

    function August(){
        $aug_a = 0;
        $aug_l = 0;
        $aug_m = 0;
        $aug_s = 0;
        $aug_t = 0;    

        $result = $this->Posts_model->aug_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $aug_a = $aug_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $aug_l = $aug_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $aug_m = $aug_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $aug_s = $aug_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $aug_t = $aug_t + 1;
            }
        }

        return array(
            'Administrative' =>  $aug_a,
            'Leadership' => $aug_l,
            'Managerial' =>  $aug_m,
            'Supervisory' =>  $aug_s,
            'Technical' =>  $aug_t
        );  
    } 

    function September(){
        $sep_a = 0;
        $sep_l = 0;
        $sep_m = 0;
        $sep_s = 0;
        $sep_t = 0;    

        $result = $this->Posts_model->sep_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $sep_a = $sep_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $sep_l = $sep_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $sep_m = $sep_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $sep_s = $sep_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $sep_t = $sep_t + 1;
            }
        }

        return array(
            'Administrative' =>  $sep_a,
            'Leadership' => $sep_l,
            'Managerial' =>  $sep_m,
            'Supervisory' =>  $sep_s,
            'Technical' =>  $sep_t
        );  
    } 

    function October(){
        $oct_a = 0;
        $oct_l = 0;
        $oct_m = 0;
        $oct_s = 0;
        $oct_t = 0;    

        $result = $this->Posts_model->oct_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $oct_a = $oct_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $oct_l = $oct_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $oct_m = $oct_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $oct_s = $oct_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $oct_t = $oct_t + 1;
            }
        }

        return array(
            'Administrative' =>  $oct_a,
            'Leadership' => $oct_l,
            'Managerial' =>  $oct_m,
            'Supervisory' =>  $oct_s,
            'Technical' =>  $oct_t
        );  
    } 

    function November(){
        $nov_a = 0;
        $nov_l = 0;
        $nov_m = 0;
        $nov_s = 0;
        $nov_t = 0;    

        $result = $this->Posts_model->nov_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $nov_a = $nov_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $nov_l = $nov_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $nov_m = $nov_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $nov_s = $nov_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $nov_t = $nov_t + 1;
            }
        }

        return array(
            'Administrative' =>  $nov_a,
            'Leadership' => $nov_l,
            'Managerial' =>  $nov_m,
            'Supervisory' =>  $nov_s,
            'Technical' =>  $nov_t
        );  
    } 

    function December(){
        $dec_a = 0;
        $dec_l = 0;
        $dec_m = 0;
        $dec_s = 0;
        $dec_t = 0;    

        $result = $this->Posts_model->dec_total();
        foreach ($result as $row){

            if($row['trn_type'] =='Administrative'){
                $dec_a = $dec_a + 1;
            }
            if($row['trn_type'] =='Leadership'){
                $dec_l = $dec_l + 1;
            }
            if($row['trn_type'] =='Managerial'){
                $dec_m = $dec_m + 1;
            }
            if($row['trn_type'] =='Supervisory'){
                $dec_s = $dec_s + 1;
            }
            if($row['trn_type'] =='Technical'){
                $dec_t = $dec_t + 1;
            }
        }

        return array(
            'Administrative' =>  $dec_a,
            'Leadership' => $dec_l,
            'Managerial' =>  $dec_m,
            'Supervisory' =>  $dec_s,
            'Technical' =>  $dec_t
        );  
    } 


    public function hr_add_training(){

        $pagex = 'unit-user-training-add';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

           
            $data['list_of_trainings_user'] = $this->Posts_model->list_of_trainings_user();
            $data['num_rows'] = $this->Posts_model->num_list_of_trainings_user();
            
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'HR Add Training';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/add-training-docs');
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function add_training_docs(){

        $filename_cot ='';
        $filename_reap ='';
        $filename_tdorf ='';

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            $back_link = $this->input->post('back_link'); 
            $data = array();

            if(!empty($_FILES['cot']['name']) || !empty($_FILES['reap']['name']) || !empty($_FILES['tdorf']['name'])){
                
                //check 1 by 1
                //COT
                if(!empty($_FILES['cot']['name'])){
                    $filename_cot = $this->cot();
                }

                //REAP
                if(!empty($_FILES['reap']['name'])){
                    $filename_reap = $this->reap();
                }

                //TDORF
                if(!empty($_FILES['tdorf']['name'])){
                    $filename_tdorf = $this->tdorf();
                }

            //insert to database
            $this->Posts_model-> insert_training_docs($filename_reap, $filename_cot, $filename_tdorf);
            $this->session->set_flashdata('add_exhibits','Document added successfully.');
            if ($this->input->post('back_link') == null){
                redirect(base_url().'hr_add_training');
            }else{
                redirect(base_url().'add_training_admin/'.$this->input->post('back_link'));
            }
  
            }else{
            $this->Posts_model-> insert_training_docs1();
            $this->session->set_flashdata('add_exhibits','Training added successfully.');
            if ($this->input->post('back_link') == null){
                redirect(base_url().'hr_add_training');
            }else{
                redirect(base_url().'add_training_admin/'.$this->input->post('back_link'));
            }
            }
        }
    }

    public function edit_training_docs(){

        $filename_cot ='';
        $filename_reap ='';
        $filename_tdorf ='';

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            $data = array();

            if(!empty($_FILES['cot']['name']) || !empty($_FILES['reap']['name']) || !empty($_FILES['tdorf']['name'])){
                
                //check 1 by 1
                //COT
                if(!empty($_FILES['cot']['name'])){
                    $filename_cot = $this->cot();
                }

                //REAP
                if(!empty($_FILES['reap']['name'])){
                    $filename_reap = $this->reap();
                }

                //TDORF
                if(!empty($_FILES['tdorf']['name'])){
                    $filename_tdorf = $this->tdorf();
                }

                //insert to database
                $this->Posts_model->edit_training_docs($filename_reap, $filename_cot, $filename_tdorf);
                $this->session->set_flashdata('add_exhibits','Document updated successfully.');
                if ($this->input->post('back_link') == null){
                    redirect(base_url().'hr_add_training');
                }else{
                    redirect(base_url().'add_training_admin/'.$this->input->post('back_link'));
                }
                
  
            }else{
                $this->Posts_model->edit_training_docs($filename_reap, $filename_cot, $filename_tdorf);
                if ($this->input->post('back_link') == null){
                    redirect(base_url().'hr_add_training');
                }else{
                    redirect(base_url().'add_training_admin/'.$this->input->post('back_link'));
                }
            }
        }
    }

 

    public function delete_training(){

        $result = $this->Posts_model->delete_training();
        
        if($result){
            $this->load->helper("file");
            $file_cot= $this->input->post('trn_cot');
            $file_reap= $this->input->post('trn_reap');
            $file_tdorf= $this->input->post('trn_tdorf');
            unlink('./uploads/trainings/'.$file_cot);
            unlink('./uploads/trainings/'.$file_reap);
            unlink('./uploads/trainings/'.$file_tdorf);
        }
      
        $this->session->set_flashdata('delete_exhibits','Document deleted successfully.');
        if ($this->input->post('back_link') == null){
            redirect(base_url().'hr_add_training');
        }else{
            redirect(base_url().'add_training_admin/'.$this->input->post('back_link'));
        };
    }



    function reap(){

         // Set preference
         $config1['upload_path'] ='uploads/trainings/';
         $config1['allowed_types'] = 'pdf';
         $config1['max_size']    = '512000';    // max_size in kb
         $config1['file_name'] = $_FILES['reap']['name'];
             
         //Load upload library
         $this->load->library('upload', $config1);  
         
         $this->upload->initialize($config1);
         
         // File upload
         if($this->upload->do_upload('reap')){
             $uploadData1 = $this->upload->data();
             $filename_reap = $uploadData1['file_name'];
             return $filename_reap;
         }
    }
    function tdorf(){
        // Set preference
        $config2['upload_path'] ='uploads/trainings/';
        $config2['allowed_types'] = 'pdf';
        $config2['max_size']    = '512000';    // max_size in kb
        $config2['file_name'] = $_FILES['tdorf']['name'];
            
        //Load upload library
        $this->load->library('upload', $config2); 
        
        $this->upload->initialize($config2);

        // File upload
        if($this->upload->do_upload('tdorf')){
            $uploadData2 = $this->upload->data();
            $filename_tdorf = $uploadData2['file_name'];
            return $filename_tdorf;
        }
    }

    function cot(){
        // Set preference
        $config['upload_path'] ='uploads/trainings/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '512000';    // max_size in kb
        $config['file_name'] = $_FILES['cot']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('cot')){  
            $uploadData = $this->upload->data();
            $filename_cot = $uploadData['file_name'];
            return $filename_cot;
        }
    }

    public function zip_download_per_employee(){
        if($this->session->logged_in){

            // Load zip library
            $this->load->library('zip'); 
           
            $data = $this->Posts_model->list_of_trainings_user();
            //print_r($data);

            $zip = new ZipArchive;
            $download = date("Y-m-d").'-'.$this->session->name;
            //$zipname = 'temp.zip';
            $zip->open($download, ZipArchive::CREATE);

            foreach ($data as $row) {
                if ($row['trn_cot']==null){
                }else{
                    $filepath = "uploads/trainings/".$row['trn_cot'];
                    $zip->addFile($filepath);
                }
                if ($row['trn_reap']==null){
                }else{
                    $filepath = "uploads/trainings/".$row['trn_reap'];
                    $zip->addFile($filepath);
                }
                if ($row['trn_tdorf']==null){
                }else{
                    $filepath = "uploads/trainings/".$row['trn_tdorf'];
                    $zip->addFile($filepath);
                }
            }
            
            if ($zip->close() === false) {
                exit("Error creating ZIP file");
            };
            
            //download file from temporary file on server as '$filename.zip'
            if (file_exists($download)) {
                ob_clean();
                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename='.$download.'.zip');
                header('Content-Length: ' . filesize($download));
                readfile($download);
            } else {
                exit("Could not find Zip file to download");
            }

        }else {
            redirect(base_url()); 
        }
    }

    public function print_hr_training_user(){

        $pagex = 'print';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

           
            $data['list_of_trainings_user'] = $this->Posts_model->list_of_trainings_user();
            $data['usr_name'] = $this->session->name;
            $data['usr_ous'] = $this->session->ous_desc;
            $data['num_rows'] = $this->Posts_model->num_list_of_trainings_user();
            //print_r($data);
            $this->load->view('pages/hr/'.$pagex, $data);
           
        }

    }

    public function update_user_info(){

        $this->Posts_model->update_user_info();
        $this->session->set_flashdata('update_user','User infromation updated successfully.');
        redirect(base_url().'user_profile');
    }
    
    public function employment_information(){

        $this->Posts_model->employment_information();
        $this->session->set_flashdata('update_user','User infromation updated successfully.');
        redirect(base_url().'user_profile');
    }
    
    

    public function update_user_info_admin(){

        $this->Posts_model->update_user_info_admin();
        $this->session->set_flashdata('update_user','User infromation updated successfully.');
        redirect(base_url().'employees');
    }

    public function hr_pillar1(){
        
         if($this->session->logged_in){
            if($this->session->usr_access_hr_pillar1 == 1){

                $pagex = 'pillar_1';
        
                if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php') || $this->session->usr_fasd == null){
                    show_404();
                }else{
        
                    
                    
                    if($this->session->role == 'Admin'){
                        $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                    } else {
                        $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                        $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                    }
                    //get personal information
                    $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
        
                    //print_r($data);
                    $notification['menu'] = 'HR Pillar I';
                    $this->load->view('templates/admin-header-template', $notification);
                    $this->load->view('pages/hr/'.$pagex);
                    $this->load->view('templates/admin-footer-template');
                }
            }else{
                show_404();
            }
        }
    }

    //Pillar 1 Notifications
    public function hr_pillar1_notifications($param){

        $pagex = 'pillar_1-notifications';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            $explode = explode('-', $param);
            $vac_id =  $explode[0];
            $yearx =  $explode[1];

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //Year
            $data['yearxs'] = $yearx;

            //Vacant ID
            $data['vac_id'] = $vac_id;
            

            //print_r($data);
            $notification['menu'] = 'HR Pillar I';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function list_of_vacant_position($year){

        // $year = date("Y");
 
         $pagex = 'unit-admin-vacant-position';
 
         if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
             show_404();
         }else{
   
             $data['list_of_vacant_position'] = $this->Posts_model->list_of_vacant_position($year);
             $data['year'] = $year;
             $data['operating_units'] = $this->Posts_model->get_poperating_units();
             
             if($this->session->role == 'Admin'){
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
             } else {
                 $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data();
             }
             //get personal information
             $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
 
             print_r($data);
             $notification['menu'] = 'HR Pillar II';
             $this->load->view('templates/admin-header-template', $notification);
             $this->load->view('pages/hr/add-vacant-position', $data);
             $this->load->view('pages/hr/'.$pagex, $data);
             $this->load->view('templates/admin-footer-template');
         }
     }

    public function hr_pillar2(){

        $pagex = 'pillar_2';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'HR Pillar II';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function filter($year){
        $pagex = 'unit-admin-training-add';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{
  
            $data['list_of_trainings_per_user'] = $this->Posts_model->list_of_trainings_per_user($year);
            $data['year'] = $year;
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'HR Pillar II';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function list_of_learning_and_development($year){

       // $year = date("Y");

        $pagex = 'unit-admin-training-add';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{
  
            $data['list_of_trainings_per_user'] = $this->Posts_model->list_of_trainings_per_user($year);
            $data['year'] = $year;
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'HR Pillar II';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function notify_user($param){

        $result =  $this->notify_user_submission($param);
        if($result){
            $this->session->set_flashdata('success_notification','Notifications sent successfully.');
        }
        redirect(base_url().'list_of_learning_and_development/'.date('Y'));
    }

    public function notify_selected(){

        $data = $this->input->post('trn_id');
        foreach ($data as $param){
            $this->notify_user_submission($param);
        }
        $this->session->set_flashdata('success_notification','Notifications sent successfully.');
        redirect(base_url().'list_of_learning_and_development'.date('Y'));
    }

    //Email to User

    function notify_user_submission($param){

        $explode = explode('-', $param);
        $trn_id =  $explode[0];
        $usr_id =  $explode[1];

        $data['accounts'] = $this->Posts_model->get_user_email($usr_id);
        $data['training'] = $this->Posts_model->get_training($trn_id);
        $trn_learn_dev = $data['training']['trn_learn_dev'];
        $trn_from_date = $data['training']['trn_from_date'];
        $user_email = $data['accounts']['usr_email'];
        //$position = $data['accounts']['emp_position'];
        
         // Load PHPMailer library
         $this->load->library('phpmailer_lib');
        
         // PHPMailer object
         $mail = $this->phpmailer_lib->load();
         
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
         
         // Add a recipient
         $mail->addAddress($user_email);
         
         // Add cc or bcc 
        // $mail->addCC('cc@example.com');
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  'Submission of Post Learning and Development Report/s';
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr>
                                <td bgcolor='#FFD600' align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <br>
                            <br>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/alert.png'
                                    width='100%' style='
                                    width: 100%;
                                    max-width: 480px;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                    R E M I N D E R
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'>
                                    Sir/Ma'am: <br><br>
                                    Greetings!<br>
                                    This is to remind you of the submission of Post Learning and Development Requirement/s for the traning program <strong>". strtoupper($trn_learn_dev)."</strong> held last ". date("F d, Y", strtotime($trn_from_date)).".
                                    <br>
                                    For your information and appropriate action.
                                    <br>
                                    <br>Sincerely,<br>
                                    <b>". $this->session->name."<b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url() ."'>
                                                        Login
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                    Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp; ". $user_email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>Jan Li Santiago<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    public function employees(){

        $page = 'employees';

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                $data['employees'] = $this->Posts_model->get_employees();
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                $data['employees'] = $this->Posts_model->get_employees();

            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            //print_r($data);
            $notification['menu'] = 'List of Employees';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$page, $data);
            $this->load->view('templates/admin-footer-template');

        }
    }

    public function print_hr_training_user_individual($param){
        if( $this->session->logged_in){

        $pagex = 'print';

            if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
                show_404();
            }else{

                $explode = explode('-', $param);

                $usr_id =  $explode[0];
                $usr_name =  str_replace('%20',' ',$explode[1]);
                $usr_ous =  str_replace('%20',' ',$explode[2]);

            
                $data['list_of_trainings_user'] = $this->Posts_model->list_of_trainings_user_individual($usr_id);
                $data['usr_name'] = $usr_name;
                $data['usr_ous'] = $usr_ous;
                $data['num_rows'] = $this->Posts_model->num_list_of_trainings_user_individual($usr_id);
                //print_r($data);
                $this->load->view('pages/hr/'.$pagex, $data);
            
            }
        
        }else {
            redirect(base_url());
        }
    }

    public function export_hr_training_user_individual($param){
        if( $this->session->logged_in){

        $pagex = 'export';

            if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
                show_404();
            }else{

                $explode = explode('-', $param);

                $usr_id =  $explode[0];
                $usr_name =  str_replace('%20',' ',$explode[1]);
                $usr_ous =  str_replace('%20',' ',$explode[2]);

            
                $data['list_of_trainings_user'] = $this->Posts_model->list_of_trainings_user_individual($usr_id);
                $data['usr_name'] = $usr_name;
                $data['usr_ous'] = $usr_ous;
                $data['num_rows'] = $this->Posts_model->num_list_of_trainings_user_individual($usr_id);
                //print_r($data);
                $this->load->view('pages/hr/'.$pagex, $data);
            
            }
        
        }else {
            redirect(base_url());
        }
    }

    public function zip_download_per_employee_individual($param){
        if($this->session->logged_in){

            $explode = explode('-', $param);

                $usr_id =  $explode[0];
                $usr_name =  str_replace('%20',' ',$explode[1]);

            // Load zip library
            $this->load->library('zip'); 
           
            $data = $this->Posts_model->list_of_trainings_user_ind($param);
            //print_r($data);

            $zip = new ZipArchive;
            $download = date("Y-m-d").'-'.$usr_id.'-'.$usr_name;
            //$zipname = 'temp.zip';
            $zip->open($download, ZipArchive::CREATE);

            foreach ($data as $row) {
                if ($row['trn_cot']==null){
                }else{
                    $filepath = "uploads/trainings/".$row['trn_cot'];
                    $zip->addFile($filepath);
                }
                if ($row['trn_reap']==null){
                }else{
                    $filepath = "uploads/trainings/".$row['trn_reap'];
                    $zip->addFile($filepath);
                }
                if ($row['trn_tdorf']==null){
                }else{
                    $filepath = "uploads/trainings/".$row['trn_tdorf'];
                    $zip->addFile($filepath);
                }
            }
            
            if ($zip->close() === false) {
                $this->session->set_flashdata('zip_download','Error creating ZIP file.');
                redirect(base_url().'employees');
                exit;
            };
            
            //download file from temporary file on server as '$filename.zip'
            if (file_exists($download)) {
                ob_clean();
                header('Content-Type: application/zip');
                header('Content-disposition: attachment; filename='.$download.'.zip');
                header('Content-Length: ' . filesize($download));
                readfile($download);
            } else {
                $this->session->set_flashdata('zip_download','Could not find Zip file to download.');
                redirect(base_url().'employees');
                exit;
            }

        }else {
            redirect(base_url()); 
        }
    }

    public function add_training_admin($param){

        $pagex = 'unit-user-training-add1';
        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{
            $explode = explode('-', $param);

            $usr_id =  $explode[1];
            $usr_name =  str_replace('%20',' ',$explode[0]);

            $data['usr_id'] =  $usr_id;
            $data['usr_name'] = $usr_name;
            $data['back_link'] = $param;

            $data['list_of_trainings_per_user'] = $this->Posts_model->list_of_trainings_per_user1($usr_id);
            $data['num_rows_per_user'] = $this->Posts_model->num_list_of_trainings_per_user1($usr_id);
                
                
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
    
            //print_r($data);
            $notification['menu'] = 'HR Add Training';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/add-training-docs1',  $data);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
            
        }
    }

    public function print_hr_report_TPMRF($param){

        $explode = explode('-', $param);
        $year =  $explode[0];
        $month =  $explode[1];
        $report =  $explode[2];

        if($report == '1'){
            $pagex = 'print-TPMRF';
        }elseif($report == '2'){
            $pagex = 'print-TPMRF1';
        }

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            

            if ($month == null){
                $parameter = "January to December";
            }else{
                if ($month == "01"){
                    $parameter = "January";
                }
                if ($month == "02"){
                    $parameter = "February";
                }
                if ($month == "03"){
                    $parameter = "March";
                }
                if ($month == "04"){
                    $parameter = "April";
                }
                if ($month == "05"){
                    $parameter = "May";
                }
                if ($month == "06"){
                    $parameter = "June";
                }
                if ($month == "07"){
                    $parameter = "July";
                }
                if ($month == "08"){
                    $parameter = "August";
                }
                if ($month == "09"){
                    $parameter = "September";
                }
                if ($month == "10"){
                    $parameter = "October";
                }
                if ($month == "11"){
                    $parameter = "November";
                }
                if ($month == "12"){
                    $parameter = "December";
                }
                
            }

            $data['list_of_trainings_user'] = $this->Posts_model->list_of_trainings_user_report($year, $month);
            $data['parameter'] = $parameter;
            $data['year'] = $year;
            //print_r($data);
            $this->load->view('pages/hr/'.$pagex, $data);
           
        }

    }

    public function export_hr_report_TPMRF($param){

        $explode = explode('-', $param);
        $year =  $explode[0];
        $month =  $explode[1];
        $report =  $explode[2];

        if($report == '1'){
            $pagex = 'export-TPMRF';
        }elseif($report == '2'){
            $pagex = 'export-TPMRF1';
        }


        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            if ($month == null){
                $parameter = "January to December";
            }else{
                if ($month == "01"){
                    $parameter = "January";
                }
                if ($month == "02"){
                    $parameter = "February";
                }
                if ($month == "03"){
                    $parameter = "March";
                }
                if ($month == "04"){
                    $parameter = "April";
                }
                if ($month == "05"){
                    $parameter = "May";
                }
                if ($month == "06"){
                    $parameter = "June";
                }
                if ($month == "07"){
                    $parameter = "July";
                }
                if ($month == "08"){
                    $parameter = "August";
                }
                if ($month == "09"){
                    $parameter = "September";
                }
                if ($month == "10"){
                    $parameter = "October";
                }
                if ($month == "11"){
                    $parameter = "November";
                }
                if ($month == "12"){
                    $parameter = "December";
                }
                
            }

            $data['list_of_trainings_user'] = $this->Posts_model->list_of_trainings_user_report($year, $month);
            $data['parameter'] = $parameter;
            $data['year'] = $year;
            $this->load->view('pages/hr/'.$pagex, $data);
           
        }

    }

    public function hr_report(){

        $pagex = 'hr_report';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{


            $data['latest_trainings_of_user'] = $this->Posts_model->latest_trainings_of_user();

//Total per type of Training
            $array = $this->Posts_model->OUs();
            $per_ous = array();

            foreach($array as $row) {
                $ous_idx=$row['ous_id'];
                $oua_desc=$row['ous_desc'];
                $administrative = $this->Posts_model->administrative_total_bar($ous_idx);
                $leadership = $this->Posts_model->leadership_total_bar($ous_idx);
                $managerial = $this->Posts_model->managerial_total_bar($ous_idx);
                $supervisory = $this->Posts_model->supervisory_total_bar($ous_idx);
                $technicals = $this->Posts_model->technical_total_bar($ous_idx);

                $per_ous[] = array(
                    'ous_id' => $ous_idx,
                    'ous_desc' => $oua_desc,
                    'administrative' => $administrative,
                    'leadership' => $leadership,
                    'managerial' => $managerial,
                    'supervisory' => $supervisory,
                    'technicals' => $technicals
                );
            }
//Total per type of Training

//Percentage Report Monitoring of Employees Training Attendance
              $array1 = $this->Posts_model->OUs();
              $per_ous1 = array();
  
              foreach($array1 as $row) {
                  $ous_idx=$row['ous_id'];
                  $oua_desc=$row['ous_desc'];

                  $administrative_report4 = $this->Posts_model->administrative_total_report4($ous_idx);
                  $leadership_report4 = $this->Posts_model->leadership_total_report4($ous_idx);
                  $managerial_report4 = $this->Posts_model->managerial_total_report4($ous_idx);
                  $supervisory_report4 = $this->Posts_model->supervisory_total_report4($ous_idx);
                  $technicals_report4 = $this->Posts_model->technical_total_report4($ous_idx);
                  
                  //Total number of Permanent Employees
                    $permanent_employees = $this->Posts_model->get_employees_permanent($ous_idx);
                       
                        $num_row = 0;
                        $num_permanent_employees = '';
                        foreach($permanent_employees as $row1) {
                            $num_row++;
                            $num_permanent_employees .= $row1['usr_name'] . "\n";
                        }

                    //Total number of Employees Attended Training
                    $training_count = $this->Posts_model->count_training_provider($ous_idx);

                    $num_row_training_count = 0;
                    $num_row_training_count_emp = '';
                    foreach($training_count as $row1) {
                        $num_row_training_count++;
                        $num_row_training_count_emp .= $row1['usr_name'] . "\n";

                    }

                    //Total number of Employees Attended Training 1st Semester
                    $training_coun_first_semester = $this->Posts_model->count_training_provider_first_semester($ous_idx);

                    //Total number of Employees Attended Training 2nd Semester
                    $training_coun_second_semester = $this->Posts_model->count_training_provider_second_semester($ous_idx);

                  
  
                  $per_ous1[] = array(
                      'ous_id' => $ous_idx,
                      'ous_desc' => $oua_desc,
                      'permanent' => $num_row,
                      'training_count' => $num_row_training_count,
                      'first_semester' => $training_coun_first_semester,
                      'second_semester' => $training_coun_second_semester,
                      'administrative_report4' => $administrative_report4,
                      'leadership_report4' => $leadership_report4,
                      'managerial_report4' => $managerial_report4,
                      'supervisory_report4' => $supervisory_report4,
                      'technicals_report4' => $technicals_report4,
                      'names' => $num_row_training_count_emp,
                      'names1' => $num_permanent_employees
                  );
              }
//Percentage Report Monitoring of Employees Training Attendance

//Percentage with nomination and approved
            $array2 = $this->Posts_model->OUs();
            $per_ous2 = array();

            $sum_local_nominee = 0;
            $sum_local_approved = 0;
            $sum_national_nominee = 0;
            $sum_national_approved = 0;
            $sum_foreign_nominee = 0;
            $sum_foreign_approved = 0;
            $sum_regional_nominee = 0;
            $sum_regional_approved = 0;

         
            foreach($array2 as $row) {
                $ous_idx=$row['ous_id'];
                $oua_desc=$row['ous_desc'];

                //Local
                $training_local = $this->Posts_model->count_training_local(); //not equal to 1
                $total_training_local = 0; 
                $training_local_nominee1 = 0;
                $training_local_approved1 = 0;

                foreach($training_local as $row1){
                    $training_local_id = $row1['inv_trn_id'];

                    //get all training local nominee
                    $training_local_nominee = $this->Posts_model->count_training_local_nominee($training_local_id, $ous_idx); 
                    //get all approved
                    $training_local_approved = $this->Posts_model->count_training_local_approved($training_local_id, $ous_idx); 

                    $total_training_local = $total_training_local+1;
                    $training_local_nominee1 = $training_local_nominee1+$training_local_nominee;
                    $training_local_approved1 = $training_local_approved1+$training_local_approved;

                    //get the total
                    $sum_local_nominee = $sum_local_nominee+$training_local_nominee;
                    $sum_local_approved = $sum_local_approved+$training_local_approved;
                }
                //Local

                

                //RO initiated
                $training_regional = $this->Posts_model->count_training_regional(); //not equal to 1
                $total_training_regional = 0; 
                $training_regional_nominee1 = 0;
                $training_regional_approved1 = 0;

                foreach($training_regional as $row1){
                    $training_regional_id = $row1['inv_trn_id'];

                    //get all training local nominee
                    $training_regional_nominee = $this->Posts_model->count_training_regional_nominee($training_regional_id, $ous_idx); 
                    //get all approved
                    $training_regional_approved = $this->Posts_model->count_training_regional_approved($training_regional_id, $ous_idx); 

                    $total_training_regional = $total_training_regional+1;
                    $training_regional_nominee1 = $training_regional_nominee1+$training_regional_nominee;
                    $training_regional_approved1 = $training_regional_approved1+$training_regional_approved;

                    //get the total
                    $sum_regional_nominee = $sum_regional_nominee+$training_regional_nominee;
                    $sum_regional_approved = $sum_regional_approved+$training_regional_approved;
                }
                

                //National
                $training_national = $this->Posts_model->count_training_national(); //not equal to 1
                $total_training_national = 0; 
                $training_national_nominee1 = 0;
                $training_national_approved1 = 0;

                foreach($training_national as $row1){
                    $training_national_id = $row1['inv_trn_id'];

                    //get all training local nominee
                    $training_national_nominee = $this->Posts_model->count_training_national_nominee($training_national_id, $ous_idx); 
                    //get all approved
                    $training_national_approved = $this->Posts_model->count_training_national_approved($training_national_id, $ous_idx); 

                    $total_training_national = $total_training_national+1;
                    $training_national_nominee1 = $training_national_nominee1+$training_national_nominee;
                    $training_national_approved1 = $training_national_approved1+$training_national_approved;

                    //get the total
                    $sum_national_nominee = $sum_national_nominee+$training_national_nominee;
                    $sum_national_approved = $sum_national_approved+$training_national_approved;
                }

                //Foreign
                $training_foreign = $this->Posts_model->count_training_foreign(); //not equal to 1
                $total_training_foreign = 0; 
                $training_foreign_nominee1 = 0;
                $training_foreign_approved1 = 0;

                foreach($training_foreign as $row1){
                    $training_foreign_id = $row1['inv_trn_id'];

                    //get all training local nominee
                    $training_foreign_nominee = $this->Posts_model->count_training_foreign_nominee($training_foreign_id, $ous_idx); 
                    //get all approved
                    $training_foreign_approved = $this->Posts_model->count_training_foreign_approved($training_foreign_id, $ous_idx); 

                    $total_training_foreign = $total_training_foreign+1;
                    $training_foreign_nominee1 = $training_foreign_nominee1+$training_foreign_nominee;
                    $training_foreign_approved1 = $training_foreign_approved1+$training_foreign_approved;

                     //get the total
                     $sum_foreign_nominee = $sum_foreign_nominee+$training_foreign_nominee;
                     $sum_foreign_approved = $sum_foreign_approved+$training_foreign_approved;
                }

                $per_ous2[] = array(
                    'ous_id' => $ous_idx,
                    'ous_desc' => $oua_desc,
                    'training_local' => $total_training_local,
                    'training_local_nominee1' => $training_local_nominee1,
                    'training_local_approved1' => $training_local_approved1, 
                    'training_national' => $total_training_national,
                    'training_national_nominee1' => $training_national_nominee1,
                    'training_national_approved1' => $training_national_approved1,
                    'training_foreign' => $total_training_foreign,
                    'training_foreign_nominee1' => $training_foreign_nominee1,
                    'training_foreign_approved1' => $training_foreign_approved1,
                    'training_regional' => $total_training_regional,
                    'training_regional_nominee1' => $training_regional_nominee1,
                    'training_regional_approved1' => $training_regional_approved1 
                );   

            }
//Percentage with nomination and approved

//No. of Submitted TREAP/TR
            $array3 = $this->Posts_model->OUs();
            $per_ous3 = array();
            $total_of_treap = 0;
            $total_of_tdorf = 0;
            $total_of_cot = 0;
            $total_of_tpmr = 0;

            foreach($array3 as $row) {
                $ous_idx=$row['ous_id'];
                $oua_desc=$row['ous_desc'];

                //count treap
                $no_of_treap = $this->Posts_model->count_no_of_treap($ous_idx);

                //count tdorf
                $no_of_tdorf= $this->Posts_model->count_no_of_tdorf($ous_idx);

                //count cot
                $no_of_cot = $this->Posts_model->count_no_of_cot($ous_idx);

                //count tpmr
                $no_of_tpmr = $this->Posts_model->count_no_of_tpmr($ous_idx);

                $per_ous3[] = array(
                    'ous_id' => $ous_idx,
                    'ous_desc' => $oua_desc,
                    'no_of_tpmr' => $no_of_tpmr,
                    'no_of_treap' => $no_of_treap,
                    'no_of_tdorf' => $no_of_tdorf,
                    'no_of_cot' => $no_of_cot
                );

                $total_of_treap=$total_of_treap+$no_of_treap;
                $total_of_tdorf=$total_of_tdorf+$no_of_tdorf;
                $total_of_cot=$total_of_cot+$no_of_cot;
                $total_of_tpmr=$total_of_tpmr+$no_of_tpmr;
            }
//No. of Submitted TREAP/TR

            $data['data_array_per_ous'] =  $per_ous;
            $data['data_permanent'] = $per_ous1;
            $data['per_agency_category'] = $per_ous2;

            $data['no_of_treap'] = $per_ous3;
            $data['total_of_treap'] = $total_of_treap;
            $data['total_of_tpmr'] = $total_of_tpmr;
            $data['total_of_tdorf'] = $total_of_tdorf;
            $data['total_of_cot'] = $total_of_cot;
            
            $data['training_local'] = $total_training_local;
            $data['training_national'] = $total_training_national;
            $data['training_foreign'] = $total_training_foreign;
            $data['training_regional'] = $total_training_regional;

            $data['sum_local_nominee'] = $sum_local_nominee;
            $data['sum_local_approved'] = $sum_local_approved;
            $data['sum_national_nominee'] = $sum_national_nominee;
            $data['sum_national_approved'] = $sum_national_approved;

            $data['sum_foreign_nominee'] = $sum_foreign_nominee;
            $data['sum_foreign_approved'] = $sum_foreign_approved;
            $data['sum_regional_nominee'] = $sum_regional_nominee;
            $data['sum_regional_approved'] = $sum_regional_approved;

            

            //print_r($data);
            //Total per type of LD
            $data['administrative'] = $this->Posts_model->administrative_total();
            $data['leadership'] = $this->Posts_model->leadership_total();
            $data['managerial'] = $this->Posts_model->managerial_total();
            $data['supervisory'] = $this->Posts_model->supervisory_total();
            $data['technical'] = $this->Posts_model->technical_total();

            //Total row count LD
            $data['training_total'] = $this->Posts_model->training_total();

            //Per Month
           
            //January
            $january = $this->January();
            $data['Jan_A'] = $january['Administrative'];
            $data['Jan_L'] = $january['Leadership'];
            $data['Jan_M'] = $january['Managerial'];
            $data['Jan_S'] = $january['Supervisory'];
            $data['Jan_T'] = $january['Technical'];
            $data['Total_Jan'] = $january['Administrative'] + $january['Leadership'] + $january['Managerial'] + $january['Supervisory'] + $january['Technical'];

            //February
            $february = $this->February();
            $data['Feb_A'] = $february['Administrative'];
            $data['Feb_L'] = $february['Leadership'];
            $data['Feb_M'] = $february['Managerial'];
            $data['Feb_S'] = $february['Supervisory'];
            $data['Feb_T'] = $february['Technical'];
            $data['Total_Feb'] = $february['Administrative'] + $february['Leadership'] + $february['Managerial'] + $february['Supervisory'] + $february['Technical'];

            //March
            $march = $this->March();
            $data['Mar_A'] = $march['Administrative'];
            $data['Mar_L'] = $march['Leadership'];
            $data['Mar_M'] = $march['Managerial'];
            $data['Mar_S'] = $march['Supervisory'];
            $data['Mar_T'] = $march['Technical'];
            $data['Total_Mar'] = $march['Administrative'] + $march['Leadership'] + $march['Managerial'] + $march['Supervisory'] + $march['Technical'];

            //April
            $april = $this->April();
            $data['Apr_A'] = $april['Administrative'];
            $data['Apr_L'] = $april['Leadership'];
            $data['Apr_M'] = $april['Managerial'];
            $data['Apr_S'] = $april['Supervisory'];
            $data['Apr_T'] = $april['Technical'];
            $data['Total_Apr'] = $april['Administrative'] + $april['Leadership'] + $april['Managerial'] + $april['Supervisory'] + $april['Technical'];

             //May
             $may = $this->May();
             $data['May_A'] = $may['Administrative'];
             $data['May_L'] = $may['Leadership'];
             $data['May_M'] = $may['Managerial'];
             $data['May_S'] = $may['Supervisory'];
             $data['May_T'] = $may['Technical'];
             $data['Total_May'] = $may['Administrative'] + $may['Leadership'] + $may['Managerial'] + $may['Supervisory'] + $may['Technical'];

             //June
             $jun = $this->June();
             $data['Jun_A'] = $jun['Administrative'];
             $data['Jun_L'] = $jun['Leadership'];
             $data['Jun_M'] = $jun['Managerial'];
             $data['Jun_S'] = $jun['Supervisory'];
             $data['Jun_T'] = $jun['Technical'];
             $data['Total_Jun'] = $jun['Administrative'] + $jun['Leadership'] + $jun['Managerial'] + $jun['Supervisory'] + $jun['Technical'];

              //July
              $jul = $this->July();
              $data['Jul_A'] = $jul['Administrative'];
              $data['Jul_L'] = $jul['Leadership'];
              $data['Jul_M'] = $jul['Managerial'];
              $data['Jul_S'] = $jul['Supervisory'];
              $data['Jul_T'] = $jul['Technical'];
              $data['Total_Jul'] = $jul['Administrative'] + $jul['Leadership'] + $jul['Managerial'] + $jul['Supervisory'] + $jul['Technical'];

               //August
               $aug = $this->August();
               $data['Aug_A'] = $aug['Administrative'];
               $data['Aug_L'] = $aug['Leadership'];
               $data['Aug_M'] = $aug['Managerial'];
               $data['Aug_S'] = $aug['Supervisory'];
               $data['Aug_T'] = $aug['Technical'];
               $data['Total_Aug'] = $aug['Administrative'] + $aug['Leadership'] + $aug['Managerial'] + $aug['Supervisory'] + $aug['Technical'];

               //September
               $sep = $this->September();
               $data['Sep_A'] = $sep['Administrative'];
               $data['Sep_L'] = $sep['Leadership'];
               $data['Sep_M'] = $sep['Managerial'];
               $data['Sep_S'] = $sep['Supervisory'];
               $data['Sep_T'] = $sep['Technical'];
               $data['Total_Sep'] = $sep['Administrative'] + $sep['Leadership'] + $sep['Managerial'] + $sep['Supervisory'] + $sep['Technical'];

               //October
               $oct = $this->October();
               $data['Oct_A'] = $oct['Administrative'];
               $data['Oct_L'] = $oct['Leadership'];
               $data['Oct_M'] = $oct['Managerial'];
               $data['Oct_S'] = $oct['Supervisory'];
               $data['Oct_T'] = $oct['Technical'];
               $data['Total_Oct'] = $oct['Administrative'] + $oct['Leadership'] + $oct['Managerial'] + $oct['Supervisory'] + $oct['Technical'];

               //November
               $nov = $this->November();
               $data['Nov_A'] = $nov['Administrative'];
               $data['Nov_L'] = $nov['Leadership'];
               $data['Nov_M'] = $nov['Managerial'];
               $data['Nov_S'] = $nov['Supervisory'];
               $data['Nov_T'] = $nov['Technical'];
               $data['Total_Nov'] = $nov['Administrative'] + $nov['Leadership'] + $nov['Managerial'] + $nov['Supervisory'] + $nov['Technical'];

               //December
               $dec = $this->December();
               $data['Dec_A'] = $dec['Administrative'];
               $data['Dec_L'] = $dec['Leadership'];
               $data['Dec_M'] = $dec['Managerial'];
               $data['Dec_S'] = $dec['Supervisory'];
               $data['Dec_T'] = $dec['Technical'];
               $data['Total_Dec'] = $dec['Administrative'] + $dec['Leadership'] + $dec['Managerial'] + $dec['Supervisory'] + $dec['Technical'];

                //Total per LD
                $data['Total_A'] = $dec['Administrative'] + $nov['Administrative'] + $oct['Administrative'] + $sep['Administrative'] + $aug['Administrative'] + $jul['Administrative'] +  $jun['Administrative'] + $april['Administrative'] + $may['Administrative'] + $march['Administrative'] + $february['Administrative'] + $january['Administrative'];
                $data['Total_L'] = $dec['Leadership'] + $nov['Leadership'] + $oct['Leadership'] + $sep['Leadership'] + $aug['Leadership'] + $jul['Leadership'] +  $jun['Leadership'] + $april['Leadership'] + $may['Leadership'] + $march['Leadership'] + $february['Leadership'] + $january['Leadership'];
                $data['Total_M'] = $dec['Managerial'] + $nov['Managerial'] + $oct['Managerial'] + $sep['Managerial'] + $aug['Managerial'] + $jul['Managerial'] +  $jun['Managerial'] + $april['Managerial'] + $may['Managerial'] + $march['Managerial'] + $february['Managerial'] + $january['Managerial'];
                $data['Total_S'] =  $dec['Supervisory'] + $nov['Supervisory'] + $oct['Supervisory'] + $sep['Supervisory'] + $aug['Supervisory'] + $jul['Supervisory'] +  $jun['Supervisory'] + $april['Supervisory'] + $may['Supervisory'] + $march['Supervisory'] + $february['Supervisory'] + $january['Supervisory'];
                $data['Total_T'] = $dec['Technical'] + $nov['Technical'] + $oct['Technical'] + $sep['Technical'] + $aug['Technical'] + $jul['Technical'] +  $jun['Technical'] + $april['Technical'] + $may['Technical'] + $march['Technical'] + $february['Technical'] + $january['Technical'];

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            //print_r($data);
            $notification['menu'] = 'HR Pillar II Reports';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function hr_report_learning_and_development($param){

        if($param == "2y102b2GvEKLdwJ8h9pok5lyCuexsHpKiH48KqWadGr3pgK0"){
            if( new DateTime() > new DateTime('10/27/2023')){
                Echo 'Token Expired';
            }else{
//Start
                    $pagex = 'hr_report_lnd';

                    if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
                        show_404();
                    }else{

                        $data['latest_trainings_of_user'] = $this->Posts_model->latest_trainings_of_user();

                        //Total per type of OUs
                        $array = $this->Posts_model->OUs();
                        $per_ous = array();

                        foreach($array as $row) {
                            $ous_idx=$row['ous_id'];
                            $oua_desc=$row['ous_desc'];
                            $administrative = $this->Posts_model->administrative_total_bar($ous_idx);
                            $leadership = $this->Posts_model->leadership_total_bar($ous_idx);
                            $managerial = $this->Posts_model->managerial_total_bar($ous_idx);
                            $supervisory = $this->Posts_model->supervisory_total_bar($ous_idx);
                            $technicals = $this->Posts_model->technical_total_bar($ous_idx);

                            $per_ous[] = array(
                                'ous_id' => $ous_idx,
                                'ous_desc' => $oua_desc,
                                'administrative' => $administrative,
                                'leadership' => $leadership,
                                'managerial' => $managerial,
                                'supervisory' => $supervisory,
                                'technicals' => $technicals
                            );
                        }

                        //Percentage Report Monitoring of Employees Training Attendance
                        $array1 = $this->Posts_model->OUs();
                        $per_ous1 = array();
            
                        foreach($array1 as $row) {
                            $ous_idx=$row['ous_id'];
                            $oua_desc=$row['ous_desc'];

                            $administrative_report4 = $this->Posts_model->administrative_total_report4($ous_idx);
                            $leadership_report4 = $this->Posts_model->leadership_total_report4($ous_idx);
                            $managerial_report4 = $this->Posts_model->managerial_total_report4($ous_idx);
                            $supervisory_report4 = $this->Posts_model->supervisory_total_report4($ous_idx);
                            $technicals_report4 = $this->Posts_model->technical_total_report4($ous_idx);
                            
                            //Total number of Permanent Employees
                                $permanent_employees = $this->Posts_model->get_employees_permanent($ous_idx);
                                
                                    $num_row = 0;
                                    foreach($permanent_employees as $row1) {
                                        $num_row++;
                                    }

                                //Total number of Employees Attended Training
                                $training_count = $this->Posts_model->count_training_provider($ous_idx);

                                $num_row_training_count = 0;
                                $num_row_training_count_emp = '';
                                foreach($training_count as $row1) {
                                    $num_row_training_count++;
                                    $num_row_training_count_emp = $num_row_training_count_emp.$row1['usr_name'].'&#013;';

                                }

                                //Total number of Employees Attended Training 1st Semester
                                $training_coun_first_semester = $this->Posts_model->count_training_provider_first_semester($ous_idx);

                                //Total number of Employees Attended Training 2nd Semester
                                $training_coun_second_semester = $this->Posts_model->count_training_provider_second_semester($ous_idx);

                            
            
                            $per_ous1[] = array(
                                'ous_id' => $ous_idx,
                                'ous_desc' => $oua_desc,
                                'permanent' => $num_row,
                                'training_count' => $num_row_training_count,
                                'first_semester' => $training_coun_first_semester,
                                'second_semester' => $training_coun_second_semester,
                                'administrative_report4' => $administrative_report4,
                                'leadership_report4' => $leadership_report4,
                                'managerial_report4' => $managerial_report4,
                                'supervisory_report4' => $supervisory_report4,
                                'technicals_report4' => $technicals_report4,
                                'names' => $num_row_training_count_emp
                            );
                        }

                        //Percentage with nomination and approved
                        $array2 = $this->Posts_model->OUs();
                        $per_ous2 = array();

                        $sum_local_nominee = 0;
                        $sum_local_approved = 0;
                        $sum_national_nominee = 0;
                        $sum_national_approved = 0;
                        $sum_foreign_nominee = 0;
                        $sum_foreign_approved = 0;
                        $sum_regional_nominee = 0;
                        $sum_regional_approved = 0;

                    
                        foreach($array2 as $row) {
                            $ous_idx=$row['ous_id'];
                            $oua_desc=$row['ous_desc'];

                            //Local
                            $training_local = $this->Posts_model->count_training_local(); //not equal to 1
                            $total_training_local = 0; 
                            $training_local_nominee1 = 0;
                            $training_local_approved1 = 0;

                            foreach($training_local as $row1){
                                $training_local_id = $row1['inv_trn_id'];

                                //get all training local nominee
                                $training_local_nominee = $this->Posts_model->count_training_local_nominee($training_local_id, $ous_idx); 
                                //get all approved
                                $training_local_approved = $this->Posts_model->count_training_local_approved($training_local_id, $ous_idx); 

                                $total_training_local = $total_training_local+1;
                                $training_local_nominee1 = $training_local_nominee1+$training_local_nominee;
                                $training_local_approved1 = $training_local_approved1+$training_local_approved;

                                //get the total
                                $sum_local_nominee = $sum_local_nominee+$training_local_nominee;
                                $sum_local_approved = $sum_local_approved+$training_local_approved;
                            }
                            //Local

                            

                            //RO initiated
                            $training_regional = $this->Posts_model->count_training_regional(); //not equal to 1
                            $total_training_regional = 0; 
                            $training_regional_nominee1 = 0;
                            $training_regional_approved1 = 0;

                            foreach($training_regional as $row1){
                                $training_regional_id = $row1['inv_trn_id'];

                                //get all training local nominee
                                $training_regional_nominee = $this->Posts_model->count_training_regional_nominee($training_regional_id, $ous_idx); 
                                //get all approved
                                $training_regional_approved = $this->Posts_model->count_training_regional_approved($training_regional_id, $ous_idx); 

                                $total_training_regional = $total_training_regional+1;
                                $training_regional_nominee1 = $training_regional_nominee1+$training_regional_nominee;
                                $training_regional_approved1 = $training_regional_approved1+$training_regional_approved;

                                //get the total
                                $sum_regional_nominee = $sum_regional_nominee+$training_regional_nominee;
                                $sum_regional_approved = $sum_regional_approved+$training_regional_approved;
                            }
                            

                            //National
                            $training_national = $this->Posts_model->count_training_national(); //not equal to 1
                            $total_training_national = 0; 
                            $training_national_nominee1 = 0;
                            $training_national_approved1 = 0;

                            foreach($training_national as $row1){
                                $training_national_id = $row1['inv_trn_id'];

                                //get all training local nominee
                                $training_national_nominee = $this->Posts_model->count_training_national_nominee($training_national_id, $ous_idx); 
                                //get all approved
                                $training_national_approved = $this->Posts_model->count_training_national_approved($training_national_id, $ous_idx); 

                                $total_training_national = $total_training_national+1;
                                $training_national_nominee1 = $training_national_nominee1+$training_national_nominee;
                                $training_national_approved1 = $training_national_approved1+$training_national_approved;

                                //get the total
                                $sum_national_nominee = $sum_national_nominee+$training_national_nominee;
                                $sum_national_approved = $sum_national_approved+$training_national_approved;
                            }

                            //Foreign
                            $training_foreign = $this->Posts_model->count_training_foreign(); //not equal to 1
                            $total_training_foreign = 0; 
                            $training_foreign_nominee1 = 0;
                            $training_foreign_approved1 = 0;

                            foreach($training_foreign as $row1){
                                $training_foreign_id = $row1['inv_trn_id'];

                                //get all training local nominee
                                $training_foreign_nominee = $this->Posts_model->count_training_foreign_nominee($training_foreign_id, $ous_idx); 
                                //get all approved
                                $training_foreign_approved = $this->Posts_model->count_training_foreign_approved($training_foreign_id, $ous_idx); 

                                $total_training_foreign = $total_training_foreign+1;
                                $training_foreign_nominee1 = $training_foreign_nominee1+$training_foreign_nominee;
                                $training_foreign_approved1 = $training_foreign_approved1+$training_foreign_approved;

                                //get the total
                                $sum_foreign_nominee = $sum_foreign_nominee+$training_foreign_nominee;
                                $sum_foreign_approved = $sum_foreign_approved+$training_foreign_approved;
                            }

                            $per_ous2[] = array(
                                'ous_id' => $ous_idx,
                                'ous_desc' => $oua_desc,
                                'training_local' => $total_training_local,
                                'training_local_nominee1' => $training_local_nominee1,
                                'training_local_approved1' => $training_local_approved1, 
                                'training_national' => $total_training_national,
                                'training_national_nominee1' => $training_national_nominee1,
                                'training_national_approved1' => $training_national_approved1,
                                'training_foreign' => $total_training_foreign,
                                'training_foreign_nominee1' => $training_foreign_nominee1,
                                'training_foreign_approved1' => $training_foreign_approved1,
                                'training_regional' => $total_training_regional,
                                'training_regional_nominee1' => $training_regional_nominee1,
                                'training_regional_approved1' => $training_regional_approved1 
                            );   

                        }

                        //No. of Submitted TREAP/TR
                        $array3 = $this->Posts_model->OUs();
                        $per_ous3 = array();
                        $total_of_treap = 0;
                        $total_of_tdorf = 0;
                        $total_of_cot = 0;
                        $total_of_tpmr = 0;

                        foreach($array3 as $row) {
                            $ous_idx=$row['ous_id'];
                            $oua_desc=$row['ous_desc'];

                            //count treap
                            $no_of_treap = $this->Posts_model->count_no_of_treap($ous_idx);

                            //count tdorf
                            $no_of_tdorf= $this->Posts_model->count_no_of_tdorf($ous_idx);

                            //count cot
                            $no_of_cot = $this->Posts_model->count_no_of_cot($ous_idx);

                            //count tpmr
                            $no_of_tpmr = $this->Posts_model->count_no_of_tpmr($ous_idx);

                            $per_ous3[] = array(
                                'ous_id' => $ous_idx,
                                'ous_desc' => $oua_desc,
                                'no_of_tpmr' => $no_of_tpmr,
                                'no_of_treap' => $no_of_treap,
                                'no_of_tdorf' => $no_of_tdorf,
                                'no_of_cot' => $no_of_cot
                            );

                            $total_of_treap=$total_of_treap+$no_of_treap;
                            $total_of_tdorf=$total_of_tdorf+$no_of_tdorf;
                            $total_of_cot=$total_of_cot+$no_of_cot;
                            $total_of_tpmr=$total_of_tpmr+$no_of_tpmr;
                        }

                        $data['data_array_per_ous'] =  $per_ous;
                        $data['data_permanent'] = $per_ous1;
                        $data['per_agency_category'] = $per_ous2;

                        $data['no_of_treap'] = $per_ous3;
                        $data['total_of_treap'] = $total_of_treap;
                        $data['total_of_tpmr'] = $total_of_tpmr;
                        $data['total_of_tdorf'] = $total_of_tdorf;
                        $data['total_of_cot'] = $total_of_cot;
                        
                        $data['training_local'] = $total_training_local;
                        $data['training_national'] = $total_training_national;
                        $data['training_foreign'] = $total_training_foreign;
                        $data['training_regional'] = $total_training_regional;

                        $data['sum_local_nominee'] = $sum_local_nominee;
                        $data['sum_local_approved'] = $sum_local_approved;
                        $data['sum_national_nominee'] = $sum_national_nominee;
                        $data['sum_national_approved'] = $sum_national_approved;

                        $data['sum_foreign_nominee'] = $sum_foreign_nominee;
                        $data['sum_foreign_approved'] = $sum_foreign_approved;
                        $data['sum_regional_nominee'] = $sum_regional_nominee;
                        $data['sum_regional_approved'] = $sum_regional_approved;

                        

                        //print_r($data);
                        //Total per type of LD
                        $data['administrative'] = $this->Posts_model->administrative_total();
                        $data['leadership'] = $this->Posts_model->leadership_total();
                        $data['managerial'] = $this->Posts_model->managerial_total();
                        $data['supervisory'] = $this->Posts_model->supervisory_total();
                        $data['technical'] = $this->Posts_model->technical_total();

                        //Total row count LD
                        $data['training_total'] = $this->Posts_model->training_total();

                        //Per Month
                    
                        //January
                        $january = $this->January();
                        $data['Jan_A'] = $january['Administrative'];
                        $data['Jan_L'] = $january['Leadership'];
                        $data['Jan_M'] = $january['Managerial'];
                        $data['Jan_S'] = $january['Supervisory'];
                        $data['Jan_T'] = $january['Technical'];
                        $data['Total_Jan'] = $january['Administrative'] + $january['Leadership'] + $january['Managerial'] + $january['Supervisory'] + $january['Technical'];

                        //February
                        $february = $this->February();
                        $data['Feb_A'] = $february['Administrative'];
                        $data['Feb_L'] = $february['Leadership'];
                        $data['Feb_M'] = $february['Managerial'];
                        $data['Feb_S'] = $february['Supervisory'];
                        $data['Feb_T'] = $february['Technical'];
                        $data['Total_Feb'] = $february['Administrative'] + $february['Leadership'] + $february['Managerial'] + $february['Supervisory'] + $february['Technical'];

                        //March
                        $march = $this->March();
                        $data['Mar_A'] = $march['Administrative'];
                        $data['Mar_L'] = $march['Leadership'];
                        $data['Mar_M'] = $march['Managerial'];
                        $data['Mar_S'] = $march['Supervisory'];
                        $data['Mar_T'] = $march['Technical'];
                        $data['Total_Mar'] = $march['Administrative'] + $march['Leadership'] + $march['Managerial'] + $march['Supervisory'] + $march['Technical'];

                        //April
                        $april = $this->April();
                        $data['Apr_A'] = $april['Administrative'];
                        $data['Apr_L'] = $april['Leadership'];
                        $data['Apr_M'] = $april['Managerial'];
                        $data['Apr_S'] = $april['Supervisory'];
                        $data['Apr_T'] = $april['Technical'];
                        $data['Total_Apr'] = $april['Administrative'] + $april['Leadership'] + $april['Managerial'] + $april['Supervisory'] + $april['Technical'];

                        //May
                        $may = $this->May();
                        $data['May_A'] = $may['Administrative'];
                        $data['May_L'] = $may['Leadership'];
                        $data['May_M'] = $may['Managerial'];
                        $data['May_S'] = $may['Supervisory'];
                        $data['May_T'] = $may['Technical'];
                        $data['Total_May'] = $may['Administrative'] + $may['Leadership'] + $may['Managerial'] + $may['Supervisory'] + $may['Technical'];

                        //June
                        $jun = $this->June();
                        $data['Jun_A'] = $jun['Administrative'];
                        $data['Jun_L'] = $jun['Leadership'];
                        $data['Jun_M'] = $jun['Managerial'];
                        $data['Jun_S'] = $jun['Supervisory'];
                        $data['Jun_T'] = $jun['Technical'];
                        $data['Total_Jun'] = $jun['Administrative'] + $jun['Leadership'] + $jun['Managerial'] + $jun['Supervisory'] + $jun['Technical'];

                        //July
                        $jul = $this->July();
                        $data['Jul_A'] = $jul['Administrative'];
                        $data['Jul_L'] = $jul['Leadership'];
                        $data['Jul_M'] = $jul['Managerial'];
                        $data['Jul_S'] = $jul['Supervisory'];
                        $data['Jul_T'] = $jul['Technical'];
                        $data['Total_Jul'] = $jul['Administrative'] + $jul['Leadership'] + $jul['Managerial'] + $jul['Supervisory'] + $jul['Technical'];

                        //August
                        $aug = $this->August();
                        $data['Aug_A'] = $aug['Administrative'];
                        $data['Aug_L'] = $aug['Leadership'];
                        $data['Aug_M'] = $aug['Managerial'];
                        $data['Aug_S'] = $aug['Supervisory'];
                        $data['Aug_T'] = $aug['Technical'];
                        $data['Total_Aug'] = $aug['Administrative'] + $aug['Leadership'] + $aug['Managerial'] + $aug['Supervisory'] + $aug['Technical'];

                        //September
                        $sep = $this->September();
                        $data['Sep_A'] = $sep['Administrative'];
                        $data['Sep_L'] = $sep['Leadership'];
                        $data['Sep_M'] = $sep['Managerial'];
                        $data['Sep_S'] = $sep['Supervisory'];
                        $data['Sep_T'] = $sep['Technical'];
                        $data['Total_Sep'] = $sep['Administrative'] + $sep['Leadership'] + $sep['Managerial'] + $sep['Supervisory'] + $sep['Technical'];

                        //October
                        $oct = $this->October();
                        $data['Oct_A'] = $oct['Administrative'];
                        $data['Oct_L'] = $oct['Leadership'];
                        $data['Oct_M'] = $oct['Managerial'];
                        $data['Oct_S'] = $oct['Supervisory'];
                        $data['Oct_T'] = $oct['Technical'];
                        $data['Total_Oct'] = $oct['Administrative'] + $oct['Leadership'] + $oct['Managerial'] + $oct['Supervisory'] + $oct['Technical'];

                        //November
                        $nov = $this->November();
                        $data['Nov_A'] = $nov['Administrative'];
                        $data['Nov_L'] = $nov['Leadership'];
                        $data['Nov_M'] = $nov['Managerial'];
                        $data['Nov_S'] = $nov['Supervisory'];
                        $data['Nov_T'] = $nov['Technical'];
                        $data['Total_Nov'] = $nov['Administrative'] + $nov['Leadership'] + $nov['Managerial'] + $nov['Supervisory'] + $nov['Technical'];

                        //December
                        $dec = $this->December();
                        $data['Dec_A'] = $dec['Administrative'];
                        $data['Dec_L'] = $dec['Leadership'];
                        $data['Dec_M'] = $dec['Managerial'];
                        $data['Dec_S'] = $dec['Supervisory'];
                        $data['Dec_T'] = $dec['Technical'];
                        $data['Total_Dec'] = $dec['Administrative'] + $dec['Leadership'] + $dec['Managerial'] + $dec['Supervisory'] + $dec['Technical'];

                            //Total per LD
                            $data['Total_A'] = $dec['Administrative'] + $nov['Administrative'] + $oct['Administrative'] + $sep['Administrative'] + $aug['Administrative'] + $jul['Administrative'] +  $jun['Administrative'] + $april['Administrative'] + $may['Administrative'] + $march['Administrative'] + $february['Administrative'] + $january['Administrative'];
                            $data['Total_L'] = $dec['Leadership'] + $nov['Leadership'] + $oct['Leadership'] + $sep['Leadership'] + $aug['Leadership'] + $jul['Leadership'] +  $jun['Leadership'] + $april['Leadership'] + $may['Leadership'] + $march['Leadership'] + $february['Leadership'] + $january['Leadership'];
                            $data['Total_M'] = $dec['Managerial'] + $nov['Managerial'] + $oct['Managerial'] + $sep['Managerial'] + $aug['Managerial'] + $jul['Managerial'] +  $jun['Managerial'] + $april['Managerial'] + $may['Managerial'] + $march['Managerial'] + $february['Managerial'] + $january['Managerial'];
                            $data['Total_S'] =  $dec['Supervisory'] + $nov['Supervisory'] + $oct['Supervisory'] + $sep['Supervisory'] + $aug['Supervisory'] + $jul['Supervisory'] +  $jun['Supervisory'] + $april['Supervisory'] + $may['Supervisory'] + $march['Supervisory'] + $february['Supervisory'] + $january['Supervisory'];
                            $data['Total_T'] = $dec['Technical'] + $nov['Technical'] + $oct['Technical'] + $sep['Technical'] + $aug['Technical'] + $jul['Technical'] +  $jun['Technical'] + $april['Technical'] + $may['Technical'] + $march['Technical'] + $february['Technical'] + $january['Technical'];

                        if($this->session->role == 'Admin'){
                            $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                        } else {
                            $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                            $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                        }

                        $this->load->view('pages/hr/'.$pagex, $data);
                    }
//End                    
            }
        }else{
            show_404();
        }
    }

    public function upload_bug(){  
        // Check form submit or not
        if($this->input->post('upload') != NULL ){
                
            $data = array();
            if(!empty($_FILES['file']['name'])){
                
                // Set preference
                $config['upload_path'] = 'uploads/bugs/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '2048'; // max size in KB
                $config['file_name'] = $_FILES['file']['name'];
                    
                //Load upload library
                $this->load->library('upload',$config);         
                
                // File upload
                if($this->upload->do_upload('file')){

                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];

                    $this->session->set_flashdata('update_user','User infromation updated successfully.');
                    redirect(base_url().'user_profile');
               
                }else{
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('update_user', $error['error']);
                    redirect(base_url().'user_profile');
                //echo $data['response'] = 'failed';
                }
            }
            // load view
            
        }
            // load view  
            $this->Posts_model->update_user1($filename);
            $this->session->set_flashdata('update_user','User infromation updated successfully.');
            redirect(base_url().'user_profile');

    } // End of public function update_user(){

    public function list_of_training_inv($year){

       // $year = date("Y");

        $pagex = 'monitoring-of-training';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            $max = $this->Posts_model->get_max_memo();
           
            if($max == null){
                $max =  1;
            }else{
                $max = $max + 1;
            }

            //$data['list_of_trainings_inv'] = $this->Posts_model->list_of_trainings_inv($year);

            $x_array = $this->Posts_model->list_of_trainings_inv($year);
            
            //array
            $x_invitation = array();

            foreach($x_array as $row) {
                
                //get ous
                $act_inv_trn_id = $row['inv_trn_id'];
                $result = $this->Posts_model->get_ous_inv_for_action_save($act_inv_trn_id);
                $ous_array = array();

                foreach($result as $xrow){
                    $ous_array[] = array(
                        'ous_desc' => $xrow['ous_desc'],
                        'act_status' => $xrow['act_status']
                    );
                }

                $x_invitation[] = array(
                    'inv_trn_id' => $row['inv_trn_id'],
                    'inv_trn_memo_mo' => $row['inv_trn_memo_mo'],
                    'trn_title' => $row['trn_title'],
                    'trn_spo_agency' => $row['trn_spo_agency'],
                    'trn_agn_category' => $row['trn_agn_category'],
                    'trn_from_date' => $row['trn_from_date'],
                    'trn_to_date' => $row['trn_to_date'],
                    'trn_no_hours' => $row['trn_no_hours'],
                    'trn_type' => $row['trn_type'],
                    'trn_with_reap' => $row['trn_with_reap'],
                    'trn_with_tr' => $row['trn_with_tr'],
                    'trn_trail_no' => $row['trn_trail_no'],
                    'trn_inv_file' => $row['trn_inv_file'],
                    'trn_qualification' => $row['trn_qualification'],
                    'trn_venue' => $row['trn_venue'],
                    'trn_deadline' => $row['trn_deadline'],
                    'trn_tesda_order' => $row['trn_tesda_order'],
                    'usr_id' => $row['usr_id'],
                    'inv_trn_hash' => $row['inv_trn_hash'],
                    'inv_memo_no' => $row['inv_memo_no'],
                    'trn_tmpr' => $row['trn_tmpr'],
                    'trn_memo_endorsement' => $row['trn_memo_endorsement'],
                    'trn_output' => $row['trn_output'],
                    'trn_others' => $row['trn_others'],
                    'trn_timestamp' => $row['trn_timestamp'],
                    'trn_subject' => $row['trn_subject'],
                    'trn_invitation' => $row['trn_invitation'],
                    'ous_desc_x' => $ous_array
                );
            }

            $data['list_of_trainings_inv'] = $x_invitation;
            $data['year'] = $year;
            $data['memo_no'] = 'R02-'.str_pad($max,4,"0", STR_PAD_LEFT);
            $data['ous_email'] = $this->Posts_model->get_ous_email();  
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'Monitoring of Training Program Invitations ';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/add-training-inv', $data);
            $this->load->view('pages/hr/'.$pagex, $data);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function list_of_training_inv_foreign($year){

        // $year = date("Y");
 
         $pagex = 'monitoring-of-training-foreign';
 
         if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
             show_404();
         }else{
 
             $max = $this->Posts_model->get_max_memo();
            
             if($max == null){
                 $max =  1;
             }else{
                 $max = $max + 1;
             }
 
   
 
     
             $data['list_of_trainings_inv_foreign'] = $this->Posts_model->list_of_trainings_inv_foreign($year);
             $data['year'] = $year;
             $data['memo_no'] = 'R02-'.str_pad($max,4,"0", STR_PAD_LEFT);
             
             if($this->session->role == 'Admin'){
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
             } else {
                 $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data();
             }
             //get personal information
             $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
 
             //print_r($data);
             $notification['menu'] = 'Monitoring of Training Program Invitations ';
             $this->load->view('templates/admin-header-template', $notification);
             $this->load->view('pages/hr/add-training-inv', $data);
             $this->load->view('pages/hr/'.$pagex, $data);
             $this->load->view('templates/admin-footer-template');
         }
    }

    public function list_of_training_inv_national($year){

        // $year = date("Y");
 
         $pagex = 'monitoring-of-training-national';
 
         if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
             show_404();
         }else{
 
             $max = $this->Posts_model->get_max_memo();
            
             if($max == null){
                 $max =  1;
             }else{
                 $max = $max + 1;
             }
 
             $data['list_of_trainings_inv_national'] = $this->Posts_model->list_of_trainings_inv_national($year);
             $data['year'] = $year;
             $data['memo_no'] = 'R02-'.str_pad($max,4,"0", STR_PAD_LEFT);
             
             if($this->session->role == 'Admin'){
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
             } else {
                 $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data();
             }
             //get personal information
             $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
 
             //print_r($data);
             $notification['menu'] = 'Monitoring of Training Program Invitations ';
             $this->load->view('templates/admin-header-template', $notification);
             $this->load->view('pages/hr/add-training-inv', $data);
             $this->load->view('pages/hr/'.$pagex, $data);
             $this->load->view('templates/admin-footer-template');
         }
    }

    public function list_of_training_inv_local($year){

        // $year = date("Y");
 
         $pagex = 'monitoring-of-training-local';
 
         if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
             show_404();
         }else{
 
             $max = $this->Posts_model->get_max_memo();
            
             if($max == null){
                 $max =  1;
             }else{
                 $max = $max + 1;
             }
 
             $data['list_of_trainings_inv_local'] = $this->Posts_model->list_of_trainings_inv_local($year);
             $data['year'] = $year;
             $data['memo_no'] = 'R02-'.str_pad($max,4,"0", STR_PAD_LEFT);
             
             if($this->session->role == 'Admin'){
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
             } else {
                 $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                 $notification['notification_data'] = $this->Posts_model->get_notifications_data();
             }
             //get personal information
             $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
 
             //print_r($data);
             $notification['menu'] = 'Monitoring of Training Program Invitations ';
             $this->load->view('templates/admin-header-template', $notification);
             $this->load->view('pages/hr/add-training-inv', $data);
             $this->load->view('pages/hr/'.$pagex, $data);
             $this->load->view('templates/admin-footer-template');
         }
    }

    public function add_training_inv(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
           $year = $this->input->post('year');
            if(!empty($_FILES['trail']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/trails';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['trail']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('trail')){

                    // Get data about the file
                    $this->Posts_model->insert_training_inv();
                    //Notify Operating Unit
                    $this->notify_all_operating();
                    $this->session->set_flashdata('add_exhibits','Training added & sent successfully.');
                    redirect(base_url().'list_of_training_inv/'.$year);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('add_exhibits', $error['error']);
                        redirect(base_url().'list_of_training_inv/'.$year);
                    // $data['response'] = 'failed';
                    }
            }else{
                $this->Posts_model-> insert_training_inv1();
                //Notify Operating Unit
                $this->notify_all_operating();
                $this->session->set_flashdata('add_exhibits','Training added & sent successfully.');
                redirect(base_url().'list_of_training_inv/'.$year);
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function edit_training_inv(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
           $year = $this->input->post('year');
            if(!empty($_FILES['trail']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/trails';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['trail']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('trail')){

                    // Get data about the file
                    $this->Posts_model-> edit_training_inv();
                    //Notify Operating Unit
                    $this->notify_all_operating_edit();
                    $this->session->set_flashdata('add_exhibits','Training updated & sent successfully.');
                    redirect(base_url().'list_of_training_inv/'.$year);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('add_exhibits', $error['error']);
                        redirect(base_url().'list_of_training_inv/'.$year);
                    // $data['response'] = 'failed';
                    }
            }else{
                $this->Posts_model-> edit_training_inv1();
                //Notify Operating Unit
                $this->notify_all_operating_edit();
                $this->session->set_flashdata('add_exhibits','Training added & sent successfully.');
                redirect(base_url().'list_of_training_inv/'.$year);
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function notify_all_operating(){
        
        $inv_trn_id = $this->db->insert_id();
        $optradio = $this->input->post('optradio');

        if($optradio == '1'){
            //Remove
            $this->notify_operating_units_memo($inv_trn_id);
        }else{
            //Remove
            $this->notify_operating_units_tesda_order($inv_trn_id);
        }

       return true;
    }

    public function notify_all_operating_edit(){
        
        $inv_trn_id = $this->input->post('inv_trn_id1');
       
        $optradio = $this->input->post('optradio1');

        if($optradio == '1'){
            //Remove
            $this->notify_operating_units_memo($inv_trn_id);
        }else{
            //Remove
            $this->notify_operating_units_tesda_order($inv_trn_id);
        }
        
       return true;
    }

    function notify_operating_units_memo($inv_trn_id){
        

        $spo_agency = $this->input->post('spo_agency');
        $title = $this->input->post('trn_subject');
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $inv_no = $this->input->post('inv_memo_no');
        $memo_no = $this->input->post('train_no');
        $add_message = $this->input->post('add_message');
        
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $insert_id = $this->db->insert_id();
        $year = date('Y', strtotime($date_from));
        $link = $year.'-'.$insert_id.'-'.$inv_no;

        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $this->config->load('phpmailer');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
            
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom('region2.ictu@tesda.gov.ph', 'TDIS | Notification');
         
        // Add a recipient
        $data = $this->input->post('po_email_inv');

        //get all operating email address
        foreach($data as $row){

            $explode = explode('-', $row);
            $email =$explode[0];
            $email_cc =$explode[1];
            $ous_id =$explode[2];

            $mail->addAddress($email);
            $mail->addBCC($email_cc);

            // for action
            $this->Posts_model-> ous_inv_for_action_save($ous_id, $inv_trn_id);

        }
         
         // Email subject
         $mail->Subject = $title;
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                    M  E  M  O  R  A  N  D  U  M<hr>
                                    <small>Memo No. ".  $memo_no ."</small>
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    TO&emsp;&nbsp;&emsp;&emsp;&emsp;: <b>The Provincial Directors/TTI/RTC Heads/PTC Administrators</b> 
                                
                                    <br><br>
                                    DATE&ensp;&nbsp;&emsp;&emsp;&nbsp;: <b>". date('F j, Y') ."</b> 
                                    <br><br>
                                    SUBJECT&emsp;: <b>". $title ."</b> 
                                    <br><br>
                                    <hr>
                                    <br>
                                    Forwarding you the Memorandum No. ".  $memo_no ." re: <b>". $title ."</b>  on ". date('F j, Y', strtotime($date_from)) ." to ". date('F j, Y', strtotime($date_to)) .". 
                                    <br><br>
                                    Kindly see the attached file for your reference.
                                    <br>
                                    <br>[<small><b>Reference No.: ".$inv_no."</b></small>]   
                                    <br><br>
                                    <small>Additional Message: ".$add_message." </small>
                                    <br>---- <br>
                                    <b>TESDA DOS MIS TEAM</b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url('add_nominee/'.$link) ."'>
                                                        Login
                                                    </a>
                                                    <br>
                                                </td>
                                                
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        <b>Please login to nominate employee/s</b>
                                        <br>
                                        <br>
                                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp;". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;

         $mail->AddAttachment('uploads/trails/'.$filename);
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    function notify_operating_units_tesda_order($inv_trn_id){

        $spo_agency = $this->input->post('spo_agency');
        $title = $this->input->post('trn_subject');
        $date_from = $this->input->post('date_from');
        $date_to = $this->input->post('date_to');
        $inv_no = $this->input->post('inv_memo_no');
        $memo_no = $this->input->post('train_no');
        $add_message = $this->input->post('add_message');

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];
        
        $insert_id = $this->db->insert_id();
        $year = date('Y', strtotime($date_from));
        $link = $year.'-'.$insert_id.'-'.$inv_no;

        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $this->config->load('phpmailer');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
            
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom('region2.ictu@tesda.gov.ph', 'TDIS | Notification');
         
         // Add a recipient
        $data = $this->input->post('po_email_inv');

        //get all operating email address
        foreach($data as $row){

            $explode = explode('-', $row);
            $email =$explode[0];
            $email_cc =$explode[1];
            $ous_id =$explode[2];

            $mail->addAddress($email);
            $mail->addBCC($email_cc);

            // for action
            $this->Posts_model-> ous_inv_for_action_save($ous_id, $inv_trn_id);

        }
         
         // Email subject
         $mail->Subject =  $title;
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                    T  E  S  D  A &nbsp;&nbsp; O  R  D  E  R  <hr>
                                    <small>No. ".  $memo_no ."</small>
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    TO&emsp;&nbsp;&emsp;&emsp;&emsp;: <b>The Provincial Directors/TTI/RTC Heads/PTC Administrators</b> 
                                
                                    <br><br>
                                    DATE&ensp;&nbsp;&emsp;&emsp;&nbsp;: <b>". date('F j, Y') ."</b> 
                                    <br><br>
                                    SUBJECT&emsp;: <b>". $title ."</b> 
                                    <br><br>
                                    <hr>
                                    <br>
                                    Forwarding you the TESDA Order No. ".  $memo_no ." re: <b>". $title ."</b>  on ". date('F j, Y', strtotime($date_from)) ." to ". date('F j, Y', strtotime($date_to)) .". 
                                    <br><br>
                                    Kindly see the attached file for your reference.
                                    <br>
                                    <br>[<small><b>Reference No.: ".$inv_no."</b></small>]   
                                    <br><br>
                                    <small>Additional Message: ".$add_message." </small>
                                    <br>---- <br>
                                    <b>TESDA DOS MIS TEAM</b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url('add_nominee/'.$link) ."'>
                                                        Login
                                                    </a>
                                                    <br>
                                                </td>
                                                
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        <b>Please login to nominate employee/s</b>
                                        <br>
                                        <br>
                                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp;". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;

         $mail->AddAttachment('uploads/trails/'.$filename);
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    //<br><br>
    //FROM&ensp;&nbsp;&emsp;&emsp;: <b>The Regional Director</b><br> 
    //&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <em>This Region</em>

    public function delete_inv_training(){

        $result = $this->Posts_model->delete_inv_training();
        
        if($result){
            $this->load->helper("file");
            $trn_inv_file= $this->input->post('trn_inv_file');
            $trn_tesda_order= $this->input->post('trn_tesda_order');
            $year= $this->input->post('year');
            unlink('./uploads/trails/'.$trn_inv_file);
            unlink('./uploads/trails/'.$trn_tesda_order);
           
        }
        $this->session->set_flashdata('add_exhibits','Document deleted successfully.');
        redirect(base_url().'list_of_training_inv/'.$year);
        
    }

    public function add_nominee($param){

        $page = 'add_nominee';

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $back_link = $param;
            $explode = explode('-', $param);
            $year = $explode[0];
            $inv_trn_id = $explode[1];
            $memo_no = $explode[2].'-'.$explode[3];

            $data['year'] = $year;
            $data['memo_no'] = $memo_no;
            $data['inv_trn_id'] = $inv_trn_id;
            $data['back_link'] = $back_link;

            $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
            $data['trn_title'] = $training['training']['trn_title'];
            $data['trn_tmpr'] = $training['training']['trn_tmpr'];

            $memo = $this->Posts_model->get_inv_ous_memo($inv_trn_id);
            if ($memo == null){
                $data['memo_filename'] =  null  ;  
                $data['ous_memo_no'] =  null; 
            }else{
                $data['memo_filename'] =  $memo['nom_ous_memo_filename'];   
                $data['ous_memo_no'] =  $memo['nom_ous_memo_no'];
            }

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                $data['employees'] = $this->Posts_model->get_employees();
                $data['nominees'] = $this->Posts_model->get_nominees($inv_trn_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                $data['employees'] = $this->Posts_model->get_employees();
                $data['nominees'] = $this->Posts_model->get_nominees($inv_trn_id);
            }

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            //print_r($data);
            $notification['menu'] = 'List of Nominated Employees';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$page, $data);
            $this->load->view('templates/admin-footer-template');

        }
    }

    public function nominate_user($param){
        
        $explode = explode('-', $param);
        $usr_id = $explode[0];
        $inv_trn_id = $explode[2];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        //Trap duplicate User
        $result =  $this->Posts_model->nominate_user($usr_id, $inv_trn_id);

        //Default
        //$result = true;

        if($result){
            //get onesignal id
            $data = $this->Posts_model->get_one_signal_user_id($usr_id);
            foreach($data as $row){
                $os_user_id = $row['os_usr_key'];
                //$this->send_notif_nominattion_training($os_user_id, $inv_trn_id);
            }
            $this->session->set_flashdata('success_notification','Nomination added successfully.');
        }else{
            $this->session->set_flashdata('success_notification','Hey <b>STOP</b>! There is already approved/pending request; or already attended this training.');
        }
        redirect(base_url().'add_nominee/'.$back_link);
    }

    public function nominate_selected(){
        $back_link = $this->input->post('back_link');
        $data = $this->input->post('emp_nmn_id');
        foreach ($data as $row){
            $explode = explode('-', $row);
            $usr_id = $explode[0];
            $inv_trn_id = $explode[1];
            $result =  $this->Posts_model->nominate_user($usr_id, $inv_trn_id);
        }
        $this->session->set_flashdata('success_notification','Nomination added successfully.');
        redirect(base_url().'add_nominee/'.$back_link);
    }

    public function delete_nomination($param){
        
        $explode = explode('-', $param);
        $trn_nmn_id = $explode[0];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        $result =  $this->Posts_model->delete_nomination($trn_nmn_id);

        if($result){
            $this->session->set_flashdata('success_notification','Nomination deleted successfully.');
        }
        redirect(base_url().'add_nominee/'.$back_link);
    }

    public function upload_tdi_form(){
        $back_link = $this->input->post('back_link');
        $uri = $this->input->post('uri');
        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            if(!empty($_FILES['TDI_form']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/TDIForms';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['TDI_form']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('TDI_form')){

                    // Get data about the file
                    $this->Posts_model->upload_tdi_form();
                    $this->session->set_flashdata('success_notification','TDI Form uploaded successfully.');
                    redirect(base_url().$uri.'/'.$back_link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('success_notification', $error['error']);
                        redirect(base_url().$uri.'/'.$back_link);
                    // $data['response'] = 'failed';
                    }
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function upload_tesda_order(){

        $year= $this->input->post('year');
        // Check form submit or not
        if($this->input->post('uploadTESDAOrder') != NULL ){
            if(!empty($_FILES['TESDA_Order']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/TESDAOrders';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['TESDA_Order']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('TESDA_Order')){

                    // Get data about the file
                    $this->Posts_model->upload_tesda_order();
                    
                    //Email to Operating Units
                    $this->notify_all_operating_attendance();

                    $this->session->set_flashdata('add_exhibits','TESDA Order uploaded successfully.');
                    redirect(base_url().'list_of_training_inv/'.$year);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('add_exhibits', $error['error']);
                        redirect(base_url().'list_of_training_inv/'.$year);
                    // $data['response'] = 'failed';
                    }
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function notify_all_operating_attendance(){
        //Notify Operating Units   && Notify HR Focal
        $data = $this->input->post('po_email');
        foreach ($data as $row){
            $explode = explode('-', $row);
            $email =$explode[0];
            $email_cc =$explode[1];
            $this->notify_operating_units_attendance($email, $email_cc);
        }
       return true;
    }

    public function notify_all_operating_attendance_inv(){
        //Notify Operating Units   && Notify HR Focal
        $data = $this->input->post('po_email');
        foreach ($data as $row){
            $explode = explode('-', $row);
            $email =$explode[0];
            $email_cc =$explode[1];
            $this->notify_operating_units_attendance($email, $email_cc);
        }
       return true;
    }

    function notify_operating_units_attendance($email, $email_cc){

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        $inv_trn_id = $this->input->post('inv_trn_id_u');
        $attendance_memo_no = $this->input->post('attendance_memo_no');
        
        $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
        $title = $training['training']['trn_title'];
        $date_from = $training['training']['trn_from_date'];
        $date_to = $training['training']['trn_to_date'];

         // Load PHPMailer library
         $this->load->library('phpmailer_lib');
        
         // PHPMailer object
         $mail = $this->phpmailer_lib->load();
         
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
         
         // Add a recipient
         $mail->addAddress($email);
         
         // Add cc or bcc 
         $mail->addCC($email_cc);
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  $title;
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                    M E M O R A N D U M<br>
                                    ------------------------------------------<br>
                                    No. ".  $attendance_memo_no ." s. ". date('Y') ."
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    TO&emsp;&nbsp;&emsp;&emsp;&emsp;: <b>The Provincial Directors/TTI/RTC Heads/PTC Administrators</b> 
                                    <br><br>
                                    ATTN&ensp;&nbsp;&emsp;&emsp;: <b>Administrative Officer V/HR Focal</b>
                                    <br><br>
                                    FROM&ensp;&nbsp;&emsp;&emsp;: <b>The Regional Director</b><br> 
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <em>This Region</em>
                                    <br><br>
                                    DATE&ensp;&nbsp;&emsp;&emsp;&nbsp;: <b>". date('F j, Y') ."</b> 
                                    <br><br>
                                    SUBJECT&emsp;: <b>Attendance to the ". $title ."</b> 
                                    <br><br>
                                    <hr>
                                    <br>
                                    Forwarding you the Memorandum No. ".  $attendance_memo_no ." re: <b>Attendance to the ". $title ."</b>  on ". date('F j, Y', strtotime($date_from)) ." to ". date('F j, Y', strtotime($date_to)) .". 
                                    <br><br>
                                    Kindly see the attached file for your reference.
                                    <br>
                                    <br>    
                                    <br>---- <br>
                                    <b>TESDA DOS MIS TEAM</b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url() ."'>
                                                        Login
                                                    </a>
                                                    <br>
                                                </td>
                                                
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                    Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp;". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;

         $mail->AddAttachment('uploads/TESDAOrders/'.$filename);
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    public function view_nominee($param){

        $page = 'view_nominee';

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $back_link = $param;
            $explode = explode('-', $param);
            $year = $explode[0];
            $inv_trn_id = $explode[1];
            $memo_no = $explode[2].'-'.$explode[3];

            $data['year'] = $year;
            $data['memo_no'] = $memo_no;
            $data['inv_trn_id'] = $inv_trn_id;
            $data['back_link'] = $back_link;

            $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
            $data['trn_title'] = $training['training']['trn_title'];
            $data['trn_endorsement_memo'] = $training['training']['trn_memo_endorsement'];
            $data['trn_tpmr'] = $training['training']['trn_tmpr'];

            //get training inv group by OUS

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                $data['employees'] = $this->Posts_model->get_employees();
                $data['nominees'] = $this->Posts_model->get_nominees($inv_trn_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                $data['employees'] = $this->Posts_model->get_employees();
                $data['nominees'] = $this->Posts_model->get_nominees($inv_trn_id);
                
                //Check No Nomination
                $nominees_per_ous = $this->Posts_model->get_nominees_per_ous($inv_trn_id);
                
                foreach ($nominees_per_ous as $row){
                    $nominees_per_ous_id[] = $row['ous_id'] .' - '.$row['ous_desc'];
                }

                $operating_units = $this->Posts_model->get_poperating_units_id();

                foreach ($operating_units as $row){
                    $operating_units_id[] = $row['ous_id'].' - '.$row['ous_desc'];
                }
                $no_nominees_per_ous = array_diff($operating_units_id, $nominees_per_ous_id);
                $with_nominees_per_ous = array_intersect($operating_units_id, $nominees_per_ous_id);

                $data['no_nominees_per_ous'] = $no_nominees_per_ous;
                $data['with_nominees_per_ous'] = $with_nominees_per_ous;

                print_r($result);
            }

            $data['memos'] = $this->Posts_model->get_inv_ous_memo_all($inv_trn_id);

            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
            //print_r($data);
            $notification['menu'] = 'List of Nominated Employees';

            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$page, $data);
            $this->load->view('templates/admin-footer-template');

        }
    }

    public function approve_nominee($param){

        $explode = explode('-', $param);
        $trn_nmn_id  = $explode[0];
        $usr_id  = $explode[5];
        $inv_trn_id = $explode[2];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        //Trap if there is existing record of employee
        $result = $this->Posts_model->get_user_training_details($usr_id, $inv_trn_id);

        if($result){
            $type = 'Approved';
            $this->Posts_model->update_training_details($usr_id, $inv_trn_id, $type);
            //Get User Email
            $data['accounts'] = $this->Posts_model->get_user_email($usr_id);
            $email =  $data['accounts']['usr_email'];
            $name =  $data['accounts']['usr_name'];

            //Send notification
            //$this->notify_nominee($email, $inv_trn_id, $name);

            if($result){
                
                //get onesignal id
                $data = $this->Posts_model->get_one_signal_user_id($usr_id);
                foreach($data as $row){
                    $os_user_id = $row['os_usr_key'];
                    //$this->send_notif_approve_training($os_user_id, $inv_trn_id);
                }
                $this->session->set_flashdata('success_notification','Updated successfully.');
            }else{
                $this->session->set_flashdata('success_notification','Hey <b>STOP</b>! There is already approved/pending request.');
            }
            redirect(base_url().'view_nominee/'.$back_link);
        }else{
            //Get User Email
            $data['accounts'] = $this->Posts_model->get_user_email($usr_id);
            $email =  $data['accounts']['usr_email'];
            $name =  $data['accounts']['usr_name'];

            //Nomination Result
            $result =  $this->Posts_model->approve_nominee($trn_nmn_id, $usr_id);
            
            //Send notification
            //$this->notify_nominee($email, $inv_trn_id, $name);

            if($result){
                
                //get onesignal id
                $data = $this->Posts_model->get_one_signal_user_id($usr_id);
                foreach($data as $row){
                    $os_user_id = $row['os_usr_key'];
                    //$this->send_notif_approve_training($os_user_id, $inv_trn_id);
                }
                $this->session->set_flashdata('success_notification','Updated successfully.');
            }else{
                $this->session->set_flashdata('success_notification','Hey <b>STOP</b>! There is already approved/pending request.');
            }
            redirect(base_url().'view_nominee/'.$back_link);
        }
    }

    public function approve_nominate_selected(){

        $back_link = $this->input->post('back_link');
        $data = $this->input->post('trn_nmn_id');
        foreach ($data as $row){
            $explode = explode('-', $row);
            $usr_id = $explode[1];
            $trn_nmn_id = $explode[0];
            $result =  $this->Posts_model->approve_nominee($trn_nmn_id, $usr_id);

            //Send notification


        }

        $this->session->set_flashdata('success_notification','Nomination added successfully.');
        redirect(base_url().'view_nominee/'.$back_link);
    }

    function notify_nominee($email, $inv_trn_id, $name){
 
        $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
        $title = $training['training']['trn_title'];
        $date_from = $training['training']['trn_from_date'];
        $date_to = $training['training']['trn_to_date'];
        $filename = $training['training']['trn_tesda_order'];

         // Load PHPMailer library
         $this->load->library('phpmailer_lib');
        
         // PHPMailer object
         $mail = $this->phpmailer_lib->load();
         
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
         
         // Add a recipient
         $mail->addAddress($email);
         
         // Add cc or bcc 
         //$mail->addCC($email_cc);
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  $title;
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    <hr>
                                    <br>
                                    Dear <b>". $name ."</b>,
                                    <br>
                                    <br>
                                    This is to inform you that you are mandated to attend the above-mentioned TESDA Order/Attendance.
                                    <br><br>
                                    Kindly see the attached for your reference.
                                    <br> <br>
                                    Thank you.
                                    <br>
                                    <br>    
                                    <br>---- <br>
                                    <b>TESDA DOS MIS TEAM</b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                <td align='center' valign='middle' style='padding: 12px 24px; margin: 0; text-decoration: underline; border-collapse: collapse; border-spacing: 0; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; -khtml-border-radius: 4px;'
                                                    bgcolor='#00ae4a'>
                                                    <a target='_blank' style='text-decoration: underline;
                                                    color: #FFFFFF; font-family: sans-serif; font-size: 17px; font-weight: 400; line-height: 120%;'
                                                    href='". base_url() ."'>
                                                        Login
                                                    </a>
                                                    <br>
                                                </td>
                                                
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp;". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;

         $mail->AddAttachment('uploads/TESDAOrders/'.$filename);
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    public function cancel_nominee($param){
        
        $explode = explode('-', $param);
        $trn_nmn_id  = $explode[0];
        $usr_id  = $explode[5];
        $inv_trn_id = $explode[2];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        $result =  $this->Posts_model->cancel_nominee($trn_nmn_id, $usr_id);

        if($result){
            $this->session->set_flashdata('success_notification','Nominee cancelled successfully.');

            //Send notification

        }else{
            $this->session->set_flashdata('success_notification','Hey <b>STOP</b>!');
        }
        redirect(base_url().'view_nominee/'.$back_link);
    }

    public function postpone_nominee($param){
        
        $explode = explode('-', $param);
        $trn_nmn_id  = $explode[0];
        $usr_id  = $explode[5];
        $inv_trn_id = $explode[2];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        $result =  $this->Posts_model->postpone_nominee($trn_nmn_id, $inv_trn_id, $usr_id);

        if($result){
            $this->session->set_flashdata('success_notification','Updated successfully.');
            //Send notification
        }else{
            $this->session->set_flashdata('success_notification','Hey <b>STOP</b>!');
        }
        redirect(base_url().'view_nominee/'.$back_link);
    }

    public function disapprove_nominee($param){
        
        $explode = explode('-', $param);
        $trn_nmn_id  = $explode[0];
        $usr_id  = $explode[5];
        $inv_trn_id = $explode[2];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        //Trap if there is existing record of employee
        $result = $this->Posts_model->get_user_training_details($usr_id, $inv_trn_id);

        if($result){
            $type = 'Disapproved';
            $this->Posts_model->update_training_details($usr_id, $inv_trn_id, $type);

            //Get User Email
            $data['accounts'] = $this->Posts_model->get_user_email($usr_id);
            $email =  $data['accounts']['usr_email'];
            $name =  $data['accounts']['usr_name'];

            //Send notification
            //$send = $this->notify_nominee($email, $inv_trn_id, $name);
            $send = true;

            if($send){
                //get onesignal id
                $data = $this->Posts_model->get_one_signal_user_id($usr_id);
                foreach($data as $row){
                    $os_user_id = $row['os_usr_key'];
                    //$this->send_notif_approve_training($os_user_id, $inv_trn_id);
                }
                $this->session->set_flashdata('success_notification','Updated successfully.');
                redirect(base_url().'view_nominee/'.$back_link);
            }
        }else{
            //Get User Email
            $data['accounts'] = $this->Posts_model->get_user_email($usr_id);
            $email =  $data['accounts']['usr_email'];
            $name =  $data['accounts']['usr_name'];

            //Nomination Result
            $result =  $this->Posts_model->approve_nominee($trn_nmn_id, $usr_id);
            
            //Send notification
            //$send = $this->notify_nominee($email, $inv_trn_id, $name);
            $send = true;

            if($send){
                
                //get onesignal id
                $data = $this->Posts_model->get_one_signal_user_id($usr_id);
                foreach($data as $row){
                    $os_user_id = $row['os_usr_key'];
                    //$this->send_notif_approve_training($os_user_id, $inv_trn_id);
                }
                $this->session->set_flashdata('success_notification','Updated successfully.');
                redirect(base_url().'view_nominee/'.$back_link);
            }
        }    
        redirect(base_url().'view_nominee/'.$back_link);
    }
    
    public function endorse_nominee($param){
        
        $explode = explode('-', $param);
        $trn_nmn_id  = $explode[0];
        $usr_id  = $explode[5];
        $inv_trn_id = $explode[2];
        $back_link = $explode[1].'-'.$explode[2].'-'.$explode[3].'-'.$explode[4];

        $result =  $this->Posts_model->endorse_nominee($trn_nmn_id, $usr_id);

        if($result){
            $this->session->set_flashdata('success_notification','Nominee endorsed successfully.');

            //Send notification

        }else{
            $this->session->set_flashdata('success_notification','Hey <b>STOP</b>!');
        }
        redirect(base_url().'view_nominee/'.$back_link);
    }

    public function add_vacant_positions(){

        // Check form submit or not
        if($this->input->post('upload') != NULL ){
           $year = $this->input->post('year');
            if(!empty($_FILES['job_opening_file']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/job';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['job_opening_file']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('job_opening_file')){

                    // Get data about the file
                    $this->Posts_model-> insert_vacant_positions();
                   
                    $this->session->set_flashdata('add_exhibits','Vacant position added successfully.');
                    redirect(base_url().'list_of_vacant_position/'.$year);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('add_exhibits', $error['error']);
                        redirect(base_url().'list_of_vacant_position/'.$year);
                    // $data['response'] = 'failed';
                    }
            }else{
                $this->Posts_model-> insert_training_inv1();
                //Notify Operating Unit
                //$this->notify_all_operating();
                $this->session->set_flashdata('add_exhibits','Vacant position added successfully.');
                redirect(base_url().'list_of_vacant_position/'.$year);
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    public function upload_memorandum(){
        $back_link = $this->input->post('back_link');
        $uri = $this->input->post('uri');
        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            if(!empty($_FILES['OUS_Memo']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/TrainingMemos';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['OUS_Memo']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('OUS_Memo')){

                    // Get data about the file
                    $this->Posts_model->upload_memorandum();
                    $this->notify_regional_office();
                    $this->session->set_flashdata('success_notification','Memoradum uploaded and sent successfully.');
                    redirect(base_url().'add_nominee/'.$back_link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('success_notification', $error['error']);
                        redirect(base_url().'add_nominee/'.$back_link);
                    // $data['response'] = 'failed';
                    }
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

            // load view  
        }
    }

    function notify_regional_office(){

        $memo_no = $this->input->post('nom_ous_memo_no');
        $inv_trn_id = $this->input->post('inv_trn_id');

        $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
        $Training_Title = $training['training']['trn_subject'];
        

        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];
        
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $this->config->load('phpmailer');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
            
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom('region2.ictu@tesda.gov.ph', 'TDIS | Notification');
         
         // Add a recipient
         $mail->addAddress('region2.learninganddevelopment@gmail.com');
         
         // Add cc or bcc 
        // $mail->addCC('cc@example.com');
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  'Re: '. $Training_Title;
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 24px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 2px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    <hr>
                                    <br>
                                    Forwarding you the Memo No. ". $memo_no ." re: ". $Training_Title. ".
                                    <br><br>
                                    Kindly see attached file/s for your reference.
                                    <br><br>--<br>
                                    <b>". $this->session->name. "</b>
                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                        
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp; .  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>Jan Li Santiago<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;

         $mail->AddAttachment('uploads/TrainingMemos/'.$filename);
         
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    public function print_nominees($param){

        $pagex = 'print-nominees';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            //$explode = explode('-', $param);
          
            $training['training'] = $this->Posts_model->get_inv_trn_details($param);
            $Training_Title = $training['training']['trn_title'];

            $data['Approved'] = $this->Posts_model->get_approved_nominees($param);
            $data['Training_Title'] = $Training_Title;
            //print_r($data);

            $this->load->view('pages/hr/'.$pagex, $data);
           
        }

    }

    public function personal_information_system(){

        $pagex = 'personal_info_system';

        if(!file_exists(APPPATH.'views/pages/hr/' .$pagex.'.php')){
            show_404();
        }else{

            
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'HR Personal Information System';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$pagex);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function update_user_info_pds_sheet1(){

        $this->Posts_model->update_user_info_pds_sheet1();
        $this->session->set_flashdata('update_user','User infromation updated successfully.');
        redirect(base_url().'user_profile');
    }

    public function update_user_info_pds_sheet1_1(){

        $this->Posts_model->update_user_info_pds_sheet1_1();
        $this->session->set_flashdata('update_user','User infromation updated successfully.');
        redirect(base_url().'user_profile');
    }

    public function update_notification_one_signal(){

        $this->Posts_model->update_notification_one_signal();
        redirect(base_url().'hr_dashboard');
    }

    public function send_notif_system_updates(){
        $title="System Updates";
        //Get User's Name   
        $data = $this->Posts_model->get_accounts_onesignal();

        foreach($data as $row){
            $name = $row['usr_name'];
            $message="Hi, ".$name."! This is to inform you that there is an update on the TESDA DOS Integrated System. - System Administrator";
            $o_user_id = $row["os_usr_key"];
            $result = $this->sendMessageOne($o_user_id, $message, $title);
        }
       
        if($result){
            redirect(base_url().'extra');
        }
    }

    public function send_notif_nominattion_training($os_user_id, $inv_trn_id){
        //get training details
        $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
        $title1 = $training['training']['trn_title'];
        
        $title="R2 FASD Services | Training Nomination";
        //Get User's Name   
        $data = $this->Posts_model->get_accounts_onesignal_emp($os_user_id);

        foreach( $data as $row){
            $name = $row['usr_name'];
            $message="Hi, ".$name."! This is to inform you that you are nominated to the training re: ".$title1.". - System Administrator";
        }

        $result = $this->sendMessageOne($os_user_id, $message, $title);
        if($result){
            return true;
        }
    }

    public function send_notif_approve_training($os_user_id, $inv_trn_id){
        
        //get training details
        $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
        $title1 = $training['training']['trn_title'];
        $date_from = $training['training']['trn_from_date'];
        $date_to = $training['training']['trn_to_date'];

        $title="R2 FASD Services | Approve Nomination";
        //Get User's Name   
        $data = $this->Posts_model->get_accounts_onesignal_emp($os_user_id);

        foreach( $data as $row){
            $name = $row['usr_name'];
            $message="Hi, ".$name."! This is to inform you that you have a scheduled training on ".date('F y, Y', strtotime($date_from))." - ".date('F y, Y', strtotime($date_to))." re: ".$title1.". Thank you. - System Administrator";
        }

        $result = $this->sendMessageOne($os_user_id, $message, $title);
        if($result){
            return true;
        }
    }

    public function send_notif_invitation_admin($os_user_id, $reference_no, $name){
    
        $title="R2 FASD Services | Action Needed";
        $message="Hi, ".$name."! This is to inform you that you have an invitation/attendance to training for action needed. Reference no: ".$reference_no.". Thank you. - System Administrator";
        
        $result = $this->sendMessageOne($os_user_id, $message, $title);
        if($result){
            return true;
        }
    }

    function sendMessageOne($o_user_id, $message, $title){
        $content = array(
            "en" => $message
            );

        $heading = array(
            "en" => 'R2 FASD Services | '.$title
            );
        
        $fields = array(
            'app_id' => '1b365040-5377-4481-aec0-7cfae0a251d2',
            'include_player_ids' => array($o_user_id),
            'data' => array("foo" => "bar"),
            'contents' => $content,
            'headings' => $heading
        );
        
        $fields = json_encode($fields);
        //print("\nJSON sent:\n");
        //print($fields);
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
    }

    public function extra(){

        $pagex = 'extra';

        if(!file_exists(APPPATH.'views/pages/' .$pagex.'.php')){
            show_404();
        }else{

            
            
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //get personal information
            $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();

            //print_r($data);
            $notification['menu'] = 'Parameters';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/'.$pagex);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function children_data(){
        
        if($this->session->logged_in){
            $data = $this->Posts_model->get_family_background_children();
            echo json_encode($data);
        }
        
    }

    public function children_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->children_data_save();
            echo json_encode($data);
        }
        
    }

    public function children_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->children_data_delete();
            echo json_encode($data);
        }
        
    }

    public function educational_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_educational_data();
            echo json_encode($data);
        }
       
    }

    public function educational_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->educational_data_save();
            echo json_encode($data);
        }
       
    }

    public function educational_data_update(){
        if($this->session->logged_in){
            $data=$this->Posts_model->educational_data_update();
            echo json_encode($data);
        }
       
    }

    public function educational_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->educational_data_delete();
            echo json_encode($data);
        }
    }

    public function eligibility_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_eligibility_data();
            echo json_encode($data);
        }
       
    }

    public function eligibility_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->eligibility_data_save();
            echo json_encode($data);
        }
       
    }

    public function eligibility_data_edit(){
        if($this->session->logged_in){
            $data=$this->Posts_model->eligibility_data_edit();
            echo json_encode($data);
        }
       
    }

    public function eligibility_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->eligibility_data_delete();
            echo json_encode($data);
        }
    }

    public function work_experience_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_work_experience_data();
            echo json_encode($data);
        }
       
    }

    public function work_experience_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->work_experience_data_save();
            echo json_encode($data);
        }
       
    }

    public function work_experience_data_edit(){
        if($this->session->logged_in){
            $data=$this->Posts_model->work_experience_data_edit();
            echo json_encode($data);
        }
       
    }

    public function work_experience_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->work_experience_data_delete();
            echo json_encode($data);
        }
    }

    public function work_experience_data_duplicate(){
        if($this->session->logged_in){
            $data=$this->Posts_model->work_experience_data_duplicate();
            echo json_encode($data);
        }
    }

    //Learning and Development Data
    public function learning_and_development_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_learning_and_development();
            echo json_encode($data);
        }
       
    }

    
    public function personal_data_sheet_view() {

        if($this->session->logged_in){
            $page = 'pds';

            //Personal Information
            $data['personal_information'] = $this->Posts_model->get_personal_information();
            $name['dob'] =  $data['personal_information']['emp_dob'];
            $name['pob'] =  $data['personal_information']['emp_pob'];
            $name['sex'] =  $data['personal_information']['emp_sex'];
            $name['citizenship'] =  $data['personal_information']['emp_citizenship'];
            $name['civil_status'] =  $data['personal_information']['emp_civil_status'];

            //PDS Sheet 1
            $data['personal_information_pds_sheet1'] = $this->Posts_model->get_personal_information_pds_sheet1();
            $name['pi_surname'] =  $data['personal_information_pds_sheet1']['pi_surname'];
            $name['pi_firstname'] =  $data['personal_information_pds_sheet1']['pi_firstname'];
            $name['pi_middlename'] =  $data['personal_information_pds_sheet1']['pi_middlename'];
            $name['pi_extname'] =  $data['personal_information_pds_sheet1']['pi_extname'];
            $name['pi_height'] =  $data['personal_information_pds_sheet1']['pi_height'];
            $name['pi_weight'] =  $data['personal_information_pds_sheet1']['pi_weight'];
            $name['pi_blood_type'] =  $data['personal_information_pds_sheet1']['pi_blood_type'];
            $name['pi_gsis'] =  $data['personal_information_pds_sheet1']['pi_gsis'];
            $name['pi_pagibig'] =  $data['personal_information_pds_sheet1']['pi_pagibig'];
            $name['pi_philhealth'] =  $data['personal_information_pds_sheet1']['pi_philhealth'];
            $name['pi_sss'] =  $data['personal_information_pds_sheet1']['pi_sss'];
            $name['pi_tin_no'] =  $data['personal_information_pds_sheet1']['pi_tin_no'];
            $name['pi_employee_id'] =  $data['personal_information_pds_sheet1']['pi_employee_id'];
            $name['pi_ra_block_no'] =  $data['personal_information_pds_sheet1']['pi_ra_block_no'];
            $name['pi_ra_street'] =  $data['personal_information_pds_sheet1']['pi_ra_street'];
            $name['pi_ra_subdivision'] =  $data['personal_information_pds_sheet1']['pi_ra_subdivision'];
            $name['pi_ra_barangay'] =  $data['personal_information_pds_sheet1']['pi_ra_barangay'];
            $name['pi_ra_municipality'] =  $data['personal_information_pds_sheet1']['pi_ra_municipality'];
            $name['pi_ra_province'] =  $data['personal_information_pds_sheet1']['pi_ra_province'];
            $name['pi_ra_zip'] =  $data['personal_information_pds_sheet1']['pi_ra_zip'];
            $name['pi_pa_block_no'] =  $data['personal_information_pds_sheet1']['pi_pa_block_no'];
            $name['pi_pa_street'] =  $data['personal_information_pds_sheet1']['pi_pa_street'];
            $name['pi_pa_subdivision'] =  $data['personal_information_pds_sheet1']['pi_pa_subdivision'];
            $name['pi_pa_barangay'] =  $data['personal_information_pds_sheet1']['pi_pa_barangay'];
            $name['pi_pa_municipality'] =  $data['personal_information_pds_sheet1']['pi_pa_municipality'];
            $name['pi_pa_province'] =  $data['personal_information_pds_sheet1']['pi_pa_province'];
            $name['pi_pa_zip'] =  $data['personal_information_pds_sheet1']['pi_pa_zip'];
            $name['pi_telephone'] =  $data['personal_information_pds_sheet1']['pi_telephone'];
            $name['pi_mobile'] =  $data['personal_information_pds_sheet1']['pi_mobile'];
            $name['pi_email'] =  $data['personal_information_pds_sheet1']['pi_email'];

            //PDS Sheet 1_1
            $data['personal_information_pds_sheet1_1'] = $this->Posts_model->get_personal_information_pds_sheet1_1();
            $name['fb_spouse_surname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_surname'];
            $name['fb_spouse_fname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_fname'];
            $name['fb_spouse_mname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_mname'];
            $name['fb_spouse_extname'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_extname'];
            $name['fb_spouse_occupation'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_occupation'];
            $name['fb_spouse_business'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_business'];
            $name['fb_spouse_business_address'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_business_address'];
            $name['fb_spouse_telephone'] =  $data['personal_information_pds_sheet1_1']['fb_spouse_telephone'];
            $name['fb_father_surname'] =  $data['personal_information_pds_sheet1_1']['fb_father_surname'];
            $name['fb_father_fname'] =  $data['personal_information_pds_sheet1_1']['fb_father_fname'];
            $name['fb_father_mname'] =  $data['personal_information_pds_sheet1_1']['fb_father_mname'];
            $name['fb_father_extname'] =  $data['personal_information_pds_sheet1_1']['fb_father_extname'];
            $name['fb_mother_surname'] =  $data['personal_information_pds_sheet1_1']['fb_mother_surname'];
            $name['fb_mother_fname'] =  $data['personal_information_pds_sheet1_1']['fb_mother_fname'];
            $name['fb_mother_mname'] =  $data['personal_information_pds_sheet1_1']['fb_mother_mname'];

            //Get Children

            $name['child1']='';
            $name['bdatechild1']='';
            $name['child2']='';
            $name['bdatechild2']='';
            $name['child3']='';
            $name['bdatechild3']='';
            $name['child4']='';
            $name['bdatechild4']='';
            $name['child5']='';
            $name['bdatechild5']='';
            $name['child6']='';
            $name['bdatechild6']='';
            $name['child7']='';
            $name['bdatechild7']='';
            $name['child8']='';
            $name['bdatechild8']='';
            $name['child9']='';
            $name['bdatechild9']='';
            $name['child10']='';
            $name['bdatechild10']='';
            $name['child11']='';
            $name['bdatechild11']='';
            $name['child12']='';
            $name['bdatechild12']='';
            

            $data = $this->Posts_model->get_family_background_children_array();
            $x=0;
            foreach($data as $row){
                if($x == 0){
                    $name['child1'] = $row['chi_name'];
                    $name['bdatechild1'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 1){
                    $name['child2'] = $row['chi_name'];
                    $name['bdatechild2'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 2){
                    $name['child3'] = $row['chi_name'];
                    $name['bdatechild3'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 3){
                    $name['child4'] = $row['chi_name'];
                    $name['bdatechild4'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 4){
                    $name['child5'] = $row['chi_name'];
                    $name['bdatechild5'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 5){
                    $name['child6'] = $row['chi_name'];
                    $name['bdatechild6'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 6){
                    $name['child7'] = $row['chi_name'];
                    $name['bdatechild7'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 7){
                    $name['child8'] = $row['chi_name'];
                    $name['bdatechild8'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 8){
                    $name['child9'] = $row['chi_name'];
                    $name['bdatechild9'] = $row['chi_date'] ;
                    goto end;
                }

                if($x == 9){
                    $name['child10'] = $row['chi_name'];
                    $name['bdatechild10'] = $row['chi_date'] ;
                    goto end;
                }

                end:
                $x = $x+1;
            }

            //get elementary
            $name['elementary'] = $this->Posts_model->get_educational_data_elementary();
            $name['elementary_offset1'] = $this->Posts_model->get_educational_data_elementary_offset1();

            //get secondary
            $name['secondary'] = $this->Posts_model->get_educational_data_secondary();
            $name['secondary_offset1'] = $this->Posts_model->get_educational_data_secondary_offset1();

            //get vocational
            $name['vocational'] = $this->Posts_model->get_educational_data_vocational();
            $name['vocational_offset1'] = $this->Posts_model->get_educational_data_vocational_offset1();


            //get college
            $name['college'] = $this->Posts_model->get_educational_data_college();
            $name['college_offset1'] = $this->Posts_model->get_educational_data_college_offset1();

            //get graduate
            $name['graduate'] = $this->Posts_model->get_educational_data_graduate();
            $name['graduate_offset1'] = $this->Posts_model->get_educational_data_graduate_offset1();

            if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
                show_404();
            }else{
                $this->load->view('pages/hr/'.$page, $name);   
            }
        }else{
            show_404();
        }
        
        
    }

    public function personal_data_sheet_view1() {
        
        $page = 'pds2';

        
        //get_eligibility_data_pds2
        $name['eligibility'] = $this->Posts_model->get_eligibility_data_pds2();
        $name['eligibility_offset1'] = $this->Posts_model->get_eligibility_data_pds2_offset1();

          //get_work_experience_data_pds2
          $name['work_experience'] = $this->Posts_model->get_work_experience_data_pds2();
          $name['work_experience_offset1'] = $this->Posts_model->get_work_experience_data_pds2_offset1();


        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/'.$page, $name);   
        }
    }

    public function personal_data_sheet_view2() {
        
        $page = 'pds3';

        //get_work_experience_data_pds2
        $name['work_experience'] = $this->Posts_model->get_voluntary_work_data_pds2();
        $name['work_experience_offset'] = $this->Posts_model->get_voluntary_work_data_pds2_offset();
        
      
        //get_learning_and_development_pds
        $name['learning_development'] = $this->Posts_model->get_learning_and_development_pds();
        $name['learning_development_offset'] = $this->Posts_model->get_learning_and_development_pds_offset();

        //merge special skills, recognition & membership
        $special_skills = $this->Posts_model->get_hobbies_data_array();
        $recognition = $this->Posts_model->get_recognition_data_array();
        $membership = $this->Posts_model->get_membership_data_array();

        $name['special_skills'] = $special_skills;
        $name['recognition'] = $recognition;
        $name['membership'] = $membership;
        
        $name['special_skills_offset'] = $this->Posts_model->get_hobbies_data_array_offset();
        $name['recognition_offset'] = $this->Posts_model->get_recognition_data_array_offset();
        $name['membership_offset'] = $this->Posts_model->get_membership_data_array_offset();

        $special_skills_offset_num_rows = $this->Posts_model->get_hobbies_data_array_offset_num_rows();
        $recognition_offset_num_rows = $this->Posts_model->get_recognition_data_array_offset_num_rows();
        $membership_offset_num_rows = $this->Posts_model->get_membership_data_array_offset_num_rows();

        $name['max_num_rows'] = max($special_skills_offset_num_rows,  $recognition_offset_num_rows, $membership_offset_num_rows);

        //print_r($name['learning_development']);

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/'.$page, $name);   
        }
    }

    public function personal_data_sheet_view3() {
        
        $page = 'pds4';

         //Personal Information
         $data['personal_information'] = $this->Posts_model->get_personal_information();
         $name['emp_gov_id'] =  $data['personal_information']['emp_gov_id'];
         $name['emp_gov_place'] =  $data['personal_information']['emp_gov_place'];
         $name['emp_gov_type'] =  $data['personal_information']['emp_gov_type'];

        //get_character reference
        $name['character_reference'] = $this->Posts_model->get_reference_data_pds();

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/'.$page, $name);   
        }
    }

    public function personal_data_sheet_view_wes() {
        
        $page = 'pds_wes';

        $name['usr_name'] = $this->session->name;

        //get_WES
        $name['get_wes'] = $this->Posts_model->get_wes_data_array();

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/'.$page, $name);   
        }
    }

    public function upload_memo_endorsement(){
        $link = $this->input->post('back_link'); 
        // Check form submit or not
        if($this->input->post('upload') != NULL ){
            if(!empty($_FILES['memo_end']['name'])){
                
                // Set preference
                $config['upload_path'] ='uploads/TESDAOrders';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['memo_end']['name'];
                    
                //Load upload library
                $this->load->library('upload', $config);         
                
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                $explode = explode('.', $filename);
                $ext = $explode[1];

                // File upload
                if($this->upload->do_upload('memo_end')){

                    // Get data about the file
                    $this->Posts_model->upload_memo_endorsement();
                    

                    $this->session->set_flashdata('success_notification','Endorsement Memorandum uploaded successfully.');
                    redirect(base_url().'view_nominee/'.$link);
                    // $data['response'] = 'successfully uploaded '.$filename;
                    
                    }else{
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('success_notification', $error['error']);
                        redirect(base_url().'view_nominee/'.$link);
                    // $data['response'] = 'failed';
                    }
            }
            
            // load view
            //$this->session->set_flashdata('exhibits_added','Document added successfully.');
            //redirect(base_url().'unit_user_document_add/'. $back_link);
        }else{

           echo 'error';
        }
    }

    public function maintenance_on(){
        $this->Posts_model->maintenance_on();
        redirect(base_url().'extra');
    }

    public function maintenance_off(){
        $this->Posts_model->maintenance_off();
        redirect(base_url().'extra');
    }

    // Voluntary Work
    public function voluntary_work_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_voluntary_work_data();
            echo json_encode($data);
        }
       
    }

    public function voluntary_work_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->voluntary_work_data_save();
            echo json_encode($data);
        }
       
    }

    public function voluntary_work_data_edit(){
        if($this->session->logged_in){
            $data=$this->Posts_model->voluntary_work_data_edit();
            echo json_encode($data);
        }
       
    }


    public function voluntary_work_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->voluntary_work_data_delete();
            echo json_encode($data);
        }
    }

    public function get_ous_inv_for_action_save($act_inv_trn_id){
        if($this->session->logged_in){
            $data=$this->Posts_model->get_ous_inv_for_action_save($act_inv_trn_id);
            echo json_encode($data);
        }
    }

    // hobbies
    public function hobbies_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_hobbies_data();
            echo json_encode($data);
        }
       
    }

    public function hobbies_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->hobbies_data_save();
            echo json_encode($data);
        }
       
    }

    public function hobbies_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->hobbies_data_delete();
            echo json_encode($data);
        }
    }

    // recognition
    public function recognition_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_recognition_data();
            echo json_encode($data);
        }
       
    }

    public function recognition_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->recognition_data_save();
            echo json_encode($data);
        }
       
    }

    public function recognition_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->recognition_data_delete();
            echo json_encode($data);
        }
    }

    // membership
    public function membership_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_membership_data();
            echo json_encode($data);
        }
       
    }

    public function membership_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->membership_data_save();
            echo json_encode($data);
        }
       
    }

    public function membership_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->membership_data_delete();
            echo json_encode($data);
        }
    }

    // reference
    public function references_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_reference_data();
            echo json_encode($data);
        }
       
    }

    public function reference_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->reference_data_save();
            echo json_encode($data);
        }
       
    }

    public function reference_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->reference_data_delete();
            echo json_encode($data);
        }
    }

    //Government ID
    public function government_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->government_data_save();
            echo json_encode($data);
        }
       
    }

    //WES
    public function wes_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_wes_data();
            echo json_encode($data);
        } 
    }

    public function wes_data_save_wes(){
        if($this->session->logged_in){
            $data=$this->Posts_model->wes_data_save();
            echo json_encode($data);
        }
       
    }

    
    public function wes_data_edit_wes(){
        if($this->session->logged_in){
            $data=$this->Posts_model->wes_data_edit_wes();
            echo json_encode($data);
        }
       
    }

    public function wes_data_delete(){
        if($this->session->logged_in){
            $data=$this->Posts_model->wes_data_delete();
            echo json_encode($data);
        }
    }

    //Plantilla Position

    public function list_of_plantilla_positions() {
        
        if($this->session->usr_access_hr_pillar1 == 1){
            
            $page = 'plantilla-positions';
            
            if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php') || $this->session->usr_fasd == null){
                show_404();
            }else{
                $data['operating_units'] = $this->Posts_model->get_poperating_units();
                $notification['menu'] = 'Pantilla Positions';
                if($this->session->role == 'Admin'){
                    $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                } else {
                    $data['operating_units'] = $this->Posts_model->get_poperating_units();
                    $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                    $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                }
    
                //get personal information
                $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
                $this->load->view('templates/admin-header-template', $notification);
                $this->load->view('pages/hr/'.$page, $data);
                $this->load->view('templates/admin-footer-template');
            }
        }else{
            show_404();
        }    
    }

    public function get_employees_plantilla(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_employees_plantilla();
            echo json_encode($data);
        } 
    }

    public function get_plantilla_position(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_plantilla_position();
            echo json_encode($data);
        } 
    }

    //OK ITO
    /*public function get_vacant_position(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_vacant_position();
            echo json_encode($data);
        } 
    }*/

    public function get_vacant_position(){
        if($this->session->logged_in){
            $data = $this->Posts_model->get_vacant_position();
            $array = array();

            foreach($data as $row){

                $vac_id = $row['vac_id'];
                $new_data = $this->Posts_model->get_vacant_position_vac_id($vac_id);

                if($new_data){
                    foreach($new_data as $new_row){
                        $array[] = array(
                            'pos_id' => $row['pos_id'],
                            'pos_usr_id' => $row['pos_usr_id'],
                            'pos_ous_id' => $row['pos_ous_id'],
                            'ous_desc' => $row['ous_desc'],
                            'pos_desc' => $row['pos_desc'],
                            'pos_sg' => $row['pos_sg'],
                            'pos_salary' => $row['pos_salary'],
                            'pos_plantilla_no' => $row['pos_plantilla_no'],
                            'vac_id' => $row['vac_id'],
                            'pos_status' => $row['pos_status'],
                            'pos_education' => $row['pos_education'],
                            'pos_training' => $row['pos_training'],
                            'pos_experience' => $row['pos_experience'],
                            'pos_eligibility' => $row['pos_eligibility'],
                            'pos_competency' => $row['pos_competency'],  
                            'pos_ptc_position' => $row['pos_ptc_position'],  
                            'vac_date_posted' => $new_row['vac_date_posted'],  
                            'vac_deadline' => $new_row['vac_deadline'],  
                            'vac_job_opening_file' => $new_row['vac_job_opening_file'],  
                            'vac_vice_usr_id' => $new_row['vac_vice_usr_id'],   
                            'vac_nanture' => $new_row['vac_nanture'],
                            'vac_type' => $new_row['vac_type'],
                            'vac_evaluation_of_document' => $new_row['vac_evaluation_of_document'],
                            'vac_initial_deliberation' => $new_row['vac_initial_deliberation'],
                            'vac_cbwe' => $new_row['vac_cbwe'],
                            'vac_bei' => $new_row['vac_bei'],
                            'vac_status' => $new_row['vac_status'],
                            'arp_priority_level' => $row['arp_priority_level'],
                            'arp_no_applicant' => $row['arp_no_applicant'],
                            'arp_pub_date' => $row['arp_pub_date'],
                            'arp_hiring_date' => $row['arp_hiring_date'],
                            'arp_sourcing' => $row['arp_sourcing'],
                            'arp_resources' => $row['arp_resources'],
                            'arp_budgetary' => $row['arp_budgetary'],
                            'arp_risks' => $row['arp_risks'],
                            'arp_remarks' => $row['arp_remarks']
                            
                        );
    
                    }  
                }else{
                    $array[] = array(
                        'pos_id' => $row['pos_id'],
                        'pos_usr_id' => $row['pos_usr_id'],
                        'pos_ous_id' => $row['pos_ous_id'],
                        'ous_desc' => $row['ous_desc'],
                        'pos_desc' => $row['pos_desc'],
                        'pos_sg' => $row['pos_sg'],
                        'pos_salary' => $row['pos_salary'],
                        'pos_plantilla_no' => $row['pos_plantilla_no'],
                        'vac_id' => $row['vac_id'],
                        'pos_status' => $row['pos_status'],
                        'pos_education' => $row['pos_education'],
                        'pos_training' => $row['pos_training'],
                        'pos_experience' => $row['pos_experience'],
                        'pos_eligibility' => $row['pos_eligibility'],
                        'pos_competency' => $row['pos_competency'],
                        'pos_ptc_position' => $row['pos_ptc_position'],  
                        'arp_priority_level' => $row['arp_priority_level'],
                        'arp_no_applicant' => $row['arp_no_applicant'],
                        'arp_pub_date' => $row['arp_pub_date'],
                        'arp_hiring_date' => $row['arp_hiring_date'],
                        'arp_sourcing' => $row['arp_sourcing'],
                        'arp_resources' => $row['arp_resources'],
                        'arp_budgetary' => $row['arp_budgetary'],
                        'arp_risks' => $row['arp_risks'],
                        'arp_remarks' => $row['arp_remarks']
                    );
                }

                
            }

            echo json_encode($array);
        } 
    }

    public function get_vacant_position_open(){
            //get the open data
            $data = $this->Posts_model->get_vacant_position_open();

            //set timezone
            date_default_timezone_set('Asia/Manila');
            $today = date("m/d/Y");
            
            
            if($data){
                foreach($data as $row){
                    // get no of applicants

                    $number_of_applicants = $this->Posts_model->number_of_applicants($row['pos_id']);

                    $deadine = date("m/d/Y", strtotime($row['vac_deadline']));
                    $posted = date("m/d/Y", strtotime($row['vac_date_posted']));
                    $array[] = array(
                        'pos_id' => $row['pos_id'],
                        'pos_usr_id' => $row['pos_usr_id'],
                        'pos_ous_id' => $row['pos_ous_id'],
                        'ous_desc' => $row['ous_desc'],
                        'pos_desc' => $row['pos_desc'],
                        'pos_sg' => $row['pos_sg'],
                        'pos_salary' => $row['pos_salary'],
                        'pos_plantilla_no' => $row['pos_plantilla_no'],
                        'vac_id' => $row['vac_id'],
                        'pos_status' => $row['pos_status'],
                        'pos_education' => $row['pos_education'],
                        'pos_training' => $row['pos_training'],
                        'pos_experience' => $row['pos_experience'],
                        'pos_eligibility' => $row['pos_eligibility'],
                        'pos_competency' => $row['pos_competency'],  
                        'pos_ptc_position' => $row['pos_ptc_position'],  
                        'vac_date_posted' => $posted,  
                        'vac_deadline' => $deadine,  
                        'vac_job_opening_file' => $row['vac_job_opening_file'],  
                        'vac_vice_usr_id' => $row['vac_vice_usr_id'],   
                        'vac_nanture' => $row['vac_nanture'],
                        'vac_type' => $row['vac_type'],
                        'vac_evaluation_of_document' => $row['vac_evaluation_of_document'],
                        'vac_initial_deliberation' => $row['vac_initial_deliberation'],
                        'vac_cbwe' => $row['vac_cbwe'],
                        'vac_bei' => $row['vac_bei'],
                        'vac_status' => $row['vac_status'],
                        'server_time' => $today,
                        'number_of_applicants' => $number_of_applicants
                    );
                }  
            }
            echo json_encode($array);
    }

    public function plantilla_position_data_save(){
        if($this->session->logged_in){
            $data=$this->Posts_model->plantilla_position_data_save();
            echo json_encode($data);
        }
    }

    public function vacant_position_id(){
        if($this->session->logged_in){
            $data = $this->Posts_model->vacant_position_id();
            echo json_encode($data);
        }
    }

    public function delete_vacant_position_id(){
        if($this->session->logged_in){
            $data=$this->Posts_model->delete_vacant_position_id();
            echo json_encode($data);
        }
    }

    public function notify_vacant_position_id(){
        if($this->session->logged_in){

            //get vacant info
            $vacant = $this->Posts_model->get_notify_vacant_position_id();
            $salary_grade = $vacant['pos_sg'];
            $pos_desc = $vacant['pos_desc'];
            $pos_plantilla_no = $vacant['pos_plantilla_no'];
            $vac_deadline = $vacant['vac_deadline'];
            $filename = $vacant['vac_job_opening_file'];

            //get employees sg permanent
            $data=$this->Posts_model->notify_vacant_position_id($salary_grade);
            
            // foreach employee
            foreach($data as $row){
                $email = $row['usr_email'];
                $fullname = $row['usr_name'];
                $emp_position = $row['emp_position'];
                $lastname = $row['pi_surname'];

                //send email
                $this->notify_next_in_rank($email, $fullname, $emp_position, $lastname, $pos_desc, $pos_plantilla_no, $vac_deadline, $filename);
            }

            //get employees sg JO
            $data=$this->Posts_model->notify_vacant_position_id1();
            
            // foreach employee
            foreach($data as $row){
                $email = $row['usr_email'];
                $fullname = $row['usr_name'];
                $emp_position = $row['emp_position'];
                $lastname = $row['pi_surname'];

                //send email
                $this->notify_next_in_rank($email, $fullname, $emp_position, $lastname, $pos_desc, $pos_plantilla_no, $vac_deadline, $filename);
            }

            echo json_encode('true');
        }
    }

    public function duplicate_vacant_position_id(){
        if($this->session->logged_in){
            $data=$this->Posts_model->duplicate_vacant_position_id();
            echo json_encode($data);
        }
    }

    public function open_vacant_position_id(){
        if($this->session->logged_in){
            $data=$this->Posts_model->open_vacant_position_id();
            echo json_encode($data);
        }
    }

    public function timeline_vacant_position_id(){
        if($this->session->logged_in){
            $data=$this->Posts_model->timeline_vacant_position_id();
            echo json_encode($data);
        }
    }

    public function close_vacant_position_id(){
        if($this->session->logged_in){
            $data=$this->Posts_model->close_vacant_position_id();
            echo json_encode($data);
        }
    }

    public function publish_vacant_position_id(){

        // Set preference
        $config['upload_path'] ='uploads/JobOpening';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '512000';    // max_size in kb
        $config['file_name'] = $_FILES['job_opening_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);         
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        // File upload
        if($this->upload->do_upload('job_opening_file')){    
            //insert File
            $status = $this->Posts_model->publish_vacant_position_id();    
            $result = array(
                'status' => 'True',
                'error' => 'Updated Successfully.'
                );

            echo json_encode($result);
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
                );
            
            echo json_encode($result);
        }
     }

     public function request_for_publication($param) {
        
        $page = 'request_for_publication';

        $explode = explode('to', $param);
        $pos_posting_date = $explode[0];
        $pos_closing_date = $explode[1];

        //Data of for Publication
        $data['publication'] = $this->Posts_model->request_for_publication();
        $data['pos_posting_date'] = $pos_posting_date;
        $data['pos_closing_date'] = $pos_closing_date;

        //print_r($data);
        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/'.$page, $data);   
        }
    }

    public function careers() {
        
        $page = 'job';

        //print_r($data);
        if(!file_exists(APPPATH.'views/pages/hr/job/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/hr/job/'.$page);   
        }
    }

    //applicant
    
    public function save_forme1(){

        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        
        if ($this->form_validation->run() == FALSE){

            $result = array(
                'status' => 'False',
                'error' => 'Please <strong>confirm</strong> that you are not a robot.'
            );
            echo json_encode($result);

        }else{   
            // Set preference
            $config['upload_path'] ='uploads/ApplicantDocx';
            $config['allowed_types'] = 'pdf';
            $config['max_size']    = '2000';    // max_size in kb
            $config['file_name'] = $_FILES['intent_file']['name'];
                
            //Load upload library
            $this->load->library('upload', $config);   
            
            $this->upload->initialize($config);

            $uploadData = $this->upload->data();
            //$intent = $uploadData['file_name'];

            // File upload
            if($this->upload->do_upload('intent_file')){

                //check certificate of grades // for upload
                if(!empty($_FILES['education_file']['name'])){
                    
                    $uploadData = $this->upload->data();
                    $intent = $uploadData['file_name'];

                    $resultx = $this->educational_file();

                    if($resultx['status'] == 'True'){
                       $educational_file = $resultx['filename'];
                    }else{
                        $result = array(
                            'status' => 'False',
                            'error' => $resultx['error']
                        );
                        echo json_encode($result);
                        exit;
                    }

                }else{
                    $uploadData = $this->upload->data();
                    $intent = $uploadData['file_name'];
                    $educational_file = null;
                }

                $status = $this->Posts_model->save_forme1($intent, $educational_file);

                if($status['status'] == 'True'){
                    $result = array(
                        'status' => 'True',
                        'app_id' => $status['app_id'],
                        'app_hash' => $status['app_hash']
                    );

                }else{
                    $result = array(
                        'status' => 'False',
                        'error' => 'Server Error'
                    );
                }
                echo json_encode($result);

            }else{
                $result = array(
                    'status' => 'False',
                    'error' => "Intent Letter Docs: ".$this->upload->display_errors()
                );
                echo json_encode($result);
            }
        }
    }

    function educational_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['education_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('education_file')){  
            $uploadData = $this->upload->data();
            $educational_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $educational_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Educational Attainment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme2(){

        //check eligibility file // for upload
        if(!empty($_FILES['eligibility_file']['name'])){
            $resultx = $this->eligibility_file();
            if($resultx['status'] == 'True'){
                $eligibility_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $eligibility_file = null;
        }

        //check national_certificate_file // for upload
        if(!empty($_FILES['national_certificate_file']['name'])){
            $resultx = $this->national_certificate_file();
            if($resultx['status'] == 'True'){
                $national_certificate_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $national_certificate_file = null;
        }

        //check national_certificate_file // for upload
        if(!empty($_FILES['nttc_file']['name'])){
            $resultx = $this->nttc_file();
            if($resultx['status'] == 'True'){
                $nttc_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $nttc_file = null;
        }

        $status = $this->Posts_model->save_forme2($eligibility_file, $national_certificate_file, $nttc_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);
    }

    function eligibility_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['eligibility_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('eligibility_file')){  
            $uploadData = $this->upload->data();
            $eligibility_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $eligibility_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Eligibility Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function national_certificate_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['national_certificate_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('national_certificate_file')){  
            $uploadData = $this->upload->data();
            $national_certificate_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $national_certificate_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "National Certificate Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function nttc_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['nttc_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('nttc_file')){  
            $uploadData = $this->upload->data();
            $nttc_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $nttc_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "NTTC Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme3(){

        //Check Certificate of Employment
        if(!empty($_FILES['coe_file']['name'])){
            $resultx = $this->coe_file();
            if($resultx['status'] == 'True'){
                $coe_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $coe_file = null;
        }

        //Check Service Record (if applicable)
        if(!empty($_FILES['sr_file']['name'])){
            $resultx = $this->sr_file();
            if($resultx['status'] == 'True'){
                $sr_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $sr_file = null;
        }

        //Check Copy of Previous Appointment (if applicable)
        if(!empty($_FILES['cpa_file']['name'])){
            $resultx = $this->cpa_file();
            if($resultx['status'] == 'True'){
                $cpa_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $cpa_file = null;
        }

        //Check Performance rating in the present position for last two (2) rating period certified by HRMO (if applicable)
        if(!empty($_FILES['ipcr_file']['name'])){
            $resultx = $this->ipcr_file();
            if($resultx['status'] == 'True'){
                $ipcr_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $ipcr_file = null;
        }

        $status = $this->Posts_model->save_forme3($ipcr_file, $cpa_file, $sr_file, $coe_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function coe_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['coe_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('coe_file')){  
            $uploadData = $this->upload->data();
            $coe_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $coe_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Certificate of Employment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function sr_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['sr_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('sr_file')){  
            $uploadData = $this->upload->data();
            $sr_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $sr_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Service Record Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function cpa_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['cpa_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('cpa_file')){  
            $uploadData = $this->upload->data();
            $cpa_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $cpa_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Copy of Previous Appointment Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function ipcr_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['ipcr_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('ipcr_file')){  
            $uploadData = $this->upload->data();
            $ipcr_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $ipcr_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Performance rating Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme4(){

        //Check Certificate of Employment
        if(!empty($_FILES['training_file']['name'])){
            $resultx = $this->training_file();
            if($resultx['status'] == 'True'){
                $training_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $training_file = null;
        }

        $status = $this->Posts_model->save_forme4($training_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function training_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['training_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('training_file')){  
            $uploadData = $this->upload->data();
            $training_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $training_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "Training File Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme5(){

        $status = $this->Posts_model->save_forme5();

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    public function save_forme6(){

        //Check PDS
        if(!empty($_FILES['pds_file']['name'])){
            $resultx = $this->pds_file();
            if($resultx['status'] == 'True'){
                $pds_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $pds_file = null;
        }

        //Check WES
        if(!empty($_FILES['wes_file']['name'])){
            $resultx = $this->wes_file();
            if($resultx['status'] == 'True'){
                $wes_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $wes_file = null;
        }


        $status = $this->Posts_model->save_forme6($pds_file, $wes_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function pds_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['pds_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('pds_file')){  
            $uploadData = $this->upload->data();
            $pds_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $pds_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "PDS Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    function wes_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['wes_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('wes_file')){  
            $uploadData = $this->upload->data();
            $wes_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $wes_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => "WES Docs: ".$this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme7(){

        $status = $this->Posts_model->save_forme7();

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    public function save_forme8(){

        //Check ARP File
        if(!empty($_FILES['arp_file']['name'])){
            $resultx = $this->arp_file();
            if($resultx['status'] == 'True'){
                $arp_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $arp_file = null;
        }
      
        $status = $this->Posts_model->save_forme8($arp_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function arp_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['arp_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('arp_file')){  
            $uploadData = $this->upload->data();
            $arp_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $arp_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme9(){

        //Check Expert File
        if(!empty($_FILES['expertise_file']['name'])){
            $resultx = $this->expertise_file();
            if($resultx['status'] == 'True'){
                $expertise_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $expertise_file = null;
        }
      
        $status = $this->Posts_model->save_forme9($expertise_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function expertise_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['expertise_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('expertise_file')){  
            $uploadData = $this->upload->data();
            $expertise_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $expertise_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
            );

            return $result;
        }
    }

    public function save_forme10(){

        //Check Expert File
        if(!empty($_FILES['cmt_file']['name'])){
            $resultx = $this->cmt_file();
            if($resultx['status'] == 'True'){
                $cmt_file = $resultx['filename'];
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => $resultx['error']
                );
                echo json_encode($result);
                exit;
            }
        }else{
            $cmt_file = null;
        }
      
        $status = $this->Posts_model->save_forme10($cmt_file);

        if($status['status'] == 'True'){
            $result = array(
                'status' => 'True',
            );

        }else{
            $result = array(
                'status' => 'False',
                'error' => 'Server Error'
            );
        }
        echo json_encode($result);

    }

    function cmt_file(){
        // Set preference
        $config['upload_path'] ='uploads/ApplicantDocx';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '2000';    // max_size in kb
        $config['file_name'] = $_FILES['cmt_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);   

        $this->upload->initialize($config);
        
        // File upload
        if($this->upload->do_upload('cmt_file')){  
            $uploadData = $this->upload->data();
            $cmt_file = $uploadData['file_name'];

            $result = array(
                'status' => 'True',
                'filename' => $cmt_file
            );
            return $result;
            
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
            );

            return $result;
        }
    }

    public function view_applicants($param) {
        if($this->session->usr_access_hr_pillar1 == 1){
            $page = 'applicants';
            
            if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php') || $this->session->usr_fasd == null){
                show_404();
            }else{
                $data['vac_id'] = $param;
                $notification['menu'] = 'Pantilla Positions';
                if($this->session->role == 'Admin'){
                    $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
                } else {
                    $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                    $notification['notification_data'] = $this->Posts_model->get_notifications_data();
                }

                //get personal information
                $notification['notification_personal_information'] = $this->Posts_model->get_notifications_personal_information();
                $this->load->view('templates/admin-header-template', $notification);
                $this->load->view('pages/hr/'.$page, $data);
                $this->load->view('templates/admin-footer-template');
            }
        }else{
            show_404();
        }
    }

    public function get_applicants($param){
        //get the open data
        if($this->session->logged_in){
            $data = $this->Posts_model->get_applicants($param);
            echo json_encode($data);
        }
    }

    public function link_shortener(){
        $long_url = 'https://stackoverflow.com/questions/ask';
        $apiv4 = 'https://api-ssl.bitly.com/v4/bitlinks';
        $genericAccessToken = '6fe23442c5c44510cae608b893851d8ddb905fd3';

        $data = array(
            'long_url' => $long_url
        );
        $payload = json_encode($data);

        $header = array(
            'Authorization: Bearer ' . $genericAccessToken,
            'Content-Type: application/json',
            'Content-Length: ' . strlen($payload)
        );

        $ch = curl_init($apiv4);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($ch);
        $resultToJson = json_decode($result);

        if (isset($resultToJson->link)) {
            echo $resultToJson->link;
        }
        else {
            echo 'Not found';
        }
    }

    /*function notify_next_in_rank(){
        //notify next in rank
        include("Email.php");
        //notify next in rank
    }*/

    public function plantilla_position_data_edit(){
        if($this->session->logged_in){
            $data=$this->Posts_model->plantilla_position_data_edit();
            echo json_encode($data);
        }
    }

    public function annual_recruitment_plan() {
        $page = 'annual_recruitment_plan';
        
        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            
            $data['annual_recruitment_plan_sg18'] = $this->Posts_model->annual_recruitment_plan_sg18();
            $data['annual_recruitment_plan_sg17'] = $this->Posts_model->annual_recruitment_plan_sg17();
            $data['usr_name'] = $this->session->name;
            //print_r($data);
            $this->load->view('pages/hr/'.$page, $data);
        }
    }

    public function save_my_document(){

        // Set preference
        $config['upload_path'] ='uploads/empdocs';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = '512000';    // max_size in kb
        $config['file_name'] = $_FILES['my_document_file']['name'];
            
        //Load upload library
        $this->load->library('upload', $config);         
        $uploadData = $this->upload->data();
        $filename = $uploadData['file_name'];

        // File upload
        if($this->upload->do_upload('my_document_file')){    
            //insert File
            $status = $this->Posts_model->save_my_document();    
            $result = array(
                'status' => 'True',
                'error' => 'Updated Successfully.'
                );

            echo json_encode($result);
        }else{

            $result = array(
                'status' => 'False',
                'error' => $this->upload->display_errors()
                );
            
            echo json_encode($result);
        }
     }

    public function my_document_data(){
        if($this->session->logged_in){
            $data = $this->Posts_model->my_document_data();
            echo json_encode($data);
        } 
    }

    public function delete_my_document(){
        if($this->session->logged_in){
            $data=$this->Posts_model->delete_my_document();
            if($data){
                $this->load->helper("file");
                $file= $this->input->post('file_filename');
                unlink('./uploads/empdocs/'.$file);
            }
            echo json_encode($data);
        }
    }

    public function notify_next_in_rank($email, $fullname, $emp_position, $lastname, $pos_desc, $pos_plantilla_no, $vac_deadline, $filename){
        
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $this->config->load('phpmailer');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
            
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
            
        $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
         
         // Add a recipient
         $mail->addAddress($email);
         
         // Add cc or bcc 
         $mail->addCC('tesdadosrecruitment@gmail.com');
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject = 'Notice of Vacancy';
         
         // Set email format to HTML
         $mail->isHTML(true);
         
         // Email body content
         $mailContent = "
                        <html xmlns='http://www.w3.org/1999/xhtml'>
                        <head>
                            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                            <meta name='format-detection' content='telephone=no'/>
                        
                            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                            https://github.com/konsav/email-templates/  -->
                        
                            <style>
                        /* Reset styles */ 
                        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                        #outlook a { padding: 0; }
                        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                        
                        /* Rounded corners for advanced mail clients only */ 
                        @media all and (min-width: 560px) {
                            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                        }
                        
                        /* Set color for auto links (addresses, dates, etc.) */ 
                        a, a:hover {
                            color: #FFFFFF;
                        }
                        .footer a, .footer a:hover {
                            color: #828999;
                        }
                        
                            </style>
                        
                            <!-- MESSAGE SUBJECT -->
                            <title>Responsive HTML email templates</title>
                        
                        </head>
                        
                        <!-- BODY -->
                        <!-- Set message background color (twice) and text color (twice) -->
                        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                            background-color: #2D3445;
                            color: #FFFFFF;'
                            bgcolor='#2D3445'
                            text='#FFFFFF'>
                        
                        <!-- SECTION / BACKGROUND -->
                        <!-- Set message background color one again -->
                        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                            bgcolor='#2D3445'>
                        
                        <!-- WRAPPER -->
                        <!-- Set wrapper width (twice) -->
                        <table border='0' cellpadding='0' cellspacing='0' align='center'
                            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                            max-width: 100%;' class='wrapper'>
                        
                            <tr bgcolor='#FFD600'>
                                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    color: #2D3445;'>
                                    This is an auto generated message, please do not reply.
                                    <!-- PREHEADER -->
                                    <!-- Set text color to background color -->
                                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                        color: #2D3445;' class='preheader'>
                                      </div>                        
                                </td>
                            </tr>
                            <!-- HERO IMAGE -->
                            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr bgcolor='#FFFFF'>
                                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                    href='#'><img border='0' vspace='0' hspace='0'
                                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                                    width='100%' style='
                                    width: 100%;
                                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                            </tr>
                        
                            <!-- SUPHEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                    padding-top: 27px;
                                    padding-bottom: 0;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='supheader'>
                                        
                                </td>
                            </tr>
                        
                            <!-- HEADER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                            <tr>
                                <td align='right' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: bold; line-height: 130%;
                                    padding-top: 5px;
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='header'>
                                    ANNEX F
                                </td>
                            </tr>
                        
                            <!-- PARAGRAPH -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                    padding-top: 15px; 
                                    color: #FFFFFF;
                                    font-family: sans-serif;' class='paragraph'><br>
                                    <b>".strtoupper($fullname)."</b><br>
                                    <b>".strtoupper($emp_position)."</b><br>
                                    <b>".$email."</b><br>
                                    <br>
                                    Dear Mr./Ms. ".strtoupper($lastname)."
                                    <br><br>
                                    This is regarding the vacant <b>".strtoupper($pos_desc)."</b> positions with Item Numbers <b>".strtoupper($pos_plantilla_no)."</b> in the Technical Education and Skills Development Authority (TESDA). 
                                    <br><br>
                                    We would like to invite you to submit the application requirements for the said position on or before <b>".date('F d, Y', strtotime($vac_deadline))."</b> as indicated in the attached Job Opening file.
                                    <br><br>
                                    Non-submission of requirements means disinterest in pursuing the application.    
                                    <br><br>
                                    Thank you and best regards
                                    <br><br>
                                    <b>(SGD.) MARY ANNE A. FURIGAY</b>
                                    <br>Position: Administrative Officer V
                                    <br>Office: TESDA Region 2

                                    
                                    

                                </td>
                            </tr>
                        
                            <!-- BUTTON -->
                            <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 25px;
                                    padding-bottom: 5px;' class='button'>
                                    <a href='#' target='_blank' style='text-decoration: underline;'>
                                        
                                        <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                            <tr>
                                                
                                            </tr>
                                        </table>

                                    </a>
                                </td>
                            </tr>

                           
                        
                            <!-- LINE -->
                            <!-- Set line color -->
                            <tr>
                                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                    padding-top: 30px;' class='line'><hr
                                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                                </td>
                            </tr>
                        
                            <!-- FOOTER -->
                            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                            <tr>
                                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                    padding-top: 20px;
                                    padding-bottom: 20px;
                                    color: #828999;
                                    font-family: sans-serif;' class='footer'>
                                        <br>
                                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                        <br> 
                                        <br>
                                        <br>
                                        <center>This email was sent to&nbsp;". $email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                                </td>
                            </tr>
                        
                        <!-- End of WRAPPER -->
                        </table>
                        
                        <!-- End of SECTION / BACKGROUND -->
                        </td></tr></table>
                        
                        </body>
                        </html>
                        ";
         $mail->Body = $mailContent;

         $mail->AddAttachment('uploads/JobOpening/'.$filename);
 
         // Send email
         if(!$mail->send()){
             echo 'Message could not be sent.';
             echo 'Mailer Error: ' . $mail->ErrorInfo;
         }else{
             return TRUE;
         }
    }

    public function send_notif_approve_training1($os_user_id, $inv_trn_id){
        if($this->session->logged_in){
            //get training details
            $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
            $title1 = $training['training']['trn_title'];
            $date_from = $training['training']['trn_from_date'];
            $date_to = $training['training']['trn_to_date'];
    
            $title="R2 FASD Services | Approve Nomination";
            //Get User's Name   
            $data = $this->Posts_model->get_accounts_onesignal_emp($os_user_id);
    
            foreach( $data as $row){
                $name = $row['usr_name'];
                $message="Hi, ".$name."! This is to inform you that you have a scheduled training on ".date('F y, Y', strtotime($date_from))." - ".date('F y, Y', strtotime($date_to))." re: ".$title1.". Thank you. - System Administrator";
            }
    
            $result = $this->sendMessageOne($os_user_id, $message, $title);
            if($result){
                return true;
            }
        }else{
             show_404();
        }
    }

    public function r2_annex_j($param) {
        if($this->session->logged_in){
            if($this->session->usr_access_hr_pillar1 == 1){
                $page = 'r2-annex-j';
                
                if(!file_exists(APPPATH.'views/pages/hr/'.$page.'.php')){
                    show_404();
                }else{
                    $data['Annex'] = $this->Posts_model->get_applicants_ind($param);
                    //print_r($data);
                    $this->load->view('pages/hr/'.$page, $data);
                }
            }else{
                show_404();
            }
        }
    }

    public function r2_annex_j2($param) {
        if($this->session->logged_in){
            if($this->session->usr_access_hr_pillar1 == 1){
                $page = 'r2-annex-j2';
                
                if(!file_exists(APPPATH.'views/pages/hr/'.$page.'.php')){
                    show_404();
                }else{
                    $data['Annex'] = $this->Posts_model->get_applicants_ind($param);
                    //print_r($data);
                    $this->load->view('pages/hr/'.$page, $data);
                }
            }else{
                show_404();
            }
        }
    }

    public function r2_profile_of_applicants($param) {
        if($this->session->logged_in){
            if($this->session->usr_access_hr_pillar1 == 1){
                $page = 'r2-profile-of-applicant2025';
                
                if(!file_exists(APPPATH.'views/pages/hr/'.$page.'.php')){
                    show_404();
                }else{
                    $data['Applicants'] = $this->Posts_model->get_applicants1($param);
                    //print_r($data);
                    $this->load->view('pages/hr/'.$page, $data);
                }
            }else{
                show_404();
            }
        }
    }

    public function r2_annex_k($param) {
        if($this->session->logged_in){
            if($this->session->usr_access_hr_pillar1 == 1){
                $page = 'r2-annex-k';
                
                if(!file_exists(APPPATH.'views/pages/hr/'.$page.'.php')){
                    show_404();
                }else{
                    $data['Applicants'] = $this->Posts_model->get_applicants2($param);
                    //print_r($data);
                    $this->load->view('pages/hr/'.$page, $data);
                }
            }else{
                show_404();
            }
        }
    }

    public function evaluate_form(){
        if($this->session->logged_in){
            $data = $this->Posts_model->evaluate_form();
            if($data['status'] == 'True'){
                //send email here
                
                $result = array(
                    'status' => 'True',
                    'error' => '<i class="fa fa-check-circle"></i> Evaluated Successfully'
                );
    
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => '<i class="fa fa-exclamation-triangle"></i> Server error — the evaluation was not saved.'
                );
            }
            echo json_encode($result);
        }else{
             show_404();
        }
    
    }

    public function notify_disqualified_applicants(){
        if($this->session->logged_in){
            $id = $this->input->post('pos_id_disqualified');
            $data = $this->Posts_model->notify_disqualified_applicants($id);
            //$return = array();
            //Loop for email
            foreach($data as $rows){
                $app_lastname = $rows['app_lastname'];
                $app_firstname = $rows['app_firstname'];
                $app_middlename = $rows['app_middlename'];
                $app_suffix = $rows['app_suffix'];
                $app_address = $rows['app_address'];
                $eval_remarks = $rows['eval_remarks'];
                $eval_remarks1 = $rows['eval_remarks1'];
                $pos_plantilla_no = $rows['pos_plantilla_no'];
                $pos_desc = $rows['pos_desc'];
                $app_email = $rows['app_email'];
                $this->email_disqualified_applicants($app_lastname, $app_firstname, $app_middlename, $app_suffix, $app_address, $app_email, $eval_remarks, $eval_remarks1, $pos_plantilla_no, $pos_desc);

            }
            echo json_encode('True');

            
            
        } 
    
    }

    public function email_disqualified_applicants($app_lastname, $app_firstname, $app_middlename, $app_suffix, $app_address, $app_email, $eval_remarks, $eval_remarks1, $pos_plantilla_no, $pos_desc){
        //explode QS
        $remarks_qs = str_replace(";","\n --- ",$eval_remarks);
        
        //explode docs
        $remarks_docs = str_replace(";","\n --- ",$eval_remarks1);
       
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
        $this->config->load('phpmailer');

        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
            
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = $this->config->item('smtp_host');
        $mail->SMTPAuth   = $this->config->item('smtp_auth');
        $mail->Username   = $this->config->item('smtp_username');
        $mail->Password   = $this->config->item('smtp_password');
        $mail->SMTPSecure = $this->config->item('smtp_secure');
        $mail->Port       = $this->config->item('smtp_port');
           
        $mail->setFrom('region2.ictu@tesda.gov.ph', 'TDIS | Notification');
        
        // Add a recipient
        $mail->addAddress($app_email);
        
        // Add cc or bcc 
        $mail->addCC('tesdadosrecruitment@gmail.com');
        //$mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'TESDA Region II (Cagayan Valley) - Notice of Disqualification';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        //check if null 
        if($eval_remarks != null && $eval_remarks1 == null){
        // Email body content 3
        $mailContent = "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
            <meta name='format-detection' content='telephone=no'/>

            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
            https://github.com/konsav/email-templates/  -->

            <style>
        /* Reset styles */ 
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        #outlook a { padding: 0; }
        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

        /* Rounded corners for advanced mail clients only */ 
        @media all and (min-width: 560px) {
            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
        }

        /* Set color for auto links (addresses, dates, etc.) */ 
        a, a:hover {
            color: #FFFFFF;
        }
        .footer a, .footer a:hover {
            color: #828999;
        }

            </style>

            <!-- MESSAGE SUBJECT -->
            <title>Responsive HTML email templates</title>

        </head>

        <!-- BODY -->
        <!-- Set message background color (twice) and text color (twice) -->
        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
            background-color: #2D3445;
            color: #FFFFFF;'
            bgcolor='#2D3445'
            text='#FFFFFF'>

        <!-- SECTION / BACKGROUND -->
        <!-- Set message background color one again -->
        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
            bgcolor='#2D3445'>

        <!-- WRAPPER -->
        <!-- Set wrapper width (twice) -->
        <table border='0' cellpadding='0' cellspacing='0' align='center'
            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
            max-width: 100%;' class='wrapper'>

            <tr bgcolor='#FFD600'>
                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    color: #2D3445;'>
                    This is an auto generated message, please do not reply.
                    <!-- PREHEADER -->
                    <!-- Set text color to background color -->
                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                        color: #2D3445;' class='preheader'>
                    </div>                        
                </td>
            </tr>
            <!-- HERO IMAGE -->
            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
            <tr bgcolor='#FFFFF'>
                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                    href='#'><img border='0' vspace='0' hspace='0'
                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                    width='100%' style='
                    width: 100%;
                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
            </tr>

            <!-- SUPHEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                    padding-top: 27px;
                    padding-bottom: 0;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='supheader'>
                        
                </td>
            </tr>

            <!-- HEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='right' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: bold; line-height: 130%;
                    padding-top: 5px;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='header'>
                    ANNEX L1
                </td>
            </tr>

            <!-- PARAGRAPH -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                    padding-top: 15px; 
                    color: #FFFFFF;
                    font-family: sans-serif;' class='paragraph'><br>
                    <b>".strtoupper($app_lastname).", ".strtoupper($app_firstname)." ".strtoupper($app_middlename)." ".strtoupper($app_suffix)."</b><br>
                    <b>".strtoupper($app_address)."</b><br>
                    <br>
                    Dear Mr./Ms. ".strtoupper($app_lastname)."
                    <br><br>
                    This is regarding your application to the vacant <b>".strtoupper($pos_desc)."</b> position with Plantilla Item No. <b>".strtoupper($pos_plantilla_no)."</b> in the Technical Education and Skills Development Authority (TESDA). 
                    <br><br>
                    Please be informed that you failed to meet the required minimum qualifications as per Civil Service Commission (CSC) Qualification Standards. The requirement/s should be:<br>
                    <b> --- ".nl2br($remarks_qs)."</b>
                    <br><br>
                    Furthermore, many applicants have been disqualified due to errors in filling out the Personal Data Sheet (PDS) and Work Experience Sheet (WES). To avoid this, kindly review the proper way of completing the form by accessing the link: <a href='https://drive.google.com/drive/folders/1POoTrbFYXTx50HeKxo5VdtiLIDSIwS-w'>Sample Properly Filled Out PDS</a>
                    <br><br>
                    We will be keeping your file in the active pool of applicants for one (1) year and will be considered for any future vacancy that you may be qualified.
                    <br><br>
                    Thank you and best regards.
                    <br><br>
                    Very truly yours,
                    <br><br>
                    <b>(SGD.) MARY ANNE A. FURIGAY</b>
                    <br>Position: Administrative Officer V
                    <br>Office: TESDA Region 2
                </td>
            </tr>

            <!-- LINE -->
            <!-- Set line color -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 30px;' class='line'><hr
                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                </td>
            </tr>

            <!-- FOOTER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    color: #828999;
                    font-family: sans-serif;' class='footer'>
                        <br>
                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                        <br> 
                        <br>
                        <br>
                        <center>This email was sent to&nbsp;". $app_email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                </td>
            </tr>

        <!-- End of WRAPPER -->
        </table>

        <!-- End of SECTION / BACKGROUND -->
        </td></tr></table>

        </body>
        </html>
        ";
// Email Content Body 3
        }elseif($eval_remarks1 != null && $eval_remarks == null){
// Email body content 2
        $mailContent = "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
            <meta name='format-detection' content='telephone=no'/>

            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
            https://github.com/konsav/email-templates/  -->

            <style>
        /* Reset styles */ 
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        #outlook a { padding: 0; }
        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

        /* Rounded corners for advanced mail clients only */ 
        @media all and (min-width: 560px) {
            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
        }

        /* Set color for auto links (addresses, dates, etc.) */ 
        a, a:hover {
            color: #FFFFFF;
        }
        .footer a, .footer a:hover {
            color: #828999;
        }

            </style>

            <!-- MESSAGE SUBJECT -->
            <title>Responsive HTML email templates</title>

        </head>

        <!-- BODY -->
        <!-- Set message background color (twice) and text color (twice) -->
        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
            background-color: #2D3445;
            color: #FFFFFF;'
            bgcolor='#2D3445'
            text='#FFFFFF'>

        <!-- SECTION / BACKGROUND -->
        <!-- Set message background color one again -->
        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
            bgcolor='#2D3445'>

        <!-- WRAPPER -->
        <!-- Set wrapper width (twice) -->
        <table border='0' cellpadding='0' cellspacing='0' align='center'
            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
            max-width: 100%;' class='wrapper'>

            <tr bgcolor='#FFD600'>
                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    color: #2D3445;'>
                    This is an auto generated message, please do not reply.
                    <!-- PREHEADER -->
                    <!-- Set text color to background color -->
                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                        color: #2D3445;' class='preheader'>
                    </div>                        
                </td>
            </tr>
            <!-- HERO IMAGE -->
            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
            <tr bgcolor='#FFFFF'>
                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                    href='#'><img border='0' vspace='0' hspace='0'
                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                    width='100%' style='
                    width: 100%;
                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
            </tr>

            <!-- SUPHEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                    padding-top: 27px;
                    padding-bottom: 0;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='supheader'>
                        
                </td>
            </tr>

            <!-- HEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='right' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: bold; line-height: 130%;
                    padding-top: 5px;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='header'>
                    ANNEX L1
                </td>
            </tr>

            <!-- PARAGRAPH -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                    padding-top: 15px; 
                    color: #FFFFFF;
                    font-family: sans-serif;' class='paragraph'><br>
                    <b>".strtoupper($app_lastname).", ".strtoupper($app_firstname)." ".strtoupper($app_middlename)." ".strtoupper($app_suffix)."</b><br>
                    <b>".strtoupper($app_address)."</b><br>
                    <br>
                    Dear Mr./Ms. ".strtoupper($app_lastname)."
                    <br><br>
                    This is regarding your application to the vacant <b>".strtoupper($pos_desc)."</b> position with Plantilla Item No. <b>".strtoupper($pos_plantilla_no)."</b> in the Technical Education and Skills Development Authority (TESDA). 
                    <br><br>
                    Please be informed that you failed to submit the necessary requirement/s for the said position. The following are our findings upon evaluation of your submitted documents, to wit:<br>
                    <b> --- ". nl2br($remarks_docs)."</b>
                    <br><br>
                    We will be keeping your file in the active pool of applicants for one (1) year and will be considered for any future vacancy that you are qualified for.
                    <br><br>
                    Thank you and best regards.
                    <br><br>
                    Very truly yours,
                    <br><br>
                    <b>(SGD.) MARY ANNE A. FURIGAY</b>
                    <br>Position: Administrative Officer V
                    <br>Office: TESDA Region 2

                </td>
            </tr>

            <!-- LINE -->
            <!-- Set line color -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 30px;' class='line'><hr
                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                </td>
            </tr>

            <!-- FOOTER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    color: #828999;
                    font-family: sans-serif;' class='footer'>
                        <br>
                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                        <br> 
                        <br>
                        <br>
                        <center>This email was sent to&nbsp;". $app_email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                </td>
            </tr>

        <!-- End of WRAPPER -->
        </table>

        <!-- End of SECTION / BACKGROUND -->
        </td></tr></table>

        </body>
        </html>
        ";
// Email Content Body 2
        }else{
// Email body content 1
        $mailContent = "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
            <meta name='format-detection' content='telephone=no'/>

            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
            https://github.com/konsav/email-templates/  -->

            <style>
        /* Reset styles */ 
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        #outlook a { padding: 0; }
        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

        /* Rounded corners for advanced mail clients only */ 
        @media all and (min-width: 560px) {
            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
        }

        /* Set color for auto links (addresses, dates, etc.) */ 
        a, a:hover {
            color: #FFFFFF;
        }
        .footer a, .footer a:hover {
            color: #828999;
        }

            </style>

            <!-- MESSAGE SUBJECT -->
            <title>Responsive HTML email templates</title>

        </head>

        <!-- BODY -->
        <!-- Set message background color (twice) and text color (twice) -->
        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
            background-color: #2D3445;
            color: #FFFFFF;'
            bgcolor='#2D3445'
            text='#FFFFFF'>

        <!-- SECTION / BACKGROUND -->
        <!-- Set message background color one again -->
        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
            bgcolor='#2D3445'>

        <!-- WRAPPER -->
        <!-- Set wrapper width (twice) -->
        <table border='0' cellpadding='0' cellspacing='0' align='center'
            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
            max-width: 100%;' class='wrapper'>

            <tr bgcolor='#FFD600'>
                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    color: #2D3445;'>
                    This is an auto generated message, please do not reply.
                    <!-- PREHEADER -->
                    <!-- Set text color to background color -->
                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                        color: #2D3445;' class='preheader'>
                    </div>                        
                </td>
            </tr>
            <!-- HERO IMAGE -->
            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
            <tr bgcolor='#FFFFF'>
                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                    href='#'><img border='0' vspace='0' hspace='0'
                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                    width='100%' style='
                    width: 100%;
                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
            </tr>

            <!-- SUPHEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                    padding-top: 27px;
                    padding-bottom: 0;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='supheader'>
                        
                </td>
            </tr>

            <!-- HEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='right' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: bold; line-height: 130%;
                    padding-top: 5px;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='header'>
                    ANNEX L1
                </td>
            </tr>

            <!-- PARAGRAPH -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                    padding-top: 15px; 
                    color: #FFFFFF;
                    font-family: sans-serif;' class='paragraph'><br>
                    <b>".strtoupper($app_lastname).", ".strtoupper($app_firstname)." ".strtoupper($app_middlename)." ".strtoupper($app_suffix)."</b><br>
                    <b>".strtoupper($app_address)."</b><br>
                    <br>
                    Dear Mr./Ms. ".strtoupper($app_lastname)."
                    <br><br>
                    This is regarding your application to the vacant <b>".strtoupper($pos_desc)."</b> position with Plantilla Item No. <b>".strtoupper($pos_plantilla_no)."</b> in the Technical Education and Skills Development Authority (TESDA). 
                    <br><br>
                    Please be informed that you failed to meet the required minimum qualifications as per Civil Service Commission (CSC) Qualification Standards. The requirement/s should be:<br>
                    <b> --- ".nl2br($remarks_qs)."</b>
                    <br><br>
                    Also, you are failed to submit the necessary requirement/s for the said position. The following are our findings upon evaluation of your submitted documents, to wit:<br>
                    <b> --- ". nl2br($remarks_docs)."</b>
                    <br><br>
                    We will be keeping your file in the active pool of applicants for one (1) year and will be considered for any future vacancy that you are qualified for.
                    <br><br>
                    Thank you and best regards.
                    <br><br>
                    Very truly yours,
                    <br><br>
                    <b>(SGD.) MARY ANNE A. FURIGAY</b>
                    <br>Position: Administrative Officer V
                    <br>Office: TESDA Region 2

                </td>
            </tr>

            <!-- LINE -->
            <!-- Set line color -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 30px;' class='line'><hr
                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                </td>
            </tr>

            <!-- FOOTER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    color: #828999;
                    font-family: sans-serif;' class='footer'>
                        <br>
                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                        <br> 
                        <br>
                        <br>
                        <center>This email was sent to&nbsp;". $app_email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                </td>
            </tr>

        <!-- End of WRAPPER -->
        </table>

        <!-- End of SECTION / BACKGROUND -->
        </td></tr></table>

        </body>
        </html>
        ";
// Email Content Body 1
        }

        $mail->Body = $mailContent;

        //$mail->AddAttachment('uploads/JobOpening/'.$filename);

        // Send email
        if(!$mail->send()){
            $return = array(
                'error' => $mail->ErrorInfo
            );
            return $return;
            //echo 'Message could not be sent.';
            //echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            $return = array(
                'status' => 'True');
            return $return;
        }
   }

   public function search_form_applicant(){
        $data = $this->Posts_model->search_form_applicant();
        if($data){
            echo json_encode($data);
        }else{
            $data = array(
                'status' => 'False');
            echo json_encode($data);
        }
      
    }
 
//-------------Email Template-------------

    public function test_mail_server(){
        
        // Load PHPMailer library
        $this->load->library('phpmailer_lib');
       
        // PHPMailer object
        $mail = $this->phpmailer_lib->load();
        
        // SMTP configuration
       $mail->isSMTP();
       $mail->Host     = 'smtp.gmail.com';
       $mail->SMTPAuth = true;
       $mail->Username = 'region2.primehrm@tesda.gov.ph';
       $mail->Password = 'TESDADOSprimehrm';
       $mail->SMTPSecure = 'ssl';
       $mail->Port     = 465;
           
       $mail->setFrom('region2.primehrm@tesda.gov.ph', 'R2 FASD Services | Notification');
        
        // Add a recipient
        $mail->addAddress('johnlhy25@gmail.com');
        
        // Add cc or bcc 
        //$mail->addCC('tesdadosrecruitment@gmail.com');
        //$mail->addBCC('bcc@example.com');
        
        // Email subject
        $mail->Subject = 'Notice of Vacancy';
        
        // Set email format to HTML
        $mail->isHTML(true);
        
        // Email body content
        $mailContent = "
                       <html xmlns='http://www.w3.org/1999/xhtml'>
                       <head>
                           <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
                           <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
                           <meta name='format-detection' content='telephone=no'/>
                       
                           <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
                           https://github.com/konsav/email-templates/  -->
                       
                           <style>
                       /* Reset styles */ 
                       body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
                       body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
                       table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
                       img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
                       #outlook a { padding: 0; }
                       .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
                       .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }
                       
                       /* Rounded corners for advanced mail clients only */ 
                       @media all and (min-width: 560px) {
                           .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
                       }
                       
                       /* Set color for auto links (addresses, dates, etc.) */ 
                       a, a:hover {
                           color: #FFFFFF;
                       }
                       .footer a, .footer a:hover {
                           color: #828999;
                       }
                       
                           </style>
                       
                           <!-- MESSAGE SUBJECT -->
                           <title>Responsive HTML email templates</title>
                       
                       </head>
                       
                       <!-- BODY -->
                       <!-- Set message background color (twice) and text color (twice) -->
                       <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
                           background-color: #2D3445;
                           color: #FFFFFF;'
                           bgcolor='#2D3445'
                           text='#FFFFFF'>
                       
                       <!-- SECTION / BACKGROUND -->
                       <!-- Set message background color one again -->
                       <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
                           bgcolor='#2D3445'>
                       
                       <!-- WRAPPER -->
                       <!-- Set wrapper width (twice) -->
                       <table border='0' cellpadding='0' cellspacing='0' align='center'
                           width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
                           max-width: 100%;' class='wrapper'>
                       
                           <tr bgcolor='#FFD600'>
                               <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                   padding-top: 5px;
                                   padding-bottom: 5px;
                                   color: #2D3445;'>
                                   This is an auto generated message, please do not reply.
                                   <!-- PREHEADER -->
                                   <!-- Set text color to background color -->
                                   <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                                       color: #2D3445;' class='preheader'>
                                     </div>                        
                               </td>
                           </tr>
                           <!-- HERO IMAGE -->
                           <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
                           <tr bgcolor='#FFFFF'>
                               <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                                   padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                                   href='#'><img border='0' vspace='0' hspace='0'
                                   src='https://tesdar02onlinereporting.ph/memo-1.png'
                                   width='100%' style='
                                   width: 100%;
                                   color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
                           </tr>
                       
                           <!-- SUPHEADER -->
                           <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                           <tr>
                               <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                                   padding-top: 27px;
                                   padding-bottom: 0;
                                   color: #FFFFFF;
                                   font-family: sans-serif;' class='supheader'>
                                       
                               </td>
                           </tr>
                       
                           <!-- HEADER -->
                           <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
                           <tr>
                               <td align='right' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: bold; line-height: 130%;
                                   padding-top: 5px;
                                   color: #FFFFFF;
                                   font-family: sans-serif;' class='header'>
                                   ANNEX F
                               </td>
                           </tr>
                       
                           <!-- PARAGRAPH -->
                           <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                           <tr>
                               <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                                   padding-top: 15px; 
                                   color: #FFFFFF;
                                   font-family: sans-serif;' class='paragraph'><br>

                                   
                                   

                               </td>
                           </tr>
                       
                           <!-- BUTTON -->
                           <!-- Set button background color at TD, link/text color at A and TD, font family ('sans-serif' or 'Georgia, serif') at TD. For verification codes add 'letter-spacing: 5px;'. Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
                           <tr>
                               <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                   padding-top: 25px;
                                   padding-bottom: 5px;' class='button'>
                                   <a href='#' target='_blank' style='text-decoration: underline;'>
                                       
                                       <table border='0' cellpadding='0' cellspacing='0' align='center' style='max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;'>
                                           <tr>
                                               
                                           </tr>
                                       </table>

                                   </a>
                               </td>
                           </tr>

                          
                       
                           <!-- LINE -->
                           <!-- Set line color -->
                           <tr>
                               <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                                   padding-top: 30px;' class='line'><hr
                                   color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                               </td>
                           </tr>
                       
                           <!-- FOOTER -->
                           <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                           <tr>
                               <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                                   padding-top: 20px;
                                   padding-bottom: 20px;
                                   color: #828999;
                                   font-family: sans-serif;' class='footer'>
                                       <br>
                                       Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                                       <br> 
                                       <br>
                                       <br>
                                       <center>This email was sent to&nbsp;  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                               </td>
                           </tr>
                       
                       <!-- End of WRAPPER -->
                       </table>
                       
                       <!-- End of SECTION / BACKGROUND -->
                       </td></tr></table>
                       
                       </body>
                       </html>
                       ";
        $mail->Body = $mailContent;

        //$mail->AddAttachment('uploads/JobOpening/'.$filename);

        // Send email
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            return TRUE;
        }
   }

//-------------Email Template-------------

public function notify_qualified_applicants(){
    if($this->session->logged_in){
        $id = $this->input->post('pos_id_qualified');
        $data = $this->Posts_model->notify_qualified_applicants($id);
        //$return = array();
        //Loop for email
        foreach($data as $rows){
            $app_lastname = $rows['app_lastname'];
            $app_firstname = $rows['app_firstname'];
            $app_middlename = $rows['app_middlename'];
            $app_suffix = $rows['app_suffix'];
            $app_address = $rows['app_address'];
            $eval_remarks = $rows['eval_remarks'];
            $eval_remarks1 = $rows['eval_remarks1'];
            $pos_plantilla_no = $rows['pos_plantilla_no'];
            $pos_desc = $rows['pos_desc'];
            $app_email = $rows['app_email'];
            $this->email_qualified_applicants($app_lastname, $app_firstname, $app_middlename, $app_suffix, $app_address, $app_email, $eval_remarks, $eval_remarks1, $pos_plantilla_no, $pos_desc);

        }
        echo json_encode('True');

        
        
    } 

}

//-------------ANNEX M-------------

public function email_qualified_applicants(){
        
    // Load PHPMailer library
    $this->load->library('phpmailer_lib');
   
    // PHPMailer object
    $mail = $this->phpmailer_lib->load();
    
    // SMTP configuration
    $mail->isSMTP();
    $mail->Host       = $this->config->item('smtp_host');
    $mail->SMTPAuth   = $this->config->item('smtp_auth');
    $mail->Username   = $this->config->item('smtp_username');
    $mail->Password   = $this->config->item('smtp_password');
    $mail->SMTPSecure = $this->config->item('smtp_secure');
    $mail->Port       = $this->config->item('smtp_port');
        
    $mail->setFrom($this->config->item('smtp_username'), 'TDiS | Notification');
    
    // Add a recipient
    $mail->addAddress('johnlhy25@gmail.com');
    
    // Add cc or bcc 
    //$mail->addCC('tesdadosrecruitment@gmail.com');
    //$mail->addBCC('bcc@example.com');
    
    // Email subject
    $mail->Subject = 'Notice of Competency Based Written Examination';
    
    // Set email format to HTML
    $mail->isHTML(true);
    
    // Email body content
    $mailContent = "
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
            <meta http-equiv='content-type' content='text/html; charset=UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0;'>
            <meta name='format-detection' content='telephone=no'/>

            <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
            https://github.com/konsav/email-templates/  -->

            <style>
        /* Reset styles */ 
        body { margin: 0; padding: 0; min-width: 100%; width: 100% !important; height: 100% !important;}
        body, table, td, div, p, a { -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse !important; border-spacing: 0; }
        img { border: 0; line-height: 100%; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; }
        #outlook a { padding: 0; }
        .ReadMsgBody { width: 100%; } .ExternalClass { width: 100%; }
        .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div { line-height: 100%; }

        /* Rounded corners for advanced mail clients only */ 
        @media all and (min-width: 560px) {
            .container { border-radius: 8px; -webkit-border-radius: 8px; -moz-border-radius: 8px; -khtml-border-radius: 8px; }
        }

        /* Set color for auto links (addresses, dates, etc.) */ 
        a, a:hover {
            color: #FFFFFF;
        }
        .footer a, .footer a:hover {
            color: #828999;
        }

            </style>

            <!-- MESSAGE SUBJECT -->
            <title>Responsive HTML email templates</title>

        </head>

        <!-- BODY -->
        <!-- Set message background color (twice) and text color (twice) -->
        <body topmargin='0' rightmargin='0' bottommargin='0' leftmargin='0' marginwidth='0' marginheight='0' width='100%' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
            background-color: #2D3445;
            color: #FFFFFF;'
            bgcolor='#2D3445'
            text='#FFFFFF'>

        <!-- SECTION / BACKGROUND -->
        <!-- Set message background color one again -->
        <table width='100%' align='center' border='0' cellpadding='0' cellspacing='0' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;' class='background'><tr><td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;'
            bgcolor='#2D3445'>

        <!-- WRAPPER -->
        <!-- Set wrapper width (twice) -->
        <table border='0' cellpadding='0' cellspacing='0' align='center'
            width='100%' style='border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
            max-width: 100%;' class='wrapper'>

            <tr bgcolor='#FFD600'>
                <td align='center' valign='top' style='border-collapse: collapse; font-size:10px; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 5px;
                    padding-bottom: 5px;
                    color: #2D3445;'>
                    This is an auto generated message, please do not reply.
                    <!-- PREHEADER -->
                    <!-- Set text color to background color -->
                    <div style='display: none; visibility: hidden; overflow: hidden; opacity: 0; font-size: 1px; line-height: 1px; height: 0; max-height: 0; max-width: 0;
                        color: #2D3445;' class='preheader'>
                    </div>                        
                </td>
            </tr>
            <!-- HERO IMAGE -->
            <!-- Image text color should be opposite to background color. Set your url, image src, alt and title. Alt text should fit the image size. Real image size should be x2 (wrapper x2). Do not set height for flexible images (including 'auto'). URL format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Ìmage-Name}}&utm_campaign={{Campaign-Name}} -->
            <tr bgcolor='#FFFFF'>
                <td align='center' valign='top' style='border-collapse: collapse; width: 87.5%; border-spacing: 0; margin: 0; padding: 0;
                    padding-top: 0px;' class='hero'><a target='_blank' style='text-decoration: none;'
                    href='#'><img border='0' vspace='0' hspace='0'
                    src='https://tesdar02onlinereporting.ph/memo-1.png'
                    width='100%' style='
                    width: 100%;
                    color: #FFFFFF; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;'/></a></td>
            </tr>

            <!-- SUPHEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 14px; font-weight: 400; line-height: 150%; letter-spacing: 2px;
                    padding-top: 27px;
                    padding-bottom: 0;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='supheader'>
                        
                </td>
            </tr>

            <!-- HEADER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif') -->
            <tr>
                <td align='right' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 16px; font-weight: bold; line-height: 130%;
                    padding-top: 5px;
                    color: #FFFFFF;
                    font-family: sans-serif;' class='header'>
                    ANNEX M
                </td>
            </tr>

            <!-- PARAGRAPH -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                    padding-top: 15px; 
                    color: #FFFFFF;
                    font-family: sans-serif;' class='paragraph'><br>
                    <b>".strtoupper($app_lastname).", ".strtoupper($app_firstname)." ".strtoupper($app_middlename)." ".strtoupper($app_suffix)."</b><br>
                    <b>".strtoupper($app_address)."</b><br>
                    <br>
                    Dear Mr./Ms. ".strtoupper($app_lastname)."
                    <br><br>
                    This is regarding your application to the vacant <b>".strtoupper($pos_desc)."</b> position with Plantilla Item No. <b>".strtoupper($pos_plantilla_no)."</b> in the Technical Education and Skills Development Authority (TESDA). 
                    <br><br>
                    Please be informed that you failed to submit the necessary requirement/s for the said position. The following are our findings upon evaluation of your submitted documents, to wit:<br>
                    <b> --- ". nl2br($remarks_docs)."</b>
                    <br><br>
                    We will be keeping your file in the active pool of applicants for one (1) year and will be considered for any future vacancy that you are qualified for.
                    <br><br>
                    Thank you and best regards.
                    <br><br>
                    Very truly yours,
                    <br><br>
                    <b>(SGD.) MARY ANNE A. FURIGAY</b>
                    <br>Position: Administrative Officer V
                    <br>Office: TESDA Region 2

                </td>
            </tr>

            <!-- LINE -->
            <!-- Set line color -->
            <tr>
                <td align='center' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
                    padding-top: 30px;' class='line'><hr
                    color='#565F73' align='center' width='100%' size='1' noshade style='margin: 0; padding: 0;' />
                </td>
            </tr>

            <!-- FOOTER -->
            <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
            <tr>
                <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    color: #828999;
                    font-family: sans-serif;' class='footer'>
                        <br>
                        Email Disclaimer: This message is intended only for the use of the person to whom it is expressly addressed and may contain information that is confidential and legally privileged. If you are not the intended recipient, you are hereby notified that any use, reliance on, reference to, review, disclosure or copying of the message and the information it contains for any purpose is strictly prohibited. If you have received this communication in error, please contact the sender immediately and delete this message from all computers. TESDA accepts no liability for any damage caused by any virus transmitted by this e-mail. Opinions obtained in this e-mail or any of its attachments do not necessarily reflect the opinion of TESDA.
                        <br> 
                        <br>
                        <br>
                        <center>This email was sent to&nbsp;". $app_email .".  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
                </td>
            </tr>

        <!-- End of WRAPPER -->
        </table>

        <!-- End of SECTION / BACKGROUND -->
        </td></tr></table>

        </body>
        </html>
        ";
    $mail->Body = $mailContent;

    //$mail->AddAttachment('uploads/JobOpening/'.$filename);

    // Send email
    if(!$mail->send()){
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }else{
        return TRUE;
    }
}

//-------------ANNEX M-------------

//applicant

    public function hr_ipcr() {
        $page = 'pmr';
        
        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
            show_404();
        }else{
            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            $notification['menu'] = 'IPCR';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$page);
            $this->load->view('templates/admin-footer-template');
        }
    }

    public function indicators_data(){
        if($this->session->logged_in){
            $data=$this->Posts_model->get_indicators_data();
            echo json_encode($data);
        }
    }

    //data table
    function getLogs(){
        $data = $row = array();
        
        // Fetch logs records
        $logData = $this->Posts_model->getLogs($_POST);
        
        $i = $_POST['start'];
        foreach($logData as $row1){
            $i++;
            $data[] = array($i, $row1->log_timestamp, $row1->usr_name, $row1->log_usr_platform, $row1->log_usr_ip, $row1->log_usr_browser, $row1->log_usr_browserversion, $row1->log_usr_user_agent);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Posts_model->countAll(),
            "recordsFiltered" => $this->Posts_model->countFiltered($_POST),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }
    
    public function show_flg_videos(){
        if($this->session->logged_in){
            $result = $this->Posts_model->show_flg_videos();
            echo json_encode($result); 
        } 
    }

//Last
}