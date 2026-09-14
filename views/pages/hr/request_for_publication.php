<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-8odn{border-color:#000000;font-family:Arial, Helvetica, sans-serif !important;font-size:14px;font-weight:bold;
  text-align:center;vertical-align:middle}
.tg .tg-0r18{border-color:inherit;font-size:14px;text-align:center;vertical-align:top}
.tg .tg-pery{border-color:#000000;font-family:Arial, Helvetica, sans-serif !important;font-size:14px;text-align:left;
  vertical-align:top}
.tg .tg-ktss{border-color:#000000;font-family:Arial, Helvetica, sans-serif !important;font-size:14px;text-align:center;
  vertical-align:top}
.tg .tg-8t1g{border-color:#000000;font-family:Arial, Helvetica, sans-serif !important;font-size:14px;text-align:center;
  vertical-align:middle}
.tg .tg-ter2{border-color:#000000;font-family:Arial, Helvetica, sans-serif !important;font-size:14px;text-align:center;
  vertical-align:bottom}
.tg .tg-7btt{border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-f27f{border-color:#000000;font-family:Arial, Helvetica, sans-serif !important;font-size:14px;font-weight:bold;
  text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
</style>
<center>
<table class="tg" style="undefined;table-layout: fixed; width: 1399px">
<colgroup>
<col style="width: 36px">
<col style="width: 178px">
<col style="width: 175px">
<col style="width: 67px">
<col style="width: 97px">
<col style="width: 138px">
<col style="width: 143px">
<col style="width: 134px">
<col style="width: 141px">
<col style="width: 135px">
<col style="width: 155px">
</colgroup>
<thead>
  <tr>
    <th class="tg-pery" colspan="2" style="border-color:white">CS Form No. 9<br>Revised 2018</th>
    <th class="tg-ktss" colspan="6" style="border-color:white; border-right-color:black"></th>
    <th class="tg-8t1g" colspan="3" >Electronic copy to be submitted to the CSC FO  must be in MS Excel format</th>
  </tr>
</thead>
<tbody >
  <tr>
    <td class="tg-ktss" colspan="11" style="border-color:white;">Republic of the Philippines<br><span style="font-weight:bold">TECHNICAL EDUCATION AND SKILLS DEVELOPMENT AUTHORITY</span><br>Request for Publication of Vacant Positions</td>
  </tr>
  <tr>
    <td class="tg-pery" colspan="11" style="border-color:white;">To: CIVIL SERVICE COMMISSION (CSC)<br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp We hereby request the publication of the following vacant positions, which are authorized to be filled, at the TECHNICAL EDUCATION AND SKILLS DEVELOPMENT AUTHORITY in the CSC website:</td>
  </tr>
  <tr>
    <td class="tg-pery" colspan="9" style="border-color:white"></td>
    <td class="tg-ter2" colspan="2" style="border-color:white"><br><br><span style="font-weight:bold;text-decoration:underline">ARCHIE A. GRANDE, CESO III</span><br>Regional Director</td>
  </tr>
  <tr>
    <td class="tg-pery" colspan="9" style="border-left-color:white;border-right-color:white"></td>
    <td class="tg-ktss" colspan="2" style="border-right-color:white">Date: <u><b><?= date('F d, Y',strtotime($pos_posting_date)) ?></b></u></td>
  </tr>
  <tr>
    <td class="tg-8odn" rowspan="2">NO.</td>
    <td class="tg-8odn" rowspan="2">Position Title (Parenthetical Title, if applicable)</td>
    <td class="tg-8odn" rowspan="2">Plantilla Item No.</td>
    <td class="tg-8odn" rowspan="2">Salary/ Job/ Pay Grade</td>
    <td class="tg-8odn" rowspan="2">Monthly Salary</td>
    <td class="tg-8odn" colspan="5">Qualification Standards</td>
    <td class="tg-8odn" rowspan="2">Place of Assignment</td>
  </tr>
  <tr>
    <td class="tg-8odn">Education</td>
    <td class="tg-8odn">Training</td>
    <td class="tg-8odn">Experience</td>
    <td class="tg-8odn">Eligibility</td>
    <td class="tg-f27f">Competency <br>(if applicable)</td>
  </tr>
  <!--Data for Request for Publication-->
	<?php 
		$x=1;
		foreach($publication as $row) {
			
	?>
	<tr>
		<td class="tg-ktss"><?= $x ?></td>
		<td class="tg-ktss"><?= $row['pos_desc']?></td>
		<td class="tg-ktss"><?= $row['pos_plantilla_no']?></td>
		<td class="tg-ktss"><?= $row['pos_sg']?></td>
		<td class="tg-pery"><?= $row['pos_salary']?></td>
		<td class="tg-pery"><?= $row['pos_education']?></td>
		<td class="tg-pery"><?= $row['pos_training']?></td>
		<td class="tg-pery"><?= $row['pos_experience']?></td>
		<td class="tg-pery"><?= $row['pos_eligibility']?></td>
		<td class="tg-pery"><?= $row['pos_competency']?></td>
		<td class="tg-0pky"><?= 'TESDA '.$row['ous_desc']?></td>
	</tr>
	<?php }?>
  <!--Data for Request for Publication-->
  <tr>
    <td class="tg-0pky" colspan="11" style="border-left-color:white;border-right-color:white;border-bottom-color:white">Interested and qualified applicants should signify their interest in writing. Attach the following documents to the application letter and send to the address below not later than <u><b><?= date('F d, Y',strtotime($pos_closing_date)) ?></b></u></td>
  </tr>
  <tr>
    <td class="tg-0pky" style="border-left-color:white;border-right-color:white;border-bottom-color:white"></td>
    <td class="tg-0pky" colspan="10" style="border-left-color:white;border-right-color:white;border-bottom-color:white">1. Fully accomplished Personal Data Sheet (PDS) with recent passport-sized picture (CS Form No. 212, Revised 2017) which can be downloaded at www.csc.gov.ph;<br>2. Performance rating in the last rating period (if applicable);<br>3. Photocopy of certificate of eligibility/rating/license; and<br>4. Photocopy of Transcript of Records.</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="11" style="border-color:white"><span style="font-weight:bold">QUALIFIED APPLICANTS</span> are advised to hand in or send through courier/email their application to:</td>
  </tr>
  <tr>
    <td class="tg-0r18" colspan="5" style="border-color:white"><span style="font-weight:bold;text-decoration:underline">ARCHIE A. GRANDE, CESO III</span><br>Regional Director<br>TESDA R02, Carig, Tuguegarao City<br>mail@agency.gov.ph</td>
    <td class="tg-0pky" colspan="6" style="border-color:white"></td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="11" style="border-color:white"><span style="font-weight:bold">APPLICATIONS WITH INCOMPLETE DOCUMENTS SHALL NOT BE ENTERTAINED.</span></td>
  </tr>
</tbody>
</table>
</center>