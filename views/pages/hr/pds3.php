<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personal Data Sheet | Sheet 3</title>
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
#pds-table thead {
    border: 1px solid #000;
}
#pds-table thead td{
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
						<td colspan="12" class="text-white separator">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</td>
					</tr>
					<tr class="text-center">
						<td colspan="6" class="s-label border-bottom-0">
							<span class="count float-left">29.</span> NAME & ADDRESS OF ORGANIZATION<br>
							(Write in full)
						</td>
						<td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES<br><small>(dd/mm/yyyy)</small></td>
						<td colspan="1" class="s-label border-bottom-0"><small>NUMBER OF HOURS</small></td>
						<td colspan="3" class="s-label border-bottom-0">POSITION / NATURE OF WORK</td>
					</tr>
					<tr class="text-center">
						<td colspan="6" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label">From </td>
						<td colspan="1" class="s-label">To </td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="3" class="s-label border-top-0"></td>
					</tr>
					<?php if ($work_experience == null) {?>
							<tr class="s-label1">
								<td colspan="6">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="3">N/A</td>
							</tr>
						<?php for($z=0;$z<4;$z++) {?>
							<tr class="s-label1">
								<td colspan="6"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="3"></td>
							</tr>
						<?php } ?>
					<?php } else{?>
						<!--With Value-->
						<?php $x=0; foreach($work_experience as $row) { 
							
							if ($row['vw_from'] == null){
								$from = '';
							}else{
								$from = date('d/m/Y', strtotime($row['vw_from']));
							}

							if ($row['vw_to'] == null){
								$to = '';
							}elseif ($row['vw_to'] == 'Present'){
								$to = strtoupper($row['vw_to']);
							}else{
								$to = date('d/m/Y', strtotime($row['vw_to']));
							}
						?>	
							<tr class="s-label1">
								<td colspan="6"><?= strtoupper($row['vw_organization']) ?></td>
								<td colspan="1" class="text-center"><?= $from ?></td>
								<td colspan="1" class="text-center"><?=  $to ?></td>
								<td colspan="1" class="text-center"><?= strtoupper($row['vw_hours']) ?></td>
								<td colspan="3"><?= strtoupper($row['vw_position']) ?></td>
							</tr>
						<?php $x=$x+1;} ?>
						<?php if($x<=5){
						for($z=0;$z<5-$x;$z++) {?>
							<tr class="s-label1">
								<td colspan="6"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="3"></td>
							</tr>
						<?php }
						} ?>
						<!--End with Value-->
					<?php } ?>	
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
						<td colspan="12" class="text-white separator">VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED<br>
							<!--small><i>(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)</i></small-->
						</td>
					</tr>
					<tr class="text-center">
						<td colspan="6" class="s-label border-bottom-0" style="width:45%;">
							<span class="count float-left">30.</span> TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>
							(Write in full)
						</td>
						<td colspan="2" class="s-label border-bottom-0" style="width:18%;">INCLUSIVE DATES OF ATTENDANCE<br><small>(dd/mm/yyyy)</small></td>
						<td colspan="1" class="s-label border-bottom-0" style="width:5%;"><small>NUMBER OF HOURS<small></td>
						<td colspan="1" class="s-label border-bottom-0" style="width:5%;"><small>TYPE OF LD <br>( Managerial/ Supervisory/Technical/etc)</small></td>
						<td colspan="2" class="s-label border-bottom-0" style="width:30%;">CONDUCTED/ SPONSORED BY<br>(Write in full)</td>
					</tr>
					<tr class="text-center">
						<td colspan="6" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label">From</td>
						<td colspan="1" class="s-label">To</td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="2" class="s-label border-top-0"></td>
					</tr>
					<?php if ($learning_development == null) {?>
							<tr class="s-label1">
								<td colspan="6">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="1">N/A</td>
								<td colspan="2">N/A</td>
							</tr>
						<?php for($z=0;$z<22;$z++) {?>
							<tr class="s-label1">
								<td colspan="6"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="2"></td>
							</tr>
						<?php } ?>
					<?php } else{?>
						<!--With Values-->	
						<!--22 Rows-->
						<?php $x=0; foreach($learning_development as $row) { 

							if ($row['trn_from_date'] == null || $row['trn_from_date'] == '0000-00-00'){
								$from = 'N/A';
							}else{
								$from = date('d/m/Y', strtotime($row['trn_from_date']));
							}

							if ($row['trn_to_date'] == null || $row['trn_from_date'] == '0000-00-00'){
								$to = 'N/A';
							}else{
								$to = date('d/m/Y', strtotime($row['trn_to_date']));
							}

							if($row['trn_remarks'] == 'Postponed'){}
                        	else{
                            	if($row['trn_remarks'] == 'Disapproved'){}
                            	else{
						?>
							<tr class="s-label1">
								<td colspan="6"><?= strtoupper($row['trn_learn_dev'])?></td>
								<td colspan="1" class="text-center"><?= $from?></td>
								<td colspan="1" class="text-center"><?= $to ?></td>
								<td colspan="1" class="text-center"><?= !empty($row['trn_no_hours']) ? $row['trn_no_hours'] : 'N/A' ?></td>
								<td colspan="1" class="text-center"><?= strtoupper($row['trn_type'])?></td>
								<td colspan="2"><?= strtoupper($row['trn_conducted'])?></td>
							</tr>
						<?php
								}
							}
							$x=$x+1;}
						?>		
						<?php 
						for($z=0;$z<17-$x;$z++) {?>
							<tr class="s-label1">
								<td colspan="6"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="2"></td>
							</tr>
						<?php } ?>
						<!--With Values-->	
					<?php } ?>
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
						<td colspan="12" class="text-white separator">VIII.  OTHER INFORMATION</td>
					</tr>
					<tr class="text-center">
						<td colspan="4" class="s-label">
							<span class="count float-left">31.</span> SPECIAL SKILLS and HOBBIES
						</td>
						<td colspan="5" class="s-label">
							<span class="count float-left">32.</span> NON-ACADEMIC DISTINCTIONS / RECOGNITION<br>(Write in full)
						</td>
						<td colspan="3" class="s-label">
							<span class="count float-left">33.</span> MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br>(Write in full)
						</td>
					</tr>
					
					<?php for($x=0;$x<=4;) {

						//Special Skill and Hobbies
						if($special_skills[$x]['hb_desc'] == null){
							if($x == 0){
								$special = 'N/A';
							}else{
								$special ='';
							}
						}else{
							$special = $special_skills[$x]['hb_desc'];
						}
						
						//Recognition
						if($recognition[$x]['rec_desc'] == null){
							if($x == 0){
								$xrecognition = 'N/A';
							}else{
								$xrecognition ='';
							}
						}else{
							$xrecognition = $recognition[$x]['rec_desc'];
						}

						//membership
						if($membership[$x]['mem_desc'] == null){
							if($x == 0){
								$xmembership = 'N/A';
							}else{
								$xmembership ='';
							}
						}else{
							$xmembership = $membership[$x]['mem_desc'];
						}
					?>
						
						<tr class="s-label1">
							<td colspan="4"><?= $special ?></td>
							<td colspan="5"><?= $xrecognition ?></td>
							<td colspan="3"><?= $xmembership ?></td>
						</tr>
					<?php $x++; } ?>
					
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
							<i>(Continue on seperate sheet if necessary)</i>
						</td>
					</tr>
					<tr class="s-label1">
						<td colspan="4" class="text-center"><i><b>SIGNATURE</b></i></td>
						<td colspan="5"></td>
						<td colspan="2" class="text-center"><i><b>DATE</b></i></td>
						<td colspan="1" class="text-center"><input type="text" style="width:100%;border-width:0 0 0px;padding-bottom:0px;text-align:center" placeholder="dd/mm/yyyy"></td>
					</tr>
					<tr>
						<td colspan="12" class="text-right"><small>CS FORM 212 (Revised 2026), Page 3 of 4</small></td>
					</tr>
				</tbody>

				<!-- End of Page 3 -->
            	
			</table>
			
			<?php if($work_experience_offset == null && $learning_development_offset == null && $special_skills_offset == null && $recognition_offset == null && $membership_offset == null ){} else {?>
				<p style="page-break-after: always;"></p>
				<p style="page-break-before: always;"></p>
				<div class="table-responsive p-3">			
				<table id="pds-table">

				<?php if($work_experience_offset == null){	
				} else{?>

					<tbody class="table-body">
						<tr>
							<td colspan="12" class="text-white separator">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</td>
						</tr>
						<tr class="text-center">
							<td colspan="6" class="s-label border-bottom-0">
								<span class="count float-left">29.</span> NAME & ADDRESS OF ORGANIZATION<br>
								(Write in full)
							</td>
							<td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES<br><small>(dd/mm/yyyy)</small></td>
							<td colspan="1" class="s-label border-bottom-0"><small>NUMBER OF HOURS</small></td>
							<td colspan="3" class="s-label border-bottom-0">POSITION / NATURE OF WORK</td>
						</tr>
						<tr class="text-center">
							<td colspan="6" class="s-label border-top-0"></td>
							<td colspan="1" class="s-label">From </td>
							<td colspan="1" class="s-label">To </td>
							<td colspan="1" class="s-label border-top-0"></td>
							<td colspan="3" class="s-label border-top-0"></td>
						</tr>

						<?php $x=0; foreach($work_experience_offset as $row) { 
							
							if ($row['vw_from'] == null){
								$from = '';
							}else{
								$from = date('d/m/Y', strtotime($row['vw_from']));
							}

							if ($row['vw_to'] == null){
								$to = '';
							}elseif ($row['vw_to'] == 'Present'){
								$to = strtoupper($row['vw_to']);
							}else{
								$to = date('d/m/Y', strtotime($row['vw_to']));
							}
						?>	
							<tr class="s-label1">
								<td colspan="6"><?= strtoupper($row['vw_organization']) ?></td>
								<td colspan="1" class="text-center"><?= $from ?></td>
								<td colspan="1" class="text-center"><?=  $to ?></td>
								<td colspan="1" class="text-center"><?= strtoupper($row['vw_hours']) ?></td>
								<td colspan="3"><?= strtoupper($row['vw_position']) ?></td>
							</tr>
						<?php $x=$x+1;} ?>
						<?php if($x<=5){
						for($z=0;$z<5-$x;$z++) {?>
							<tr class="s-label1">
								<td colspan="6"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="1"></td>
								<td colspan="3"></td>
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
					<?php } ?>

					<?php if($learning_development_offset == null){	
					} else{?>

					<tbody class="table-body">
					    <thead>
						<tr>
							<td colspan="12" class="text-white separator">VII.  LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED<br>
								<small><i>(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)</i></small>
							</td>
						</tr>
						<tr class="text-center">
							<td colspan="6" class="s-label border-bottom-0" style="width:45%;">
								<span class="count float-left">30.</span> TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>
								(Write in full)
							</td>
							<td colspan="2" class="s-label border-bottom-0" style="width:18%;">INCLUSIVE DATES OF ATTENDANCE <br><small>(dd/mm/yyyy)</small></td>
							<td colspan="1" class="s-label border-bottom-0" style="width:5%;"><small>NUMBER OF HOURS<small></td>
							<td colspan="1" class="s-label border-bottom-0" style="width:5%;"><small>TYPE OF LD <br>( Managerial/ Supervisory/Technical/etc)</small></td>
							<td colspan="2" class="s-label border-bottom-0" style="width:30%;">CONDUCTED/ SPONSORED BY<br>(Write in full)</td>
						</tr>
						<tr class="text-center">
							<td colspan="6" class="s-label border-top-0"></td>
							<td colspan="1" class="s-label">From</td>
							<td colspan="1" class="s-label">To</td>
							<td colspan="1" class="s-label border-top-0"></td>
							<td colspan="1" class="s-label border-top-0"></td>
							<td colspan="2" class="s-label border-top-0"></td>
						</tr>
						</thead>

						<!--22 Rows-->
						
						<?php foreach($learning_development_offset as $row) { 
							if ($row['trn_from_date'] == null){
								$from = '';
							}else{
								$from = date('d/m/Y', strtotime($row['trn_from_date']));
							}

							if ($row['trn_to_date'] == null){
								$to = '';
							}else{
								$to = date('d/m/Y', strtotime($row['trn_to_date']));
							}
						?>
							<tr class="s-label1">
								<td colspan="6"><?= strtoupper($row['trn_learn_dev'])?></td>
								<td colspan="1" class="text-center"><?= $from?></td>
								<td colspan="1" class="text-center"><?= $to ?></td>
								<td colspan="1" class="text-center"><?= $row['trn_no_hours']?></td>
								<td colspan="1" class="text-center"><?= strtoupper($row['trn_type'])?></td>
								<td colspan="2"><?= strtoupper($row['trn_conducted'])?></td>
							</tr>
						<?php } ?>		
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

					<?php if($special_skills_offset == null && $recognition_offset == null && $membership_offset == null ){	
					} else{?>
					
					<!--Offset for Other Information-->
					<tbody class="table-body">
						<tr>
							<td colspan="12" class="text-white separator">VIII.  OTHER INFORMATION</td>
						</tr>
						<tr class="text-center">
							<td colspan="4" class="s-label">
								<span class="count float-left">31.</span> SPECIAL SKILLS and HOBBIES
							</td>
							<td colspan="5" class="s-label">
								<span class="count float-left">32.</span> NON-ACADEMIC DISTINCTIONS / RECOGNITION<br>(Write in full)
							</td>
							<td colspan="3" class="s-label">
								<span class="count float-left">33.</span> MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br>(Write in full)
							</td>
						</tr>
						<?php for($y=0;$y<=$max_num_rows-1;) {
							//Special Skill and Hobbies
							if($special_skills_offset[$y]['hb_desc'] == null){
								$special ='';
							}else{
								$special = $special_skills_offset[$y]['hb_desc'];
							}
							
							//Recognition
							if($recognition_offset[$y]['rec_desc'] == null){
								$xrecognition ='';
							}else{
								$xrecognition = $recognition_offset[$y]['rec_desc'];
							}

							//membership
							if($membership_offset[$y]['mem_desc'] == null){
								$xmembership ='';
							}else{
								$xmembership = $membership_offset[$y]['mem_desc'];
							}
						?>
							
							<tr class="s-label1">
								<td colspan="4"><?= $special ?></td>
								<td colspan="5"><?= $xrecognition ?></td>
								<td colspan="3"><?= $xmembership ?></td>
							</tr>
						<?php $y++; } ?>
						
					</tbody>

					<tbody class="table-body">
						<tr>
							<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
								<i>(Continue on seperate sheet if necessary)</i>
							</td>
						</tr>
						<tr class="s-label1">
							<td colspan="4" class="text-center"><i><b>SIGNATURE</b></i></td>
							<td colspan="5"></td>
							<td colspan="2" class="text-center"><i><b>DATE</b></i></td>
							<td colspan="1" class="text-center"><input type="text" style="width:100%;border-width:0 0 0px;padding-bottom:0px;text-align:center" placeholder="dd/mm/yyyy"></td>
						</tr>
						<tr>
							<td colspan="12" class="text-right"><small>CS FORM 212 (Revised 2025), Page 3 of 4</small></td>
						</tr>
					</tbody>

					<?php } ?>

					<!-- End of Page 3 -->
					
				</table>
			</div>		
		<?php } ?>	
		</form>
	</div>
</body>
</html>