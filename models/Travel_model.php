<?php

class Travel_model extends CI_Model{

    public function __construct(){
        $this->db1 = $this->load->database('travelorder', TRUE);
        $this->load->helper("security");
    }

    public function get_recommending_signatories($usr_id){
        $this->db->select('usr_email');
        $this->db->from('tbl_user');
        $this->db->where('usr_id', $usr_id);
        $result = $this->db->get();
        return $result->row_array();
    }

    public function get_travel_order_details($to_id){
        $this->db1 = $this->load->database('travelorder', TRUE);
        $this->db1->select('*');
        $this->db1->from('tbltravorder');
        $this->db1->where('toID', $to_id);
        $result = $this->db1->get();
        return $result->row_array();
    }

    public function get_user_details($usr_id){
        $this->db->select('pos_desc');
        $this->db->from('tbl_hr_position');
        $this->db->where('pos_usr_id', $usr_id);
        $result = $this->db->get();
        return $result->row_array();
    }

	public function get_user_details1($usr_id){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('usr_id', $usr_id);
        $result = $this->db->get();
        return $result->row_array();
    }


    public function getEvents(){
        
        date_default_timezone_set('Asia/Manila');
		if( $this->session->role == 'Super Admin'){
			//array
			$events = array();
			$this->db1->select('tbltravorder.toID, tbltravorder.userID, tbltravorder.userOffice, tbltravorder.userPurpose, tbltravorder.userDepart, tbltravorder.userDestination, tbltravorder.userReturn, tblapprovestatus.toID, tblapprovestatus.approvedAs, tblapprovestatus.toStatus');
			$this->db1->from('tbltravorder');
			$this->db1->join('tblapprovestatus','tblapprovestatus.toID = tbltravorder.toID');
			$this->db1->where('tblapprovestatus.approvedAs', 'approval');
			$this->db1->where('tblapprovestatus.toStatus', 'approved');
			$this->db1->where('tbltravorder.userDepart >=', $this->input->get('start'));
			$this->db1->where('tbltravorder.userDepart <=', $this->input->get('end'));
			$query = $this->db1->get();
			$data = $query->result_array();
			//print_r($data);
           
        }elseif($this->session->role == 'Admin'){

			$ous_desc = $this->session->ous_desc;
            //array
			$events = array();
			$this->db1->select('tbltravorder.toID, tbltravorder.userID, tbltravorder.userOffice, tbltravorder.userPurpose, tbltravorder.userDepart, tbltravorder.userDestination, tbltravorder.userReturn, tblapprovestatus.toID, tblapprovestatus.approvedAs, tblapprovestatus.toStatus');
			$this->db1->from('tbltravorder');
			$this->db1->join('tblapprovestatus','tblapprovestatus.toID = tbltravorder.toID');
			$this->db1->where('tblapprovestatus.approvedAs', 'approval');
			$this->db1->where('tblapprovestatus.toStatus', 'approved');
			$this->db1->where('tbltravorder.userOffice', $ous_desc);
			$this->db1->where('tbltravorder.userDepart >=', $this->input->get('start'));
			$this->db1->where('tbltravorder.userDepart <=', $this->input->get('end'));
			$query = $this->db1->get();
			$data = $query->result_array();
			//print_r($data);
        }else{
			$events = array();
			$this->db1->select('tbltravorder.toID, tbltravorder.userID, tbltravorder.userOffice, tbltravorder.userPurpose, tbltravorder.userDepart, tbltravorder.userDestination, tbltravorder.userReturn, tblapprovestatus.toID, tblapprovestatus.approvedAs, tblapprovestatus.toStatus');
			$this->db1->from('tbltravorder');
			$this->db1->join('tblapprovestatus','tblapprovestatus.toID = tbltravorder.toID');
			$this->db1->where('tblapprovestatus.approvedAs', 'approval');
			$this->db1->where('tblapprovestatus.toStatus', 'approved');
			$this->db1->where('tbltravorder.userID', $this->session->usr_id);
			$this->db1->where('tbltravorder.userDepart >=', $this->input->get('start'));
			$this->db1->where('tbltravorder.userDepart <=', $this->input->get('end'));
			$query = $this->db1->get();
			$data = $query->result_array();
		}

		
		
		foreach($data as $row){
            $data = $this->get_name($row['userID']);
            $ou = $data['usr_ous_id'];

			if($row['toStatus'] == 'approved'){
			    $name = $data['usr_name'];
				if($row['userOffice'] == 'Regional Office II'){
					$color = '#BCECE0';
					$textcolor = 'black';
					$operating_unit = 'Regional Office II';
				} elseif($row['userOffice'] == 'PO Cagayan'){
					$color = '#36EEE0';
					$textcolor = 'black';
					$operating_unit = 'PO Cagayan';
				} elseif($row['userOffice'] == 'PO Batanes'){
					$color = '#F652A0';
					$textcolor = 'white';
					$operating_unit = 'PO Batanes';
				} elseif($row['userOffice'] == 'PO Isabela'){
					$color = '#4C5270';
					$textcolor = 'black';
					$operating_unit = 'PO Isabela';
				} elseif($row['userOffice'] == 'PO/PTC Quirino'){
					$color = '#FFF4BD';
					$textcolor = 'black';
					$operating_unit = 'PO/PTC Quirino';
				} elseif($row['userOffice'] == 'PO Nueva Vizcaya'){
					$color = '#F4B9B8';
					$textcolor = 'black';
					$operating_unit = 'PO Nueva Vizcaya';
				} elseif($row['userOffice'] == 'API'){
					$color = '#85D2D0';
					$textcolor = 'black';
					$operating_unit = 'API';
				} elseif($row['userOffice'] == 'SICAT'){
					$color = '#887BB0';
					$textcolor = 'white';
					$operating_unit = 'SICAT';
				} elseif($row['userOffice'] == 'LIT'){
					$color = '#EEB5EB';
					$textcolor = 'black';
					$operating_unit = 'LIT';
				} elseif($row['userOffice'] == 'NVPI'){
					$color = '#C26DBC';
					$textcolor = 'white';
					$operating_unit = 'NVPI';
				} elseif($row['userOffice'] == 'ISAT'){
					$color = '#C8F4F9';
					$textcolor = 'black';
					$operating_unit = 'ISAT';
				} elseif($row['userOffice'] == 'RTC'){
					$color = '#3CACAE';
					$textcolor = 'white';
					$operating_unit = 'RTC';
				}
			}else{
			    $name = '* '.$data['usr_name'];
				if($row['userOffice'] == 'Regional Office II'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'Regional Office II';
				} elseif($row['userOffice'] == 'PO Cagayan'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'PO Cagayan';
				} elseif($row['userOffice'] == 'PO Batanes'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'PO Batanes';
				} elseif($row['userOffice'] == 'PO Isabela'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'PO Isabela';
				} elseif($row['userOffice'] == 'PO/PTC Quirino'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'PO/PTC Quirino';
				} elseif($row['userOffice'] == 'PO Nueva Vizcaya'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'PO Nueva Vizcaya';
				} elseif($row['userOffice'] == 'API'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'API';
				} elseif($row['userOffice'] == 'SICAT'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'SICAT';
				} elseif($row['userOffice'] == 'LIT'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'LIT';
				} elseif($row['userOffice'] == 'NVPI'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'NVPI';
				} elseif($row['userOffice'] == 'ISAT'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'ISAT';
				} elseif($row['userOffice'] == 'RTC'){
					$color = '#FFEBEE';
					$textcolor = 'black';
					$operating_unit = 'RTC';
				}

			}
			
			$end = date('Y-m-d', strtotime($row['userReturn']. ' + 1 days'));

			$events[] = array(
				'id' => $row['toID'],
				'title' => $name,
				'description' => $row['userDestination'],
				'start' => $row['userDepart'],
				'end' => $end,
				'color' => $color,
                'textColor' => $textcolor,
				'operating' => $operating_unit,
				'purpose' => $row['userPurpose']
			);
		}
		
		return $events;

	}

    function get_name($usr_id){
        $this->db->select('usr_name, usr_ous_id');
        $this->db->from('tbl_user');
        $this->db->where('usr_id', $usr_id);
        $result = $this->db->get();
        return $result->row_array();
    }
  
    public function getnullto(){
		$this->db1->select('*');
		$this->db1->from('tbltravorder');
		$this->db1->join('tblapprovestatus','tblapprovestatus.toID = tbltravorder.toID');
		$this->db1->where('tbltravorder.userTONumber', 0);
		$this->db1->where('tblapprovestatus.approvedAs', 'approval');
		$this->db1->where('tblapprovestatus.toStatus', 'approved');
		$query = $this->db1->get();
		return $query->result_array();
    }
    
    public function updatenullto($id, $newDate) {
        // Prepare the data array for the update
        $data = array(
            'userTONumber' => $newDate
        );
        
        // Ensure the ID is provided before proceeding
        if ($id && !empty($newDate)) {
            // Set the condition for the update
            $this->db1->where('toID', $id);
            // Perform the update and return the result
            return $this->db1->update('tbltravorder', $data);
        } else {
            // Return false if ID or newDate is invalid
            return false;
        }
    }

    

    
}//Last