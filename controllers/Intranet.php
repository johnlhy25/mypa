<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Intranet extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Posts_model');
        $this->load->model('Intranet_model');
        
    }

    public function intranet(){

        $page = 'intranet';

        if(!file_exists(APPPATH.'views/pages/hr/' .$page.'.php')){
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
            $notification['menu'] = 'Intranet';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/hr/'.$page);
            $this->load->view('templates/admin-footer-template');

        }
    }

    function getLists($param){
        $docType = str_replace('%20', ' ', $param);
        $data = $row = array();
        
        // Fetch member's records
        $memData = $this->Intranet_model->getRows($_POST, $docType);
        
        $i = $_POST['start'];
        foreach($memData as $member){
            $i++;
            $action = "<a href='https://tesdar02onlinereporting.ph/intranet/pdfviewer/web/viewer.php?file=https://tesdar02onlinereporting.ph/intranet/file/". date('Y', strtotime($member->documentDateIssued)). "/". $member->documentAttachment ."' target='_blank'><i class='fa fa-eye' aria-hidden='true'></i>View</a>";
            $issued = date( 'F d Y', strtotime($member->documentDateIssued));
             if($member->documentPNPKI == 1){
                $PNPKI = 'Yes';
            }else{
                $PNPKI = 'No';
            }
            $data[] = array($i, $member->documentNumber, $issued, $member->documentSubject, $member->documentEffectivity, $member->supersedes, $PNPKI, $action);
        }
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Intranet_model->countAll($docType),
            "recordsFiltered" => $this->Intranet_model->countFiltered($_POST,$docType),
            "data" => $data,
        );
        
        // Output to JSON format
        echo json_encode($output);
    }

    
//---------------------------Last--------------------------   
}
