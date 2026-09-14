<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ExcelImport extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Excel_model'); // Load your model
        $this->load->library('upload'); // Load the upload library
    }

    public function import_wes() {
        // Check if file was uploaded
        if (!isset($_FILES['import_work_experience']) || $_FILES['import_work_experience']['error'] != UPLOAD_ERR_OK) {
            echo json_encode(['status' => 'error', 'message' => 'No file uploaded or there was an upload error.']);
            return;
        }

        // File configuration
        $config['upload_path'] = './uploads/excels/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = 2048; // Max file size in KB
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('import_work_experience')) {
            $error = $this->upload->display_errors();
            echo json_encode(['status' => 'error', 'message' => $error]);
            return;
        }

        $fileData = $this->upload->data();
        $filePath = './uploads/excels/' . $fileData['file_name'];

        // Load PhpSpreadsheet library
        require_once APPPATH . 'third_party/PhpSpreadsheet/vendor/autoload.php';

        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        try {
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            // Check if the expected highest column matches
            if ($highestColumn == 'H') {
                $insertData = array();
                for ($row = 2; $row <= $highestRow; $row++) {
                    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE)[0];
                    $insertData[] = array(
                        'we_usr_id' => $this->session->usr_id,
                        'we_from' => $rowData[0],
                        'we_to' => $rowData[1],
                        'we_position_title' => $rowData[2],
                        'we_agency' => $rowData[3],
                        'we_salary' => $rowData[4],
                        'we_sg' => $rowData[5],
                        'we_status' => $rowData[6],
                        'we_service' => $rowData[7]
                    );
                }

                // Insert the data using your model
                $result = $this->Excel_model->insert($insertData);   
                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Imported successfully.']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Something went wrong while importing data.']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Please check your file. The last column should be <b>H [Service]</b>.']);
            }
        } catch (Exception $e) {
            echo json_encode(['status' => 'error', 'message' => 'Error loading file: ' . $e->getMessage()]);
        }

        // Delete the uploaded file after processing
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
