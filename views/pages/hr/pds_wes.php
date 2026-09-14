<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personal Data Sheet | Work Experience Sheet</title>
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
#pds-table1 {
    width: 100%;
    max-width: 9in;
    margin: 0 auto;
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
}
#pds-table td.s-label1 {
    width: 50%;
	height: 35px;
	border-top-width: 0px !important;
	border-right-width: 0px !important;
    border-bottom-width: 0px !important;
	border-left-width: 1px !important;
}
#pds-table td.s-label2 {
	border-top-width: 0px !important;
	border-right-width: 0px !important;
    border-bottom-width: 0px !important;
	border-left-width: 0px !important;
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
<?php 
if( $this->session->logged_in){
	$name = $this->session->name;
}
?>
<body>
	<div class="table-responsive p-3">
		<form action="">
			<table id="pds-table">
				<tbody class="table-body">
					<tr><td>Attachment to CS Form No. 212</td></tr>
					<tr class="s-label1">
						<td colspan="12" class="text-white separator text-center" style="font-size:16px;">WORK EXPERIENCE SHEET</td>
					</tr>
					<tr>
						<td colspan="12" class="s-label border-bottom-0" style="font-size:12px;">
							<b>Instruction:</b>&nbsp&nbsp&nbsp&nbsp&nbsp
							1. Include only the work experiences relevant to the position being applied to. <br><br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 2. The duration should include start and finish dates, if known, month in abbreviated form, if known, and year in full. For the current position, use <br>
							&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp the word Present, e.g., 1998-Present. Work experience should be listed starting with the most recent first.
						</td>
					</tr>
					<?php 
						foreach($get_wes as $row){ 
							if($row['wes_to'] == 'Present'){
								$to = 'Present';
							}else{
								$to = date('d F Y', strtotime($row['wes_to']));
							}
							$wes_accomplishment = explode(";", $row['wes_accomplishment']);
							$wes_actual_duties = explode(";", $row['wes_actual_duties']);
						
					?>
						<tr class="s-label1">
							<td colspan="12" style="font-size:14px;"><br>
								<ul>
									<li><b>Duration:</b> <?php echo date('d F Y', strtotime($row['wes_from'])) ?> - <?php echo $to ?></li>
									<li><b>Position:</b> <?php echo $row['wes_position'] ?></li>
									<li><b>Name of Office/Unit:</b> <?php echo $row['wes_office'] ?></li>
									<li><b>Immediate Supervisor:</b> <?php echo $row['wes_supervisor'] ?></li>
									<li style="display:none"><b>Position:</b> <?php echo $row['wes_s_position'] ?></li>
									<li><b>Name of Agency/Organization and Location:</b> <?php echo $row['wes_agency'] ?></li>
									<li>
										<b>List of Accomplishments and Contributions (if any)</b>
										<br>
										<ul>
											<?php for($x=0;$x<=count($wes_accomplishment)-1;) { ?>
												<li><p text-align="justify" style="padding:0; margin:0"><?php echo $wes_accomplishment[$x]; ?></p></li>
											<?php $x++; } ?>
										</ul>
										
									</li>
									<li>
										<b>Summary of Actual Duties</b>
										<br>
										<ul>
											<?php for($x=0;$x<=count($wes_actual_duties)-1;) { ?>
												<li><p text-align="justify" style="padding:0; margin:0"><?php echo $wes_actual_duties[$x]; ?></p></li>
											<?php $x++; } ?>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>

			<table id="pds-table1">
				<tbody>
					<tr class="s-label" style="height:100px;">
						<td>
							<p style="float: right;margin-right:20px;margin-top:50px;margin-bottom:0px">
							
								<input type="text" style="width:100%;border-width:0 0 1px;padding-bottom:0px;text-align:center;font-weight: bold;" value="<?= strtoupper($name) ?>">
								<br>
								(Signature over Printed Name of Employee/Applicant)
							</p>
							
						</td>
					</tr>
					<tr>
						<td>
							<div style="text-align: right; margin-right: 170px;">
								<p style="display: inline; margin-right: 10px;">Date:</p>
								<input type="text" style="width: auto; border-width: 0; padding-bottom: 0; text-align: left;" placeholder="dd/mm/yyyy">
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>			
		</form>
	</div>
</body>
</html>