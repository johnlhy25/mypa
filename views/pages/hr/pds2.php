<?php 
if( $this->session->logged_in){
  if( $this->session->role == 'Guest'){
    redirect (base_url().'Guest');
  }else{?>
  
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personal Data Sheet | Sheet 2</title>
	<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url();?>assets/img/Logo.png">
</head>
<style>
#pds-table {
	font-family: Arial, sans-serif;
    width: 100%;
    max-width: 9in;
    margin: 0 auto;
    border: 2px solid #000;
}
#pds-table td:not(.separator) {
    font-size: 11px;
    border-color: #000;
    height: 20px; /* For Visual Purposes */
}
#pds-table tbody {
    border: 1px solid #000;
}
#pds-table tbody:not(.table-header) td {
    border: 1px solid #000;
}
#pds-table .separator {
    font-size: 12px;
    font-style: italic;
    font-weight: 600;
    background-color: #757575;
    border-top-width: 2px !important;
    border-bottom-width: 2px !important;
}
#pds-table td.s-label {
    background-color: #dddddd;
    width: 20%;
}
#pds-table td.s-label1 {
    width: 50%;
	height: 35px;
	border-top-width: 0px !important;
	border-right-width: 0px !important;
    border-bottom-width: 0px !important;
	border-left-width: 1px !important;
}
#pds-table tr.s-label1 {
	height: 35px;
	border-top-width: 0px !important;
	border-right-width: 0px !important;
    border-bottom-width: 0px !important;
	border-left-width: 1px !important;
}
#pds-table td .count {
    display: inline-block;
    width: 1.32em;
    text-align: center;
}
.table-body.question-block td {
    font-size: 13px !important;
}
.table-body.question-block tr td:first-child {
    border-bottom-width: 0px !important;
    border-top-width: 0px !important;
}
.table-body.question-block tr td:not(:first-child) {
    border-width: 0px !important;
}
.table-body.question-block tr td:nth-child(2) {
    padding-left: 15px;
}
.break-page {
  break-after: page;
}
#pds-table tr.s-label-signature {
	height: 40px;
	border-top-width: 0px !important;
	border-right-width: 0px !important;
    border-bottom-width: 0px !important;
	border-left-width: 1px !important;
}
</style>
<body>
	<div class="table-responsive p-3">
		<form action="">
			<table id="pds-table">

            	<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator">IV.  CIVIL SERVICE ELIGIBILITY</td>
					</tr>
					<tr class="text-center">
						<td colspan="6" class="s-label border-bottom-0" style="width:30%">
							<span class="count float-left">27.</span>
							CES/CSEE/CAREER SERVICE/RA 1080 (BOARD/ BAR)/UNDER SPECIAL LAWS/CATEGORY II/ IV ELIGIBILITY and ELIGIBILITIES FOR UNIFORMED PERSONNEL
						</td>
						<td colspan="1" class="s-label border-bottom-0">RATING<br>(If Applicable)</td>
						<td colspan="1" class="s-label border-bottom-0">DATE OF EXAMINATION / CONFERMENT</td>
						<td colspan="2" class="s-label border-bottom-0">PLACE OF EXAMINATION / CONFERMENT</td>
						<td colspan="2" class="s-label border-bottom-0">LICENSE<br>(if applicable)</td>
					</tr>
					<tr class="text-center">
						<td colspan="6" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="2" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label">NUMBER</td>
						<td colspan="1" class="s-label">Valid Until</td>
					</tr>
					<!--Check if Null-->
					<!--Check if Null-->
					<?php $x=0; 
						foreach($eligibility as $row) {
					?>	
					<tr class="s-label1">
						<td colspan="6"><?= strtoupper(!empty($row['eli_desc']) ? $row['eli_desc'] : 'N/A'); ?></td>
						<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eli_rating']) ? $row['eli_rating'] : 'N/A'); ?></td>
						<td colspan="1" class="text-center"><?= !empty($row['eli_date_of_examination']) ? date('d/m/Y', strtotime($row['eli_date_of_examination'])) : 'N/A'; ?></td>
						<td colspan="2"><?= strtoupper(!empty($row['eli_place_of_examination']) ? $row['eli_place_of_examination'] : 'N/A'); ?></td>
						<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eli_number']) ? $row['eli_number'] : 'N/A'); ?></td>
						<td colspan="1" class="text-center"><?= !empty($row['eli_date_of_validity']) ? date('d/m/Y', strtotime($row['eli_date_of_validity'])) : 'N/A'; ?></td>
					</tr>
					<?php $x=$x+1;} ?>
					<?php if($x<=5){
					for($z=0;$z<5-$x;$z++) {?>
					<tr class="s-label1">
						<td colspan="6"> </td>
						<td colspan="1"> </td>
						<td colspan="1"> </td>
						<td colspan="2"> </td>
						<td colspan="1"> </td>
						<td colspan="1"> </td>
					</tr>
					<?php }
					} ?>
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
							<i>(Continue on seperate sheet if necessary)</i>
						</td>
					</tr>
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator">
							V.  WORK EXPERIENCE<br>
							<small><i>(Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.</i></small>
						</td>
					</tr>
					<tr class="text-center">
						<td colspan="1" class="s-label border-bottom-0" style="width: 20%;">
							<span class="count float-left">28.</span>
							INCLUSIVE DATES<br>(dd/mm/yyyy)
							
						</td>
						<td colspan="3" class="s-label border-bottom-0">
							POSITION TITLE<br>
							(Write in full/Do not abbreviate)
						</td>
						<td colspan="4" class="s-label border-bottom-0">
							DEPARTMENT/AGENCY/OFFICE/COMPANY<br>
							(Write in full/Do not abbreviate)
						</td>
						<td colspan="1" class="s-label border-bottom-0">
							MONTHLY<br>SALARY
						</td>
						<td colspan="1" class="s-label border-bottom-0">
							SALARY/ JOB/ PAY <br>GRADE (If applicable) & <br>STEP INCREMENT <br> (Format: "00-0")

						</td>
						<td colspan="1" class="s-label border-bottom-0">STATUS OF<br>APPOINTMENT</td>
						<td colspan="1" class="s-label border-bottom-0">GOV'T SERVICE<br>
							<small>(Y/ N)</small></td>
					</tr>
					<tr>
						<td colspan="1" class="p-0">
						<table class="w-100 border-0">
							<tbody class="border-0">
								<tr class="text-center">
									<td class="s-label border-0 border-bottom-0" style="width: 50%;">From</td>
									<td class="s-label border-top-0 border-right-0 border-bottom-0" style="width: 50%;">To</td>
								</tr>
							</tbody>
						</table>
						</td>
						<td colspan="3" class="s-label border-top-0"></td>
						<td colspan="4" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
					</tr>

					<?php $x_we=0; foreach($work_experience as $row) { ?>	

					<tr>
						<td colspan="1" class="p-0">
						<table class="w-100 border-0">
							<tbody class="border-0">
								<tr>
									<td class="s-label1 text-center"><?= date('d/m/Y', strtotime($row['we_from']))?></td>
									<?php if($row['we_to'] == 'Present'){?>
										<td class="s-label1 text-center	"><?= strtoupper($row['we_to'])?></td>
									<?php } else {?>	
										<td class="s-label1 text-center"><?= date('d/m/Y', strtotime($row['we_to']))?></td>
									<?php } ?>	
								</tr>
							</tbody>
						</table>
						</td>
						<td colspan="3" style="font-size:8px"><?= strtoupper($row['we_position_title'])?></td>
						<td colspan="4"><?= strtoupper($row['we_agency'])?></td>
    						<?php if ($row['we_status'] == 'JO/COS'){
    							$we_status = 'Job Order/ Contract of Service';
        						}else{
        							$we_status = $row['we_status'];
        						}
    						?>
				        <td colspan="1"class="text-center"><?= $row['we_salary']?></td>
				        <td colspan="1"class="text-center"><?= $row['we_sg']?></td>
						<td colspan="1"class="text-center"><?= strtoupper($we_status)?></td>
						<td colspan="1"class="text-center"><?= strtoupper($row['we_service'])?></td>
					</tr>

					<?php $x_we=$x_we+1;} ?>
					<style>
						.topics tr { line-height: 14px; }
					</style>
					<?php if($x_we<=25){
					for($z=0;$z<25-$x_we;$z++) {?>
					<tr class="topics">
						<td colspan="1" class="p-0">
						<table class="w-100 border-0">
							<tbody class="border-0">
								<tr>
									<td class="s-label1"></td>
									<td class="s-label1"></td>
								</tr>
							</tbody>
						</table>
						</td>
						<td colspan="3"></td>
						<td colspan="4"></td>
						<td colspan="1"></td>
						<td colspan="1"></td>
						<td colspan="1"></td>
						<td colspan="1"></td>
						
					</tr>	
					<?php }
					} ?>
				
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
							<i>(Continue on seperate sheet if necessary)</i>
						</td>
					</tr>
					<tr class="s-label-signature">
						<td colspan="1" class="text-center"><i><b>SIGNATURE</b></i></td>
						<td colspan="6"></td>
						<td colspan="2" class="text-center"><i><b>DATE</b></i></td>
						<td colspan="3" class="text-center"><input type="text" style="width:100%;border-width:0 0 0px;padding-bottom:0px;text-align:center" placeholder="dd/mm/yyyy"></td>
					</tr>
					<tr>
						<td colspan="12" class="text-right"><small>CS FORM 212 (Revised 2026), Page 2 of 4</small></td>
					</tr>
				</tbody>

				<!-- End of Page 2 -->
                
			</table>
		</form>
	</div>
	
	<?php if($eligibility_offset1 == null && $work_experience_offset1 == null){}else{?>
		<p style="page-break-after: always;"></p>
		<p style="page-break-before: always;"></p>
		<div class="table-responsive p-3">
			<form action="">
				<table id="pds-table">
					
					<?php if($eligibility_offset1 == null){	
					} else{?>
				
					<tbody class="table-body">
						<tr>
        					<td colspan="12" class="text-white separator">IV.  CIVIL SERVICE ELIGIBILITY</td>
        				</tr>
        				<tr class="text-center">
        					<td colspan="6" class="s-label border-bottom-0" style="width:30%">
        						<span class="count float-left">27.</span>
        						CES/CSEE/CAREER SERVICE/RA 1080 (BOARD/ BAR)/UNDER SPECIAL LAWS/CATEGORY II/ IV ELIGIBILITY and ELIGIBILITIES FOR UNIFORMED PERSONNEL
        					</td>
        					<td colspan="1" class="s-label border-bottom-0">RATING<br>(If Applicable)</td>
        					<td colspan="1" class="s-label border-bottom-0">DATE OF EXAMINATION / CONFERMENT</td>
        					<td colspan="2" class="s-label border-bottom-0">PLACE OF EXAMINATION / CONFERMENT</td>
        					<td colspan="2" class="s-label border-bottom-0">LICENSE<br>(if applicable)</td>
        				</tr>
        				<tr class="text-center">
        					<td colspan="6" class="s-label border-top-0"></td>
        					<td colspan="1" class="s-label border-top-0"></td>
        					<td colspan="1" class="s-label border-top-0"></td>
        					<td colspan="2" class="s-label border-top-0"></td>
        					<td colspan="1" class="s-label">NUMBER</td>
        					<td colspan="1" class="s-label">Valid Until</td>
        				</tr>

						<?php $x=0; foreach($eligibility_offset1 as $row) { ?>	
						<tr>
							<td colspan="5"><?= strtoupper(!empty($row['eli_desc']) ? $row['eli_desc'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eli_rating']) ? $row['eli_rating'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= !empty($row['eli_date_of_examination']) ? date('d/m/Y', strtotime($row['eli_date_of_examination'])) : 'N/A'; ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eli_place_of_examination']) ? $row['eli_place_of_examination'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eli_number']) ? $row['eli_number'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= !empty($row['eli_date_of_validity']) ? $row['eli_date_of_validity'] : 'N/A'; ?></td>
						</tr>
						<?php $x=$x+1;} ?>
						<?php if($x<=5){
						for($z=0;$z<5-$x;$z++) {?>
						<tr class="s-label1">
							<td colspan="5" > </td>
							<td colspan="1"> </td>
							<td colspan="2"> </td>
							<td colspan="2"> </td>
							<td colspan="1"> </td>
							<td colspan="1"> </td>
						</tr>
						<?php }
						} ?>
					</tbody>

					<?php } ?>

					<?php if($work_experience_offset1 == null){	
					} else{?>

					<tbody class="table-body">
						<tr>
							<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
								<i>(Continue on seperate sheet if necessary)</i>
							</td>
						</tr>
					</tbody>

					<tbody class="table-body">
						<tr>
							<td colspan="12" class="text-white separator">
								V.  WORK EXPERIENCE<br>
								<small><i>(Include private employment.  Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.</i></small>
							</td>
						</tr>
						<tr class="text-center">
							<td colspan="1" class="s-label border-bottom-0" style="width: 20%;">
								<span class="count float-left">28.</span>
								INCLUSIVE DATES<br>(dd/mm/yyyy)
								
							</td>
							<td colspan="3" class="s-label border-bottom-0">
								POSITION TITLE<br>
								(Write in full/Do not abbreviate)
							</td>
							<td colspan="4" class="s-label border-bottom-0">
								DEPARTMENT/AGENCY/OFFICE/COMPANY<br>
								(Write in full/Do not abbreviate)
							</td>
							<td colspan="1" class="s-label border-bottom-0">
    							MONTHLY<br>SALARY
    						</td>
    						<td colspan="1" class="s-label border-bottom-0">
    							SALARY/ JOB/ PAY <br>GRADE (If applicable) & <br>STEP INCREMENT <br> (Format: "00-0")
    
    						</td>
							<td colspan="1" class="s-label border-bottom-0">STATUS OF<br>APPOINTMENT</td>
							<td colspan="1" class="s-label border-bottom-0">GOV'T SERVICE<br>
								<small>(Y/ N)</small></td>
						</tr>
						<tr>
							<td colspan="1" class="p-0">
							<table class="w-100 border-0">
								<tbody class="border-0">
									<tr class="text-center">
										<td class="s-label border-0 border-bottom-0" style="width: 50%;">From</td>
										<td class="s-label border-top-0 border-right-0 border-bottom-0" style="width: 50%;">To</td>
									</tr>
								</tbody>
							</table>
							</td>
							<td colspan="3" class="s-label border-top-0"></td>
    						<td colspan="4" class="s-label border-top-0"></td>
    						<td colspan="1" class="s-label border-top-0"></td>
    						<td colspan="1" class="s-label border-top-0"></td>
    						<td colspan="1" class="s-label border-top-0"></td>
    						<td colspan="1" class="s-label border-top-0"></td>
						</tr>

						<?php $x_we=0; foreach($work_experience_offset1 as $row) { ?>	

						<tr>
							<td colspan="1" class="p-0">
							<table class="w-100 border-0">
								<tbody class="border-0">
									<tr>
										<td class="s-label1"><?= date('d/m/Y', strtotime($row['we_from'])) ?></td>
										<?php if($row['we_to'] == 'Present'){?>
											<td class="s-label1"><?= strtoupper($row['we_to'])?></td>
										<?php } else {?>	
											<td class="s-label1"><?= date('d/m/Y', strtotime($row['we_to']))?></td>
										<?php } ?>	
									</tr>
								</tbody>
							</table>
							</td>
							<td colspan="3" style="font-size:8px"><?= strtoupper($row['we_position_title'])?></td>
							<td colspan="4"><?= strtoupper($row['we_agency'])?></td>
    							<?php if ($row['we_status'] == 'JO/COS'){
        							$we_status = 'Job Order/ Contract of Service';
            						}else{
            							$we_status = $row['we_status'];
            						}
        						?>
    				        <td colspan="1"class="text-center"><?= $row['we_salary']?></td>
    				        <td colspan="1"class="text-center"><?= $row['we_sg']?></td>
							<td colspan="1"class="text-center"><?= strtoupper($we_status)?></td>
							<td colspan="1"class="text-center"><?= strtoupper($row['we_service'])?></td>
						</tr>

						<?php $x_we=$x_we+1;} ?>	
					</tbody>

					<tbody class="table-body">
						<tr>
							<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
								<i>(Continue on seperate sheet if necessary)</i>
							</td>
						</tr>
						<tr class="s-label-signature">
							<td colspan="1" class="text-center"><i><b>SIGNATURE</b></i></td>
							<td colspan="6"></td>
							<td colspan="2" class="text-center"><i><b>DATE</b></i></td>
							<td colspan="3"><input type="text" style="width:100%;border-width:0 0 0px;padding-bottom:0px;text-align:center" placeholder="dd/mm/yyyy"></td>
						</tr>
					</tbody>
					<?php } ?>

				</table>
			</form>
		</div>
	<?php } ?>
</body>
</html>

<?php }?>
<?php }else{
redirect (base_url());
}?>