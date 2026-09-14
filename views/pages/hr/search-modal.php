<!--Add Exhibits-->
<!-- Modal Add Polcies -->
<div class="modal fade delete" id="downloadexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-file-excel-o"></i> Download Excel</h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 " >
						<div id="accordion">
							<div class="card">
								<div class="card-header">
								<a class="card-link" data-toggle="collapse" href="#collapseOne">
									Show/Hide Result(s)
								</a>
								</div>
								<div id="collapseOne" class="collapse" data-parent="#accordion">
								<div class="card-body">
									
								<style type="text/css">
								.tg  {border-collapse:collapse;border-spacing:0;}
								.tg td{border-color:black;border-style:solid;border-width:1px;}
								.tg th{border-color:black;border-style:solid;border-width:1px;}
								.tg .tg-7bu6{text-align:center;vertical-align:middle}
								</style>

								<center>
								<table id="tblData" class="tg"> 
								<thead>
								<tr>
									<th class="tg-7bu6" colspan="7"><h2>Technical Education and Skills Development Authority R02</h2></th>
								</tr>
								</thead>
								<tbody>
									<tr>
									<th class="tg-7bu6" colspan="5"><span style="float:left">NAME: <b><?= strtoupper($this->session->name) ?><span><b></th>
									<th class="tg-7bu6" colspan="2"><span style="float:left">OPERATING UNIT: <b><?= strtoupper($this->session->ous_desc) ?></span><b></th>
								</tr>
								<tr>
									<td class="tg-7bu6" rowspan="2">No.</td>
									<td class="tg-7bu6" rowspan="2">TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS</td>
									<td class="tg-7bu6" colspan="2">INCLUSIVE DATES OF ATTENDANCE</td>
									<td class="tg-7bu6" rowspan="2">NUMBER OF HOURS</td>
									<td class="tg-7bu6" rowspan="2">Type of LD (Managerial/ Supervisory/ Technical/etc) </td>
									<td class="tg-7bu6" rowspan="2"> CONDUCTED/ SPONSORED BY       </td>
								</tr>
								<tr>
									<td class="tg-7bu6">From</td>
									<td class="tg-7bu6">To</td>
								</tr>
								<tr>
									<!--Ajax-->

									<?php  $num_rows = $num_rows+1;
									foreach($list_of_trainings_user as $row){ $num_rows--;?>
										<tr>
											<td class="tg-7bu6"><?= $num_rows; ?></td>
											<td class="tg-7bu6"><?= $row['trn_learn_dev'] ?></td>
											<td class="tg-7bu6"><?= date("m-d-Y", strtotime($row['trn_from_date'])) ?></td>
											<td class="tg-7bu6"><?= date("m-d-Y", strtotime($row['trn_to_date'])) ?></td>
											<td class="tg-7bu6"><?= $row['trn_no_hours'] ?></td>
											<td class="tg-7bu6"><?= $row['trn_type'] ?></td>
											<td class="tg-7bu6"><?= $row['trn_conducted'] ?></td>
										</tr>
									<?php }?>
								</tr>
								</tbody>
								</table>
								</center>

								</div>
								</div>
							</div>
						</div>

					</div><!--End of Col md 12-->
				</div><!--End of row-->
			</div><!-- Modal Body-->
										
			<div class="modal-footer">
				<div class="btn-group">
					<button type="button" class="btn btn-danger" onclick="exportTableToExcel('tblData', 'Trainings-of-<?= $this->session->name ?>')"><i class="fa fa-file-excel-o"></i> Export to Excel File</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>	
				</div>

				<div id="addexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
					<span class="sr-only">Loading... </span>
				</div>	
			</div>

			</form>						
		</div>
    </div>
</div>
<!-- End Modal -->

<!--Add Exhibits-->
<!-- Modal Add Polcies -->
<div class="modal fade delete" id="downloadexcel1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">	
		<div class="modal-content">

			<div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel"><i class="fa fa-print"></i> Print or Export to Excel <i class="fa fa-file-excel-o"></i></h3>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
			</div>

			<div class="modal-body">
				<div class="row">
					<div class="col-md-6"> 
						<div class="form-group">
                            <label class="form-control-label">Year</label>
                            <select id="year" name="year" class="form-control" onchange="change_url()">
								<option value="">Select Year</option>
							<!--Year-->
								<?php
									$firstYear ='2021';
									$lastYear = (int)date('Y');
									for($i=$lastYear;$i>=$firstYear;$i--) { 
								?>
							<option value="<?= $i;?>"><?= $i;?></option>
                            <!--End of Year-->  
							<?php } ?>	
                            </select>
                        </div>
					</div>
					<div class="col-md-6"> 
						<div class="form-group">
                            <label class="form-control-label">Month</label>
								<select id="month" name="month" class="form-control" onchange="change_url()">
									<option value="">Select Month</option>
									<option value="">Summary</option>
									<option value="01">January</option>
                                    <option value="02">February</option>
									<option value="03">March</option>
                                    <option value="04">April</option>
									<option value="05">May</option>
                                    <option value="06">June</option>
									<option value="07">July</option>
                                    <option value="08">August</option>
									<option value="09">September</option>
                                    <option value="10">October</option>
									<option value="11">November</option>
                                    <option value="12">December</option>
								</select>
                        </div>
					</div>	
				</div><!--End of row-->
				<div class="row">
					<div class="col-md-12"> 
						<div class="form-group">
                            <label class="form-control-label">Report</label>
								<select id="report" name="report" class="form-control" onchange="change_url()">
									<option value="">Select Report</option>
									<option value="1">TRAINING PROGRAM MONITORING REPORT FORM</option>
                                    <option value="2">MONITORING AND EVALUATION PLAN</option>
								</select>
                        </div>
					</div>	

				</div>
			</div><!-- Modal Body-->
										
			<div class="modal-footer">
				<div class="btn-group">
					<a href="#" id="submit_url" type="button" class="btn btn-success print"><i class="fa fa-print"></i> Print</a>
					<a href="#" id="submit_urll" type="button" class="btn btn-danger excel"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
					<a href="" type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</a>	
				</div>

				<div id="addexhibitloading" class="spinner-grow text-primary" style="display: none;" role="status">
					<span class="sr-only">Loading... </span>
				</div>	
			</div>

			</form>						
		</div>
    </div>
</div>
<!-- End Modal -->

<script type="text/javascript">
	const change_url = () => {
		var year = $('#year option:selected').val();
		var month = $('#month option:selected').val();
		var report = $('#report option:selected').val();
		$("a.print").attr('href', "<?= base_url()?>print_hr_report_TPMRF/" + year + "-" + month + "-" + report);
		$("a.excel").attr('href', "<?= base_url()?>export_hr_report_TPMRF/" + year + "-" + month + "-" + report);
		$("a.print").attr('target', "_blank");
		$("a.excel").attr('target', "_blank");
		};
</script>