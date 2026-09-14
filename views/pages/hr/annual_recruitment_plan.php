<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Annual Recruitment Plan</title>
     <!-- Favicon-->
     <link rel="shortcut icon" href="<?= base_url();?>assets/img/Fav.png">
</head>
<body>
    <style type="text/css">
    @media print { 
      table,
      table tr td,
      table tr th {
        page-break-inside: avoid;
      }
    }
    .tg  {border-collapse:collapse;border-color:#ccc;border-spacing:0;}
    .tg td{background-color:#fff;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
    font-family:Arial, sans-serif;font-size:14px;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg th{background-color:#f0f0f0;border-color:#ccc;border-style:solid;border-width:1px;color:#333;
    font-family:Arial, sans-serif;font-size:14px;font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
    .tg .tg-pb0m{border-color:inherit;text-align:center;vertical-align:bottom}
    .tg .tg-9wq8{border-color:inherit;text-align:center;vertical-align:middle}
    .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
    .tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
    </style>
    <table class="tg">
    <thead>
    <tr>
        <th class="tg-c3ow" colspan="13" style="border-color:white"><span style="font-weight:bold">TECHNICAL EDUCATION AND SKILLS DEVELOPMENT AUTHORITY</span><br>REGION 02<br><br><span style="font-weight:bold">RECRUITMENT PLAN</span><br>CY <?= date('Y')?></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="tg-0pky" colspan="13" style="border-right-color:white; border-left-color:white"></td>
    </tr>
    <tr>
        <td class="tg-9wq8" rowspan="2" style="width:2%"><b>NO.</b></td>
        <td class="tg-9wq8" colspan="3" style="width:30%"><b>VACANCY<br>(ANTICIPATED/ACTUAL)*</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:2%"><b>Priority Level **</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:2%"><b>Target Number of Applicants</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:8%"><b>Target Date of Publication</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:8%"><b>Target Date of Hiring</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:15%"><b>Sourcing Strategy ***</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:15%"><b>Resources Needed ****</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:3%"><b>Budgetary Requirements</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:10%"><b>Potential Risks/Problems</b></td>
        <td class="tg-9wq8" rowspan="2" style="width:5%"><b>Remarks</b></td>
    </tr>
    <tr>
        <td class="tg-pb0m" style="width:10%"><b>OFFICE</b></td>
        <td class="tg-pb0m" style="width:10%"><b>POSITION</b></td>
        <td class="tg-pb0m" style="width:10%"><b>ITEM NUMBER</b></td>
    </tr>
    <?php 
        $total_sg18 = 0;+
        $total_sg18_amount = 0;
        $total_sg17 = 0; 
        $total_sg17_amount = 0;
        $ous_head = '';
    ?>
    <?php if($annual_recruitment_plan_sg18 == null){}else{ ?>
    <tr class="hide">
        <td class="tg-0pky" style="border-right-color:white" colspan="4">HRMPSB - CO (SG18 &amp; ABOVE) <input type="checkbox" id="hide">Exclude in Printing</td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky"></td>
    </tr>

    <?php $x = 1; foreach($annual_recruitment_plan_sg18 as $row){ 
       if($row['pos_ptc_position'] == null || $row['pos_ptc_position'] == 0){
        $ous_desc = $row['ous_desc'];
       }else{
        $ous_desc = $row['ous_desc'].' <b>(PTC)</b>';
       }
    ?>
        <tr class="hide">
            <td class="tg-9wq8"><?= $x ?></td>
            <td class="tg-9wq8"><?= $ous_desc ?></td>
            <td class="tg-9wq8"><?= strtoupper($row['pos_desc']); ?></td>
            <td class="tg-9wq8"><?= $row['pos_plantilla_no'] ?></td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8">C/O Central Office</td>
            <td class="tg-9wq8"></td>
        </tr>
    <?php 
        $x++; $ous_head =  $row['ous_head']; }
        $total_sg18 = $x-1; 
    ?>
    <?php }?>

    <?php if($annual_recruitment_plan_sg17 == null){}else{ ?>
    <tr>
    <td class="tg-0pky" style="border-right-color:white" colspan="4">HRMPSB - RO (SG17 &amp; BELOW)</td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky" style="border-right-color:white"></td>
        <td class="tg-0pky"></td>
    </tr>
    <?php $z = 1; foreach($annual_recruitment_plan_sg17 as $row){ 
         if($row['pos_ptc_position'] == null || $row['pos_ptc_position'] == 0){
            $ous_desc = $row['ous_desc'];
           }else{
            $ous_desc = $row['ous_desc'].' <b>(PTC)</b>';
           }
    ?>
        <tr>
            <td class="tg-9wq8"><?= $z ?></td>
            <td class="tg-9wq8"><?= $ous_desc ?></td>
            <td class="tg-9wq8"><?= strtoupper($row['pos_desc']); ?></td>
            <td class="tg-9wq8"><?= $row['pos_plantilla_no'] ?></td>
            <td class="tg-9wq8"><?= ucwords(strtolower($row['arp_priority_level'])) ?></td>
            <td class="tg-9wq8"><?= $row['arp_no_applicant'] ?></td>
            <td class="tg-9wq8"><?= date("m/d/Y", strtotime($row['arp_pub_date'])) ?></td>
            <td class="tg-9wq8"><?= date("m/d/Y", strtotime($row['arp_hiring_date'])) ?></td>
            <td class="tg-9wq8">CSC Website, TESDA DOS Website, TESDA official FB Account, TESDA R2 Bulletin Boards</td>
            <td class="tg-9wq8">Desktop/laptop, letters of invitation, Notice for Job Openings</td>
            <td class="tg-9wq8"><?= number_format($row['arp_budgetary'], 2) ?></td>
            <td class="tg-9wq8"><?= $row['arp_risks'] ?></td>
            <td class="tg-9wq8"><?= $row['arp_remarks'] ?></td>
        </tr>
    <?php 
        $z++; 
        $total_sg17_amount=$total_sg17_amount+$row['arp_budgetary']; 
        $ous_head =  $row['ous_head']; 
    }
        $total_sg17 = $z-1; 
    ?>
    <?php }?>

   
    <tr>
        <td class="tg-0pky" style="border-color:white;" colspan="2"></td>
        <td class="tg-0pky" colspan="6" style="border-right-color:white; border-left-color:white"><span style="font-weight:bold">Note:</span> <br>HRMPSB CO - <?= $total_sg18 ?><br>HRMPSB RO - <?= $total_sg17?><br><br><span style="font-weight:bold">TOTAL NUMBER OF VACANCIES: <?= $total_sg18+$total_sg17?></span></td>
        <td class="tg-0pky" colspan="4" style="border-right-color:white; border-left-color:white"><br><br><br><br><span style="font-weight:bold">TOTAL BUDGETARY REQUIREMENT: <?= number_format($total_sg18_amount+$total_sg17_amount, 2);?></span></td>
        <td class="tg-0pky" style="border-color:white;" colspan="1"></td>
    </tr>

    <?php if($this->session->role == "Super Admin") {?>
    <tr>
        <td class="tg-0pky" style="border-bottom-color:white; border-left-color:white" colspan="2"></td>
        <td class="tg-0pky" colspan="4">Prepared by:<br><br><b>Mary Ann A. Furigay</b><br>Administrative Office V</td>
        <td class="tg-0pky" colspan="3">Noted by:<br><br><b>Imelda V. Gervacio</b><br>Chief Administrative Officer</td>
        <td class="tg-0pky" colspan="3">Approved by:<br><br><b>Archie A. Grande, CESO III</b><br>Regional Director</td>
        <td class="tg-0pky" style="border-bottom-color:white; border-right-color:white" ></td>
    </tr>
    <?php }else {?>
    <tr>
        <td class="tg-0pky" colspan="8"><strong>Prepared by:<br><br><b><?= $usr_name ?></strong></b><br><em>HRMO Focal</em></td>
        <?php if($this->session->ous_id == 10 ||$this->session->ous_id == 11 || $this->session->ous_id == 12 || $this->session->ous_id == 13 || $this->session->ous_id == 14 || $this->session->ous_id == 15) { ?>
            <td class="tg-0pky" colspan="5"><strong>Approved by:<br><br><b><?= $ous_head ?></b></strong><br>Vocational School Administrator</td>
        <?php } else {?>
            <td class="tg-0pky" colspan="5"><strong>Approved by:<br><br><b><?= $ous_head ?></strong></b><br>Provincial Director</td>
        <?php }?>    
    </tr>
    <?php }?>
    
    </tbody>
    </table>

</body>
</html>