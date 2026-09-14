<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Personal Data Sheet | Sheet 4</title>
	<!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
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
    font-size: 10px;
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
#pds-table tr.s-label1 {
	height: 5px;
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
    font-size: 10px !important;
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
@media print {

}
</style>
<body>
	<div class="table-responsive p-3">
		<form action="">
			<table id="pds-table">

				<!-- Q1 -->
				<tbody class="table-body question-block">
					<tr>
						<td colspan="12" class="separator"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">34.</span> Are you related by consanguinity or affinity to the appointing or recommending authority, or to the<br>
							<span class="count"></span>chief of bureau or office or to the person who has immediate supervision over you in the Office,<br>
							<span class="count"></span>Bureau or Department where you will beapppointed,<br>
						</td>
						<td colspan="4">
							
						</td>
						
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span>a. within the third degree?<br>
						</td>
						<td colspan="4"><input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO</td>
						
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span>b. within the fourth degree (for Local Government Unit - Career Employees)?
						</td>
						<td colspan="4"><input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox"> &nbsp&nbsp&nbsp NO</td>
						
					</tr>
					<tr>
						<td colspan="8" class="s-label">
						</td>
						<td colspan="4">If YES, give details:<input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"><br><br></td>
					</tr>
				</tbody>

				<!-- Q2 -->
				<tbody class="table-body question-block">
					
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">35.</span> a. Have you ever been found guilty of any administrative offense?
						</td>
						<td colspan="4"><br>
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
						
					</tr>
					<tr>
						<td colspan="8" class="s-label"></td>
						<td colspan="4">If YES, give details: <input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"><br><br></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span> b. Have you been criminally charged before any court?
						</td>
						<td colspan="4" style="border-top-width: 1px !important;"><br>
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label"></td>
						<td colspan="4">If YES, give details: <input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label"></td>
						<td colspan="4">Date Filed: <input type="text" style="width:76%;border-width:0 0 1px;padding-bottom:0px;"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label"></td>
						<td colspan="4">Status of Case/s: <input type="text" style="width:68%;border-width:0 0 1px;padding-bottom:0px;"><br><br></td>
					</tr>
				</tbody>

				<!-- Q3 -->
				<tbody class="table-body question-block">
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">36.</span> Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
						</td>
						<td colspan="4">
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label"></td>
						<td colspan="4">If YES, give details: <input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"><br><br></td>
					</tr>
				</tbody>

				<!-- Q4 -->
				<tbody class="table-body question-block">
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">37.</span> Have you ever been separated from the service in any of the following modes: resignation,<br>
						</td>
						<td colspan="4"><br>
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span> retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased<br>
						</td>
						<td colspan="4">If YES, give details: <input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span> out (abolition) in the public or private sector?
						</td>
						<td colspan="4"></td>
					</tr>
				</tbody>

				<!-- Q5 -->
				<tbody class="table-body question-block">
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">38.</span> a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
						</td>
						<td colspan="4">
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span><br>
						</td>
						<td colspan="4">If YES, give details: <input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span> b. Have you resigned from the government service during the three (3)-month period before the last
						</td>
						<td colspan="4">
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span> election to promote/actively campaign for a national or local candidate?
						</td>
						<td colspan="4">If YES, give details: <input type="text" style="width:65%;border-width:0 0 1px;padding-bottom:0px;"><br><br></td>
					</tr>
				</tbody>

				<!-- Q6 -->
				<tbody class="table-body question-block">
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">39.</span> Have you acquired the status of an immigrant or permanent resident of another country?
						</td>
						<td colspan="4"><br>
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
						</td>
						<td colspan="4">if YES, give details (country): <input type="text" style="width:52%;border-width:0 0 1px;padding-bottom:0px;"><br></td>
					</tr>
				</tbody>

				<!-- Q7 -->
				<tbody class="table-body question-block">
					<tr>
						<td colspan="8" class="s-label border-bottom-0">
							<span class="count">40.</span> Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA<br>
							<span class="count"></span> 7277, as amended); and (c) Expanded Solo Parents Welfare Act (RA 11861), please answer the </br>
							<span class="count"></span> following items:
						</td>
						<td colspan="4">
							
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span>a. Are you a member of any indigenous group?<br>
						</td>
						<td colspan="4">
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span><br>
						</td>
						<td colspan="4">If YES, please specify: <input type="text" style="width:62%;border-width:0 0 1px;padding-bottom:0px;"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span>b. Are you a person with disability?
						</td>
						<td colspan="4">
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
						</td>
						<td colspan="4">If YES, please specify ID No: <input type="text" style="width:53%;border-width:0 0 1px;padding-bottom:0px;"></td>
					</tr>
					<tr>
						<td colspan="8" class="s-label">
							<span class="count"></span>c. Are you a solo parent?
						</td>
						<td colspan="4">
							<input type="checkbox"> &nbsp&nbsp&nbsp YES &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="checkbox" checked> &nbsp&nbsp&nbsp NO	
						</td>
					</tr>
					<tr>
						<td colspan="8" class="s-label"></td>
						<td colspan="4">If YES, please specify ID No: <input type="text" style="width:53%;border-width:0 0 1px;padding-bottom:0px;"><br></td>
					</tr>
				</tbody>

				<!-- End of Page 4 -->

				<tbody class="table-body">
					<tr>
						<td colspan="8" class="s-label">
							<span class="count">41.</span> REFERENCES <span class="text-danger">(Person not related by consanguinity or affinity to applicant /appointee)</span>
						</td>
						<td colspan="4" rowspan="6" class="p-5">
							<table class="w-75 mx-auto border-0">
								<tbody class="border-0">
									<tr>
										<td class="text-center p-3">
										    </br></br></br></br></br>
										    Passport-sized unfiltered digital picture taken within the last  6 months 4.5 cm. X 3.5 cm
										    </br></br></br></br></br>
										</td>
									</tr>
									<tr>
										<td class="border-0 text-muted lead text-center">PHOTO</td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr class="text-center">
						<td colspan="4" class="s-label">NAME</td>
						<td colspan="2" class="s-label">OFFICE/RESIDENTIAL ADDRESS</td>
						<td colspan="2" class="s-label">CONTACT NO. AND/OR EMAIL</td>
					</tr>
					<?php if($character_reference == null){ ?>
						<tr class="s-label1 text-center">
							<td colspan="4">N/A</td>
							<td colspan="2">N/A</td>
							<td colspan="2">N/A</td>
						</tr>
						<tr class="s-label1 text-center">
							<td colspan="4"></td>
							<td colspan="2"></td>
							<td colspan="2"></td>
						</tr>
						<tr class="s-label1 text-center">
							<td colspan="4"></td>
							<td colspan="2"></td>
							<td colspan="2"></td>
						</tr>
					<?php }else{ ?>
						<?php $x=0; foreach($character_reference as $row) { ?>
							<tr class="s-label1 text-center">
								<td colspan="4"><?= $row['ref_name']?></td>
								<td colspan="2"><?= $row['ref_address']?></td>
								<td colspan="2"><?= $row['ref_contact']?></td>
							</tr>
						<?php $x++;} ?>
						<?php if($x<=3){
						for($z=0;$z<3-$x;$z++) { ?>
							<tr class="s-label1 text-center">
								<td colspan="4"></td>
								<td colspan="2"></td>
								<td colspan="2"></td>
							</tr>
						<?php }
						} ?>
					<?php } ?>
					<tr>
						<td colspan="8">
							<span class="count">42.</span> I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct, and <br><span class="count"></span>complete statement pursuant to the provisions of pertinent laws, rules, and regulations of the Republic of the <br><span class="count"></span>Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I<br><span class="count"></span>agree that any misrepresentation made in this document and its attachments shall cause the filing of <br><span class="count"></span>administrative/criminal case/s against me.
						</td>
					</tr>
					<tr>
						<td colspan="12" class="border-0 p-0">
							<table class="border-0 w-100">
								<tbody class="border-0">
									<tr>
										<td colspan="4" class="border-0 p-3" style="width: 38.5%;">
											<table class="border-0 w-100">
												<tbody>
													<tr>
														<td class="s-label py-2">Government Issued ID(i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)<br>                               PLEASE INDICATE ID Number and Date of Issuance</td>
													</tr>
													<tr>
														<td style="width: 30%;">Government Issued ID: <?= $emp_gov_type?></td>
													</tr>
													<tr>
														<td style="width: 30%;">ID/License/Passport No.: <?= $emp_gov_id ?></td>
													</tr>
													<tr>
														<td style="width: 30%;">Date/Place of Issuance: <?= $emp_gov_place?></td>
													</tr>
												</tbody>
											</table>
										</td>
										<td colspan="4" class="border-0 p-3" style="width: 38.5%;">
											<table class="border-0 w-100">
												<tbody class="border-0 text-center">
													<tr>
														<td class="py-4"></td>
													</tr>
													<tr>
														<td class="s-label"><small>Signature (Sign inside the box)</small></td>
													</tr>
													<tr>
														<td><input type="text" style="width:100%;border-width:0 0 0px;padding-bottom:0px;text-align:center" placeholder="dd/mm/yyyy"></td>
													</tr>
													<tr>
														<td class="s-label"><small>Date Accomplished</small></td>
													</tr>
												</tbody>
											</table>
										</td>
										<td colspan="4" class="border-0 p-3">
											<table class="border-0 w-100">
												<tbody class="border-0">
													<tr>
														<td class="py-5"></td>
													</tr>
													<tr>
														<td class="s-label text-center">Right Thumbmark</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>

								<tbody class="table-body">
									<tr>
										<td colspan="12" class="text-center py-2">
											SUBSCRIBED AND SWORN to before me this <input type="text" class="border-top-0 border-left-0 border-right-0" style="width: 25%;"> , affiant exhibiting his/her validly issued government ID as indicated above.
										</td>
									</tr>
									<tr>
										<td colspan="12" class="py-5">
											<table class="w-20 mx-auto" style="width:40%">
												<tbody>
													<tr>
														<td class="py-5"><center><input type="text" style="width:60%;border-width:0 0 1px;padding-bottom:0px;text-align:center;font-size:12px;font-weight: bold;"><br><input type="text" style="width:60%;border-width:0 0 0px;padding-bottom:0px;text-align:center;font-size:10px"></center></td>
													</tr>
													<tr>
														<td class="s-label text-center">Person Administering Oath</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>

							</table>
						</td>
					</tr>
					<tr>
						<td colspan="12" class="text-right"><small>CS FORM 212 (Revised 2026), Page 4 of 4</small></td>
					</tr>
				</tbody>



			</table>
		</form>
	</div>
</body>
</html>