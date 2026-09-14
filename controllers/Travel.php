<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->helper('url');
        $this->load->library("pagination");
        $this->load->model('Travel_model');
        
    }
    

	Public function getEvents()
	{
		$result=$this->Travel_model->getEvents();
		echo json_encode($result);
	}

    public function approvedto($param){
        $to_id = $param;
        $return = $this->send_approvedTO($to_id);
        if($return){}else{
            show_404();
        }
    }

    function send_approvedTO($to_id){
        if ($to_id == null){
            return false;
        }else{
            
            //GET FILE
            $link="https://primehrm.tesdar02onlinereporting.ph/travelorder/dashboard/pdf/travelorder.php?ctrl=".md5($to_id)."-598b3e71ec378bd83e0a727608b5db01";

            //GET TO DATA
            $data = $this->Travel_model->get_travel_order_details($to_id);

            //get employees infromation
            $usr_id = $data['userID'];
            $data1 = $this->Travel_model->get_user_details($usr_id);
            $data2 = $this->Travel_model->get_user_details1($usr_id);
            $email = $data2['usr_email'];
            $usr_desc = $data1['pos_desc'];
            // Load PHPMailer library
            $this->load->library('phpmailer_lib');
            
            // PHPMailer object
            $mail = $this->phpmailer_lib->load();
            
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'region2.ictu@tesda.gov.ph';//working
            $mail->Password = 'myvl kbir zlrb dsgj';//working
            $mail->SMTPSecure = 'ssl';
            $mail->Port     = 465;
                
            $mail->setFrom('region2.ictu@tesda.gov.ph', 'TDiS | Notification');
            
            // Add a recipient
            $mail->addAddress($email);
            
            // Add cc or bcc 
            // $mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
            
            // Email subject
            $mail->Subject = 'TDiS | Travel Order Approved';
            
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
                    <td align='left' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;  padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 26px; font-weight: bold; line-height: 130%;
                        padding-top: 5px;
                        color: #FFFFFF;
                        font-family: sans-serif;' class='header'>
                        TRAVEL ORDER APPROVED
                    </td>
                </tr>
    
                <!-- PARAGRAPH -->
                <!-- Set text color and font family ('sans-serif' or 'Georgia, serif'). Duplicate all text styles in links, including line-height -->
                <tr>
                    <td align='justify' valign='top' style='border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
                        padding-top: 15px; 
                        color: #FFFFFF;
                        font-family: sans-serif;' class='paragraph'>
                    
                        <table style='font-family:Arial, sans-serif;font-size:16px;
                        overflow:hidden;padding:10px 5px;word-break:normal;'>
                        <tbody>
                        <tr>
                            <td>Name</th>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</th>
                            <td>". strtoupper($data2['usr_name']) ."</td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($usr_desc) ."</td>
                        </tr>
                        <tr>
                            <td>Official Station</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($data['userOffice']) ."</td>
                        </tr>
                        <tr>
                            <td>Destination</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($data['userDestination']) ."</td>
                        </tr>
                        <tr>
                            <td>Departure Date</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper(date('F j, Y', strtotime($data['userDepart']))) ."</td>
                        </tr>
                        <tr>
                            <td>Expected Date of Return</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper(date('F j, Y', strtotime($data['userReturn']))) ."</td>
                        </tr>
                        <tr>
                            <td>Report To</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($data['userReport']) ."</td>
                        </tr>
                        <tr>
                            <td>Purpose</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($data['userPurpose']) ."</td>
                        </tr>
                        <tr>
                            <td>Expenses Allowed</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($data['userExpense']) ."</td>
                        </tr>
                        <tr>
                            <td>Remarks</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td>". strtoupper($data['userRemark']) ."</td>
                        </tr>
                         <tr>
                            <td>Download</td>
                            <td colspan='4'>&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;</td>
                            <td><a href='".$link."'>Download</a></td>
                        </tr>
                        <br>
                        <br>

                        </tbody>
                        </table>
    
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
                            <center>This email was sent to&nbsp;". $email .".  © 2021-". date('Y'). " TESDA DOS.&nbsp; Site developed and&nbsp; managed by <b>TESDA DOS ICTU<b>.</center> 
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
    
    function generateTO(){
        $randomNumber = mt_rand(1, 500);
        return $randomNumber;
    } 
    
    public function updatetonumber(){
       
        $results = $this->Travel_model->getnullto();
        //print_r($results);
        
       foreach($results as $row){
        $id = $row['toID'];
        echo $row['toID']. ' ';
        echo $row['userTONumber']. ' ';
        echo $row['signPosition']. ' ';
        echo $row['toStatus']. ' ';
        echo $row['userDepart']. ' ';
        $tonumber = $this->generateTO();
        //---------New TO Number---------
        $dateParts = explode("-", $row['userDepart']); // Split the date
        $dateParts[2] = $tonumber; // Replace the day with the random number
        $newDate = implode("-", $dateParts); // Reassemble the date
        echo $newDate . ' '; // Output the new date
        //---------New TO Number---------

        //-------update New TO Number---------------
        $this->Travel_model->updatenullto($id, $newDate);
        //-------update New TO Number---------------
        echo '<hr>';
       }
    }
    

//---------------------------Last--------------------------   
}
