<?php

class Intranet_model extends CI_Model{

    public function __construct(){
        $this->db2 = $this->load->database('intranet', TRUE);
        $this->load->helper("security");

        // Set table name
        $this->table = 'tbldocument';
        // Set orderable column fields
        $this->column_order = array(null, 'documentDateIssued', null, null, null, null, null);
        // Set searchable column fields
        $this->column_search = array('documentSubject');
        // Set default order
        $this->order = array('documentDateIssued' => 'desc');
    }

    public function getRows($postData, $docType){
        $docType = str_replace('_', ' ', $docType);
        $this->_get_datatables_query($postData, $docType);
        if($postData['length'] != -1){
            $this->db2->limit($postData['length'], $postData['start']);
        }
        $this->db2->where('documentType', $docType);
        $query = $this->db2->get();
        return $query->result();
    }

    public function countAll($docType){
        $docType = str_replace('_', ' ', $docType);
        $this->db2->where('documentType', $docType);
        $this->db2->from($this->table);
        return $this->db2->count_all_results();
    }

    public function countFiltered($postData, $docType){
        $docType = str_replace('_', ' ', $docType);
        $this->_get_datatables_query($postData, $docType);
        $this->db2->where('documentType', $docType);
        $query = $this->db2->get();
        return $query->num_rows();
    }

    private function _get_datatables_query($postData, $docType){
        $docType = str_replace('_', ' ', $docType);
        $this->db2->where('documentType', $docType);
        $this->db2->from($this->table);
 
        $i = 0;
        // loop searchable columns 
        foreach($this->column_search as $item){
            // if datatable send POST for search
            if($postData['search']['value']){
                // first loop
                if($i===0){
                    // open bracket
                    $this->db2->group_start();
                    $this->db2->like($item, $postData['search']['value']);
                }else{
                    $this->db2->or_like($item, $postData['search']['value']);
                }
                
                // last loop
                if(count($this->column_search) - 1 == $i){
                    // close bracket
                    $this->db2->group_end();
                }
            }
            $i++;
        }
         
        if(isset($postData['order'])){
            $this->db2->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db2->order_by(key($order), $order[key($order)]);
        }
    }
  
   
    
}//Last