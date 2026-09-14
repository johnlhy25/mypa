<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personal Data Sheet | Sheet 1</title>
	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
	
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
#pds-table tr.s-label-signature {
	height: 40px;
	border-top-width: 0px !important;
	border-right-width: 0px !important;
    border-bottom-width: 0px !important;
	border-left-width: 1px !important;
}
/* Print-specific styles */
@media print {
            @page {
                size: 21cm 33cm; /* Folio size: 21cm x 33cm */
                margin: 20mm;
            }
            body {
                margin: 0;
                padding: 0;
            }
            .printable {
                display: block;
            }
        }
</style>
<body>

	<div class="table-responsive p-3">
		<form id="pds-table1" action="">
			<table id="pds-table">

				<tbody class="table-header">
					<tr>
						<td colspan="12" class="h5"><i><b>CS Form No. 212</b></i></td>
					</tr>
					<tr>
						<td colspan="12" class="align-top" style="max-height: 12px;">
							<i><b>Revised 2026</b></i>
						</td>
					</tr>
					<tr>
						<td colspan="12" class="text-center"><h1><b>PERSONAL DATA SHEET</b></h1></td>
					</tr>
					<tr>
						<td colspan="12"><i><b>WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.</b></i></td>
					</tr>
					<tr>
						<td colspan="12"><i><b>READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM</b></i></td>
					</tr>
					<tr>
						<td colspan="12">Print legibly if accomplished through own handwriting. Tick appropriate boxes ( <input type="checkbox" checked> ) and use seperate sheet if necessary. Indicate N/A if not applicable. <b>DO NOT ABBREVIATE.</b></td>
						<td colspan="1" style="border:1px solid#000b;background:#757575;width:8%; display:none"><small>1. CS ID No.</small></td>
						<td colspan="2" class="text-right" style="border:1px solid #000;width:20%; display:none"><small>(Do not fill up. For CSC use only)</small></td>
					</tr>
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator">I. PERSONAL INFORMATION</td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">1.</span> SURNAME
						</td>
						<td colspan="11"><?= strtoupper(!empty($pi_surname) ? $pi_surname : 'N/A'); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0"><span class="count">2.</span> FIRST NAME</td>
						<td colspan="9"><?= strtoupper(!empty($pi_firstname) ? $pi_firstname : 'N/A'); ?></td>
						<td colspan="2" class="align-top"><small>NAME EXTENSION (JR.,SR)</small><?= strtoupper(!empty($pi_extname) ? $pi_extname : 'N/A'); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0"><span class="count"></span> MIDDLE NAME</td>
						<td colspan="11"><?= strtoupper(!empty($pi_middlename) ? $pi_middlename : 'N/A'); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">3.</span> DATE OF BIRTH<br>
							<span class="count"></span> (dd/mm/yyyy)
						</td>
						<td colspan="5"><?= date('d/m/Y', strtotime($dob)) ?></td>
						<?php 
							if($citizenship == "Filipino"){
								$citizenship_chk = "checked";
							}else{
								$citizenship_chk = " ";
							}
						?>

						<td colspan="3" class="s-label align-top border-bottom-0">
							<span class="count">16.</span> CITIZENSHIP
						</td>
						<td colspan="3">&nbsp&nbsp<input type="checkbox" <?= $citizenship_chk?> > Filipino &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox"> Dual Citizenship
						</td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0"></td>
						<td colspan="5"></td>
						<td colspan="3" class="s-label align-top border-0 text-center small">
							If holder of dual citizenship,
						</td>
						<td colspan="3">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox"> by birth &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox"> by naturalization
						</td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">4.</span> PLACE OF BIRTH</td>
						<td colspan="5"><?= strtoupper($pob); ?></td>
						<td colspan="3" class="s-label align-top border-0 text-center small"> please indicate the details.</td>
						<td colspan="3">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pls. indicate country:</td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">5.</span> SEX AT BIRTH</td>
						<?php 
							if($sex =="Male"){
								$sex_male="checked";
							}else{
								$sex_male=" ";
							}

							if($sex =="Female"){
								$sex_female="checked";
							}else{
								$sex_female=" ";
							}
						?>
						<td colspan="5">&nbsp&nbsp<input type="checkbox" <?= $sex_male ?>> Male &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" <?= $sex_female ?>> Female</td>
						<td colspan="3" class="s-label align-top border-0"></td>
						<td colspan="3"><input type="text" style="width:100%; text-align:center" value=""></td>
					</tr>
						<?php
							if($civil_status == "Single"){
								$civil_status_single = "checked";
							}else{
								$civil_status_single = " ";
							}

							if($civil_status == "Married"){
								$civil_status_married = "checked";
							}else{
								$civil_status_married = " ";
							}

							if($civil_status == "Widowed"){
								$civil_status_widowed = "checked";
							}else{
								$civil_status_widowed = " ";
							}

							if($civil_status == "Separated"){
								$civil_status_separated = "checked";
							}else{
								$civil_status_separated = " ";
							}
						?>
					<tr>
						<td colspan="1" class="s-label border-bottom-0"><span class="count">6.</span> CIVIL STATUS</td>
						<td colspan="5">&nbsp&nbsp<input type="checkbox" <?= $civil_status_single ?>> Single  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="checkbox" <?= $civil_status_married ?>> Married</td>
						<td colspan="2" class="s-label align-top border-bottom-0 small">
							<span class="count">17.</span> RESIDENTIAL ADDRESS
						</td>
						<td colspan="2"><?= strtoupper(!empty($pi_ra_block_no) ? $pi_ra_block_no : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="House/Block/Lot No."></small></td>
						<td colspan="2"><?= strtoupper(!empty($pi_ra_street) ? $pi_ra_street : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Street"></small></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-top-0"><span class="count"></span></td>
						<td colspan="5">&nbsp&nbsp<input type="checkbox" <?= $civil_status_widowed ?>> Widowed &nbsp&nbsp<input type="checkbox" <?= $civil_status_separated ?>> Separated  <br>&nbsp&nbsp<input type="checkbox"> Other/s: <input type="text"> </td>
						<td colspan="2" class="s-label align-top border-0"></td>
						<td colspan="2"><?= strtoupper(!empty($pi_ra_subdivision) ? $pi_ra_subdivision : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Subdivision/Village"></small></td>
						<td colspan="2"><?= strtoupper(!empty($pi_ra_barangay) ? $pi_ra_barangay : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Barangay"></small></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">7.</span> HEIGHT (m)</td>
						<td colspan="5"><?= $pi_height ." M" ?></td>
						<td colspan="2" class="s-label align-top border-0"></td>
						<td colspan="2"><?= strtoupper(!empty($pi_ra_municipality) ? $pi_ra_municipality : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="City/Municipality"></small></td>
						<td colspan="2"><?= strtoupper(!empty($pi_ra_province) ? $pi_ra_province : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Province"></small></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">8.</span> WEIGHT (kg)</td>
						<td colspan="5"><?= $pi_weight." KG" ?></td>
						<td colspan="2" class="s-label border-0 text-center">
							ZIP CODE
						</td>
						<td colspan="4"><?= strtoupper($pi_ra_zip); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">9.</span> BLOOD TYPE</td>
						<td colspan="5"><?= strtoupper(!empty($pi_blood_type) ? $pi_blood_type : 'N/A'); ?></td>
						<td colspan="2" class="s-label border-bottom-0"><span class="count">18.</span> PERMANENT ADDRESS</td>
						<td colspan="2"><?= strtoupper(!empty($pi_pa_block_no) ? $pi_pa_block_no : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="House/Block/Lot No."></small></td>
						<td colspan="2"><?= strtoupper(!empty($pi_pa_street) ? $pi_pa_street : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Street"></small></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">10.</span> UMID ID NO.</td>
						<td colspan="5"><?= strtoupper(!empty($pi_gsis) ? $pi_gsis : 'N/A'); ?></td>
						<td colspan="2" class="s-label border-0"></td>
						<td colspan="2"><?= strtoupper(!empty($pi_pa_subdivision) ? $pi_pa_subdivision : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Subdivision/Village"></small></td>
						<td colspan="2"><?= strtoupper(!empty($pi_pa_barangay) ? $pi_pa_barangay : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Barangay"></small></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">11.</span> PAG-IBIG NO.</td>
						<td colspan="5"><?= strtoupper(!empty($pi_pagibig) ? $pi_pagibig : 'N/A'); ?></td>
						<td colspan="2" class="s-label border-0"></td>
						<td colspan="2"><?= strtoupper(!empty($pi_pa_municipality) ? $pi_pa_municipality : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="City/Municipality"></small></td>
						<td colspan="2"><?= strtoupper(!empty($pi_pa_province) ? $pi_pa_province : 'N/A'); ?><small><input type="text" style="width:100%; text-align:left; border: none; border-top: 1px solid black;" value="Province"></small></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">12.</span> PHILHEALTH NO.</td>
						<td colspan="5"><?= strtoupper(!empty($pi_philhealth) ? $pi_philhealth : 'N/A'); ?></td>
						<td colspan="2" class="s-label text-center border-0">ZIP CODE</td>
						<td colspan="4"><?= strtoupper(!empty($pi_pa_zip) ? $pi_pa_zip : 'N/A'); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">13.</span> PhilSys Number (PSN):</td>
						<td colspan="5"><?= strtoupper(!empty($pi_sss) ? $pi_sss : 'N/A'); ?></td>
						<td colspan="2" class="s-label"><span class="count">19.</span> TELEPHONE NO.</td>
						<td colspan="4"><?= strtoupper(!empty($pi_telephone) ? $pi_telephone : 'N/A'); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">14.</span> TIN NO.</td>
						<td colspan="5"><?= strtoupper(!empty($pi_tin_no) ? $pi_tin_no : 'N/A'); ?></td>
						<td colspan="2" class="s-label"><span class="count">20.</span> MOBILE NO.</td>
						<td colspan="4"><?= strtoupper(!empty($pi_mobile) ? $pi_mobile : 'N/A'); ?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label"><span class="count">15.</span> AGENCY EMPLOYEE NO.</td>
						<td colspan="5"><?= strtoupper(!empty($pi_employee_id) ? $pi_employee_id : 'N/A'); ?></td>
						<td colspan="2" class="s-label"><span class="count">21.</span> EMAIL ADDRESS (if any)</td>
						<td colspan="4"><?= strtoupper(!empty($pi_email) ? $pi_email : 'N/A'); ?></td>
					</tr>
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator">II. FAMILY BACKGROUND</td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">22.</span> SPOUSE'S SURNAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_spouse_surname) ? $fb_spouse_surname : 'N/A'); ?></td>
						<td colspan="3" class="s-label">
							<span class="count">23.</span> NAME of CHILDREN (Write full name and list all)
						</td>
						<td colspan="3" class="s-label text-center" style="width: 18%;">DATE OF BIRTH (dd/mm/yyyy)</td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> FIRST NAME
						</td>
						<td colspan="4"><?= strtoupper(!empty($fb_spouse_fname) ? $fb_spouse_fname : 'N/A'); ?></td>
						<td colspan="1" class="align-top s-label">
							<small>
								NAME EXTENSION (JR.,SR) <?= strtoupper(!empty($fb_spouse_extname) ? $fb_spouse_extname : 'N/A'); ?>
							</small>
						</td>
						<td colspan="3"><?php if($child1 == null){ echo 'N/A';}else{echo strtoupper($child1);} ?></td>
						<td colspan="3"><?php if($bdatechild1 == null){ echo 'N/A';}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild1)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> MIDDLE NAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_spouse_mname) ? $fb_spouse_mname : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child2); ?></td>
						<td colspan="3"><?php if($bdatechild2 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild2)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> OCCUPATION
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_spouse_occupation) ? $fb_spouse_occupation : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child3); ?></td>
						<td colspan="3"><?php if($bdatechild3 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild3)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> EMPLOYER/BUSINESS NAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_spouse_business) ? $fb_spouse_business : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child4); ?></td>
						<td colspan="3"><?php if($bdatechild4 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild4)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> BUSINESS ADDRESS
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_spouse_business_address) ? $fb_spouse_business_address : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child5); ?></td>
						<td colspan="3"><?php if($bdatechild5 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild5)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> TELEPHONE NO.
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_spouse_telephone) ? $fb_spouse_telephone : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child6); ?></td>
						<td colspan="3"><?php if($bdatechild6 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild6)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">24.</span> FATHER'S SURNAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_father_surname) ? $fb_father_surname : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child7); ?></td>
						<td colspan="3"><?php if($bdatechild7 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild7)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> FIRST NAME
						</td>
						<td colspan="4"><?= strtoupper(!empty($fb_father_fname) ? $fb_father_fname : 'N/A'); ?></td>
						<td colspan="1" class="align-top s-label">
							<small>
								NAME EXTENSION (JR.,SR)<?= strtoupper(!empty($fb_father_extname) ? $fb_father_extname : 'N/A'); ?>
							</small>
						</td>
						<td colspan="3"><?= strtoupper($child8); ?></td>
						<td colspan="3"><?php if($bdatechild8 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild8)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> MIDDLE NAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_father_mname) ? $fb_father_mname : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child9); ?></td>
						<td colspan="3"><?php if($bdatechild9 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild9)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">25.</span> MOTHERS MAIDEN NAME
						</td>
						<td colspan="5"></td>
						<td colspan="3"><?= strtoupper($child10); ?></td>
						<td colspan="3"><?php if($bdatechild10 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild10)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> SURNAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_mother_surname) ? $fb_mother_surname : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child11); ?></td>
						<td colspan="3"><?php if($bdatechild11 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild11)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> FIRST NAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_mother_fname) ? $fb_mother_fname : 'N/A'); ?></td>
						<td colspan="3"><?= strtoupper($child12); ?></td>
						<td colspan="3"><?php if($bdatechild12 == null){}else{ echo strtoupper(date("d/m/Y", strtotime($bdatechild12)));}?></td>
					</tr>
					<tr>
						<td colspan="1" class="s-label border-0">
							<span class="count"></span> MIDDLE NAME
						</td>
						<td colspan="5"><?= strtoupper(!empty($fb_mother_mname) ? $fb_mother_mname : 'N/A'); ?></td>
						<td colspan="6" class="s-label text-danger text-center"><i><b>(Continue on seperate sheet if necessary)</b></i></td>
					</tr>
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator">III. EDUCATIONAL BACKGROUND</td>
					</tr>
					<tr class="text-center">
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">26.</span>
							<span class="d-block text-center">LEVEL</span>
						</td>
						<td colspan="4" class="s-label border-bottom-0">
							NAME OF SCHOOL<br>(Write in full)
						</td>
						<td colspan="2" class="s-label border-bottom-0">
							BASIC EDUCATION/DEGREE/COURSE<br>
							(Write in full)
						</td>
						<td colspan="2" class="s-label border-bottom-0">
							PERIOD OF ATTENDANCE
						</td>
						<td colspan="1" class="s-label border-bottom-0">HIGHEST LEVEL/UNITS EARNED<br>(If not graduated)</td>
						<td colspan="1" class="s-label border-bottom-0">YEAR GRADUATED</td>
						<td colspan="1" class="s-label border-bottom-0">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br>RECEIVED</td>
					</tr>
					<tr class="text-center" style="margin-top: -20px;">
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="4" class="s-label border-top-0"></td>
						<td colspan="2" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label">From</td>
						<td colspan="1" class="s-label">To</td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
					</tr>
					<!--Elementary-->
					<?php if($elementary == null){ ?>
						<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> ELEMENTARY
						</td>
						<td colspan="4">N/A</td>
						<td colspan="2">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						</tr>
					<?php }else{ ?>

						<?php foreach($elementary as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> ELEMENTARY
							</td>
							
							<?php 
    						    $degree = strtolower(trim($row['eb_degree'] ?? ''));

                                if (strpos($degree, 'elementary') !== false || strpos($degree, 'primary') !== false) {
                                    $displayDegree = 'Primary Education';
                                } else {
                                    $displayDegree = $row['eb_degree'] ?: 'N/A';
                                }
				 			?>

							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper($displayDegree); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>

							
						</tr>
						<?php } ?>
					<?php } ?>
					<!--Elementary-->
					
					<!--Secondary -->
					<?php if($secondary == null){ ?>
						<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> SECONDARY
						</td>
						<td colspan="4">N/A</td>
						<td colspan="2">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						</tr>
					<?php }else{ ?>
						<?php foreach($secondary as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> SECONDARY
							</td>
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						</tr>
						<?php } ?>
					<?php } ?>
					<!--Secondary -->

					<!--Vocational-->
					<?php if($vocational == null){ ?>
						<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> VOCATIONAL/<br>
							<span class="count"></span> TRADE COURSE
						</td>
						<td colspan="4">N/A</td>
						<td colspan="2">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
					</tr>
					<?php }else{ ?>
						<?php foreach($vocational as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> VOCATIONAL/<br>
								<span class="count"></span> TRADE COURSE
							</td>
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						</tr>
						<?php } ?>
					<?php } ?>
					<!--Vocational-->	
					
					<!--College-->
					<?php if($college == null){ ?>
						<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> COLLEGE
						</td>
						<td colspan="4">N/A</td>
						<td colspan="2">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
					</tr>
					<?php }else{ ?>
						<?php foreach($college as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> COLLEGE
							</td>
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						
						</tr>
						<?php } ?>
					<?php } ?>
					<!--College-->
					
					<!--GRADUATE STUDIES-->
					<?php if($graduate == null){ ?>
						<tr>
						<td colspan="1" class="s-label">
							<span class="count"></span> GRADUATE STUDIES
						</td>
						<td colspan="4">N/A</td>
						<td colspan="2">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
						<td colspan="1" class="text-center">N/A</td>
					</tr>
					<?php }else{ ?>
						<?php foreach($graduate as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> GRADUATE STUDIES
							</td>
							
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						</tr>
						<?php }	?>
					<?php }	?>
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
					<tr>
						<td colspan="12" class="text-right"><small>CS FORM 212 (Revised 2026), Page 1 of 4</small></td>
					</tr>
				</tbody>
				<!-- End of Page 1 -->
			</table>
		</form>
		</div>
	</div>
	
	<?php if ($elementary_offset1 == null && $secondary_offset1 == null && $vocational_offset1 == null && $college_offset1 == null && $graduate_offset1 == null){
	} else{ ?>

	<p style="page-break-after: always;"></p>
	<p style="page-break-before: always;"></p>

	<div class="table-responsive p-3">
		<form action="">
			<table id="pds-table">

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator">III. EDUCATIONAL BACKGROUND</td>
					</tr>
					<tr class="text-center">
						<td colspan="1" class="s-label border-bottom-0">
							<span class="count">26.</span>
							<span class="d-block text-center">LEVEL</span>
						</td>
						<td colspan="4" class="s-label border-bottom-0">
							NAME OF SCHOOL<br>(Write in full)
						</td>
						<td colspan="2" class="s-label border-bottom-0">
							BASIC EDUCATION/DEGREE/COURSE<br>
							(Write in full)
						</td>
						<td colspan="2" class="s-label border-bottom-0">
							PERIOD OF ATTENDANCE
						</td>
						<td colspan="1" class="s-label border-bottom-0">HIGHEST LEVEL/UNITS EARNED<br>(If not graduated)</td>
						<td colspan="1" class="s-label border-bottom-0">YEAR GRADUATED</td>
						<td colspan="1" class="s-label border-bottom-0">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br>RECEIVED</td>
					</tr>
					<tr class="text-center" style="margin-top: -20px;">
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="4" class="s-label border-top-0"></td>
						<td colspan="2" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label">From</td>
						<td colspan="1" class="s-label">To</td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
						<td colspan="1" class="s-label border-top-0"></td>
					</tr>
					<!--Elementary-->
					<?php if($elementary_offset1 == null){ ?>
						
					<?php }else{ ?>

						<?php foreach($elementary_offset1 as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> ELEMENTARY
							</td>
							
                        	<?php 
    							if (
                                    stripos($row['eb_degree'], 'Elementary') !== false ||
                                    stripos($row['eb_degree'], 'Primary') !== false
                                ) {
                                    $eb_degree = 'Primary Education';
                                }
				 			?>
							
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper($displayDegree); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
							
						</tr>
						<?php } ?>
					<?php } ?>
					<!--Elementary-->
					
					<!--Secondary -->
					<?php if($secondary_offset1 == null){ ?>
						
					<?php }else{ ?>
						<?php foreach($secondary_offset1 as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> SECONDARY
							</td>
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						</tr>
						<?php } ?>
					<?php } ?>
					<!--Secondary -->

					<!--Vocational-->
					<?php if($vocational_offset1 == null){ ?>
						
					<?php }else{ ?>
						<?php foreach($vocational_offset1 as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> VOCATIONAL/<br>
								<span class="count"></span> TRADE COURSE
							</td>
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						</tr>
						<?php } ?>
					<?php } ?>
					<!--Vocational-->	
					
					<!--College-->
					<?php if($college_offset1 == null){ ?>
						
					<?php }else{ ?>
						<?php foreach($college_offset1 as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> COLLEGE
							</td>
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						
						</tr>
						<?php } ?>
					<?php } ?>
					<!--College-->
					
					<!--GRADUATE STUDIES-->
					<?php if($graduate_offset1 == null){ ?>
						
					<?php }else{ ?>
						<?php foreach($graduate_offset1 as $row){ ?>
						<tr>
							<td colspan="1" class="s-label">
								<span class="count"></span> GRADUATE STUDIES
							</td>
							
							<td colspan="4"><?= strtoupper(!empty($row['eb_name_school']) ? $row['eb_name_school'] : 'N/A'); ?></td>
							<td colspan="2"><?= strtoupper(!empty($row['eb_degree']) ? $row['eb_degree'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_from']) ? $row['eb_from'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_to']) ? $row['eb_to'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_highest_level']) ? $row['eb_highest_level'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_year_graduated']) ? $row['eb_year_graduated'] : 'N/A'); ?></td>
							<td colspan="1" class="text-center"><?= strtoupper(!empty($row['eb_award']) ? $row['eb_award'] : 'N/A'); ?></td>
						</tr>
						<?php }	?>
					<?php }	?>
				</tbody>

				<tbody class="table-body">
					<tr>
						<td colspan="12" class="text-white separator bg-transparent text-danger text-center">
							<i>-</i>
						</td>
					</tr>
					<tr class="s-label-signature">
						<td colspan="1" class="text-center"><i><b>SIGNATURE</b></i></td>
						<td colspan="6"></td>
						<td colspan="2" class="text-center"><i><b>DATE</b></i></td>
						<td colspan="3"><input type="text" style="width:100%;border-width:0 0 0px;padding-bottom:0px;text-align:center" placeholder="dd/mm/yyyy"></td>
					</tr>
				</tbody>

			</table>
		</form>
	</div>

	<?php } ?>

</body>
</html>