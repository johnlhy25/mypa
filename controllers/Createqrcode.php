<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Createqrcode extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function create_qr_code()
    {
      $param = $this->input->post('qrcode_usr_id');
      $hash = hash('sha256', $param);
      // Include the phpqrcode library
      require_once APPPATH . 'libraries/phpqrcode/qrlib.php';

      // Text to be converted to QR code
      $text = "http://localhost/cso/feedback/".$hash;

      // Logo path
      $logo_path = FCPATH . 'assets/img/Logo_Region2.png';

      // QR code size and error correction level
      $qr_size = 200; // Increase size for higher resolution
      $qr_margin = 2;
      $error_correction_level = QR_ECLEVEL_H;

      // Generate the QR code in memory
      ob_start();
      QRcode::png($text, null, $error_correction_level, $qr_size, $qr_margin);
      $qr_image_data = ob_get_contents();
      ob_end_clean();

      // Create an image from the QR code data
      $qr_image = imagecreatefromstring($qr_image_data);
      
      // Load the logo image
      $logo_image = imagecreatefrompng($logo_path);

      // Get dimensions
      $qr_width = imagesx($qr_image);
      $qr_height = imagesy($qr_image);
      $logo_width = imagesx($logo_image);
      $logo_height = imagesy($logo_image);

      // Calculate logo placement
      $logo_qr_width = $qr_width / 5; // Logo size relative to QR code
      $scale = $logo_width / $logo_qr_width;
      $logo_qr_height = $logo_height / $scale;
      $from_width = ($qr_width - $logo_qr_width) / 2;

      // Merge QR code and logo
      imagecopyresampled($qr_image, $logo_image, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

      // Output buffering to capture the final image
      ob_start();
      imagepng($qr_image);
      $image_data = ob_get_contents();
      ob_end_clean();

      // Convert image to base64
      $base64_image = base64_encode($image_data);

      // Save the base64 image to the database
      $result = $this->Createqrcode_model->save_qrcode($base64_image, $param);

      if($result){
        // Clean up
        imagedestroy($qr_image);
        imagedestroy($logo_image);
        echo json_encode ($result);
      }else{
        return FALSE;
      }
      

      // Pass the base64 image to the view
      //$data['qr_code_base64'] = $base64_image;
      //$this->load->view('qrcode_view', $data);
    }

    public function view_qr_code()
    {
      $param = $this->input->post('qrcode_usr_id_view');
      
      // Save the base64 image to the database
      $result = $this->Createqrcode_model->view_qrcode($param);
      echo json_encode($result);

    }

    public function generate_create_qr_code_all()
    {
      $data = $this->Createqrcode_model->get_accounts();

      foreach($data as $row) {
        $id = $row['usr_id'];
        $this->create_qr_code1($id);
      }
    }


    public function create_qr_code1($param)
    {
      $hash = hash('sha256', $param);
      // Include the phpqrcode library
      require_once APPPATH . 'libraries/phpqrcode/qrlib.php';

      // Text to be converted to QR code
      $text = "http://localhost/cso/feedback/".$hash;

      // Logo path
      $logo_path = FCPATH . 'assets/img/Logo_Region2.png';

      // QR code size and error correction level
      $qr_size = 200; // Increase size for higher resolution
      $qr_margin = 2;
      $error_correction_level = QR_ECLEVEL_H;

      // Generate the QR code in memory
      ob_start();
      QRcode::png($text, null, $error_correction_level, $qr_size, $qr_margin);
      $qr_image_data = ob_get_contents();
      ob_end_clean();

      // Create an image from the QR code data
      $qr_image = imagecreatefromstring($qr_image_data);
      
      // Load the logo image
      $logo_image = imagecreatefrompng($logo_path);

      // Get dimensions
      $qr_width = imagesx($qr_image);
      $qr_height = imagesy($qr_image);
      $logo_width = imagesx($logo_image);
      $logo_height = imagesy($logo_image);

      // Calculate logo placement
      $logo_qr_width = $qr_width / 5; // Logo size relative to QR code
      $scale = $logo_width / $logo_qr_width;
      $logo_qr_height = $logo_height / $scale;
      $from_width = ($qr_width - $logo_qr_width) / 2;

      // Merge QR code and logo
      imagecopyresampled($qr_image, $logo_image, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

      // Output buffering to capture the final image
      ob_start();
      imagepng($qr_image);
      $image_data = ob_get_contents();
      ob_end_clean();

      // Convert image to base64
      $base64_image = base64_encode($image_data);

      // Save the base64 image to the database
      $result = $this->Createqrcode_model->save_qrcode($base64_image, $param);

      if($result){
        // Clean up
        imagedestroy($qr_image);
        imagedestroy($logo_image);
        echo json_encode ($result);
      }else{
        return FALSE;
      }
      

      // Pass the base64 image to the view
      //$data['qr_code_base64'] = $base64_image;
      //$this->load->view('qrcode_view', $data);
    }

    public function view_qr_code_ict()
    {
      $param = $this->input->post('qrcode_usr_id_view');
      
      // Save the base64 image to the database
      $result = $this->Createqrcode_model->view_qr_code_ict($param);
      echo json_encode($result);

    }

    public function generate_create_qr_code_all_ict()
    {
      $data = $this->Createqrcode_model->get_accounts_ict();

      foreach($data as $row) {
        $id = $row['usr_id'];
        $this->create_qr_code_ict($id);
      }
    }


    public function create_qr_code_ict($param)
    {
      $hash = hash('sha256', $param);
      // Include the phpqrcode library
      require_once APPPATH . 'libraries/phpqrcode/qrlib.php';

      // Text to be converted to QR code
      $text = "https://helpdesk.tesdar02onlinereporting.ph/user/".$hash;

      // Logo path
      $logo_path = FCPATH . 'assets/img/Logo_Region2.png';

      // QR code size and error correction level
      $qr_size = 200; // Increase size for higher resolution
      $qr_margin = 2;
      $error_correction_level = QR_ECLEVEL_H;

      // Generate the QR code in memory
      ob_start();
      QRcode::png($text, null, $error_correction_level, $qr_size, $qr_margin);
      $qr_image_data = ob_get_contents();
      ob_end_clean();

      // Create an image from the QR code data
      $qr_image = imagecreatefromstring($qr_image_data);
      
      // Load the logo image
      $logo_image = imagecreatefrompng($logo_path);

      // Get dimensions
      $qr_width = imagesx($qr_image);
      $qr_height = imagesy($qr_image);
      $logo_width = imagesx($logo_image);
      $logo_height = imagesy($logo_image);

      // Calculate logo placement
      $logo_qr_width = $qr_width / 5; // Logo size relative to QR code
      $scale = $logo_width / $logo_qr_width;
      $logo_qr_height = $logo_height / $scale;
      $from_width = ($qr_width - $logo_qr_width) / 2;

      // Merge QR code and logo
      imagecopyresampled($qr_image, $logo_image, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

      // Output buffering to capture the final image
      ob_start();
      imagepng($qr_image);
      $image_data = ob_get_contents();
      ob_end_clean();

      // Convert image to base64
      $base64_image = base64_encode($image_data);

      // Save the base64 image to the database
      $result = $this->Createqrcode_model->save_qrcode_ict($base64_image, $param);

      if($result){
        // Clean up
        imagedestroy($qr_image);
        imagedestroy($logo_image);
        echo json_encode ($result);
        echo 'Done';
      }else{
        return FALSE;
      }
      

      // Pass the base64 image to the view
      //$data['qr_code_base64'] = $base64_image;
      //$this->load->view('qrcode_view', $data);
    }

    

}
