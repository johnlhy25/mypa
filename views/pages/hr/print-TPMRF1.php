<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-8rcp{background-color:#FFF;font-weight:bold;text-align:center;vertical-align:middle}
.tg .tg-2g1l{background-color:#FFF;font-weight:bold;text-align:center;vertical-align:middle}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg .tg-0lax1{text-align:center;vertical-align:center}
</style>
<center>
<table class="tg">
<thead>
  <tr>
    <th class="tg-baqh" colspan="8"><b>Technical Education and Skills Development Authority - Regional Office No. 02<br>MONITORING AND EVALUATION PLAN</b><br>For the month of <b><?= $parameter?></b><br>CY <?= $year?></th>
    <th class="tg-baqh" colspan="3"><br><b>TESDA-OP-AS-01-F06<br>Rev. No. 00 – 03/01/17</b></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-2g1l" style="width:22%;"><b>Sponsoring Agency/Office</b></td>
    <td class="tg-2g1l" style="width:22%;"><b>Training Program/Venue</b></td>
    <td class="tg-2g1l" style="width:1%;"><b>Training Duration (mm/dd/yyyy - mm/dd/yyyy)</b></td>
    <td class="tg-2g1l" style="width:18%;"><b>Name of Participant/s</b></td>
    <td class="tg-2g1l" style="width:15%;"><b>Operating Unit</b></td>
    <td class="tg-2g1l" style="width:12%;"><b>Position</b></td>
    <td class="tg-2g1l" style="width:13%;"><span style="font-size:10px;"><b>Status of Implementation of Program (REAP Completed (C)/ Not Completed (NC)</b></span></td>
    <td class="tg-2g1l" style="width:10%;"><b>Remarks (indicate competencies gained ex. HR, fin. Mgt, supervisory, admin, etc)</b></td>
    <td class="tg-2g1l" style="width:10%;"><b>Terminal Report/REAP</b></td>
    <td class="tg-2g1l" style="width:10%;"><b>TDORF</b></td>
    <td class="tg-2g1l" style="width:10%;"><b>Training Certificates</b></td>
  </tr>
  <tr>
    <?php foreach($list_of_trainings_user as $row){ ?>

      <?php
      if($row['trn_remarks'] == 'Postponed'){}
      else{
        if($row['trn_status']=='NC'){
          if($row['trn_with_reap'] == '1'){
            if($row['trn_remarks'] == 'Disapproved'){
              if($row['trn_d_attend'] == null){
                $status = '<b>Did not Attend </b>(To submit Written Explanation for non-attendance)';
              }else{
                $status = '<b>Did not Attend </b>(To submit Written Explanation for non-attendance.<b> Date Submitted: '. date('F d, Y', strtotime($row['trn_d_attend'])) .'</b>)';
              }
            }else{
              $status = '<b>NC </b>(To submit Re-Entry Action Plan)';
            }
            
          }else{
            if($row['trn_remarks'] == 'Disapproved'){
              if($row['trn_d_attend'] == null){
                $status = '<b>Did not Attend </b>(To submit Written Explanation for non-attendance)';
              }else{
                $status = '<b>Did not Attend </b>(To submit Written Explanation for non-attendance. Date Submitted: '. date('F d, Y', strtotime($row['trn_d_attend'])) .')';
              }
            }else{
              $status = '<b>NC </b>(To submit Terminal Report)';
            }
          }

          //With Output
          if($row['trn_output'] == null){
            $doc_to_submit = '<td class="tg-0lax1">'.$status.'</td>';
          }else{
            $doc_to_submit = '<td class="tg-0lax1">'.$status.' '. $row['trn_others'].' </td>' ;
          }
        
        }else{
          $status = '<b>C </b>';
          $doc_to_submit = '<td class="tg-0lax1">'.$status.'</td>';
        }

        //Report of Submission
        if($row['trn_reap'] == ''){
          $trn_reap = 'Not Submitted';
        }else{
          $trn_reap = 'Submitted';
        }

        if($row['trn_tdorf'] == ''){
          $trn_tdorf = 'Not Submitted';
        }else{
          $trn_tdorf = 'Submitted';
        }

        if($row['trn_cot'] == ''){
          $trn_cot = 'Not Submitted';
        }else{
          $trn_cot = 'Submitted';
        }

      ?>
      <td class="tg-0lax"><?= $row['trn_spo_agency']?></td>
      <td class="tg-0lax"><?= $row['trn_learn_dev']?></td>
      <td class="tg-0lax1"><?= date('m/d/Y', strtotime($row['trn_from_date']))." - ". date('m/d/Y', strtotime($row['trn_to_date']))?></td>
      <td class="tg-0lax1"><?= $row['usr_name']?></td>
      <td class="tg-0lax1"><?= $row['ous_desc']?></td>
      <td class="tg-0lax1"><?= $row['emp_position']?></td>
      <?= $doc_to_submit ?>
      <td class="tg-0lax1"><?= $row['trn_type']?></td>
      <td class="tg-0lax1"><?= $trn_reap ?></td>
      <td class="tg-0lax1"><?= $trn_tdorf ?></td>
      <td class="tg-0lax1"><?= $trn_cot ?></td>
  </tr>
    <?php }?>
  <?php }?>
  <tr>
      <td colspan="3">
        <b>Prepared by:</b><br><br><br>
        <b>KRIMHILD ERIKA T. DOMINGO</b><br>
        Administrative Support Staff
      </td>
      <td colspan="2">
        <b>Reviewed by:</b><br><br><br>
        <b>MARY ANNE A. FURIGAY</b><br>
        Administrative Officer V/ HRMO
      </td>
      <td colspan="3">
        <b>Certified Correct by:</b><br><br><br>
        <b>IMELDA V. GERVACIO</b><br>
        Chief Administrative Officer 
      </td>
      <td colspan="3">
        <b>Approved by:</b><br><br><br>
        <b>ARCHIE A. GRANDE, CESO III</b><br>
           Regional Director
      </td>
  </tr>
  <tr>
    <td colspan="11">
    <span style="font-size:10px;">Date & Time Generated: <b><?php date_default_timezone_set("Asia/Manila"); echo date("F d, Y - h:i A");?></b></span><br>
        <span style="font-size:8px;">R2 FASD Services <b>v <?= $this->config->item('system_version') ?></b> | &copy <?= date('Y');?> <b>TESDA DOS</b>. Site developed and managed <i class="fa fa-heart"></i> by <strong>TESDA DOS</strong></span>
    </td>
  </tr>
</tbody>
</table>
</center>