<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rod extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Rod_model');
        
    }

    public function pap(){

       if($this->session->role == 'Super Admin'){
        $page = 'pmr';
        //$page = 'maintenance';
           
       }else{
        date_default_timezone_set('Asia/Manila');
        $today = date('Y-m-d'); // PH date
        $start = '2026-01-13';
        $end   = '2026-01-14';
        if ($today >= $start && $today <= $end) {
            $page = 'maintenance';
        } else {
            $page = 'pmr';
        }
       }
       

        if(!file_exists(APPPATH.'views/pages/rod/' .$page.'.php')){
            show_404();
        }else{

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //print_r($data);
            $notification['menu'] = 'OPCR Indicators';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/rod/'.$page);
            $this->load->view('templates/admin-footer-template');

        }
    }

    public function pool_of_trinees(){

        $page = 'scholar';

        if(!file_exists(APPPATH.'views/pages/rod/' .$page.'.php')){
            show_404();
        }else{

            if($this->session->role == 'Admin'){
                $notification['notification_data'] = $this->Posts_model->get_notifications_data_admin($this->session->ous_id);
            } else {
                $notification['get_pending_user'] = $this->Posts_model->get_pending_user();
                $notification['notification_data'] = $this->Posts_model->get_notifications_data();
            }
            //print_r($data);
            $notification['menu'] = 'OPCR Indicators';
            $this->load->view('templates/admin-header-template', $notification);
            $this->load->view('pages/rod/'.$page);
            $this->load->view('templates/admin-footer-template');

        }
    }

    public function get_pmr_pap($year){
        if($this->session->logged_in){
            $summary_ind = array();
            $data = $this->Rod_model->get_pmr_pap($year);
            foreach($data as $row){
                //set indicator ID
                $ind_id = $row['ind_id'];
                
                //get year
                $ind_year1 = $row['ind_year'];

//------------------Get accomplishment of RO
            if($row['is_percentage'] == 1){
                $avg_ro = $this->Rod_model->get_ro_percentage($ind_id);
                if($avg_ro['AVG(evi_accomplishment)'] == null || $avg_ro['AVG(evi_accomplishment)'] == ''){
                    $avg_ro_val = '';
                }else{
                    $avg_ro_val = number_format($avg_ro['AVG(evi_accomplishment)'],'2','.',',').'%';
                }
            }else{
                $avg_ro = $this->Rod_model->get_ro_sum($ind_id);
                if($avg_ro['SUM(evi_accomplishment)'] == null || $avg_ro['SUM(evi_accomplishment)'] == ''){
                    $avg_ro_val = '';
                }else{
                    $avg_ro_val = $avg_ro['SUM(evi_accomplishment)'];
                }
            }
//------------------Get accomplishment of RO              

//------------------Get accomplishment of PO Batanes
                if($row['is_percentage'] == 1){
                    $avg_po_batanes = $this->Rod_model->get_po_batanes_percentage($ind_id);
                    if($avg_po_batanes['AVG(evi_accomplishment)'] == null || $avg_po_batanes['AVG(evi_accomplishment)'] == ''){
                        $avg_po_batanes_val = '';
                    }else{
                        $avg_po_batanes_val = number_format($avg_po_batanes['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_po_batanes = $this->Rod_model->get_po_batanes_sum($ind_id);
                    if($avg_po_batanes['SUM(evi_accomplishment)'] == null || $avg_po_batanes['SUM(evi_accomplishment)'] == ''){
                        $avg_po_batanes_val = '';
                    }else{
                        $avg_po_batanes_val = $avg_po_batanes['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of PO Batanes
                
//------------------Get accomplishment of PO Cagayan
                    if($row['is_percentage'] == 1){
                        $avg_po_cagayan = $this->Rod_model->get_po_cagayan_percentage($ind_id);
                        if($avg_po_cagayan['AVG(evi_accomplishment)'] == null || $avg_po_cagayan['AVG(evi_accomplishment)'] == ''){
                            $avg_po_cagayan_val = '';
                        }else{
                            $avg_po_cagayan_val = number_format($avg_po_cagayan['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_po_cagayan = $this->Rod_model->get_po_cagayan_sum($ind_id);
                        if($avg_po_cagayan['SUM(evi_accomplishment)'] == null || $avg_po_cagayan['SUM(evi_accomplishment)'] == ''){
                            $avg_po_cagayan_val = '';
                        }else{
                            $avg_po_cagayan_val = number_format($avg_po_cagayan['SUM(evi_accomplishment)'],'0','.',',');
                        }
                    }
//------------------Get accomplishment of PO Cagayan

//------------------Get accomplishment of PO Isabela
                    if($row['is_percentage'] == 1){
                        $avg_po_isabela = $this->Rod_model->get_po_isabela_percentage($ind_id);
                        if($avg_po_isabela['AVG(evi_accomplishment)'] == null || $avg_po_isabela['AVG(evi_accomplishment)'] == ''){
                            $avg_po_isabela_val = '';
                        }else{
                            $avg_po_isabela_val = number_format($avg_po_isabela['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_po_isabela = $this->Rod_model->get_po_isabela_sum($ind_id);
                        if($avg_po_isabela['SUM(evi_accomplishment)'] == null || $avg_po_isabela['SUM(evi_accomplishment)'] == ''){
                            $avg_po_isabela_val = '';
                        }else{
                            $avg_po_isabela_val = $avg_po_isabela['SUM(evi_accomplishment)'];
                        }
                    }
//------------------Get accomplishment of PO Isabela

//------------------Get accomplishment of PO NV
                    if($row['is_percentage'] == 1){
                        $avg_po_nv = $this->Rod_model->get_po_nv_percentage($ind_id);
                        if($avg_po_nv['AVG(evi_accomplishment)'] == null || $avg_po_nv['AVG(evi_accomplishment)'] == ''){
                            $avg_po_nv_val = '';
                        }else{
                            $avg_po_nv_val = number_format($avg_po_nv['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_po_nv = $this->Rod_model->get_po_nv_sum($ind_id);
                        if($avg_po_nv['SUM(evi_accomplishment)'] == null || $avg_po_nv['SUM(evi_accomplishment)'] == ''){
                            $avg_po_nv_val = '';
                        }else{
                            $avg_po_nv_val = $avg_po_nv['SUM(evi_accomplishment)'];
                        }
                    }
//------------------Get accomplishment of PO NV

//------------------Get accomplishment of PO Quirino
                if($row['is_percentage'] == 1){
                    $avg_po_quirino = $this->Rod_model->get_po_quirino_percentage($ind_id);
                    if($avg_po_quirino['AVG(evi_accomplishment)'] == null || $avg_po_quirino['AVG(evi_accomplishment)'] == ''){
                        $avg_po_quirino_val = '';
                    }else{
                        $avg_po_quirino_val = number_format($avg_po_quirino['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_po_quirino = $this->Rod_model->get_po_quirino_sum($ind_id);
                    if($avg_po_quirino['SUM(evi_accomplishment)'] == null || $avg_po_quirino['SUM(evi_accomplishment)'] == ''){
                        $avg_po_quirino_val = '';
                    }else{
                        $avg_po_quirino_val = $avg_po_quirino['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of PO Quirino

//------------------Get accomplishment of RTC
                if($row['is_percentage'] == 1){
                    $avg_rtc = $this->Rod_model->get_rtc_percentage($ind_id);
                    if($avg_rtc['AVG(evi_accomplishment)'] == null || $avg_rtc['AVG(evi_accomplishment)'] == ''){
                        $avg_rtc_val = '';
                    }else{
                        $avg_rtc_val = number_format($avg_rtc['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_rtc = $this->Rod_model->get_rtc_sum($ind_id);
                    if($avg_rtc['SUM(evi_accomplishment)'] == null || $avg_rtc['SUM(evi_accomplishment)'] == ''){
                        $avg_rtc_val = '';
                    }else{
                        $avg_rtc_val = $avg_rtc['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of RTC

//------------------Get accomplishment of API
            if($row['is_percentage'] == 1){
                $avg_api = $this->Rod_model->get_api_percentage($ind_id);
                if($avg_api['AVG(evi_accomplishment)'] == null || $avg_api['AVG(evi_accomplishment)'] == ''){
                    $avg_api_val = '';
                }else{
                    $avg_api_val = number_format($avg_api['AVG(evi_accomplishment)'],'2','.',',').'%';
                }
                
            }else{
                $avg_api = $this->Rod_model->get_api_sum($ind_id);
                if($avg_api['SUM(evi_accomplishment)'] == null || $avg_api['SUM(evi_accomplishment)'] == ''){
                    $avg_api_val = '';
                }else{
                    $avg_api_val = $avg_api['SUM(evi_accomplishment)'];
                }
            }
//------------------Get accomplishment of API

//------------------Get accomplishment of LIT
            if($row['is_percentage'] == 1){
                $avg_lit = $this->Rod_model->get_lit_percentage($ind_id);
                if($avg_lit['AVG(evi_accomplishment)'] == null || $avg_lit['AVG(evi_accomplishment)'] == ''){
                    $avg_lit_val = '';
                }else{
                    $avg_lit_val = number_format($avg_lit['AVG(evi_accomplishment)'],'2','.',',').'%';
                }
                
            }else{
                $avg_lit = $this->Rod_model->get_lit_sum($ind_id);
                if($avg_lit['SUM(evi_accomplishment)'] == null || $avg_lit['SUM(evi_accomplishment)'] == ''){
                    $avg_lit_val = '';
                }else{
                    $avg_lit_val = $avg_lit['SUM(evi_accomplishment)'];
                }
            }
//------------------Get accomplishment of LIT

//------------------Get accomplishment of ISAT
                if($row['is_percentage'] == 1){
                    $avg_isat = $this->Rod_model->get_isat_percentage($ind_id);
                    if($avg_isat['AVG(evi_accomplishment)'] == null || $avg_isat['AVG(evi_accomplishment)'] == ''){
                        $avg_isat_val = '';
                    }else{
                        $avg_isat_val = number_format($avg_isat['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_isat = $this->Rod_model->get_isat_sum($ind_id);
                    if($avg_isat['SUM(evi_accomplishment)'] == null || $avg_isat['SUM(evi_accomplishment)'] == ''){
                        $avg_isat_val = '';
                    }else{
                        $avg_isat_val = $avg_isat['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of ISAT

//------------------Get accomplishment of SICAT
            if($row['is_percentage'] == 1){
                $avg_sicat = $this->Rod_model->get_sicat_percentage($ind_id);
                if($avg_sicat['AVG(evi_accomplishment)'] == null || $avg_sicat['AVG(evi_accomplishment)'] == ''){
                    $avg_sicat_val = '';
                }else{
                    $avg_sicat_val = number_format($avg_sicat['AVG(evi_accomplishment)'],'2','.',',').'%';
                }
                
            }else{
                $avg_sicat = $this->Rod_model->get_sicat_sum($ind_id);
                if($avg_sicat['SUM(evi_accomplishment)'] == null || $avg_sicat['SUM(evi_accomplishment)'] == ''){
                    $avg_sicat_val = '';
                }else{
                    $avg_sicat_val = $avg_sicat['SUM(evi_accomplishment)'];
                }
            }
//------------------Get accomplishment of SICAT

//------------------Get accomplishment of SICAT
            if($row['is_percentage'] == 1){
                $avg_nvpi = $this->Rod_model->get_nvpi_percentage($ind_id);
                if($avg_nvpi['AVG(evi_accomplishment)'] == null || $avg_nvpi['AVG(evi_accomplishment)'] == ''){
                    $avg_nvpi_val = '';
                }else{
                    $avg_nvpi_val = number_format($avg_nvpi['AVG(evi_accomplishment)'],'2','.',',').'%';
                }
                
            }else{
                $avg_nvpi = $this->Rod_model->get_nvpi_sum($ind_id);
                if($avg_nvpi['SUM(evi_accomplishment)'] == null || $avg_nvpi['SUM(evi_accomplishment)'] == ''){
                    $avg_nvpi_val = '';
                }else{
                    $avg_nvpi_val = $avg_nvpi['SUM(evi_accomplishment)'];
                }
            }
//------------------Get accomplishment of SICAT

//------------------Get accomplishment of PTC Batanes
            if($row['is_percentage'] == 1){
                $avg_ptc_batanes = $this->Rod_model->get_ptc_batanes_percentage($ind_id);
                if($avg_ptc_batanes['AVG(evi_accomplishment)'] == null || $avg_ptc_batanes['AVG(evi_accomplishment)'] == ''){
                    $avg_ptc_batanes_val = '';
                }else{
                    $avg_ptc_batanes_val = number_format($avg_ptc_batanes['AVG(evi_accomplishment)'],'2','.',',').'%';
                }
                
            }else{
                $avg_ptc_batanes = $this->Rod_model->get_ptc_batanes_sum($ind_id);
                if($avg_ptc_batanes['SUM(evi_accomplishment)'] == null || $avg_ptc_batanes['SUM(evi_accomplishment)'] == ''){
                    $avg_ptc_batanes_val = '';
                }else{
                    $avg_ptc_batanes_val = $avg_ptc_batanes['SUM(evi_accomplishment)'];
                }
            }
//------------------Get accomplishment of PTC Batanes

//------------------Get accomplishment of PTC Cagayan
                if($row['is_percentage'] == 1){
                    $avg_ptc_cagayan = $this->Rod_model->get_ptc_cagayan_percentage($ind_id);
                    if($avg_ptc_cagayan['AVG(evi_accomplishment)'] == null || $avg_ptc_cagayan['AVG(evi_accomplishment)'] == ''){
                        $avg_ptc_cagayan_val = '';
                    }else{
                        $avg_ptc_cagayan_val = number_format($avg_ptc_cagayan['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_ptc_cagayan = $this->Rod_model->get_ptc_cagayan_sum($ind_id);
                    if($avg_ptc_cagayan['SUM(evi_accomplishment)'] == null || $avg_ptc_cagayan['SUM(evi_accomplishment)'] == ''){
                        $avg_ptc_cagayan_val = '';
                    }else{
                        $avg_ptc_cagayan_val = $avg_ptc_cagayan['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of PTC Cagayan

//------------------Get accomplishment of PTC ISABELA
                if($row['is_percentage'] == 1){
                    $avg_ptc_isabela = $this->Rod_model->get_ptc_isabela_percentage($ind_id);
                    if($avg_ptc_isabela['AVG(evi_accomplishment)'] == null || $avg_ptc_isabela['AVG(evi_accomplishment)'] == ''){
                        $avg_ptc_isabela_val = '';
                    }else{
                        $avg_ptc_isabela_val = number_format($avg_ptc_isabela['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_ptc_isabela = $this->Rod_model->get_ptc_isabela_sum($ind_id);
                    if($avg_ptc_isabela['SUM(evi_accomplishment)'] == null || $avg_ptc_isabela['SUM(evi_accomplishment)'] == ''){
                        $avg_ptc_isabela_val = '';
                    }else{
                        $avg_ptc_isabela_val = $avg_ptc_isabela['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of PTC ISABELA

//------------------Get accomplishment of PTC NV
                if($row['is_percentage'] == 1){
                    $avg_ptc_nv = $this->Rod_model->get_ptc_nv_percentage($ind_id);
                    if($avg_ptc_nv['AVG(evi_accomplishment)'] == null || $avg_ptc_nv['AVG(evi_accomplishment)'] == ''){
                        $avg_ptc_nv_val = '';
                    }else{
                        $avg_ptc_nv_val = number_format($avg_ptc_nv['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_ptc_nv = $this->Rod_model->get_ptc_nv_sum($ind_id);
                    if($avg_ptc_nv['SUM(evi_accomplishment)'] == null || $avg_ptc_nv['SUM(evi_accomplishment)'] == ''){
                        $avg_ptc_nv_val = '';
                    }else{
                        $avg_ptc_nv_val = $avg_ptc_nv['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of PTC NV

//------------------Get accomplishment of PTC NV
                if($row['is_percentage'] == 1){
                    $avg_ptc_quirino = $this->Rod_model->get_ptc_quirino_percentage($ind_id);
                    if($avg_ptc_quirino['AVG(evi_accomplishment)'] == null || $avg_ptc_quirino['AVG(evi_accomplishment)'] == ''){
                        $avg_ptc_quirino_val = '';
                    }else{
                        $avg_ptc_quirino_val = number_format($avg_ptc_quirino['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_ptc_quirino = $this->Rod_model->get_ptc_quirino_sum($ind_id);
                    if($avg_ptc_quirino['SUM(evi_accomplishment)'] == null || $avg_ptc_quirino['SUM(evi_accomplishment)'] == ''){
                        $avg_ptc_quirino_val = '';
                    }else{
                        $avg_ptc_quirino_val = $avg_ptc_quirino['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of PTC NV

//------------------Get accomplishment of First Semester
                if($row['is_percentage'] == 1){
                    $avg_fstsem = $this->Rod_model->get_fstsem_percentage($ind_id);
                    if($avg_fstsem['AVG(evi_accomplishment)'] == null || $avg_fstsem['AVG(evi_accomplishment)'] == ''){
                        $avg_fstsem_val = '';
                    }else{
                        $avg_fstsem_val = number_format($avg_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_fstsem = $this->Rod_model->get_fstsem_sum($ind_id);
                    if($avg_fstsem['SUM(evi_accomplishment)'] == null || $avg_fstsem['SUM(evi_accomplishment)'] == ''){
                        $avg_fstsem_val = '';
                    }else{
                        $avg_fstsem_val = $avg_fstsem['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of  First Semester

//------------------Get accomplishment of Second Semester
                if($row['is_percentage'] == 1){
                    $avg_sndsem = $this->Rod_model->get_sndsem_percentage($ind_id);
                    if($avg_sndsem['AVG(evi_accomplishment)'] == null || $avg_sndsem['AVG(evi_accomplishment)'] == ''){
                        $avg_sndsem_val = '';
                    }else{
                        $avg_sndsem_val = number_format($avg_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_sndsem = $this->Rod_model->get_sndsem_sum($ind_id);
                    if($avg_sndsem['SUM(evi_accomplishment)'] == null || $avg_sndsem['SUM(evi_accomplishment)'] == ''){
                        $avg_sndsem_val = '';
                    }else{
                        $avg_sndsem_val = $avg_sndsem['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of  Second Semester

//------------------Get accomplishment of Total
                if($row['is_percentage'] == 1){
                    $avg_total = $this->Rod_model->get_total_percentage($ind_id);
                    if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                        $avg_total_val = '';
                    }else{
                        $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                    }
                    
                }else{
                    $avg_total = $this->Rod_model->get_total_sum($ind_id);
                    if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                        $avg_total_val = '';
                    }else{
                        $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                    }
                }
//------------------Get accomplishment of Total

                $summary_ind[] = array(
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],
                    'ind_target' => $row['ind_target'],
                    'avg_ro' => $avg_ro_val,
                    'avg_po_batanes' => $avg_po_batanes_val,
                    'avg_po_cagayan' => $avg_po_cagayan_val,
                    'avg_po_isabela' => $avg_po_isabela_val,
                    'avg_po_nv' => $avg_po_nv_val,
                    'avg_po_quirino' => $avg_po_quirino_val,
                    'avg_rtc' => $avg_rtc_val,
                    'avg_api' => $avg_api_val,
                    'avg_lit' => $avg_lit_val,
                    'avg_isat' => $avg_isat_val,
                    'avg_sicat' => $avg_sicat_val,
                    'avg_nvpi' => $avg_nvpi_val,
                    'avg_ptc_batanes' => $avg_ptc_batanes_val,
                    'avg_ptc_cagayan' => $avg_ptc_cagayan_val,
                    'avg_ptc_isabela' => $avg_ptc_isabela_val,
                    'avg_ptc_nv' => $avg_ptc_nv_val,
                    'avg_ptc_quirino' => $avg_ptc_quirino_val,
                    'avg_fstsem' => $avg_fstsem_val,
                    'avg_sndsem' => $avg_sndsem_val,
                    'avg_total' => $avg_total_val,
                    'ind_year' => $ind_year1,
                    'is_percentage' => $row['is_percentage']
                );
            }

            echo json_encode($summary_ind);
        } 
    }

//PO batanes
    public function get_pmr_pobatanes($param){
        if($this->session->logged_in){
            $explode = explode('-', $param);
            $year = $explode[0];
            $ous_target_1 = $explode[1];
            //$ous_desc = 'PO Batanes';
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $array = array();
            
            foreach($data as $row){ 
                //First Quarter
                $firstquater_q_val = 0;
                $firstquater_e_val = 0;
                $firstquater_t_val = 0;
                $firstquater_q = 0;
                $firstquater_count = 0;
                $firstquater_e = 0;
                $firstquater_count_e = 0;
                $firstquater_t = 0;
                $firstquater_count_t = 0;

                //Second Quarter
                $secondquater_q_val = 0;
                $secondquater_e_val = 0;
                $secondquater_t_val = 0;
                $secondquater_q = 0;
                $secondquater_count = 0;
                $secondquater_e = 0;
                $secondquater_count_e = 0;
                $secondquater_t = 0;
                $secondquater_count_t = 0;

                //First Semester
                $firstsemester_q_val = 0;
                $firstsemester_e_val = 0;
                $firstsemester_t_val = 0;
                $firstsemester_q = 0;
                $firstsemester_count = 0;
                $firstsemester_e = 0;
                $firstsemester_count_e = 0;
                $firstsemester_t = 0;
                $firstsemester_count_t = 0;

                //Third Quarter
                $thirdquater_q_val = 0;
                $thirdquater_e_val = 0;
                $thirdquater_t_val = 0;
                $thirdquater_q = 0;
                $thirdquater_count = 0;
                $thirdquater_e = 0;
                $thirdquater_count_e = 0;
                $thirdquater_t = 0;
                $thirdquater_count_t = 0;

                //Fourt Quarter
                $fourthquater_q_val = 0;
                $fourthquater_e_val = 0;
                $fourthquater_t_val = 0;
                $fourthquater_q = 0;
                $fourthquater_count = 0;
                $fourthquater_e = 0;
                $fourthquater_count_e = 0;
                $fourthquater_t = 0;
                $fourthquater_count_t = 0;
                

                $ind_id = $row['ind_id'];
                $ind_year1 = $row['ind_year'];

//--------------Accomplishment
                if($ous_target_1 == 'ro_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_ro_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_ro_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }
                }elseif($ous_target_1 == 'po_batanes_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_po_batanes_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_po_batanes_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_cagayan_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_po_cagayan_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_po_cagayan_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_po_isabela_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_po_isabela_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_nv_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_po_nv_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_po_nv_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_quirino_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_po_quirino_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_po_quirino_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'rtc_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_rtc_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_rtc_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'api_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_api_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_api_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'lit_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_lit_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_lit_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'isat_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_isat_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_isat_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'sicat_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_sicat_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_sicat_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'nvpi_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_nvpi_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_nvpi_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_batanes_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_ptc_batanes_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_ptc_batanes_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_cagayan_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_ptc_cagayan_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_ptc_cagayan_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_ptc_isabela_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_ptc_isabela_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_nv_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_ptc_nv_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_ptc_nv_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_quirino_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total = $this->Rod_model->get_ptc_quirino_percentage($ind_id);
                        if($avg_total['AVG(evi_accomplishment)'] == null || $avg_total['AVG(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = number_format($avg_total['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total = $this->Rod_model->get_ptc_quirino_sum($ind_id);
                        if($avg_total['SUM(evi_accomplishment)'] == null || $avg_total['SUM(evi_accomplishment)'] == ''){
                            $avg_total_val = '';
                        }else{
                            $avg_total_val = $avg_total['SUM(evi_accomplishment)'];
                        }
                    }    
                }
//--------------Accomplishment

//--------------1st Semester
                if($ous_target_1 == 'ro_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_ro_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_ro_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }
                }elseif($ous_target_1 == 'po_batanes_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_po_batanes_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_po_batanes_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_cagayan_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_po_cagayan_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_po_cagayan_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_po_isabela_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_po_isabela_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_nv_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_po_nv_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_po_nv_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_quirino_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_po_quirino_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_po_quirino_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'rtc_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_rtc_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_toavg_total_fstsem = $this->Rod_model->get_rtc_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'api_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_api_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_api_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'lit_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_lit_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_lit_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'isat_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_isat_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_isat_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'sicat_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_sicat_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_sicat_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'nvpi_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_nvpi_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_nvpi_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_batanes_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_ptc_batanes_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_ptc_batanes_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_cagayan_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_ptc_cagayan_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_ptc_cagayan_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_ptc_isabela_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_ptc_isabela_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_nv_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_ptc_nv_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_ptc_nv_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_quirino_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_fstsem = $this->Rod_model->get_ptc_quirino_percentage_fstsem($ind_id);
                        if($avg_total_fstsem['AVG(evi_accomplishment)'] == null || $avg_total_fstsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = number_format($avg_total_fstsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_fstsem = $this->Rod_model->get_ptc_quirino_sum_fstsem($ind_id);
                        if($avg_total_fstsem['SUM(evi_accomplishment)'] == null || $avg_total_fstsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valfstsem = '';
                        }else{
                            $avg_total_valfstsem = $avg_total_fstsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }
//--------------1st Semester

//--------------2nd Semester
                if($ous_target_1 == 'ro_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_ro_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_ro_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }
                }elseif($ous_target_1 == 'po_batanes_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_po_batanes_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_po_batanes_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_cagayan_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_po_cagayan_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_po_cagayan_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_po_isabela_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_po_isabela_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_nv_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_po_nv_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_po_nv_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'po_quirino_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_po_quirino_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_po_quirino_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'rtc_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_rtc_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_rtc_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'api_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_api_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_api_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'lit_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_lit_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_lit_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'isat_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_isat_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_isat_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'sicat_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_sicat_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_sicat_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'nvpi_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_nvpi_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_nvpi_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_batanes_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_ptc_batanes_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_ptc_batanes_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_cagayan_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_ptc_cagayan_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_ptc_cagayan_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_isabela_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_ptc_isabela_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_ptc_isabela_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_nv_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_ptc_nv_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_ptc_nv_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }elseif($ous_target_1 == 'ptc_quirino_target'){
                    if($row['is_percentage'] == 1){
                        $avg_total_sndsem = $this->Rod_model->get_ptc_quirino_percentage_sndsem($ind_id);
                        if($avg_total_sndsem['AVG(evi_accomplishment)'] == null || $avg_total_sndsem['AVG(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = number_format($avg_total_sndsem['AVG(evi_accomplishment)'],'2','.',',').'%';
                        }
                        
                    }else{
                        $avg_total_sndsem = $this->Rod_model->get_ptc_quirino_sum_sndsem($ind_id);
                        if($avg_total_sndsem['SUM(evi_accomplishment)'] == null || $avg_total_sndsem['SUM(evi_accomplishment)'] == ''){
                            $avg_total_valsndsem = '';
                        }else{
                            $avg_total_valsndsem = $avg_total_sndsem['SUM(evi_accomplishment)'];
                        }
                    }    
                }
//--------------2nd Semester

//Loop Data per month

//-------------Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, $ous_target_1);
                $January_Accomplishment = $data1['evi_accomplishment'];
                $January_Filename = $data1['evi_filename'];
                $January_Target = $data1['evi_submitted'];
                $January_Submitted = $data1['usr_id'];
                $January_ID = $data1['evi_id'];

                $January_q = $data1['evi_q'];
                $January_e = $data1['evi_e'];
                $January_t = $data1['evi_t'];
                $January_remarks = $data1['evi_results'];

                $ind_jan = $row['ind_jan'];

                //quality
                if($January_q == null || $January_q == ""){
                }else{
                    $firstquater_q = $firstquater_q + $January_q;  
                    $firstquater_count = $firstquater_count + 1;

                    $firstsemester_q = $firstsemester_q + $January_q;  
                    $firstsemester_count = $firstsemester_count + 1;
                }

                //efficiency
                if($January_e == null || $January_e == ""){}else{
                    $firstquater_e = $firstquater_e + $January_e;  
                    $firstquater_count_e = $firstquater_count_e + 1;

                    $firstsemester_e = $firstsemester_e + $January_q;  
                    $firstsemester_count_e = $firstsemester_count_e + 1;
                    
                }

                //Timeliness
                if($January_t == null || $January_t == ""){}else{
                    $firstquater_t = $firstquater_t + $January_t;  
                    $firstquater_count_t = $firstquater_count_t + 1;

                    $firstsemester_t = $firstsemester_t + $January_t;  
                    $firstsemester_count_t = $firstsemester_count_t + 1;
                }
//-------------Janaury

//-------------February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, $ous_target_1);
                $February_Accomplishment = $data1['evi_accomplishment'];
                $February_Filename = $data1['evi_filename'];
                $February_Target = $data1['evi_submitted'];
                $February_Submitted = $data1['usr_id'];
                $February_ID = $data1['evi_id'];

                $February_q = $data1['evi_q'];
                $February_e = $data1['evi_e'];
                $February_t = $data1['evi_t'];
                $February_remarks = $data1['evi_results'];

                $ind_feb = $row['ind_feb'];

                if($February_q == null || $February_q == ""){
                }else{
                    $firstquater_q = $firstquater_q + $February_q;  
                    $firstquater_count = $firstquater_count + 1;

                    $firstsemester_q = $firstsemester_q + $February_q;  
                    $firstsemester_count = $firstsemester_count + 1;
                }

                //efficiency
                if($February_e == null || $February_e == ""){}else{
                    $firstquater_e = $firstquater_e + $February_e;  
                    $firstquater_count_e = $firstquater_count_e + 1;

                    $firstsemester_e = $firstsemester_e + $February_e;  
                    $firstsemester_count_e = $firstsemester_count_e + 1;
                }

                //Timeliness
                if($February_t == null || $February_t == ""){}else{
                    $firstquater_t = $firstquater_t + $February_t;  
                    $firstquater_count_t = $firstquater_count_t + 1;

                    $firstsemester_t = $firstsemester_t + $February_t;  
                    $firstsemester_count_t = $firstsemester_count_t + 1;
                }
//-------------February

//-------------March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, $ous_target_1);
                $March_Accomplishment = $data1['evi_accomplishment'];
                $March_Filename = $data1['evi_filename'];
                $March_Target = $data1['evi_submitted'];
                $March_Submitted = $data1['usr_id'];
                $March_ID = $data1['evi_id'];

                $March_q = $data1['evi_q'];
                $March_e = $data1['evi_e'];
                $March_t = $data1['evi_t'];
                $March_remarks = $data1['evi_results'];

                $ind_mar = $row['ind_mar'];

                //quality
                if($March_q == null || $March_q == ""){
                }else{
                    $firstquater_q = $firstquater_q + $March_q;  
                    $firstquater_count = $firstquater_count + 1;

                    $firstsemester_q = $firstsemester_q + $March_q;  
                    $firstsemester_count = $firstsemester_count + 1;

                    $firstsemester_e = $firstsemester_e + $March_q;  
                    $firstsemester_count_e = $firstsemester_count_e + 1;
                }

                //efficiency
                if($March_e == null || $March_e == ""){}else{
                    $firstquater_e = $firstquater_e + $March_e;  
                    $firstquater_count_e = $firstquater_count_e + 1;
                }

                //Timeliness
                if($March_t == null || $March_t == ""){}else{
                    $firstquater_t = $firstquater_t + $March_t;  
                    $firstquater_count_t = $firstquater_count_t + 1;

                    $firstsemester_t = $firstsemester_t + $March_t;  
                    $firstsemester_count_t = $firstsemester_count_t + 1;
                }

                $firstquater_q_val = 0;
//-------------March

//-------------April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, $ous_target_1);
                $April_Accomplishment = $data1['evi_accomplishment'];
                $April_Filename = $data1['evi_filename'];
                $April_Target = $data1['evi_submitted'];
                $April_Submitted = $data1['usr_id'];
                $April_ID = $data1['evi_id'];

                $April_q = $data1['evi_q'];
                $April_e = $data1['evi_e'];
                $April_t = $data1['evi_t'];
                $April_remarks = $data1['evi_results'];

                $ind_apr = $row['ind_apr'];

                //quality
                if($April_q == null || $April_q == ""){}else{
                    $secondquater_q = $secondquater_q + $April_q;  
                    $secondquater_count = $secondquater_count + 1;

                    $firstsemester_q = $firstsemester_q + $April_q;  
                    $firstsemester_count = $firstsemester_count + 1;
                }

                //efficiency
                if($April_e == null || $April_e == ""){}else{
                    $secondquater_e = $secondquater_e + $April_e;  
                    $secondquater_count_e = $secondquater_count_e + 1;

                    $firstsemester_e = $firstsemester_e + $April_e;  
                    $firstsemester_count_e = $firstsemester_count_e + 1;
                }

                //Timeliness
                if($April_t == null || $April_t == ""){}else{
                    $secondquater_t = $secondquater_t + $April_t;  
                    $secondquater_count_t = $secondquater_count_t + 1;

                    $firstsemester_t = $firstsemester_t + $April_t;  
                    $firstsemester_count_t = $firstsemester_count_t + 1;
                }
//-------------April

//-------------May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, $ous_target_1);
                $May_Accomplishment = $data1['evi_accomplishment'];
                $May_Filename = $data1['evi_filename'];
                $May_Target = $data1['evi_submitted'];
                $May_Submitted = $data1['usr_id'];
                $May_ID = $data1['evi_id'];

                $May_q = $data1['evi_q'];
                $May_e = $data1['evi_e'];
                $May_t = $data1['evi_t'];
                $May_remarks = $data1['evi_results'];

                $ind_may = $row['ind_may'];

                //quality
                if($May_q == null || $May_q == ""){}else{
                    $secondquater_q = $secondquater_q + $May_q;  
                    $secondquater_count = $secondquater_count + 1;

                    $firstsemester_q = $firstsemester_q + $May_q;  
                    $firstsemester_count = $firstsemester_count + 1;
                }

                //efficiency
                if($May_e == null || $May_e == ""){}else{
                    $secondquater_e = $secondquater_e + $May_e;  
                    $secondquater_count_e = $secondquater_count_e + 1;

                    $firstsemester_e = $firstsemester_e + $May_e;  
                    $firstsemester_count_e = $firstsemester_count_e + 1;
                }

                //Timeliness
                if($May_t == null || $May_t == ""){}else{
                    $secondquater_t = $secondquater_t + $May_t;  
                    $secondquater_count_t = $secondquater_count_t + 1;

                    $firstsemester_t = $firstsemester_t + $May_t;  
                    $firstsemester_count_t = $firstsemester_count_t + 1;
                }
//-------------May

//-------------June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, $ous_target_1);
                $June_Accomplishment = $data1['evi_accomplishment'];
                $June_Filename = $data1['evi_filename'];
                $June_Target = $data1['evi_submitted'];
                $June_Submitted = $data1['usr_id'];
                $June_ID = $data1['evi_id'];

                $June_q = $data1['evi_q'];
                $June_e = $data1['evi_e'];
                $June_t = $data1['evi_t'];
                $June_remarks = $data1['evi_results'];

                $ind_jun = $row['ind_jun'];

                //quality
                if($June_q == null || $June_q == ""){}else{
                    $secondquater_q = $secondquater_q + $June_q;  
                    $secondquater_count = $secondquater_count + 1;

                    $firstsemester_q = $firstsemester_q + $June_q;  
                    $firstsemester_count = $firstsemester_count + 1;
                }

                //efficiency
                if($June_e == null || $June_e == ""){}else{
                    $secondquater_e = $secondquater_e + $June_e;  
                    $secondquater_count_e = $secondquater_count_e + 1;

                    $firstsemester_e = $firstsemester_e + $June_e;  
                    $firstsemester_count_e = $firstsemester_count_e + 1;
                }

                //Timeliness
                if($June_t == null || $June_t == ""){}else{
                    $secondquater_t = $secondquater_t + $June_t;  
                    $secondquater_count_t = $secondquater_count_t + 1;

                    $firstsemester_t = $firstsemester_t + $June_e;  
                    $firstsemester_count_t = $firstsemester_count_t + 1;
                }
//-------------June

//-------------July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, $ous_target_1);
                $July_Accomplishment = $data1['evi_accomplishment'];
                $July_Filename = $data1['evi_filename'];
                $July_Target = $data1['evi_submitted'];
                $July_Submitted = $data1['usr_id'];
                $July_ID = $data1['evi_id'];

                $July_q = $data1['evi_q'];
                $July_e = $data1['evi_e'];
                $July_t = $data1['evi_t'];
                $July_remarks = $data1['evi_results'];

                $ind_jul = $row['ind_jul'];

                //quality
                if($July_q == null || $July_q == ""){}else{
                    $thirdquater_q = $thirdquater_q + $July_q;  
                    $thirdquater_count = $thirdquater_count + 1;
                }

                //efficiency
                if($July_e == null || $July_e == ""){}else{
                    $thirdquater_e = $thirdquater_e + $July_e;  
                    $thirdquater_count_e = $thirdquater_count_e + 1;
                }

                //Timeliness
                if($July_t == null || $July_t == ""){}else{
                    $thirdquater_t = $thirdquater_t + $July_t;  
                    $thirdquater_count_t = $thirdquater_count_t + 1;
                }
//-------------July

//-------------August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, $ous_target_1);
                $August_Accomplishment = $data1['evi_accomplishment'];
                $August_Filename = $data1['evi_filename'];
                $August_Target = $data1['evi_submitted'];
                $August_Submitted = $data1['usr_id'];
                $August_ID = $data1['evi_id'];

                $August_q = $data1['evi_q'];
                $August_e = $data1['evi_e'];
                $August_t = $data1['evi_t'];
                $August_remarks = $data1['evi_results'];

                $ind_aug = $row['ind_aug'];

                //quality
                if($August_q == null || $August_q == ""){}else{
                    $thirdquater_q = $thirdquater_q + $August_q;  
                    $thirdquater_count = $thirdquater_count + 1;
                }

                //efficiency
                if($August_e == null || $August_e == ""){}else{
                    $thirdquater_e = $thirdquater_e + $August_e;  
                    $thirdquater_count_e = $thirdquater_count_e + 1;
                }

                //Timeliness
                if($August_t == null || $August_t == ""){}else{
                    $thirdquater_t = $thirdquater_t + $August_t;  
                    $thirdquater_count_t = $thirdquater_count_t + 1;
                }
//-------------August

//-------------September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, $ous_target_1);
                $September_Accomplishment = $data1['evi_accomplishment'];
                $September_Filename = $data1['evi_filename'];
                $September_Target = $data1['evi_submitted'];
                $September_Submitted = $data1['usr_id'];
                $September_ID = $data1['evi_id'];

                $September_q = $data1['evi_q'];
                $September_e = $data1['evi_e'];
                $September_t = $data1['evi_t'];
                $September_remarks = $data1['evi_results'];

                $ind_sep = $row['ind_sep'];

                //quality
                if($September_q == null || $September_q == ""){}else{
                    $thirdquater_q = $thirdquater_q + $September_q;  
                    $thirdquater_count = $thirdquater_count + 1;
                }

                //efficiency
                if($September_e == null || $September_e == ""){}else{
                    $thirdquater_e = $thirdquater_e + $September_e;  
                    $thirdquater_count_e = $thirdquater_count_e + 1;
                }

                //Timeliness
                if($September_t == null || $September_t == ""){}else{
                    $thirdquater_t = $thirdquater_t + $September_t;  
                    $thirdquater_count_t = $thirdquater_count_t + 1;
                }
//-------------September
                
//-------------October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, $ous_target_1);
                $October_Accomplishment = $data1['evi_accomplishment'];
                $October_Filename = $data1['evi_filename'];
                $October_Target = $data1['evi_submitted'];
                $October_Submitted = $data1['usr_id'];
                $October_ID = $data1['evi_id'];

                $October_q = $data1['evi_q'];
                $October_e = $data1['evi_e'];
                $October_t = $data1['evi_t'];
                //$October_remarks = $data1['evi_results'];

                $ind_oct = $row['ind_oct'];

                //quality
                if($October_q == null || $October_q == ""){}else{
                    $fourthquater_q = $fourthquater_q + $October_q;  
                    $fourthquater_count = $fourthquater_count + 1;
                }

                //efficiency
                if($October_e == null || $October_e == ""){}else{
                    $fourthquater_e = $fourthquater_e + $October_e;  
                    $fourthquater_count_e = $fourthquater_count_e + 1;
                }

                //Timeliness
                if($October_t == null || $October_t == ""){}else{
                    $fourthquater_t = $fourthquater_t + $October_t;  
                    $fourthquater_count_t = $fourthquater_count_t + 1;
                }
//-------------October

//-------------November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, $ous_target_1);
                $November_Accomplishment = $data1['evi_accomplishment'];
                $November_Filename = $data1['evi_filename'];
                $November_Target = $data1['evi_submitted'];
                $November_Submitted = $data1['usr_id'];
                $November_ID = $data1['evi_id'];
                //$November_remarks = $data1['evi_results'];

                $November_q = $data1['evi_q'];
                $November_e = $data1['evi_e'];
                $November_t = $data1['evi_t'];

                $ind_nov = $row['ind_nov'];

                //quality
                if($November_q == null || $November_q == ""){}else{
                    $fourthquater_q = $fourthquater_q + $November_q;  
                    $fourthquater_count = $fourthquater_count + 1;
                }

                //efficiency
                if($November_e == null || $November_e == ""){}else{
                    $fourthquater_e = $fourthquater_e + $November_e;  
                    $fourthquater_count_e = $fourthquater_count_e + 1;
                }

                //Timeliness
                if($November_t == null || $November_t == ""){}else{
                    $fourthquater_t = $fourthquater_t + $November_t;  
                    $fourthquater_count_t = $fourthquater_count_t + 1;
                }
//-------------November

//-------------Decemeber
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, $ous_target_1);
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];
                $Decemebr_Filename = $data1['evi_filename'];
                $Decemebr_Target = $data1['evi_submitted'];
                $Decemebr_Submitted = $data1['usr_id'];
                $Decemebr_ID = $data1['evi_id'];

                $Decemebr_q = $data1['evi_q'];
                $Decemebr_e = $data1['evi_e'];
                $Decemebr_t = $data1['evi_t'];
                //$Decemebr_remarks = $data1['evi_results'];

                $ind_dec = $row['ind_dec'];

                //quality
                if($Decemebr_q == null || $Decemebr_q == ""){}else{
                    $fourthquater_q = $fourthquater_q + $Decemebr_q;  
                    $fourthquater_count = $fourthquater_count + 1;
                }

                //efficiency
                if($Decemebr_e == null || $Decemebr_e == ""){}else{
                    $fourthquater_e = $fourthquater_e + $Decemebr_e;  
                    $fourthquater_count_e = $fourthquater_count_e + 1;
                }

                //Timeliness
                if($Decemebr_t == null || $Decemebr_t == ""){}else{
                    $fourthquater_t = $fourthquater_t + $Decemebr_t;  
                    $fourthquater_count_t = $fourthquater_count_t + 1;
                }

                //get person incharge
                $data1 = $this->Rod_model->get_pmr_incharge($ind_id, $ous_target_1);
                $emp_incharge = $data1['usr_name'];

                //get person incharge
                $data1 = $this->Rod_model->get_pmr_incharge1($ind_id, $ous_target_1);
                $emp_incharge_jo = $data1['usr_name'];

//-------------Decemeber

//Loop Data per month
                
//-------------ARAY

                $array[] = array(
                    $ous_target_1 => $row[$ous_target_1],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'January_Filename' => $January_Filename,
                    'January_Target' => $January_Target,
                    'January_Submitted' => $January_Submitted,
                    'January_q' => $January_q,
                    'January_e' => $January_e,
                    'January_t' => $January_t,
                    'ind_jan' => $ind_jan,
                    'January_remarks' => $January_remarks,

                    'February_Accomplishment' => $February_Accomplishment,
                    'February_Filename' => $February_Filename,
                    'February_Target' => $February_Target,
                    'February_Submitted' => $February_Submitted,
                    'February_q' => $February_q,
                    'February_e' => $February_e,
                    'February_t' => $February_t,
                    'ind_feb' => $ind_feb,
                    'February_remarks' => $February_remarks,

                    'March_Accomplishment' => $March_Accomplishment,
                    'March_Filename' => $March_Filename,
                    'March_Target' => $March_Target,
                    'March_Submitted' => $March_Submitted,
                    'March_q' => $March_q,
                    'March_e' => $March_e,
                    'March_t' => $March_t,
                    'ind_mar' => $ind_mar,
                    'March_remarks' => $March_remarks,

                    'firstquater_q' => $firstquater_q,
                    'firstquater_count' => $firstquater_count,
                    'firstquater_e' => $firstquater_e,
                    'firstquater_count_e' => $firstquater_count_e,
                    'firstquater_t' => $firstquater_t,
                    'firstquater_count_t' => $firstquater_count_t,

                    'secondquater_q' => $secondquater_q,
                    'secondquater_count' => $secondquater_count,
                    'secondquater_e' => $secondquater_e,
                    'secondquater_count_e' => $secondquater_count_e,
                    'secondquater_t' => $secondquater_t,
                    'secondquater_count_t' => $secondquater_count_t,

                    'firstsemester_q' => $firstsemester_q,
                    'firstsemester_count' => $firstsemester_count,
                    'firstsemester_e' => $firstsemester_e,
                    'firstsemester_count_e' => $firstsemester_count_e,
                    'firstsemester_t' => $firstsemester_t,
                    'firstsemester_count_t' => $firstsemester_count_t,

                    'thirdquater_q' => $thirdquater_q,
                    'thirdquater_count' => $thirdquater_count,
                    'thirdquater_e' => $thirdquater_e,
                    'thirdquater_count_e' => $thirdquater_count_e,
                    'thirdquater_t' => $thirdquater_t,
                    'thirdquater_count_t' => $thirdquater_count_t,

                    'fourthquater_q' => $fourthquater_q,
                    'fourthquater_count' => $fourthquater_count,
                    'fourthquater_e' => $fourthquater_e,
                    'fourthquater_count_e' => $fourthquater_count_e,
                    'fourthquater_t' => $fourthquater_t,
                    'fourthquater_count_t' => $fourthquater_count_t,

                    'April_Accomplishment' => $April_Accomplishment,
                    'April_Filename' => $April_Filename,
                    'April_Target' => $April_Target,
                    'April_Submitted' => $April_Submitted,

                    'April_q' => $April_q,
                    'April_e' => $April_e,
                    'April_t' => $April_t,
                    'ind_apr' => $ind_apr,
                    'April_remarks' => $April_remarks,

                    'May_Accomplishment' => $May_Accomplishment,
                    'May_Filename' => $May_Filename,
                    'May_Target' => $May_Target,
                    'May_Submitted' => $May_Submitted,

                    'May_q' => $May_q,
                    'May_e' => $May_e,
                    'May_t' => $May_t,
                    'ind_may' => $ind_may,
                    'May_remarks' => $May_remarks,
                    
                    'June_Accomplishment' => $June_Accomplishment,
                    'June_Filename' => $June_Filename,
                    'June_Target' => $June_Target,
                    'June_Submitted' => $June_Submitted,

                    'June_q' => $June_q,
                    'June_e' => $June_e,
                    'June_t' => $June_t,
                    'ind_jun' => $ind_jun,
                    'June_remarks' => $June_remarks,

                    'July_Accomplishment' => $July_Accomplishment,
                    'July_Filename' => $July_Filename,
                    'July_Target' => $July_Target,
                    'July_Submitted' => $July_Submitted,

                    'July_q' => $July_q,
                    'July_e' => $July_e,
                    'July_t' => $July_t,
                    'ind_jul' => $ind_jul,
                    'July_remarks' => $July_remarks,

                    'August_Accomplishment' => $August_Accomplishment,
                    'August_Filename' => $August_Filename,
                    'August_Target' => $August_Target,
                    'August_Submitted' => $August_Submitted,

                    'August_q' => $August_q,
                    'August_e' => $August_e,
                    'August_t' => $August_t,
                    'ind_aug' => $ind_aug,
                    'August_remarks' => $August_remarks,

                    'September_Accomplishment' => $September_Accomplishment,
                    'September_Filename' => $September_Filename,
                    'September_Target' => $September_Target,
                    'September_Submitted' => $September_Submitted,

                    'September_q' => $September_q,
                    'September_e' => $September_e,
                    'September_t' => $September_t,
                    'ind_sep' => $ind_sep,
                    'September_remarks' => $September_remarks,

                    'October_Accomplishment' => $October_Accomplishment,
                    'October_Filename' => $October_Filename,
                    'October_Target' => $October_Target,
                    'October_Submitted' => $October_Submitted,

                    'October_q' => $October_q,
                    'October_e' => $October_e,
                    'October_t' => $October_t,
                    'ind_oct' => $ind_oct,
                    //'October_remarks' => $October_remarks,
                    

                    'November_Accomplishment' => $November_Accomplishment,
                    'November_Filename' => $November_Filename,
                    'November_Target' => $November_Target,
                    'November_Submitted' => $November_Submitted,

                    'November_q' => $November_q,
                    'November_e' => $November_e,
                    'November_t' => $November_t,
                    'ind_nov' => $ind_nov,
                    //'November_remarks' => $November_remarks,

                    'December_Accomplishment' => $Decemebr_Accomplishment,
                    'December_Filename' => $Decemebr_Filename,
                    'December_Target' => $Decemebr_Target,
                    'December_Submitted' => $Decemebr_Submitted,

                    'December_q' => $Decemebr_q,
                    'December_e' => $Decemebr_e,
                    'December_t' => $Decemebr_t,
                    'ind_dec' => $ind_dec,
                    //'Decemebr_remarks' => $Decemebr_remarks,

                    'January_ID' => $January_ID,
                    'February_ID' => $February_ID,
                    'March_ID' => $March_ID,
                    'April_ID' => $April_ID,
                    'May_ID' => $May_ID,
                    'June_ID' => $June_ID,
                    'July_ID' => $July_ID,
                    'August_ID' => $August_ID,
                    'October_ID' => $October_ID,
                    'September_ID' => $September_ID,
                    'October_ID' => $October_ID,
                    'November_ID' => $November_ID,
                    'December_ID' => $Decemebr_ID,
                    'emp_incharge' => $emp_incharge,
                    'emp_incharge_jo' => $emp_incharge_jo,
                    'avg_total' => $avg_total_val,
                    'avg_total_valfstsem' => $avg_total_valfstsem,
                    'avg_total_valsndsem' => $avg_total_valsndsem,
                    'ind_year' => $ind_year1
                    
                );
            }

//-------------ARRAY

            echo json_encode($array);
        } 
    }
//PO batanes

    public function update_target_id(){ 
        if($this->session->logged_in){
            if(!empty($_FILES['edit_target_attachment']['name'])){
                //get indicator ID 
                $ind_id = $this->input->post('ind_id');
                // Set preference
                $config['upload_path'] ='uploads/evidence/';
                $config['allowed_types'] = 'pdf';
                $config['max_size']    = '512000';    // max_size in kb
                $config['file_name'] = $_FILES['edit_target_attachment']['name'];
                
                $upload_path = $config['upload_path'] ='uploads/evidence/'.$ind_id;

                if (!is_dir($upload_path)) {
                    // Create the directory
                    mkdir($upload_path, 0777, true);
                    // specify the name of the PHP file to be copied
                    $file_name = 'index.php';

                    // specify the path to the folder where the PHP file is located
                    $source_folder_path = $config['upload_path'] ='uploads/evidence/';

                    // specify the path to the folder where the copied PHP file should be placed
                    $destination_folder_path = $upload_path;

                    // combine the source folder path and file name to create the full source file path
                    $source_file_path = $source_folder_path . '/' . $file_name;

                    // combine the destination folder path and file name to create the full destination file path
                    $destination_file_path = $destination_folder_path . '/' . $file_name;

                    // copy the PHP file from the source folder to the destination folder
                    copy($source_file_path, $destination_file_path);
                    
                    //set upload path
                    $config['upload_path'] ='uploads/evidence/'.$ind_id;
                }else{
                    //set upload path
                    $config['upload_path'] ='uploads/evidence/'.$ind_id;    
                }
                    
                //Load upload library
                $this->load->library('upload', $config);         
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];

                // File upload
                if($this->upload->do_upload('edit_target_attachment')){  
                    //Load upload library
                    $this->load->library('upload', $config);         
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];  
                    //insert File
                    $status = $this->Rod_model->update_target_id($filename);    
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
            }else{
                if($this->input->post('edit_filename') == null || $this->input->post('edit_filename') == ""){
                    $filename = "";
                }else{
                    $filename = $this->input->post('edit_filename');
                }
               
                $status = $this->Rod_model->update_target_id($filename);    
                $result = array(
                    'status' => 'True',
                    'error' => 'Updated Successfully.'
                    );

                echo json_encode($result);
            }
        }
    }

    public function rate_target_id(){
        if($this->session->logged_in){
            if($this->input->post('rate_target_id') == ""){
                $result = array(
                    'status' => 'False',
                    'error' => 'Server Error'
                    );
                echo json_encode($result);
            }
            else{
                $status = $this->Rod_model->rate_target_id();   
                if($status){    
                    $result = array(
                        'status' => 'True',
                        'error' => 'Updated Successfully.'
                        );
    
                    echo json_encode($result);
                }else{
                    $result = array(
                        'status' => 'False',
                        'error' => 'Server Error'
                        );
                    echo json_encode($result);
                } 
            }
        }       
    }

    public function edit_target_ous_id(){
        if($this->session->logged_in){
            $status = $this->Rod_model->edit_target_ous_id();   
            if($status){    
                $result = array(
                    'status' => 'True',
                    'error' => 'Updated Successfully.'
                    );

                echo json_encode($result);
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => 'Server Error'
                    );
                echo json_encode($result);
            } 
        }       
    }

    function performance_monitorin_report_system_notification(){

        //get all operating email address
        
        //get all assigned employees

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
            
        $mail->setFrom('region2.primehrm@tesda.gov.ph', 'TDiS | Notification');
         
         // Add a recipient
        $data = $this->Rod_model->get_operating_emails();
        //get all operating email address
        foreach($data as $row){
            $mail->addAddress($row['ous_email']);
        }

        //get all MIS Focal email address
        foreach($data as $row){
            $mail->addAddress($row['ous_mis_focal']);
        }

        //get all MIS Focal email address
        foreach($data as $row){
            $mail->addAddress($row['ous_head_email']);
        }
       
         
         // Add cc or bcc 
         //$mail->addCC();
         //$mail->addBCC('bcc@example.com');
         
         // Email subject
         $mail->Subject =  'Deadline approaching - Update your accomplishments in PMRS';
         
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
                                    M E M O R A N D U M <br>
                                    ------------------------------------------<br>
                                    No.____ s. ". date('Y') ."
                                    
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
                                    ATTN&ensp;&nbsp;&emsp;&emsp;: <b>MIS FOCAL </b>
                                    <br><br>
                                    FROM&ensp;&nbsp;&emsp;&emsp;: <b>The Regional Director</b><br> 
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; <em>This Region</em>
                                    <br><br>
                                    DATE&ensp;&nbsp;&emsp;&emsp;&nbsp;: <b>". date('F j, Y') ."</b> 
                                    <br><br>
                                    SUBJECT&emsp;: <b>Deadline approaching - Update your accomplishments in Performance Monitoring System (PMRS)</b> 
                                    <br><br>
                                    <hr>
                                    <br>
                                    This is a friendly reminder to <b>update your accomplishments</b> in the Performance Monitoring System (PMRS).
                                    <br>
                                    Thank you for your cooperation and timely action in this matter.
                                    <br>------<br>
                                    <b>TESDA DOS ICTU TEAM</b>

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
                                        <center>This email was sent to&nbsp;.  © 2021 TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
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

    public function get_employees_plantilla_1(){
        if($this->session->logged_in){
            $data = $this->Rod_model->get_employees_plantilla_1();
            echo json_encode($data);
        } 
    }

    public function get_employees_plantilla_2(){
        if($this->session->logged_in){
            $data = $this->Rod_model->get_employees_plantilla_2();
            echo json_encode($data);
        } 
    }

    public function send_os(){
        
        //get training details
        $training['training'] = $this->Posts_model->get_inv_trn_details($inv_trn_id);
        $title1 = $training['training']['trn_title'];
        $date_from = $training['training']['trn_from_date'];
        $date_to = $training['training']['trn_to_date'];

        $title="TDIS | Notification";
        //Get User's Name   
        //$data = $this->Posts_model->get_accounts_onesignal_emp($os_user_id);

        //foreach( $data as $row){
            //$name = $row['usr_name'];
            //$message="Hi, ".$name."! This is to inform you that you have a scheduled training on ".date('F y, Y', strtotime($date_from))." - ".date('F y, Y', strtotime($date_to))." re: ".$title1.". Thank you. - System Administrator";
        //}

        $result = $this->sendMessageOne();
        if($result){
            return true;
        }
    }

    function sendMessageOne(){
        $content = array(
            "en" => 'Deadline on updating of accomplishment in the Performance Monitoring System (PMRS)'
            );

        $heading = array(
            "en" => 'TDIS | Notification'
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

    public function edit_access_form(){
        if($this->session->logged_in){
            $status = $this->Rod_model->edit_access_form();   
            if($status){    
                $result = array(
                    'status' => 'True',
                    'error' => 'Updated Successfully.'
                    );
                echo json_encode($result);
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => 'Server Error'
                    );
                echo json_encode($result);
            } 
        }       
    }

    public function opcr_output() {
        
        $page = 'opcr_output';

         //Personal Information
  

        if(!file_exists(APPPATH.'views/pages/rod/' .$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/rod/'.$page);   
        }
    }

    public function opcr_target() {
        
        $page = 'opcr_target';
        

        if(!file_exists(APPPATH.'views/pages/rod/'.$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/rod/'.$page);   
        }
    }

    public function monitoring(){

        $page = 'monitoring';

        if(!file_exists(APPPATH.'views/pages/rod/' .$page.'.php')){
            show_404();
        }else{
            $data['po_batanes_target_o'] = $this->Rod_model->po_batanes_target_o();
            $data['po_cagayan_target_o'] = $this->Rod_model->po_cagayan_target_o();
            $data['po_isabela_target_o'] = $this->Rod_model->po_isabela_target_o();
            $data['po_quirino_target_o'] = $this->Rod_model->po_quirino_target_o();
            $data['po_nv_target_o'] = $this->Rod_model->po_nv_target_o();
            $this->load->view('pages/rod/'.$page, $data);

        }
    }

    //-----------------------UPDATE-----------------------
    public function del_target_id(){
        if($this->session->logged_in){
            $status = $this->Rod_model->del_target_id();   
            if($status){    
                $result = array(
                    'status' => 'True',
                    'error' => 'Deleted Successfully.'
                    );
                echo json_encode($result);
            }else{
                $result = array(
                    'status' => 'False',
                    'error' => 'Server Error'
                    );
                echo json_encode($result);
            } 
        }       
    }

    public function table($param) {
        
        $page = 'opcr-table';
        $explode = explode('-',$param);
        $year = $explode[1];
        $table = $explode[0];

        //Summary
            $summary = $this->Rod_model->get_pmr_pobatanes($year);
        //Summary

        //ro_target
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $ro_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "ro_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "ro_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "ro_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "ro_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "ro_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "ro_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "ro_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "ro_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "ro_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "ro_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "ro_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "ro_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $ro_target[] = array(
                    'ous_target' => $row['ro_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        //ro_target
            
        //po_batanes_target
        if($table == 'po_batanes_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $po_batanes_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "po_batanes_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "po_batanes_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "po_batanes_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "po_batanes_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "po_batanes_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "po_batanes_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "po_batanes_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "po_batanes_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "po_batanes_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "po_batanes_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "po_batanes_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "po_batanes_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $po_batanes_target[] = array(
                    'ous_target' => $row['po_batanes_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //po_batanes_target

        //ptc_batanes_target
        if($table == 'ptc_batanes_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $ptc_batanes_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "ptc_batanes_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "ptc_batanes_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "ptc_batanes_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "ptc_batanes_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "ptc_batanes_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "ptc_batanes_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "ptc_batanes_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "ptc_batanes_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "ptc_batanes_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "ptc_batanes_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "ptc_batanes_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "ptc_batanes_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $ptc_batanes_target[] = array(
                    'ous_target' => $row['ptc_batanes_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //ptc_batanes_target

        //po_cagayan_target
        if($table == 'po_cagayan_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $po_cagayan_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "po_cagayan_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "po_cagayan_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "po_cagayan_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "po_cagayan_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "po_cagayan_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "po_cagayan_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "po_cagayan_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "po_cagayan_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "po_cagayan_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "po_cagayan_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "po_cagayan_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "po_cagayan_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $po_cagayan_target[] = array(
                    'ous_target' => $row['po_cagayan_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //po_cagayan_target

        //ptc_cagayan_target
        if($table == 'ptc_cagayan_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $ptc_cagayan_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "ptc_cagayan_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "ptc_cagayan_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "ptc_cagayan_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "ptc_cagayan_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "ptc_cagayan_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "ptc_cagayan_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "ptc_cagayan_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "ptc_cagayan_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "ptc_cagayan_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "ptc_cagayan_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "ptc_cagayan_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "ptc_cagayan_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $ptc_cagayan_target[] = array(
                    'ous_target' => $row['po_cagayan_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //ptc_cagayan_target

        //api_target
        if($table == 'api_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $api_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "api_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "api_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "api_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "api_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "api_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "api_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "api_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "api_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "api_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "api_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "api_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "api_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $api_target[] = array(
                    'ous_target' => $row['api_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //api_target

        //lit_target
        if($table == 'lit_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $lit_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "lit_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "lit_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "lit_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "lit_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "lit_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "lit_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "lit_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "lit_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "lit_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "lit_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "lit_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "lit_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $lit_target[] = array(
                    'ous_target' => $row['lit_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //lit_target

        //rtc_target
        if($table == 'rtc_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $rtc_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "rtc_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "rtc_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "rtc_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "rtc_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "rtc_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "rtc_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "rtc_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "rtc_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "rtc_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "rtc_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "rtc_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "rtc_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $rtc_target[] = array(
                    'ous_target' => $row['rtc_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //rtc_target

        //po_isabela_target
        if($table == 'po_isabela_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $po_isabela_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "po_isabela_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "po_isabela_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "po_isabela_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "po_isabela_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "po_isabela_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "po_isabela_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "po_isabela_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "po_isabela_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "po_isabela_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "po_isabela_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "po_isabela_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "po_isabela_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $po_isabela_target[] = array(
                    'ous_target' => $row['po_isabela_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //po_isabela_target

        //ptc_isabela_target
        if($table == 'ptc_isabela_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $ptc_isabela_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "ptc_isabela_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "ptc_isabela_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "ptc_isabela_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "ptc_isabela_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "ptc_isabela_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "ptc_isabela_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "ptc_isabela_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "ptc_isabela_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "ptc_isabela_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "ptc_isabela_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "ptc_isabela_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "ptc_isabela_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $ptc_isabela_target[] = array(
                    'ous_target' => $row['ptc_isabela_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //ptc_isabela_target

        //isat_isabela_target
        if($table == 'isat_isabela_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $isat_isabela_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "isat_isabela_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "isat_isabela_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "isat_isabela_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "isat_isabela_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "isat_isabela_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "isat_isabela_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "isat_isabela_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "isat_isabela_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "isat_isabela_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "isat_isabela_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "isat_isabela_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "isat_isabela_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $isat_isabela_target[] = array(
                    'ous_target' => $row['isat_isabela_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //isat_isabela_target

        //sicat_isabela_target
        if($table == 'sicat_isabela_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $sicat_isabela_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "sicat_isabela_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "sicat_isabela_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "sicat_isabela_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "sicat_isabela_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "sicat_isabela_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "sicat_isabela_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "sicat_isabela_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "sicat_isabela_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "sicat_isabela_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "sicat_isabela_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "sicat_isabela_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "sicat_isabela_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $sicat_isabela_target[] = array(
                    'ous_target' => $row['sicat_isabela_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //sicat_isabela_target

        //po_nv_target
        if($table == 'po_nv_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $po_nv_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "po_nv_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "po_nv_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "po_nv_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "po_nv_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "po_nv_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "po_nv_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "po_nv_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "po_nv_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "po_nv_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "po_nv_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "po_nv_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "po_nv_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $po_nv_target[] = array(
                    'ous_target' => $row['po_nv_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //po_nv_target

        //ptc_nv_target
        if($table == 'ptc_nv_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $ptc_nv_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "ptc_nv_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "ptc_nv_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "ptc_nv_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "ptc_nv_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "ptc_nv_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "ptc_nv_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "ptc_nv_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "ptc_nv_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "ptc_nv_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "ptc_nv_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "ptc_nv_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "ptc_nv_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $ptc_nv_target[] = array(
                    'ous_target' => $row['ptc_nv_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //ptc_nv_target

        //nvpi_target
        if($table == 'nvpi_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $nvpi_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "nvpi_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "nvpi_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "nvpi_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "nvpi_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "nvpi_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "nvpi_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "nvpi_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "nvpi_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "nvpi_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "nvpi_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "nvpi_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "nvpi_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $nvpi_target[] = array(
                    'ous_target' => $row['nvpi_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //nvpi_target

        //po_quirino_target
        if($table == 'po_quirino_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $po_quirino_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "po_quirino_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "po_quirino_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "po_quirino_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "po_quirino_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "po_quirino_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "po_quirino_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "po_quirino_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "po_quirino_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "po_quirino_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "po_quirino_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "po_quirino_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "po_quirino_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $po_quirino_target[] = array(
                    'ous_target' => $row['po_quirino_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //po_quirino_target

        //ptc_quirino_target
        if($table == 'ptc_quirino_target'){
            $data = $this->Rod_model->get_pmr_pobatanes($year);
            $ptc_quirino_target = array();
            foreach($data as $row){    
                $ind_id = $row['ind_id'];

                //loop per month
                //Janaury
                $data1 = $this->Rod_model->get_pmr_January($ind_id, "ptc_quirino_target");
                $January_Accomplishment = $data1['evi_accomplishment'];

                //February
                $data1 = $this->Rod_model->get_pmr_February($ind_id, "ptc_quirino_target");
                $February_Accomplishment = $data1['evi_accomplishment'];
                
                //March
                $data1 = $this->Rod_model->get_pmr_March($ind_id, "ptc_quirino_target");
                $March_Accomplishment = $data1['evi_accomplishment'];

                //April
                $data1 = $this->Rod_model->get_pmr_April($ind_id, "ptc_quirino_target");
                $April_Accomplishment = $data1['evi_accomplishment'];

                //May
                $data1 = $this->Rod_model->get_pmr_May($ind_id, "ptc_quirino_target");
                $May_Accomplishment = $data1['evi_accomplishment'];
                
                //June
                $data1 = $this->Rod_model->get_pmr_June($ind_id, "ptc_quirino_target");
                $June_Accomplishment = $data1['evi_accomplishment'];

                //July
                $data1 = $this->Rod_model->get_pmr_July($ind_id, "ptc_quirino_target");
                $July_Accomplishment = $data1['evi_accomplishment'];

                //August
                $data1 = $this->Rod_model->get_pmr_August($ind_id, "ptc_quirino_target");
                $August_Accomplishment = $data1['evi_accomplishment'];

                //September
                $data1 = $this->Rod_model->get_pmr_September($ind_id, "ptc_quirino_target");
                $September_Accomplishment = $data1['evi_accomplishment'];

                //October
                $data1 = $this->Rod_model->get_pmr_October($ind_id, "ptc_quirino_target");
                $October_Accomplishment = $data1['evi_accomplishment'];

                //November
                $data1 = $this->Rod_model->get_pmr_November($ind_id, "ptc_quirino_target");
                $November_Accomplishment = $data1['evi_accomplishment'];

                //Decemebr
                $data1 = $this->Rod_model->get_pmr_Decemebr($ind_id, "ptc_quirino_target");
                $Decemebr_Accomplishment = $data1['evi_accomplishment'];                

                $ptc_quirino_target[] = array(
                    'ous_target' => $row['ptc_quirino_target'],
                    'ind_desc' => $row['ind_desc'],
                    'ind_id' => $row['ind_id'],

                    'January_Accomplishment' => $January_Accomplishment,
                    'February_Accomplishment' => $February_Accomplishment,
                    'March_Accomplishment' => $March_Accomplishment,
                    'April_Accomplishment' => $April_Accomplishment,
                    'May_Accomplishment' => $May_Accomplishment,
                    'June_Accomplishment' => $June_Accomplishment,
                    'July_Accomplishment' => $July_Accomplishment,
                    'August_Accomplishment' => $August_Accomplishment,
                    'September_Accomplishment' => $September_Accomplishment,
                    'October_Accomplishment' => $October_Accomplishment,
                    'November_Accomplishment' => $November_Accomplishment,
                    'December_Accomplishment' => $Decemebr_Accomplishment,
                );
            }
        }
        //ptc_quirino_target

        $data["summary"] = $summary;
        $data["ro_target"] = $ro_target;
        $data["po_batanes_target"] = $po_batanes_target;
        $data["ptc_batanes_target"] = $ptc_batanes_target;
        $data["po_cagayan_target"] = $po_cagayan_target;
        $data["ptc_cagayan_target"] = $ptc_cagayan_target;
        $data["api_target"] = $api_target;
        $data["lit_target"] = $lit_target;
        $data["rtc_target"] = $rtc_target;
        $data["po_isabela_target"] = $po_isabela_target;
        $data["ptc_isabela_target"] = $ptc_isabela_target;
        $data["isat_isabela_target"] = $isat_isabela_target;
        $data["sicat_isabela_target"] = $sicat_isabela_target;
        $data["po_nv_target"] = $po_nv_target;
        $data["ptc_nv_target"] = $ptc_nv_target;
        $data["nvpi_target"] = $nvpi_target;
        $data["po_quirino_target"] = $po_quirino_target;
        $data["ptc_quirino_target"] = $ptc_quirino_target;
        



        if(!file_exists(APPPATH.'views/pages/rod/'.$page.'.php')){
            show_404();
        }else{
            $this->load->view('pages/rod/'.$page, $data);   
        }
    }

    public function pmr_evidences($param){

        $page = 'evidence';

        if(!file_exists(APPPATH.'views/pages/rod/'.$page.'.php')){
            show_404();
        }else{

            $evidence_ro_target = $this->Rod_model->get_evidence_ro_target($param);
            $data['evidence_ro_target'] = $evidence_ro_target;

            $evidence_po_batanes_target = $this->Rod_model->get_evidence_po_batanes_target($param);
            $data['evidence_po_batanes_target'] = $evidence_po_batanes_target;

            $evidence_po_cagayan_target = $this->Rod_model->get_evidence_po_cagayan_target($param);
            $data['evidence_po_cagayan_target'] = $evidence_po_cagayan_target;

            $evidence_po_isabela_target = $this->Rod_model->get_evidence_po_isabela_target($param);
            $data['evidence_po_isabela_target'] = $evidence_po_isabela_target;

            $evidence_po_nv_target = $this->Rod_model->get_evidence_po_nv_target($param);
            $data['evidence_po_nv_target'] = $evidence_po_nv_target;

            $evidence_po_quirino_target = $this->Rod_model->get_evidence_po_quirino_target($param);
            $data['evidence_po_quirino_target'] = $evidence_po_quirino_target;

            //------------TTIs

            $evidence_rtc_target = $this->Rod_model->get_evidence_rtc_target($param);
            $data['evidence_rtc_target'] = $evidence_rtc_target;

            $evidence_api_target = $this->Rod_model->get_evidence_api_target($param);
            $data['evidence_api_target'] = $evidence_api_target;

            $evidence_lit_target = $this->Rod_model->get_evidence_lit_target($param);
            $data['evidence_lit_target'] = $evidence_lit_target;

            $evidence_isat_isabela_target = $this->Rod_model->get_evidence_isat_isabela_target($param);
            $data['evidence_isat_isabela_target'] = $evidence_isat_isabela_target;

            $evidence_sicat_isabela_target = $this->Rod_model->get_evidence_sicat_isabela_target($param);
            $data['evidence_sicat_isabela_target'] = $evidence_sicat_isabela_target;

            $evidence_nvpi_target = $this->Rod_model->get_evidence_nvpi_target($param);
            $data['evidence_nvpi_target'] = $evidence_nvpi_target;

            $evidence_ptc_batanes_target = $this->Rod_model->get_evidence_ptc_batanes_target($param);
            $data['evidence_ptc_batanes_target'] = $evidence_ptc_batanes_target;

            $evidence_ptc_cagayan_target = $this->Rod_model->get_evidence_ptc_cagayan_target($param);
            $data['evidence_ptc_cagayan_target'] = $evidence_ptc_cagayan_target;

            $evidence_ptc_isabela_target = $this->Rod_model->get_evidence_ptc_isabela_target($param);
            $data['evidence_ptc_isabela_target'] = $evidence_ptc_isabela_target;

            $evidence_ptc_nv_target = $this->Rod_model->get_evidence_ptc_nv_target($param);
            $data['evidence_ptc_nv_target'] = $evidence_ptc_nv_target;

            $evidence_ptc_quirino_target = $this->Rod_model->get_evidence_ptc_quirino_target($param);
            $data['evidence_ptc_quirino_target'] = $evidence_ptc_quirino_target;

            $data['ind_id'] = $param;
            $data['ind_desc'] = $this->Rod_model->get_ind_desc($param);
            //print_r($data);
            $this->load->view('pages/rod/'.$page, $data);   
        }

    }

//---------------------------Last--------------------------   
}
