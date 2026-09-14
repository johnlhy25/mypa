<center>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-fymr{border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-7btt{border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
</style>
<table class="tg" style="undefined;table-layout: fixed; width: 1176px">
<colgroup>
<col style="width: 137.2px">
<col style="width: 470.2px">
<col style="width: 152.2px">
<col style="width: 123.2px">
<col style="width: 174.2px">
<col style="width: 119.2px">
</colgroup>
<thead>
  <tr>
    <th class="tg-0pky" colspan="5">         </th>
    <th class="tg-fymr">R2 Annex J 2</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-7btt" colspan="6">REGION 02 APPLICATION CHECKLIST</td>
  </tr>
  <tr>
    <td class="tg-fymr">Name of Applicant:</td>
    <td class="tg-0pky" colspan="5"><?= strtoupper($Annex['app_lastname'].', '. $Annex['app_firstname'].' '.$Annex['app_middlename'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Address:</td>
    <td class="tg-0pky" colspan="5"><?= strtoupper($Annex['app_address'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Email Address:</td>
    <td class="tg-0pky"><?= strtoupper($Annex['app_email'])?></td>
    <td class="tg-fymr">CP NO.:</td>
    <td class="tg-0pky" colspan="3"><?= strtoupper($Annex['app_contacts'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Age:</td>
    <td class="tg-0pky"><?= strtoupper($Annex['app_age'])?></td>
    <td class="tg-fymr">SEX:</td>
    <td class="tg-0pky" colspan="3"><?= strtoupper($Annex['app_gender'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Current Position:</td>
    <td class="tg-0pky"><?= strtoupper($Annex['app_present_position'])?></td>
    <td class="tg-fymr">Civil Status:</td>
    <td class="tg-0pky" colspan="3"><?= strtoupper($Annex['app_civil_status'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Current Office:</td>
    <td class="tg-0pky" colspan="5"><?= strtoupper($Annex['app_present_office'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Position Applied:</td>
    <td class="tg-0pky" colspan="5"><?= strtoupper($Annex['pos_desc'])?></td>
  </tr>
  <tr>
    <td class="tg-fymr">Office Where the Vacancy:</td>
    <td class="tg-0pky" colspan="5"><?= strtoupper($Annex['ous_desc'])?></td>
  </tr>
  <tr>
    <td class="tg-7btt" colspan="2">Please   check (√) documents submitted:</td>
    <td class="tg-7btt" colspan="3">  Document Link</td>
    <td class="tg-7btt">Remarks/ Findings</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk1'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      PDS (Revised 2018 Form) with latest ID picture with WES
    </td>
    <td class="tg-0pky" colspan="3">
      <b>PDS:</b> <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_pds']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_pds']?></a><br>
      <b>WES:</b> <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_wes']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_wes']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist1']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">  
      <?php if($Annex['chk2'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Authenticated copy of Official Transcript of Record/Diploma
    </td>
    <td class="tg-0pky" colspan="3"><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_educational_doc']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_educational_doc']?></a></td>
    <td class="tg-0pky"><?= $Annex['eval_chklist2']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"> 
      <?php if($Annex['chk3'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      CSC Authenticated copy of Certificate of Eligibility or PRC Authenticated copy of Unexpired License of Profession  and PRC Authenticated copy of Board Rating
    </td>
    <td class="tg-0pky" colspan="3"><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_eligibility_doc']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_eligibility_doc']?></a></td>
    <td class="tg-0pky"><?= $Annex['eval_chklist3']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk4'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Service Record or Certificate of Employment
    </td>
    <td class="tg-0pky" colspan="3">
      <b>COE:</b> <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_coe_doc']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_coe_doc']?></a><br>
      <b>SR:</b> <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_sr']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_sr']?></a>  
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist4']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk5'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      List and Certified of Training programs attended indicating Number of Training Hours
    </td>
    <td class="tg-0pky" colspan="3">
      <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_training_doc']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_training_doc']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist5']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk6'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Certified Photocopy of latest IPCR (for Govt. employees) or performance evaluation for Job Orders for 2 semesters with VS rating
    </td>
    <td class="tg-0pky" colspan="3">
      <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_ipcr']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_ipcr']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist6']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2"> 
      <?php if($Annex['chk7'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Accomplishments done during the last three (3) years to be endorsed by the Head of Office
    </td>
    <td class="tg-0pky" colspan="3"><a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_wes']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_wes']?></a></td>
    <td class="tg-0pky"><?= $Annex['eval_chklist7']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
    <?php if($Annex['chk8'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Copy of Previous Appointment for TESDA applicants or from other government agencies
    </td>
    <td class="tg-0pky" colspan="3">
    <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_appointment']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_appointment']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist8']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk9'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      List of Character references: Supervisor, Peers, clients, subordinates, if any
    </td>
    <td class="tg-0pky" colspan="3">
      <?= $Annex['app_supervisor'] ?><br>
      <?= $Annex['app_peer'] ?><br>
      <?= $Annex['app_client'] ?>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist9']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk10'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Awards Related to Performance (proof of evidences in the form of plaque, rewards received, citation, etc)
    </td>
    <td class="tg-0pky" colspan="3">
      <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_performance']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_performance']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist10']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">  
      <?php if($Annex['chk11'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Relevant Expert Services (Resource person, speaker, moderator, panelist)
    </td>
    <td class="tg-0pky" colspan="3">
      <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_service']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_service']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist11']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">
      <?php if($Annex['chk12'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  &nbsp
      Committees/TWGs participation (proof of evidences in the form of memorandum, office orders, certificates)
    </td>
    <td class="tg-0pky" colspan="3">
      <a href="<?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_committee']?>" target="_blank"><?php echo base_url().'pdfviewer/web/viewer.php?file='.base_url().'uploads/ApplicantDocx/'.$Annex['app_committee']?></a>
    </td>
    <td class="tg-0pky"><?= $Annex['eval_chklist12']?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Completion of TESDA's Online Course&nbsp;&nbsp;&nbsp;"Practicing COVID-19 Preventive Measures in the Workplace"</td>
    <td class="tg-0pky" colspan="3"></td>
    <td class="tg-0pky">  </td>
  </tr>
  <tr>
    <td class="tg-7btt" colspan="6">PORTFOLIO ASSESSMENT</td>
  </tr>
  <tr>
    <td class="tg-fymr" colspan="5">Qualifications of the Applicant:</td>
    <td class="tg-fymr">REMARKS</td>
  </tr>
  <tr>
    <td class="tg-0pky" rowspan="16"> <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></td>
    <td class="tg-0pky" colspan="2">Education:</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_course'])?></td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_chklist2'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Education Units</td>
    <td class="tg-0pky" colspan="2"></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Eligibility/ies</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_eligibility'])?></td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_chklist3'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">NC II (unexpired) qualifications</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_nc'])?></td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_chklist13'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">TM I Certificate (updated)</td>
    <td class="tg-0pky" colspan="2"></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">NTTC (updated) indicate qualifications</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_nttc'])?></td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_chklist14'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Certificate of Employment indicating duties and responsibilities of applicant</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_present_position'])?> </td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_chklist4'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Relevant Trainings</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_training'])?></td>
    <td class="tg-0pky"><?= strtoupper($Annex['eval_chklist5'])?></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Relevant Experience</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_relevant_experience'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">No. of years in TESDA</td>
    <td class="tg-0pky" colspan="2"><?= strtoupper($Annex['app_tesda_years'])?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="2">Skills</td>
    <td class="tg-0pky" colspan="2"></td>
    <td class="tg-0pky">  </td>
  </tr>
  <tr>
    <td class="tg-fymr" colspan="5">Result of Evaluation: please check ( √) appropriate box</td>
  </tr>
  <tr>
    <td class="tg-0pky">For CBWE/ BEI</td>
    <td class="tg-0pky">
    <?php if($Annex['chk15'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  
    </td>
    <td class="tg-0pky" colspan="2">Failed to submit nescessary document/s</td>
    <td class="tg-0pky">
      <?php if($Annex['chk16'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  
    </td>
  </tr>
  <tr>
    <td class="tg-0pky">For Teaching Demonstration</td>
    <td class="tg-0pky">
      <?php if($Annex['chk17'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  
    </td>
    </td>
    <td class="tg-0pky" colspan="2">Did not meet CSC minimum   QS</td>
    <td class="tg-0pky">
      <?php if($Annex['chk18'] == 'yes') {?>
        <input type="checkbox" checked>
      <?php } else { ?>
        <input type="checkbox">
      <?php } ?>  
    </td>
  </tr>
  <tr>
    <td class="tg-fymr" colspan="5">Reviewed By: <?= $this->session->name;?></td>
  </tr>
  <tr>
    <td class="tg-fymr" colspan="5">Date: <?= date('m/d/Y')?></td>
  </tr>
</tbody>
</table>
</center>